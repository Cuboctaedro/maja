<?php

if (!function_exists('cub_subfields')) {

    function cub_subfields($field_name, $post_id, $subfields_array)
    {

        $field_content = get_post_meta($post_id, $field_name, true);

        $subfields = array();

        if ($field_content) {

            for ($i = 0; $i < $field_content; $i++) {
                $item = array();
                foreach ($subfields_array as $subfield_name) {
                    $item[ $subfield_name ] = get_post_meta($post_id, $field_name . '_' . $i . '_' . $subfield_name, true);
                }

                $subfields[] = $item;
            }
        }

        return $subfields;
    }
}
