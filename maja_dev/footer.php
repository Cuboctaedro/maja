<?php
/**
 *
 * @package Maja_Theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer border-t border-gray-500">

		<?php
			wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'menu_id'        => 'footer-menu',
				'container' => false,
				'menu_class' => 'container mx-auto footer-menu  flex flex-row py-2 '
			) );
		?>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
