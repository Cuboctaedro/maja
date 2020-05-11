<?php

/**
 * Custom title for archive pages.
 *
 * @package Maja_Theme
 */


 
if (! function_exists('cub_project_archive_title')) {
    function cub_project_archive_title($title)
    {
        $projects = 'Projekte';

        if (is_tax('project_type')) {
            $title = $projects . ' - ' . get_queried_object()->name;
        } elseif (is_post_type_archive('project')) {
            $title = $projects;
        }

        return $title;
    }

    add_filter('get_the_archive_title', 'cub_project_archive_title');
}
