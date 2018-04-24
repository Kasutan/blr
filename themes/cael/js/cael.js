jQuery(function ($) {
	$(document).ready(function(){
	
	/* Filtre des activités par âge*/

	$("#filtre").submit(function( event ) {
		event.preventDefault();
		return false;
	});

	var liens = $('.liste-activites .lien');
	$("#filtre input:radio").change(function(){
		var value = $("#filtre input[type='radio']:checked").val();
		liens.removeClass('inactif');
		if(value=="enfant") {
			liens.not('.enfant').addClass('inactif');
		} else if (value=='adulte') {
			liens.not('.adulte').addClass('inactif');			
		}
	});

	$('#filtre #age').on('keyup change',function(){
		var age=$(this).val();
		
		liens.removeClass('inactif');
		if(age>=18) {
			liens.not('.adulte').addClass('inactif');
		} else if (age>0) {
			liens.not('.'+age).addClass('inactif');			
		}		
	});		
  });
});