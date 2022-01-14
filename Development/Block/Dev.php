<?php 
namespace Bluethink\Development\Block;
class Dev
{
protected $_customerSession;

public function __construct(
    
    \Magento\Customer\Model\Session $customerSession
    
) {
    
    $this->_customerSession = $customerSession;
    
}

public function getVal()
{
    $email = $this->_customerSession->getCustomer()->getEmail();
    return $email;
}
}