$(document).ready(function() {
    $(document).on('change', '.qty', function() {
        $('[name="update_cart"]').trigger('click'); 
    });

    document.querySelectorAll(".form-green input, .form-green select, .form-green textarea").forEach(input => {
        input.setAttribute("autocomplete", "new-password");
    });
});    