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
		<div class="header-sticky grid-x grid-padding-x align-middle align-justify sticky" data-margin-top="0" data-sticky>
			<button class="acces cell" data-open="acces-direct"><span><strong>Le CAEL</strong> c'est toujours <strong>plus d'activités</strong> pour tous</span><span class="icon-bolt slide-top"></span></button>
			<div class="site-branding cell small-5 medium-4 large-2">
				<?php
				the_custom_logo();
				?>
			</div>
			<button id="menu-toggle" class="menu-toggle cell small-3" aria-controls="primary-menu" aria-expanded="false" aria-label="Controle le menu mobile"><span class="icon-menu"></span></button>
			

			<button class="recherche cell small-2 large-1" data-open="recherche"><span class="icon-search"></span></button>
			<div class="social  cell small-2 large-1">
				<?php //utiliser le même menu que dans le footer ? ?>
				<div class="icones grid-y align-middle align-center">
					<a href="https://www.facebook.com/CAEL.MJC/" target="_blank" title="Facebook"><span class="icon-facebook"></span></a>
					<a href="" target="_blank" title="Twitter"><span class="icon-twitter"></span></a>
					<a href="" target="_blank" title="Instagram"><span class="icon-instagram"></span></a>
					<a href="" target="_blank" title="YouTube"><span class="icon-youtube"></span></a>
				</div>	
			</div>
			<nav id="site-navigation" class="main-navigation cell small-12 large-8">
				
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					//'menu_class'	=> 'dropdown menu',
					'items_wrap'     => '<ul id="%1$s" class="%2$s" data-submenu-toggle="true" data-responsive-menu="accordion medium-dropdown">%3$s</ul>',
					'walker'         => new Foundation_Menu_Walker(),
					'orderby' => 'title',
					'order'   => 'DESC',
				) );
				?>
			</nav><!-- #site-navigation -->

		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
