<?php
namespace Bluethink\Development\Model;

use Magento\Framework\Model\AbstractModel;

class Save extends AbstractModel
{
    protected function _construct()
    {
        // $this->_init(ResourceModel::class);
    }


   public function demo()
   {
       $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

     $product = $objectManager->create(\Magento\Catalog\Model\Product::class);
     try 
     {
    $product->setName('123Bluethink');
    $product->setTypeId('simple');
    $product->setAttributeSetId(4);
    $product->setSku('12232bluethink');
    $product->setWebsiteIds([1]);
    $product->setVisibility(4);
    $product->setPrice(150);
    $product->setStockData(
        [
            'use_config_manage_stock' => 0,
            'manage_stock' => 1,
            'min_sale_qty' => 1,
            'max_sale_qty' => 2,
            'is_in_stock' => 1,
            'qty' => 100
        ]
    );
    $product->save();

    /**
     * For Add Custom Options
     */
    $options = [
        [
            "sort_order" => 1,
            "title" => "Custom Option 4",
            "price_type" => "99",
            "price" => "10",
            "type" => "field",
            "is_require" => 0
        ],
        [
            "sort_order" => 2,
            "title" => "Custom Option 5",
            "price_type" => "fixed",
            "price" => "20",
            "type" => "field",
            "is_require" => 0
        ]
    ];
    foreach ($options as $customOptions) 
    {
        $product->setHasOptions(1);
        $product->getResource()->save($product);
        $option = $objectManager->create('\Magento\Catalog\Model\Product\Option')
            ->setProductId($product->getId())
            ->setStoreId($product->getStoreId())
            ->addData($customOptions);
        $option->save();
        $product->addOption($option);
    }
    echo "$sku Product Created Successfully ";

} 
catch (Exception $ex) 
{
    echo $e->getMessage();
}

}
}




