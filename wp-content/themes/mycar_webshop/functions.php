<?php

function mycar_webshop_setup() {
    add_theme_support('woocommerce'); // WooCommerce támogatás
    add_theme_support('title-tag'); // Automatikus title kezelés
    add_theme_support('post-thumbnails'); // Képek engedélyezése
}
add_action('after_setup_theme', 'mycar_webshop_setup');


function mycar_webshop_override_woocommerce_template($template, $template_name, $template_path) {
    $custom_template = get_stylesheet_directory() . '/woocommerce/' . $template_name;
    return file_exists($custom_template) ? $custom_template : $template;
}
add_filter('woocommerce_locate_template', 'mycar_webshop_override_woocommerce_template', 10, 3);


function mycar_webshop_scripts() {
    wp_enqueue_style('mycar_webshop-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mycar_webshop_scripts');


function mycar_webshop_register_menus() {
    register_nav_menus(array(
        'primary' => __('Főmenü', 'mycar_webshop'),
    ));
}
add_action('after_setup_theme', 'mycar_webshop_register_menus');


function myshop_enqueue_scripts() {
    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');

    // Saját stílusok
    wp_enqueue_style('myshop-style', get_template_directory_uri() . '/assets/css/index.css');

    // Jquery
    wp_enqueue_script('bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', array('jquery'), null, true);

    // Bootstrap JS + Popper
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    // Saját script
    wp_enqueue_script('myshop-scripts', get_template_directory_uri() . '/assets/js/index.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'myshop_enqueue_scripts');

add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_action( 'wp_enqueue_scripts', function() {
    if ( is_cart() ) {
        wp_enqueue_script( 'wc-cart-fragments' );
        wp_enqueue_script( 'wc-ajax' );
    }
});

function enqueue_woocommerce_ajax_scripts() {
    if (is_cart()) {
        wp_enqueue_script('wc-cart', get_template_directory_uri() . '/woocommerce/assets/js/frontend/cart.js', ['jquery'], null, true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_woocommerce_ajax_scripts');

function product_list($product_num = 4) {
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $product_num,
        'orderby'        => 'date',
        'order'          => 'DESC'
    );

    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            global $product;

            ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="product">
                        <?php
                            if ($product->regular_price != $product->price) {
                        ?>
                            <span class="badge badge-success">Akciós!</span>  
                        <?php
                        }
                        ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                            <h3 title="<?php the_title(); ?>"><?php the_title(); ?></h3>
                            <?php woocommerce_template_loop_price(); ?>
                            <?php woocommerce_template_loop_add_to_cart(); ?>
                        </a>
                    </div>
                </div>
            <?php
        }
    }
    wp_reset_postdata();
}

function popular_categories($category_num = 5) {
    $taxonomy     = 'product_cat';
    $categories   = get_terms(array(
        'taxonomy'   => $taxonomy,
        'hide_empty' => true, // Csak olyan kategóriákat mutatunk, amelyekben van termék
    ));

    if (!empty($categories) && !is_wp_error($categories)) {
        // Rendezzük a kategóriákat a legtöbb terméket tartalmazóra
        usort($categories, function($a, $b) {
            return $b->count - $a->count;
        });

        // Csak a kívánt számú kategóriát mutassuk
        $categories = array_slice($categories, 0, $category_num);

        foreach ($categories as $category) {
            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
            $image_url    = wp_get_attachment_url($thumbnail_id);
            $link         = get_term_link($category);
            
            echo '<div class="col-12 col-sm-6 col-md-4">
            <div class="category">
            ';
            echo '<a href="' . esc_url($link) . '">';
            if ($image_url) {
                echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($category->name) . '">';
            } else {
                echo '<img src="' . esc_url(wc_placeholder_img_src()) . '" alt="' . esc_attr($category->name) . '">'; // Helyettesítő kép, ha nincs kép beállítva
            }
            echo '<h4>' . esc_html($category->name) . '</h4>';
            echo '<p>' . esc_html($category->count) . ' termék</p>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
        }
    }
}

function sajat_cf7_form_script() {
    if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
        wpcf7_enqueue_scripts();
    }
    if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
        wpcf7_enqueue_styles();
    }
}
add_action( 'wp_enqueue_scripts', 'sajat_cf7_form_script' );


function custom_woocommerce_add_to_cart_class($html, $product, $args) {
    // Az alapértelmezett gombos osztályok megőrzése
    $custom_class = 'cta cta-secondary'; // Ezt a class-t adja hozzá

    // Az osztályokat tartalmazó attribútum módosítása
    $html = str_replace('button', 'button ' . $custom_class, $html);

    return $html;
}
add_filter('woocommerce_loop_add_to_cart_link', 'custom_woocommerce_add_to_cart_class', 10, 3);


function add_cart_icon_to_menu($items, $args) {
    // Csak az elsődleges menühöz adjuk hozzá
    if ($args->theme_location == 'primary') {
        $cart_url = wc_get_cart_url(); // WooCommerce kosár oldal URL
        $cart_count = WC()->cart->get_cart_contents_count(); // Kosárban lévő termékek száma

        // Kosár ikon HTML (Ha üres, akkor csak ikon, ha van benne termék, mutassa a számot)
        $cart_item = '<li class="menu-item cart-menu">';
        $cart_item .= '<a href="' . esc_url($cart_url) . '">';
        $cart_item .= '<i class="fas fa-shopping-cart"></i>'; // FontAwesome ikon, vagy helyette SVG
        if ($cart_count > 0) {
            $cart_item .= ' <span class="cart-count">' . esc_html($cart_count) . '</span>';
        }
        $cart_item .= '</a></li>';

        $items .= $cart_item;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_cart_icon_to_menu', 10, 2);

?> 