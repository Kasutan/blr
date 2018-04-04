<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_senior = new_cmb2_box( array(
		'id'            => 'Actionssenior',
		'title'         => __( 'Section projet sénior', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 9) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_titre1',
		'type'       => 'text',
		'default'	=> 'Projet sénior',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Titre 1bis', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_titre1bis',
		'type'       => 'text',
		'default'	=> 'intergénération !',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Texte 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_texte1',
		'type'       => 'textarea',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Image projet sénior', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_image',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l&acute;image' ),	
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_titre2',
		'type'       => 'text',
		'default'	=> 'Bricothèque',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Texte 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_texte2',
		'type'       => 'wysiwyg',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Titre lien 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_titrelien2',
		'type'       => 'text',
		'default'	=> 'Pour aller plus loin, contactez nous',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'lien 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_lien2',
		'type'       => 'text_url',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Titre 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_titre3',
		'type'       => 'text',
		'default'	=> 'Pauses café',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Texte 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_texte3',
		'type'       => 'wysiwyg',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Titre lien 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_titrelien3',
		'type'       => 'text',
		'default'	=> 'Consultez les prochaines pauses cafés',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'lien 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_lien3',
		'type'       => 'text_url',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Titre 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_titre4',
		'type'       => 'text',
		'default'	=> 'Ateliers équilibre en mouvement',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Texte 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_texte4',
		'type'       => 'wysiwyg',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Titre lien 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_titrelien4',
		'type'       => 'text',
		'default'	=> 'Consultez les prochaines sessions',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'lien 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_lien4',
		'type'       => 'text_url',		
	) );

});
