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

// fonction pour afficher tous les résultats de recherche sur une seule page
function change_wp_search_size($query) {
    if ( $query->is_search ) // Make sure it is a search page
        $query->query_vars['posts_per_page'] = -1; // Change 10 to the number of posts you would like to show

    return $query; // Return our modified query variables
}
add_filter('pre_get_posts', 'change_wp_search_size'); // Hook our custom function onto the request filter

// fonction pour récupérer la liste des événements pour le calendrier
function get_event_list($ind){

	$args = array(
		'post_type' => 'ajde_events',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		);

	// on récupère tous les événements de la base
	$events = new WP_Query( $args );
	$event_list_array = array();

	// opérations sur la date du jour
	$jourcourant = date("z");
	$moiscourant = date("n");
	$anneecourante = date("y");
	$nbjours = $jourcourant + ($anneecourante * 365);
	$nbmois = $moiscourant + ($anneecourante * 12);

	// Pour chaque événement
	while( $events->have_posts()): $events->the_post();
		
		// on récupère l'ID de l'événement
		$p_id = $events->post->ID;		

		// On récupère des infos, notamment les dates de récurrences de l'événement
		$ev_vals = get_post_custom($p_id);
		$organizer_terms = wp_get_post_terms($p_id, 'event_organizer');
		$niveauevent = get_post_meta( $p_id, 'evcal_subtitle', true );

		// On récupère les catégories de l'événement
		$terms = wp_get_post_terms( $p_id, 'event_type');
		$eventype = 1;
		if (empty(array_filter($terms))) {
			$terms = wp_get_post_terms( $p_id, 'event_type_2');
			$eventype = 2;
			if (empty(array_filter($terms))) {
				$terms = wp_get_post_terms( $p_id, 'event_type_3');
				$eventype = 3;
				if (empty(array_filter($terms))) {
					$terms = wp_get_post_terms( $p_id, 'event_type_4');
					$eventype = 4;
				}
			}
		}

		// récupération des données de la catégorie la plus basse
		if(!empty($terms) && !is_wp_error($terms)){
			foreach($terms as $term){
				$current_term_level = get_tax_level($term->term_id, $term->taxonomy);

				if($current_term_level == 3)
				{
					$lien= get_term_link($term);
					$titreevent=$term->name;
				}

			}
		};

		// On vérifie si l'on a un événement récurrent
		$is_recurring_event = evo_check_yn($ev_vals, 'evcal_repeat');

		// On vérifie si l'événement doit être exclu du calendrier
		$_is_exclude = (!empty($ev_vals['evo_exclude_ev']))? $ev_vals['evo_exclude_ev'][0] :'no';

		// check for recurring event
		if($_is_exclude == 'no'){
			if($is_recurring_event){
				// get saved repeat intervals for repeating events
				$repeat_intervals = (!empty($ev_vals['repeat_intervals']))?
					(is_serialized($ev_vals['repeat_intervals'][0])? unserialize($ev_vals['repeat_intervals'][0]): $ev_vals['repeat_intervals'][0] ) :null;

				if(!empty($repeat_intervals) && is_array($repeat_intervals)){
				
					// each repeating interval times
					foreach($repeat_intervals as $interval){
						
						$E_start_unix = $interval[0];
						$E_end_unix = $interval[1];
						$eventjours = date_i18n($format . 'z', $E_start_unix );
						$eventmois = date_i18n($format . 'n', $E_start_unix );
						$eventanne = date_i18n($format . 'y', $E_start_unix );
						$eventnbjours = $eventjours + ($eventanne * 365);
						$eventnbmois = $eventmois + ($eventanne * 12);

						
						if ($ind == 0) {

							if ($nbmois - 3 < $eventnbmois && $eventnbmois < $nbmois + 4) {					
							
								$event_list_array[] = array(
									'event_start_unix'=>$E_start_unix,
									'event_end_unix'=>$E_end_unix,
									'event_id' => $p_id,
									'event_title'=>$titreevent,
									'event_lien'=>$lien,
									'event_coach'=>$organizer_terms[0]->name,
									'event_niveau'=>$niveauevent,
									);
									
							}
						} else {
							if ($nbjours <= $eventnbjours && $eventnbjours < $nbjours + 5 ) {

								$event_list_array[] = array(
									'event_start_unix'=>$E_start_unix,
									'event_end_unix'=>$E_end_unix,
									'event_id' => $p_id,
									'event_title'=>$titreevent,
									'event_lien'=>$lien,
									'event_coach'=>$organizer_terms[0]->name,
									'event_niveau'=>$niveauevent,
									);
							}
						}	
					}
				}
			} else {
				// on charge tous les événements sans répétition 
				$E_start_unix = $ev_vals["evcal_srow"][0];
				$E_end_unix = $ev_vals ["evcal_erow"][0];
				$eventjours = date_i18n($format . 'z', $E_start_unix );
				$eventmois = date_i18n($format . 'n', $E_start_unix );
				$eventanne = date_i18n($format . 'y', $E_start_unix );
				$eventnbjours = $eventjours + ($eventanne * 365);
				$eventnbmois = $eventmois + ($eventanne * 12);

				// si on est dans le cas des festivals
				if ($eventype == 2) {
					
					$speakers = get_post_meta( $p_id, '_sch_blocks', true );

					if(!empty($speakers) && !is_wp_error($speakers)){
						foreach($speakers as $speaker){
							foreach($speaker as $key => $content) {
								if ($key!=0) {
		
									$cleterm = key($content["evo_sch_spk"]);	
									$termMeta = get_option( "evo_tax_meta");
									$termmeta2 = evo_get_term_meta('event_speaker',$cleterm, $termMeta);
									$heurrespeaker = explode("h", $content["evo_sch_stime"]);
									if ($heurrespeaker[1] == "") {
										$heurrespeaker[1] = 0;
									}
									$E_start_unix = strtotime($content["evo_sch_date"]) + mktime($heurrespeaker[0], $heurrespeaker[1], 0, 1, 1, 1970);
								
									if ($ind == 0) {

										if ($nbmois - 3 < $eventnbmois && $eventnbmois < $nbmois + 4) {					
										
											$event_list_array[] = array(
												'event_start_unix'=>$E_start_unix,
												'event_end_unix'=>$E_end_unix,
												'event_id' => $p_id,
												'event_title'=>$titreevent,
												'event_lien'=>$lien,
												'event_coach'=>$content["evo_sch_title"],
												'event_niveau'=>$termmeta2["evo_speaker_title"],
												);
												
										}
									} else {
										if ($nbjours <= $eventnbjours && $eventnbjours < $nbjours + 5 ) {
					
											$event_list_array[] = array(
												'event_start_unix'=>$E_start_unix,
												'event_end_unix'=>$E_end_unix,
												'event_id' => $p_id,
												'event_title'=>$titreevent,
												'event_lien'=>$lien,
												'event_coach'=>$content["evo_sch_title"],
												'event_niveau'=>$termmeta2["evo_speaker_title"],
												);
										}
									}
								}
							}
						}
					}else{
						// on a un événement de type 2 sans speaker
						if ($ind == 0) {

							if ($nbmois - 3 < $eventnbmois && $eventnbmois < $nbmois + 4) {					
							
								$event_list_array[] = array(
									'event_start_unix'=>$E_start_unix,
									'event_end_unix'=>$E_end_unix,
									'event_id' => $p_id,
									'event_title'=>$titreevent,
									'event_lien'=>$lien,
									'event_coach'=>$content["evo_sch_title"],
									'event_niveau'=>$termmeta2["evo_speaker_title"],
									);
									
							}
						} else {
							if ($nbjours <= $eventnbjours && $eventnbjours < $nbjours + 5 ) {
		
								$event_list_array[] = array(
									'event_start_unix'=>$E_start_unix,
									'event_end_unix'=>$E_end_unix,
									'event_id' => $p_id,
									'event_title'=>$titreevent,
									'event_lien'=>$lien,
									'event_coach'=>$content["evo_sch_title"],
									'event_niveau'=>$termmeta2["evo_speaker_title"],
									);
							}
						}
					}
				} else {
					// on est sur un événement non récurrent qui n'est pas de type 2
					if ($ind == 0) {

						if ($nbmois - 3 < $eventnbmois && $eventnbmois < $nbmois + 4) {					
						
							$event_list_array[] = array(
								'event_start_unix'=>$E_start_unix,
								'event_end_unix'=>$E_end_unix,
								'event_id' => $p_id,
								'event_title'=>$titreevent,
								'event_lien'=>$lien,
								'event_coach'=>$organizer_terms[0]->name,
								'event_niveau'=>$niveauevent,
								);
								
						}
					} else {
						if ($nbjours <= $eventnbjours && $eventnbjours < $nbjours + 5 ) {
	
							$event_list_array[] = array(
								'event_start_unix'=>$E_start_unix,
								'event_end_unix'=>$E_end_unix,
								'event_id' => $p_id,
								'event_title'=>$titreevent,
								'event_lien'=>$lien,
								'event_coach'=>$organizer_terms[0]->name,
								'event_niveau'=>$niveauevent,
								);
						}
					}
				}

			}
		}
	endwhile;

	asort($event_list_array);

    return $event_list_array;
}

