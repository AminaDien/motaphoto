<section>
   
    <div class="photo_aleatoire">

            <!-- //On parcourt chacun des articles résultant de la requête -->
            <?php $count = 0; ?>
            <?php while ($query->have_posts()): ?>
                <?php $count++; ?>
                <?php $query->the_post(); ?>


                <?php the_content(); ?>
                <?php if (has_post_thumbnail()): ?>

                    <div class="photo_aimerezaussi">
                        <?php the_post_thumbnail(); ?>
                       
                    </div>
                   
                <?php endif; ?>

            <?php endwhile; ?>
        </div>
    
       
</section>
