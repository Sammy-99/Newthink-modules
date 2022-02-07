<?php
 
namespace Newthink\DescriptionBox\Plugin\Catalog\Block\Product;
 
use Magento\Catalog\Block\Product\View as ProductView;
 
class View
{
    private $displayBlocks = ['product.info.addtocart'];
 
    // you can add layout reference as per you need to display like: product.info.price, product.info.review, etc.
    public function afterToHtml(ProductView $subject, $html)
    {
        if (in_array($subject->getNameInLayout(), $this->displayBlocks)) {
            return $html . '<div><h4>Description Box</h4><input type="text" id="description_box" name="description_box"></div><br>';
        } 
 
        return $html;
    }
}