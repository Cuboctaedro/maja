<?php

/**
 * Project List Item
 *
 * @package Maja_Theme
 */

defined( 'ABSPATH' ) || die;

$project_id    = get_the_ID();
$project_sub   = get_post_meta( $project_id, 'subtitle', true );
$project_terms = get_the_terms( $project_id, 'project_type' );

$project_image = fly_get_attachment_image_src( get_post_thumbnail_id( $project_id ), array( 550, 332 ), true );
?>

<article class="content-project relative w-full" tabindex="0">

    <div class="content-project__image relative overflow-hidden rounded">
        <div class="absolute inset-0 z-10 ">
            <img src="<?= esc_url( $project_image['src'] ); ?>" class="block w-full h-full object-cover  transition-transform duration-700 ease-in-out" />
        </div>
    </div>


    <div class="content-project__texts absolute inset-0 z-20 opacity-0 shadow hover:opacity-100 hover:shadow-xl p-12 flex flex-col items-center justify-center text-center duration-700 ease-in-out">
        <?php if ( is_post_type_archive( 'project' ) ) : ?>

        <h2 class="uppercase font-bold text-xl leading-none pb-1">
            <a href="<?php the_permalink(); ?>" class="card-link hover:no-underline"><?php the_title(); ?></a>
        </h2>

        <?php else : ?>

            <h3 class="uppercase font-bold text-xl leading-none pb-1">
                <a href="<?php the_permalink(); ?>" class="card-link hover:no-underline"><?php the_title(); ?></a>
            </h3>

        <?php endif; ?>

        <?php if ( $project_sub ) : ?>
            <span class="uppercase text-xl pb-2"><?= esc_html( $project_sub ); ?></span>
        <?php endif; ?>

        <?php if ( $project_terms ) : ?>

            <div class="content-project__terms text-center">
                
                <?php foreach ( $project_terms as $term ) : ?>

                    <a href="<?= get_term_link( $term, 'project-type' ); ?>" class="relative z-20 comma-list-item"><?= esc_html( $term->name ); ?></a>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</article>

