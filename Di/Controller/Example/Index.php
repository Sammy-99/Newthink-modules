<?php

namespace Newthink\Di\Controller\Example;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $resultPageFactory = false;
	protected $custom;

	public function __construct(
        \Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		\Newthink\Di\Model\Custom $custom
	)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
		$this->custom = $custom;
    }

	public function execute()
	{
        
		echo "Class Index : " . $this->custom->namespace . "<br>";
		// print_r($this->custom->namespace);
		// $resultPage = $this->resultPageFactory->create();

		// return $resultPage;
	}


}