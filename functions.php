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
    wp_enqueue_style( 'my-custom-style', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_styles' );


// ajout de mon JS 
function enqueue_custom_scripts() {
    wp_enqueue_script( 'custom-scripts', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script('lightbox',get_stylesheet_directory_uri() . '/lightbox.js', array(),'1.0', true);
}
  
  add_action( 'wp_enqueue_scripts', 'enqueue_custom_scripts' );

 // Hook contact
 
 function add_search_form2($items, $args)
{
    if ($args->theme_location == 'main-menu') {
        $items .= '<button id="myBtn" class="myBtn contact header " > CONTACT </button>';
    } else {
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'add_search_form2', 10, 2);

function montheme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption')); }
add_action('after_setup_theme', 'montheme_supports');

// Fonction pour charger plus de photos en AJAX
function load_more_photos() {
    $page = $_POST['page'];
    $offset = ($page - 1) * 8; // Calculer l'offset
  
    $query = new WP_Query(array(
      'posts_per_page' => 8,
      'post_type' => 'photo',
      'offset' => $offset
    ));
  
    ob_start(); // Commencer la mise en mémoire tampon de sortie
    include get_template_directory() . '/templates_parts/photo_block.php';
    wp_reset_postdata();
    $response = ob_get_clean(); // Récupérer la sortie mise en mémoire tampon
  
    echo $response; // Renvoyer les photos au format HTML
  
    die(); // Terminer la requête AJAX
  }
  add_action('wp_ajax_load_more_photos', 'load_more_photos');
  add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');
  