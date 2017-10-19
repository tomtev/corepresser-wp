<?php

function corepresser_customize_header( $wp_customize ) {
  $wp_customize->add_panel( 'corepresser-header', array(
    'title' => __( 'Header' ),
    'priority' => 1
  ) );

  $wp_customize->add_section( 'corepresser-header-main', array(
    'title' => __( 'Header Main' ),
    'panel' => 'corepresser-header'
  ) );

  // Re-order default Sections and Settings
  $wp_customize->get_section( 'title_tagline' )->panel = 'corepresser-header';
  $wp_customize->get_section( 'title_tagline' )->title = 'Logo & Site Title';
  $wp_customize->get_section( 'header_image' )->panel = 'corepresser-header';
  $wp_customize->get_section( 'header_image' )->title = 'Background Image';
  $wp_customize->get_section( 'static_front_page' )->title = 'Homepage';
  $wp_customize->get_control( 'header_textcolor' )->section  = 'corepresser-header-main';

  // logo

  $wp_customize->add_setting( 'test_id' , array(
    'default' => 200,
    'transport' => 'postMessage'
  ) );

  $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'test_id', array(
    'type'     => 'range-value',
    'section'  => 'title_tagline',
    'settings' => 'test_id',
    'label'    => __( 'Logo Width' ),
    'input_attrs' => array(
      'min'    => 50,
      'max'    => 1000,
      'step'   => 1,
      'suffix' => 'px', //optional suffix
      ),
  ) ) );
}

add_action( 'customize_register', 'corepresser_customize_header' );

function corepresser_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
  $wp_customize->get_setting( 'header_image' )->transport = 'postMessage';

  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
      'selector'        => '.site-title a',
      'render_callback' => 'corepresser_customize_partial_blogname',
    ) );

    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
      'selector'        => '.site-description',
      'render_callback' => 'corepresser_customize_partial_blogdescription',
    ) );

    $wp_customize->selective_refresh->add_partial( 'header_image', array(
      'selector'        => '.header-bg',
      'render_callback' => function() {
          return get_template_part('template-parts/header-background');
      }
    ) );
  }
}
add_action( 'customize_register', 'corepresser_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function corepresser_customize_partial_blogname() {
  bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function corepresser_customize_partial_blogdescription() {
  bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function corepresser_customize_preview_js() {
  wp_enqueue_script( 'corepresser-customizer', get_template_directory_uri() . '/inc/customizer/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'corepresser_customize_preview_js' );
