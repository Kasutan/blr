<section id="slider">
<?php
$lastposts = get_posts( array(
    'posts_per_page' => 3,
    'category' => '17',
    'meta_key' => 'cael__actualites_ordre1',
    'orderby' => 'meta_value',
    'order'   => 'ASC',
    'post_type'        => 'post',
    'post_status'      => 'publish',
) );

?>

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
            $imageData = wp_get_attachment_image_src($image_id,'banniere');
            $titre=get_the_title($ID);
            $extrait=get_the_excerpt($ID);
            
            $output='';
            $output.='<li class="orbit-slide'.$is_active.'">';
              $output.='<a href="'.$lien.'" >';
                $output.='<figure class="orbit-figure">';
                  $output.='<img class="orbit-image" src="'.$imageData[0].'" alt="'.$titre.'">';
                  $output.='<figcaption class="orbit-caption"><span class="titre">'.$titre.'</span><br/><span>'.$extrait.'<span></figcaption>';
                $output.='</figure>';
              $output.='</a>';
            $output.='</li>';
            echo $output;
            $is_active='';		
          endforeach; 
          wp_reset_postdata();
        }
      ?>
    </ul>
  </div>
  <?php
		if ($cptslides > 1) {
	?>
    <nav class="orbit-bullets">
      <button class="is-active" data-slide="0"><span class="show-for-sr">Premier slide.</span><span class="show-for-sr">Current Slide</span></button>
      <button data-slide="1"><span class="show-for-sr">Second slide.</span></button>
      <?php if ($cptslides > 2) {	?>
        <button data-slide="2"><span class="show-for-sr">Troisième slide.</span></button>
      <?php }	?>
    </nav>
  <?php
		}
	?>
</div>				
</section>