<?php
/*
Template name: Layout - No Header
*/

get_header(); ?>

<main id="content" class="content">
  <?php
  while ( have_posts() ) : the_post();

    get_template_part( 'template-parts/content', 'page' );

    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;

  endwhile; // End of the loop.
  ?>

</main><!-- #content -->

<?php
get_sidebar();
get_footer();
