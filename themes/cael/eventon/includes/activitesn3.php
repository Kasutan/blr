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
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
        'order' => 'ASC',
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
<main id="main" class="site-main act3">
		<?php
			if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('
			<p id="breadcrumbs" class="small-12 column fil-ariane fond-vert">','</p>
			');
			}
		?>

	<header class="entry-header ">
		<div class="fond fond-vert-clair">&nbsp;</div>
		<?php echo wp_get_attachment_image($imagelienid, 'banniere' ); ?>
		<h1 class="fond-vert">
        	<?php echo($term->name); ?>
    	</h1>
	</header><!-- .entry-header -->
	<div class="entry-content fond-rose-clair">

		<h2>
        	<?php echo($term->name); ?>
    	</h2>
		
		<?php echo($texte1); ?>
		<strong><?php echo($organizer_terms[0]->name);?></strong>
		
		<p>
			<?php echo($term->description); ?>
		</p>

		<div class="gridact3">
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
		<div class="adresse grid-x">
			<img alt="picto boussole" src= "/wp-content/themes/cael/images/boussole.png"/>
			<div class="adressepicto">
				<span><?php echo($texte2); ?></span>	
				<br/>
				<?php echo($texte3); echo(' '); echo($location_terms[0]->name);?>
			</div>
		</div>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<p class="inscription">
		<strong><?php echo($texte4); ?></strong>	
			<br/>
			<?php echo($texte5); echo(' '); ?><a href=""><?php echo($texte6);?></a>
		</p>
		<div class="navigation grid-x align-justify">
			<?php echo get_tax_navigation( 'event_type', 'previous' ); ?>
			<?php echo get_tax_navigation( 'event_type', 'next' ); ?>
		</div>
	</footer>
</main>
<?php 	wp_reset_postdata();?>