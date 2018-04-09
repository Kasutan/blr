<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_activites = new_cmb2_box( array(
		'id'            => 'accueilact',
		'title'         => __( 'Section Activités', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 5) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_activites->add_field( array(
		'name'       => __( 'Titre Activités', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_activites',
		'type'       => 'text',
		'default'	=> 'Activités',		
	) );

	$cmb_activites->add_field( array(
		'name'       => __( 'Titre Zoom', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_zoom',
		'type'       => 'text',
		'default'	=> 'Zoom sur',		
	) );
});

function affiche_activite() {			

$ID=get_the_ID();
ob_start();
?>
<section id="calendrier" class="scrollify">
	<div>
		<h2 class="titre">
		<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_activites', true ); 
		echo esc_html( $text ); ?>
		</h2>
		<h2 class="titre">
		<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_zoom', true ); 
		echo esc_html( $text ); ?>
		</h2>
	</div>
	<div>
		icônes
	</div>
</section>
<?php
echo ob_get_clean();
}