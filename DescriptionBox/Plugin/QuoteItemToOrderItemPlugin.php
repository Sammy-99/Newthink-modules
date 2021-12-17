<?php

namespace Newthink\DescriptionBox\Plugin;

use Magento\Framework\Serialize\SerializerInterface;


class QuoteItemToOrderItemPlugin
{



    public function aroundConvert(\Magento\Quote\Model\Quote\Item\ToOrderItem $subject, callable $proceed, $quoteItem, $data)
    {

        // get order item
        $orderItem = $proceed($quoteItem, $data);

        // get your custom attribute from quote_item . 
        $quoteItemMycustomAttribValue = $quoteItem->getDescriptionBox();

        // $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/templog1.log');
        //     $logger = new \Zend\Log\Logger(); 
        //     $logger->addWriter($writer);
        //     $logger->info($quoteItemMycustomAttribValue);

        //set custom attribute to sales_order_item
        $orderItem->setDescriptionBox($quoteItemMycustomAttribValue);

        return $orderItem;
    }
}