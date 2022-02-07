<?php
namespace Bluethink\CustomCheckoutField\Plugin\Address;
 
class Book
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

    public function afterGetAddressHtml(
        \Magento\Customer\Block\Address\Book $subject,
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

}