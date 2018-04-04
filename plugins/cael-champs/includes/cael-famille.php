<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_famille = new_cmb2_box( array(
		'id'            => 'Actionsfamille',
		'title'         => __( 'Section projet famille', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 9) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre1',
		'type'       => 'text',
		'default'	=> 'Un projet famille',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 1bis', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre1bis',
		'type'       => 'text',
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Texte 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_texte1',
		'type'       => 'textarea',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Image projet famille', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_image',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l image' ),	
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre2',
		'type'       => 'text',
		'default'	=> 'La référente famille',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Texte 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_texte2',
		'type'       => 'wysiwyg',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre lien 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titrelien2',
		'type'       => 'text',
		'default'	=> 'pour plus d&acute;informations, contactez Tiphaine',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'lien 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_lien2',
		'type'       => 'text_url',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre3',
		'type'       => 'text',
		'default'	=> 'Stages en famille',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Texte 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_texte3',
		'type'       => 'wysiwyg',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre lien 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titrelien3',
		'type'       => 'text',
		'default'	=> 'Consultez les prochains stages en famille',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'lien 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_lien3',
		'type'       => 'text_url',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre4',
		'type'       => 'text',
		'default'	=> 'Sortie famille',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Texte 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_texte4',
		'type'       => 'wysiwyg',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre lien 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titrelien4',
		'type'       => 'text',
		'default'	=> 'Consultez les prochaines sorties en famille',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'lien 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_lien4',
		'type'       => 'text_url',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 5', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre5',
		'type'       => 'text',
		'default'	=> 'Pause cafés parentés',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Texte 5', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_texte5',
		'type'       => 'wysiwyg',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre lien 5', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titrelien5',
		'type'       => 'text',
		'default'	=> 'Consultez les prochaines pauses cafés parentalité',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'lien 5', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_lien5',
		'type'       => 'text_url',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 6', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre6',
		'type'       => 'text',
		'default'	=> 'Soirée jeux',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Texte 6', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_texte6',
		'type'       => 'wysiwyg',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre lien 6', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titrelien6',
		'type'       => 'text',
		'default'	=> 'Consultez les prochaines soirées jeux',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'lien 6', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_lien6',
		'type'       => 'text_url',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 7', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre7',
		'type'       => 'text',
		'default'	=> 'La "passerelle"',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Texte 7', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_texte7',
		'type'       => 'wysiwyg',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre lien 7', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titrelien7',
		'type'       => 'text',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'lien 7', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_lien7',
		'type'       => 'text_url',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 8', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre8',
		'type'       => 'text',
		'default'	=> 'Permanences assistante sociale',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Texte 8', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_texte8',
		'type'       => 'wysiwyg',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre lien 8', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titrelien8',
		'type'       => 'text',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'lien 8', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_lien8',
		'type'       => 'text_url',		
	) );
});
