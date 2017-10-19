<?php
  if(has_nav_menu( 'top-left' )
  || has_nav_menu( 'top-right' )
  || has_nav_menu( 'top-center')) { ?>

<div id="header-top" class="header-top wrapper">
  <div class="<?php echo corepresser_get_header_container_class('top'); ?>">
  <?php  if(has_nav_menu( 'top-left' )) { ?>
  <nav class="nav-wrapper header-top-nav-left nav-left">
    <?php corepresser_get_nav_menu('top-left'); ?>
  </nav>
  <?php } ?>

  <?php  if(has_nav_menu( 'top-center' )) { ?>
    <?php if(!has_nav_menu( 'top-left' )) echo '<nav></nav>'; ?>
    <nav class="nav-wrapper header-top-nav-right nav-center">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'top-center',
          'menu_id'        => 'top-center-menu',
          'container' => false,
          'menu_class' => 'nav-menu menu'
        ) );
      ?>
    </nav>
    <?php if(!has_nav_menu( 'top-right' )) echo '<nav></nav>'; ?>
  <?php } ?>

  <?php  if(has_nav_menu( 'top-right' )) { ?>
    <nav  class="nav-wrapper header-top-nav-right nav-right">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'top-right',
          'menu_id'        => 'top-right-menu',
          'container' => false,
          'menu_class' => 'nav-menu menu'
        ) );
      ?>
    </nav>
  <?php } ?>
  </div>
</div>
<?php } ?>
