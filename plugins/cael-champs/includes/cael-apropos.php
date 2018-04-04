<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_apropos = new_cmb2_box( array(
		'id'            => 'accueilapropos',
		'title'         => __( 'Section à propos', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 5) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_apropos->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_titre1',
		'type'       => 'text',
		'default'	=> 'Le CAEL c&acute;est...',		
	) );

	$cmb_apropos->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_titre2',
		'type'       => 'text',
		'default'	=> 'Notre projet',		
	) );

	$cmb_apropos->add_field( array(
		'name'       => __( 'Titre 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_titre3',
		'type'       => 'text',
		'default'	=> 'Plusieurs dizaines d&acute;activités',		
	) );

	$cmb_apropos->add_field( array(
		'name'       => __( 'Image', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_apropos_image',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l image' ),	
	) );
});
