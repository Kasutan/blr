<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_projet = new_cmb2_box( array(
		'id'            => 'CAELprojet',
		'title'         => __( 'Section projet', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 6) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_titre1',
		'type'       => 'text',
		'default'	=> 'Le projet',		
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'citation', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_citation',
		'type'       => 'textarea',		
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Texte 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_texte1',
		'type'       => 'textarea',	
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Image projet', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_image',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l image' ),	
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_titre2',
		'type'       => 'text',
		'default'	=> 'Loisirs',		
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Texte 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_texte2',
		'type'       => 'textarea',	
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Titre 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_titre3',
		'type'       => 'text',
		'default'	=> 'Culture',		
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Texte 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_texte3',
		'type'       => 'textarea',	
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Titre 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_titre4',
		'type'       => 'text',
		'default'	=> 'Animation',		
	) );

	$cmb_projet->add_field( array(
		'name'       => __( 'Texte 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_projet_texte4',
		'type'       => 'textarea',	
	) );

});

function affiche_projet() {			

	$ID=get_the_ID();
	$imagelien = get_post_meta( $ID, CMB_PREFIX.'_lecael_projet_image_id', true);
	ob_start();
	?>
	<section id="projet" class="scrollify">
		<div>
			<h2 class="titre">
				<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_lecael_projet_titre1', true ); 
				echo esc_html( $text ); ?>
			</h2>
			<?php echo wp_get_attachment_image( $imagelien, 'large' ); ?>
			<blockquote>
				<?php $cita  = get_post_meta( $ID, CMB_PREFIX.'_lecael_citation', true ); 
				echo esc_html( $cita ); ?>
			</blockquote>
			<p>
				<?php $para1  = get_post_meta( $ID, CMB_PREFIX.'_lecael_projet_texte1', true ); 
				echo esc_html( $para1 ); ?>
			</p>
			<h2 class="titre">
				<?php $text2  = get_post_meta( $ID, CMB_PREFIX.'_lecael_projet_titre2', true ); 
				echo esc_html( $text2 ); ?>
			</h2>
			<p>
				<?php $para2  = get_post_meta( $ID, CMB_PREFIX.'_lecael_projet_texte2', true ); 
				echo esc_html( $para2 ); ?>
			</p>
			<h2 class="titre">
				<?php $text3  = get_post_meta( $ID, CMB_PREFIX.'_lecael_projet_titre3', true ); 
				echo esc_html( $text3 ); ?>
			</h2>
			<p>
				<?php $para3  = get_post_meta( $ID, CMB_PREFIX.'_lecael_projet_texte3', true ); 
				echo esc_html( $para3 ); ?>
			</p>
			<h2 class="titre">
				<?php $text4  = get_post_meta( $ID, CMB_PREFIX.'_lecael_projet_titre4', true ); 
				echo esc_html( $text4 ); ?>
			</h2>
			<p>
				<?php $para4  = get_post_meta( $ID, CMB_PREFIX.'_lecael_projet_texte4', true ); 
				echo esc_html( $para4 ); ?>
			</p>
		</div>
	</section>
	<?php
	echo ob_get_clean();
	}