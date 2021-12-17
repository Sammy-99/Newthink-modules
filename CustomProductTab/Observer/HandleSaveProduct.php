<?php

namespace Newthink\CustomProductTab\Observer;

use Magento\Framework\Event\ObserverInterface;

class HandleSaveProduct implements ObserverInterface
{

    protected $_request;
    protected $_priceFactory;
    

        public function __construct(
            \Magento\Framework\App\RequestInterface $request,
            \Newthink\CustomProductTab\Model\PriceFactory $priceFactory
        )
        {
            $this->_request = $request;  
            $this->_priceFactory = $priceFactory;
              
        }

        
        public function execute(\Magento\Framework\Event\Observer $observer) 
        {
            $mydate = $observer->getEvent()->getData();
			//echo "<pre>";
            $mydata =(array) $this->_request->getParams();
            // echo($mydata['product']['fixed_price']);
            // echo($mydata['product']['from_date']);
            // echo ($mydata['product']['to_date']);
            // die("dsgdsfgdshfgdshg");

            $model = $this->_priceFactory->create();
            $model->setFixedPrice($mydata['product']['fixed_price'])->save();
            $model->setFromDate($mydata['product']['from_date'])->save();
            $model->setToDate($mydata['product']['to_date'])->save();

		}

	

}