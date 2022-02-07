<?php

namespace Newthink\HelloWorld\Observer;

use Magento\Framework\Event\ObserverInterface;

class SalesOrderShipmentAfter implements ObserverInterface
{

    protected $_request;
    protected $_shippingFactory;

        public function __construct(
            \Magento\Framework\App\RequestInterface $request,
            \Newthink\HelloWorld\Model\ShippingFactory $shippingFactory
        )
        {
            $this->_request = $request;
            $this->_shippingFactory = $shippingFactory;
            
        }

        
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $track_data = (array) $this->_request->getParams();  
        $shipment = $observer->getEvent()->getShipment();
        $shipmentId = $shipment->getId();
        
        
        
        
        foreach($track_data['tracking'] as $number_of_track){
            
            $model = $this->_shippingFactory->create();
            $model->setData($number_of_track)->save();
            
        }  


        /** @var \Magento\Sales\Model\Order $order */
            $order = $shipment->getOrder();
        // Do some things

        

    }
}