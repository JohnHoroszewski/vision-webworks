<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package envision_web_media
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php $pBanner = get_field( 'top_banner_image' ); ?>
    <div class="page-banner" style="background-image:url('<?php echo $pBanner[ 'url' ]; ?>');">
        <div class="constrain">
            <div class="big-title big-title-white"><?php the_title(); ?></div>
        </div>
    </div>
    
    <section class="page-intro p50">
        <div class="constrain">
            <div class="intro-block flexxed">
                <h1>
                    <?php the_field( 'intro_title' ); ?>
                </h1>
                <div class="intro-text">
                    <?php the_field( 'intro_text' ); ?>
                </div>
            </div>
        </div><!-- .constrain -->
    </section><!-- .page-intro -->

	<section class="page-content p50">
		<div class="constrain">
			<?php the_content(); ?>
		</div>
	</section>

</article><!-- #post-<?php the_ID(); ?> -->

<?php ewm_cta_module(); ?>
