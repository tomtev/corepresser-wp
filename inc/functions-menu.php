<?php

function corepresser_get_nav_menu($menu) {
  return wp_nav_menu( array(
    'theme_location' => $menu,
    'menu_id'        => $menu. '-menu',
    'container' => false,
    'menu_class' => 'nav-menu menu'
  ) );
}

function corepresser_menu_item_args ( $args, $item, $depth ) {
  $classes = implode( $item->classes, ' ');

  $args->link_before = '';
  $args->link_after = '';
  $args->after= '';
  $args->before = '';

  if (strpos($classes, 'menu-item-has-children') !== false) {
    ob_start();

    if($depth == 0) {
      get_template_part('template-parts/icons/icon','chevron-down');
    } else {
       get_template_part('template-parts/icons/icon','chevron-right');
    }

    $icon = ob_get_clean();
    $args->link_before = '<span>';
    $args->link_after = '</span>'. $icon;
  }

  if (strpos($classes, 'is-button') !== false) {
    $args->before = '<span>';
    $args->after = '</span>';
  }

  if (strpos($classes, 'is-cart') !== false) {
    $args->link_after = '<span class="is-label is-cart-count">5</span>' . $args->link_after;
  }

  if (strpos($classes, 'is-text') !== false || strpos($classes, 'is-shortcode') !== false) {
    $args->before = '<span class="hidden">';
    $args->after = '</span>'. do_shortcode($item->description);
  }

  if (strpos($classes, 'is-divider') !== false) {
    $args->before = '<span class="hidden">';
    $args->after = '</span><div class="nav-divider hide-for-small"></div>';
  }

  if (strpos($classes, 'icon-') !== false) {
   ob_start();
   get_template_part('template-parts/icons/icon','shopping-bag');
   $icon = ob_get_clean();
   $args->link_before = $icon . '<span>';
   $args->link_after = '</span>' . $args->link_after;
  }

  return $args;
}
add_filter( 'nav_menu_item_args', 'corepresser_menu_item_args', 10, 3 );


function corepresser_menu_link_attributes ($atts, $item, $args, $depth) {
  $classes = implode( $item->classes, ' ');
  if (strpos($classes, 'is-button') !== false) {
    $atts['class'] = str_replace("is-button", "button", $classes);
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'corepresser_menu_link_attributes', 10, 4 );


function register_customize_nav_menu_item_types( $item_types  ) {

  $item_types[] = array(
    'title'      => __( 'CorePresser Elements', 'woocommerce' ),
    'type_label' => __( 'CorePresser Elements', 'woocommerce' ),
    'object'     => 'corepresser',
    'type'       => 'corepresser_item'
  );

  return $item_types;
}

function register_customize_nav_menu_items( $items = array(), $type = '', $object = '', $page = 0 ) {
  if ( 'corepresser' !== $object ) {
    return $items;
  }

  // Don't allow pagination since all items are loaded at once.
  if ( 0 < $page ) {
    return $items;
  }

  $items[] = array(
      'id'         => 'button-primary',
      'title'      => 'Primary Button',
      'classes'     => 'is-button primary',
      'type_label' => __( 'Button', 'woocommerce' ),
      'url'        => '#url',
  );

  $items[] = array(
      'id'         => 'button-secondary',
      'title'      => 'Secondary Button',
      'classes'     => 'is-button',
      'type_label' => __( 'Button', 'woocommerce' ),
      'url'        => '#url',
  );

  $items[] = array(
      'id'         => 'divider',
      'title'      => '-- Divider --',
      'classes'     => 'is-divider',
      'type_label' => __( 'Text', 'woocommerce' ),
      'url'        => '',
  );

  $items[] = array(
      'id'         => 'text',
      'title'      => 'Header Text',
      'classes'     => 'is-text',
      'type_label' => __( 'Text', 'woocommerce' ),
      'description' => 'Enter any text or Shortcodes here.',
      'url'        => '',
  );

  return $items;
}

add_filter( 'customize_nav_menu_available_item_types', 'register_customize_nav_menu_item_types', -99 );
add_filter( 'customize_nav_menu_available_items', 'register_customize_nav_menu_items', 10, 4 );
