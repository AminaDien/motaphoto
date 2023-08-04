<?php get_header(); ?>
<main class="main">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="post">
		<div class="post-info">
			<h1><?php the_title(); ?></h1>
				RÉFÉRENCE : <span id="ref-photo"> <?php echo get_field ('reference');?></span><br>
				CATÉGORIE : <?php echo strip_tags(get_the_term_list($post->ID, 'categorie'));?><br>
				FORMAT : <?php echo strip_tags(get_the_term_list($post->ID, 'format' ));?><br>
				TYPE :  <?php echo get_field('type');?><br>
       		 	ANNÉE :<?php the_date(' Y'); ?><br>
		</div>
		<?php if (has_post_thumbnail()): ?>
        <img src="<?php the_post_thumbnail_url(array(500, 500)); ?>" alt="<?php the_title_attribute(); ?>" class="post-thumbnail" />
        <?php endif; ?>
      </div>
	  <div class="sous_partie">
			<p>Cette photo vous intéresse ?</p>
			<a><button class="myBtn" id="lienmodale">Contact</button></a>
			
		<div class="photo_choix">
    <div class="photo_avant">
        <?php
        $prev_post = get_previous_post();
        if (!empty($prev_post)) {
            $prev_image = get_the_post_thumbnail_url($prev_post->ID);
            echo '<a href="' . get_permalink($prev_post) . '" rel="prev" class="arrow-link arrow-left"><img src="' . get_template_directory_uri() . '/assets/gauche.jpg"></a>';
            echo '<img src="' . $prev_image . '" alt="' . $prev_post->post_title . '" width="75" height="75" class="photo-hover photo-left">';
        }
        ?>
    </div>
    <div class="photo_apres">
        <?php
        $next_post = get_next_post();
        if (!empty($next_post)) {
            $next_image = get_the_post_thumbnail_url($next_post->ID);
            echo '<img src="' . $next_image . '" alt="' . $next_post->post_title . '" width="75" height="75" class="photo-hover photo-right">';
            echo '<a href="' . get_permalink($next_post) . '" rel="next" class="arrow-link arrow-right"><img src="' . get_template_directory_uri() . '/assets/droite.jpg"></a>';
        }
        ?>
    </div>
</div>
	  </div>
    <?php endwhile; ?>
  <?php endif; ?>
  <div class="section3">
        <h2>VOUS AIMEREZ AUSSI</h2>
                <div  id="photosapp">
	<?php include_once "templates_parts/photo_block.php"; ?>   
  <a href="<?php echo home_url()?>"><button class="btn_photos" id="lienacc">Toutes les photos </button></a>             
	</div>
</main>
<?php
	get_footer();
?>