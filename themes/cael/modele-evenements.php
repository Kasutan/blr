<?php
/*
Template Name: Evénements
*/

get_header();
$ID=get_the_ID();
?>

	<div id="primary" class="content-area nos-activites">
		<main id="main" class="site-main">

			<section class="rose-clair" >
				<h1 class="titre">
					<?php the_title(); ?>
				</h1>
				<div class="intro">
					<?php the_content(); ?>
				</div>
			</section>

			<section class="pictos grid-x">
				<h2 class="show-for-sr">Catégories d'activités</h2>
				<?php
					$event_terms = get_terms(
							'event_type_2',
								array(
									'orderby'=>'name',
									'parent' => 0,
									'hide_empty'=>false
								)
					);
					if(!empty($event_terms) && !is_wp_error($event_terms)){
						foreach($event_terms as $event_term){
							$lien= get_term_link($event_term);
							$titreevent=$event_term->name;
							$eventid=$event_term->term_id;
							$imagelien = get_term_meta( $eventid, CMB_PREFIX.'_image', 1 );
						?>
						<a href= <?php echo ($lien); ?> class="cell picto rose">
							<figure>
								<img src=<?php echo ($imagelien); ?> alt=<?php  echo esc_html( $titreevent ); ?>>
							</figure>
							<h3><?php  echo esc_html( $titreevent ); ?></h3>							
						</a>
						<?php
						}
					};?>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();