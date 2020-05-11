<?php

/**
 * Register custom image sizes
 *
 * @package Maja_Theme
 */


// if ( ! function_exists( 'cub_add_image_sizes' ) ) {

//     function cub_add_image_sizes() {
//         add_image_size( 'thumb-landscape', 320, 214, true );
//         add_image_size( 'thumb-portrait', 320, 480, true );
//         add_image_size( '2-col-landscape', 600, 400, true );
//         add_image_size( '2-col-portrait', 600, 900, true );
//         add_image_size( 'full-screen', 1400, 900 );
//     }

//     add_action( 'after_setup_theme', 'cub_add_image_sizes' );
// }

if ( ! function_exists( 'cub_remove_image_sizes' ) ) {

    function cub_remove_image_sizes() {
        remove_image_size( '1536x1536' );
        remove_image_size( '2048x2048' );
    }

    add_action( 'init', 'cub_remove_image_sizes' );
}



