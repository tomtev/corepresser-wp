<?php
/**
 * Template part for displaying entry footer on blog posts.
 *
 * @package corepresser
 */

echo '<footer class="entry-footer">';

if ( 'post' === get_post_type() ) {
  /* translators: used between list items, there is a space after the comma */
  $categories_list = get_the_category_list( esc_html__( ', ', 'corepresser' ) );
  if ( $categories_list ) {
    /* translators: 1: list of categories. */
    echo '<span class="cat-links">';
    echo get_corepresser_icon('bookmark');
    printf( ''. esc_html__( 'Posted in %1$s', 'corepresser' ) . '</span>', $categories_list );
    echo '</span>';
  }

  /* translators: used between list items, there is a space after the comma */
  $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'corepresser' ) );
  if ( $tags_list ) {
    /* translators: 1: list of tags. */
    echo '<span class="tags-links">';
    echo get_corepresser_icon('tag');
    printf( '' . esc_html__( 'Tagged %1$s', 'corepresser' ) . '</span>', $tags_list ); // WPCS: XSS OK.
    echo '</span>';
  }
}

if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
  echo '<span class="comments-link">';
  echo get_corepresser_icon('message-circle');
  comments_popup_link(
    sprintf(
      wp_kses(
        /* translators: %s: post title */
        __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'corepresser' ),
        array(
          'span' => array(
            'class' => array(),
          ),
        )
      ),
      get_the_title()
    )
  );
  echo '</span>';
}

edit_post_link(
  sprintf(
    wp_kses(
      /* translators: %s: Name of current post. Only visible to screen readers */
      __( 'Edit <span class="screen-reader-text">%s</span>', 'corepresser' ),
      array(
        'span' => array(
          'class' => array(),
        ),
      )
    ),
    get_the_title()
  ),
  '<span class="edit-link">',
  '</span>'
);

echo '</footer>';
