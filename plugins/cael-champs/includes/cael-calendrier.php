<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_calendrier = new_cmb2_box( array(
		'id'            => 'accueilcal',
		'title'         => __( 'Section Actualités Calendrier', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 5) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_calendrier->add_field( array(
		'name'       => __( 'Titre Actualites', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_actualites',
		'type'       => 'text',
		'default'	=> 'Actualités',		
	) );

	$cmb_calendrier->add_field( array(
		'name'       => __( 'Lien Actualites', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_lien_actualites',
		'type'       => 'text',
		'default'	=> 'en savoir plus',		
	) );

	$cmb_calendrier->add_field( array(
		'name'       => __( 'Titre Calendrier', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_calendrier',
		'type'       => 'text',
		'default'	=> 'à venir au CAEL ...',		
	) );

	$cmb_calendrier->add_field( array(
		'name'       => __( 'Lien accès au calendrier', 'cmb2' ),
		'id'         => CMB_PREFIX . '_accueil_lien_calendrier',
		'type'       => 'text',
		'default'	=> 'Accéder à tout le calendrier',		
	) );

});

function affiche_calendrier() {			

		$lastposts = get_posts( array(
    		'posts_per_page' => 3
			) );

	
	
	$ID=get_the_ID();
	ob_start();
	?>
	<section id="calendrier" class="scrollify">
		<div>
			<h2 class="titre">
			<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_actualites', true ); 
			echo esc_html( $text ); ?>
			</h2>
			<?php
			foreach ( $lastposts as $post ) :
				echo test2;
				$lien= $post->post_content;
				echo $lien;
          	endforeach; ?>

			<h2 class="titre">
			<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_lien_actualites', true ); 
			echo esc_html( $text ); ?>
			</h2>
		</div>
		<div>
			<h2 class="titre">
			<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_calendrier', true ); 
			echo esc_html( $text ); ?>
			</h2>
			<?php echo do_shortcode('[add_eventon_list event_count="3" hide_month_headers="yes" ]'); ?>
			<h2 class="titre">
			<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_lien_calendrier', true ); 
			echo esc_html( $text ); ?>
			</h2>
		</div>
	</section>
	<?php
    echo ob_get_clean();
}