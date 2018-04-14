<?php

// *****************************************************************
// Création du custom post type pour le conseil d'administration
// *****************************************************************
function custom_post_administration() { 
	// creating (registering) the custom type 
	register_post_type( 'cael_administration', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Membres du conseil d&acute;administration', 'cael'), /* This is the Title of the Group */
			'singular_name' => __('Membre', 'cael'), /* This is the individual type */
			'all_items' => __('Tous les membres', 'cael'), /* the all items menu item */
			'add_new' => __('Ajouter', 'cael'), /* The add new menu item */
			'add_new_item' => __('Ajouter', 'cael'), /* Add New Display Title */
			'edit' => __( 'Editer', 'cael' ), /* Edit Dialog */
			'edit_item' => __('Editer les membres', 'cael'), /* Edit Display Title */
			'new_item' => __('Nouveau membre', 'cael'), /* New Display Title */
			'view_item' => __('Voir le membre', 'cael'), /* View Display Title */
			'search_items' => __('Rechercher un membre', 'cael'), /* Search Custom Type Title */ 
			'not_found' =>  __('Aucun membre dans la base de donnée', 'cael'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Rien dans la poubelle', 'cael'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Permet de définir les membres du conseil d&acute;administration apparaissant sur la page Le CAEL', 'cael' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 11, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-book', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
} 

add_action( 'init', 'custom_post_administration');