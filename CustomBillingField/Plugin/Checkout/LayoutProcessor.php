<?php
namespace Bluethink\CustomBillingField\Plugin\Checkout;

class LayoutProcessor
{
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array $jsLayout
    ) {
        // Loop all payment methods (because billing address is appended to the payments)
        $configuration = $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']['payment']['children']['payments-list']['children'];
        foreach ($configuration as $paymentGroup => $groupConfig) {
            if (isset($groupConfig['component']) AND $groupConfig['component'] === 'Magento_Checkout/js/view/billing-address') {

                $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
                ['payment']['children']['payments-list']['children'][$paymentGroup]['children']['form-fields']['children']['delivery_date'] = [
                    'component' => 'Magento_Ui/js/form/element/date',
                    'config' => [
                        'template' => 'ui/form/field',
                        'elementTmpl' => 'ui/form/element/date',
                        'id' => 'delivery_date',
                    ],
                    'dataScope' => $groupConfig['dataScopePrefix'] . '.delivery_date',
                    'label' => __('Delivery Date'),
                    'provider' => 'checkoutProvider',
                    'visible' => true,
                    'validation' => [
                        'required-entry' => true,
                        'min_text_length' => 0,
                    ],
                    'sortOrder' => 300,
                    'id' => 'delivery_date'
                ];
            }
        }

        return $jsLayout;
    }
}