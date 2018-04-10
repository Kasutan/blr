<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

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

});
