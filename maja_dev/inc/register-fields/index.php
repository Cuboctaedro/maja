<?php

/**
 * Register Custom Fields
 *
 * @package Maja_Theme
 */

require get_template_directory() . '/inc/register-fields/helpers/fields.php';
require get_template_directory() . '/inc/register-fields/helpers/locations.php';


if (!function_exists('cub_register_fields')) {

    function cub_register_fields()
    {

        acf_add_local_field_group(
            array(
                'key'    => 'group_project',
                'title'  => 'Project',
                'fields' => array(

                    Fields::text('Subtitle', 'subtitle'),

                    Fields::tab('Credits', 'credits'),

                    Fields::text('Date', 'date'),
                    Fields::text('Duration', 'duration'),
                    Fields::text('Location', 'location'),
                    Fields::repeater('Team', 'team', array(
                        Fields::text('Name', 'name'),
                        Fields::text('Role', 'role')
                    )),
                    Fields::repeater('Other Credits', 'other_credits', array(
                        Fields::text('Label', 'label'),
                        Fields::textarea('Text', 'value')
                    )),

                    Fields::tab('Content', 'content_blocks'),

                    Fields::flex('Content Blocks', 'content_blocks', array(
                        Fields::layout('Text', 'text_block', array(
                            Fields::editor('Text', 'blocktext'),
                        )),
                        Fields::layout('Text and Image', 'text_image', array(
                            Fields::editor('Text', 'imagetext'),
                            Fields::image('Image', 'textimage'),
                        )),
                        Fields::layout('Single Image', 'single_image', array(
                            Fields::image('Image', 'singleimage'),
                        )),
                        Fields::layout('Double Image', 'double_image', array(
                            Fields::image('Landscape Image', 'landscape_image'),
                            Fields::image('Portrait Image', 'portrait_image'),
                        )),
                        Fields::layout('Triple Image', 'triple_image', array(
                            Fields::image('Image 1', 'image_one'),
                            Fields::image('Image 2', 'image_two'),
                            Fields::image('Image 3', 'image_three'),
                        )),
                        Fields::layout('Download', 'download', array(
                            Fields::url('Link', 'button_link'),
                            Fields::text('Label', 'button_label'),
                        )),
                        Fields::layout('Embed', 'embed', array(
                            Fields::textarea('Embed Code', 'embed_code'),
                            Fields::text('Caption', 'caption')
                        )), 

                    )),
                ),
                'location' => array(
                    array(
                        Locations::post_type('project'),
                    ),
                ),

                'menu_order' => 0,
                'position'   => 'acf_after_title',
                'style'      => 'seamless',
                'active'     => true,
            )
        );

        acf_add_local_field_group(
            array(
                'key'    => 'group_calendar',
                'title'  => 'Calendar',
                'fields' => array(
                    Fields::repeater( 'Calendar', 'calendar', array(
                        Fields::date( 'Start Date', 'start_date' ),
                        Fields::date( 'End Date', 'end_date' ),
                        Fields::relation( 'Project', 'project', array( 'project' ) ),
                        Fields::text( 'Location', 'location' ),
                    )), 
                ),

                'location' => array(
                    array(
                        Locations::template('page-templates/calendar.php'),
                    ),
                ),

                'menu_order' => 0,
                'position'   => 'acf_after_title',
                'style'      => 'seamless',
                'active'     => true,
            )
        );
 
        acf_add_local_field_group(
            array(
                'key'    => 'group_homepage',
                'title'  => 'Home',
                'fields' => array(
                    Fields::image('Image 1', 'image_one'),
                    Fields::image('Image 2', 'image_two'),
                ),

                'location' => array(
                    array(
                        Locations::page_type('front_page'),
                    ),
                ),

                'menu_order' => 0,
                'position'   => 'acf_after_title',
                'style'      => 'seamless',
                'active'     => true,
            )
        );
    }

    add_action('acf/init', 'cub_register_fields');
}
