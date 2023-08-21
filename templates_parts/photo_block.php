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
                <div class="photo_link">
                    <a href="<?php echo get_the_permalink(); ?>">

                    <?php the_post_thumbnail(); ?>
                        <div class="overlay">
                        <div class="diveye">
                        <a href="<?php the_permalink(); ?>"><img class="eye" src="<?php echo get_template_directory_uri(); ?>/assets/eye.png" alt="eye"></a>
                        </div>
                        <div class="divfull">
                        <button class="open-lightbox"><img class="fullscreen open-lightbox" src="<?php echo get_template_directory_uri(); ?>/assets/fullscreen.png" alt="fullscreen"></button>
                        </div>
                        </div>
                </div>
                </div>
                   
        <?php endif; ?>

        <?php endwhile; ?>

    </div>
</section>