<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corepresser
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area full-width-md">
  <div class="widget-area-inner">
	 <?php dynamic_sidebar( 'sidebar' ); ?>
  </div>
</aside><!-- #secondary -->
