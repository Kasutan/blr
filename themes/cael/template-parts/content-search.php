<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cael
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ('ajde_events' === get_post_type() ) {

		$p_id = get_the_ID();

		// On récupère des infos de l'événement
		$ev_vals = get_post_custom($p_id);
		$niveauevent = get_post_meta( $p_id, 'evcal_subtitle', true );

		// On récupère les catégories de l'événement
		$terms = wp_get_post_terms( $p_id, 'event_type');
		$eventype = 1;
		if (empty(array_filter($terms))) {
			$terms = wp_get_post_terms( $p_id, 'event_type_2');
			$eventype = 2;
			if (empty(array_filter($terms))) {
				$terms = wp_get_post_terms( $p_id, 'event_type_3');
				$eventype = 3;
				if (empty(array_filter($terms))) {
					$terms = wp_get_post_terms( $p_id, 'event_type_4');
					$eventype = 4;
				}
			}
		}

		// récupération des données de la catégorie la plus basse
		if(!empty($terms) && !is_wp_error($terms)){
			foreach($terms as $term){
				$current_term_level = get_tax_level($term->term_id, $term->taxonomy);

				if($current_term_level == 3)
				{
					$lien= get_term_link($term);
					$titreevent=$term->name;
				}

			}
		};

		?>
		<header class="entry-header resultsearch">
		<h2 class="entry-title"><a href="<?php echo($lien) ?> "><?php echo($titreevent . ' - ' . $niveauevent);
		if ($eventype == 1 || $eventype == 3) {
			echo(' à ' . date_i18n($format . 'G\hi', $ev_vals["evcal_srow"][0]) . ' le ' . date_i18n($format . 'l', $ev_vals["evcal_srow"][0]));
		} else {
			echo(' - le ' . date_i18n($format . 'j F', $ev_vals["evcal_srow"][0]));
		}
		
		
		 ?></a></h2>
		</header><!-- .entry-header -->
	<?php

		}else {
			
?>
	<header class="entry-header resultsearch">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			cael_posted_on();
			cael_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php the_post_thumbnail('medium'); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
		
	<?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->
