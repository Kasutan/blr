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
		<main id="main" class="site-main">
		<h1>
			<?php echo($title); ?>
		</h1>
		
		<?php if ( have_posts() ) : ?>
			<?php

			previous_posts_link( 'éléments précédents > ', 0 );
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div>
						<?php the_post_thumbnail( 'thumbnail' ); ?>
					</div>
					<div>	
						<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
						<?php the_excerpt(); ?>
						<?php cael_posted_by(); ?>
						<?php echo(' - '); ?>
						<?php the_time('j F Y'); ?>
					</div>
				</article><!-- #post-<?php the_ID(); ?> -->
				<?php
			endwhile;

			//the_posts_navigation();
			next_posts_link( 'suite des éléments > ', 0 );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
