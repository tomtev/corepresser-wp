<?php

function get_corepresser_icon($icon) {
  ob_start();
  get_template_part('template-parts/icons/icon', $icon);
  return ob_get_clean();
}
