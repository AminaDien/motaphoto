<?php get_header(); ?>

<div id="heroheader">
  <?php
  $the_query = new WP_Query(array(
    'orderby' => 'rand', // triés de manière aléatoire
    'posts_per_page' => 1, // une seule photo sera affichée à la fois
    "post_type" => 'photo'
  ));
  //output the random post
  while ($the_query->have_posts()) : $the_query->the_post();
    the_post_thumbnail('full', array('class' => 'hero-image'));
  endwhile;
  //Reset Post Data
  wp_reset_postdata();
  ?>
  <h1>PHOTOGRAPHE EVENT</h1>
</div>


<div id="photo-list">
  <?php
  $photo_query = new WP_Query(array(
    'orderby' => 'date',
    'posts_per_page' => -1,
    'post_type' => 'photo'
  ));

  // Utilisation du template photo_block.php pour chaque photo
  if ($photo_query->have_posts()) :
    while ($photo_query->have_posts()) : $photo_query->the_post();
      // Inclure le template photo_block.php
      include get_template_directory() . '/templates_parts/photo_block.php';
    endwhile;
    wp_reset_postdata();
  endif;
  ?>
</div>


<?php get_footer(); ?>
