<?php

namespace Bluethink\CustomSection\Model;

use Magento\Framework\Model\AbstractModel;

class Customer extends AbstractModel
{
    protected $subscriberFactory;

    public function __construct(
        
        \Magento\Newsletter\Model\SubscriberFactory $subscriberFactory
    ) {
        $this->subscriberFactory= $subscriberFactory;        
    }

    public function newsletter($email) {

     $this->subscriberFactory->create()->subscribe($email);

    }

}
?>