<?php
namespace Newthink\CustomProductTab\Plugin\Model;
 
class Product
{
    protected $_request;
    

        public function __construct(
            \Magento\Framework\App\RequestInterface $request,
            \Magento\Catalog\Model\ProductRepository $productRepository
        )
        {
            $this->_request = $request;
            $this->_productRepository = $productRepository;
              
        }


    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        
        $product =  $subject->getId();
        $price = $subject->getFixedPrice();
        
        $result = $price;
        
        return $result;
    }

}