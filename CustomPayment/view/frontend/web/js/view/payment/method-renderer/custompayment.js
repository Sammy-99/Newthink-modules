define(
    [
        'Magento_Checkout/js/view/payment/default'
    ],
    function (Component) {
        'use strict';
 
        return Component.extend({
            defaults: {
                template: 'Newthink_CustomPayment/payment/customtemplate'
            }
        });
    }
);