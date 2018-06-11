<?php
$titre = get_post_meta( 5, CMB_PREFIX.'_newsletter_titre', true);
$soustitre = get_post_meta( 5, CMB_PREFIX.'_newsletter_soustitre', true);
$saisie = get_post_meta( 5, CMB_PREFIX.'_newsletter_saisie', true);
$bouton = get_post_meta( 5, CMB_PREFIX.'_newsletter_bouton', true);
$casecocher = get_post_meta( 5, CMB_PREFIX.'_newsletter_casecocher', true);
$texte = get_post_meta( 5, CMB_PREFIX.'_newsletter_texte', true);
$validation = get_post_meta( 5, CMB_PREFIX.'_newsletter_validation', true);
?>

<section class="newsletter blanc fond-rose-clair">
<form action="https://caelmjc.us18.list-manage.com/subscribe/post?u=b9117d28860fd20534f173e3a&amp;id=08f3cbd38f" method="post" id="cael-embedded-subscribe-form" name="cael-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
		<div id="cael-embed-signup" class="grid-x align-center align-middle">
			<label for="mce-EMAIL" class="cell medium-6 large-3"><h3><?php  echo esc_html( $titre ); ?></h3><?php  echo esc_html( $soustitre ); ?></label>
			<input value="" name="EMAIL" class="email cell medium-6 large-3" id="mce-EMAIL" placeholder="<?php  echo esc_html( $saisie ); ?>" required="" data-cip-id="à modifier" type="email" onclick="jQuery('#newsletter-info').show()">
			
			<div style="position: absolute; left: -5000px;" aria-hidden="true"><input name="modifier" tabindex="-1" value="" data-cip-id="modifier" type="text"></div>
			<input value="<?php  echo esc_html( $bouton ); ?>" name="subscribe"  class="cell medium-6 large-2" id="cael-embedded-subscribe" class="button" onclick="if(!this.form.consent.checked){jQuery('#alerte').show();return false}" type="submit">
			<div id="newsletter-info" class="consentement cell small-12 large-8" style="display:none">
				<input id="consent" name="consent" value="yes" required type="checkbox">
				<label for="consent"><?php  echo esc_html( $casecocher ); ?></label>
				<p id="alerte" style="display:none"><small><?php  echo esc_html( $validation ); ?></small></p>
				<p><small><em><a href="/mentions-legales" style="color:#fff;"><?php  echo esc_html( $texte ); ?></a></em></small></p>
			</div>
    </div>
</form>
</section>