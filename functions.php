<?php
/**
 * Clever Fox Media functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package envision_web_media
 */

// @include 'includes/customizer.php';

if ( ! function_exists( 'cfm_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cfm_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Clever Fox Media, use a find and replace
		 * to change 'cfm' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cfm', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'cfm' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'cfm_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'cfm_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cfm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cfm_content_width', 640 );
}
add_action( 'after_setup_theme', 'cfm_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
@include 'includes/sidebars.php';

/**
 * Enqueue scripts and styles.
 */
function cfm_scripts() {
	// Enqueue slick CSS
	wp_enqueue_style( 'cfm-slick-style', get_template_directory_uri() . '/css/slick.css' );

	// Enqueue slick-theme CSS
	wp_enqueue_style( 'cfm-slicktheme-style', get_template_directory_uri() . '/css/slick-theme.css' );

	wp_enqueue_style( 'cfm-fa-style', get_template_directory_uri() . '/font-awesome-4.7.0/css/font-awesome.min.css' );

	wp_enqueue_style( 'cfm-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'cfm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'cfm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// Enqueue slick.js
	wp_enqueue_script( 'cfm-slick-js', get_template_directory_uri() . '/js/slick.min.js', array(), '20151215', true );

	// Enqueue custom.js
	wp_enqueue_script( 'cfm-customjs', get_template_directory_uri() . '/js/custom.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cfm_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Testimonial Settings',
		'menu_title'	=> 'Testimonials Settings',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Blog Settings',
		'menu_title'	=> 'Blog Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
}

// Remove Admin Bar
add_filter('show_admin_bar', '__return_false');

// Load custom functions
// @include 'includes/functions.php';

// //remove emoji support
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// // Remove rss feed links
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

// // remove wp-embed
add_action( 'wp_footer', function(){
    wp_dequeue_script( 'wp-embed' );
});


add_action( 'wp_enqueue_scripts', function(){
    // // remove block library css
    wp_dequeue_style( 'wp-block-library' );
    // // remove comment reply JS
    wp_dequeue_script( 'comment-reply' );
} );