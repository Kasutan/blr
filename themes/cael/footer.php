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

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'cael' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'cael' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'cael' ), 'cael', '<a href="https://www.kasutan.pro/">Rodolphe Cazemajou-Tournié</a>' );
				?>
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