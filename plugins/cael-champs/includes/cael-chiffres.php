<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_chiffres = new_cmb2_box( array(
		'id'            => 'CAELchiffres',
		'title'         => __( 'Section chiffres', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 6) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_chiffres->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_chiffres_titre1',
		'type'       => 'text',
		'default'	=> 'Le CAEL en chiffres',		
	) );

	$cmb_chiffres->add_field( array(
		'name'       => __( 'Image chiffres', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_chiffres_image',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l image' ),	
	) );

});

function affiche_chiffres() {			

	$ID=get_the_ID();
	$imagelien = get_post_meta( $ID, CMB_PREFIX.'_lecael_chiffres_image_id', true);
	ob_start();
	?>
	<section id="chiffres" class="scrollify">
		<div>
			<h2 class="titre">
				<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_lecael_chiffres_titre1', true ); 
				echo esc_html( $text ); ?>
			</h2>
			<?php echo wp_get_attachment_image( $imagelien, 'large' ); ?>
		</div>
	</section>
	<?php
	echo ob_get_clean();
	}
