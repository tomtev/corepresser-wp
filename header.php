<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corepresser
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action('corepresser_before_site') ; ?>

<div id="site" class="site">

  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'corepresser' ); ?></a>

	<header id="header" class="<?php corepresser_get_header_classes(); ?>">
      <?php get_template_part('template-parts/header','top'); ?>
      <?php get_template_part('template-parts/header','main'); ?>
      <?php get_template_part('template-parts/header','bottom'); ?>
      <?php get_template_part('template-parts/header-background'); ?>
	</header><!-- #header -->

  <?php do_action('corepresser_before_wrapper') ; ?>

	<div id="wrapper" class="main-wrapper wrapper <?php corepresser_get_wrapper_classes(); ?>">
