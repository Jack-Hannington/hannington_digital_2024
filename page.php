<?php
get_header();
?>


<?php
/**
 * Template Name: Page
 *
 * Displays a page with only the page title.
 */
?>

<!-- <h1><?php the_title(); ?></h1> -->
<?php
$post = get_post();
?>

<div class="">   <?php the_content(); ?></div>

<!-- add wordpress page content using php -->


<?php
get_footer();
?>
