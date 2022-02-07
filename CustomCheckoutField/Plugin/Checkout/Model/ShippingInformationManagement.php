<?php
namespace Bluethink\CustomCheckoutField\Plugin\Checkout\Model;
 
use Magento\Quote\Model\QuoteRepository;
use Magento\Checkout\Model\Session;
 
class ShippingInformationManagement
{
    protected $quoteRepository;

    public function __construct(
        \Magento\Quote\Model\QuoteRepository $quoteRepository
    ) {
        $this->quoteRepository = $quoteRepository;
    }
    public function beforeSaveAddressInformation(
        \Magento\Checkout\Model\ShippingInformationManagement $subject,
        $cartId,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
    ) {
        if(!$extAttributes = $addressInformation->getExtensionAttributes())
        {
            return;
        }

        $quote = $this->quoteRepository->getActive($cartId);

        $quote->setAlternateTelephone($extAttributes->getAlternateTelephone());

        return;
    }

}