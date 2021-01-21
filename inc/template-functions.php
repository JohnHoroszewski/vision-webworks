<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package envision_web_media
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cfm_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'cfm_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function cfm_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'cfm_pingback_header' );

// CTA Module
function ewm_cta_module() { ?>
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
<?php }

// Portfolio CTA Module
function ewm_port_cta_module() { ?>
	<section class="portfolio-cta-module p50 <?php the_field( 'portfolio_cta_module_background_color' ); ?> <?php the_field( 'second_module_margin' ); ?>">
		<div class="constrain flexxed">
			<div class="cta-text">
			<h3>Want to see some of our most Recent Work?</br>
			Check out our Clients</h3>
			</div>
			<a href="/clients/" class="btn-lg <?php the_field( 'portfolio_cta_module_button_color' ); ?> white-text">Clients</a>
		</div><!-- .constrain -->
</section><!-- .portfolio-cta-module -->
<?php }