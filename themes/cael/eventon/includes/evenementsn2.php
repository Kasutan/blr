<?php 
	setlocale(LC_ALL, 'fra');
	$tax = get_query_var( 'taxonomy' );
	$term_name = get_query_var( 'term' );
	$term = get_term_by( 'slug', $term_name, $tax );
	$ID = $term->term_id;

	$args = array(
		'post_type' => 'ajde_events',
		'tax_query' => array(
				array(
					'taxonomy' => 'event_type_2',
					'terms'    => $ID,
				),
			),
		);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		$query->the_post();
		$IDevent = get_the_id();
		
		$textelien  = get_post_meta( $IDevent, CMB_PREFIX.'_events_lien', true );
		$lienpdf  = get_post_meta( $IDevent, CMB_PREFIX.'events_pdf', true );
		$idimagepdf  = get_post_meta( $IDevent, CMB_PREFIX.'events_image_id', true );
		$citation = get_post_meta( $IDevent, 'evcal_subtitle', true );
		$titreprog = get_post_meta( $IDevent, '_evcal_ec_f1a1_cus', true );
		$titrehisto = get_post_meta( $IDevent, '_evcal_ec_f2a1_cus', true );
		$textehisto = get_post_meta( $IDevent, '_evcal_ec_f3a1_cus', true );
		$titreprece = get_post_meta( $IDevent, '_evcal_ec_f4a1_cus', true );
		$speakers = get_post_meta( $IDevent, '_sch_blocks', true );
		$idphoto1  = get_post_meta( $IDevent, CMB_PREFIX.'photoeven_1_id', true );
		$idphoto2  = get_post_meta( $IDevent, CMB_PREFIX.'photoeven_2_id', true );
		$idphoto3  = get_post_meta( $IDevent, CMB_PREFIX.'photoeven_3_id', true );
		$idphoto4  = get_post_meta( $IDevent, CMB_PREFIX.'photoeven_4_id', true );
		$idphoto5  = get_post_meta( $IDevent, CMB_PREFIX.'photoeven_5_id', true );
		$idphoto6  = get_post_meta( $IDevent, CMB_PREFIX.'photoeven_6_id', true );
		}	

	?>

	<main id="main" class="site-main ev2">

		

	<header class="entry-header ">
		<nav class = "ancres">
			<a href="#festival">
				<?php the_title(); ?>
			</a>
			<a href="#programmation">
				<?php echo esc_html( $titreprog ); ?>
			</a>
			<a href="#histoire">
				<?php echo esc_html( $titrehisto ); ?>
			</a>
		</nav>
		<h1 class="show-for-sr">
			<?php the_title(); ?>
		</h1>
		<?php echo get_the_post_thumbnail( $IDevent, 'large' ); ?>
	</header><!-- .entry-header -->

	<section id="festival" class="grid-x">
		<div class="image cell small-12 medium-4">
			<h2 class="titre blanc fond-rose-clair">
				<?php the_title(); ?>
			</h2>
			<a href="<?php echo ($lienpdf); ?>">
				<figure>
					<?php echo wp_get_attachment_image($idimagepdf, 'medium' ); ?>
					<figcaption><?php  echo esc_html( $textelien ); ?></figcaption>
				</figure>
        	</a>
		</div>
		<div class="fond-vert-clair texte cell small-12 medium-8">
			<blockquote class="vert">
				<span class="icon-quote-left"></span>
				<div><?php echo esc_html( $citation ); ?></div>
				<span class="icon-quote-right"></span>				
			</blockquote>
			<div class="rose-clair">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<section id="programmation">
		<h2 class="titre blanc fond-rose-clair">
			<?php echo esc_html( $titreprog ); ?>
		</h2>
		
		<div class="liste-spectacles grid-x align-justify wrap align-stretch">
			<?php 	
			if(!empty($speakers) && !is_wp_error($speakers)){
				foreach($speakers as $speaker){
					foreach($speaker as $key => $content) {
						if ($key!=0) {

							$cleterm = key($content["evo_sch_spk"]);	
								
							$termMeta = get_option( "evo_tax_meta");
							$termmeta2 = evo_get_term_meta('event_speaker',$cleterm, $termMeta);
							$speaker_link = get_term_link( $cleterm );
							echo '<a href='.$speaker_link.'>';
							echo wp_get_attachment_image($termmeta2["evo_spk_img"], 'thumbnail' );
							echo '<p><strong>'.$content["evo_sch_title"].'<br>';
							echo $termmeta2["evo_speaker_title"].'</strong><br><small>';
							echo $content["evo_sch_date"].' - '.$content["evo_sch_stime"].'</small></p></a>';
						}
					}
				}
			};?>
		</div>
	</section>
	<section id="galerie" class="galerie grid-x align-center">
			<?php echo '<div class="cell small-6 medium-4">'.wp_get_attachment_image($idphoto1, 'medium' ).'</div>'; ?>
			<?php echo '<div class="cell small-6 medium-4">'.wp_get_attachment_image($idphoto2, 'medium' ).'</div>'; ?>
			<?php echo '<div class="cell small-6 medium-4">'.wp_get_attachment_image($idphoto3, 'medium' ).'</div>'; ?>
			<?php echo '<div class="cell small-6 medium-4">'.wp_get_attachment_image($idphoto4, 'medium' ).'</div>'; ?>
			<?php echo '<div class="cell small-6 medium-4">'.wp_get_attachment_image($idphoto5, 'medium' ).'</div>'; ?>
			<?php echo '<div class="cell small-6 medium-4">'.wp_get_attachment_image($idphoto6, 'medium' ).'</div>'; ?>
	</section>

	<section id="histoire">
		<h2 class="titre blanc fond-rose-clair">
			<?php echo esc_html( $titrehisto ); ?>
		</h2>
		<div class="vert">
			<?php echo wpautop( wp_kses_post(( $textehisto ))); ?>
		</div>
	</section>

	<section id="editions">
		<h2  class="titre blanc fond-rose-clair">
			<?php echo esc_html( $titreprece ); ?>
		</h2>
		<p>Historique à récupérer</p>
		
		<div class="fond-vert-clair grid-x liste-editions">
			<a href="#">2016</a>
			<a href="#">2015</a>
			<a href="#">2014</a>
			
		</div>
	</section>


		<?php get_template_part( 'template-parts/newsletter' ); ?>

	</main>
<?php	wp_reset_postdata();?>