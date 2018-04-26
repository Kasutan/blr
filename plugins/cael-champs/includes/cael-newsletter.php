<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_newsletter = new_cmb2_box( array(
		'id'            => 'bandeaunewsletter',
		'title'         => __( 'Informations du bandeau Newsletter', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 5) ),
		'context'       => 'normal',
		'priority'      => 'low',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_newsletter->add_field( array(
		'name'       => __( 'Titre', 'cmb2' ),
		'id'         => CMB_PREFIX . '_newsletter_titre',
		'type'       => 'text',
		'default'	=> 'La newsletter',		
	) );

	$cmb_newsletter->add_field( array(
		'name'       => __( 'Sous-titre', 'cmb2' ),
		'id'         => CMB_PREFIX . '_newsletter_soustitre',
		'type'       => 'text',
		'default'	=> 'pour ne plus rien rater',		
	) );

	$cmb_newsletter->add_field( array(
		'name'       => __( 'Texte champ de saisie', 'cmb2' ),
		'id'         => CMB_PREFIX . '_newsletter_saisie',
		'type'       => 'text',
		'default'	=> 'votre adresse mail',		
	) );

	$cmb_newsletter->add_field( array(
		'name'       => __( 'Texte bouton', 'cmb2' ),
		'id'         => CMB_PREFIX . '_newsletter_bouton',
		'type'       => 'text',
		'default'	=> 's&acute;abonner',		
	) );

	$cmb_newsletter->add_field( array(
		'name'       => __( 'Texte case à cocher', 'cmb2' ),
		'id'         => CMB_PREFIX . '_newsletter_casecocher',
		'type'       => 'text',
		'default'	=> 'J&acute;accepte de recevoir la newsletter.',		
	) );

	$cmb_newsletter->add_field( array(
		'name'       => __( 'Texte du lien vers la page des mentions légales', 'cmb2' ),
		'id'         => CMB_PREFIX . '_newsletter_texte',
		'type'       => 'text',
		'default'	=> 'Information sur l&acute;utilisation de vos données',		
	) );

	$cmb_newsletter->add_field( array(
		'name'       => __( 'Texte si validation sans avoir coché la case', 'cmb2' ),
		'id'         => CMB_PREFIX . '_newsletter_validation',
		'type'       => 'text',
		'default'	=> 'Merci de confirmer votre accord.',		
	) );

});
