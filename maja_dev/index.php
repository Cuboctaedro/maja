<?php
/**
 * The template for displaying all pages
 *
 * @package Maja_Theme
 */

get_header();
?>

	<main id="main" class="site-main border-t border-gray-400 pt-8 mb:pt-16">

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<article id="post-<?php the_ID(); ?>" class="container mx-auto" >

			<header class="gutter w-full mb-6 lg:mb-12">

				<h1 class="title-2"><?php the_title(); ?></h1>
				
			</header>

			<div class="w-full flex flex-col md:flex-row pb-6 lg:pb-12">

				<div class="gutter generated">
					<?php the_content(); ?>
				</div>

			</div>

		</article>

	<?php endwhile; ?>

	</main>


<?php
get_footer();
