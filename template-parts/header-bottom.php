<?php
  if(has_nav_menu( 'bottom-left' )
  || has_nav_menu( 'bottom-right' )
  || has_nav_menu( 'bottom-center')) { ?>

<div id="header-bottom" class="header-bottom wrapper">
  <div class="<?php corepresser_get_header_container_class('bottom'); ?>">
    <?php  if(has_nav_menu( 'bottom-left' )) { ?>
      <nav class="nav-wrapper header-bottom-nav-left nav-left">
        <?php corepresser_get_nav_menu('bottom-left'); ?>
      </nav>
    <?php } ?>

    <?php  if(has_nav_menu( 'bottom-center' )) { ?>
      <?php if(!has_nav_menu( 'bottom-left' )) echo '<nav></nav>'; ?>
      <nav class="nav-wrapper header-bottom-nav-left nav-center">
        <?php corepresser_get_nav_menu('bottom-center'); ?>
      </nav>
      <?php if(!has_nav_menu( 'bottom-right' )) echo '<nav></nav>'; ?>
    <?php } ?>

    <?php  if(has_nav_menu( 'bottom-right' )) { ?>
      <nav class="nav-wrapper header-bottom-nav-left nav-right">
        <?php corepresser_get_nav_menu('bottom-right'); ?>
      </nav>
    <?php } ?>
  </div>
</div>
<?php } ?>
