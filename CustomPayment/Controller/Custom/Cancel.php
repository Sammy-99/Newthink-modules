<?php  

namespace Newthink\CustomPayment\Controller\Custom;
  
use \Magento\Framework\App\Action\Action;
  
class Cancel  extends \Magento\Framework\App\Action\Action  
{  
  
    protected $orderMgt;  
    protected $messageManager;  
    protected $sessionFactory;
    
    public function __construct( 
      \Magento\Framework\App\Action\Context $context, 
      \Magento\Sales\Api\OrderManagementInterface $orderMgt,
       \Magento\Framework\Message\ManagerInterface $messageManager,
       \Magento\Checkout\Model\SessionFactory $sessionFactory
       ) 
    {  
        $this->orderMgt = $orderMgt;  
        $this->messageManager = $messageManager;  
        $this->sessionFactory = $sessionFactory;
        parent::__construct($context);   
    }  
    public function execute() 
    {  
     
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();  
        $customerSession = $objectManager->get('Magento\Customer\Model\Session');  
           
        $cid = $customerSession->getCustomer()->getId();  
        $order_data = $this->sessionFactory->create()->getLastRealOrder();
        $orderId = $order_data->getEntityId();
        $order_status = $order_data->getStatus();
        $c_id = $order_data->getCustomerId();
        
         
        if($cid != $c_id){
            $this->messageManager->addError("Sorry, We cant cancel your order right now.") ;
        }  
        if($order_status == "pending"){  
            $this->orderMgt->cancel($orderId);   
            $this->messageManager->addSuccess("Your order has been cancelled successfully.") ;
            
        } else {  
            $this->messageManager->addError("Sorry, We cant cancel your order right now.") ;  
        }
        echo 0; die();  
  }  
}  