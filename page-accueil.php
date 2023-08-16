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

<div class="filtre">
    <div class="filtre_taxo">
        <div class="filtre_categ">
            <label for="categorie">CATEGORIES</label>
            <form class="js-filter-form" method="post">
                <?php
                $terms = get_terms('categorie');
                $select = "<div class='filtre'><select name='categorie' id='cat1' class='postform'>";
                $select .= "<option value='-1'></option>";
                foreach ($terms as $term) {
                    if ($term->count > 0) {
                        $select .= "<option value='" . $term->slug . "'>" . $term->name . "</option>";
                    }
                }
                $select .= "</select></div>";
                echo $select;
                ?>
            </form>
        </div>
        <div class="filtre_form">
            <label for="format">FORMAT</label>
            <form class="js-filter-form" method="post">
                <?php
                $terms = get_terms('format');
                $select = "<div class='filtre'><select name='format' id='format1' class='postform'>";
                $select .= "<option value='-1'></option>";
                foreach ($terms as $term) {
                    if ($term->count > 0) {
                        $select .= "<option value='" . $term->slug . "'>" . $term->name . "</option>";
                    }
                }
                $select .= "</select></div>";
                echo $select;
                ?>
            </form>
        </div>
    </div>
    <div class="filtre_date">
    <form class="js-filter-form" method="post">
        <div class='date'>
            <label for="date">Trier par</label>
            <select name='date' id='date1' class='postform'>
                <option value='-1'>Trier par</option>
                <option value='nouveaute'>Nouveauté</option>
                <option value='anciens'>Les plus anciens</option>
            </select>
        </div>
    </form>
</div>

</div>

<div class="photos_accueil">
  <?php
  $query = new WP_Query(array(
    'posts_per_page' => 8,
    'post_type' => 'photo'
  ));

  // Utilisation du template photo_block.php pour chaque photo
  if ($query->have_posts()) :
      // Inclure le template photo_block.php
      include get_template_directory() . '/templates_parts/photo_block.php';
    wp_reset_postdata();
  endif;
  ?>
</div> 

  <input type="button" class="btn_photos btn_accueil" Value="Charger plus" id="load-more">

<?php get_footer(); ?>
