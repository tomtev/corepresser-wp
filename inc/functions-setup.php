<?php

if ( ! function_exists( 'corepresser_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function corepresser_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on corepresser, use a find and replace
     * to change 'corepresser' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'corepresser', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /* add starter content support */
    get_theme_support( 'starter-content' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    register_nav_menus( array(
      'main-left' => esc_html__( '← Header Main left', 'corepresser' ),
    ) );

    register_nav_menus( array(
      'main-right' => esc_html__( '→ Header Main right', 'corepresser' ),
    ) );

    register_nav_menus( array(
      'top-left' => esc_html__( '↖ Header Top left', 'corepresser' ),
    ) );

    register_nav_menus( array(
      'top-center' => esc_html__( '↑ Header Top Center', 'corepresser' ),
    ) );

    register_nav_menus( array(
      'top-right' => esc_html__( '&#8599; Header Top Right', 'corepresser' ),
    ) );

    register_nav_menus( array(
      'bottom-left' => esc_html__('↙ Header Bottom left', 'corepresser' ),
    ) );

    register_nav_menus( array(
      'bottom-center' => esc_html__('↓ Header Bottom Center ', 'corepresser' ),
    ) );

    register_nav_menus( array(
      'bottom-right' => esc_html__('↘ Header Bottom Right', 'corepresser' ),
    ) );

    register_nav_menus( array(
      'footer-links' => esc_html__('Footer Links', 'corepresser' ),
    ) );

    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    add_theme_support( 'custom-background', apply_filters( 'corepresser_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );

    add_theme_support( 'custom-header', apply_filters( 'corepresser_custom_header_args', array(
      'default-image'          => '',
      'default-text-color'     => '000000',
      'width'                  => 1000,
      'height'                 => 250,
      'flex-height'            => true,
    ) ) );

    add_theme_support( 'custom-logo', array(
      'height'      => 80,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ) );

    /**
     * Add support for selective refresh of widgets
     *
     */
    add_theme_support( 'customize-selective-refresh-widgets' );

  }
endif;
add_action( 'after_setup_theme', 'corepresser_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function corepresser_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'corepresser_content_width', 640 );
}
add_action( 'after_setup_theme', 'corepresser_content_width', 0 );


function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
}
add_action( 'init', 'disable_wp_emojicons' );
