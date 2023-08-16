<div class="photos_suivantes">
  <?php
  $query = new WP_Query(array(
    'post_type' => 'photo',
    'posts_per_page' => 8,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => 2,
  ));

  // Utilisation du template photo_block.php pour chaque photo
  if ($query->have_posts()) :
      // Inclure le template photo_block.php
      include get_template_directory() . '/templates_parts/photo_block.php';
    wp_reset_postdata();
  endif;
  ?>
</div> 