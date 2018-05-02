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
	<section id="apropos" class="grid-x">
		<div class="show-for-medium cell medium-1 large-2">
			<div class="bandeau fond-rose"></div>
		</div>
		<div class="cell small-12 medium-4 large-3 image">
			<?php echo wp_get_attachment_image( $imagelien, 'large' ); ?>
			<div class="bandeau fond-rose transparent"></div>
		</div>
		<div class="cell small-12 medium-6 large-5">
			<h2 class="titre fond-rose">
			<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_titre1', true ); 
			echo esc_html( $text ); ?>
			</h2>
			<div class="grid-x align-middle align-justify nowrap">
				<p>
					<?php $para1  = get_post_meta( 6, CMB_PREFIX.'_lecael_asso_texte1', true ); 
					echo wp_kses_post( $para1 ); ?>
				</p>
				<a href="/le-cael/#association" title="En savoir plus"><span class="icon-triangle-right rose"></span></a>
			</div>
			<h2 class="titre fond-rose-clair">
				<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_titre2', true ); 
				echo esc_html( $text ); ?>
			</h2>
			<div class="grid-x align-middle  align-justify nowrap">
				<p>
					<?php $para2  = get_post_meta( 6, CMB_PREFIX.'_lecael_projet_texte1', true ); 
					echo wp_kses_post( $para2 ); ?>
				</p>
				<a href="/le-cael/#projet" title="En savoir plus"><span class="icon-triangle-right rose-clair"></span></a>
			</div>
		</div>
		<div class="show-for-medium cell medium-1 large-2">
			&nbsp;
		</div>
		<div class="show-for-medium cell medium-1 large-2">
			<div class="bandeau fond-vert"></div>
		</div>
		<div class="cell small-12 medium-10 large-8">
			<h2 class="titre fond-vert">
				<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_titre3', true ); 
				echo esc_html( $text ); ?>
			</h2>
			<div class="grid-x align-middle align-justify nowrap">
				<p>
					<?php $para3  = get_post_meta( 6, CMB_PREFIX.'_lecael_projet_texte2', true ); 
					echo wp_kses_post( $para3 ); ?>
				</p>
				<a href="/le-cael/#projet" title="En savoir plus"><span class="icon-triangle-right vert"></span></a>
			</div>
		</div>
		<div class="show-for-medium cell medium-1 large-2">
			&nbsp;
		</div>
	</section>
	<?php
	echo ob_get_clean();
	}