<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_famille = new_cmb2_box( array(
		'id'            => 'Actionsfamille',
		'title'         => __( 'Section projet famille', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 9) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre1',
		'type'       => 'text',
		'default'	=> 'Un projet famille',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 1bis', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre1bis',
		'type'       => 'text',
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Texte 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_texte1',
		'type'       => 'wysiwyg',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Image projet famille', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_image',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l image' ),	
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre2',
		'type'       => 'text',
		'default'	=> 'La référente famille',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Texte 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_texte2',
		'type'       => 'wysiwyg',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre lien 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titrelien2',
		'type'       => 'text',
		'default'	=> 'pour plus d&acute;informations, contactez Tiphaine',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'lien 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_lien2',
		'type'       => 'text_url',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre3',
		'type'       => 'text',
		'default'	=> 'Stages en famille',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Texte 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_texte3',
		'type'       => 'wysiwyg',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre lien 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titrelien3',
		'type'       => 'text',
		'default'	=> 'Consultez les prochains stages en famille',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'lien 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_lien3',
		'type'       => 'text_url',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre4',
		'type'       => 'text',
		'default'	=> 'Sortie famille',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Texte 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_texte4',
		'type'       => 'wysiwyg',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre lien 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titrelien4',
		'type'       => 'text',
		'default'	=> 'Consultez les prochaines sorties en famille',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'lien 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_lien4',
		'type'       => 'text_url',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 5', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre5',
		'type'       => 'text',
		'default'	=> 'Pause cafés parentés',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Texte 5', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_texte5',
		'type'       => 'wysiwyg',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre lien 5', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titrelien5',
		'type'       => 'text',
		'default'	=> 'Consultez les prochaines pauses cafés parentalité',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'lien 5', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_lien5',
		'type'       => 'text_url',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 6', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre6',
		'type'       => 'text',
		'default'	=> 'Soirée jeux',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Texte 6', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_texte6',
		'type'       => 'wysiwyg',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre lien 6', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titrelien6',
		'type'       => 'text',
		'default'	=> 'Consultez les prochaines soirées jeux',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'lien 6', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_lien6',
		'type'       => 'text_url',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 7', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre7',
		'type'       => 'text',
		'default'	=> 'La "passerelle"',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Texte 7', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_texte7',
		'type'       => 'wysiwyg',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre lien 7', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titrelien7',
		'type'       => 'text',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'lien 7', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_lien7',
		'type'       => 'text_url',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre 8', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titre8',
		'type'       => 'text',
		'default'	=> 'Permanences assistante sociale',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Texte 8', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_texte8',
		'type'       => 'wysiwyg',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'Titre lien 8', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_titrelien8',
		'type'       => 'text',		
	) );

	$cmb_famille->add_field( array(
		'name'       => __( 'lien 8', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_famille_lien8',
		'type'       => 'text_url',		
	) );
});