//fonction pour récupérer les featured events
function get_featured_list(){

	$args = array(
		'post_type' => 'ajde_events',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		);

	// on récupère tous les événements de la base
	$events = new WP_Query( $args );
	$event_list_array= array();

	// opérations sur la date du jour
	$jourcourant = date("z");
	$moiscourant = date("n");
	$anneecourante = date("y");
	$nbjours = $jourcourant + ($anneecourante * 365);
	$nbmois = $moiscourant + ($anneecourante * 12);

	// Pour chaque événement
	while( $events->have_posts()): $events->the_post();
		
		// on récupère l'ID de l'événement
		$p_id = $events->post->ID;		

		// On récupère des infos, notamment les dates de récurrences de l'événement
		$ev_vals = get_post_custom($p_id);
		$organizer_terms = wp_get_post_terms($p_id, 'event_organizer');
		$niveauevent = get_post_meta( $p_id, 'evcal_subtitle', true );

		// On récupère les catégories de l'événement
		$terms = wp_get_post_terms( $p_id, 'event_type');
		$eventype = 1;
		if (empty(array_filter($terms))) {
			$terms = wp_get_post_terms( $p_id, 'event_type_2');
			$eventype = 2;
			if (empty(array_filter($terms))) {
				$terms = wp_get_post_terms( $p_id, 'event_type_3');
				$eventype = 3;
				if (empty(array_filter($terms))) {
					$terms = wp_get_post_terms( $p_id, 'event_type_4');
					$eventype = 4;
				}
			}
		}

		// récupération des données de la catégorie la plus basse
		if(!empty($terms) && !is_wp_error($terms)){
			foreach($terms as $term){
				$current_term_level = get_tax_level($term->term_id, $term->taxonomy);

				if($current_term_level == 3)
				{
					$lien= get_term_link($term);
					$titreevent=$term->name;
				}

			}
		};

		// On vérifie si l'événement est mis en avant
		$_is_featured = (!empty($ev_vals['_featured']))? $ev_vals['_featured'][0] :'no';


		// check for recurring event
			if($_is_featured == "yes"){

				// on charge tous les événements sans répétition 
				$E_start_unix = $ev_vals["evcal_srow"][0];
				$E_end_unix = $ev_vals ["evcal_erow"][0];
				$eventjours = date_i18n($format . 'z', $E_start_unix );
				$eventmois = date_i18n($format . 'n', $E_start_unix );
				$eventanne = date_i18n($format . 'y', $E_start_unix );
				$eventnbjours = $eventjours + ($eventanne * 365);
				$eventnbmois = $eventmois + ($eventanne * 12);

				// si on est dans le cas des festivals
				if ($eventype == 2) {			
						
							$event_list_array[] = array(
								'event_start_unix'=>$E_start_unix,
								'event_end_unix'=>$E_end_unix,
								'event_id' => $p_id,
								'event_title'=>$titreevent,
								'event_lien'=>$lien,
								'event_coach'=>$organizer_terms[0]->name,
								'event_niveau'=>$niveauevent,
								);
								
					} else {
	
							$event_list_array[] = array(
								'event_start_unix'=>$E_start_unix,
								'event_end_unix'=>$E_end_unix,
								'event_id' => $p_id,
								'event_title'=>$titreevent,
								'event_lien'=>$lien,
								'event_coach'=>$organizer_terms[0]->name,
								'event_niveau'=>$niveauevent,
								);
					}
				}
	endwhile;

	asort($event_list_array);

    return $event_list_array;
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
		//var_dump($items);

    }


    return $items;

}, 10, 3);