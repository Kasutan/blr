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

});

function affiche_acces() {			

	$ID=get_the_ID();
	ob_start();

	$titre1  = get_post_meta( $ID, CMB_PREFIX.'_rens_acces_titre1', true );
	$titre2  = get_post_meta( $ID, CMB_PREFIX.'_rens_acces_titre2', true );
	$texte1  = get_post_meta( $ID, CMB_PREFIX.'_rens_acces_texte', true );
	
	?>
	<section id="acces" >

			<div class="cell medium-6">
				<h2>
					<?php  echo esc_html( $titre1 ); ?>
				</h2>
				<h3>
					<?php  echo esc_html( $titre2 ); ?>
				</h3>
				<p>
					<?php  echo wpautop(wp_kses_post( $texte1 )); ?>
				</p>
			</div>
			
			<div>
				<?php  echo ('Carte à afficher'); ?>
				<?php  echo ('icônes acces à afficher'); ?>
			</div>

	</section>
	<?php
	
	echo ob_get_clean();
	
	}
