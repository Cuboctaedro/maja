<?php

/**
 * Get image format
 *
 * @package Maja_Theme
 */


if ( ! function_exists( 'cub_image_format' ) ) {

    function cub_image_format( $pic_meta ) {

        if ( $pic_meta['width'] < 1.2 * $pic_meta['height'] ) {
            return 'portrait';
        } elseif ( $pic_meta['height'] < 1.2 * $pic_meta['width'] ) {
            return 'landscape';
        } else {
            return 'square';
        }

    }
}