<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_inscriptions = new_cmb2_box( array(
		'id'            => 'Rensinscriptions',
		'title'         => __( 'Section Inscriptions', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 13) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_inscriptions->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_inscriptions_titre1',
		'type'       => 'text',
		'default'	=> 'Inscriptions',		
	) );

	$cmb_inscriptions->add_field( array(
		'name'       => __( 'Texte 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_inscriptions_texte1',
		'type'       => 'wysiwyg',	
	) );

	$cmb_inscriptions->add_field( array(
		'name'       => __( 'Titre lien 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_inscriptions_titrelien1',
		'type'       => 'text',
		'default'	=> 'Consultez les modalités d&acute;inscriptions',		
	) );

	$cmb_inscriptions->add_field( array(
		'name'       => __( 'lien 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_inscriptions_lien1',
		'type'       => 'text_url',		
	) );

	$cmb_inscriptions->add_field( array(
		'name'       => __( 'Titre lien 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_inscriptions_titrelien2',
		'type'       => 'text',
		'default'	=> 'Consultez les tarifs des activités',		
	) );

	$cmb_inscriptions->add_field( array(
		'name'       => __( 'lien 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_inscriptions_lien2',
		'type'       => 'text_url',		
	) );
});
