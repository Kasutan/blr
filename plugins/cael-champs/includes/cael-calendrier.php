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
				'posts_per_page' => 5,
				'category' => '18',
				'meta_key' => 'cael__actualites_ordre2',
				'orderby' => 'meta_value',
				'order'   => 'ASC',
				'post_type'        => 'post',
				'post_status'      => 'publish',
			) );
	
	
	$ID=get_the_ID();
	ob_start();
	$text  = get_post_meta( $ID, CMB_PREFIX.'_accueil_lien_actualites', true );
	$text1  = esc_html(get_post_meta( $ID, CMB_PREFIX.'_accueil_actualites', true ));
	$text2  = get_post_meta( $ID, CMB_PREFIX.'_accueil_calendrier', true );
	$text3  = get_post_meta( $ID, CMB_PREFIX.'_accueil_lien_calendrier', true );
	?>
	<section id="calendrier" class="grid-x align-top align-center">
		<div class="cell large-6 events">
			<h2 class="titre avec-fond-oblique"> 
			<div class="fond-oblique"></div>				
			<span><?php echo esc_html( $text2 ); ?></span>
			</h2>
			<?php echo do_shortcode('[add_eventon_list event_count="3" hide_month_headers="yes" ft_event_priority="yes"]'); ?>
			<a href="/events-directory" class="lien-surligne">
			<span>
			<?php  echo esc_html( $text3 ); ?>
					</span>
			</a>
		</div>
		<div class="slider cell large-6">
			<h2 class="titre show-for-sr">
				<?php  

				echo $text1; ?>
			</h2>
			<div class="orbit" role="region" aria-label="Actualités" data-orbit>
				<div class="orbit-wrapper">
					<ul class="orbit-container">
						<?php
						
						if ( $lastposts ) {
							$is_active=' is_active';
								foreach ( $lastposts as $post ) :
									$ID=$post->ID;
									$lien= get_the_permalink($ID);
									$image_id=get_post_thumbnail_id( $post );
									$imageData = wp_get_attachment_image_src($image_id,'actu');
									$titre=get_the_title($ID);
									$extrait=get_the_excerpt($ID);
									
									$output='';
									$output.='<li class="orbit-slide'.$is_active.'">';
									$output.='<a href="'.$lien.'">';
									$output.='<figure class="orbit-figure">';
									$output.='<img class="orbit-image" src="'.$imageData[0].'" alt="'.$titre.'">';
									$output.='<figcaption class="orbit-caption"><span class="h2">'.$text1.'</span><br><span class="titre">'.$titre.'</span><br><span class="extrait">'.$extrait.'</span><br><span class="lien">'.$text.' > </span></figcaption>';
									$output.='</figure>';
									$output.='</a>';
									$output.='</li>';
									echo $output;
									$is_active='';		
								endforeach; 
	
						}
						?>
					</ul>
				</div>
				<nav class="orbit-bullets">
					<button class="is-active" data-slide="0"><span class="show-for-sr">Première slide.</span><span class="show-for-sr">Slide actuelle</span></button>
					<button data-slide="1"><span class="show-for-sr">Deuxième slide.</span></button>
					<button data-slide="2"><span class="show-for-sr">Troisième slide.</span></button>
					<button data-slide="3"><span class="show-for-sr">Quatrième slide.</span></button>
					<button data-slide="4"><span class="show-for-sr">Cinquième slide.</span></button>
				</nav>
			</div>			
		</div>
	</section>
	<?php
	wp_reset_postdata();
    echo ob_get_clean();
}