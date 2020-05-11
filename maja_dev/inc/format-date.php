<?php

/**
 * Format dates in templates
 *
 * @package Maja_Theme
 */

if (! function_exists('cub_date')) {
    function cub_date($date)
    {
        if ('de' === ICL_LANGUAGE_CODE) {
            return date('d. m, Y', strtotime($date));
        } else {
            return date('m jS, Y', strtotime($date));
        }
    }
}
