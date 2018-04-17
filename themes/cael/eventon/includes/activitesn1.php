<?php 
    $tax = get_query_var( 'taxonomy' );
    $term = get_query_var( 'term' );
    $term = get_term_by( 'slug', $term, $tax );

	$event_terms = get_terms(
		'event_type',
		array(
			'orderby'=>'name',
			'parent' => $term->term_id,
			'hide_empty'=>false
		)
    );

?>

<main id="main" class="site-main act1">
	<header class="entry-header">
	    <h1 class="fond-rose">
        <?php echo($term->name); ?>
		</h1>
	</header>
	<div class="entry-content">	

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
		<a href= <?php echo ($lien); ?> class="lien grid-x ">
			<div class="cell show-for-large large-1"></div>
			<img src=<?php echo ($imagelien); ?> alt=<?php  echo esc_html( $titreevent ); ?>
			class="cell small-8 medium-4 large-2">
			<div class="details cell small-11 medium-8 large-7 fond-rose">
				<h2 class="title rose"><?php echo esc_html( $titreevent ); ?></h2>
				<p>
					<?php echo($detail); ?>
				</p>
			</div>
			<div class="cell show-for-large large-2"></div>			
        </a>
		<?php
		}
	};?>

	</div>

</main>