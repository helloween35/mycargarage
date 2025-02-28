$(document).ready(function() {
    // A kosár darabszám-input módosításakor automatikusan frissüljön a kosár, ne kelljen külön gombot nyomni hozzá
    $(document).on('change', '.qty', function() {
        $('[name="update_cart"]').trigger('click'); 
    });

    // Google chrome autocomplete stílusait hackeli meg
    document.querySelectorAll(".form-green input, .form-green select, .form-green textarea").forEach(input => {
        input.setAttribute("autocomplete", "new-password");
    });
});    