function affiche_famille() {			

	$ID=get_the_ID();
	ob_start();
	$titre1  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titre1', true );
	$titre1bis  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titre1bis', true );
	$texte1  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_texte1', true );
	$image = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_image_id', true);

	$titre2  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titre2', true );
	$texte2  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_texte2', true );
	$titrelien2  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titrelien2', true );
	$lien2  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_lien2', true );

	$titre3  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titre3', true );
	$texte3  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_texte3', true );
	$titrelien3  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titrelien3', true );
	$lien3  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_lien3', true );

	$titre4  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titre4', true );
	$texte4  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_texte4', true );
	$titrelien4  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titrelien4', true );
	$lien4  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_lien4', true );

	$titre5  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titre5', true );
	$texte5  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_texte5', true );
	$titrelien5  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titrelien5', true );
	$lien5  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_lien5', true );

	$titre6  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titre6', true );
	$texte6  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_texte6', true );
	$titrelien6  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titrelien6', true );
	$lien6  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_lien6', true );

	$titre7  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titre7', true );
	$texte7  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_texte7', true );
	$titrelien7  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titrelien7', true );
	$lien7  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_lien7', true );

	$titre8  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titre8', true );
	$texte8  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_texte8', true );
	$titrelien8  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_titrelien8', true );
	$lien8  = get_post_meta( $ID, CMB_PREFIX.'_actions_famille_lien8', true );
	
	?>
	<span id="ancrefamille"></span>
	<section id="famille" class="fond-vert-clair">
		<header class="grid-x align-bottom justify-center">

			<div class="cell medium-6">
				<h2 class="fond-rose-clair blanc">
					<?php echo($titre1); ?>
				</h2>
				<?php echo wp_get_attachment_image( $image, 'medium' ); ?>
			</div>
			<div class="cell medium-6 texte rose-fonce">
				<p class="titre">
					<?php echo($titre1bis); ?>
				</p>
				<div class="contenu">
					<?php echo wp_kses_post($texte1); ?>
				</div>
			</div>
		</header>

		<div class="projets famille">
			<div>
				<h3 class="titre">
					<?php  echo esc_html( $titre2 ); ?>
				</h3>
				<div  class="rose-clair">
					<?php  echo wp_kses_post( $texte2 ); ?>
				</div>
				<?php  if (!empty($lien2)) { ?>
					<a href= <?php echo ($lien2); ?> class="lien">
						<?php  echo wp_kses_post( $titrelien2 ); ?>
					</a>
				<?php  } ?>
			</div>

			<div>
				<h3 class="titre">
					<?php  echo esc_html( $titre3 ); ?>
				</h3>
				<div>
					<?php  echo wp_kses_post( $texte3 ); ?>
				</div>
				<?php  if (!empty($lien3)) { ?>
					<a href= <?php echo ($lien3); ?> class="lien">
						<?php  echo wp_kses_post( $titrelien3 ); ?>
					</a>
				<?php  } ?>
			</div>

			<div>
				<h3 class="titre">
					<?php  echo esc_html( $titre4 ); ?>
				</h3>
				<div>
					<?php  echo wp_kses_post( $texte4 ); ?>
				</div>
				<?php  if (!empty($lien4)) { ?>
					<a href= <?php echo ($lien4); ?> class="lien">
						<?php  echo wp_kses_post( $titrelien4 ); ?>
					</a>
				<?php  } ?>
			</div>
			
			<div>
				<h3 class="titre">
					<?php  echo esc_html( $titre5 ); ?>
				</h3>
				<div>
					<?php  echo wp_kses_post( $texte5 ); ?>
				</div>
				<?php  if (!empty($lien5)) { ?>
					<a href= <?php echo ($lien5); ?> class="lien">
						<?php  echo wp_kses_post( $titrelien5 ); ?>
					</a>
				<?php  } ?>
			</div>

			<div>
				<h3 class="titre">
					<?php  echo esc_html( $titre6 ); ?>
				</h3>
				<div>
					<?php  echo wp_kses_post( $texte6 ); ?>
				</div>
				<?php  if (!empty($lien6)) { ?>
					<a href= <?php echo ($lien6); ?> class="lien">
						<?php  echo wp_kses_post( $titrelien6 ); ?>
					</a>
				<?php  } ?>
			</div>

			<div>
				<h3 class="titre">
					<?php  echo esc_html( $titre7 ); ?>
				</h3>
				<div>
					<?php  echo wp_kses_post( $texte7 ); ?>
				</div>
				<?php  if (!empty($lien7)) { ?>
					<a href= <?php echo ($lien7); ?> class="lien">
						<?php  echo wp_kses_post( $titrelien7 ); ?>
					</a>
				<?php  } ?>
			</div>

			<div>
				<h3 class="titre">
					<?php  echo esc_html( $titre8 ); ?>
				</h3>
				<div>
					<?php  echo wp_kses_post( $texte8 ); ?>
				</div>
				<?php  if (!empty($lien8)) { ?>
					<a href= <?php echo ($lien8); ?> class="lien">
						<?php  echo wp_kses_post( $titrelien8 ); ?>
					</a>
				<?php  } ?>
			</div>

		</div>
	</section>
	<div class="decor-rose"></div>
	<?php
	
	echo ob_get_clean();
	
	}
