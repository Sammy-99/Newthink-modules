<?php

namespace Bluethink\CustomSection\Block\Adminhtml\Order\View\Tab;


use Magento\Sales\Model\Order;
use Magento\Sales\Model\ResourceModel\Order\Status\CollectionFactory;

class OrderStatus extends \Magento\Backend\Block\Template implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
   protected $_template = 'order/view/tab/orderSt.phtml';
   /**
    * @var \Magento\Framework\Registry
    */
   private $_coreRegistry;
   /**
    * @var  \Magento\Sales\Api\OrderRepositoryInterface
    */
   protected $orderRepository;
       /**
     * @var CollectionFactory $statusCollectionFactory
     */
    protected $orderStatusCollectionFactory;

    /**
     * @param CollectionFactory $orderStatusCollectionFactory
     */

   /**
    * View constructor.
    * @param \Magento\Backend\Block\Template\Context $context
    * @param \Magento\Framework\Registry $registry
    * @param \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
    * @param array $data
    */
   public function __construct(
       \Magento\Backend\Block\Template\Context $context,
       \Magento\Framework\Registry $registry,
       \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
       CollectionFactory $orderStatusCollectionFactory,
       array $data = []
   ) {
       $this->_coreRegistry = $registry;
       $this->orderRepository = $orderRepository;
       $this->orderStatusCollectionFactory = $orderStatusCollectionFactory;
       parent::__construct($context, $data);
   }

   /**
    * Retrieve order model instance
    * 
    * @return \Magento\Sales\Model\Order
    */
   public function getOrder()
   {
       return $this->_coreRegistry->registry('current_order');
   }
   /**
    * Retrieve order model instance
    *
    * @return int
    *Get current id order
    */
   public function getOrderId()
   {
       return $this->getOrder()->getEntityId();
   }

   /**
    * Retrieve order increment id
    *
    * @return string
    */
   public function getOrderIncrementId()
   {
       return $this->getOrder()->getIncrementId();
   }

   /**
    * Retrieve order status
    * @return string
    */
    public function getOrderStatus($orderId)
    {
        $order = $this->orderRepository->get($orderId);
        $status = $order->getStatus(); //Get Order Status(Pending, canceled, ....)
        return $status;
    }
   /**
    * Retrieve order state
    * @return string
    */
    public function getOrderState($orderId)
    {
        $order = $this->orderRepository->get($orderId);
        $state = $order->getState(); //Get Order State(Complete, Processing, ....)
        return $state;
    }
      /**
     * Get order status options
     *
     * @return array
     */
    public function getOrderStatusOptions(): array
    {
        $options = $this->orderStatusCollectionFactory->create()->toOptionArray();
        return $options;
    }

    
   /**
    * {@inheritdoc}
    */
   public function getTabLabel()
   {
       return __('Order Status');
   }

   /**
    * {@inheritdoc}
    */
   public function getTabTitle()
   {
       return __('Order Status');
   }

   /**
    * {@inheritdoc}
    */
   public function canShowTab()
   {
       return true;
   }

   /**
    * {@inheritdoc}
    */
   public function isHidden()
   {
       return false;
   }

   public function getFormAction()
    {
        return $this->getUrl('customsection/index/save', ['_secure' => true]);
    }

}