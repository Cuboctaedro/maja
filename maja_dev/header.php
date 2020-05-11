<?php
/**
 *
 * @package Maja_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body class="text-base leading-normal text-gray-900 font-sans" >
<?php wp_body_open(); ?>
    <a class="absolute bg-black text-white h-6 px-3 skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'kriegstein' ); ?></a>

    <header class="container mx-auto flex justify-between items-start lg:items-center py-3 h-24">

        <?php if ( is_front_page() ) : ?>

            <h1 class="gutter w-full lg:w-1/3 title-1"><a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home" class="hover:no-underline"><?php bloginfo( 'name' ); ?></a></h1>

        <?php else : ?>

            <div class="gutter w-full lg:w-1/3 title-1"><a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home" class="hover:no-underline"><?php bloginfo( 'name' ); ?></a></div>

        <?php endif; ?>

        <nav id="site-navigation" class="px-3 lg:px-6 w-full lg:w-2/3 relative flex justify-end ">
            <!-- <button class="lg:hidden" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'kriegstein' ); ?></button> -->
            <?php
            wp_nav_menu( array(
                'theme_location' => 'main-menu',
                'menu_id'        => 'primary-menu',
                'container' => false,
                'menu_class' => 'main-menu flex flex-col lg:flex-row lg:items-center lg:justify-end text-right'
            ) );
            ?>
        </nav>

    </header>

    <div id="content" class="site-content min-h-screen">
