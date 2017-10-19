<header class="entry-header">
  <div class="entry-header-thumbnail">
    <?php if(!is_singular()) { ?><a href="<?php esc_url( get_permalink() ) ?>" rel="bookmark"><?php } ?>
      <?php the_post_thumbnail('large'); ?>
    <?php if(!is_singular()) { ?></a> <?php } ?>
  </div>

  <div class="entry-header-title">
    <?php
    if ( is_singular() ) :
      the_title( '<h1 class="entry-title">', '</h1>' );
    else :
      the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    endif;

    if ( 'post' === get_post_type() ) : ?>
    <div class="entry-meta">
      <?php get_template_part('template-parts/partials/posted-on'); ?>
    </div><!-- .entry-meta -->
    <?php
    endif; ?>
  </div>
</header><!-- .entry-header -->
