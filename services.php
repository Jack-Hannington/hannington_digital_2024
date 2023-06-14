<?php
get_header();
?>


<?php
/**
 * Template Name: Altius services page
 *
 * Displays a page with only the page title.
 */
?>
<div class="container py-5 menu-services-container">
<button id="services-toggle" class="wp-block-button__link hwp-block-button__link.is-style-outline">See all services</button>
<div class="row col-md-3 col-12">
  
<?php wp_nav_menu(array(
            'theme_location' => 'services-menu',
            'menu_class' => 'services-menu',
            'fallback_cb' => false
        )); ?>
</div>
<div class="col-md-9 col-12">
<?php the_content(); ?>
</div>
</div>

<?php
get_footer();
?>
