<?php
/**
 * Summit functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Summit
 */

if ( ! function_exists( 'summit_setup' ) ) :

function summit_setup() {

	load_theme_textdomain( 'summit', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'summit' ),
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
add_action( 'after_setup_theme', 'summit_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function summit_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'summit_content_width', 640 );
}
add_action( 'after_setup_theme', 'summit_content_width', 0 );

/**
 * Register widget area.
 */
function summit_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'summit' ),
		'id'            => 'sidebar-page',
		'description'   => esc_html__( 'Add widgets here.', 'summit' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'summit' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'Add widgets here.', 'summit' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'summit' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'summit' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'summit' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'summit' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'summit' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'summit' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'summit' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'summit' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
}
add_action( 'widgets_init', 'summit_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function summit_scripts() {

	// Base Theme CSS
	wp_enqueue_style( 'summit', get_stylesheet_uri() );
	// Bootstrap CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', '3.3.7' );
	// Custom CSS
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.min.css' );
	// Google Fonts
	wp_enqueue_style( 'poppins', 'https://fonts.googleapis.com/css?family=Poppins:300,400,600' );
 	wp_enqueue_style( 'libre-baskerville', 'https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700' );
	// Font Awesome CDN
	wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/3942c42a99.js', true );
	// All JS
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), $ver, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'summit_scripts' );

/**
 * Require other theme files
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
// Require the Bootstrap Nav-Walker
require_once( get_template_directory() . '/inc/wp_bootstrap_navwalker.php' );