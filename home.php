<?php get_header(); ?>
<div class="leaf-bg-right border-bottom pb-4">
<main class="container mt-4">
  <h1 class="mb-4 py-4">Latest Articles</h1> <!-- Changed from <?php the_archive_title(); ?> to "Latest Articles" -->

  <?php if ( have_posts() ) : ?>
    <div class="row">
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="col-md-6 mb-4 blog-page-card">
        <a href="<?php the_permalink(); ?>">
          <div class="card">
            <?php if ( has_post_thumbnail() ) :
                $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
                <div class="card-img-top post-image" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat center center; background-size: cover; padding-top: 56.25%;border-radius:4px;">
                </div>
            <?php endif; ?>
            <div class="card-body">
              <h5 class="card-title"><?php the_title(); ?></h5>
              <p class="card-text"><?php the_excerpt(); ?></p>
              <button class="btn">Read More</button>
            </div>
            </a> 
          </div>
        </div>
      <?php endwhile; ?>
    </div>

    <div class="pagination">
      <?php 
        echo paginate_links(); // Displays pagination links if the blog posts span multiple pages
      ?>
    </div>

  <?php else : ?>
    <p>No posts found.</p>
  <?php endif; ?>

</main>
  </div>
<?php get_footer(); ?>
