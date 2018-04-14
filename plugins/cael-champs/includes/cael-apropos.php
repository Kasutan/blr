<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_apropos = new_cmb2_box( array(
		'id'            => 'accueilapropos',
		'title'         => __( 'Section à propos', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 5) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_apropos->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_titre1',
		'type'       => 'text',
		'default'	=> 'Le CAEL c&acute;est...',		
	) );

	$cmb_apropos->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_titre2',
		'type'       => 'text',
		'default'	=> 'Notre projet',		
	) );

	$cmb_apropos->add_field( array(
		'name'       => __( 'Titre 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_titre3',
		'type'       => 'text',
		'default'	=> 'Plusieurs dizaines d&acute;activités',		
	) );

	$cmb_apropos->add_field( array(
		'name'       => __( 'Image', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_apropos_image',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l image' ),	
	) );
});

function affiche_apropos() {			

	$ID=get_the_ID();
	$imagelien = get_post_meta( $ID, CMB_PREFIX.'_accueil_apropos_image_id', true);
	ob_start();
	?>
	<section id="apropos" class="scrollify">
		<div>
			<?php echo wp_get_attachment_image( $imagelien, 'large' ); ?>
			<h2 class="titre">
				<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_titre1', true ); 
				echo esc_html( $text ); ?>
			</h2>
			<p>
				<?php $para1  = get_post_meta( 6, CMB_PREFIX.'_lecael_asso_texte1', true ); 
				echo esc_html( $para1 ); ?>
			</p>
			<h2 class="titre">
				<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_titre2', true ); 
				echo esc_html( $text ); ?>
			</h2>
			<p>
				<?php $para2  = get_post_meta( 6, CMB_PREFIX.'_lecael_projet_texte1', true ); 
				echo esc_html( $para2 ); ?>
			</p>
			<h2 class="titre">
				<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_titre3', true ); 
				echo esc_html( $text ); ?>
			</h2>
			<p>
				<?php $para3  = get_post_meta( 6, CMB_PREFIX.'_lecael_projet_texte2', true ); 
				echo esc_html( $para3 ); ?>
			</p>
		</div>
	</section>
	<?php
	echo ob_get_clean();
	}