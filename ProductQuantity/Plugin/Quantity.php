<?php

namespace Newthink\ProductQuantity\Plugin;

use Newthink\ProductQuantity\Helper\StockQuantity as Helper;
use Magento\Catalog\Block\Product\View\Type\Simple as ProductView;

class Quantity
{
    
        protected $helper;

        public function __construct (
            Helper $helper,
            array $data = []
        ) {   
                $this->helper = $helper;
        }


        function afterToHtml(ProductView $subject, $result) {
                    
            $status = $this->helper->getStockProductQuantity();
            $text_messege = "";
            if($status['qty'] <= 5 && $status['qty'] > 0 && $status['is_in_stock'] == 1){
                $text_messege = '<div style="color:red;"> Only ' . $status['qty'] . ' item left ! Hurry up!</div>';
               
            }
            return $text_messege.$result ;
        }

}