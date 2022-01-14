
define([
    'ko',
    'jquery',
    'uiComponent',
    'Magento_Customer/js/model/customer'
], function (
    ko,
    $,
    Component,
    customer
) {
    'use strict';
    return Component.extend({
      
        /**
         * Check if customer is logged in
         *
         * @return {boolean}
         */
         isLoggedIn: function () {
             if($isLoggedIn){
                

             }
            return customer.isLoggedIn();
        }
    });
});
