<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_social = new_cmb2_box( array(
		'id'            => 'Actionssocial',
		'title'         => __( 'Section projet social', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 9) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_social->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_social_titre1',
		'type'       => 'text',
		'default'	=> 'Le CAEL centre social',		
	) );

	$cmb_social->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_social_titre2',
		'type'       => 'text',
		'default'	=> 'Un projet social',		
	) );

	$cmb_social->add_field( array(
		'name'       => __( 'Texte 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_social_texte2',
		'type'       => 'textarea',		
	) );

	$cmb_social->add_field( array(
		'name'       => __( 'Image projet social', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_social_image',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l image' ),	
	) );
});
