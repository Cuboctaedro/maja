<?php

/**
 * Register order for post type "project"
 *
 * @package Maja_Theme
 */

 if ( ! function_exists( 'cub_change_project_order' ) ) {

    function cub_change_project_order( $query ) {

        if ( ! is_admin()  ) {
            $query->set( 'orderby', 'menu_order' );
            $query->set( 'order', 'ASC' );
        }
    }

    add_action( 'pre_get_posts', 'cub_change_project_order' );
}
