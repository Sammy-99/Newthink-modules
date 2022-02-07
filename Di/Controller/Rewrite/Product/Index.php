<?php

namespace Newthink\Di\Controller\Rewrite\Product;

class Index extends \Magento\Customer\Controller\Account\Index
{
	protected $resultPageFactory; 

	public function __construct(
        \Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	)
	{
		$this->resultPageFactory = $resultPageFactory;
		parent::__construct($context, $resultPageFactory);
    }

	public function execute()
	{
		// die("Rewrite Controller");
        
		$resultPage = $this->resultPageFactory->create();

		return $resultPage;
	}


}