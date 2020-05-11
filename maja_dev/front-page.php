<?php
/**
 * The template for displaying the home page
 *
 * @package Maja_Theme
 */

get_header();
?>

    <main id="main" class="site-main">

        <?php 
        while (have_posts()) :
            the_post();
            $image_1_id = get_post_meta($post->ID, 'image_one', true);
            $image_2_id = get_post_meta($post->ID, 'image_two', true);
            if ($image_1_id) :
                $image_1_sm  = fly_get_attachment_image_src($image_1_id, array( 540, 360 ), true);
                $image_1_md  = fly_get_attachment_image_src($image_1_id, array( 768, 513 ), true);
                $image_1_lg  = fly_get_attachment_image_src($image_1_id, array( 1024, 683 ), true);
                $image_1_xl  = fly_get_attachment_image_src($image_1_id, array( 1280, 854 ), true);
                $image_1_xxl = fly_get_attachment_image_src($image_1_id, array( 1500, 1001 ), true);
            endif;
            if ($image_2_id) :
                $image_2_sm  = fly_get_attachment_image_src($image_2_id, array( 540, 360 ), true);
                $image_2_md  = fly_get_attachment_image_src($image_2_id, array( 768, 513 ), true);
                $image_2_lg  = fly_get_attachment_image_src($image_2_id, array( 1024, 683 ), true);
                $image_2_xl  = fly_get_attachment_image_src($image_2_id, array( 1280, 854 ), true);
                $image_2_xxl = fly_get_attachment_image_src($image_2_id, array( 1500, 1001 ), true);
            endif;
            ?>

            <div class="absolute hero-image" id="hero-image-1">
                <picture>
                    <!--[if IE 9]><video style="display: none;><![endif]-->
                    <source data-srcset="<?= esc_url($image_1_sm['src']); ?>" media="--sm" />
                    <source data-srcset="<?= esc_url($image_1_md['src']); ?>" media="--md" />
                    <source data-srcset="<?= esc_url($image_1_lg['src']); ?>" media="--lg" />
                    <source data-srcset="<?= esc_url($image_1_xl['src']); ?>" media="--xl" />
                    <source data-srcset="<?= esc_url($image_1_xxl['src']); ?>" />
                    <!--[if IE 9]></video><![endif]-->
                    <img data-src="<?= esc_url($image_1_xxl['src']); ?>" class="lazyload w-full h-full object-cover" alt="" />
                </picture>
            </div>

            <div class="absolute hero-image" id="hero-image-2">
                <picture>
                    <!--[if IE 9]><video style="display: none;><![endif]-->
                    <source data-srcset="<?= esc_url($image_2_sm['src']); ?>" media="--sm" />
                    <source data-srcset="<?= esc_url($image_2_md['src']); ?>" media="--md" />
                    <source data-srcset="<?= esc_url($image_2_lg['src']); ?>" media="--lg" />
                    <source data-srcset="<?= esc_url($image_2_xl['src']); ?>" media="--xl" />
                    <source data-srcset="<?= esc_url($image_2_xxl['src']); ?>" />
                    <!--[if IE 9]></video><![endif]-->
                    <img data-src="<?= esc_url($image_1_xxl['src']); ?>" class="lazyload w-full h-full object-cover" alt="" />
                </picture>
            </div>

            <article id="post-<?php the_ID(); ?>" class="home-article container mx-auto">

                <div class="w-full md:w-2/3 xl:w-1/2 gutter py-6 md:py-12 xl:py-24 font-serif">
                    <?php the_content(); ?>
                </div>

            </article>

        <?php endwhile; ?>

        <section class="border-t border-gray-400 pt-4">

            <?php
            cub_component(
                'components/projects-header',
                [
                    'header_text'  => 'Projekte',
                    'header_level' => '2'
                ]
            );
            ?>

            <ul class="container mx-auto flex flex-row flex-wrap pt-10 mb:pt-20">
            
                <?php
                    $args = [
                        'post_type' => 'project',
                    ];
                    $project_query = new WP_Query( $args );
                    while ( $project_query->have_posts() ) :
                        $project_query->the_post(); ?>

                        <li class="gutter mb-6 lg:mb-12 w-full sm:w-1/2 lg:w-1/3 ">
                            <?php get_template_part( 'components/project-card' ); ?>
                        </li>

                    <?php 
                    endwhile;
                    wp_reset_postdata();
                ?>

            </ul>

        </section>

    </main>


<?php
get_footer();
