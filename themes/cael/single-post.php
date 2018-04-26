<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cael
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
			the_post();
			?>
			<header>
				<?php the_post_thumbnail( 'large' ); ?>
				<h1>
					<?php the_title(); ?>
				</h1>
			</header>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
						<?php the_excerpt(); ?>
						<?php cael_posted_by(); ?>
						<?php echo(' - '); ?>
						<?php the_time('j F Y'); ?>
						<?php the_content(); ?>
				</article><!-- #post-<?php the_ID(); ?> -->
			<?php

			the_post_navigation( array(
				'prev_text'                  => __( '< Actualité précédente' ),
				'next_text'                  => __( 'Actualités suivante >' ),
			) );

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
