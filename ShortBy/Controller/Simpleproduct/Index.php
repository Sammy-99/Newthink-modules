<?php

namespace Newthink\ShortBy\Controller\Simpleproduct;

class Index extends \Magento\Framework\App\Action\Action
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
        die("simple product");
		// $resultPage = $this->resultPageFactory->create();

		return $resultPage;
	}


}