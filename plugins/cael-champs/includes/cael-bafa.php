<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_bafa = new_cmb2_box( array(
		'id'            => 'Actionsbafa',
		'title'         => __( 'Section BAFA', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 9) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_titre1',
		'type'       => 'text',
		'default'	=> 'Le BAFA',		
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Texte 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_texte1',
		'type'       => 'textarea',		
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Image BAFA', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_image',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l&acute;image' ),	
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_titre2',
		'type'       => 'text',	
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Texte 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_texte2',
		'type'       => 'wysiwyg',		
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Titre lien 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_titrelien2',
		'type'       => 'text',
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'lien 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_lien2',
		'type'       => 'text_url',		
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Titre 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_titre3',
		'type'       => 'text',
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Texte 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_texte3',
		'type'       => 'wysiwyg',		
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Titre lien 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_titrelien3',
		'type'       => 'text',		
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'lien 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_lien3',
		'type'       => 'text_url',		
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Titre 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_titre4',
		'type'       => 'text',		
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Texte 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_texte4',
		'type'       => 'wysiwyg',		
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Titre lien 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_titrelien4',
		'type'       => 'text',		
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'lien 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_lien4',
		'type'       => 'text_url',		
	) );

});
