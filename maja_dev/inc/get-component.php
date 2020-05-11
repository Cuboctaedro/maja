<?php

/**
 * Get template part with variables.
 *
 * @package Maja_Theme
 */


if ( ! function_exists( 'cub_component' ) ) {
    /**
     * Get template part and set variables.
     *
     * @param string $slug   The path for the template part.
     * @param array  $params An array of data that will be set as query_vars.
     *
     * @return null
     */
    function cub_component( $slug, $params = array() ) {

        $old_vars = array();

        foreach ( $params as $key => $val ) {

            // Keep previous query vars if they exist.
            if ( get_query_var($key) ) {
                $old_vars[ $key ] = get_query_var($key);
            }

            set_query_var( $key, $val );
        }

        get_template_part( $slug );

        foreach ( $params as $key => $val ) {

            // Reset previous query vars if they exist.
            if ( array_key_exists( $key, $old_vars ) ) {
                set_query_var( $key, $old_vars[ $key ] );
            } else {
                set_query_var( $key, null );
            }
        }
    }
}

