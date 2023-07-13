<?php
/* Affiche le menu "Menu footer" enregistré au préalable */
wp_nav_menu([
    'theme_location' => 'footer-menu',
    'menu_class' => 'menu-f'
]);
?>
<?php wp_footer() ?>
</body>
</html>