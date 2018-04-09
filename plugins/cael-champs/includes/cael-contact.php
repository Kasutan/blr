<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_contact = new_cmb2_box( array(
		'id'            => 'Renscontact',
		'title'         => __( 'Section contact', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 13) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_contact->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_contact_titre1',
		'type'       => 'text',
		'default'	=> 'Contact',		
	) );

	$cmb_contact->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_contact_titre2',
		'type'       => 'text',
		'default'	=> 'CAEL',		
	) );

	$cmb_contact->add_field( array(
		'name'       => __( 'Titre 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_contact_titre3',
		'type'       => 'text',
		'default'	=> 'Centre Animation Expression & Loisirs',		
	) );

	$cmb_contact->add_field( array(
		'name'       => __( 'Adresse', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_contact_adresse',
		'type'       => 'wysiwyg',		
	) );

	$cmb_contact->add_field( array(
		'name'       => __( 'Autre site', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_contact_autre',
		'type'       => 'wysiwyg',		
	) );

});
