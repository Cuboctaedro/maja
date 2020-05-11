<?php

/**
 * Register Taxonomies
 *
 * @package Maja_Theme
 */

 if ( ! function_exists( 'cub_register_taxonomies' ) ) {

    function cub_register_taxonomies() {
        
        $project_type_labels = array(
			'name'                       => _x('Project Types', 'Taxonomy General Name', 'maja'),
			'singular_name'              => _x('Project Type', 'Taxonomy Singular Name', 'maja'),
			'menu_name'                  => __('Project Types', 'maja'),
			'all_items'                  => __('All Items', 'maja'),
			'parent_item'                => __('Parent Item', 'maja'),
			'parent_item_colon'          => __('Parent Item:', 'maja'),
			'new_item_name'              => __('New Item Name', 'maja'),
			'add_new_item'               => __('Add New Item', 'maja'),
			'edit_item'                  => __('Edit Item', 'maja'),
			'update_item'                => __('Update Item', 'maja'),
			'view_item'                  => __('View Item', 'maja'),
			'separate_items_with_commas' => __('Separate items with commas', 'maja'),
			'add_or_remove_items'        => __('Add or remove items', 'maja'),
			'choose_from_most_used'      => __('Choose from the most used', 'maja'),
			'popular_items'              => __('Popular Items', 'maja'),
			'search_items'               => __('Search Items', 'maja'),
			'not_found'                  => __('Not Found', 'maja'),
			'no_terms'                   => __('No items', 'maja'),
			'items_list'                 => __('Items list', 'maja'),
			'items_list_navigation'      => __('Items list navigation', 'maja'),
		);
		$project_type_args = array(
			'labels'                     => $project_type_labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
		);
		register_taxonomy('project_type', array('project'), $project_type_args);
	}    

    add_action( 'init', 'cub_register_taxonomies' );
}
