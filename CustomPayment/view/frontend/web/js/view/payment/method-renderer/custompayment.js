define(
        [
        'Magento_Checkout/js/view/payment/default',
        'Magento_Checkout/js/action/redirect-on-success',
        'mage/url',
    ],
    function (Component, url, redirectOnSuccessAction) {
        'use strict';
 
        return Component.extend({
            defaults: {
                redirectAfterPlaceOrder: false,
                template: 'Newthink_CustomPayment/payment/customtemplate'
                
            },
            
            afterPlaceOrder: function (data, event) {
                
                window.location.replace('http://127.0.0.1/mage2.3/custompayment/custom/index');
                // window.location.href='custompayment/custom/index';
            }
            
        });
    });