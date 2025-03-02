<?php get_header(); ?>

<div class="container-fluid">
    <img class="background" src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-bg-4.svg" alt="" />

    <div class="row">
        <div class="col-12">
            <div class="single-article">
                <h2>
                    <?php the_title(); ?>
                </h2>

                <p>
                    <span class="author"><?php the_author(); ?></span> - 
                    <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                </p>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <article class="single-article">
                <?php if (has_post_thumbnail()) : ?>
                    <figure class="single-article__thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </figure>
                <?php endif; ?>

                <?php if (has_excerpt()) : ?>
                    <p class="single-article__lead">
                        <?php echo get_the_excerpt(); ?>
                    </p>
                <?php endif; ?>

                <div class="single-article__content">
                    <?php the_content(); ?>
                </div>

                <?php if (has_tag()) : ?>
                    <p class="single-article__tags">
                        <?php the_tags('', ', ', ''); ?>
                    </p>
                <?php endif; ?>

            </article>
        </div> 

        <div class="col-12 col-lg-4">        
            <section class="vertical-article-list pl-5">
                <h3><?php _e('Kapcsolódó cikkek', 'textdomain'); ?></h3>
                <ul>
                    <?php
                    $categories = wp_get_post_categories(get_the_ID());
                    $related_args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 3,
                        'post__not_in'   => array(get_the_ID()), // Ne mutassa a jelenlegi cikket
                        'category__in'   => $categories,
                        'orderby'        => 'date',
                        'order'          => 'DESC'
                    );
                    $related_query = new WP_Query($related_args);

                    if ($related_query->have_posts()) :
                        while ($related_query->have_posts()) : $related_query->the_post();
                            ?>
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                    <?php endif; ?>
                                    <span><?php the_title(); ?></span>
                                </a>
                            </li>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>' . __('Nincsenek kapcsolódó cikkek.', 'textdomain') . '</p>';
                    endif;
                    ?>
                </ul>
            </section>
        </div>
    </div>
</div>

<?php get_footer(); ?>
