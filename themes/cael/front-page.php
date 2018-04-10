<?php
/**
 * The template for displaying the home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cael
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
			get_template_part( 'template-parts/home', 'slider' );
			affiche_calendrier();
			affiche_activite();
			affiche_reseaux();
			// lien vers le bandeau Newsletter
			affiche_apropos();
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
