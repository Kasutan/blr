<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_partenaires = new_cmb2_box( array(
		'id'            => 'CAELpartenaires',
		'title'         => __( 'Section partenaires', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 6) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_partenaires->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_part_titre1',
		'type'       => 'text',
		'default'	=> 'Nos partenaires',		
	) );

	$cmb_partenaires->add_field( array(
		'name'       => __( 'Texte 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_part_texte1',
		'type'       => 'wysiwyg',		
	) );

});
