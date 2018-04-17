<?php 
	setlocale(LC_ALL, 'fra');
	$tax = get_query_var( 'taxonomy' );
	$term_name = get_query_var( 'term' );
	$term = get_term_by( 'slug', $term_name, $tax );
	$ID = $term->term_id;
	$imagelienid = get_term_meta( $ID, CMB_PREFIX.'_image_id', 1 );

	$texte1  = get_post_meta( 7, CMB_PREFIX.'_Singleactivites_titre1', true );
	$texte2  = get_post_meta( 7, CMB_PREFIX.'_Singleactivites_titre2', true );
	$texte3  = get_post_meta( 7, CMB_PREFIX.'_Singleactivites_titre3', true );
	$texte4  = get_post_meta( 7, CMB_PREFIX.'_Singleactivites_titre4', true );
	$texte5  = get_post_meta( 7, CMB_PREFIX.'_Singleactivites_titre5', true );
	$texte6  = get_post_meta( 7, CMB_PREFIX.'_Singleactivites_titre6', true );

	$args = array(
		'post_type' => 'ajde_events',
		'tax_query' => array(
				array(
					'taxonomy' => 'event_type',
					'terms'    => $ID,
				),
			),
		);

	$query = new WP_Query( $args );
	$query2 = new WP_Query( $args );
		
	if ( $query2->have_posts() ) {
			$query2->the_post();
			$IDevent = get_the_id();
			$organizer_terms = wp_get_post_terms($IDevent, 'event_organizer');
			$location_terms = wp_get_post_terms($IDevent, 'event_location');
			$testevent = get_post_custom($IDevent);
		}

	?>

	<header class="entry-header">
		<h1>
        	<?php echo($term->name); ?>
    	</h1>
		<?php echo wp_get_attachment_image($imagelienid, 'large' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">

		<h2>
        	<?php echo($term->name); ?>
    	</h2>
		
		<?php echo($texte1); ?>
		<?php echo($organizer_terms[0]->name);?>
		
		<p>
			<?php echo($term->description); ?>
		</p>

		<div class="grid-x">
			<?php 	
				if ( $query->have_posts() ) {
					while($query->have_posts()): $query->the_post();

						$IDquery = get_the_ID();
						$niveauevent = get_post_meta( $IDquery, 'evcal_subtitle', true );
						$debut = get_post_meta( $IDquery, 'evcal_srow', true );
						$fin = get_post_meta( $IDquery, 'evcal_erow', true );

						?><div class="cell small-12 medium-6 large-4">
						<strong> <?php echo($niveauevent); ?> </strong>
						</br>
						<?php	echo date_i18n($format . 'l G\hi', $debut );
							echo date_i18n($format . ' > G\hi', $fin );
						?></div><?php
					endwhile;
				}
				
			?>
		</div>
		<div class"adresse">
			<?php echo($texte2); ?>	
			<br/>
			<?php echo($texte3); echo(' '); echo($location_terms[0]->name);?>
		</div>

		<div>
		<?php echo($texte4); ?>	
			<br/>
			<?php echo($texte5); echo(' '); ?><a href=""><?php echo($texte6);?></a>
		</div>

	<?php echo get_tax_navigation( 'event_type', 'previous' ); ?>
	<?php echo get_tax_navigation( 'event_type', 'next' ); ?>

	<?php 
	wp_reset_postdata();?>
	</div><!-- .entry-content -->