
(function ($) {

    $(document).ready(function() {
        "use strict";

        var number_format = function(money, currency){
            currency = currency || '$';
        
            return currency + '' + money;
        };
        
        $('.attribute_style').on('change', function() {
            var style = $('.attribute_style').val();
            var color = $('.attribute_color').val();
            var size = $('.attribute_size').val();
            getAttributesPrimary(style, color, size)
        });
        $('.attribute_color').on('change', function() {
            var style = $('.attribute_style').val();
            var color = $('.attribute_color').val();
            var size = $('.attribute_size').val();
            getAttributesPrimary(style, color, size)
        });
        $('.attribute_size').on('change', function() {
            var style = $('.attribute_style').val();
            var color = $('.attribute_color').val();
            var size = $('.attribute_size').val();
            getAttributesPrimary(style, color, size)
        });

        function getAttributesPrimary(style, color, size)
        {
            var result = _.find(productAttributes, { 'attribute_style': style, 'attribute_color': color, 'attribute_size': size });
            if(result){
                $('#product_id').val(result.id);
                $('#primary-price').html(number_format(result.price));
            }
            console.log(result);
        }

    });
    

})(jQuery);