$(document).ready(function() {
    // A kosár darabszám-input módosításakor automatikusan frissüljön a kosár, ne kelljen külön gombot nyomni hozzá
    $(document).on('change', '.qty', function() {
        $('[name="update_cart"]').trigger('click'); 
    });

    // Google chrome autocomplete stílusait hackeli meg
    document.querySelectorAll(".form-green input, .form-green select, .form-green textarea").forEach(input => {
        input.setAttribute("autocomplete", "new-password");
    });

    // Kereső mező funkciók
    $('.search-menu button').click(function() {
        $('.navbar-search').toggleClass('opened-search');
        $('.search-input').focus();
    });
});    

// Cooki bar JS
document.addEventListener("DOMContentLoaded", function() {
    const acceptButton = document.querySelector(".js-accept-cookies");
    const cookieBar = document.querySelector(".js-cookie-bar");

    // Gomb kattintásra elmentjük a sütit és elrejtjük a sávot
    acceptButton.addEventListener("click", function() {
        document.cookie = "acceptedCookies=true; path=/; max-age=" + (60 * 60 * 24 * 365); // 1 évig érvényes
        cookieBar.classList.add('cookie-bar--hide');
    });
});
