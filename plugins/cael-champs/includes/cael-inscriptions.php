<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_inscriptions = new_cmb2_box( array(
		'id'            => 'Rensinscriptions',
		'title'         => __( 'Section Inscriptions', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 13) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_inscriptions->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_inscriptions_titre1',
		'type'       => 'text',
		'default'	=> 'Inscriptions',		
	) );

	$cmb_inscriptions->add_field( array(
		'name'       => __( 'Texte 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_inscriptions_texte1',
		'type'       => 'wysiwyg',	
	) );

	$cmb_inscriptions->add_field( array(
		'name'       => __( 'Titre lien 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_inscriptions_titrelien1',
		'type'       => 'text',
		'default'	=> 'Consultez les modalités d&acute;inscriptions',		
	) );

	$cmb_inscriptions->add_field( array(
		'name'       => __( 'lien 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_inscriptions_lien1',
		'type'       => 'file',	
		'text'    => array(	'add_upload_file_text' => 'Charger le fichier pdf' ),	
	) );

	$cmb_inscriptions->add_field( array(
		'name'       => __( 'Titre lien 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_inscriptions_titrelien2',
		'type'       => 'text',
		'default'	=> 'Consultez les tarifs des activités',		
	) );

	$cmb_inscriptions->add_field( array(
		'name'       => __( 'lien 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_inscriptions_lien2',
		'type'       => 'file',	
		'text'    => array(	'add_upload_file_text' => 'Charger le fichier pdf' ),		
	) );
});

function affiche_inscriptions() {			

	$ID=get_the_ID();
	ob_start();

	$titre1  = get_post_meta( $ID, CMB_PREFIX.'_rens_inscriptions_titre1', true );
	$texte1  = get_post_meta( $ID, CMB_PREFIX.'_rens_inscriptions_texte1', true );

	$titrelien1  = get_post_meta( $ID, CMB_PREFIX.'_rens_inscriptions_titrelien1', true );
	$titrelien2  = get_post_meta( $ID, CMB_PREFIX.'_rens_inscriptions_titrelien2', true );

	$lien1  = get_post_meta( $ID, CMB_PREFIX.'_rens_inscriptions_lien1', true );
	$lien2  = get_post_meta( $ID, CMB_PREFIX.'_rens_inscriptions_lien2', true );
	
	?>
	<section id="inscriptions" >

				<h2>
					<?php  echo esc_html( $titre1 ); ?>
				</h2>
				<p>
					<?php  echo wpautop(wp_kses_post( $texte1 )); ?>
				</p>
				<a href="<?php  echo esc_html( $lien1 ); ?>">
					<?php  echo esc_html( $titrelien1 ); ?>
				</a>
				<br>
				<a href="<?php  echo esc_html( $lien2 ); ?>">
					<?php  echo esc_html( $titrelien2 ); ?>
				</a>

	</section>
	<?php
	
	echo ob_get_clean();
	
	}
