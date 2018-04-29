<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cael
 */

get_header();
$post_43 = get_post( 43 ); 
$title = $post_43->post_title;
?>

	<div id="primary" class="content-area">
		<?php
			if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('
			<p id="breadcrumbs" class="small-12 column fil-ariane fond-vert">','</p>
			');
			}
		?>
		<main id="main" class="site-main">
		<h1 class="page-title rose fond-vert-clair">
			<?php echo($title); ?>
		</h1>
		
		<?php if ( have_posts() ) : ?>
		<section class="liste-actus fond-rose-clair blanc">
			<div class="bordure">
				<div class="triangle ">
					<?php previous_posts_link( '<span class="icon-triangle-right"></span><span class="show-for-sr">éléments précédents</span>', 0 );?>
				</div>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class("grid-x"); ?>>
					<div class="cell image">
						<?php the_post_thumbnail( 'thumbnail' ); ?>
					</div>
					<div class="cell texte">	
						<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
						<div class="extrait"><?php the_excerpt(); ?></div>
						<div class="meta"><?php cael_posted_by(); ?>
						<?php echo(' - '); ?>
						<?php the_time('j F Y'); ?></div>
					</div>
				</article><!-- #post-<?php the_ID(); ?> -->
				<?php
			endwhile;

			//the_posts_navigation();
			?>
				<div class="triangle suivant">
					<?php	next_posts_link( '<span class="icon-triangle-right"></span><span class="show-for-sr">suite des éléments</span>', 0 );?>
				</div>
			</div>
		</section>
		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );
		
		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
