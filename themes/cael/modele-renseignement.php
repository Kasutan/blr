<?php
/*
Template Name: Renseignements
*/

get_header();
$ID=get_the_ID();
/*
?>

	<div id="primary" class="content-area lecael">
		<main id="main" class="site-main">

		<nav class = "ancres">
			<a href="#association">
				<?php echo wp_kses_post(get_post_meta( $ID, CMB_PREFIX.'_lecael_asso_titre1', true )); ?>
			</a>
			<a href="#projet">
				<?php echo wp_kses_post(get_post_meta( $ID, CMB_PREFIX.'_lecael_projet_titre1', true )); ?>
			</a>
			<a href="#chiffres">
				<?php echo wp_kses_post(get_post_meta( $ID, CMB_PREFIX.'_lecael_chiffres_titre1', true )); ?>
			</a>
			<a href="#equipe">
				<?php echo wp_kses_post(get_post_meta( $ID, CMB_PREFIX.'_lecael_equipe_titre1', true )); ?> 
			</a>
			<a href="#administration">
				<?php echo wp_kses_post(get_post_meta( $ID, CMB_PREFIX.'_lecael_equipe_titre21', true ));
				echo (" ");
				echo wp_kses_post(get_post_meta( $ID, CMB_PREFIX.'_lecael_equipe_titre22', true )); ?>
			</a>
			<a href="#partenaires">
				<?php echo wp_kses_post(get_post_meta( $ID, CMB_PREFIX.'_lecael_part_titre1', true )); ?>
			</a>
		</nav>

		<?php */?>
			<h1>
				<?php the_title();?>
			</h1>
			<?php
			affiche_contact();
			affiche_horaires();
			affiche_acces();
			affiche_inscriptions();
			?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();