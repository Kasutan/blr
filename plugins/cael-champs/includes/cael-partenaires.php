<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'cmb2_admin_init', function() {

	$cmb_partenaires = new_cmb2_box( array(
		'id'            => 'CAELpartenaires',
		'title'         => __( 'Section partenaires', 'cmb2' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'id', 'value' => array( 6) ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_partenaires->add_field( array(
		'name'       => __( 'Titre 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_part_titre1',
		'type'       => 'text',
		'default'	=> 'Nos partenaires',		
	) );

	$cmb_partenaires->add_field( array(
		'name'       => __( 'Texte 1', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_part_texte1',
		'type'       => 'wysiwyg',		
	) );

	$cmb_cpt_partenaires = new_cmb2_box( array(
		'id'            => 'CAELcptpartenaires',
		'title'         => __( 'Ordre d&acute;affichage', 'cmb2' ),
		'object_types' => array( 'cael_partenaires' ), // post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
		'closed'     => true,
	) );

	$cmb_cpt_partenaires->add_field( array(
		'name'       => __( 'Ordre d&acute;affichage', 'cmb2' ),
		'id'         => CMB_PREFIX . '_lecael_cptpartenaires_ordre',
		'type'       => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		'sanitization_cb' => 'absint',
		'escape_cb'       => 'absint',	
	) );

});

function affiche_partenaires() {			

	$ID=get_the_ID();
	$cptpartenaires=new WP_Query(array(
		'post_type' => 'cael_partenaires',
		'meta_key' => 'cael__lecael_cptpartenaires_ordre',
		'orderby' => 'meta_value',
		'order' => 'asc',
	));
	ob_start();
	?>
	<span id="ancrepartenaires"></span>
	<section id="partenaires" >
			<h2 class="titre blanc fond-rose">
				<?php $text  = get_post_meta( $ID, CMB_PREFIX.'_lecael_part_titre1', true ); 
				echo esc_html( $text ); ?>
			</h2>
			<div  class="rose-clair">
				<?php $para1  = get_post_meta( $ID, CMB_PREFIX.'_lecael_part_texte1', true ); 
				echo wp_kses_post( $para1 ); ?>
			</div>
		<?php 
			if($cptpartenaires->have_posts()) :?>
				<div class="cptpartenaires grid-x align-center">
			<?php			
				while ($cptpartenaires->have_posts()) : $cptpartenaires->the_post();
				?>
						<a class="col" href= <?php echo esc_html(get_the_content()); ?> >
							<?php the_post_thumbnail('thumbnail'); ?>
        				</a>
				<?php endwhile; ?>
				</div>
			<?php				
			endif;
			wp_reset_postdata();
			?>
	</section>
	<?php
	echo ob_get_clean();
	}