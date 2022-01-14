<?php
namespace Bluethink\CustomSection\Controller\Adminhtml\Index;

use Magento\Sales\Model\Order;

class Save extends \Magento\Backend\App\Action
{
  /**
  * Index Action*
  * @return void
  */

    protected $resultRawFactory;
	protected $order;



	public function __construct(\Magento\Backend\App\Action\Context $context, Order $order) {
		$this->order = $order;
		return parent::__construct($context);
	}
	public function execute()
	{
		// echo "controller";die;
		$orderId = $this->getRequest()->getParam('order_id');
		$statusCode = $this->getRequest()->getParam('order_status');

		$this->orderStatusChange($orderId, $statusCode);
	}


	public function orderStatusChange($orderId, $statusCode)
	{ 
		$response = [];
		try{
			$order = $this->order->load($orderId);
			$order->setStatus($statusCode)->setState($statusCode);
			$order->save();	
			$response = [
				"error"=>0,
				"message"=>"Order status Updated Successfully"
			];
		}catch(\Exception $e)
		{
			$response = [
				"error"=> $e->getMessage(),
				"message"=>"Something got error"
			];
		}
		
		echo  json_encode($response);
	}
}
