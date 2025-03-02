<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?></title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- stat nav -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/full-logo.png" alt="<?php bloginfo('name'); ?>" />
        </a>
        <button 
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fa-solid fa-bars"></i> 
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php 
                wp_nav_menu(array(
                    'theme_location' => 'primary', // A regisztrált menü helye
                    'menu_class' => 'navbar-nav', // Alapértelmezett navbar stílus
                    'container' => false,
                    'fallback_cb' => '__return_false',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                ));
            ?>
        </div>
    </div>
    <div class="navbar-search <?php echo isset($_GET['search']) ? 'opened-search' : '' ?>">
        <form action="/uzlet">
            <input
                type="text"
                class="search-input"
                name="search"
                placeholder="Keresés a termékek közt"
                autocomplete="off"
                value="<?php echo $_GET['search'] ?? '' ?>"
            />
        </form>
    </div>
</nav>


<!-- end nav -->