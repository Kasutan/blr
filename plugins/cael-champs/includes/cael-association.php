<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_association = new_cmb2_box( array(
		'id'            => 'CAELassociation',
		'title'         => __( 'Section association', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 6) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_association->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_asso_titre1',
		'type'       => 'text',
		'default'	=> 'L association',		
	) );

	$cmb_association->add_field( array(
		'name'       => __( 'Texte 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_asso_texte1',
		'type'       => 'textarea',		
	) );

	$cmb_association->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_asso_titre2',
		'type'       => 'text',
		'default'	=> 'MJC & centre social',		
	) );

	$cmb_association->add_field( array(
		'name'       => __( 'Texte 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_asso_texte2',
		'type'       => 'wysiwyg',		
	) );

	$cmb_association->add_field( array(
		'name'       => __( 'Image association', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_image_asso',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l image' ),	
	) );
});

function affiche_association() {			

	$ID=get_the_ID();
	$imagelien = get_post_meta( $ID, CMB_PREFIX.'_lecael_image_asso_id', true);
	ob_start();
	?>
	<section id="association" >
		<h1 class="titre">
			<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_lecael_asso_titre1', true ); 
			echo esc_html( $text ); ?>
		</h1>
		<p class="intro">
			<?php $para1  = get_post_meta( $ID, CMB_PREFIX.'_lecael_asso_texte1', true ); 
			echo wp_kses_post( $para1 ); ?>
		</p>
		<?php echo wp_get_attachment_image( $imagelien, 'banniere' ); ?>
		<div class="fond-rose mjc">
			<h2 class="titre">
				<?php $text2  = get_post_meta( $ID, CMB_PREFIX.'_lecael_asso_titre2', true ); 
				echo esc_html( $text2 ); ?>
			</h2>
			<div class="texte">
				<?php $para2  = get_post_meta( $ID, CMB_PREFIX.'_lecael_asso_texte2', true ); 
				echo wpautop(wp_kses_post( $para2 )); ?>
			</div>
		</div>	
	</section>
	<?php
	echo ob_get_clean();
	}