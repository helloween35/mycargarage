$(document).ready(function() {
    $(document).on('change', '.qty', function() {
        $('[name="update_cart"]').trigger('click'); 
    });
});    