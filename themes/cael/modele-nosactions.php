<?php
/*
Template Name: Nos Actions
*/

get_header();
$ID=get_the_ID();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<nav class = "ancres">
			<a href=#famille>
				<?php echo esc_html(get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titre1', true )); ?>
			</a>
			<a href=#senior>
				<?php echo esc_html(get_post_meta( $ID, CMB_PREFIX.'_actions_senior_titre1', true )); ?>
			</a>
			<a href=#bafa>
				<?php echo esc_html(get_post_meta( $ID, CMB_PREFIX.'_actions_bafa_titre1', true )); ?>
			</a>

		</nav>

		<?php
			affiche_social();
			affiche_famille();
			affiche_senior();
			affiche_bafa();
		?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();