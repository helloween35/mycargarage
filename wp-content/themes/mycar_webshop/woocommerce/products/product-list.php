
<?php if (have_posts()) : ?>

<div class="container">
	<div class="row">
        <?php while (have_posts()) : the_post(); ?>
            <div class="col-12 col-sm-6 col-md-3">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium'); ?>
                    <h2><?php the_title(); ?></h2>
                    <?php woocommerce_template_loop_price(); ?>
                </a>
            </li>
        <?php endwhile; ?>
	</div>
</div>

<?php else : ?>
    <p>Nincs elérhető termék.</p>
<?php endif; ?>