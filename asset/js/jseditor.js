(function($) {
    $(document).ready(function() {
        $('.add-value').click(function() {
            var template = $('.external-js-value').last().clone();
            var templateInput = template.find('input');
            var fieldCount = templateInput.data('field-count') + 1;
            templateInput.attr('name', 'external-js[' + fieldCount + ']');
            templateInput.attr('data-field-count', fieldCount);
            templateInput.val('');
            $('.external-js .values').append(template);
        });
        
        $(document).on('click', '.remove-value', function(e) {
            e.preventDefault();
            if ($('.external-js-value').length > 1) {
                $(this).parents('.external-js-value').remove();
            }
        });
    });
})(jQuery)