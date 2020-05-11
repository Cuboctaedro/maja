<?php

/**
 * Register Custom Fields Helper
 *
 * @package Maja_Theme
 */


class Locations {

    public static function post_type( $value, $equal = true ) {
        return array(
            'param'    => 'post_type',
            'operator' => $equal ? '==' : '!=',
            'value'    => $value,
        );
    }

    public static function page_type( $value, $equal = true ) {
        return array(
            'param'    => 'page_type',
            'operator' => $equal ? '==' : '!=',
            'value'    => $value,
        );
    }

    public static function template( $value, $equal = true ) {
        return array(
            'param'    => 'post_template',
            'operator' => $equal ? '==' : '!=',
            'value'    => $value,
        );
    }

    public static function parent( $value, $equal = true ) {
        return array(
            'param'    => 'page_parent',
            'operator' => $equal ? '==' : '!=',
            'value'    => $value,
        );
    }

    public static function taxonomy( $value, $equal = true ) {
        return array(
            'param'    => 'taxonomy',
            'operator' => $equal ? '==' : '!=',
            'value'    => $value,
        );
    }

    public static function options( $value, $equal = true ) {
        return array(
            'param'    => 'options_page',
            'operator' => $equal ? '==' : '!=',
            'value'    => $value,
        );
    }
}