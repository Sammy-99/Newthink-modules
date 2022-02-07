<?php
namespace Bluethink\CustomCheckoutField\Plugin\Order;

use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;
 
class Info
{
    protected $quoteRepository;
    protected $helper;
    protected $request;
    protected $orderRepository;

    public function __construct(
        \Magento\Quote\Model\QuoteRepository $quoteRepository,
        \Magento\Framework\App\Request\Http $request,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        \Bluethink\CustomCheckoutField\Helper\Data $helper
    ) {
        $this->quoteRepository = $quoteRepository;
        $this->helper = $helper;
        $this->request = $request;
        $this->orderRepository = $orderRepository;
    }

    public function afterGetFormattedAddress(
        \Magento\Sales\Block\Order\Info $subject,
        $result
    )
    {
        $entityId = $this->request->getParam('order_id');
        $order = $this->orderRepository->get($entityId);

        $alternateTelephone = $order->getAlternateTelephone();
            if(count($order) > 0 && !empty($alternateTelephone)){
                $result = $result.'/ '.$alternateTelephone;
                return $result;
            }
        return $result;
    }

}