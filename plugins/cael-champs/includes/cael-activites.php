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
