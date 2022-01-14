<?php
namespace Bluethink\Development\Plugin\Catalog\Model;

use Magento\Catalog\Model\Product;

class ProductPlugin
{

public function beforeGetName(Product $subject, $result)
{
return $result. ' this Name modified by Dev using plugin';
}

public function afterGetPrice(Product $subject, $result)
{
return $result + 120;
}

}