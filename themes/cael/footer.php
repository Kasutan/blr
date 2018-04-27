<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cael
 */
if (function_exists('gm_get_theme_menu_name')) {
	$titre1=gm_get_theme_menu_name('menu-footer-1');
	$titre2=gm_get_theme_menu_name('menu-footer-2');
	$titre3=gm_get_theme_menu_name('menu-footer-3');
	$titresocial=gm_get_theme_menu_name('menu-footer-social');
}

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="menus-footer grid-x grid-padding-x align-center">
			<nav class="cell medium-6 large-3">
				<p class="footer-header">
				<?php echo $titre1; ?>
				</p>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-footer-1',
					'menu_id'        => '',
					'container'		=> false
				) );
				?>
			</nav>
			<nav class="cell medium-6 large-3">
				<p class="footer-header">
					<a href="<?php echo esc_url( get_permalink(43) ); ?>">
						<?php echo get_the_title(43); ?>
					</a>
				</p>
				<br>
				<p class="footer-header">
				<?php echo $titre2; ?>
				</p>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-footer-2',
					'menu_id'        => '',
					'container'		=> false
				) );
				?>
			</nav>
			<nav class="cell medium-6 large-3">
				<p class="footer-header">
				<?php echo $titre3; ?>
				</p>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-footer-3',
					'menu_id'        => '',
					'container'		=> false
				) );
				?>
			</nav>
			<nav class="cell medium-6 large-3 menu-footer-social">
				<p class="footer-header">
				<?php echo $titresocial; ?>
				</p>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-footer-social',
					'menu_id'        => '',
					'container'		=> false
				) );
				?>
			</nav>
		</div>
		<div class="site-info grid-x align-center align-middle">
			<nav>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-footer-4',
					'menu_id'        => '',
					'container'		=> false
				) );
				?>
			</nav>
			<span class="copyright">&copy; Copyright
					<?php echo the_date('Y').' '.esc_html__( '&mdash; Tous droits réservés', 'cael' ); ?> 
				</span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<?php 
		get_template_part('/template-parts/popup','acces');
		get_template_part('/template-parts/popup','recherche');
	?>
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
