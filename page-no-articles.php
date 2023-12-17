<?php
get_header();
?>


<?php
/**
 * Template Name: Page with no articles
 *
 * Displays a page with only the page title.
 */
?>


<?php
$post = get_post();
?>
<div style="padding-bottom: 20px;">
<div class="container">  
    <div class="header">
        <h1><?php the_title(); ?></h1> 
    </div>
    <?php the_content(); ?>
</div>
</div>


<?php
get_footer();
?>
