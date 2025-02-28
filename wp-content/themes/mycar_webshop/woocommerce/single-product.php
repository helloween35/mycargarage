<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <div class="container-fluid product-single">
        <img class="background" src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-bg-4.svg" alt="" />

        <div class="row">
            <div class="col-12">
            <?php
                if (!empty($_POST) && isset($_POST['add-to-cart']) && isset($_POST['quantity'])) {
                    echo '
                        <div class="woocommerce-info mb-4">A terméket sikeresen kosárba helyezted!</div>
                    ';
                }
            ?>
            </div>
            
            <!-- Termékkép -->
            <div class="col-7">
                <div class="product-single__image box">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            </div>

            <!-- Termék adatai -->
            <div class="col-5">
                <div class="product-single__data box">
                    <h2 class="product-single__title">
                        <?php the_title(); ?>
                    </h2>

                    <!-- Egyedi termék leírás -->
                    <div class="product-single__short-description">
                        <?php echo apply_filters('the_excerpt', get_the_excerpt()); ?>
                    </div>

                    <!-- Ár -->
                    <div class="product-single__price price price-lg">
                        <?php
                            if ($product->regular_price != $product->price) {
                                ?> 
                                    <del><?php echo number_format($product->regular_price, 0, '', ' '); ?> Ft</del>
                                <?php
                            }
                        ?>

                        <span><?php echo number_format($product->price, 0, '', ' '); ?> Ft</span>
                    </div>

                    <!-- Kosárba gomb egyedi markup-pal -->
                    <form class="product-single__add-to-cart-form" method="post">
                        <div class="custom-quantity">
                            <label for="quantity">Mennyiség:</label>
                            <input type="number" id="quantity" name="quantity" value="1" min="1">
                        </div>
                        
                        <button type="submit" name="add-to-cart" value="<?php echo get_the_ID(); ?>" class="cta cta-primary cta-icon">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Kosárba rakom</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Termékleírás -->
            <div class="col-12 mt-5">
                <div class="product-single__description box">
                    <h3>Termékleírás</h3>

                    <p>
                        <?php the_content(); ?>
                    </p>
                </div>
            </div>

            <div class="col-12 mt-5">
                <h3>Kapcsolódó termékek</h3>

                <div class="row">
                    <?php product_list(-1, false, true); ?>
                </div>
            </div>
        </div> 
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>
