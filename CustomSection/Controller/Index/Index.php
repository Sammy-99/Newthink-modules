<?php
namespace Bluethink\CustomSection\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	// protected $_session;
	

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		// \Magento\Customer\Model\Session $session,
		// \Magento\Newsletter\Model\SubscriberFactory $subscriberFactory,		
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
				
		// $this->_session = $session;
		// $this->subscriberFactory= $subscriberFactory;		
		return parent::__construct($context);
	}

	public function execute()
	{
		// if($this->_session->isLoggedIn()) {
		// 	$customer = $this->_session;
		// 	$customerName = $customer->getCustomer()->getName();
		// 	$customerId = $customer->getId();

		// 	$userIsSubscriber = $this->subscriberFactory->create()->loadByCustomerId($customerId);
		// 	$email = $userIsSubscriber->getSubscriberEmail();

		// 	if ($userIsSubscriber->isSubscribed()) {
		// 		 echo 'Hello '.$email. ', You have been subscribed newsletter already.';
		// 	} else {
		// 		echo 'Hello '.$customerName. ', Please subscribe newsletter.';
		// 	}
        // }else{
		// 	echo "Hello Guest, Login First To Get More Feature";
        // }
		
		return $this->_pageFactory->create();
	}
}