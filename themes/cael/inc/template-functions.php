<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package cael
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cael_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'cael_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cael_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'cael_pingback_header' );

/**
 * Afficher le nom du menu.
 */
//https://www.andrewgail.com/getting-a-menu-name-in-wordpress/
function gm_get_theme_menu_name( $theme_location ) {
	if( ! $theme_location ) return false;
 
	$theme_locations = get_nav_menu_locations();
	if( ! isset( $theme_locations[$theme_location] ) ) return false;
 
	$menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
	if( ! $menu_obj ) $menu_obj = false;
	if( ! isset( $menu_obj->name ) ) return false;
 
	return $menu_obj->name;
}

// fonction pour récupérer le niveau hierarchique d'une taxonomie
function get_tax_level($id, $tax){
	$ancestors = get_ancestors($id, $tax);
	$term_children = get_term_children( $id, $tax );
	$var = count($ancestors)+1 ;
	// dans le cas où il n'y a pas d'enfant, on force la valeur au plus bas pour la suite de l'algo
	if(empty($term_children)){ $var = 3 ; }
    return $var;
}

//Ajouter tailles d'images
add_image_size('banniere',1200,450,true);
add_image_size('actu',400,425,true);

// fonction pour avoir les liens [suivant] et [précédent] pour naviguer dans des pages de catégories
// fonction donnée par Pieter Goosen sur le forum https://wordpress.stackexchange.com/questions/222498/is-it-possible-to-get-a-previous-next-taxonomy-term-archive-url
	function get_tax_navigation( $taxonomy = 'category', $direction = '' ) 
	{
		// Make sure we are on a taxonomy term/category/tag archive page, if not, bail
		if ( 'category' === $taxonomy ) {
			if ( !is_category() )
				return false;
		} elseif ( 'post_tag' === $taxonomy ) {
			if ( !is_tag() )
				return false;
		} else {
			if ( !is_tax( $taxonomy ) )
				return false;
		}
	
		// Make sure the taxonomy is valid and sanitize the taxonomy
		if (    'category' !== $taxonomy 
			 || 'post_tag' !== $taxonomy
		) {
			$taxonomy = filter_var( $taxonomy, FILTER_SANITIZE_STRING );
			if ( !$taxonomy )
				return false;
	
			if ( !taxonomy_exists( $taxonomy ) )
				return false;
		}
	
		// Get the current term object
		$current_term = get_term( $GLOBALS['wp_the_query']->get_queried_object() );
	
		// Get all the terms ordered by slug 
		$terms = get_terms( $taxonomy, ['orderby' => 'slug'] );
	
		// Make sure we have terms before we continue
		if ( !$terms ) 
			return false;
	
		// Because empty terms stuffs around with array keys, lets reset them
		$terms = array_values( $terms );
	
		// Lets get all the term id's from the array of term objects
		$term_ids = wp_list_pluck( $terms, 'term_id' );
	
		/**
		 * We now need to locate the position of the current term amongs the $term_ids array. \
		 * This way, we can now know which terms are adjacent to the current one
		 */
		$current_term_position = array_search( $current_term->term_id, $term_ids );
	
		// Set default variables to hold the next and previous terms
		$previous_term = '';
		$next_term     = '';
	
		// Get the previous term
		if (    'previous' === $direction 
			 || !$direction
		) {
			if ( 0 === $current_term_position ) {
				$previous_term = $terms[intval( count( $term_ids ) - 1 )];
			} else {
				$previous_term = $terms[$current_term_position - 1];
			}
		}
	
		// Get the next term
		if (    'next' === $direction
			 || !$direction
		) {
			if ( intval( count( $term_ids ) - 1 ) === $current_term_position ) {
				$next_term = $terms[0];
			} else {
				$next_term = $terms[$current_term_position + 1];
			}
		}
	
		$link = [];
		// Build the links
		if ( $previous_term ) 
			$link[] = '<a href="' . esc_url( get_term_link( $previous_term ) ) . '">' . '< Activité précédente' . '</a>';
	
		if ( $next_term ) 
			$link[] = '<a href="' . esc_url( get_term_link( $next_term ) ) . '">' . 'Activité suivante >' . '</a>';
	
		return implode( ' ...|... ', $link );
	}


	function get_age_class($agemin, $agemax){

		$class = '';
		if ($agemin >= 18) {
			$class = $class . ' adulte';

		} else if ($agemin <= 0 && ($agemax <= 0 || $agemax > 18)) {
			$class = $class . ' toutage';
		}

		else {
			$class = $class . ' enfant';
			$indice = $agemin;
			while ( $indice <= 18 && ($indice <= $agemax || $agemax > 18 || $agemax <= 0 ))
				{
					$class = $class . ' ' . $indice;
					$indice = $indice + 1;
				}

			if ($agemax > 18 || $agemax <= 0) {
				$class = $class . ' adulte';
			}
		}

		return $class;
	}


//Ajouter les classes  Foundation au menu principal
class Foundation_Menu_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = Array() )
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu\">\n";
    }
}

/*https://wordpress.stackexchange.com/questions/282861/dynamically-add-sub-categories-to-any-category-in-the-menu*/
add_filter("wp_get_nav_menu_items", function ($items, $menu, $args) {

    // don't add child categories in administration of menus
    if (is_admin()) {
        return $items;
    }


    foreach ($items as $index => $i) {
        if ("event_type" !== $i->object) {
            continue;
		}
		if(get_tax_level($i->object_id,'event_type')<2){
			continue;
		}

		$term_children = get_term_children($i->object_id, "event_type");	


        // add child categories

        foreach ($term_children as $index2 => $child_id) {

            $child = get_term($child_id);

			$url = get_term_link($child);
			
			//var_dump(get_ancestors($child_id,'event_type'));


            $e = new \stdClass();

            $e->title = $child->name;
            $e->url = $url;
            $e->menu_order = 500 * ($index + 1) + $index2;
            $e->post_type = "nav_menu_item";
            $e->post_status = "published";
            $e->post_parent = $i->ID;
            $e->menu_item_parent = $i->ID;
            $e->type = "custom";
            $e->object = "custom";
            $e->description = "";
            $e->object_id = 0;
            $e->db_id = 0;
            $e->ID = 0;
            $e->classes = array('');
            $items[] = $e;

        }


    }


    return $items;

}, 10, 3);