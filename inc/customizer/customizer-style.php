<?php

function corepresser_customize_style( $wp_customize ) {
  $wp_customize->add_panel( 'corepresser-style', array(
    'title' => __( 'Style' ),
    'priority' => 1
  ) );

  $wp_customize->get_section( 'custom_css' )->panel = 'corepresser-style';
}
add_action( 'customize_register', 'corepresser_customize_style' );
