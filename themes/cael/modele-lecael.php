<?php
/*
Template Name: Le CAEL
*/

get_header();
$ID=get_the_ID();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<section class = "ancres">
			<a href=#association>
				<?php echo esc_html(get_post_meta( $ID, CMB_PREFIX.'_lecael_asso_titre1', true )); ?>
			</a>
			<a href=#projet>
				<?php echo esc_html(get_post_meta( $ID, CMB_PREFIX.'_lecael_projet_titre1', true )); ?>
			</a>
			<a href=#chiffres>
				<?php echo esc_html(get_post_meta( $ID, CMB_PREFIX.'_lecael_chiffres_titre1', true )); ?>
			</a>
			<a href=#equipe>
				<?php echo esc_html(get_post_meta( $ID, CMB_PREFIX.'_lecael_equipe_titre1', true )); ?>
			</a>
			<a href=#administration>
				<?php echo esc_html(get_post_meta( $ID, CMB_PREFIX.'_lecael_equipe_titre21', true ));
				echo (" ");
				echo esc_html(get_post_meta( $ID, CMB_PREFIX.'_lecael_equipe_titre22', true )); ?>
			</a>
			<a href=#partenaires>
				<?php echo esc_html(get_post_meta( $ID, CMB_PREFIX.'_lecael_part_titre1', true )); ?>
			</a>
		</section>

		<?php
            affiche_association();
            affiche_projet();
            affiche_chiffres();
			affiche_equipe();
			affiche_partenaires();
		?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();