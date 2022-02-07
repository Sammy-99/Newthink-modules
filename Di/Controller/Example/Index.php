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
		
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // instance of object manager
		$product = $objectManager->create('\Magento\Catalog\Model\Product');
		$product->setSku('my-sku'); // Set your sku here
		$product->setName('Student Notebook'); // Name of Product
		$product->setAttributeSetId(4); // Attribute set id
		$product->setStatus(1); // Status on product enabled/ disabled 1/0
		$product->setWeight(10); // weight of product
		$product->setVisibility(4); // visibilty of product (catalog / search / catalog, search / Not visible individually)
		$product->setTaxClassId(0); // Tax class id
		$product->setTypeId('simple'); // type of product (simple/virtual/downloadable/configurable)
		$product->setPrice(100); // price of product
		$product->setStockData(
								array(
									'use_config_manage_stock' => 0,
									'manage_stock' => 1,
									'is_in_stock' => 1,
									'qty' => 99
								)
							);
		$product->save();

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
		return $this->title;
	}

}