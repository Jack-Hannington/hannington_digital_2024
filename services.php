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
<div class="row container py-5" style="height:2000px">
<div class="service-menu-container row col-md-3 col-12">
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
