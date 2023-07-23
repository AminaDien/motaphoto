<?php get_header(); ?>
<main class="main">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="post">
			<div class="post-info">
        		<p>
					<h1><?php the_title(); ?></h1>
					Référence : <span id="ref-photo"> <?php echo get_field ('reference');?></span><br>
					Categorie : <?php echo strip_tags(get_the_term_list($post->ID, 'categorie'));?><br>
					Format : <?php echo strip_tags(get_the_term_list($post->ID, 'format' ));?><br>
					Type :  <?php echo get_field('type');?><br>
       			 	Année :<?php the_date(' Y'); ?><br>
       	 		</p>
			</div>

      </div>
</main>
<?php
	endwhile; endif;
	get_footer();
?>