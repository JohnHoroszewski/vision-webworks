<?php
/**
 * Template part for displaying page content in clients-template.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Clever_Fox_Media
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php $pBanner = get_field( 'top_banner_image' ); ?>
    <div class="page-banner" style="background-image:url('<?php echo $pBanner[ 'url' ]; ?>');">
        <div class="constrain">
            <div class="big-title">Services</div>
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

    <section class="services-list p50">
        <div class="constrain">

            <?php
                query_posts( array( 'post_type' => 'service', 'orderby' => 'menu_order', 'showposts' => -1 ) ); ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="service-item flexxed">
                        <div class="service-content-container">
                            <div class="service-content">
                                <h2><?php the_title(); ?></h2>
                                <p>
                                    <?php the_excerpt(); ?>
                                </p>
                                <a class="btn-lg accent-bg" href="<?php the_permalink(); ?>">Read More</a>
                            </div>
                        </div>
                        <div class="service-image">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        </div><!-- .constrain -->
    </section><!-- .services-list -->
</article><!-- #post-<?php the_ID(); ?> -->
<section class="cta-module parallax <?php the_field( 'module_margin' ); ?>" style="background-image:url( '<?php echo get_theme_mod( 'theme_cta_background_image' ); ?>' );">
    <div class="constrain flexxed">

        <div class="cta-content p50">
            <h3><?php echo get_theme_mod( 'theme_cta_heading' ); ?></h3>
            <div class="text-block">
                <?php echo get_theme_mod( 'theme_cta_text' ); ?>
            </div>
        </div>

        <div class="cta-btn-block <?php the_field( 'contact_cta_module_background_color' ); ?>">
            <div class="cta-snippet">
                <?php echo get_theme_mod( 'theme_cta_button_snippet' ); ?>
            </div>
            <a class="<?php the_field( 'contact_cta_button_color' ); ?> btn-md" href="<?php echo get_theme_mod( 'theme_cta_button_url' ); ?>">
                <?php echo get_theme_mod( 'theme_cta_button_text' ); ?>
            </a>
        </div>
    </div><!-- .constrain -->
</section><!-- .cta-module -->
