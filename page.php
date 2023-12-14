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


<?php
$post = get_post();
?>
<div style="margin-bottom: -47px; padding-bottom: 20px;">
<div class="container">  
    <div class="header">
        <h1><?php the_title(); ?></h1> 
    </div>
    <?php the_content(); ?>
</div>
</div>
<div class="border-top py-5 mt-5">
    <div class="col-12 container">
      <h2 class="pb-3">Latest articles</h2>
      <?php
$current_page_title = strtolower(get_the_title()); // get the current page title and convert to lowercase

$recent_posts_args = array(
    'post_type' => 'post',
    'posts_per_page' => 3, // change this to display more or less posts
    'tag' => $current_page_title, // fetch posts with the tag that matches the page title
);

$recent_posts_query = new WP_Query( $recent_posts_args );

if( $recent_posts_query->have_posts() ) {
    echo '<div class="recent-posts row gap-4">';
    while( $recent_posts_query->have_posts() ) {
        $recent_posts_query->the_post();
        ?>
        <div class="recent-post col-lg-4 col-md-6 col-12">
        <a href="<?php the_permalink(); ?>"><?php 
            if ( has_post_thumbnail() ) { 
                $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                ?>
                <div class="post-image" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat center center; background-size: cover; padding-top: 56.25%;">
                </div>
                <?php
            } 
            ?>
            <h3 class="mt-2 recent-posts-title"><?php the_title(); ?></h3>
            <p>Read more -> </p>
            </a>
        </div>
        <?php
    }
    echo '</div>';
    wp_reset_postdata(); // reset the query
} else {
    // If no posts were found with the tag, fetch the most recent posts
    $recent_posts_args = array(
        'post_type' => 'post',
        'posts_per_page' => 3, // fetch the 3 most recent posts
    );

    $recent_posts_query = new WP_Query( $recent_posts_args );

    if( $recent_posts_query->have_posts() ) {
        echo '<div class="recent-posts row">';
        while( $recent_posts_query->have_posts() ) {
            $recent_posts_query->the_post();
            ?>
            <div class="recent-post col-lg-4 col-md-6 col-12">
            <a href="<?php the_permalink(); ?>"><?php 
                if ( has_post_thumbnail() ) { 
                    $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                    ?>
                    <div class="post-image" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat center center; background-size: cover; padding-top: 56.25%;">
                    </div>
                    <?php
                } 
                ?>
                <h3 class="mt-2 recent-posts-title"><?php the_title(); ?></h3>
                <p>Read more -> </p>
                </a>
            </div>
            <?php
        }
        echo '</div>';
        wp_reset_postdata(); // reset the query
    } else {
        echo '<p>No recent posts found.</p>';
    }
}
?>

</div>
</div>


<?php
get_footer();
?>
