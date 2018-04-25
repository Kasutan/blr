<?php

// *****************************************************************
// Création du custom post type pour la revue de musique ancienne
// *****************************************************************
function custom_post_musiqueancienne() { 
	// creating (registering) the custom type 
	register_post_type( 'cael_musiqueancienne', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Revue de musique ancienne', 'cael'), /* This is the Title of the Group */
			'singular_name' => __('Revue', 'cael'), /* This is the individual type */
			'all_items' => __('Toutes les revues', 'cael'), /* the all items menu item */
			'add_new' => __('Ajouter', 'cael'), /* The add new menu item */
			'add_new_item' => __('Ajouter', 'cael'), /* Add New Display Title */
			'edit' => __( 'Editer', 'cael' ), /* Edit Dialog */
			'edit_item' => __('Editer les revues', 'cael'), /* Edit Display Title */
			'new_item' => __('Nouvelle revue', 'cael'), /* New Display Title */
			'view_item' => __('Voir la revue', 'cael'), /* View Display Title */
			'search_items' => __('Rechercher une revue', 'cael'), /* Search Custom Type Title */ 
			'not_found' =>  __('Aucune revue dans la base de donnée', 'cael'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Rien dans la poubelle', 'cael'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Permet de charger les revues de la rubrique Musique Ancienne', 'cael' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-book', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
} 

add_action( 'init', 'custom_post_musiqueancienne');

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_musancienne = new_cmb2_box( array(
		'id'            => 'Musiqueancienne',
		'title'         => __( 'Revue de musique ancienne', 'cmb2' ),
		'object_types' => array( 'cael_musiqueancienne' ), // post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_musancienne->add_field( array(
		'name'       => __( 'Texte bouton téléchargement', 'cmb2' ),
		'id'         => CMB_PREFIX . '_Musiqueancienne_bouton',
		'type'       => 'text',
		'default'	=> 'Télécharger',		
	) );

	$cmb_musancienne->add_field( array(
		'name'       => __( 'Revue à charger au format pdf', 'cmb2' ),
		'id'         => CMB_PREFIX . '_Musiqueancienne_revue',
		'type'       => 'file',	
		'text'    => array(	'add_upload_file_text' => 'Charger le fichier pdf' ),	
	) );

});