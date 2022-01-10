<?php

namespace Newthink\HelloWorld\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use \Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    /**
     * @var \Magento\Framework\App\Http\Context
     */
    
    protected $registry;
    protected $product;


    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Model\Product $product,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) 
    {
        parent::__construct($context);
        $this->registry = $registry;
        $this->product = $product;
        $this->_storeManager = $storeManager;
        
    }

    public function getBaseUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl();
        
    }

    // public function getCurrentProduct()
    // {
    //     return $this->registry->registry('current_product');
    
    // }


    // public function getProduct()
    // {
    //     $id = $this->getCurrentProduct()->getId();
    //     $getProduct = $this->product->load($id);

    //     return $getProduct;  
    // }

    

}