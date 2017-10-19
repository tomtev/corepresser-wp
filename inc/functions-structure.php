<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package corepresser
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function corepresser_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'corepresser_body_classes' );


function corepresser_post_class($classes, $class, $post_id ) {
  global $post;
  $type = $post->post_type;

  // Add content box class to post and pages
  if($type == 'post' || $type == 'page') {
    $classes[] = 'content-box';
  }

  return $classes;
}
add_filter( 'post_class', 'corepresser_post_class', 10, 3 );


function corepresser_get_header_container_class($position) {
  $classes = array('header-container', 'container','header-' .$position. '-container');

  if($position == 'main' && get_theme_mod('logo_position','left') == 'center') {
    $classes[] = 'has-center-logo';
  }

  if($position == 'top' && has_nav_menu( 'top-center' )) {
    $classes[] = 'has-center-nav';
  }

  if($position == 'bottom' && has_nav_menu( 'bottom-center' )) {
    $classes[] = 'has-center-nav';
  }

  $classes = apply_filters('corepresser_header_container_class', $classes, $position);

  echo implode($classes, ' ');
}

function corepresser_get_header_classes() {
  $classes = array('header');

  $page_template =  get_post_meta( get_the_ID(), '_wp_page_template', true );

  if(!empty($page_template) && strpos($page_template, 'transparent')) {
     $classes[] = 'is-transparent';
  }

  echo implode($classes, ' ');
}

function corepresser_get_wrapper_classes() {
  echo 'asdf';
}

function corepresser_get_container_classes() {
  $classes = array('site-container');
  /*
  $page_template =  get_post_meta( get_the_ID(), '_wp_page_template', true );

  if(!empty($page_template) && strpos($page_template, 'full-width')) {
     $classes[] = 'container-full-width';
  } */

  echo implode($classes, ' ');
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function corepresser_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'corepresser_pingback_header' );




function corepresser_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

    <div id="div-comment-<?php comment_ID() ?>" class="comment post-comment">

    <div class="comment-avatar">
      <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    </div>

    <div class="comment-body">
    
    <div class="comment-header comment-author vcard">
        <?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
    </div>

    <div class="comment-text">
      <?php comment_text(); ?>

        <?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
          <br />
        <?php endif; ?>
    </div>

    <div class="comment-meta">

        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
        <?php
        /* translators: 1: date, 2: time */
        printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
        ?>

        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    </div>

    </div>
    <?php
}
