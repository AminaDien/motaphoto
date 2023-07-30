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
		<div class="post-content">
          		<?php the_content(); ?>
    	</div>
      </div>
	  <div class="sous_partie">
			<p>Cette photo vous intéresse ?
			<a href="http://motaphoto.local/contact/"><button id="lienmodale">Contact</button></a>
			</p>
			<div class="carr">
				<?php the_post_thumbnail(); ?>
				<p class="carrousel">
					<?php $prevPost = get_previous_post();
					$prevLink = get_permalink($prevPost);?>
					<a href="<?php echo $prevLink; ?>">
						<img class="arrow_left"src="<?php echo get_template_directory_uri(); ?>/assets/gauche.jpg" alt="fleche_gauche">
					</a>
					<?php $prevNext = get_next_post();
					$prevLinkNext = get_permalink($prevNext);?>
					<a href="<?php echo $prevLinkNext; ?>">
						<img class="arrow_right" src="<?php echo get_template_directory_uri(); ?>/assets/droite.jpg" alt="fleche_droite">
					</a>
				</p>
			</div>
	  </div>
    <?php endwhile; ?>
  <?php endif; ?>
  	<div>
  		<p>VOUS AIMEREZ AUSSI</p>
				<div  id="photosapp">
				<?php get_template_part( 'photo_block', get_post_format() ); ?>
				</div>
				<a href="http://motaphoto.local/accueil/"><button class="photos" id="lienacc">Toutes les photos </button></a>
	</div>

</main>
<?php
	get_footer();
?>