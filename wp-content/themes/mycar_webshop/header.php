<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- stat nav -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/full-logo.png" alt="<?php bloginfo('name'); ?>" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
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
            <!--
            <ul class="navbar-nav"> 
                <li class="nav-item">
                    <a class="nav-link active-link" aria-current="page" href="/">Kezdőlap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/termekek">Termékek</a>
                </li>
                <li class="nav-item">
                    <button class="nav-link nav-search-link" type="button" title="Kosaram">
                        <i class="fa fa-search"></i>
                        <span class="d-inline-block d-md-none">Keresés</span>
                    </button>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-cart-link" href="/kosaram" title="Kosaram">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="d-inline-block d-md-none">Kosaram</span>
                    </a>
                </li>
            </ul>
            -->
        </div>
    </div>
</nav>
<div class="navbar-search">
    <form action="/kereses">
        <input type="text" class="search-input" name="search" placeholder="Keresés a termékek közt" autocomplete="off" />
    </form>
</div>
<!-- end nav -->