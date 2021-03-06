<?php
/*
Template Name: Renseignements
*/

get_header();
$ID=get_the_ID();
?>

	<main id="main" class="site-main rens">
		<header class="entry-header text-center">
			<nav class = "ancres">
				<a href="#contact">
					<?php echo wp_kses_post(get_post_meta( $ID, CMB_PREFIX.'_rens_contact_titre1', true )); ?>
				</a>
				<a href="#horaires">
					<?php echo wp_kses_post(get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_titre1', true )); ?>
				</a>
				<a href="#acces">
					<?php echo wp_kses_post(get_post_meta( $ID, CMB_PREFIX.'_rens_acces_titre1', true )); ?>
				</a>
				<a href="#inscriptions">
					<?php echo wp_kses_post(get_post_meta( $ID, CMB_PREFIX.'_rens_inscriptions_titre1', true )); ?> 
				</a>
			</nav>

			<h1 class="rose-clair">
				<?php the_title();?>
			</h1>
		</header> 
		<div class="entry-content">
		
			<?php
			affiche_contact();
			affiche_horaires();
			affiche_acces();
			affiche_inscriptions();
			?>
		</div>
	</main><!-- #main -->

<?php
get_footer();