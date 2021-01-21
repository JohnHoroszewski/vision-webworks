<?php
/**
 * Template part for displaying page content in single-service.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package envision_web_media
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'service' ); ?>>
    <?php $pBanner = get_field( 'top_banner_image' ); ?>
    <div class="page-banner" style="background-image:url('<?php echo $pBanner[ 'url' ]; ?>');">
        <div class="constrain">
            <div class="big-title big-title-white">Service</div>
        </div>
    </div>
    
    <section class="page-intro p50">
        <div class="constrain">
            <div class="intro-block service-intro flexxed">
                <div class="services-text">
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                    <?php the_field( 'intro_text' ); ?>
                </div>
                <div class="services-image">
                    <?php the_post_thumbnail(); ?>
                </div>
            </div>
        </div><!-- .constrain -->
    </section><!-- .page-intro -->

    <!-- <section class="portfolio-cta-module p50 <?php the_field( 'portfolio_cta_module_background_color' ); ?> <?php the_field( 'second_module_margin' ); ?>"> -->
        <!-- <div class="constrain flexxed"> -->
            <!-- <div class="cta-text"> -->
            <!-- <h3>Want to see some of our most Recent Work?</br> -->
            <!-- Check out our Clients</h3> -->
            <!-- </div> -->
            <!-- <a href="/clients/" class="btn-lg <?php the_field( 'portfolio_cta_module_button_color' ); ?> white-text">Clients</a> -->
        <!-- </div>--><!-- .contrain -->
    <!-- </section> --><!-- .portfolio-cta-module -->

    <section class="service-content p50">
        <div class="constrain">
            <?php the_content(); ?>
        </div><!-- .constrain -->
    </section><!-- .service-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php ewm_cta_module(); ?>