<?php

namespace Bluethink\CustomSection\Model;

use Magento\Framework\Model\AbstractModel;

class SaveProduct extends AbstractModel
{

    protected $_product;

    protected $product;

    public function __construct(
        \Magento\Catalog\Model\Product $product
        )
    {
        $this->_product = $product;
    }

    public function customProduct(){
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // instance of object manager
        $product = $objectManager->create('\Magento\Catalog\Model\Product');
        $product->setSku('my-sku'); // Set your sku here
        $product->setName('Laptop Bluethink'); // Name of Product
        $product->setAttributeSetId(4); // Attribute set id
        $product->setStatus(1); // Status on product enabled/ disabled 1/0
        $product->setWeight(10); // weight of product
        $product->setVisibility(4); // visibilty of product (catalog / search / catalog, search / Not visible individually)
        $product->setTaxClassId(0); // Tax class id
        $product->setTypeId('simple'); // type of product (simple/virtual/downloadable/configurable)
        $product->setPrice(500); // price of product
        $product->setStockData(
                                array(
                                    'use_config_manage_stock' => 0,
                                    'manage_stock' => 1,
                                    'is_in_stock' => 1,
                                    'qty' => 999999999
                                    )
                                );
            
             $product->save();
            return "script run successfully";
    }

}