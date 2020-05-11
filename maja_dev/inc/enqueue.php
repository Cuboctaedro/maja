<?php

/**
 * Enqueue scripts and styles
 *
 * @package Maja_Theme
 */

if ( ! function_exists( 'cub_enqueue' ) ) {

    function cub_enqueue() {

        wp_enqueue_style( 'def-style', get_stylesheet_uri() );

        wp_enqueue_style( 'app-css', get_template_directory_uri() . '/static/app.css' );

        wp_enqueue_script( 'app-js', get_template_directory_uri() . '/static/app.js', array(), false, true );

        wp_dequeue_style( 'wp-block-library' );

        wp_dequeue_style( 'contact-form-7' );

        wp_dequeue_style( 'wpml-tm-admin-bar' );

        wp_deregister_script('jquery');

        wp_deregister_script('wp-embed');

    }

    add_action( 'wp_enqueue_scripts', 'cub_enqueue' );
}

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

