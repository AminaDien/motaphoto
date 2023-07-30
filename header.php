<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body>

<nav class="menu-h">
    <div class="logo">
        <a href="<?php echo esc_url(home_url('accueil')); ?>"><img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/assets/logo.png'); ?>" alt="Logo"></a>
    </div>

    <div class="buttonmenu">

    <?php
    /* Affiche le menu "Menu principal" enregistré au préalable */
    wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class' => 'menu-pages'
    ]);
    ?>
</nav>
