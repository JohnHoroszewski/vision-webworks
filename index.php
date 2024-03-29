<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package envision_web_media
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_singular() ) : ?>
			<?php else : ?>
				<?php $pBanner = get_field( 'top_banner_image', 'option' ); ?>
				<div class="page-banner" style="background-image:url('<?php echo $pBanner[ 'url' ]; ?>');">
					<div class="constrain">
						<div class="big-title big-title-white">In Our Own Words</div>
					</div>
				</div>
					
				<section class="page-intro p50">
					<div class="constrain">
						<div class="intro-block flexxed">
							<h1>
								<?php the_field( 'blog_heading', 'option' ); ?>
							</h1>
							<div class="intro-text">
								<?php the_field( 'blog_intro_text', 'option' ); ?>
							</div>
						</div>
					</div><!-- .constrain -->
				</section><!-- .page-intro -->
			
			<?php endif;
			
			/* Start the Loop */?>
			<?php while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
