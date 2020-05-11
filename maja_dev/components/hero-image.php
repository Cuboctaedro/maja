<?php
/**
 * Full container width image.
 *
 * @package Maja_Theme
 */

defined( 'ABSPATH' ) || die;

$image_id = get_query_var('image_id', false);
if ($image_id) :
    $image_sm = fly_get_attachment_image_src($image_id, array( 516, 258 ), true);
    $image_md = fly_get_attachment_image_src($image_id, array( 744, 372 ), true);
    $image_lg = fly_get_attachment_image_src($image_id, array( 976, 488 ), true);
    $image_xl = fly_get_attachment_image_src($image_id, array( 1232, 616 ), true);

?>

<div class="project-hero w-full h-0 relative"><div class="absolute inset-0 overflow-hidden">

    <picture>
        <!--[if IE 9]><video style="display: none;><![endif]-->
        <source data-srcset="<?= esc_url($image_sm['src']); ?>" media="--sm" />
        <source data-srcset="<?= esc_url($image_md['src']); ?>" media="--md" />
        <source data-srcset="<?= esc_url($image_lg['src']); ?>" media="--lg" />
        <source data-srcset="<?= esc_url($image_xl['src']); ?>" media="--xl" />
        <source data-srcset="<?= esc_url($image_xl['src']); ?>" />
        <!--[if IE 9]></video><![endif]-->
        <img data-src="<?= esc_url($image_xl['src']); ?>" class="lazyload object-cover w-full h-full " alt="" />
    </picture>

</div></div>

<?php 
endif;