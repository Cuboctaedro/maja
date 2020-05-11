<?php

/**
 * Projects Header
 *
 * @package Maja_Theme
 */

defined('ABSPATH') || die;

$header_text    = get_query_var('header_text', false);
$header_level   = get_query_var('header_level', '2');

?>

<header class="container mx-auto flex flex-wrap items-start mb-12 xl:mb-16">

    <h<?= esc_attr($header_level); ?> class="title-2 pb-2 gutter w-full md:w-1/3 lg:w-1/4"><?= esc_html($header_text); ?></h<?= esc_attr($header_level); ?>>

    <ul class=" gutter w-full md:w-2/3 lg:w-3/4 md:text-right">

        <li class="inline-block">
            <a class="" href="<?= get_post_type_archive_link('project'); ?>" ><?= __('Alle', 'maja'); ?></a>
        </li>

        <?php $project_types = get_terms([ 'taxonomy' => 'project_type' ]); ?>

        <?php foreach ($project_types as $type) : ?>
            <li class="inline-block pl-2">
                <a class="" href="<?= get_term_link($type->term_id); ?>" ><?= $type->name; ?></a>
            </li>

        <?php endforeach; ?>

    </ul>

</header>