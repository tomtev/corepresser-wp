<?php

// Add Custom controls
if ( class_exists( 'WP_Customize_Control' ) ) {
  require_once( dirname( __FILE__ ) . '/controls/range-value/class-customizer-range-value-control.php' );
}

// Add Options
include_once(dirname( __FILE__ ).'/customizer-header.php');
include_once(dirname( __FILE__ ).'/customizer-layout.php');
include_once(dirname( __FILE__ ).'/customizer-style.php');
