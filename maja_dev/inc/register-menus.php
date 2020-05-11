<?php

/**
 * Register menus
 *
 * @package Maja_Theme
 */

if (!function_exists('cub_register_menus')) {

    function cub_register_menus() {
        register_nav_menus(array(
            'main-menu'   => esc_html__( 'Primary', 'maja' ),
            'footer-menu' => esc_html__( 'Footer', 'maja' ),
        ));
    }

    add_action('after_setup_theme', 'cub_register_menus');
}
