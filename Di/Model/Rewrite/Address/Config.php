<?php

namespace Newthink\Di\Model\Rewrite\Address;

use Magento\Framework\Serialize\SerializerInterface;

class Config extends \Magento\Customer\Model\Address\Config
{
    protected $_storeManager;
    protected $_addressHelper;
    protected $_scopeConfig; 

    public function __construct(
        \Magento\Customer\Model\Address\Config\Reader $reader,
        \Magento\Framework\Config\CacheInterface $cache,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Customer\Helper\Address $addressHelper,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        $cacheId = 'address_format',
        SerializerInterface $serializer = null
    ) {
        parent::__construct($reader, $cache,$storeManager,$addressHelper,$scopeConfig, $cacheId, $serializer);
        $this->_storeManager = $storeManager;
        $this->_addressHelper = $addressHelper;
        $this->_scopeConfig = $scopeConfig;
    }

    public function getTestingData()
    {
        return 'this is custom Model';
    }
    
}