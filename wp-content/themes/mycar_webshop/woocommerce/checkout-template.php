<?php
/**
 * Template Name: Pénztár Oldal
 * Description: Egyedi sablon a pénztár oldalhoz.
 */
get_header();
?>

<div class="container-fluid">
    <img class="background" src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-bg-4.svg" alt="" />

    <div class="row">
        <div class="col-12">
            <h2>Pénztár</h2>

            <p>
                Kérjük add meg az adataid és kész is a megrendelésed!
            </p>

            <?php echo do_shortcode('[woocommerce_checkout]'); ?> 
        </div>
    </div>
</div>

<?php get_footer(); ?>