<?php

namespace Newthink\ShortBy\Controller\Adminhtml\Product;

class Index extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;
    protected $productFactory;
    protected $productRepository;
    protected $stockRegistry;

	public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Catalog\Api\Data\ProductInterfaceFactory $productFactory, \Magento\Catalog\Api\ProductRepositoryInterface $productRepository, \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
        $this->productFactory = $productFactory;
        $this->productRepository = $productRepository;
        $this->stockRegistry = $stockRegistry;
	}

	public function execute()
	{
		$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/templog.log');
		$logger = new \Zend\Log\Logger();
		$logger->addWriter($writer);
		$logger->info("product controller");
        die("product");
		// $resultPage = $this->resultPageFactory->create();
		// $resultPage->getConfig()->getTitle()->prepend((__('FAQ Group')));

		return $resultPage;
	}


}