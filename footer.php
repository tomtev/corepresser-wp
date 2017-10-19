<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corepresser
 */

?>
	</div><!-- #wrapper -->
  <?php do_action('corepresser_after_wrapper') ; ?>

	<footer id="footer" class="site-footer">
    <?php if (is_active_sidebar( 'footer' )) { ?>
    <div class="footer-wrapper wrapper">
      <div class="footer-widgets container">
        <div class="columns columns--auto">
          <?php dynamic_sidebar( 'footer' ); ?>
        </div>
      </div>
    </div><!-- footer-wrapper -->
    <?php } ?>

		<div class="absolute-footer">
      <div class="container absolute-footer-container">
      <?php if(has_nav_menu( 'footer-links' )) { ?>
        <nav id="footer-links" class="nav-wrapper">
          <?php
              wp_nav_menu( array(
                'theme_location' => 'footer-links',
                'container' => false,
                'depth' => 1,
                'menu_class' => 'nav-menu menu'
              ) );
          ?>
        </nav>
      <?php } ?>
      <div class="site-info text-center">
        <?php printf( esc_html__( 'Copyright 2017. Proudly powered by %s', 'corepresser' ), 'CorePresser Theme' ); ?>
      </div><!-- .site-info -->
      </div><!-- .container -->
		</div><!-- .absolute-footer -->
	</footer><!-- #footer -->
</div><!-- #site -->
<?php do_action('corepresser_after_site') ; ?>

<?php wp_footer(); ?>

</body>
</html>
