<?php
/* Template Name: Blog */
get_header(); ?>

<div class="container">
    <h1 class="my-4">Blog</h1>
    
    <?php
    $args = array(
        'post_type'      => 'post',  // Csak a blogbejegyzéseket kérdezzük le
        'posts_per_page' => 10,      // 10 cikk megjelenítése oldalonként
        'paged'          => get_query_var('paged') ? get_query_var('paged') : 1, // Oldalazás
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <article class="blog-post">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p class="post-meta"><?php the_time('Y. F j.'); ?> | <?php the_author(); ?></p>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="read-more">Tovább olvasom...</a>
            </article>
        <?php endwhile; ?>

        <div class="pagination">
            <?php
            echo paginate_links(array(
                'total' => $query->max_num_pages
            ));
            ?>
        </div>
    <?php else : ?>
        <p>Nincsenek bejegyzések.</p>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>
