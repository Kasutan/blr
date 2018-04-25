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

		// champs ajoutés dans la page des musiques anciennes 
		$cmb_musique = new_cmb2_box( array(
			'id'            => 'Musique',
			'title'         => __( 'Pages des musiques anciennes', 'cmb2' ),
			'object_types' => array( 'page' ), // post type
			'show_on'      => array( 'key' => 'id', 'value' => array( 7) ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true, 
			'closed'     => true,
		) );
	
		$cmb_musique->add_field( array(
			'name'       => __( 'Première partie du Titre de la revue des musiques anciennes', 'cmb2' ),
			'id'         => CMB_PREFIX . '_musique_titre1',
			'type'       => 'text',
			'default'	=> 'La revue',		
		) );

		$cmb_musique->add_field( array(
			'name'       => __( 'Deuxième partie du Titre de la revue des musiques anciennes', 'cmb2' ),
			'id'         => CMB_PREFIX . '_musique_titre2',
			'type'       => 'text',
			'default'	=> 'de musique ancienne',		
		) );

		$cmb_musique->add_field( array(
			'name'       => __( 'texte de présentation de la revue', 'cmb2' ),
			'id'         => CMB_PREFIX . '_musique_texte',
			'type'       => 'wysiwyg',	
		) );

	// champs ajoutés dans les pages de catégories event_speaker du plugin eventon
	$cmb_speaker = new_cmb2_box( array(
		'id'            => 'speaker',
		'title'         => __( 'informations des pages de détail du programme', 'cmb2' ),
		'object_types' => array( 'term' ), // term data
		'taxonomies'       => array( 'category', 'event_speaker' ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_speaker->add_field( array(
		'name'       => __( 'Zone partage', 'cmb2' ),
		'id'         => CMB_PREFIX . '_speaker_partage',
		'type'       => 'text',
		'default'	=> 'Envie de partager !',		
	) );

	$cmb_speaker->add_field( array(
		'name'       => __( 'Zone d&acute;adresse', 'cmb2' ),
		'id'         => CMB_PREFIX . '_speaker_adresse',
		'type'       => 'text',
		'default'	=> 'Où ça se passe ?',		
	) );

	$cmb_speaker->add_field( array(
		'name'       => __( 'Zone des tarifs', 'cmb2' ),
		'id'         => CMB_PREFIX . '_speaker_tarifs',
		'type'       => 'wysiwyg',	
	) );

	$cmb_speaker->add_field( array(
		'name'       => __( 'Zone réservation : titre', 'cmb2' ),
		'id'         => CMB_PREFIX . '_speaker_resa_titre',
		'type'       => 'text',
		'default'	=> 'Réservation',		
	) );

	$cmb_speaker->add_field( array(
		'name'       => __( 'Zone réservation : texte', 'cmb2' ),
		'id'         => CMB_PREFIX . '_speaker_resa_texte',
		'type'       => 'wysiwyg',	
	) );

	$cmb_speaker->add_field( array(
		'name'       => __( 'Zone réservation : texte lien', 'cmb2' ),
		'id'         => CMB_PREFIX . '_speaker_resa_texte_lien',
		'type'       => 'text',
		'default'	=> 'Téléchargez le bulletin d&acute;inscription',	
	) );

	$cmb_speaker->add_field( array(
		'name'       => __( 'Zone réservation : fichier', 'cmb2' ),
		'id'         => CMB_PREFIX . '_speaker_resa_fichier',
		'type'       => 'file',	
	) );

});
