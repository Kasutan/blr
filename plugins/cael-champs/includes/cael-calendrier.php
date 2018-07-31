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

			// on va chercher la liste des événements pour les 5 prochains jours
			$ind = 1;
			$event_list_array = get_event_list($ind);

			// on va chercher la liste des featured events
			$event_featured_array = get_featured_list();

			// on récupère le jour du serveur
			$jourcourant = date("z");
			$anneecourante = date("y");
			$nbjours = $jourcourant + ($anneecourante * 365);

			// on récupère le premier événement
			$firstevent = current($event_list_array);
			$firstdatej = date_i18n($format . 'z', $firstevent['event_start_unix'] );
			$firstdatea = date_i18n($format . 'y', $firstevent['event_start_unix'] );
			$firstnbjours = $firstdatej + ($firstdatea * 365);

			// on initialise les variables
			$cptjour = 0; //indique si un div est ouvert
			$journum = 0; //numérote les jour de 1 à 5
			$cptecrit = 0; //nombre de lignes écrites (on limite à 14 pour la mise en page)

			// On commence par gérer les featured events
			if(!empty($event_featured_array) && !is_wp_error($event_featured_array)){
				// si l'on a un featured event à venir
				$cptecrit = $cptecrit + 1;
				?><div class="calfeat">
				<strong> <?php echo('Prochainement'); ?> </strong> 
				</br> <?php
				
				foreach ($event_featured_array as $eventfeat) {

					$anneeevent = date_i18n($format . 'y', $eventfeat['event_start_unix'] );
					$moisevent = date_i18n($format . 'm', $eventfeat['event_start_unix'] );
					$jourevent = date_i18n($format . 'z', $eventfeat['event_start_unix'] );
					$nomjourevent = date_i18n($format . 'l', $eventfeat['event_start_unix'] );
					$numjourevent = $jourevent + ($anneeevent * 365);

					$anneefinevent = date_i18n($format . 'y', $eventfeat['event_end_unix'] );
					$moisfinevent = date_i18n($format . 'm', $eventfeat['event_end_unix'] );
					$jourfinevent = date_i18n($format . 'z', $eventfeat['event_end_unix'] );
					$numjourfinevent = $jourfinevent + ($anneefinevent * 365);

					if ($numjourfinevent > $nbjours - 1) {
						?>
						<a href= "<?php echo ($eventfeat['event_lien']);?>" class="liencal">
						<?php
						echo $eventfeat['event_title'];

						if ($numjourfinevent == $numjourevent ) {
							echo(' le ');
							echo date_i18n($format . ' d F', $eventfeat['event_start_unix'] );
						} elseif ($moisevent == $moisfinevent) {
							echo(' du ');
							echo date_i18n($format . ' d', $eventfeat['event_start_unix'] );
							echo(' au ');
							echo date_i18n($format . ' d F', $eventfeat['event_end_unix'] );
						} else {
							echo(' du ');
							echo date_i18n($format . ' d F', $eventfeat['event_start_unix'] );
							echo(' au ');
							echo date_i18n($format . ' d F', $eventfeat['event_end_unix'] );
						}
						echo(' > ');
						?> </a> </br> <?php
						$cptecrit = $cptecrit + 1;

						if ($cptecrit > 15) {
							break;
						}
					}
				}
				?> </div> <?php
			}

			// si le premier jour n'est pas celui d'aujourd'hui, on prend en compte les jours fermés
			if ($nbjours < $firstnbjours) {
				// la journée d'aujourd'hui est fermée
				?><div class="calaccueil">
				<strong> <?php echo('Aujourd&acute;hui'); ?> </strong> <?php
				?> </br> 
				<span>Fermé</span>
				</br> </div>
				<?php
				$journum = $journum + 1; // on passe à demain
				$cptecrit = $cptecrit + 2;
			
				if ($nbjours + 1 < $firstnbjours) {
					// la journée de demain est fermée également
					?><div class="calaccueil">
					<strong> <?php echo('Demain'); ?> </strong> <?php
					?> </br> 
					<span>Fermé</span>
					</br> </div>
					<?php
					$journum = $journum + 1; // on passe à après-demain
					$cptecrit = $cptecrit + 2;

					if ($nbjours + 2 < $firstnbjours) {
						// la journée de d'après demain est fermée également
						?><div class="calaccueil">
						<strong> <?php echo('Après-demain'); ?> </strong> <?php
						?> </br> 
						<span>Fermé</span>
						</br> </div>
						<?php
						$journum = $journum + 1; // on passe à après après-demain
						$cptecrit = $cptecrit + 2;

					}
				}
			}
			
			// pour chaque événement
			foreach ($event_list_array as $eventsort) {
				
				$anneeevent = date_i18n($format . 'y', $eventsort['event_start_unix'] );
				$jourevent = date_i18n($format . 'z', $eventsort['event_start_unix'] );
				$nomjourevent = date_i18n($format . 'l', $eventsort['event_start_unix'] );
				$numjourevent = $jourevent + ($anneeevent * 365);

				// si l'on a le premier événement d'aujourd'hui, on ouvre un div
				if ($numjourevent == $nbjours && $cptjour == 0 && $journum == 0) {
					$cptjour = 1;
					$journum = 1;
					$cptecrit = $cptecrit + 1;
					?><div class="calaccueil">
					<strong> <?php echo('Aujourd&acute;hui'); ?> </strong> 
					 </br> <?php
				}

				// si l'on change de jour, on ferme le div du jour précédent et l'on en ouvre un nouveau
				if ($numjourevent == $nbjours + 1 && $journum == 1 ) {
					$journum = 2;

					// si le dernier jour est ouvert, on ferme son div
					if ($cptjour == 1) {
						$cptjour = 0;
						?></div><?php
					}

					?><div class="calaccueil"> 
					<strong>	<?php echo('Demain');?> </strong> 
					</br> <?php
					$cptjour = 1;
					$cptecrit = $cptecrit + 1;
				}

				// si l'on change de jour, on ferme le div du jour précédent et l'on en ouvre un nouveau
				if ($numjourevent == $nbjours + 2 && $journum == 2 ) {
					$journum = 3;

					// si le dernier jour est ouvert, on ferme son div
					if ($cptjour == 1) {
						$cptjour = 0;
						?></div><?php
					}

					?><div class="calaccueil"> 
					<strong>	<?php echo('Après-demain');?> </strong> 
					</br> <?php
					$cptjour = 1;
					$cptecrit = $cptecrit + 1;
				}				

				// si l'on change de jour, on ferme le div du jour précédent et l'on en ouvre un nouveau
				if ($numjourevent == $nbjours + $journum ) {
					$journum = $journum + 1;

					// si le dernier jour est ouvert, on ferme son div
					if ($cptjour == 1) {
						$cptjour = 0;
						?></div><?php
					}

					?><div class="calaccueil"> 
					<strong>	<?php echo($nomjourevent);?> </strong> 
					</br> <?php
					$cptjour = 1;
					$cptecrit = $cptecrit + 1;
				}	


				?> <a href= "<?php echo ($eventsort['event_lien']);?>" class="liencal">
				<?php
				echo $eventsort['event_title'];
				echo(' - ');
				echo date_i18n($format . ' G\hi', $eventsort['event_start_unix'] );
				echo(' > ');
				?> </a> </br> <?php
				$cptecrit = $cptecrit + 1;

				if ($cptecrit > 15) {
					break;
				}

			}

			// si le div du jour en cours est ouvert, on le ferme
			if ($cptjour == 1 ) {
			?></div><?php
			}

		?>

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
						
						$cptslides = 0;
						if ( $lastposts ) {
							$is_active=' is_active';
								foreach ( $lastposts as $post ) :
									$ID=$post->ID;
									$cptslides = $cptslides + 1;
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
									$output.='<figcaption class="orbit-caption"><span class="h2">'.$text1.'</span><span class="titre">'.$titre.'</span><span class="extrait">'.$extrait.'</span><span class="lien">'.$text.' > </span></figcaption>';
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

				<?php
				if ($cptslides > 1) {
				?>
				<nav class="orbit-bullets">
					<button class="is-active" data-slide="0"><span class="show-for-sr">Première slide.</span><span class="show-for-sr">Slide actuelle</span></button>
					<button data-slide="1"><span class="show-for-sr">Deuxième slide.</span></button>

				<?php if ($cptslides > 2) {	?>
					<button data-slide="2"><span class="show-for-sr">Troisième slide.</span></button>
				<?php }	?>

				<?php if ($cptslides > 3) {	?>
					<button data-slide="3"><span class="show-for-sr">Quatrième slide.</span></button>
				<?php }	?>

				<?php if ($cptslides > 4) {	?>
					<button data-slide="4"><span class="show-for-sr">Cinquième slide.</span></button>
				<?php }	?>
				</nav>

				<?php
				}
				?>

			</div>			
		</div>
	</section>
	<?php
	wp_reset_postdata();
    echo ob_get_clean();
}