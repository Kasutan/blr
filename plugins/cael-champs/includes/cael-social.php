<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_social = new_cmb2_box( array(
		'id'            => 'Actionssocial',
		'title'         => __( 'Section projet social', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 9) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_social->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_social_titre1',
		'type'       => 'text',
		'default'	=> 'Le CAEL centre social',		
	) );

	$cmb_social->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_social_titre2',
		'type'       => 'text',
		'default'	=> 'Un projet social',		
	) );

	$cmb_social->add_field( array(
		'name'       => __( 'Texte 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_social_texte2',
		'type'       => 'textarea',		
	) );

	$cmb_social->add_field( array(
		'name'       => __( 'Image projet social', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_social_image',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l image' ),	
	) );
});

function affiche_social() {			

$ID=get_the_ID();
ob_start();
$titre1  = get_post_meta( $ID, CMB_PREFIX.'_actions_social_titre1', true );
$titre2  = get_post_meta( $ID, CMB_PREFIX.'_actions_social_titre2', true );
$texte  = get_post_meta( $ID, CMB_PREFIX.'_actions_social_texte2', true );
$imagelien = get_post_meta( $ID, CMB_PREFIX.'_actions_social_image_id', true);

?>
<section id="social" class="align-middle justify-between fond-rose-clair blanc" >
		<h1 class="titre">
			<?php  echo esc_html( $titre1 ); ?>
		</h1>
		<h2 class="titre">
			<?php  echo esc_html( $titre2 ); ?>
		</h2>
		<p>
			<?php  echo wp_kses_post( $texte ); ?>
		</p>
		<?php echo wp_get_attachment_image( $imagelien, 'banniere' ); ?>
		
</section>
<?php

echo ob_get_clean();

}
