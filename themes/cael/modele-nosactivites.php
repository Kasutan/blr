<?php
/*
Template Name: Nos activités
*/

get_header();

?>

	<div id="primary" class="content-area nos-activites">

		<main id="main" class="site-main">
		<?php
			if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('
			<p id="breadcrumbs" class="small-12 column fil-ariane fond-vert">','</p>
			');
			}
		?>
			<section class="rose-clair" >
				<h1 class="titre">
					<?php echo get_the_title(7); ?>
				</h1>
				<div class="intro">
					<?php echo apply_filters('the_content', get_post_field('post_content', 7)); ?>
				</div>
			</section>

			<section class="pictos grid-x">
				<h2 class="show-for-sr">Catégories d'activités</h2>
				<?php
					$event_terms = get_terms(
							'event_type',
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

			<section class="az fond-rose-clair">
				<h2>
					Les activités de <strong>A</strong> à <strong>Z</strong>
				</h2>
				<form id="filtre" class=" grid-x" >

						<fieldset>
						<div class=" grid-x">
							<div class=" grid-x">
								<input type="radio" id="tous"
								name="groupe" value="tous" checked>
								<label for="tous">Tous</label>
							</div>

							<div class=" grid-x">
								<input type="radio" id="adulte"
								name="groupe" value="adulte">
								<label for="adulte">Adulte</label>
							</div>

							<div class=" grid-x">
								<input type="radio" id="enfant"
								name="groupe" value="enfant">
								<label for="enfant">Enfant</label>		
							</div>
						</div>
						</fieldset>

					<fieldset>
					<div class=" grid-x">
						<input type="number" id="age" name="age"  placeholder="12" min="0" max="17">
						<label for="age">ans</label>
					</div>
					</fieldset>
				</form>
				<?php

					$events = get_terms(
						'event_type',
						array(
							'orderby'=>'name',
							'hide_empty'=>false
						)
					);

	 				if(!empty($events) && !is_wp_error($events)){
						 ?>
						 <div class="liste-activites">
						<?php
						foreach($events as $event){

							$eventid=$event->term_id;
							$current_term_level = get_tax_level($eventid, 'event_type');



    						if ($current_term_level == 3) {
								$lien= get_term_link($event);
								$titreevent=$event->name;
								$agemin = get_term_meta( $eventid, CMB_PREFIX.'_catactivites_agemin', true );
								$agemax = get_term_meta( $eventid, CMB_PREFIX.'_catactivites_agemax', true );

								$classe = get_age_class($agemin, $agemax);

								?>
								<a href= <?php echo ($lien); ?> class="lien <?php echo ($classe); ?>">
								<?php echo($titreevent); ?>
									</a>
								<?php
    						}

						}
						?></div><?php
					};
					wp_reset_postdata();
				?>
			</section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();