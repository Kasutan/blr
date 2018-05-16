jQuery(function ($) {
	$(document).ready(function () {

		/* Filtre des activités par âge*/

		$("#filtre").submit(function (event) {
			event.preventDefault();
			return false;
		});

		var liens = $('.liste-activites .lien');
		$("#filtre input:radio").change(function () {
			var value = $("#filtre input[type='radio']:checked").val();
			liens.removeClass('inactif');
			if (value == "enfant") {
				liens.not('.enfant').addClass('inactif');
			} else if (value == 'adulte') {
				liens.not('.adulte').addClass('inactif');
			}
		});

		$('#filtre #age').on('keyup change', function () {
			var age = $(this).val();

			liens.removeClass('inactif');
			if (age >= 18) {
				liens.not('.adulte').addClass('inactif');
			} else if (age > 0) {
				liens.not('.' + age).addClass('inactif');
			}
		});

		/*Affichage initial page calendrier*/
		var caljouractu = $('#caljouractu');
		var calmoisactu =  $('.calmoisactu');
		if (caljouractu.length && caljouractu.length) {
			$('.calnommois, .calmois').hide(); // On cache tous les mois et leurs noms
			calmoisactu.show(); // On affiche le contenu du mois ciblé
			calmoisactu.prev().show(); // On affiche le nom du mois ciblé 
			//On scrolle jusqu'au jour actuel
			var position = caljouractu.offset().top - 150; // Décalage pour tenir compte du header sticky
			$('html, body').animate({
				scrollTop: position
			}, 1000);
			
			caljouractu.focus(); // Setting focus
			if (caljouractu.is(":focus")){ // Checking if the caljouractu was focused
				return false;
			} else {
				caljouractu.attr('tabindex','-1'); // Adding tabindex for elements not focusable
				caljouractu.focus(); // Setting focus
			};
		}

		/*Smooth scroll vers ancres et cas particulier des mois du calendrier*/
		$('a[href*="#"]:not([href="#"])').click(function () {
			if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
				if (target.length) {
					if (target.selector.match('^#mois')) {
						/*On est sur la page calendrier et on vise un mois*/
						$('.calnommois, .calmois').hide(); // On cache tous les mois et leurs noms
						target.show(); // On affiche le nom du mois ciblé 
						target.next().show(); // On affiche le contenu du mois ciblé
					} else {
						//Smooth scroll habituel
						var position = target.offset().top - 112; // Décalage pour tenir compte du header sticky
						$('html, body').animate({
							scrollTop: position
						}, 1000);
					}
					target.focus(); // Setting focus
					if (target.is(":focus")) { // Checking if the target was focused
						return false;
					} else {
						target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
						target.focus(); // Setting focus
					};
					return false;
				}
			}
		});
	});
});