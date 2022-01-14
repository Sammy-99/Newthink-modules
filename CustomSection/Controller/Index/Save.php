<?php
namespace Bluethink\CustomSection\Controller\Index;

use Bluethink\CustomSection\Model\SaveProduct;

class Save extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	protected $saveproductFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Bluethink\CustomSection\Model\SaveProductFactory $saveproductFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->saveproductFactory = $saveproductFactory;
		return parent::__construct($context);
	}

	public function execute()
	{	
		$saveProduct = $this->saveproductFactory->create();
		$saveProduct->customProduct();
		return $this->_pageFactory->create();
	}
}