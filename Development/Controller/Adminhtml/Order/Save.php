<?php 
namespace Bluethink\Development\Controller\Adminhtml\Order;

use Magento\Framework\App\Action\Context;
use Magento\Sales\Model\Order;
use Magento\Framework\Message\ManagerInterface;
class Save extends \Magento\Framework\App\Action\Action
{

    public function __construct(\Magento\Framework\Webapi\Rest\Request $request,
        Context $context,
        Order $order,
        ManagerInterface $messageManager
       
    ) {
        $this->order = $order;
        parent::__construct($context);
        $this->_request = $request;
        $this->messageManager= $messageManager;
    }
    public function execute()
    {

      $post_data = (array)$this->_request->getParams();
   
     
       $orderId = $post_data['order_id'];
       $order = $this->order->load($orderId);
       $order->setStatus($post_data['order_status']);
       $order->setState($post_data['order_status']);
       $masage=$order->save();

       if($masage)
       {
        $this->messageManager->addSuccess(__(" Success ! order updated succesfuly"));
       }
       else
       {
        $this->messageManager->addError(__("Sorry ! we are not able to update order"));
       }

     }
}