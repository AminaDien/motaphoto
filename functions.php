<?php
// s'il y a plusieurs menus à rajouter, il faut passer par un tableau, voici le code :
function register_my_menus() {
 register_nav_menus(
 array(
 'main-menu' => __( 'Menu principal' ),
 'footer-menu' => __( 'Menu Footer' ),
 )
 );
}
add_action( 'init', 'register_my_menus' );
// ajout de mon style 
function enqueue_custom_styles() {
    wp_enqueue_style( 'custom-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_styles' );
