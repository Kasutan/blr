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
			if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('
			<p id="breadcrumbs" class="small-12 column fil-ariane fond-vert">','</p>
			');
			}
		?>
		<?php
			the_post();
			?>
			<header class="entry-header">
				<?php the_post_thumbnail( 'banniere' ); ?>
				<h1 class="entry-title blanc fond-rose-fonce">
					<?php the_title(); ?>
				</h1>
				<div class="fond fond-vert-clair"></div>
			</header>
			<article id="post-<?php the_ID(); ?>" <?php post_class("blanc fond-rose-clair"); ?>>

						<?php the_title( '<p class="titre">', '</p>' ); ?>
						<div class="extrait"><?php the_excerpt(); ?></div>
						<div class="meta"><?php cael_posted_by(); ?>
						<?php echo(' - '); ?>
						<?php the_time('j F Y'); ?></div>
						<div class="contenu"><?php the_content(); ?></div>
				</article><!-- #post-<?php the_ID(); ?> -->
			<?php

			the_post_navigation( array(
				'prev_text'                  => __( '< Actualité précédente' ),
				'next_text'                  => __( 'Actualité suivante >' ),
			) );

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
