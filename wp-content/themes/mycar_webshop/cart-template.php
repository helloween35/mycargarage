<?php
/**
 * Template Name: Kosár Oldal
 * Description: Egyedi sablon a kosár oldalhoz.
 */
get_header();
?>


<?php 
    echo get_post_meta(get_the_ID(), 'has_footer', true);
?>



<div class="container-fluid">
    <img class="background" src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-bg-4.svg" alt="" />

    <div class="row">
        <div class="col-12">
            <h2>Kosár tartalma</h2>
            <p>
                Innen már csak egy lépés, kérjük mielőtt továbblépnél, ellenőrizd a kosarad tartalmát.
            </p>

            <?php echo do_shortcode('[woocommerce_cart]'); ?> 
        </div>
    </div>
</div>

<?php get_footer(); ?>