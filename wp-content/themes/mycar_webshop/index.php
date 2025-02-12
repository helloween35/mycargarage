<?php get_header(); ?>


<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<?php echo do_shortcode('[metaslider id="86"]'); ?>
		</div>
	</div>

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
