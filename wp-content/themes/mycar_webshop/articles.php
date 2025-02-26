<?php
/* Template Name: Blog */
get_header();
?>

<div class="container-fluid">
    <h2 class="my-4">Blog</h2>
    <p>
        Olvasd el legfrissebb cikkeink...
    </p>

    <div class="row">
        <?php get_blog_posts(4, true); ?>
    </div>
</div>  


<?php get_footer(); ?>
