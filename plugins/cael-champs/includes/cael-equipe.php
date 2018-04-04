<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_equipe = new_cmb2_box( array(
		'id'            => 'CAELequipe',
		'title'         => __( 'Section équipe et conseil d&acute;administration', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 6) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_equipe->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_equipe_titre1',
		'type'       => 'text',
		'default'	=> 'L&acute;équipe',		
	) );

	$cmb_equipe->add_field( array(
		'name'       => __( 'Titre 2 première partie', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_equipe_titre21',
		'type'       => 'text',
		'default'	=> 'Le conseil',		
	) );

	$cmb_equipe->add_field( array(
		'name'       => __( 'Titre 2 seconde partie', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_equipe_titre22',
		'type'       => 'text',
		'default'	=> 'd&acute;administration',		
	) );

	$group_field_id = $cmb_equipe->add_field( array(
		'id'          => '_cael_equipe_administration',
		'type'        => 'group',
		'description' => __( 'Membres du conseil d&acute;administration', 'cmb2' ),
		'options'     => array(
			'group_title'   => __( 'Entry {#}', 'cmb2' ), 
			'add_button'    => __( 'Ajouter un membre', 'cmb2' ),
			'remove_button' => __( 'Retirer le membre', 'cmb2' ),
			'sortable'      => true, // beta
		),
	) );
	
	$cmb_equipe->add_group_field( $group_field_id, array(
		'name' => 'Fonction',
		'id'   => '_cael_equipe_fonction',
		'type' => 'text',
	) );

	$cmb_equipe->add_group_field( $group_field_id, array(
		'name' => 'Noms',
		'id'   => '_cael_equipe_noms',
		'type' => 'textarea',
	) );

});
