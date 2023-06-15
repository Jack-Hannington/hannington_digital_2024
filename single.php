<?php
get_header();
?>

<?php
/**
 * Template Name: Altius post page
 *
 * Displays a page with only the page title.
 */
?>
<div class="container py-5 menu-services-container">
  <div class="row">
    <div class="col-md-3 col-12">
      <button id="services-toggle" class="wp-block-button__link hwp-block-button__link.is-style-outline">See all services</button>
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
  <div class="row">
    <div class="col-md-12 col-12 py-5">
      <h4>Related blog posts</h4>
    </div>
  </div>
</div>
<?php
get_footer();
?>