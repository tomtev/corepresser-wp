<?php
/**
 * corepresser functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package corepresser
 */

/**
 * Theme Setup
 */
require get_template_directory() . '/inc/functions-setup.php';

/**
 * Add widget areas
 */
require get_template_directory() . '/inc/functions-widgets.php';

/**
 * Add custom scripts and styling
 */
require get_template_directory() . '/inc/functions-scripts.php';


/**
 * Menu additions.
 */
require get_template_directory() . '/inc/functions-menu.php';


/**
 * Functions which enhance the theme layout
 */
require get_template_directory() . '/inc/functions-structure.php';


/**
 * Theme helpers
 */
require get_template_directory() . '/inc/functions-helpers.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/index.php';


/**
 * Plugin Integrations
 */
require get_template_directory() . '/inc/integrations/index.php';
