<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_projet = new_cmb2_box( array(
		'id'            => 'CAELprojet',
		'title'         => __( 'Section projet', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 6) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_titre1',
		'type'       => 'text',
		'default'	=> 'Le projet',		
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'citation', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_citation',
		'type'       => 'wysiwyg',		
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Texte 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_texte1',
		'type'       => 'textarea',	
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Image projet', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_image',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l image' ),	
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_titre2',
		'type'       => 'text',
		'default'	=> 'Loisirs',		
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Texte 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_texte2',
		'type'       => 'textarea',	
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Titre 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_titre3',
		'type'       => 'text',
		'default'	=> 'Culture',		
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Texte 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_texte3',
		'type'       => 'textarea',	
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Titre 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_titre4',
		'type'       => 'text',
		'default'	=> 'Animation',		
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Texte 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_texte4',
		'type'       => 'textarea',	
	) );

});
