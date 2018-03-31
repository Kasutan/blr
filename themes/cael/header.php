<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cael
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site" data-sticky-container>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cael' ); ?></a>

	<header id="masthead" class="site-header"  data-sticky-container>
		<div class="header-sticky grid-x  align-middle sticky" data-margin-top="0" data-sticky>
			<button class="acces cell" data-open="acces-direct"><strong>Le CAEL</strong> c'est toujours <strong>plus d'activités</strong> pour tous</button>
			<div class="site-branding cell small-6 large-3">
				<?php
				the_custom_logo();
				?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation cell large-6">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'cael' ); ?></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class'	=> 'dropdown menu'
				) );
				?>
			</nav><!-- #site-navigation -->

			<button class="recherche cell small-6 large-3" data-open="recherche">Recherche</button>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
