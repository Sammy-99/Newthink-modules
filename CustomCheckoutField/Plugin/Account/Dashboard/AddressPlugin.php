<?php
namespace Bluethink\CustomCheckoutField\Plugin\Account\Dashboard;

use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;
 
class AddressPlugin
{
    protected $quoteRepository;
    protected $helper;
    

    public function __construct(
        \Magento\Quote\Model\QuoteRepository $quoteRepository,
        \Bluethink\CustomCheckoutField\Helper\Data $helper
    ) {
        $this->quoteRepository = $quoteRepository;
        $this->helper = $helper;
    }

    public function afterGetPrimaryBillingAddressHtml(
        \Magento\Customer\Block\Account\Dashboard\Address $subject,
        $result
    )
    {
        $order = $this->helper->getLatestOrder();
        $alternateTelephone = $order->getAlternateTelephone();
            if(count($order) > 0 && !empty($alternateTelephone)){
                $result = $result.'/ '.$alternateTelephone;
                return $result;
            }
        return $result;
    }

    public function afterGetPrimaryShippingAddressHtml(
        \Magento\Customer\Block\Account\Dashboard\Address $subject,
        $result
    )
    {
        $order = $this->helper->getLatestOrder();
            if(count($order) > 0 && !empty($order->getAlternateTelephone())){
                $result = $result.'/ '.$order->getAlternateTelephone();
                return $result;
            }
        return $result;
    }


}