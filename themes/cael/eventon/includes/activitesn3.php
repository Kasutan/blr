<?php 
	$tax = get_query_var( 'taxonomy' );
	$term_name = get_query_var( 'term' );
	$term = get_term_by( 'slug', $term_name, $tax );
	$ID = $term->term_id;
	$imagelienid = get_term_meta( $ID, CMB_PREFIX.'_image_id', 1 );

	$titre1  = get_post_meta( 7, CMB_PREFIX.'_Singleactivites_titre1', true );

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
			$testevent = get_post_custom($IDevent);
	}
	//var_dump($testevent);
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
		<h3>
			<?php echo($titre1); ?>
			<?php echo($organizer_terms[0]->name);?>
			
		</h3>
		<p>
			<?php echo($term->description); ?>
		</p>


		<?php 	
			if ( $query->have_posts() ) {
				while($query->have_posts()): $query->the_post();

					$IDquery = get_the_ID();
					$titre = get_the_title();
					$lien= get_the_permalink();
					$organizer_terms = wp_get_post_terms($IDquery, 'event_organizer');
					echo('test');
					echo($organizer_terms[0]->name);

				endwhile;
			}
			wp_reset_postdata();
		?>
	
	</div><!-- .entry-content -->