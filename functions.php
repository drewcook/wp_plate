<?php
/**
 * AWS functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AWS
 */

/*
   Theme Setup / Functionality
   ========================================================================== */

if ( ! function_exists( 'aws_setup' ) ) :

	function aws_setup() {

		load_theme_textdomain( 'aws', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'aws' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}

endif;
add_action( 'after_setup_theme', 'aws_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function aws_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aws_content_width', 640 );
}
add_action( 'after_setup_theme', 'aws_content_width', 0 );

// Remove unnessessary theme functionality
	// Emoji support
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
	// WP Generator
remove_action( 'wp_head', 'wp_generator' );
	// Windows Live Writer
remove_action( 'wp_head', 'wlwmanifest_link' );
	// Shortlink
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'template_redirect', 'wp_shortlink_header' );
	// XML-RPC - used by some plugins like Jetpack, but usually unneeded
remove_action( 'wp_head', 'rsd_link' );
	// WP API Access - used by some plugins, but usually unneeded
remove_action( 'wp_head', 'rest_output_link_wp_head');
	// Remove the REST API endpoint.
remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	// Turn off oEmbed auto discovery.
add_filter( 'embed_oembed_discover', '__return_false' );
	// Don't filter oEmbed results.
remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	// Remove oEmbed discovery links.
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	// Remove oEmbed-specific JavaScript from the front-end and back-end.
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

/*
   Register Widgets
   ========================================================================== */

function aws_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'aws' ),
		'id'            => 'sidebar-primary',
		'description'   => esc_html__( 'Add widgets here.', 'aws' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'aws' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'aws' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'aws' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'aws' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'aws' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'aws' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'aws' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'aws' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
}
add_action( 'widgets_init', 'aws_widgets_init' );


/*
   Enqueue Resources
   ========================================================================== */

// Admin Scripts
function aws_admin_scripts( $hook ) {
	// load this stylesheet for all admin pages
	wp_enqueue_style( 'aws-admin', get_template_directory_uri() . '/assets/css/aws.admin.css', '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'aws_admin_scripts');

// Front End Scripts
function aws_scripts() {

	// Base Theme CSS
	wp_enqueue_style( 'aws', get_stylesheet_uri() );
	// Custom CSS
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.min.css' );
	// Google Fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:300,400,600|Libre+Baskerville:400,700' );
	// Font Awesome CDN
	wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/3942c42a99.js', true );
	// All JS
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aws_scripts' );


/*
   Require Other Theme Files
   ========================================================================== */

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/theme-options.php';
// Require the Bootstrap Nav-Walker
require_once( get_template_directory() . '/inc/wp_bootstrap_navwalker.php' );