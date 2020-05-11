<?php
/**
 * Maja Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Maja_Theme
 */

/**
 * Add theme support for various features.
 */
require get_template_directory() . '/inc/theme-support.php';

/**
 * Register navigation menus.
 */
require get_template_directory() . '/inc/register-menus.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Register Post types.
 */
require get_template_directory() . '/inc/register-post-types.php';

/**
 * Register Taxonomies.
 */
require get_template_directory() . '/inc/register-taxonomies.php';

/**
 * Custom Image Sizes.
 */
require get_template_directory() . '/inc/image-sizes.php';

/**
 * Components.
 */
require get_template_directory() . '/inc/get-component.php';

/**
 * Get Image Format.
 */
require get_template_directory() . '/inc/image-format.php';

/**
 * Title for archive pages.
 */
require get_template_directory() . '/inc/custom-archive-title.php';

/**
 * Reorder Projects.
 */
// require get_template_directory() . '/inc/register-custom-post-order.php';

/**
 * Display dates.
 */
require get_template_directory() . '/inc/format-date.php';

/**
 * ACF register fields.
 */
require get_template_directory() . '/inc/register-fields/index.php';

/**
 * Disable ACF on front end.
 */
require get_template_directory() . '/inc/disable-acf.php';

/**
 * Custom function for repeater field.
 */
require get_template_directory() . '/inc/get-subfields.php';