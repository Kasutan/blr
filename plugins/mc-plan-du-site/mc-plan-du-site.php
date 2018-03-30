<?php
/*Plugin Name: MC Plan du site
Description: Ce plugin affiche toutes les pages du site sauf les éléments exclus avec le shortcode [plan-du-site sauf="id1,id2"]
Version: 1.0
License: GPLv2
Author: Magalie Castaing
*/

function mc_affiche_plan_du_site($atts) {
	 $a = shortcode_atts( array(
        'sauf' => '',
    ), $atts );
	$exclure = explode(',',$a['sauf']);
    $plan_output='';
    
    
	$args = array(
		'post_type' => 'page',
		'posts_per_page'=> -1,
		'post__not_in'=>$exclure, 
		'order' => 'ASC',
		'orderby' => 'ID', 
	);

	
	
	$pages_du_site = new WP_Query( $args );
	
	if( $pages_du_site->have_posts() ) {
		$plan_output .= '<ul class="plan-du-site">';
		while ( $pages_du_site->have_posts() ) {
			$pages_du_site->the_post();
			$plan_output .= '<li><a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
		}
		$plan_output .= '</ul>';
	}
	wp_reset_postdata();

    
    

	return $plan_output;
	
	
}
add_shortcode( 'plan-du-site', 'mc_affiche_plan_du_site' );