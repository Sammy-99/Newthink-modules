<?php
namespace Newthink\CustomPayment\Controller\Custom;

use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\Service\InvoiceService;
use Magento\Framework\DB\Transaction;
use Magento\Sales\Model\Order\Email\Sender\InvoiceSender;
use Magento\Sales\Api\TransactionRepositoryInterface;

class Success extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
    protected $sessionFactory;
    protected $orderRepository;
    protected $invoiceService;
    protected $transaction;
    protected $invoiceSender;
    protected $_convertOrder;
    private $transactionRepository;
    protected $_transactionBuilder;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Checkout\Model\SessionFactory $sessionFactory,
        OrderRepositoryInterface $orderRepository,
        \Magento\Sales\Model\Convert\Order $convertOrder,
        InvoiceService $invoiceService,
        InvoiceSender $invoiceSender,
        TransactionRepositoryInterface $transactionRepository,
        \Magento\Sales\Model\Order\Payment\Transaction\Builder $builder,
        Transaction $transaction
    )
	{
		$this->_pageFactory = $pageFactory;
        $this->orderRepository = $orderRepository; 
        $this->sessionFactory = $sessionFactory;
        $this->invoiceService = $invoiceService;
        $this->transaction = $transaction;
        $this->invoiceSender = $invoiceSender;
        $this->_convertOrder = $convertOrder;
        $this->transactionRepository = $transactionRepository;
        $this->_transactionBuilder = $builder;
		return parent::__construct($context);
	}

	public function execute()
	{
        $createInvoice = $this->createInvoice();
        $txnId = $this->getTransId();
        $createShipment = $this->createShipment();
		
        echo 1;exit;	
	}

    public function getOrderItem(){

        $order_data = $this->sessionFactory->create()->getLastRealOrder();
        $entityId = $order_data->getEntityId();
        $orderItem = $this->orderRepository->get($entityId);

        return $orderItem;
    }

    public function createInvoice(){

        $order = $this->getOrderItem();
        if ($order->canInvoice()) {

            $invoice = $this->invoiceService->prepareInvoice($order);
            $invoice->register();
            $invoice->getOrder()->setIsInProcess(true);
            $invoice->save();
            
            $transactionSave = 
                $this->transaction
                    ->addObject($invoice)
                    ->addObject($invoice->getOrder());
            $transactionSave->save();   
        }

        return $order;
    }

    public function getTransId(){

        $order = $this->getOrderItem();
        $payment = $order->getPayment();
        $random_string = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $trans_id = substr(str_shuffle($random_string), 0, 10);
        $payment->setLastTransId($trans_id);
        $payment->setTransactionId($trans_id);

        $payment->setAdditionalInformation(
            [\Magento\Sales\Model\Order\Payment\Transaction::RAW_DETAILS => (array)$payment->getAdditionalInformation()]
        );

        $formatedPrice = $order->getBaseCurrency()->formatTxt(
            $order->getGrandTotal()
        );
        $message = __('The Captured amount is %1.', $formatedPrice);

        $trans = $this->_transactionBuilder;
        $transaction = $trans->setPayment($payment)
            ->setOrder($order)
            ->setTransactionId($trans_id)
            ->setAdditionalInformation(
                [\Magento\Sales\Model\Order\Payment\Transaction::RAW_DETAILS => (array)$payment->getAdditionalInformation()]
            )
            ->setFailSafe(true)
            //build method creates the transaction and returns the object
            ->build(\Magento\Sales\Model\Order\Payment\Transaction::TYPE_CAPTURE);

        $payment->addTransactionCommentsToOrder(
                $transaction,
                $message
        );

        $payment->setParentTransactionId(null);
        $payment->save();
        $order->save();
        $transaction->save();

        return $trans_id;
    }

    public function createShipment(){

        $orderId = $this->getOrderItem();

        if (!$orderId->canShip()) {
            throw new \Magento\Framework\Exception\LocalizedException(
            __("You can't create the Shipment of this order.") );
        }
        
        $orderShipment = $this->_convertOrder->toShipment($orderId);
        //print_r(json_encode([$orderShipment->getData()])); die();
        foreach ($orderId->getAllItems() AS $orderItem) {

            if (!$orderItem->getQtyToShip() || $orderItem->getIsVirtual()) {
               continue;
            }
            $qty = $orderItem->getQtyToShip();
            $shipmentItem = $this->_convertOrder->itemToShipmentItem($orderItem)->setQty($qty);
            $orderShipment->addItem($shipmentItem);
        }

        $orderShipment->register();
        $orderShipment->getOrder()->setIsInProcess(true);
        try {
            $orderShipment->save();
            $orderShipment->getOrder()->save();
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\LocalizedException(
            __($e->getMessage())
            );
        }
        
        return $orderId;
    }
    
}