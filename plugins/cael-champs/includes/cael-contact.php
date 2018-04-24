<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_contact = new_cmb2_box( array(
		'id'            => 'Renscontact',
		'title'         => __( 'Section contact', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 13) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_contact->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_contact_titre1',
		'type'       => 'text',
		'default'	=> 'Contact',		
	) );

	$cmb_contact->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_contact_titre2',
		'type'       => 'text',
		'default'	=> 'CAEL',		
	) );

	$cmb_contact->add_field( array(
		'name'       => __( 'Titre 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_contact_titre3',
		'type'       => 'text',
		'default'	=> 'Centre Animation Expression & Loisirs',		
	) );

	$cmb_contact->add_field( array(
		'name'       => __( 'Adresse', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_contact_adresse',
		'type'       => 'wysiwyg',		
	) );

	$cmb_contact->add_field( array(
		'name'       => __( 'Autre site', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_contact_autre',
		'type'       => 'wysiwyg',		
	) );

});

function affiche_contact() {			

	$ID=get_the_ID();
	ob_start();

	$titre1  = get_post_meta( $ID, CMB_PREFIX.'_rens_contact_titre1', true );

	$titre2  = get_post_meta( $ID, CMB_PREFIX.'_rens_contact_titre2', true );
	$titre3  = get_post_meta( $ID, CMB_PREFIX.'_rens_contact_titre3', true );
	$texte3  = get_post_meta( $ID, CMB_PREFIX.'_rens_contact_adresse', true );
	$texte4  = get_post_meta( $ID, CMB_PREFIX.'_rens_contact_autre', true );
	
	?>
	<section id="contact" >

			<div class="cell medium-6">
				<h2>
					<?php  echo esc_html( $titre1 ); ?>
				</h2>
				<?php echo do_shortcode('[caldera_form id="CF5adf29f365274"]'); ?>
			</div>
			
			<div>
				<p>
					<?php  echo esc_html( $titre2 ); ?>
					<br>
					<?php  echo wpautop(wp_kses_post( $titre3 )); ?>
					<?php  echo wpautop(wp_kses_post( $texte3 )); ?>
					<?php  echo wpautop(wp_kses_post( $texte4 )); ?>
				</p>
			</div>

	</section>
	<?php
	
	echo ob_get_clean();
	
	}