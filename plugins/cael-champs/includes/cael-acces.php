<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_acces = new_cmb2_box( array(
		'id'            => 'Rensacces',
		'title'         => __( 'Section Accès', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 13) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_acces->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_acces_titre1',
		'type'       => 'text',
		'default'	=> 'Accès',		
	) );

	$cmb_acces->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_acces_titre2',
		'type'       => 'text',
		'default'	=> 'Les lieux d&acute;activités',		
	) );

});
