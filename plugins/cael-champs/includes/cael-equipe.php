<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_equipe = new_cmb2_box( array(
		'id'            => 'CAELequipe',
		'title'         => __( 'Section équipe et conseil d&acute;administration', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 6) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_equipe->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_equipe_titre1',
		'type'       => 'text',
		'default'	=> 'L&acute;équipe',		
	) );

	$cmb_equipe->add_field( array(
		'name'       => __( 'Titre 2 première partie', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_equipe_titre21',
		'type'       => 'text',
		'default'	=> 'Le conseil',		
	) );

	$cmb_equipe->add_field( array(
		'name'       => __( 'Titre 2 seconde partie', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_equipe_titre22',
		'type'       => 'text',
		'default'	=> 'd&acute;administration',		
	) );

	$cmb_membre_equipe = new_cmb2_box( array(
		'id'            => 'CAELmembreequipe',
		'title'         => __( 'Ordre d&acute;affichage', 'cmb2' ),
		'object_types' => array( 'cael_equipe' ), // post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_membre_equipe->add_field( array(
		'name'       => __( 'Ordre d&acute;affichage', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_membre_ordre',
		'type'       => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		'sanitization_cb' => 'absint',
		'escape_cb'       => 'absint',	
	) );

	$cmb_membre_conseil = new_cmb2_box( array(
		'id'            => 'CAELmembreconseil',
		'title'         => __( 'Ordre d&acute;affichage', 'cmb2' ),
		'object_types' => array( 'cael_administration' ), // post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_membre_conseil->add_field( array(
		'name'       => __( 'Ordre d&acute;affichage', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_conseil_ordre',
		'type'       => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		'sanitization_cb' => 'absint',
		'escape_cb'       => 'absint',	
	) );

});

function affiche_equipe() {			

	$ID=get_the_ID();
	$membres=new WP_Query(array(
		'post_type' => 'cael_equipe',
		'meta_key' => 'cael__lecael_membre_ordre',
		'orderby' => 'meta_value',
		'order' => 'asc',
	));

	$conseils=new WP_Query(array(
		'post_type' => 'cael_administration',
		'meta_key' => 'cael__lecael_conseil_ordre',
		'orderby' => 'meta_value',
		'order' => 'asc',
	));

	ob_start();
	?>
	<section id="equipe" class="fond-vert-clair">
			<h2 class="titre blanc fond-rose">
				<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_lecael_equipe_titre1', true ); 
				echo esc_html( $text ); ?>
			</h2>
		<div class="grid-x">
			<?php 
			if($membres->have_posts()) :
				while ($membres->have_posts()) : $membres->the_post();
				?>
					<div class="membre col">
						<?php the_post_thumbnail('thumbnail'); ?>
						<p class="nom"><?php the_title(); ?></p>
						<div class="role"><?php the_content(); ?></div>
					</div>
				<?php endwhile; 
			endif;

			?>
		</div>
	</section>
		<div class="motif"></div>

	<section id="administration">
		<h2 class="titre">
			<span><?php $text1  = get_post_meta( $ID, CMB_PREFIX.'_lecael_equipe_titre21', true ); 
			echo esc_html( $text1 ); ?></span><br>
			<span><strong><?php $text2  = get_post_meta( $ID, CMB_PREFIX.'_lecael_equipe_titre22', true ); 
			echo esc_html( $text2 ); ?></strong></span>
		</h2>
		<?php 
		if($conseils->have_posts()) :
			?><div class="conseil"><?php
			while ($conseils->have_posts()) : $conseils->the_post();
			?>
				<p class="role">
					<?php the_title(); ?>
				</p><div class="nom">
					<?php the_content(); ?>
		</div>
			<?php endwhile; ?>
		</div>
		<?php endif;
		wp_reset_postdata();
		?>
	</section>

	<?php
	echo ob_get_clean();
	}

