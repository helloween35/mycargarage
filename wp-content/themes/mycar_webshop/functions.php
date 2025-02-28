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
    wp_enqueue_script('jquery-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', [], null, true);

    // Bootstrap JS + Popper
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
  
    // Saját script
    wp_enqueue_script('myshop-scripts', get_template_directory_uri() . '/assets/js/index.js', [], null, true);
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

function product_list($product_num = -1, $paged = true, $related = false, $category_id = null) {
    global $post;

    // Ha kapcsolódó termékeket kérünk egy termékoldalon
    if ($related && is_product()) {
        $terms = wp_get_post_terms($post->ID, 'product_cat');
        if (!empty($terms)) {
            $category_id = array_map(function ($term) {
                return $term->term_id;
            }, $terms);
        }
    }

    // WooCommerce beépített rendezési opciók kezelése
    $orderby = 'date';
    $order = 'DESC';

    if (!empty($_GET['orderby'])) {
        switch ($_GET['orderby']) {
            case 'popularity':
                $orderby = 'meta_value_num';
                $meta_key = 'total_sales';
                break;
            case 'rating':
                $orderby = 'meta_value_num';
                $meta_key = '_wc_average_rating';
                break;
            case 'price':
                $orderby = 'meta_value_num';
                $meta_key = '_price';
                $order = 'ASC';
                break;
            case 'price-desc':
                $orderby = 'meta_value_num';
                $meta_key = '_price';
                $order = 'DESC';
                break;
            default:
                $orderby = 'date';
                $order = 'DESC';
        }
    }

    // Alap WP_Query argumentumok
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => ($product_num == -1 ? 12 : $product_num),
        'orderby'        => $orderby,
        'order'          => $order,
        'paged'          => ($paged ? get_query_var('paged') : 1),
    );

    // Ha ár vagy értékelés szerint rendezünk, be kell állítani a meta_query-t
    if (!empty($meta_key)) {
        $args['meta_key'] = $meta_key;
    }

    // Kategória szűrés, ha van megadva
    if (!empty($category_id)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $category_id,
            ),
        );
    }

    // Kapcsolódó termékek esetén kizárjuk az aktuális terméket
    if ($related && is_product()) {
        $args['post__not_in'] = array($post->ID);
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        ob_start();
        while ($query->have_posts()) : $query->the_post();
            global $product;
            ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="product">
                    <?php if ($product->get_regular_price() != $product->get_price()) : ?>
                        <span class="badge badge-success">Akciós!</span>
                    <?php endif; ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                        <h3 title="<?php the_title(); ?>"><?php the_title(); ?></h3>
                        <?php woocommerce_template_loop_price(); ?>
                        <div class="custom-add-to-cart">
                            <?php woocommerce_template_loop_add_to_cart(); ?>
                        </div>
                    </a>
                </div>
            </div>
            <?php
        endwhile;

        // Lapozás
        if ($paged) : ?>
            <div class="pagination">
                <?php echo paginate_links(array('total' => $query->max_num_pages)); ?>
            </div>
        <?php endif;

        wp_reset_postdata();
        echo ob_get_clean();
    else :
        echo '<p>Nincsenek termékek.</p>';
    endif;
}

function get_blog_posts($posts_per_page = -1, $paged = true) {
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $posts_per_page, 
        'paged'          => ($paged ? get_query_var('paged') : 1), // Ha kell lapozás
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        ob_start(); // Output buffer kezdése
        while ($query->have_posts()) : $query->the_post(); ?>
            <div class="col-12 col-sm-6 col-md-3 mb-3">
                <article class="article">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="article__thumbnail">
                            <?php the_post_thumbnail('medium'); ?> 
                        </a>
                    <?php endif; ?>

                        <h3 class="article__title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <p class="article__post-meta">
                            <?php the_time('Y. F j.'); ?>
                        </p>
                        <div class="article__lead">
                            <?php the_excerpt(); ?>
                        </div>
                </article>
            </div>
        <?php endwhile; 
        
        if ($paged) : ?>
            <div class="pagination">
                <?php echo paginate_links(array('total' => $query->max_num_pages)); ?>
            </div>
        <?php endif;

        wp_reset_postdata();
        echo ob_get_clean(); // Visszaadja a generált HTML-t
    else :
        echo '<p>Nincsenek bejegyzések.</p>';
    endif;
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