<?php

namespace Newthink\Di\Plugin;

class UpdateProductPlugin
{
    public function beforeSetPrice(\Magento\Catalog\Model\Product $subject, $price)
    {
        $price = $price + 10;
            $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/before.log');
            $logger = new \Zend\Log\Logger(); 
            $logger->addWriter($writer);
            $logger->info('before plugin');
        return $price;
    }

    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        $result = $result + 2;
            $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/after.log');
            $logger = new \Zend\Log\Logger(); 
            $logger->addWriter($writer);
            $logger->info('after plugin');
        return $result;
    }
}