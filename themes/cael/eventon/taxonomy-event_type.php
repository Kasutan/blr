<?php	
/*
 *	The template for displaying event categories 
 *
 */

    get_header();
    
    $tax = get_query_var( 'taxonomy' );
    $term = get_query_var( 'term' );
    $term = get_term_by( 'slug', $term, $tax );
    $cat = get_queried_object()->taxonomy;
    $current_term_level = get_tax_level(get_queried_object()->term_id, $cat);

    
    if ($cat == 'event_type') {
        if ($current_term_level <= 1) {
            // on est au premier niveau des catégories
            require_once( 'includes/activitesn1.php' );
        } else if ($current_term_level == 2) {
            // on est au second niveau des catégories
            require_once( 'includes/activitesn2.php' );
        } else if ($current_term_level >= 3) {
            // on est au troisième niveau des catégories
            require_once( 'includes/activitesn3.php' );
        }
    } else if ($cat == 'event_type_2') {
        if ($current_term_level <= 1) {
            // on est au premier niveau des catégories
            require_once( 'includes/evenementsn1.php' );
        } else {
            // on est au second niveau des catégories
            require_once( 'includes/evenementsn2.php' );
        }
    }

get_footer(); ?>