<?php 
	setlocale(LC_ALL, 'fra');
	$tax = get_query_var( 'taxonomy' );
	$term_name = get_query_var( 'term' );
	$term = get_term_by( 'slug', $term_name, $tax );
	$ID = $term->term_id;


	$args = array(
		'post_type' => 'ajde_events',
		'tax_query' => array(
				array(
					'taxonomy' => 'event_type_2',
					'terms'    => $ID,
				),
			),
		);

	$query = new WP_Query( $args );

	//var_dump($query);	

	if ( $query->have_posts() ) {
			$query->the_post();
			$IDevent = get_the_id();
			$organizer_terms = wp_get_post_terms($IDevent, 'event_organizer');
			$location_terms = wp_get_post_terms($IDevent, 'event_location');
			$testevent = wp_get_post_terms($IDevent, 'event_speaker');
		}

		$textelien  = get_post_meta( $IDevent, CMB_PREFIX.'_events_lien', true );
		$lienpdf  = get_post_meta( $IDevent, CMB_PREFIX.'events_pdf', true );
		$idimagepdf  = get_post_meta( $IDevent, CMB_PREFIX.'events_image_id', true );
		$citation = get_post_meta( $IDevent, 'evcal_subtitle', true );
		$titreprog = get_post_meta( $IDevent, '_evcal_ec_f1a1_cus', true );
		$titrehisto = get_post_meta( $IDevent, '_evcal_ec_f2a1_cus', true );
		$textehisto = get_post_meta( $IDevent, '_evcal_ec_f3a1_cus', true );
		$titreprece = get_post_meta( $IDevent, '_evcal_ec_f4a1_cus', true );
		$speakers = get_post_meta( $IDevent, '_sch_blocks', true );
		$idphoto1  = get_post_meta( $IDevent, CMB_PREFIX.'photoeven_1_id', true );
		$idphoto2  = get_post_meta( $IDevent, CMB_PREFIX.'photoeven_2_id', true );
		$idphoto3  = get_post_meta( $IDevent, CMB_PREFIX.'photoeven_3_id', true );
		$idphoto4  = get_post_meta( $IDevent, CMB_PREFIX.'photoeven_4_id', true );
		$idphoto5  = get_post_meta( $IDevent, CMB_PREFIX.'photoeven_5_id', true );
		$idphoto6  = get_post_meta( $IDevent, CMB_PREFIX.'photoeven_6_id', true );


		var_dump($testevent);
	?>
<main id="main" class="site-main">

	<header class="entry-header ">
		<?php echo get_the_post_thumbnail( $IDevent, 'large' ); ?>
	</header><!-- .entry-header -->

	<section id="Lefestival">
		<div>
			<h1>
				<?php the_title(); ?>
			</h1>
			<a href= <?php echo ($lienpdf); ?> >
				<figure>
					<?php echo wp_get_attachment_image($idimagepdf, 'medium' ); ?>
					<figcaption><?php  echo esc_html( $textelien ); ?></figcaption>
				</figure>
        	</a>
		</div>
		<div>
			<blockquote>
				<?php echo esc_html( $citation ); ?>
			</blockquote>
			<p>
				<?php the_content(); ?>
			</p>
		</div>
	</section>

	<section id="programmation">
		<h1>
			<?php echo esc_html( $titreprog ); ?>
		</h1>
		<div>
			<?php echo ('programmation à récupérer'); ?>

				<?php 	if(!empty($speakers) && !is_wp_error($speakers)){
					foreach($speakers as $speaker){
						$lien= get_term_link($event_term);
						$titreevent=$event_term->name;
						$detail=$event_term->description;
						$eventid=$event_term->term_id;
						//$imagelien = get_term_meta( $eventid, CMB_PREFIX.'_image', 1 );
						$image = get_term_meta( $eventid, CMB_PREFIX.'_image_id', 1 );
						$imagelien = wp_get_attachment_image_url( $image, 'thumbnail' );
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


		</div>
		<div>
			<?php echo wp_get_attachment_image($idphoto1, 'thumbnail' ); ?>
			<?php echo wp_get_attachment_image($idphoto2, 'thumbnail' ); ?>
			<?php echo wp_get_attachment_image($idphoto3, 'thumbnail' ); ?>
			<?php echo wp_get_attachment_image($idphoto4, 'thumbnail' ); ?>
			<?php echo wp_get_attachment_image($idphoto5, 'thumbnail' ); ?>
			<?php echo wp_get_attachment_image($idphoto6, 'thumbnail' ); ?>
		</div>
	</section>

	<section id="histoire">
		<h1>
			<?php echo esc_html( $titrehisto ); ?>
		</h1>
		<p>
			<?php echo esc_html( $textehisto ); ?>
		</p>
	</section>

	<section>
		<h1>
			<?php echo esc_html( $titreprece ); ?>
		</h1>
		<div>
			<?php echo ('historique à récupérer'); ?>
		</div>
	</section>

</main>
<?php	wp_reset_postdata();?>