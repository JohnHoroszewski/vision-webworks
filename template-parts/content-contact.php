<?php
/**
 * Template part for displaying page content in contact-templatge.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package envision_web_media
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'contact' ); ?>>
    <?php $pBanner = get_field( 'top_banner_image' ); ?>
    <div class="page-banner" style="background-image:url('<?php echo $pBanner[ 'url' ]; ?>');">
        <div class="constrain">
            <div class="big-title big-title-white">Contact Us</div>
        </div>
    </div>
    
    <section class="page-intro p50">
    <div class="constrain">
        <div class="intro-block">
            <h1>
                <?php the_field( 'intro_title' ); ?>
            </h1>
            <div class="intro-text">
                <?php the_field( 'intro_text' ); ?>
            </div>
            <div class="contact-blocks flexxed">
            <div class="c-block">
                <h3>Find Us</h3>
                <div class="contact-item"><?php echo get_theme_mod( 'theme_company_street' ); ?></div>
                <div class="contact-item"><?php echo get_theme_mod( 'theme_company_city' ); ?>, <?php echo get_theme_mod( 'theme_company_state' ); ?> <?php echo get_theme_mod( 'theme_company_zip' ); ?></div>
            </div>
            <div class="c-block">
                <h3>Contact Us</h3>
                <div class="contact-item"><a href="tel:<?php echo get_theme_mod( 'theme_company_phone' ); ?>"><?php echo get_theme_mod( 'theme_company_phone' ); ?></a></div>
                <div class="contact-item"><a href="mailto:<?php echo get_theme_mod( 'theme_company_email' ); ?>"><?php echo get_theme_mod( 'theme_company_email' ); ?></a></div>
            </div>
            <div class="c-block">
                <h3>Connect with Us</h3>
                <?php social_media_list(); ?>
            </div>
        </div>
        </div>
    </div>
</section>

    <section class="contact-content p50">
        <div class="constrain">
            <div class="contact-form">
                <?php the_content(); ?>
            </div>
        </div><!-- .constrain -->
    </section><!-- .service-content -->

    <section class="gmap">
        <?php echo get_theme_mod( 'theme_company_gmap' ); ?>
    </section>
</article><!-- #post-<?php the_ID(); ?> -->

<?php ewm_port_cta_module(); ?>
