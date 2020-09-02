define([
    'jquery',
    'Magento_Checkout/js/model/quote'
], function ($, quote) {
    'use strict';

    return function (target) {
        return target.extend({

            /**
             * Set shipping information handler
             */
            setShippingInformation: function () {
                var shippingMethod = quote.shippingMethod();
                if (shippingMethod['method_code'] == 'simpleshipping') {
                    console.log('here');
                }
                this._super();
            }
        });
    }
});