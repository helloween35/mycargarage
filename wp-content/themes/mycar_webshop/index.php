<?php get_header(); ?>

<div class="slider">
    <div class="slide">
        <div class="slide__data">
            <h2>
                <strong>Lorem ipsum</strong> <br> 530 kenőanyag
            </h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                Fugit praesentium cupiditate facere impedit ad atque.
            </p>

            <button class="cta cta-primary mr-2">Tovább a termékhez</button>
            <button class="cta cta-secondary">Tovább a termékhez</button>
        </div>
        <div class="slide__image">
            img...
        </div>
    </div>

    <img class="slider__background" src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-bg-4.svg" alt="" />
</div>

<div class="container">


    <div class="row">
        <div class="col-12 text-center my-4">
            <h2>Főbb termékeink</h2>
        </div>

        <div class="col-12">
            <div class="product-list">
                <div class="row">
                    <?php product_list(4); ?>
                </div>
            </div>

            <a href="/uzlet">További termékek</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 text-center">
            <h2>Főbb kategóriáink</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum neque quaerat aliquam.</p>
        </div>

        <div class="col-12">
            <div class="category-list">
                <div class="row">
                    <?php popular_categories(3); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
