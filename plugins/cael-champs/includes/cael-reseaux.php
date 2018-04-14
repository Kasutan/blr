<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_reseaux = new_cmb2_box( array(
		'id'            => 'accueilres',
		'title'         => __( 'Section Réseaux sociaux et guide', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 5) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_reseaux->add_field( array(
		'name'       => __( 'Titre Réseaux sociaux', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_réseaux',
		'type'       => 'text',
		'default'	=> 'Retrouvez le CAEL sur les réseaux sociaux...',		
	) );

	$cmb_reseaux->add_field( array(
		'name'       => __( 'Titre guide', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_guide',
		'type'       => 'text',
		'default'	=> 'GUIDE 2017-2018',		
	) );

	$cmb_reseaux->add_field( array(
		'name'       => __( 'Titre lien plaquette', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_titre_lien_plaquette',
		'type'       => 'text',
		'default'	=> 'Téléchargez la plaquette des activités',		
	) );

	$cmb_reseaux->add_field( array(
		'name'       => __( 'Lien plaquette', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_lien_plaquette',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger la plaquette' ),	
	) );

	$cmb_reseaux->add_field( array(
		'name'       => __( 'Image Logo', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_image_logo',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l image' ),	
	) );

	$cmb_reseaux->add_field( array(
		'name'       => __( 'Image plaquette', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_image_plaquette',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l image' ),	
	) );
});

function affiche_reseaux() {			



	$ID=get_the_ID();
	$lienpdf  = get_post_meta( $ID, CMB_PREFIX.'_accueil_lien_plaquette', true );
	$imagelien = get_post_meta( $ID, CMB_PREFIX.'_accueil_image_logo_id', true);
	$imageplaquette = get_post_meta( $ID, CMB_PREFIX.'_accueil_image_plaquette_id', true);
	ob_start();
	?>
	<section id="reseaux" class="scrollify">
		<div>
			<h2 class="titre">
			<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_réseaux', true ); 
			echo esc_html( $text ); ?>
			</h2>
			<?php echo do_shortcode('[fts_mashup posts=3 social_network_posts=1 words=45 center_container=yes show_social_icon=right show_media=bottom show_date=no show_name=yes]'); ?>
		</div>
		<div>
			<h2 class="titre">
			<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_guide', true ); 
			echo esc_html( $text ); ?>
			</h2>
			<a href= <?php echo ($lienpdf); ?> class="lien">
			<h2 class="titre">
			<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_titre_lien_plaquette', true ); 
			echo esc_html( $text ); ?>
			</h2>
			<?php echo wp_get_attachment_image( $imagelien, 'large' ); ?>
			<?php echo wp_get_attachment_image( $imageplaquette, 'large' ); ?>
			</a>
		</div>
	</section>
	<?php
	echo ob_get_clean();
	}