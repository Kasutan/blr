<?php 
    $tax = get_query_var( 'taxonomy' );
    $term = get_query_var( 'term' );
	$term = get_term_by( 'slug', $term, $tax );
	$imagelienid = get_term_meta( $term->term_id, CMB_PREFIX.'_image_id', 1 );

	//
	$event_terms = get_terms(
		'event_type',
		array(
			'orderby'=>'name',
			'parent' => $term->term_id,
			'hide_empty'=>false
		)
    );
?>
<main id="main" class="site-main act2">
	<p class="fil-ariane fond-vert">Fil d'ariane</p>
	
	<header class="entry-header">
		<div class="fond fond-vert-clair">&nbsp;</div>
		
		<h1 class="fond-rose">
        	<?php echo($term->name); ?>
    	</h1>
		<?php echo wp_get_attachment_image($imagelienid, 'banniere' ); ?>
		<div class="filtre">Filtre</div>
	</header><!-- .entry-header -->
	<div class="entry-content grid-x align-justify">


		<?php 	if(!empty($event_terms) && !is_wp_error($event_terms)){
		foreach($event_terms as $event_term){
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
	
	</div><!-- .entry-content -->
</main>