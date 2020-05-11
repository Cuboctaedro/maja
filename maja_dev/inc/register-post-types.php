<?php

/**
 * Register Post Types
 *
 * @package Maja_Theme
 */

 if ( ! function_exists( 'cub_register_post_types' ) ) {

    function cub_register_post_types() {
        $project_labels = array(
            'name'                  => _x('Projects', 'Post Type General Name', 'maja'),
            'singular_name'         => _x('Project', 'Post Type Singular Name', 'maja'),
            'menu_name'             => __('Projects', 'maja'),
            'name_admin_bar'        => __('Project', 'maja'),
            'archives'              => __('Project Archives', 'maja'),
            'attributes'            => __('Project Attributes', 'maja'),
            'parent_item_colon'     => __('Parent Item:', 'maja'),
            'all_items'             => __('All Projects', 'maja'),
            'add_new_item'          => __('Add New Project', 'maja'),
            'add_new'               => __('Add New', 'maja'),
            'new_item'              => __('New Project', 'maja'),
            'edit_item'             => __('Edit Project', 'maja'),
            'update_item'           => __('Update Project', 'maja'),
            'view_item'             => __('View Project', 'maja'),
            'view_items'            => __('View Projects', 'maja'),
            'search_items'          => __('Search Project', 'maja'),
            'not_found'             => __('Not found', 'maja'),
            'not_found_in_trash'    => __('Not found in Trash', 'maja'),
            'featured_image'        => __('Featured Image', 'maja'),
            'set_featured_image'    => __('Set featured image', 'maja'),
            'remove_featured_image' => __('Remove featured image', 'maja'),
            'use_featured_image'    => __('Use as featured image', 'maja'),
            'insert_into_item'      => __('Insert into item', 'maja'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'maja'),
            'items_list'            => __('Items list', 'maja'),
            'items_list_navigation' => __('Items list navigation', 'maja'),
            'filter_items_list'     => __('Filter items list', 'maja'),
        );
        $project_args = array(
            'label'                 => __('Project', 'maja'),
            'description'           => __('Portfolio', 'maja'),
            'labels'                => $project_labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-art',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type('project', $project_args);
    }
    
    add_action('init', 'cub_register_post_types');
}

