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
                    <a href="<?php echo get_the_permalink(); ?>" class="photo_link">

                    <?php the_post_thumbnail(); ?>
                        <div class="overlay">
                            <img class="eye" src="<?php echo get_template_directory_uri(); ?>/assets/eye.png" alt="eye">
                            <img class="fullscreen" src="<?php echo get_template_directory_uri(); ?>/assets/fullscreen.png" alt="fullscreen">
                        </div></a>
                </div>
                   
        <?php endif; ?>

        <?php endwhile; ?>

    </div>
</section>