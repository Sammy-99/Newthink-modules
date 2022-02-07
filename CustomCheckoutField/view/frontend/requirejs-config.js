var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/action/set-shipping-information': {
                'Bluethink_CustomCheckoutField/js/action/set-shipping-information-mixin': true
            }
        }
    },
    "map": {
        "*": {
            'Magento_Checkout/js/model/shipping-save-processor/default': 'Bluethink_CustomCheckoutField/js/shipping-save-processor'
        }
    }
};