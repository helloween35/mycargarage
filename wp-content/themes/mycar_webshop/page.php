<?php get_header(); ?>

<main class="container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_title('<h1>', '</h1>');
            the_content();
        endwhile;
    else :
        echo '<p>Nincs találat.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>
