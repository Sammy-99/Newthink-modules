<?php
 
namespace Bluethink\CustomSection\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    public function getConfig()
    {
        return $this->scopeConfig->getValue(
            'mage/customConfig/paymentmethod',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}