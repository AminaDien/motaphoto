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
                        <button class="open-lightbox ouvrir-lightbox" data-img-url="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
                        data-categ="<?php
                               $categories = get_the_terms(get_the_ID(), 'categorie');
                               if ($categories && !is_wp_error($categories)) {
                                   // Vérifie si la variable $categories existe et n'est pas une erreur de WordPress
                                   $category_names = array(); // Crée un tableau vide pour stocker les noms des catégories
                                   foreach ($categories as $category) {
                                       // Parcourt chaque terme de taxonomie dans $categories
                                       $category_names[] = $category->name;
                                       // Ajoute le nom de la catégorie courante au tableau $category_names
                                   }
                                   echo implode(', ', $category_names);
                                   // Concatène les noms des catégories avec une virgule comme séparateur
                               } ?>">
                         <img class="fullscreen ouvrir-lightbox" src="<?php echo get_template_directory_uri(); ?>/assets/fullscreen.png" alt="fullscreen">
                        </button>
                        </div>
                        </a>
                    <div class="photo-details">
                <p class="photo-title"><?php the_title(); ?></p>
                <p class="photo-category"><?php echo strip_tags(get_the_term_list($post->ID, 'categorie')); ?></p>
                    </div>
                </div>
                </div>
    </div>
                   
        <?php endif; ?>

        <?php endwhile; ?>

    </div>
</section>