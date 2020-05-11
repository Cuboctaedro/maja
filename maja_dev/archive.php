<?php
/**
 * The template for displaying project archive pages
 *
 * @package Maja_Theme
 */

defined( 'ABSPATH' ) || die;

get_header();
?>

    <main id="main" class="site-main border-t border-gray-400 pt-8 mb:pt-16">

		<?php if ( have_posts() ) : ?>

			<?php cub_component( 'components/projects-header', [ 
					'header_text'  => get_the_archive_title(),
					'header_level' => '1'
				] ); ?>

			<ul class="container mx-auto flex flex-row flex-wrap pt-10 mb:pt-20">

			<?php
			while ( have_posts() ) :
                the_post(); ?>

				<li class="gutter mb-6 lg:mb-12 w-full sm:w-1/2 lg:w-1/3 ">
					<?php get_template_part( 'components/project-card' ); ?>
				</li>

			<?php endwhile; ?>

			</ul>

		<?php endif; ?>

    </main>

<?php
get_footer();
