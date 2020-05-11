<?php
/**
 * The template for displaying single projects
 *
 * @package Maja_Theme
 */

defined( 'ABSPATH' ) || die;

get_header();

while ( have_posts() ) : 
    the_post();

    $project_id    = get_the_ID();
    $project_types = get_the_terms( $project_id, 'project_type' );
    $subtitle      = get_post_meta( $project_id, 'subtitle', true );
    $date          = get_post_meta( $project_id, 'date', true );
    $duration      = get_post_meta( $project_id, 'duration', true );
    $location      = get_post_meta( $project_id, 'location', true );
    $team          = cub_subfields( 'team', $project_id, array( 'name', 'role') );
    $credits       = cub_subfields( 'other_credits', $project_id, array( 'label', 'value') );


    ?>

<main id="main" class="">

    <article id="post-<?php the_ID(); ?>" class="mb-6 md:mb-12 container mx-auto">

        <div class="gutter">
            <?php cub_component('components/hero-image', array('image_id' => get_post_thumbnail_id())); ?>
        </div>

        <header class="gutter my-6 md:my-12 container mx-auto">

            <h1 class="font-sans text-2xl font-bold"><?php the_title(); ?></h1>

            <?php if ($subtitle) : ?>

                <h2 class="font-sans text-xl mt-1"><?= esc_html($subtitle); ?></h2>

            <?php endif; ?>

        <?php if ( $project_types ) : ?>

            <ul class="flex mt-3">

                <?php foreach ( $project_types as $type ) : ?>

                    <li class="comma-list-item text-lg">
                        <a class="" href="<?= esc_url( get_term_link( $type->slug, 'project_type' ) ); ?>"><?= esc_html( $type->name ); ?></a>
                    </li>

                <?php endforeach; ?>

            </ul>

        <?php endif; ?>

        </header>

        <section class="flex flex-col md:flex-row container mx-auto">

            <ul class="w-full md:w-1/3 xl:w-1/4 gutter pb-6 lg:pb-12">

            <?php if ($team) : ?>
                <li class="pb-1">
                    <span class="text-xs uppercase font-bold pr-1"><?= esc_html(__('Team', 'maja')); ?></span>
                    <ul class="">
                        <?php foreach ($team as $member) : ?>
                            <li class="pb-1">
                                <span class="font-bold"><?= esc_html($member['name']); ?>: </span>
                                <span class=""><?= esc_html($member['role']); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if ($date) : ?>
                <li class="pb-2">
                    <span class="text-xs uppercase font-bold pr-1"><?= esc_html(__('Date', 'maja')); ?></span>
                    <div class=""><?= esc_html($date); ?></div>
                </li>
            <?php endif; ?>

            <?php if ($duration) : ?>
                <li class="pb-2">
                    <span class="text-xs uppercase font-bold pr-1"><?= esc_html(__('Dauer', 'maja')); ?></span>
                    <div class=""><?= esc_html($duration); ?></div>
                </li>
            <?php endif; ?>

            <?php if ($location) : ?>
                <li class="pb-2">
                    <span class="text-xs uppercase font-bold pr-1"><?= esc_html(__('Aufführungsort', 'maja')); ?></span>
                    <div class=""><?= esc_html($location); ?></div>
                </li>
            <?php endif; ?>

            <?php if ( $credits ) : ?>
                <?php foreach( $credits as $credit ) : ?>
                    <?php if ( $credit['label'] && $credit['value'] ) : ?>
                        <li class="pb-2">
                            <span class="text-xs uppercase font-bold pr-1"><?= esc_html( $credit['label'] ); ?></span>
                            <div class=""><?= apply_filters( 'the_content', $credit['value'] ); ?></div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            </ul>


            <div class="w-full md:w-2/3 xl:w-3/4 ">

                <?php
                $content_blocks = get_post_meta($project_id, 'content_blocks', true);
                
                $gallery_images = [];
                $index = 0;

                if ($content_blocks) :

                    foreach ($content_blocks as $i => $block_type) :
                        if ('text_block' === $block_type) :
                            $textblock = get_post_meta($project_id, 'content_blocks_' . $i . '_blocktext', true);
                            ?>
                            <div class="gutter pb-6 lg:pb-12 generated">
                                <?= apply_filters('the_content', $textblock); ?>
                            </div>
                            <?php
                        endif;
                        if ('text_image' === $block_type) :
                            $image_id = get_post_meta($project_id, 'content_blocks_' . $i . '_textimage', true);
                            $pic_lg   = fly_get_attachment_image_src($image_id, array( 1600, 1000 ), false);
                            $pic_sm   = fly_get_attachment_image_src($image_id, array( 700, 400 ), false);
                            $text     = get_post_meta($project_id, 'content_blocks_' . $i . '_imagetext', true);
                            $gallery_images[] = [
                                'src' => $pic_lg['src'],
                                'w' => $pic_lg['width'],
                                'h' => $pic_lg['height'],
                            ];
                            ?>
                            <div class="flex flex-wrap">
                                <div class="w-full md:w-1/2 gutter pb-6 lg:pb-12" >
                                    <a href="<?= $pic_lg['src']; ?>" data-gallery="<?= $index++; ?>" >
                                        <img 
                                            src="<?= esc_url($pic_sm['src']); ?>" 
                                            class=" " 
                                            itemprop="thumbnail" 
                                        />
                                    </a>
                                </div>
                                <div class="w-full md:w-1/2 gutter generated pb-6 lg:pb-12" >
                                    <?= apply_filters('the_content', $text); ?>
                                </div>
                            </div>
                            <?php
                        endif;
                        if ('single_image' === $block_type) :
                            $single_image = get_post_meta($project_id, 'content_blocks_' . $i . '_singleimage', true);
                            $pic_md   = fly_get_attachment_image_src($single_image, array( 912, 608 ), false);
                            $pic_lg   = fly_get_attachment_image_src($single_image, array( 1600, 1000 ), false);

                            $gallery_images[] = [
                                'src' => $pic_lg['src'],
                                'w' => $pic_lg['width'],
                                'h' => $pic_lg['height'],
                            ];
                            ?>
                            <div class="gutter pb-6 lg:pb-12">
                                <a href="<?= $pic_lg['src']; ?>" data-gallery="<?= $index++; ?>" >
                                    <img src="<?= esc_url($pic_md['src']); ?>" class=" " itemprop="thumbnail" />
                                </a>
                            </div>
                            <?php
                        endif;
                        if ('double_image' === $block_type) :
                            $landscape_id  = get_post_meta($project_id, 'content_blocks_' . $i . '_landscape_image', true);
                            $portrait_id   = get_post_meta($project_id, 'content_blocks_' . $i . '_portrait_image', true);
                            $pic_landscape = fly_get_attachment_image_src($landscape_id, array( 592, 408 ), true);
                            $pic_portrait  = fly_get_attachment_image_src($portrait_id, array( 272, 408 ), true);
                            $lg_landscape = fly_get_attachment_image_src($landscape_id, array( 1600, 1000 ), false);
                            $lg_portrait = fly_get_attachment_image_src($landscape_id, array( 1600, 1000 ), false);

                            $gallery_images[] = [
                                'src' => $lg_landscape['src'],
                                'w' => $lg_landscape['width'],
                                'h' => $lg_landscape['height'],
                            ];
                            $gallery_images[] = [
                                'src' => $lg_portrait['src'],
                                'w' => $lg_portrait['width'],
                                'h' => $lg_portrait['height'],
                            ];

                            ?>
                            <div class="flex flex-wrap">
                                <div class="w-full md:w-2/3 gutter pb-6 lg:pb-12" >
                                    <a href="<?= $lg_landscape['src'] ?>" data-gallery="<?= $index++; ?>">
                                        <img src="<?= esc_url($pic_landscape['src']); ?>" class=" " itemprop="thumbnail" />
                                    </a>
                                </div>
                                <div class="w-full md:w-1/3 gutter pb-6 lg:pb-12" >
                                    <a href="<?= $lg_portrait['src'] ?>" data-gallery="<?= $index++; ?>">
                                        <img src="<?= esc_url($pic_portrait['src']); ?>" class=" " itemprop="thumbnail" />
                                    </a>
                                </div>
                            </div>
                            <?php
                        endif;
                        if ('triple_image' === $block_type) :
                            $image_one_id  = get_post_meta($project_id, 'content_blocks_' . $i . '_image_one', true);
                            $image_two_id  = get_post_meta($project_id, 'content_blocks_' . $i . '_image_two', true);
                            $image_three_id  = get_post_meta($project_id, 'content_blocks_' . $i . '_image_three', true);

                            $pic_image_one  = fly_get_attachment_image_src($image_one_id, array( 272, 408 ), true);
                            $pic_image_two  = fly_get_attachment_image_src($image_two_id, array( 272, 408 ), true);
                            $pic_image_three  = fly_get_attachment_image_src($image_three_id, array( 272, 408 ), true);

                            $lg_one  = fly_get_attachment_image_src($image_one_id, array( 1600, 1000 ), false);
                            $lg_two  = fly_get_attachment_image_src($image_two_id, array( 1600, 1000 ), false);
                            $lg_three  = fly_get_attachment_image_src($image_three_id, array( 1600, 1000 ), false);

                            $gallery_images[] = [
                                'src' => $lg_one['src'],
                                'w' => $lg_one['width'],
                                'h' => $lg_one['height'],
                            ];
                            $gallery_images[] = [
                                'src' => $lg_two['src'],
                                'w' => $lg_two['width'],
                                'h' => $lg_two['height'],
                            ];
                            $gallery_images[] = [
                                'src' => $lg_three['src'],
                                'w' => $lg_three['width'],
                                'h' => $lg_three['height'],
                            ];

                            ?>
                            <div class="flex flex-wrap">
                                <div class="w-full md:w-1/3 gutter pb-6 lg:pb-12" >
                                    <a href="<?= $lg_one['src'] ?>" data-gallery="<?= $index++; ?>">
                                        <img src="<?= esc_url($pic_image_one['src']); ?>" class=" " itemprop="thumbnail" />
                                    </a>
                                </div>
                                <div class="w-full md:w-1/3 gutter pb-6 lg:pb-12" >
                                    <a href="<?= $lg_two['src'] ?>" data-gallery="<?= $index++; ?>">
                                        <img src="<?= esc_url($pic_image_two['src']); ?>" class=" " itemprop="thumbnail" />
                                    </a>
                                </div>
                                <div class="w-full md:w-1/3 gutter pb-6 lg:pb-12" >
                                    <a href="<?= $lg_three['src'] ?>" data-gallery="<?= $index++; ?>">
                                        <img src="<?= esc_url($pic_image_three['src']); ?>" class=" " itemprop="thumbnail" />
                                    </a>
                                </div>
                            </div>
                            <?php
                        endif;
                        if ('download' === $block_type) :
                            $button_link = get_post_meta($project_id, 'content_blocks_' . $i . '_button_link', true);
                            $button_label = get_post_meta($project_id, 'content_blocks_' . $i . '_button_label', true);
                            ?>
                            <div class="gutter pb-6 lg:pb-12 generated">
                                <a class="button" href="<?= esc_url($button_link); ?>"><?= esc_html($button_label); ?></a>
                            </div>
                            <?php
                        endif;
                        if ('embed' === $block_type) :
                            $embed_code = get_post_meta($project_id, 'content_blocks_' . $i . '_embed_code', true);
                            $caption = get_post_meta($project_id, 'content_blocks_' . $i . '_caption', true);
                            ?>
                            <div class="gutter pb-6 lg:pb-12">
                                <?= $embed_code; ?>
                            </div>
                            <?php
                        endif;
                    endforeach;
                endif;
                ?>
                <script id="gallery"> var items = <?= json_encode($gallery_images); ?>;</script>
                </div>
            </div>

        </section>

    </article>

</main>

<?php
endwhile;
get_template_part('components/photoswipe');
get_footer();
