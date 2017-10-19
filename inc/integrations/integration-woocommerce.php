<?php

function corepresser_woocommerce_setup() {
  add_theme_support( 'woocommerce' );
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'corepresser_woocommerce_setup' );


function corepresser_woocommerce_remove_styles( $enqueue_styles ) {
  unset( $enqueue_styles['woocommerce-general'] );
  unset( $enqueue_styles['woocommerce-layout'] );
  unset( $enqueue_styles['woocommerce-smallscreen'] );
  return $enqueue_styles;
}

add_filter( 'woocommerce_enqueue_styles', 'corepresser_woocommerce_remove_styles' );


/* Add product wrappers */
function corepresser_woocommerce_before_shop_loop_item () {
  echo '<div class="content-box">';
}
add_action('woocommerce_before_shop_loop_item', 'corepresser_woocommerce_before_shop_loop_item', -999);

function corepresser_woocommerce_before_shop_loop_item_title () {
  echo '<div class="product-image">';
}
add_action('woocommerce_before_shop_loop_item_title', 'corepresser_woocommerce_before_shop_loop_item_title', -999);


function corepresser_woocommerce_close_div () {
  echo '</div>';
}
add_action('woocommerce_after_shop_loop_item', 'corepresser_woocommerce_close_div', 999);
add_action('woocommerce_before_shop_loop_item_title', 'corepresser_woocommerce_close_div', 999);
