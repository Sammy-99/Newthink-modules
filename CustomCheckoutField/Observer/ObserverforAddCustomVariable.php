<?php
namespace Bluethink\CustomCheckoutField\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ObjectManager;

class ObserverforAddCustomVariable implements ObserverInterface
{
    protected $helper;
    public function __construct(
        \Bluethink\CustomCheckoutField\Helper\Data $helper
        ) {
            $this->helper = $helper;
        }

    /**
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();

        $number = $this->getCustomNumber();
        /** @var \Magento\Framework\App\Action\Action $controller */

        $transport = $observer->getTransport();
        $transport['AlternateTelephone'] = $number;
        
    }

    public function getCustomNumber()
    {
        $order = $this->helper->getLatestOrder();
        $alternateTelephone = $order->getAlternateTelephone();
            if(count($order) > 0 && !empty($alternateTelephone)){
                $alternateTelephone = '/ '.$alternateTelephone;
                return $alternateTelephone;
            }
            if(empty($alternateTelephone)){
                $alternateTelephone = '';
                return $alternateTelephone;
            }
        return $alternateTelephone;

    }
}
