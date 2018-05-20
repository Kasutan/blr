<?php
/*
Template Name: Calendrier
*/

get_header();
$ID=get_the_ID();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main eventoncalendar">
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
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
wp_reset_postdata();
get_footer();