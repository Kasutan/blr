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
$textetarif = get_term_meta( $ID, CMB_PREFIX.'_speaker_tarifs', 1 );
$titreresa = get_term_meta( $ID, CMB_PREFIX.'_speaker_resa_titre', 1 );
$texteresa = get_term_meta( $ID, CMB_PREFIX.'_speaker_resa_texte', 1 );
$textelienresa = get_term_meta( $ID, CMB_PREFIX.'_speaker_resa_texte_lien', 1 );
$pdfidresa  = get_term_meta( $ID, CMB_PREFIX.'_speaker_resa_fichier', true );

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
<main id="main" class="site-main speaker">
    <?php
		if ( function_exists('yoast_breadcrumb') ) {
		    yoast_breadcrumb('
		    <p id="breadcrumbs" class="small-12 column fil-ariane fond-vert">','</p>
		    ');
		}
	?>
    
<section class="grid-x align-center align-stretch contenu">
    <div class="show-for-large cell large-2"></div>    
    <div class="image cell small-12 medium-5 large-3">
        <div class="tramage"></div>
        <?php echo wp_get_attachment_image($termmeta2["evo_spk_img"], 'medium' );?>
    </div>
    <div class="show-for-medium cell medium-1"></div>
    <div class="texte cell small-12 medium-6 large-4">
        <div class="vert">
            <?php if(!empty($speakers) && !is_wp_error($speakers)){
                foreach($speakers as $speaker){
                    foreach($speaker as $key => $content) {
                        if ($key!=0) {
                            $cleterm = key($content["evo_sch_spk"]);		
                            if($cleterm == $ID){
                                    echo '<h1>'.$content["evo_sch_title"].'</h1>';
                                    echo '<h2>'.$termmeta2["evo_speaker_title"].'</h2>';
                                    echo '<p>'.$content["evo_sch_date"].' - '.$content["evo_sch_stime"].'</p>';
                                    echo  wpautop( wp_kses_post($term->description));
                                    $resa = $content["evo_sch_desc"];
                                }
                            }
                        }
                    }
                }       
                ?>
        </div>
        <div class="rose partage">
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
    <div class="show-for-large cell large-2"></div>
</section>

<section class="pratique grid-x align-stretch align-center fond-rose-clair blanc">
    <div class="cell small-12 medium-6">
        <h2><?php echo ($textelocalisation);?></h2>
        <div class="encadre">
            <span><?php echo ($location_terms[0]->name);?></span><br>
            <?php echo ($term_location["location_address"]);?><br>
            <?php echo ($term_location["location_city"]);?>
            </div>
        <?php if (!empty($textetarif)){ ?>
            <div class="encadre tarifs">
                <?php echo wpautop(wp_kses_post($textetarif));?>
            </div>
        <?php } ?>
    </div>
    <div class="cell small-12 medium-6">
        <h2><?php echo ($titreresa);?></h2>
        <div class="encadre resa">
            <?php echo wpautop(wp_kses_post($texteresa));?>
            <a href="<?php echo ($pdfidresa);?>"><?php echo ($textelienresa);?></a>
        </div>
    </div>
</section>
<?php get_template_part( 'template-parts/newsletter' ); ?>
<?php
get_footer(); ?>