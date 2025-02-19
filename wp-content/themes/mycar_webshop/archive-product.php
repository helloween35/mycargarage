<?php get_header(); ?>

    <div class="container product-list my-5">
        <div class="row">
            <div class="col-12 mb-4">
                <h2>Termékdsafsdsdeink</h2>
            </div>

            <div class="col-12">
                <div class="product-list-header">
                    <?php
                        do_action( 'woocommerce_before_shop_loop' );
                    ?>
                </div>
            </div>

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="product">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                                <h3 title="<?php the_title(); ?>"><?php the_title(); ?></h3>
                                <?php woocommerce_template_loop_price(); ?>
                                <?php woocommerce_template_loop_add_to_cart(); ?>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="alert alert-warning">Nincs elérhető termék.</div>
            <?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>