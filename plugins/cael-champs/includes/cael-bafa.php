<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_bafa = new_cmb2_box( array(
		'id'            => 'Actionsbafa',
		'title'         => __( 'Section BAFA', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 9) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_titre1',
		'type'       => 'text',
		'default'	=> 'Le BAFA',		
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Texte 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_texte1',
		'type'       => 'textarea',		
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Image BAFA', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_image',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l&acute;image' ),	
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_titre2',
		'type'       => 'text',	
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Texte 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_texte2',
		'type'       => 'wysiwyg',		
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Titre 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_titre3',
		'type'       => 'text',
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Texte 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_texte3',
		'type'       => 'wysiwyg',		
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Titre 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_titre4',
		'type'       => 'text',		
	) );

	$cmb_bafa->add_field( array(
		'name'       => __( 'Texte 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_bafa_texte4',
		'type'       => 'wysiwyg',		
	) );

});

function affiche_bafa() {			

	$ID=get_the_ID();
	ob_start();
	$titre1  = get_post_meta( $ID, CMB_PREFIX.'_actions_bafa_titre1', true );
	$texte1  = get_post_meta( $ID, CMB_PREFIX.'_actions_bafa_texte1', true );
	$image = get_post_meta( $ID, CMB_PREFIX.'_actions_bafa_image_id', true);

	$titre2  = get_post_meta( $ID, CMB_PREFIX.'_actions_bafa_titre2', true );
	$texte2  = get_post_meta( $ID, CMB_PREFIX.'_actions_bafa_texte2', true );

	$titre3  = get_post_meta( $ID, CMB_PREFIX.'_actions_bafa_titre3', true );
	$texte3  = get_post_meta( $ID, CMB_PREFIX.'_actions_bafa_texte3', true );

	$titre4  = get_post_meta( $ID, CMB_PREFIX.'_actions_bafa_titre4', true );
	$texte4  = get_post_meta( $ID, CMB_PREFIX.'_actions_bafa_texte4', true );
	
	?>
	<span id="ancrebafa"></span>
	<div class="fondbafa"></div>
	<section id="bafa" class="fond-rose-clair" >
		<div class="decor">
			<h2 class="titre blanc fond-rose-clair">
					<?php echo esc_html($titre1); ?>
			</h2>
			<div class="contenu fond-blanc rose-fonce">
				<div class="intro ">
					<?php echo wp_kses_post($texte1); ?>
				</div>

				<div>
					<h3 class="titre">
						<?php  echo esc_html( $titre2 ); ?>
					</h3>
					<div>
						<?php  echo wp_kses_post( $texte2 ); ?>
					</div>
				</div>

				<div class="grid-x align-stretch">
					<div class="image cell medium-5">
						<?php echo wp_get_attachment_image( $image, 'medium' ); ?>
					</div>
					<div class="texte cell medium-7">
						<h3 class="titre">
							<?php  echo esc_html( $titre3 ); ?>
						</h3>
						<div>
							<?php  echo wp_kses_post( $texte3 ); ?>
						</div>
					</div>
				</div>

				<div>
					<h3 class="titre">
						<?php  echo esc_html( $titre4 ); ?>
					</h3>
					<div>
						<?php  echo wp_kses_post( $texte4 ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
	
	echo ob_get_clean();
	
	}