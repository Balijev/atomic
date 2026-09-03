<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="site-header">
        <div class="container">
            <div class="header-content">
                <a href="<?php echo home_url(); ?>" class="logo font-serif">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="Lehoia Logo" style="height: 40px; width: auto;">
                </a>

                <?php wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'container' => 'nav',
                    'container_class' => 'main-navigation',
                    'menu_class' => 'nav-menu',
                )); ?>

                <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="btn btn-gold">Kontakt</a>
            </div>
        </div>
    </header>

    <main id="main-content">