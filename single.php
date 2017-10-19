<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package corepresser
 */

get_header(); ?>

<div class="container site-container">
  <div class="columns columns--wrap-sm">
    <main id="content" class="content content-post">

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', get_post_type() );

    get_template_part( 'template-parts/partials/post-navigation');

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

    </main><!-- #content -->

<?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
