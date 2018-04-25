<form action="code mailchimp spécifique" method="post" id="cael-embedded-subscribe-form" name="cael-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
    <div id="cael-embed-signup" class="grid-x align-center">
		<label for="mce-EMAIL"><h3>La Newsletter</h3><br>pour ne plus rien rater</label>
		<input value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="votre adresse mail" required="" data-cip-id="à modifier" type="email" onclick="jQuery('#newsletter-info').show()">
		
	   <div style="position: absolute; left: -5000px;" aria-hidden="true"><input name="modifier" tabindex="-1" value="" data-cip-id="modifier" type="text"></div>
	   <input value="s'abonner" name="subscribe" id="cael-embedded-subscribe" class="button" onclick="if(!this.form.consent.checked){jQuery('#alerte').show();return false}" type="submit">
	   <div id="newsletter-info" class="consentement cell small-12" style="display:none">
			<input id="consent" name="consent" value="yes" required type="checkbox">
			<label for="consent">J'accepte de recevoir la newsletter. </label>
			<p id="alerte" style="display:none"><small>Merci de confirmer votre accord.</small></p>
			<p><small><em><a href="/mentions-legales" style="color:#fff;">Information sur l'utilisation de vos données</a></em></small></p>
		</div>
    </div>
</form>