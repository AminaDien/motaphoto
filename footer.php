<?php
/* Affiche le menu "Menu footer" enregistré au préalable */
wp_nav_menu([
    'theme_location' => 'footer-menu',
    'menu_class' => 'menu-f'
]);?>

<?php get_template_part('templates_parts/modale'); ?>

<?php wp_footer() ?>
</body>
</html>
