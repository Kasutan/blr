<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	// champs ajoutés dans les pages de catégories du plugin eventon
	$cmb_catactivites = new_cmb2_box( array(
		'id'            => 'catimage',
		'title'         => __( 'Images', 'cmb2' ),
		'object_types' => array( 'term' ), // term data
		'taxonomies'       => array( 'category', 'event_type' ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_catactivites->add_field( array(
		'name'       => __( 'Image', 'cmb2' ),
		'id'         => CMB_PREFIX . '_image',
		'type'       => 'file',	
	) );

	$cmb_catactivites->add_field( array(
		'name'       => __( 'Age minimal pour l&acute;activité', 'cmb2' ),
		'desc' => __( 'en année, à renseigner uniquement pour les catégories de dernier niveau correspondant aux activités', 'msft-newscenter' ),
		'id'   => CMB_PREFIX . '_catactivites_agemin',
		'type' => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		'sanitization_cb' => 'absint',
		'escape_cb'       => 'absint',
	) );

	$cmb_catactivites->add_field( array(
		'name'       => __( 'Age maximal pour l&acute;activité', 'cmb2' ),
		'desc' => __( 'en année, à renseigner uniquement pour les catégories de dernier niveau correspondant aux activités', 'msft-newscenter' ),
		'id'   => CMB_PREFIX . '_catactivites_agemax',
		'type' => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		'sanitization_cb' => 'absint',
		'escape_cb'       => 'absint',
	) );

	$cmb_catactivites->add_field( array(
		'name'       => __( 'Mise en avant sur la page d&acute;accueil', 'cmb2' ),
		'id'         => CMB_PREFIX . '_event_mea',
		'desc' => __( 'pour les catégories de dernier niveau correspondant aux activités', 'msft-newscenter' ),
		'type' => 'checkbox',	
	) );

	// champs ajoutés dans la page Nos Activités pour affichage sur les pages des activités 
	$cmb_singleactivites = new_cmb2_box( array(
		'id'            => 'Singleactivites',
		'title'         => __( 'Pages des activités', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 7) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_singleactivites->add_field( array(
		'name'       => __( 'Titre sur qui dispense le cours', 'cmb2' ),
		'id'         => CMB_PREFIX . '_Singleactivites_titre1',
		'type'       => 'text',
		'default'	=> 'Cours dispensé par',		
	) );

	$cmb_singleactivites->add_field( array(
		'name'       => __( 'Titre sur le lieu de l&acute;activité', 'cmb2' ),
		'id'         => CMB_PREFIX . '_Singleactivites_titre2',
		'type'       => 'text',
		'default'	=> 'Où ça se passe',		
	) );

	$cmb_singleactivites->add_field( array(
		'name'       => __( 'Début de phrase de l&acute;adresse', 'cmb2' ),
		'id'         => CMB_PREFIX . '_Singleactivites_titre3',
		'type'       => 'text',
		'default'	=> 'Ces cours ont lieu au',		
	) );

	$cmb_singleactivites->add_field( array(
		'name'       => __( 'Titre de la partie tout en bas des activités', 'cmb2' ),
		'id'         => CMB_PREFIX . '_Singleactivites_titre4',
		'type'       => 'text',
		'default'	=> 'Ce cours vous intéresse ?',		
	) );

	$cmb_singleactivites->add_field( array(
		'name'       => __( 'Début du texte sur les inscriptions', 'cmb2' ),
		'id'         => CMB_PREFIX . '_Singleactivites_titre5',
		'type'       => 'text',
		'default'	=> 'Rendez vous à la page',		
	) );

	$cmb_singleactivites->add_field( array(
		'name'       => __( 'Nom de la page des inscriptions', 'cmb2' ),
		'id'         => CMB_PREFIX . '_Singleactivites_titre6',
		'type'       => 'text',
		'default'	=> 'inscription et tarifs',		
	) );


});
