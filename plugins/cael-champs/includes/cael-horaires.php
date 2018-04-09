<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_horaires = new_cmb2_box( array(
		'id'            => 'Renshoraires',
		'title'         => __( 'Section Horaires', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 13) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_titre1',
		'type'       => 'text',
		'default'	=> 'Horaires',		
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Texte 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_texte1',
		'type'       => 'wysiwyg',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_titre2',
		'type'       => 'text',
		'default'	=> 'Nos horaires en détail :',		
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour1',
		'type'       => 'text',	
		'default'	=> 'Lundi',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 1 matin', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour1am',
		'type'       => 'text',		
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 1 après-midi', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour1pm',
		'type'       => 'text',
		'default'	=> '14h-21h',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour2',
		'type'       => 'text',	
		'default'	=> 'Mardi',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 2 matin', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour2am',
		'type'       => 'text',		
		'default'	=> '9h-12h',
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 2 après-midi', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour2pm',
		'type'       => 'text',
		'default'	=> '14h-21h',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour3',
		'type'       => 'text',	
		'default'	=> 'Mecredi',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 3 matin', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour3am',
		'type'       => 'text',		
		'default'	=> '9h-12h',
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 3 après-midi', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour3pm',
		'type'       => 'text',
		'default'	=> '14h-21h',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour4',
		'type'       => 'text',	
		'default'	=> 'Jeudi',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 4 matin', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour4am',
		'type'       => 'text',		
		'default'	=> '9h-12h',
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 4 après-midi', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour4pm',
		'type'       => 'text',
		'default'	=> '14h-21h',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 5', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour5',
		'type'       => 'text',	
		'default'	=> 'Vendredi',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 5 matin', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour5am',
		'type'       => 'text',		
		'default'	=> '9h-12h',
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 5 après-midi', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour5pm',
		'type'       => 'text',
		'default'	=> '14h-21h',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 6', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour6',
		'type'       => 'text',	
		'default'	=> 'Samedi',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 6 matin', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour6am',
		'type'       => 'text',		
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 6 après-midi', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour6pm',
		'type'       => 'text',
		'default'	=> '14h-16h',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 7', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour7',
		'type'       => 'text',		
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 7 matin', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour7am',
		'type'       => 'text',		
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 7 après-midi', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour7pm',
		'type'       => 'text',
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Texte 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_texte2',
		'type'       => 'wysiwyg',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Pavé droit', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_pave',
		'type'       => 'wysiwyg',	
	) );

});
