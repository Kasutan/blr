<?php	
/*
 *	template pour afficher le détail de la programmation des événements 
 *
 */

get_header();
    
$tax = get_query_var( 'taxonomy' );
$term_name = get_query_var( 'term' );
$term = get_term_by( 'slug', $term_name, $tax );
$ID = $term->term_id;

$textepartage = get_term_meta( $ID, CMB_PREFIX.'_speaker_partage', 1 );
$textelocalisation = get_term_meta( $ID, CMB_PREFIX.'_speaker_adresse', 1 );
$texteresa = get_term_meta( $ID, CMB_PREFIX.'_speaker_resa', 1 );

$args = array(
    'post_type' => 'ajde_events',
    'tax_query' => array(
            array(
                'taxonomy' => 'event_speaker',
                'terms'    => $ID,
            ),
        ),
    );

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
    $query->the_post();
    $IDevent = get_the_id();  
    $speakers = get_post_meta( $IDevent, '_sch_blocks', true );
    $location_terms = wp_get_post_terms($IDevent, 'event_location');
    $term_loc=$location_terms[0]->slug;
    }	

    $term_location = evo_get_term_meta( 'event_location',$location_terms[0]->term_id );

    $termMeta = get_option( "evo_tax_meta");
    $termmeta2 = evo_get_term_meta('event_speaker',$ID, $termMeta);

?>
<section>
    <div>
        <?php echo wp_get_attachment_image($termmeta2["evo_spk_img"], 'thumbnail' );?>
    </div>

    <div>
        <div>
            <?php if(!empty($speakers) && !is_wp_error($speakers)){
                    foreach($speakers as $speaker){
                        foreach($speaker as $key => $content) {
                            if ($key!=0) {
                                $cleterm = key($content["evo_sch_spk"]);		
 
                                if($cleterm == $ID){
                                    echo '<strong>'.$content["evo_sch_title"].'<br>';
                                    echo $termmeta2["evo_speaker_title"].'<br>';
                                    echo $content["evo_sch_date"].' - '.$content["evo_sch_stime"].'</strong>'.'<br>';
                                    echo $term->description;
                                    $resa = $content["evo_sch_desc"];
                                }
                            }
                        }
                    }
                };       
                ?>
        </div>
        <div>
            <?php echo ($textepartage);
            echo '<a href="https://www.facebook.com/sharer/sharer.php?u='.str_replace(":", "%3A", get_term_link($ID)).'">';
            echo '<span class="icon-facebook"></span></a>';
            echo '<a href="https://twitter.com/home?status='.str_replace(":", "%3A", get_term_link($ID)).'">';
            echo '<span class="icon-twitter"></span></a>';
            echo '<a href=mailto:?&body='.str_replace(":", "%3A", get_term_link($ID)).'">';
            echo '<span class="icon-mail"></span></a>';
            ?>
            
        </div>

    </div>
</section>

<section>
    <div>
        <?php echo ($textelocalisation);?><br>
        <p>
            <?php echo ($location_terms[0]->name);?><br>
            <?php echo ($term_location["location_address"]);?><br>
            <?php echo ($term_location["location_city"]);?>
        </p>
    </div>
    <div>
        <?php echo ($texteresa);?>
        <br>
        <p>
            <?php echo ($resa);?>
        </p>
    </div>
</section>

<?php
get_footer(); ?>