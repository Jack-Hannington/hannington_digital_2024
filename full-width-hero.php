<?php
get_header();
?>


<?php
/**
 * Template Name: Full-width featured image page
 *
 * Displays a full-width hero based on the featured image
 */
?>


<?php if ( has_post_thumbnail() ) : ?>
    <?php 
$header_height = get_post_meta(get_the_ID(), 'header_height', true);
if ( !empty($header_height) ) : ?>
    <div class="page-title" style="height: <?php echo esc_attr($header_height); ?>;">
<?php else : ?>
    <div class="page-title">
<?php endif; ?>
    <img class="background-image" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="bg image" >
        <div class="page-header container">
            <h1><?php the_title(); ?></h1>
            <div class="max-750"><?php the_excerpt();?></div>
            <div class="d-flex gap-3 hero-btn-container">
            <?php 
            $button_text = get_post_meta(get_the_ID(), 'header_button_text', true);
            $button_link = get_post_meta(get_the_ID(), 'header_button_link', true);
            // Check if the button text and button link custom fields have values
            if( $button_text && $button_link ): ?>
                <a class="btn" href="<?php echo esc_url($button_link); ?>"><?php echo esc_html($button_text); ?></a>
            <?php endif; ?>
            <?php 
            $button_text_two = get_post_meta(get_the_ID(), 'header_button_text_two', true);
            $button_link_two = get_post_meta(get_the_ID(), 'header_button_link_two', true);
            // Check if the button text and button link custom fields have values
            if( $button_text_two && $button_link_two ): ?>
                <a class="btn" href="<?php echo esc_url($button_link_two); ?>"><?php echo esc_html($button_text_two); ?></a>
            <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="container">
    <?php the_content(); ?>
            </div>
            <div class="border-top border-bottom bg-white py-5 mt-5">
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
    echo '<div class="recent-posts row gap-3">';
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

