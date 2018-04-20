<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	// champs ajoutés dans les pages événements du plugin eventon
	$cmb_evenements = new_cmb2_box( array(
		'id'            => 'evenements',
		'title'         => __( 'Zone pour les événements', 'cmb2' ),
		'object_types' => array( 'ajde_events' ), // term data
		'context'       => 'normal',
		'priority'      => 'low',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_evenements->add_field( array(
		'name'       => __( 'Plaquette PDF de l&acuteévénement', 'cmb2' ),
		'id'         => CMB_PREFIX . 'events_pdf',
		'type'       => 'file',	
	) );

	$cmb_evenements->add_field( array(
		'name'       => __( 'Visuel du programme', 'cmb2' ),
		'id'         => CMB_PREFIX . 'events_image',
		'type'       => 'file',	
	) );

	$cmb_evenements->add_field( array(
		'name'       => __( 'texte du lien pour la plaquette', 'cmb2' ),
		'id'         => CMB_PREFIX . '_events_lien',
		'type'       => 'text',	
	) );

	$cmb_photoeven = new_cmb2_box( array(
		'id'            => 'photoeven',
		'title'         => __( 'Photographies de l&acuteévénement', 'cmb2' ),
		'object_types' => array( 'ajde_events' ), // term data
		'context'       => 'normal',
		'priority'      => 'low',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_photoeven->add_field( array(
		'name'       => __( 'Photographie 1', 'cmb2' ),
		'id'         => CMB_PREFIX . 'photoeven_1',
		'type'       => 'file',	
	) );

	$cmb_photoeven->add_field( array(
		'name'       => __( 'Photographie 2', 'cmb2' ),
		'id'         => CMB_PREFIX . 'photoeven_2',
		'type'       => 'file',	
	) );

	$cmb_photoeven->add_field( array(
		'name'       => __( 'Photographie 3', 'cmb2' ),
		'id'         => CMB_PREFIX . 'photoeven_3',
		'type'       => 'file',	
	) );

	$cmb_photoeven->add_field( array(
		'name'       => __( 'Photographie 4', 'cmb2' ),
		'id'         => CMB_PREFIX . 'photoeven_4',
		'type'       => 'file',	
	) );

	$cmb_photoeven->add_field( array(
		'name'       => __( 'Photographie 5', 'cmb2' ),
		'id'         => CMB_PREFIX . 'photoeven_5',
		'type'       => 'file',	
	) );

	$cmb_photoeven->add_field( array(
		'name'       => __( 'Photographie 6', 'cmb2' ),
		'id'         => CMB_PREFIX . 'photoeven_6',
		'type'       => 'file',	
	) );

});
