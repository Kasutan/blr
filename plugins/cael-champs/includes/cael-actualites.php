<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_actualites = new_cmb2_box( array(
		'id'            => 'actualites',
		'title'         => __( 'Ordre d&acute;affichage dans les sliders', 'cmb2' ),
		'object_types' => array( 'post' ), // term data
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_actualites->add_field( array(
		'name'       => __( 'Ordre d&acute;affichage dans le slider principal', 'cmb2' ),
		'desc' => __( 'Seulement des chiffres', 'msft-newscenter' ),
		'id'   => CMB_PREFIX . '_actualites_ordre1',
		'type' => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		'sanitization_cb' => 'absint',
		'escape_cb'       => 'absint',
	) );

	$cmb_actualites->add_field( array(
		'name'       => __( 'Ordre d&acute;affichage dans le slider secondaire', 'cmb2' ),
		'desc' => __( 'Seulement des chiffres', 'msft-newscenter' ),
		'id'   => CMB_PREFIX . '_actualites_ordre2',
		'type' => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		'sanitization_cb' => 'absint',
		'escape_cb'       => 'absint',
	) );

});
