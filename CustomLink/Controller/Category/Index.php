<?php
namespace Newthink\CustomLink\Controller\Category;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $productCollectionFactory;
	protected $categoryFactory;
	protected $_categoryCollectionFactory;
	protected $_productloader; 

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory,
		\Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory,
		\Magento\Catalog\Model\CategoryFactory $categoryFactory,
		\Magento\Catalog\Model\ProductFactory $_productloader,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory; 
		$this->productCollectionFactory = $collectionFactory;
		$this->categoryFactory = $categoryFactory;
		$this->_productloader = $_productloader;
		$this->_categoryCollectionFactory = $categoryCollectionFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$productsCollection = $this->productCollectionFactory->create();
		$cat_collection = $this->_categoryCollectionFactory->create();
		$product = $this->_productloader->create()->load(5);
		
		$cats = $product->getCategoryIds();
		$add_cats = array(7,11,10);
			for($i=0; $i<count($add_cats); $i++){
				if(in_array($add_cats[$i], $cats)){
					continue;
				}else{
					$cats[] = $add_cats[$i];
				}
			}		
		// print_r($cats);die("dhfgh");
		// $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/custom.log');
    //     $logger = new \Zend\Log\Logger();
    //     $logger->addWriter($writer);
    //     $logger->info();
	
		$product->setCategoryIds($cats);
		$product->save();
		 
		return $this->_pageFactory->create();
	}
}