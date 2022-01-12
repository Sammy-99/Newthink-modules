<?php

namespace Newthink\Di\Controller\Example;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $resultPageFactory = false;
	protected $custom;
	protected $title;

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
        
		// echo "Class Index : " . $this->custom->namespace . "<br>"; 
		echo $this->setTitle('Welcome'). "<br>";
		echo $this->getTitle();
		// print_r($this->custom->namespace);
		// $resultPage = $this->resultPageFactory->create();

		// return $resultPage;
	}

	public function setTitle($title)
	{
		echo "setTitle(1) <br>";
		return $this->title = $title;
	}

	public function getTitle()
	{
		echo "getTitle(1) <br>";
		echo "getTitle(2) <br>";
		echo "getTitle(3) <br>";
		return $this->title;
	}

}