<?php

function corepresser_customize_layout( $wp_customize ) {
  $wp_customize->add_panel( 'corepresser-layout', array(
    'title' => __( 'Layout' ),
    'priority' => 1
  ) );

  $wp_customize->get_section( 'background_image' )->panel = 'corepresser-layout';
  $wp_customize->get_section( 'background_image' )->title = 'Background';
  $wp_customize->get_control( 'background_color' )->section = 'background_image';
}

add_action( 'customize_register', 'corepresser_customize_layout' );
