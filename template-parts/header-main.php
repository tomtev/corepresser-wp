<div id="header-main" class="header-main wrapper">
  <div class="<?php corepresser_get_header_container_class('main'); ?>">

    <?php get_template_part('template-parts/partials/logo'); ?>
    <?php get_template_part('template-parts/partials/header-mobile-elements'); ?>

    <?php if(!has_nav_menu( 'main-left' ) && ! has_nav_menu( 'main-right' )) { ?>
      <div class="hide-for-small" style="flex:1; width:100%; padding: 5px; border-radius: 3px; background: rgba(0,0,0,.05); text-align: center;">No menus has been assigned to <strong> Header Main </strong> yet.</div>
    <?php } ?>

    <?php  if(has_nav_menu( 'main-left' )) { ?>
      <nav id="primary-navigation" class="nav-wrapper primary-navigation nav-left hide-for-small">
           <?php corepresser_get_nav_menu('main-left'); ?>
      </nav>
    <?php } ?>

    <?php  if(has_nav_menu( 'main-right' )) { ?>
      <nav id="secondary-navigation" class="nav-wrapper secondary-navigation nav-right hide-for-small">
        <?php corepresser_get_nav_menu('main-right'); ?>
      </nav>
    <?php } ?>
  </div>
</div>
