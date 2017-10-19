<?php
/*
Template name: Layout - Compact
*/
get_header(); ?>

<main id="content" class="content container-compact">
  <?php
  while ( have_posts() ) : the_post();

    get_template_part( 'template-parts/content', 'page-compact' );

    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;

  endwhile; // End of the loop.
  ?>

</main><!-- #content -->

<?php
get_footer();
