<?php
/*
Template Name: Nos activités
*/

get_header();
$ID=get_the_ID();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section id="nosactivites" class="scrollify">
				<div>
					<h2 class="titre">
						<?php the_title(); ?>
					</h2>
					<p>
						<?php the_content(); ?>
					</p>
				</div>
			</section>

			<section>
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
						<a href= <?php echo ($lien); ?> class="lien">
							<figure>
								<img src=<?php echo ($imagelien); ?> alt=<?php  echo esc_html( $titreevent ); ?>>
								<figcaption><?php  echo esc_html( $titreevent ); ?></figcaption>
							</figure>
						</a>
						<?php
						}
					};?>
			</section>

			<section>
				<h2>
					Les activités de A à Z
				</h2>
				<?php
					$events = new WP_Query(array(
						'posts_per_page'=>-1,
						'post_type' => 'ajde_events',
						'post_status'=>'any'			
					));
		
					if ( $events->have_posts() ) {
						while($events->have_posts()): $events->the_post();
							$titre = get_the_title();
							$lien= get_the_permalink();
							?>
							<a href=<?php echo ($lien); ?>> <?php echo esc_html( $titre ); ?> </a>
							<?php
						endwhile;
					}
					wp_reset_postdata();
				?>
			</section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();