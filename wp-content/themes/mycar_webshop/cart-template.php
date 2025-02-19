<?php
/**
 * Template Name: Kosár Oldal
 * Description: Egyedi sablon a kosár oldalhoz.
 */
get_header();
?>

<div class="container contact-page">
    <img class="background" src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-bg-4.svg" alt="" />

    <div class="row">
        <div class="col-12">
            <h2>Kosár tartalma</h2>

            <p>
                Ha kérdésed van, írd meg nekünk, kollégáink 1-2 munkanapon belül válaszolni fognak.
            </p>

            <?php echo do_shortcode('[woocommerce_cart]'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>