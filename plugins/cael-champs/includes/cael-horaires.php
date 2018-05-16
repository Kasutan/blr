<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_horaires = new_cmb2_box( array(
		'id'            => 'Renshoraires',
		'title'         => __( 'Section Horaires', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 13) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_titre1',
		'type'       => 'text',
		'default'	=> 'Horaires',		
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Texte 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_texte1',
		'type'       => 'wysiwyg',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Titre 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_titre2',
		'type'       => 'text',
		'default'	=> 'Nos horaires en détail :',		
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour1',
		'type'       => 'text',	
		'default'	=> 'Lundi',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 1 matin', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour1am',
		'type'       => 'text',		
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 1 après-midi', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour1pm',
		'type'       => 'text',
		'default'	=> '14h-21h',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour2',
		'type'       => 'text',	
		'default'	=> 'Mardi',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 2 matin', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour2am',
		'type'       => 'text',		
		'default'	=> '9h-12h',
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 2 après-midi', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour2pm',
		'type'       => 'text',
		'default'	=> '14h-21h',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 3', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour3',
		'type'       => 'text',	
		'default'	=> 'Mecredi',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 3 matin', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour3am',
		'type'       => 'text',		
		'default'	=> '9h-12h',
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 3 après-midi', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour3pm',
		'type'       => 'text',
		'default'	=> '14h-21h',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 4', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour4',
		'type'       => 'text',	
		'default'	=> 'Jeudi',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 4 matin', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour4am',
		'type'       => 'text',		
		'default'	=> '9h-12h',
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 4 après-midi', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour4pm',
		'type'       => 'text',
		'default'	=> '14h-21h',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 5', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour5',
		'type'       => 'text',	
		'default'	=> 'Vendredi',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 5 matin', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour5am',
		'type'       => 'text',		
		'default'	=> '9h-12h',
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 5 après-midi', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour5pm',
		'type'       => 'text',
		'default'	=> '14h-21h',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 6', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour6',
		'type'       => 'text',	
		'default'	=> 'Samedi',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 6 matin', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour6am',
		'type'       => 'text',		
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Jour 6 après-midi', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_jour6pm',
		'type'       => 'text',
		'default'	=> '14h-16h',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Texte 2', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_texte2',
		'type'       => 'wysiwyg',	
	) );

	$cmb_horaires->add_field( array(
		'name'       => __( 'Pavé droit', 'cmb2' ),
		'id'         => CMB_PREFIX . '_rens_horaires_pave',
		'type'       => 'wysiwyg',	
	) );

});

function affiche_horaires() {			

	$ID=get_the_ID();
	ob_start();

	$titre1  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_titre1', true );
	$texte1  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_texte1', true );
	$titre2  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_titre2', true );
	$jour1  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour1', true );
	$jour1am  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour1am', true );
	$jour1pm  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour1pm', true );
	$jour2  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour2', true );
	$jour2am  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour2am', true );
	$jour2pm  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour2pm', true );
	$jour3  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour3', true );
	$jour3am  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour3am', true );
	$jour3pm  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour3pm', true );
	$jour4  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour4', true );
	$jour4am  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour4am', true );
	$jour4pm  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour4pm', true );
	$jour5  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour5', true );
	$jour5am  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour5am', true );
	$jour5pm  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour5pm', true );
	$jour6  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour6', true );
	$jour6am  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour6am', true );
	$jour6pm  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_jour6pm', true );
	$texte2  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_texte2', true );
	$texte3  = get_post_meta( $ID, CMB_PREFIX.'_rens_horaires_pave', true );
	
	?>
	<span id="ancrehoraires"></span>
	<section id="horaires" class="grid-x fond-rose-fonce blanc align-bottom align-center" >

			<div class="cell large-7 horaires">
				<h2 class="titre">
					<?php  echo esc_html( $titre1 ); ?>
				</h2>
				<div>
					<?php  echo wpautop(wp_kses_post( $texte1 )); ?>
				</div>
				<strong>
					<?php  echo esc_html( $titre2 ); ?>
				</strong>

				<table>
					<tr>
						<th> <?php  echo esc_html( $jour1 ); ?> </th>
						<th> <?php  echo esc_html( $jour2 ); ?> </th>
						<th> <?php  echo esc_html( $jour3 ); ?> </th>
						<th> <?php  echo esc_html( $jour4 ); ?> </th>
						<th> <?php  echo esc_html( $jour5 ); ?> </th>
						<th> <?php  echo esc_html( $jour6 ); ?> </th>
					</tr>
					<tr>
						<td> <?php  echo esc_html( $jour1am ); ?> </td>
						<td> <?php  echo esc_html( $jour2am ); ?> </td>
						<td> <?php  echo esc_html( $jour3am ); ?> </td>
						<td> <?php  echo esc_html( $jour4am ); ?> </td>
						<td> <?php  echo esc_html( $jour5am ); ?> </td>
						<td> <?php  echo esc_html( $jour6am ); ?> </td>
					</tr>
					<tr>
						<td> <?php  echo esc_html( $jour1pm ); ?> </td>
						<td> <?php  echo esc_html( $jour2pm ); ?> </td>
						<td> <?php  echo esc_html( $jour3pm ); ?> </td>
						<td> <?php  echo esc_html( $jour4pm ); ?> </td>
						<td> <?php  echo esc_html( $jour5pm ); ?> </td>
						<td> <?php  echo esc_html( $jour6pm ); ?> </td>
					</tr>
				</table>

				<div>
					<?php  echo wpautop(wp_kses_post( $texte2 )); ?>
				</div>
			</div>
			
			<div class="cell large-5 calendrier rose-fonce fond-blanc text-center">
					<?php  echo wpautop(wp_kses_post( $texte3 )); ?>
			</div>

	</section>
	<?php
	
	echo ob_get_clean();
	
	}