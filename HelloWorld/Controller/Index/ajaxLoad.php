<?php

namespace Newthink\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\JsonFactory;

class ajaxLoad extends \Magento\Framework\App\Action\Action
{

     /**
     * @var Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    protected $resultJsonFactory; 
    protected $_productCollectionFactory;

    /**
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        JsonFactory $resultJsonFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
        )
    {

        $this->resultPageFactory = $resultPageFactory;
        $this->resultJsonFactory = $resultJsonFactory; 
        $this->_productCollectionFactory = $productCollectionFactory;
        return parent::__construct($context);
    }


    public function execute()
    {
        $customValue = $this->getRequest()->getParam('custom_value');
        $collection = $this->_productCollectionFactory->create();
        //$collection->addAttributeToFilter('name', array('like' => '%'.$customValue.'%'));
        $resultJson = $this->resultJsonFactory->create();
        $collection->addAttributeToFilter(array(
            array('attribute'=>'name', array('like' => '%'.$customValue.'%')),
            array('attribute'=>'sku',  array('like' => '%'.$customValue.'%'))));
        
           
        // $collection->getSelect()->__toString();
        $productArr = [];
        $dummy = [];
        foreach ($collection as $product){
            $productArr[] = $product->getSku();
            $productArr[] = $product->getName();
            // $productArr[] = $product->getTypeId();
            // $productArr[] = $product->getPrice();
        } 
       
        // $relatedProductArr = [];
        // for($i=0; $i<count($productArr); $i++){

        //     $loadProduct = stripos($productArr[$i], $customValue);

        //     if($loadProduct !== false){
        //         $relatedProductArr[] = $productArr[$i];
        //     }
        // }
       
       return $resultJson->setData($productArr);
    //    return $resultJson->setData($dummy);
   
    } 
}