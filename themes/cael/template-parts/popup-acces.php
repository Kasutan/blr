<?php
$event_terms = get_terms(
		'event_type',
		array(
			'orderby'=>'name',
			'parent' => 0,
			'hide_empty'=>false
		)
	);
?>

<div class="reveal" id="acces-direct" data-reveal>
  <p><span class="icon-bolt"></span></p>
  <p>
    <strong class="caps">Accès direct</strong><br>
    vers<br>
    <strong>plus d'activités</strong>
  </p>
  
  <div class="grid-x align-middle align-center">
    <?php 	
    if(!empty($event_terms) && !is_wp_error($event_terms)){
		  foreach($event_terms as $event_term){
        $lien= get_term_link($event_term);
        $titreevent=$event_term->name;
			  $eventid=$event_term->term_id;
			  $imagelien = get_term_meta( $eventid, CMB_PREFIX.'_image', 1 );
        ?>

        <a href= <?php echo ($lien); ?> class="lien">
          <div class="bulle">
		        <figure>
				      <img src=<?php echo ($imagelien); ?> alt=<?php  echo esc_html( $titreevent ); ?>
				      class="picto">
			      </figure>
          </div>
        </a>
		    <?php
		  }
	  };?>
  </div>
  <button class="close-button" data-close aria-label="Fermer la popup" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php wp_reset_postdata(); ?>