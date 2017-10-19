<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package corepresser
 */

get_header(); ?>

<div class="site-container container">
  <div class="columns columns--wrap-sm">
    <main id="content" class="content content-post-archive">

    <?php
    if ( have_posts() ) : ?>

      <?php if(!is_home()) { ?>
      <header class="page-header content-box">
        <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="archive-description">', '</div>' );
        ?>
      </header><!-- .page-header -->
      <?php } ?>

      <?php
      /* Start the Loop */
      while ( have_posts() ) : the_post();

        /*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */
        get_template_part( 'template-parts/content', get_post_format() );

      endwhile;

      the_posts_navigation();

    else :

      get_template_part( 'template-parts/content', 'none' );

    endif; ?>

</main><!-- #content -->

<?php get_sidebar(); ?>

</div>
</div>

<?php get_footer();
