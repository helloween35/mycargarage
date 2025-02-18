<?php
/**
 * Template Name: Kapcsolat Oldal
 * Description: Egyedi sablon a kapcsolat oldalhoz.
 */
get_header(); ?>

<div class="container contact-page">
    <img class="background" src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-bg-4.svg" alt="" />

    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <h2>Üzenj nekünk</h2>
            <?php echo do_shortcode('[contact-form-7 id="d5099f7"]'); ?>
        </div>
        <div class="col-4"></div>
    </div>
</div>

<?php get_footer(); ?>
