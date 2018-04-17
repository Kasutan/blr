<?php 
	$tax = get_query_var( 'taxonomy' );
    $term = get_query_var( 'term' );
    $term = get_term_by( 'slug', $term, $tax );

	$event_terms = get_terms(
		'event_type_2',
		array(
			'orderby'=>'name',
			'parent' => $term->term_id,
			'hide_empty'=>false
		)
    );

?>

<section>
    <h1>
        <?php echo($term->name); ?>
    </h1>

		<?php 	if(!empty($event_terms) && !is_wp_error($event_terms)){
		foreach($event_terms as $event_term){
			$lien= get_term_link($event_term);
            $titreevent=$event_term->name;
            $detail=$event_term->description;
			$eventid=$event_term->term_id;
			$imagelien = get_term_meta( $eventid, CMB_PREFIX.'_image', 1 );
		?>
		<a href= <?php echo ($lien); ?> class="lien">
			<figure>
                <img src=<?php echo ($imagelien); ?> alt=<?php  echo esc_html( $titreevent ); ?>>
				<figcaption><?php  echo esc_html( $titreevent ); ?></figcaption>
			</figure>
            <p>
                <?php echo($detail); ?>
            </p>
        </a>
		<?php
		}
	};?>



</section>