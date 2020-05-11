<?php

/**
 * Add theme support
 *
 * @package Maja_Theme
 */

if (!function_exists('cub_add_theme_support'))  {

    function cub_add_theme_support() {

        load_theme_textdomain('kriegstein', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');

        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
    }

    add_action('after_setup_theme', 'cub_add_theme_support');
}


