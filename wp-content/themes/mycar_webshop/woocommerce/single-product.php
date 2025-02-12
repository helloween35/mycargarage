<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <div class="container product-container">
        <div class="row">
            <div class="col-7">
                <?php the_post_thumbnail('large'); ?>
            </div>
            <div class="col-5">
                <div class="product-data">
                    <h2><?php the_title(); ?></h2>

                    <?php woocommerce_template_single_excerpt(); ?>
                    <?php woocommerce_template_single_price(); ?>
                    <?php woocommerce_template_single_add_to_cart(); ?>
                </div>
            </div>

            <div class="col-12">
                <div class="product-description">
                    <h3>Termékleírás</h3>

                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>