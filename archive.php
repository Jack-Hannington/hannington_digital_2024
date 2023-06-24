<?php get_header(); ?>

<main class="container mt-4">
  <h1 class="mb-4"><?php the_archive_title(); ?></h1>
  <>fdsfdfgdfg
  <?php if ( have_posts() ) : ?>
    <div class="row">
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="col-md-6 mb-4 blog-page-card">
          <div class="card">
            <?php if ( has_post_thumbnail() ) : ?>
              <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
            <?php endif; ?>
            <div class="card-body">
              <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              <p class="card-text"><?php the_excerpt(); ?></p>
              <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
            </div>
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

<?php get_footer(); ?>
