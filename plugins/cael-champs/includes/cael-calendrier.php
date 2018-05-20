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

		<div class="cell large-6 events" >

			<h2 class="titre avec-fond-oblique"> 
			<div class="fond-oblique"></div>				
			<span><?php echo esc_html( $text2 ); ?></span>
			</h2>

			<?php 

			/*

			<?php

			$ind = 0;
			$event_list_array = get_event_list($ind);
			$firstevent = current($event_list_array);
			$firstdate = date_i18n($format . 'n', $firstevent['event_start_unix'] );
			$currentdate= date_timestamp_get(date_create());
			$moisactu = date_i18n($format . 'n', $currentdate );
			$jouractu = date_i18n($format . 'j', $currentdate );

			$annee = 0;
			$mois = 0;
			$jour = 0;
			$cptannee = 0;
			$cptmois = 0;
			$cptjour = 0;
			$idancre = 1;

			if ($moisactu - 2 == $firstdate) {
				$idancremax = 6;
			} else {
				$idancremax = 5;
			}
			


			foreach ($event_list_array as $eventsort) {
				
				$anneeevent = date_i18n($format . 'Y', $eventsort['event_start_unix'] );
				$moisevent = date_i18n($format . 'n', $eventsort['event_start_unix'] );
				$jourevent = date_i18n($format . 'j', $eventsort['event_start_unix'] );

				// Définit si l'on est dans le mois et le jour d'aujourd'hui
				if ($moisevent == $moisactu) {
					$classmois = "calmois calmoisactu";
				} else {
					$classmois = "calmois";
				}

				if ($jourevent == $jouractu && $moisevent == $moisactu) {
					$classjour = 'caljour" id="caljouractu';
				} else {
					$classjour = "caljour";
				}

				// si l'on a une nouvelle année pour la première fois, on ouvre un div
				if ($annee !== $anneeevent && $cptannee == 0 ) {
					$annee = $anneeevent;
					$cptannee = 1;
					?><div class="calannee"><?php
				}

				// si l'on change d'année, on ferme le div de l'année précédent et l'on en ouvre un nouveau
				if ($annee !== $anneeevent && $cptannee == 1 ) {
					$annee = $anneeevent;

					// si le dernier jour du mois est ouvert, on ferme son div
					if ($cptjour == 1) {
						$cptjour = 0;
						?></div><?php
					}

					// si le dernier mois de l'année à fermé est ouvert, on ferme son div
					if ($cptmois == 1) {
						$cptmois = 0;
						?></div><?php
					}

					?></div><div class="calannee"><?php
				}

				// si l'on a un nouveau mois sans div déjà ouvert, on ouvre un div
				if ($mois !== $moisevent && $cptmois == 0 ) {
					$mois = $moisevent;
					$cptmois = 1;
					?><div class="calnommois" id="<?php echo "mois" . $idancre ?>">
						<?php if ($idancre > 1) {
						?>
						<a href="<?php echo "/calendrier/#mois" . ($idancre - 1) ?>"><span class="icon-triangle-right calleft"></span></a>
						<?php }
					echo date_i18n($format . 'F Y', $eventsort['event_start_unix'] );
					if ($idancre < $idancremax) {
					?>
					<a href="<?php echo "/calendrier/#mois" . ($idancre +1) ?>"><span class="icon-triangle-right"></span></a>
					<?php } ?>
					</div><?php
					$idancre = $idancre + 1 ;
					?><div class="grid-x <?php echo $classmois ?>"><?php

				}

				// si l'on change de mois, on ferme le div du mois précédent et on ouvre un nouveau div
				if ($mois !== $moisevent && $cptmois == 1 ) {
					$mois = $moisevent;

					// si le dernier jour du mois est ouvert, on ferme son div
					if ($cptjour == 1) {
						$cptjour = 0;
						?></div><?php
					}
					?></div><div class="calnommois" id="<?php echo "mois" . $idancre ?>">
						<?php if ($idancre > 1) {
						?>
					<a href="<?php echo "/calendrier/#mois" . ($idancre - 1) ?>"><span class="icon-triangle-right calleft"></span></a>
						<?php }
						echo date_i18n($format . 'F Y', $eventsort['event_start_unix'] );
						if ($idancre < $idancremax) {
					?>
					<a href="<?php echo "/calendrier/#mois" . ($idancre + 1) ?>"><span class="icon-triangle-right"></span></a>
					<?php } ?>
					</div><?php
					$idancre = $idancre + 1 ;
					?><div class="grid-x <?php echo $classmois ?>"><?php

				}

				// si l'on a un nouveau jour sans div déjà ouvert, on ouvre un div
				if ($jour !== $jourevent && $cptjour == 0) {
					$jour = $jourevent;
					$cptjour = 1;
					?><div class="cell <?php echo $classjour ?>"><span class="calnomjour"><?php
						echo date_i18n($format . 'l j F', $eventsort['event_start_unix'] );
					?></span><br><?php
				}

				// si l'on change de jour, on ferme son div et on en ouvre un autre
				if ($jour !== $jourevent && $cptjour == 1) {
					$jour = $jourevent;
					?></div><div class="cell <?php echo $classjour ?>"><span class="calnomjour"><?php
						echo date_i18n($format . 'l j F', $eventsort['event_start_unix'] );
					?></span><br><?php
				}
				

				?> <a href= "<?php echo ($eventsort['event_lien']);?>" class="liencal">
				<span class="caltitre"> <?php
				echo $eventsort['event_title'];
				?></span><br><?php
				echo $eventsort['event_niveau'];
				?><br><?php
				echo ('par ' . $eventsort['event_coach'] . ' à');
				echo date_i18n($format . ' G\hi', $eventsort['event_start_unix'] );
				?> </a> <?php

			}

			// si le div du jour en cours est ouvert, on le ferme
			if ($cptjour == 1 ) {
			?></div><?php
			}

			// si le div du mois en cours est ouvert, on le ferme
			if ($cptmois == 1 ) {
				?></div><?php
			}

			// si le div de l'année en cours est ouvert, on le ferme
			if ($cptannee == 1 ) {
				?></div><?php
			}
			?>




			*/




			$currentdate= date_timestamp_get(date_create());

			$args = array(
				'post_type' => 'ajde_events',
				'post_status' => 'publish',
				'posts_per_page' => 14,
				'meta_key' => 'evcal_srow',
				'orderby' => 'meta_value_num',
				'order' => 'ASC'
				);

			$query = new WP_Query( $args );
			$aujourdhui = 0;
			$demain = 0;
			$apresdemain = 0;

			?><div><?php	
			 
			if ( $query->have_posts() ) {
					
				while($query->have_posts()): $query->the_post();

					$IDquery = get_the_ID();
					$terms = wp_get_post_terms( $IDquery, 'event_type');
						
					if(!empty($terms) && !is_wp_error($terms)){
						foreach($terms as $term){
							$current_term_level = get_tax_level($term->term_id, $term->taxonomy);

							if($current_term_level == 3)
							{
								$lien= get_term_link($term);
								$titreevent=$term->name;
								
							}

						}
					};

					if ($titreevent != "") {
					
					

					$niveauevent = get_post_meta( $IDquery, 'evcal_subtitle', true );
					$debut = get_post_meta( $IDquery, 'evcal_srow', true );
						
						if(idate('U', $debut - $currentdate) < 86400 && $aujourdhui == 0)
							{
								?><div class="calaccueil">
								<strong> <?php echo('Aujourd&acute;hui'); ?> </strong> <?php
								$aujourdhui = $aujourdhui + 1 ;
								?> </br> <?php
							}

						elseif (86400 <= idate('U', $debut - $currentdate) && idate('U', $debut - $currentdate) < (86400 * 2) && $demain == 0)
							{
								?></div> <div class="calaccueil"> 
								<strong>	<?php echo('Demain');?> </strong> <?php
								$demain = $demain + 1 ;
								?> </br> <?php
							}

						elseif ((86400 * 2) <= idate('U', $debut - $currentdate) && idate('U', $debut - $currentdate) < (86400 * 3) && $apresdemain == 0)
							{
								?> </div> <div class="calaccueil"> 
									<strong> <?php echo('Après-demain'); ?> </strong> <?php
								$apresdemain = $apresdemain + 1 ;
								?> </br> <?php
							}

						elseif ((86400 * 3) <= idate('U', $debut - $currentdate))
							{
								?> </div> <div class="calaccueil"> 
								<strong> <?php	echo (date_i18n($format . 'l', $debut ) . ' '); ?> </strong> <?php
							}

						?> <a href= "<?php echo ($lien);?>" class="liencal"> <?php
						echo $titreevent;
						echo(' - ');
						echo date_i18n($format . 'G\hi', $debut );
						echo(' > ');
						?> </a> </br> <?php
					}
				endwhile;
			}
			?>
		</div>

		</div>

			<a href="/calendrier/#caljouractu" class="lien-surligne">
			<span>
			<?php  echo esc_html( $text3 ); ?>
					</span>
					<span class="slide-right">
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