<?php

namespace Newthink\Di\Block\Rewrite\Account\Dashboard;

use Magento\Customer\Model\Address\Mapper;

class Address extends \Magento\Customer\Block\Account\Dashboard\Address
{
    protected $_addressConfig;
    protected $currentCustomer;
    protected $currentCustomerAddress; 
    protected $addressMapper;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Helper\Session\CurrentCustomer $currentCustomer,
        \Magento\Customer\Helper\Session\CurrentCustomerAddress $currentCustomerAddress,
        \Magento\Customer\Model\Address\Config $addressConfig,
        Mapper $addressMapper,
        array $data = []
    ) {
        $this->currentCustomer = $currentCustomer;
        $this->currentCustomerAddress = $currentCustomerAddress;
        $this->_addressConfig = $addressConfig;
        $this->addressMapper = $addressMapper;
        parent::__construct($context, $currentCustomer, $currentCustomerAddress, $addressConfig, $addressMapper, $data);
    }
    
    public function getCustomData()
    {
        return 'This is Custom Block';
    }

    public function getCustomModelData()
    {
        return $this->_addressConfig->getTestingData();
    }
}
