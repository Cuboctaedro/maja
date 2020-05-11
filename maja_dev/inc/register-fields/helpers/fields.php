<?php

/**
 * Register Custom Fields Helper
 *
 * @package Maja_Theme
 */

class Fields {

    private static $wpml = array(
        'copy'      => 1,
        'copy-once' => 3,
        'translate' => 2,
    );

    public static function tab( $label, $id, $num = '' ) {
        return array(
            'key'                 => 'field_tab_' . $id . $num,
            'label'               => $label,
            'name'                => 'tab_' . $id,
            'type'                => 'tab',
            'wpml_cf_preferences' => self::$wpml['copy']
        );
    }

    public static function text( $label, $id, $num = '' ) {
        return array(
            'key'                 => 'field_' . $id . $num,
            'label'               => $label,
            'name'                => $id,
            'type'                => 'text',
            'wpml_cf_preferences' => self::$wpml['translate']
        );
    }

    public static function url( $label, $id, $num = '' ) {
        return array(
            'key'                 => 'field_' . $id . $num,
            'label'               => $label,
            'name'                => $id,
            'type'                => 'url',
            'wpml_cf_preferences' => self::$wpml['translate']
        );
    }

    public static function textarea( $label, $id, $rows = 5, $num = '' ) {
        return array(
            'key'                 => 'field_' . $id . $num,
            'label'               => $label,
            'name'                => $id,
            'type'                => 'textarea',
            'rows'                => $rows,
            'wpml_cf_preferences' => self::$wpml['translate']

        );
    }

    public static function editor( $label, $id, $num = '' ) {
        return array(
            'key'                 => 'field_' . $id . $num,
            'label'               => $label,
            'name'                => $id,
            'type'                => 'wysiwyg',
            'media_upload'        => false,
            'wpml_cf_preferences' => self::$wpml['translate']
        );
    }

    public static function image( $label, $id, $library = 'all', $num = '' ) {
        return array(
            'key'                 => 'field_' . $id . $num,
            'label'               => $label,
            'name'                => $id,
            'type'                => 'image',
            'return_format'       => 'id',
            'preview_size'        => 'thumbnail',
            'library'             => $library,
            'wpml_cf_preferences' => self::$wpml['copy-once']
        );
    }

    public static function date( $label, $id, $num = '' ) {
        return array(
            'key'                 => 'field_' . $id . $num,
            'label'               => $label,
            'name'                => $id,
            'type'                => 'date_picker',
            'wpml_cf_preferences' => self::$wpml['copy-once']
        );
    }

    public static function relation( $label, $id, $post_types = [], $num = '' ) {
        return array(
            'key'                 => 'field_' . $id . $num,
            'label'               => $label,
            'name'                => $id,
            'type'                => 'relationship',
            'post_type'           => $post_types,
            'wpml_cf_preferences' => self::$wpml['copy-once']
        );
    }

    public static function repeater( $label, $id, $fields, $num = '' ) {
        return array(
            'key'                 => 'field_' . $id . $num,
            'label'               => $label,
            'name'                => $id,
            'type'                => 'repeater',
            'layout'              => 'row',
            'sub_fields'          => $fields,
            'wpml_cf_preferences' => self::$wpml['copy']
        );
    }

    public static function layout( $label, $id, $fields, $num = '' ) {
        return array(
            'key'                 => 'layout_' . $id . $num,
            'label'               => $label,
            'name'                => $id,
            'display'             => 'row',
            'sub_fields'          => $fields,
            'wpml_cf_preferences' => self::$wpml['copy']
        );
    }

    public static function flex( $label, $id, $layouts, $num = '' ) {
        return array(
            'key'                 => 'field_' . $id . $num,
            'label'               => $label,
            'name'                => $id,
            'type'                => 'flexible_content',
            'layouts'             => $layouts,
            'wpml_cf_preferences' => self::$wpml['copy']
        );
    }

}