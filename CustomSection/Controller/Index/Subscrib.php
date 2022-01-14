<?php
namespace Bluethink\CustomSection\Controller\Index;


class Subscrib extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	// protected $_resultLayoutFactory;

	protected $subscriberFactory;

	private $jsonResultFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		// \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory,
		\Magento\Newsletter\Model\SubscriberFactory $subscriberFactory,
		\Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory)
	{
		$this->_pageFactory = $pageFactory;
		// $this->_resultLayoutFactory = $resultLayoutFactory;
		$this->subscriberFactory= $subscriberFactory;
		$this->jsonResultFactory = $jsonResultFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$email = $this->getRequest()->getParam('email');

		$result = $this->jsonResultFactory->create();
		
		$response = [];

		// $resultLayout = $this->_resultLayoutFactory->create();
        // $block = $resultLayout->getLayout()->getBlock('modaloverlay');
        // if ($block) {
        //     $customerLoggIn = $block->checkLoggin();
        // }
		
			if(!empty($email)){
				try {
					$checkSubscriber = $this->subscriberFactory->create()->loadByEmail($email);
	
					if ($checkSubscriber->isSubscribed()) {
						$response = [
							"error"=>0,
							"message"=>"Email Id is already subscribed"
						];
						$result->setData($response);
						return $result;
					} else {
						$this->subscriberFactory->create()->subscribe($email);
						
						$this->messageManager->addSuccessMessage(__('Subscribed Successfully'));
						
						$response = [
							"error"=>0,
							"message"=>"Subscribed Successfully"
						];
						$result->setData($response);
						return $result;
					}
		
				} catch (\Throwable $th) {
					//throw $th;
					$response = [
						"error"=>$th,
						"message"=>"Something got error"
					];
					
					$result->setData($response);
					return $result;
				}
			}else{
				$response = [
					"error"=>0,
					"message"=>"Email is not set"
				];
				$result->setData($response);
				return $result;
				
			}
		
	}
}