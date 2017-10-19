<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package corepresser
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php get_template_part('template-parts/partials/entry-header','default'); ?>
  <?php get_template_part('template-parts/partials/entry-content','default'); ?>
	<?php get_template_part('template-parts/partials/entry-footer','default'); ?>
</article><!-- #post-<?php the_ID(); ?> -->
