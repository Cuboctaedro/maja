<?php
/**
 * Photoswipe Image gallery.
 *
 * @package Maja_Theme
 */

defined( 'ABSPATH' ) || die;

$gallery = get_query_var( 'gallery', false );

if ( $gallery ) : ?>

<div class="photoswipe-images flex flex-row flex-wrap " itemscope itemtype="http://schema.org/ImageGallery">

    <?php foreach ( $gallery as $pic ) :

        $pic_lg = fly_get_attachment_image_src( $pic['image'], array( 1600, 1000 ), false );
        $pic_sm = fly_get_attachment_image_src( $pic['image'], array( 0, 264 ), false );
        ?>

        <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="h-64 gutter mb-6 lg:mb-12">

            <a href="<?= esc_url( $pic_lg['src'] ); ?>" class="" itemprop="contentUrl" data-size="<?= esc_attr( $pic_lg['width'] ); ?>x<?= esc_attr( $pic_lg['height'] ); ?>">

                <img src="<?= esc_url( $pic_sm['src'] ); ?>" class=" " itemprop="thumbnail" />

            </a>

            <?php if ( $pic['caption'] ) : ?>
                <figcaption itemprop="caption description"><?= esc_html( $pic['caption'] ); ?></figcaption>
            <?php endif; ?>

        </figure>

    <?php endforeach; ?>
</div>


<?php endif; ?>