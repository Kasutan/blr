<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_activites = new_cmb2_box( array(
		'id'            => 'accueilact',
		'title'         => __( 'Section Activités', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 5) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_activites->add_field( array(
		'name'       => __( 'Titre Activités', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_activites',
		'type'       => 'text',
		'default'	=> 'Activités',		
	) );

	$cmb_activites->add_field( array(
		'name'       => __( 'Titre Zoom', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_zoom',
		'type'       => 'text',
		'default'	=> 'Zoom sur',		
	) );
});

function affiche_activite() {			


	$event_acti = get_terms(
		'event_type',
		array(
			'meta_key' => 'cael__event_mea',
			'meta_value_num' => 1,
			'posts_per_page' => 1,
			'hide_empty'=>false
		)
	);
	$lieneventacti= get_term_link($event_acti[0]);
	$titreacti =$event_acti[0]->name;
	$eventactiid=$event_acti[0]->term_id;
	$imageeventacti = get_term_meta( $eventactiid, CMB_PREFIX.'_image_id', 1 );

	$event_terms = get_terms(
		'event_type',
		array(
			'orderby'=>'name',
			'parent' => 0,
			'hide_empty'=>false
		)
	);

	wp_reset_postdata();

$ID=get_the_ID();
ob_start();
$text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_activites', true );
$text2  = get_post_meta( $ID, CMB_PREFIX.'_accueil_zoom', true );

?>
<section id="activites" class="grid-x align-middle justify-between" >
	<div class="cell medium-6 zoom">
		<h2 class="titre">
		<?php  echo esc_html( $text ); ?>
		</h2>
		
		<a href= <?php echo ($lieneventacti); ?> class="lien">
            <?php echo wp_get_attachment_image( $imageeventacti, 'medium' ); ?>
        </a>
		<span class="oblique h4">			<?php  echo esc_html( $text2 ); ?></span>
		<span class="titre">
		<?php  echo ( $titreacti ); ?>
		</span>
	</div>
	<div class="cell medium-6 pictos flex-container">
		<?php 	if(!empty($event_terms) && !is_wp_error($event_terms)){
		foreach($event_terms as $event_term){
			$lien= get_term_link($event_term);
			$titreevent=$event_term->name;
			$eventid=$event_term->term_id;
			$imagelien = get_term_meta( $eventid, CMB_PREFIX.'_image', 1 );
		?>
		<a href= <?php echo ($lien); ?> class="lien">
			<figure>
				<img src=<?php echo ($imagelien); ?> alt=<?php  echo esc_html( $titreevent ); ?>
				class="picto">
				<figcaption><?php  echo esc_html( $titreevent ); ?></figcaption>
			</figure>
        </a>
		<?php
		}
	};?>
	</div>
</section>
<?php

echo ob_get_clean();

}