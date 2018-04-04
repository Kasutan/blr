<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_contact = new_cmb2_box( array(
		'id'            => 'renscontact',
		'title'         => __( 'Section Contact', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 13) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_contact->add_field( array(
		'name'       => __( 'Titre Contact', 'cmb2' ),
		'id'         => CMB_PREFIX . '_contact_titre',
		'type'       => 'text',
		'default'	=> 'Contact',		
	) );

	$cmb_reseaux->add_field( array(
		'name'       => __( 'Titre guide', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_guide',
		'type'       => 'text',
		'default'	=> 'GUIDE 2017-2018',		
	) );

	$cmb_reseaux->add_field( array(
		'name'       => __( 'Titre lien plaquette', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_lien_plaquette',
		'type'       => 'text',
		'default'	=> 'Téléchargez la plaquette des activités',		
	) );

	$cmb_reseaux->add_field( array(
		'name'       => __( 'Lien plaquette', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_lien_calendrier',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger la plaquette' ),	
	) );

	$cmb_reseaux->add_field( array(
		'name'       => __( 'Image', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_image',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l image' ),	
	) );
});
