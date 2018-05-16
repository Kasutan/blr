<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_acces = new_cmb2_box( array(
		'id'            => 'Rensacces',
		'title'         => __( 'Section Accès', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 13) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_acces->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_acces_titre1',
		'type'       => 'text',
		'default'	=> 'Accès',		
	) );

	$cmb_acces->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_acces_titre2',
		'type'       => 'text',
		'default'	=> 'Les lieux d&acute;activités',		
	) );

	$cmb_acces->add_field( array(
		'name'       => __( 'Liste des adresses', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_acces_texte',
		'type'       => 'wysiwyg',	
	) );

	$cmb_acces->add_field( array(
		'name'       => __( 'Carte', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_acces_carte',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l&acute;image de la carte' ),	
	) );

	$cmb_acces->add_field( array(
		'name'       => __( 'Carte au survol', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_acces_carte_survol',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l&acute;image de la carte au survol' ),	
	) );

	$cmb_acces->add_field( array(
		'name'       => __( 'Nom lien carte', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_acces_nom_lien_carte',
		'type'       => 'text',
		'default'	=> 'voir sur le plan sur Google map',		
	) );

	$cmb_acces->add_field( array(
		'name'       => __( 'Lien carte', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_acces_lien_carte',
		'type'       => 'text',
	) );

	$cmb_acces->add_field( array(
		'name'       => __( 'Zone sous carte partie gauche haut', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_acces_carte_texteGH',
		'type'       => 'wysiwyg',	
	) );

	$cmb_acces->add_field( array(
		'name'       => __( 'Zone sous carte partie gauche bas', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_acces_carte_texteGB',
		'type'       => 'wysiwyg',	
	) );

	$cmb_acces->add_field( array(
		'name'       => __( 'Zone sous carte partie droite', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_acces_carte_texteD',
		'type'       => 'wysiwyg',	
	) );

});

function affiche_acces() {			

	$ID=get_the_ID();
	ob_start();

	$titre1  = get_post_meta( $ID, CMB_PREFIX.'_rens_acces_titre1', true );
	$titre2  = get_post_meta( $ID, CMB_PREFIX.'_rens_acces_titre2', true );
	$texte1  = get_post_meta( $ID, CMB_PREFIX.'_rens_acces_texte', true );
	$carte_id  = get_post_meta( $ID, CMB_PREFIX.'_rens_acces_carte_id', true );
	$carte_hover_id  = get_post_meta( $ID, CMB_PREFIX.'_rens_acces_carte_survol_id', true );
	$textelien  = get_post_meta( $ID, CMB_PREFIX.'_rens_acces_nom_lien_carte', true );
	$lienid  = get_post_meta( $ID, CMB_PREFIX.'_rens_acces_lien_carte', true );
	$textecarteGB  = get_post_meta( $ID, CMB_PREFIX.'_rens_acces_carte_texteGB', true );
	$textecarteGH  = get_post_meta( $ID, CMB_PREFIX.'_rens_acces_carte_texteGH', true );
	$textecarteD  = get_post_meta( $ID, CMB_PREFIX.'_rens_acces_carte_texteD', true );
	
	?>
	<span id="ancreacces"></span>
	<section id="acces" class="grid-x align-top align-justify rose-clair" >
			<div class="cell">
				<h2 class="blanc fond-rose-clair">
				<?php  echo esc_html( $titre1 ); ?>
				</h2>
			</div>
			<div class="cell medium-6">
				<h3>
					<?php  echo esc_html( $titre2 ); ?>
				</h3>
				<?php  echo wpautop(wp_kses_post( $texte1 )); ?>
			</div>
		
			<div class="cell medium-6 carte">
				<a href="<?php  echo esc_html( $lienid ); ?>" target="_blank">
					<div class="cartegooglemaps">
						<?php echo wp_get_attachment_image( $carte_id, 'medium' ); ?>
					</div>
					<div class="cartegooglemapshover">
						<?php echo wp_get_attachment_image( $carte_hover_id, 'medium' ); ?>
						<span><?php  echo esc_html( $textelien ); ?></span>
					</div>
					<div class="grid-x align-justify">
						<div class="cell">
							<?php  echo wpautop(wp_kses_post( $textecarteGH )); ?>
							<?php  echo wpautop(wp_kses_post( $textecarteGB )); ?>
						</div>
						<?php  echo wpautop(wp_kses_post( $textecarteD )); ?>
					</div>
				</a>
			</div>
	</section>
	<?php
	
	echo ob_get_clean();
	
	}
