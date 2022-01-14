<?php
namespace Bluethink\Dev\Block\Adminhtml\Order\View\Tab;

use Magento\Sales\Model\ResourceModel\Order\Status\CollectionFactory;

class Custom extends \Magento\Backend\Block\Template implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    protected $_template = '/tab/view/custom.phtml';
    

    /**
     * View constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(\Magento\Sales\Model\OrderFactory $orderFactory,
         CollectionFactory $orderStatusCollectionFactory,
        \Magento\Backend\Block\Template\Context $context,
         \Magento\Framework\Registry $registry,
         \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,

        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
        $this->orderFactory = $orderFactory;
        $this->orderStatusCollectionFactory = $orderStatusCollectionFactory;
        $this->orderRepository = $orderRepository;

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
     * @return \Magento\Sales\Model\Order
     */
    public function getOrderId()
    {
        return $this->getOrder()->getEntityId();

    }
    
 /**
     * Retrieve order model instance
     *
     * @return array
     */
   public function getOrderStatusOptions(): array
    {
        $options = $this->orderStatusCollectionFactory->create()->toOptionArray();
        
        return $options;
     }

     public function getOrderStatus($orderId)
    {
        $order = $this->orderRepository->get($orderId);
        $state = $order->getState(); //Get Order State(Complete, Processing, ....)
        return $state;
    }

  
   public function getOrderState($orderId)
    {
        $order = $this->orderRepository->get($orderId);
        $status = $order->getStatus(); //Get Order State(Complete, Processing, ....)
        return $status;
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
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('My Custom Tab');
    }
 
    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('My Custom Tab');
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
}





















// class Custom extends \Magento\Backend\Block\Template implements \Magento\Backend\Block\Widget\Tab\TabInterface
// {
//     /**
//      * Template
//      *
//      * @var string
//      */
//     protected $_template = 'tab/view/custom.phtml';

//     /**
//      * Core registry
//      *
//      * @var \Magento\Framework\Registry
//      */
//     protected $coreRegistry = null;

//     /**
//      * @param \Magento\Backend\Block\Template\Context $context
//      * @param \Magento\Framework\Registry $registry
//      * @param array $data
//      */
//     public function __construct(
//         \Magento\Backend\Block\Template\Context $context,
//         \Magento\Framework\Registry $registry,
//         array $data = []
//     ) {
//         $this->coreRegistry = $registry;
//         parent::__construct($context, $data);
//     }

//     /**
//      * Retrieve order model instance
//      *
//      * @return \Magento\Sales\Model\Order
//      */
//     public function getOrder()
//     {
//         return $this->coreRegistry->registry('current_order');
//     }

//     /**
//      * {@inheritdoc}
//      */
//     public function getTabLabel()
//     {
//         return __('custom tab');
//     }

//     /**
//      * {@inheritdoc}
//      */
//     public function getTabTitle()
//     {
//         return __('custom tab');
//     }

//     /**
//      * {@inheritdoc}
//      */
//     public function canShowTab()
//     {
//         // For me, I wanted this tab to always show
//         // You can play around with the ACL settings 
//         // to selectively show later if you want
//         return true;
//     }

//     /**
//      * {@inheritdoc}
//      */
//     public function isHidden()
//     {
//         // For me, I wanted this tab to always show
//         // You can play around with conditions to
//         // show the tab later
//         return false;
//     }

//     /**
//      * Get Tab Class
//      *
//      * @return string
//      */
//     public function getTabClass()
//     {
//         // I wanted mine to load via AJAX when it's selected
//         // That's what this does
//         return 'ajax only';
//     }

//     /**
//      * Get Class
//      *
//      * @return string
//      */
//     public function getClass()
//     {
//         return $this->getTabClass();
//     }

// }