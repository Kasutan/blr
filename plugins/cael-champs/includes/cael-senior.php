<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_senior = new_cmb2_box( array(
		'id'            => 'Actionssenior',
		'title'         => __( 'Section projet sénior', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 9) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_titre1',
		'type'       => 'text',
		'default'	=> 'Projet sénior',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Titre 1bis', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_titre1bis',
		'type'       => 'text',
		'default'	=> 'intergénération !',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Texte 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_texte1',
		'type'       => 'textarea',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Image projet sénior', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_image',
		'type'       => 'file',
		'text'    => array(	'add_upload_file_text' => 'Charger l&acute;image' ),	
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_titre2',
		'type'       => 'text',
		'default'	=> 'Bricothèque',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Texte 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_texte2',
		'type'       => 'wysiwyg',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Titre lien 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_titrelien2',
		'type'       => 'text',
		'default'	=> 'Pour aller plus loin, contactez nous',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'lien 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_lien2',
		'type'       => 'text_url',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Titre 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_titre3',
		'type'       => 'text',
		'default'	=> 'Pauses café',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Texte 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_texte3',
		'type'       => 'wysiwyg',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Titre lien 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_titrelien3',
		'type'       => 'text',
		'default'	=> 'Consultez les prochaines pauses cafés',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'lien 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_lien3',
		'type'       => 'text_url',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Titre 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_titre4',
		'type'       => 'text',
		'default'	=> 'Ateliers équilibre en mouvement',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Texte 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_texte4',
		'type'       => 'wysiwyg',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'Titre lien 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_titrelien4',
		'type'       => 'text',
		'default'	=> 'Consultez les prochaines sessions',		
	) );

	$cmb_senior->add_field( array(
		'name'       => __( 'lien 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_actions_senior_lien4',
		'type'       => 'text_url',		
	) );

});

function affiche_senior() {			

	$ID=get_the_ID();
	ob_start();
	$titre1  = get_post_meta( $ID, CMB_PREFIX.'_actions_senior_titre1', true );
	$titre1bis  = get_post_meta( $ID, CMB_PREFIX.'_actions_senior_titre1bis', true );
	$texte1  = get_post_meta( $ID, CMB_PREFIX.'_actions_senior_texte1', true );
	$image = get_post_meta( $ID, CMB_PREFIX.'_actions_senior_image_id', true);

	$titre2  = get_post_meta( $ID, CMB_PREFIX.'_actions_senior_titre2', true );
	$texte2  = get_post_meta( $ID, CMB_PREFIX.'_actions_senior_texte2', true );
	$titrelien2  = get_post_meta( $ID, CMB_PREFIX.'_actions_senior_titrelien2', true );
	$lien2  = get_post_meta( $ID, CMB_PREFIX.'_actions_senior_lien2', true );

	$titre3  = get_post_meta( $ID, CMB_PREFIX.'_actions_senior_titre3', true );
	$texte3  = get_post_meta( $ID, CMB_PREFIX.'_actions_senior_texte3', true );
	$titrelien3  = get_post_meta( $ID, CMB_PREFIX.'_actions_senior_titrelien3', true );
	$lien3  = get_post_meta( $ID, CMB_PREFIX.'_actions_senior_lien3', true );

	$titre4  = get_post_meta( $ID, CMB_PREFIX.'_actions_senior_titre4', true );
	$texte4  = get_post_meta( $ID, CMB_PREFIX.'_actions_senior_texte4', true );
	$titrelien4  = get_post_meta( $ID, CMB_PREFIX.'_actions_senior_titrelien4', true );
	$lien4  = get_post_meta( $ID, CMB_PREFIX.'_actions_senior_lien4', true );
	
	?>
	<section id="senior" class="align-middle justify-between" >
		<header class="entry-header grid-x">

			<div class="cell medium-6">
				<h1 class="fond-rose">
					<?php echo($titre1); ?>
				</h1>
				<?php echo wp_get_attachment_image( $image, 'medium' ); ?>
			</div>
			<div class="cell medium-6">
				<h2 class="titre">
					<?php echo($titre1bis); ?>
				</h2>
				<p>
					<?php echo wp_kses_post($texte1); ?>
				</p>
			</div>
		</header>

		<div class="entry-content">
			<div>
				<h2 class="titre">
					<?php  echo esc_html( $titre2 ); ?>
				</h2>
				<p>
					<?php  echo wp_kses_post( $texte2 ); ?>
				</p>
				<?php  if (!empty($lien2)) { ?>
					<a href= <?php echo ($lien2); ?> class="lien">
						<?php  echo wp_kses_post( $titrelien2 ); ?>
					</a>
				<?php  } ?>
			</div>

			<div>
				<h2 class="titre">
					<?php  echo esc_html( $titre3 ); ?>
				</h2>
				<p>
					<?php  echo wp_kses_post( $texte3 ); ?>
				</p>
				<?php  if (!empty($lien3)) { ?>
					<a href= <?php echo ($lien3); ?> class="lien">
						<?php  echo wp_kses_post( $titrelien3 ); ?>
					</a>
				<?php  } ?>
			</div>

			<div>
				<h2 class="titre">
					<?php  echo esc_html( $titre4 ); ?>
				</h2>
				<p>
					<?php  echo wp_kses_post( $texte4 ); ?>
				</p>
				<?php  if (!empty($lien4)) { ?>
					<a href= <?php echo ($lien4); ?> class="lien">
						<?php  echo wp_kses_post( $titrelien4 ); ?>
					</a>
				<?php  } ?>
			</div>

		</div>
	</section>
	<?php
	
	echo ob_get_clean();
	
	}

