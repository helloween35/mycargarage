<?php get_header(); ?>

    <div class="container product-list my-5">
        <div class="row">
            <div class="col-12 mb-4">
                <h2>Termékeink</h2>
            </div>

            <div class="col-12">
                <div class="product-list-header">
                    <?php
                        do_action( 'woocommerce_before_shop_loop' );
                    ?>
                </div>
            </div>

            <?php product_list(); ?>
        </div>
    </div>

<?php get_footer(); ?>