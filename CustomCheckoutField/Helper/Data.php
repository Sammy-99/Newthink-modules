<?php

namespace Bluethink\CustomCheckoutField\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;

class Data extends AbstractHelper
{
    /**
     * @var \Magento\Framework\App\Http\Context
     */
    
    protected $registry;
    protected $customerSession;
    protected $orderCollectionFactory;


    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Customer\Model\Session $customer,
        CollectionFactory $orderCollectionFactory
    ) 
    {
        parent::__construct($context);
        $this->registry = $registry;
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->customerSession = $customer;

    }

    public function getCustomerId()
    {
        return $this->customerSession->getId();
    
    }

    public function getLatestOrder()
    {
        $customerId = $this->getCustomerId();
        $customerOrder = $this->orderCollectionFactory->create()
                                ->addFieldToFilter('customer_id', $customerId)
                                ->setOrder('entity_id','DESC')
                                ->getFirstItem();
        return $customerOrder;
    }    

}