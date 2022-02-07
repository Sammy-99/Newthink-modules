<?php

namespace Newthink\CustomProductTab\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use \Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    /**
     * @var \Magento\Framework\App\Http\Context
     */
    
    protected $registry;
    protected $product;
    protected $timezone;


    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Model\Product $product,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $date
    ) 
    {
        parent::__construct($context);
        $this->registry = $registry;
        $this->product = $product;
        $this->timezone = $date;
        
    }

    public function getCurrentProduct()
    {
        return $this->registry->registry('current_product');
    
    }

    public function getStockStatus()
    {
        $qtyStatus = $this->registry->registry('current_product')->getQuantityAndStockStatus();

        return $qtyStatus;
    }

    public function getProduct()
    {
        $id = $this->getCurrentProduct()->getId();
        $getProduct = $this->product->load($id);

        return $getProduct;  
    }

    public function getDateDifference()
    {
        $fromDate = $this->getProduct()->getFromDate();
        $from_date = str_replace('/', '-', $fromDate);
        $startDate = $this->timezone->date($from_date)->format('Y-m-d H:i:s');
        
        $toDate = $this->getProduct()->getToDate();
        $to_date = str_replace('/', '-', $toDate);
        $endDate = $this->timezone->date($to_date)->format('Y-m-d H:i:s');
        
        $startingDate = new \DateTime($startDate);
        $endingDate = new \DateTime($endDate);
        $interval = date_diff($startingDate, $endingDate)->days;
        
        return $interval;
    }

}