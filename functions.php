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
    wp_enqueue_script('lightbox',get_template_directory_uri() . '/lightbox.js', array(),'1.0', true);
    wp_enqueue_script('ajax',get_template_directory_uri() . '/ajax.js', array(),'1.0', true);
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

function weichie_load_more()
{
    $ajaxposts = new WP_Query([
        'post_type' => 'photo',
        'posts_per_page' => 1,
        'paged' => $_POST['paged'],
    ]);

    $response = '';

    if ($ajaxposts->have_posts()) {
        while ($ajaxposts->have_posts()):
            $ajaxposts->the_post();
            $response .= get_template_part('card', 'photo');
        endwhile;
    } else {
        $response = '';
    }

    echo $response;
    exit;
}
add_action('wp_ajax_weichie_load_more', 'weichie_load_more');
add_action('wp_ajax_nopriv_weichie_load_more', 'weichie_load_more');

function filter_post()
{

    // Récupère les catégories sélectionnées depuis la requête POST
    $cat = isset($_POST['categorie']) ? sanitize_text_field($_POST['categorie']) : '';
    $format = isset($_POST['format']) ? sanitize_text_field($_POST['format']) : '';
    $date = isset($_POST['date']) ? sanitize_text_field($_POST['date']) : '';

    // Définit les arguments de la requête WP_Query
    $args = array(
        'post_type' => 'photo',
        // Type de publication : "photo"
        'posts_per_page' => 8,
        // Nombre de publications à afficher par page
        'paged' => 1,
        // Numéro de page
        'tax_query' => array(
            // Requête de taxonomie pour filtrer par catégorie et format
            array(
                'taxonomy' => 'categorie',
                // Taxonomie : "categorie"
                'field' => 'slug',
                // Champ utilisé pour la correspondance : slug
                'terms' => ($cat == -1 ? get_terms('categorie', array('fields' => 'slugs')) : $cat) // Termes de la catégorie à filtrer
            ),
            array(
                'taxonomy' => 'format',
                // Taxonomie : "format"
                'field' => 'slug',
                // Champ utilisé pour la correspondance : slug
                'terms' => ($format == -1 ? get_terms('format', array('fields' => 'slugs')) : $format) // Termes du format à filtrer
            )
        ),
        'orderby' => ($date === 'anciens') ? 'date' : 'date',
        // Tri par date (plus ancien ou plus récent)
        'order' => ($date === 'anciens') ? 'ASC' : 'DESC', // Tri ascendant (plus ancien) ou descendant (plus récent)
    );

    // Effectue la requête WP_Query avec les arguments définis
    $ajaxfilter = new WP_Query($args);

    // Vérifie si des publications ont été trouvées
    if ($ajaxfilter->have_posts()) {
        ob_start(); // Démarre la mise en mémoire tampon

        // Boucle while pour parcourir les publications
        while ($ajaxfilter->have_posts()):
            $ajaxfilter->the_post();
            // Affiche le code HTML de chaque publication
            ?>

            <div class="nouveau_block"
                data-category="<?php echo esc_attr(implode(',', wp_get_post_terms(get_the_ID(), 'categorie', array('fields' => 'slugs')))); ?>"
                data-format="<?php echo esc_attr(implode(',', wp_get_post_terms(get_the_ID(), 'format', array('fields' => 'slugs')))); ?>">
                <div class="photo_newunephoto">
                    <?php the_content(); ?>
                    <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail(); ?>
       
                <?php endif; ?>

            </div>
            </div>
            <?php
        endwhile;

        wp_reset_query(); // Réinitialise la requête
        wp_reset_postdata(); // Réinitialise les données de publication

        $response = ob_get_clean(); // Récupère le contenu de la mise en mémoire tampon
    } else {
        $response = '<p>Aucun article trouvé.</p>'; // Aucune publication trouvée
    }

    echo $response; // Affiche la réponse
    exit; // Termine la fonction
}

add_action('wp_ajax_filter_post', 'filter_post');
add_action('wp_ajax_nopriv_filter_post', 'filter_post');