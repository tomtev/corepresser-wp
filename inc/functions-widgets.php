<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function corepresser_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'corepresser' ),
    'id'            => 'sidebar',
    'description'   => esc_html__( 'Add Sidebar Widgets here.', 'corepresser' ),
    'before_widget' => '<section id="%1$s" class="sidebar-widget widget content-box %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer Columns', 'corepresser' ),
    'id'            => 'footer',
    'description'   => esc_html__( 'Add Footer Widgets here.', 'corepresser' ),
    'before_widget' => '<div id="%1$s" class="footer-widget widget column-area %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );


}
add_action( 'widgets_init', 'corepresser_widgets_init' );
