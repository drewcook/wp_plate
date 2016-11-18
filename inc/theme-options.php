<?php
/**
 * AWS Theme Options.
 *
 * @package AWS
 */

/* ==========================================================================
   Add AWS administration page
   ========================================================================== */

function aws_admin_menus() {

	// Create AWS admin page
	add_menu_page(
		'AWS Theme Options',
		'AWS',
		'manage_options',
		'aws_options',
		'aws_theme_create_page',
		get_template_directory_uri() . '/assets/img/theme-icon.png',
		59
	);

	// Create AWS admin subpages
	$gen_options_page = add_submenu_page( 'aws_options', 'AWS Theme Options', 'General Options', 'manage_options', 'aws_options', 'aws_theme_create_page' );
	$code_snippets_page = add_submenu_page( 'aws_options', 'AWS Code Snippets', 'Code Snippets', 'manage_options', 'aws_code_snippets', 'aws_theme_code_snippets' );
	$custom_css_page = add_submenu_page( 'aws_options', 'AWS Custom CSS', 'Custom CSS', 'manage_options', 'aws_custom_css', 'aws_theme_custom_css' );

	// Activate custom settings
	add_action('admin_init', 'aws_custom_settings');
	// Load per page resources
	add_action('load-' . $gen_options_page, 'aws_options_resources');
	add_action('load-' . $code_snippets_page, 'aws_options_resources');
	add_action('load-' . $custom_css_page, 'aws_options_resources');

}
add_action('admin_menu', 'aws_admin_menus');

/*
   Load Options Resources
   ========================================================================== */

function aws_options_resources() {
	wp_enqueue_media();
	wp_enqueue_style( 'aws-options-styles', get_template_directory_uri() . '/assets/css/aws.theme-options.css', '1.0.0' );
	wp_enqueue_script( 'aws-options-scripts', get_template_directory_uri(). '/assets/js/aws.theme-options.js', array('jquery'), true );
}

/*
   General Options Settings
   ========================================================================== */

function aws_custom_settings() {
	// === Register Settings ===
	// General
	register_setting( 'aws-settings-group', 'site_logo' );
	register_setting( 'aws-settings-group', 'header_topbar' );
	register_setting( 'aws-settings-group', 'primary_phone' );
	register_setting( 'aws-settings-group', 'primary_email' );
		// Address
	register_setting( 'aws-settings-group', 'address_1' );
	register_setting( 'aws-settings-group', 'address_2' );
	register_setting( 'aws-settings-group', 'address_city' );
	register_setting( 'aws-settings-group', 'address_state' );
	register_setting( 'aws-settings-group', 'address_zip' );
		// Social
	register_setting( 'aws-settings-group', 'social_facebook', 'aws_sanitize_url_field' );
	register_setting( 'aws-settings-group', 'social_twitter', 'aws_sanitize_url_field' );
	register_setting( 'aws-settings-group', 'social_google', 'aws_sanitize_url_field' );
	register_setting( 'aws-settings-group', 'social_instagram', 'aws_sanitize_url_field' );
	register_setting( 'aws-settings-group', 'social_linkedin', 'aws_sanitize_url_field' );
	register_setting( 'aws-settings-group', 'social_pinterest', 'aws_sanitize_url_field' );
	register_setting( 'aws-settings-group', 'social_youtube', 'aws_sanitize_url_field' );
	register_setting( 'aws-settings-group', 'social_yelp', 'aws_sanitize_url_field' );
	register_setting( 'aws-settings-group', 'social_rss', 'aws_sanitize_url_field' );
	// Snippets
	register_setting( 'aws-snippets-group', 'snippets_header' );
	register_setting( 'aws-snippets-group', 'snippets_footer' );
	// Custom CSS
	register_setting( 'aws-css-group', 'custom_css' );

	// === Sections ===
	add_settings_section( 'aws-general-options', 'General Options', 'aws_general_options', 'aws_options' );
	add_settings_section( 'aws-social-options', 'Social Options', 'aws_social_options', 'aws_options' );
	add_settings_section( 'aws-header-snippets', 'Code Snippets Header', 'aws_snippets_header', 'aws_code_snippets' );
	add_settings_section( 'aws-footer-snippets', 'Code Snippets Footer', 'aws_snippets_footer', 'aws_code_snippets' );
	add_settings_section( 'aws-custom-css', 'Custom CSS', 'aws_custom_styles', 'aws_custom_css' );

	// === Fields ===
	// General
	add_settings_field( 'site-logo', 'Site Logo', 'aws_site_logo', 'aws_options', 'aws-general-options' );
	add_settings_field( 'header-topbar', 'Header Top Bar', 'aws_header_topbar', 'aws_options', 'aws-general-options' );
	add_settings_field( 'primary-phone', 'Primary Number', 'aws_primary_phone', 'aws_options', 'aws-general-options' );
	add_settings_field( 'primary-email', 'Primary Email', 'aws_primary_email', 'aws_options', 'aws-general-options' );
	add_settings_field( 'main-address', 'Address', 'aws_address', 'aws_options', 'aws-general-options' );
	add_settings_field( 'social-facebook', 'Facebook URL', 'aws_social_facebook', 'aws_options', 'aws-social-options' );
	add_settings_field( 'social-twitter', 'Twitter URL', 'aws_social_twitter', 'aws_options', 'aws-social-options' );
	add_settings_field( 'social-google', 'Google+ URL', 'aws_social_google', 'aws_options', 'aws-social-options' );
	add_settings_field( 'social-instagram', 'Instagram URL', 'aws_social_instagram', 'aws_options', 'aws-social-options' );
	add_settings_field( 'social-linkedin', 'LinkedIn URL', 'aws_social_linkedin', 'aws_options', 'aws-social-options' );
	add_settings_field( 'social-pinterest', 'Pinterest URL', 'aws_social_pinterest', 'aws_options', 'aws-social-options' );
	add_settings_field( 'social-youtube', 'YouTube URL', 'aws_social_youtube', 'aws_options', 'aws-social-options' );
	add_settings_field( 'social-yelp', 'Yelp URL', 'aws_social_yelp', 'aws_options', 'aws-social-options' );
	add_settings_field( 'social-rss', 'RSS Feed URL', 'aws_social_rss', 'aws_options', 'aws-social-options' );
	// Code Snippets
	add_settings_field( 'header-snippets', 'Header Snippets', 'aws_header_snippets', 'aws_code_snippets', 'aws-header-snippets' );
	add_settings_field( 'footer-snippets', 'Footer Snippets', 'aws_footer_snippets', 'aws_code_snippets', 'aws-footer-snippets' );
	// Custom CSS
	add_settings_field( 'custom-css', 'Custom CSS', 'aws_custom_css', 'aws_custom_css', 'aws-custom-css' );

}

/*
   Section Functions
   ========================================================================== */

function aws_general_options() {
	echo 'Use this section to customize your general site settings and contact information.';
}
function aws_social_options() {
	echo 'Use this section to update your social pages and choose which to display.';
}
function aws_snippets_header() {
	echo 'Use this section to input custom code snippets within the <strong>head</strong> of the document.';
}
function aws_snippets_footer() {
	echo 'Use this section to input custom code snippets before the closing <strong>body</strong> tag of the document.';
}
function aws_custom_styles() {
	echo 'Use this section to write custom styles.';
}

/*
   Field Functions
   ========================================================================== */

// General Options Page
function aws_site_logo() {
	$site_logo = esc_attr( get_option('site_logo') );
	if (empty($site_logo)) {
		echo "<div id='logo-preview' style='background-image: url($site_logo);'></div>";
		echo
			'<input type="button" class="button button-secondary" value="Upload Logo" id="upload-button" />
			<p class="description">Recommended ratio is 3:1</p>
			<input type="hidden" id="site-logo-url" name="site_logo" value="" />';
	} else {
		echo "<div id='logo-preview' style='background-image: url($site_logo);'></div>";
		echo
			'<input type="button" class="button button-secondary" value="Update Logo" id="upload-button" />
			<input type="button" class="button button-secondary" value="Remove" id="remove-button" />
			<p class="description">Recommended ratio is 3:1</p>
			<input type="hidden" id="site-logo-url" name="site_logo" value="'.$site_logo.'" />';
	}
}
function aws_header_topbar() {
	$header_topbar = esc_attr( get_option('header_topbar') );
	echo '<input type="text" name="header_topbar" value="'.$header_topbar.'" placeholder="Enter anything to be displayed in a bar above header." />';
}
function aws_primary_phone() {
	$primary_phone = esc_attr( get_option('primary_phone') );
	echo '<input type="phone" name="primary_phone" value="'.$primary_phone.'" placeholder="(123) 456-7890" />';
}
function aws_primary_email() {
	$primary_email = esc_attr( get_option('primary_email') );
	echo '<input type="email" name="primary_email" value="'.$primary_email.'" placeholder="example@email.com" />';
}
function aws_address() {
	$address_1 = esc_attr( get_option('address_1') );
	$address_2 = esc_attr( get_option('address_2') );
	$address_city = esc_attr( get_option('address_city') );
	$address_state = esc_attr( get_option('address_state') );
	$address_zip = esc_attr( get_option('address_zip') );

	echo '<input type="text" name="address_1" value="'.$address_1.'" placeholder="Street Address" /><br>
	<input type="text" name="address_2" value="'.$address_2.'" placeholder="apt, suite, unit, etc." /><br>
	<input type="text" name="address_city" value="'.$address_city.'" placeholder="City" /><br>
	<input type="text" name="address_state" value="'.$address_state.'" placeholder="State" /><br>
	<input type="text" name="address_zip" value="'.$address_zip.'" placeholder="Zipcode" />';
}
function aws_social_facebook() {
	$social_facebook = esc_attr( get_option('social_facebook') );
	echo '<input type="text" name="social_facebook" value="'.$social_facebook.'" placeholder="facebook.com/your-page-handler" />';
}
function aws_social_twitter() {
	$social_twitter = esc_attr( get_option('social_twitter') );
	echo '<input type="text" name="social_twitter" value="'.$social_twitter.'" placeholder="twitter.com/your-page-handler" />';
}
function aws_social_google() {
	$social_google = esc_attr( get_option('social_google') );
	echo '<input type="text" name="social_google" value="'.$social_google.'" placeholder="plus.google.com/your-page-handler" />';
}
function aws_social_instagram() {
	$social_instagram = esc_attr( get_option('social_instagram') );
	echo '<input type="text" name="social_instagram" value="'.$social_instagram.'" placeholder="instagram.com/your-page-handler" />';
}
function aws_social_linkedin() {
	$social_linkedin = esc_attr( get_option('social_linkedin') );
	echo '<input type="text" name="social_linkedin" value="'.$social_linkedin.'" placeholder="linkedin.com/your-page-handler" />';
}
function aws_social_pinterest() {
	$social_pinterest = esc_attr( get_option('social_pinterest') );
	echo '<input type="text" name="social_pinterest" value="'.$social_pinterest.'" placeholder="pinterest.com/your-page-handler" />';
}
function aws_social_youtube() {
	$social_youtube = esc_attr( get_option('social_youtube') );
	echo '<input type="text" name="social_youtube" value="'.$social_youtube.'" placeholder="youtube.com/your-page-handler" />';
}
function aws_social_yelp() {
	$social_yelp = esc_attr( get_option('social_yelp') );
	echo '<input type="text" name="social_yelp" value="'.$social_yelp.'" placeholder="yelp.com/your-page-handler" />';
}
function aws_social_rss() {
	$social_rss = esc_attr( get_option('social_rss') );
	echo '<input type="text" name="social_rss" value="'.$social_rss.'" placeholder="yourfeed.com/your-rss-feed" />';
}

// Code Snippets Page
function aws_header_snippets() {
	$header_snippets = esc_attr( get_option('snippets_header') );
	echo '<textarea rows="10" cols="140" name="snippets_header" placeholder="Enter here" />'.$header_snippets.'</textarea>';
}
function aws_footer_snippets() {
	$footer_snippets = esc_attr( get_option('snippets_footer') );
	echo '<textarea rows="10" cols="140" name="snippets_footer" placeholder="Enter here" />'.$footer_snippets.'</textarea>';
}

// Custom CSS Page
function aws_custom_css() {
	$custom_css = esc_attr( get_option('custom_css') );
	echo '<textarea rows="10" cols="140" name="custom_css" placeholder="Enter here" />'.$custom_css.'</textarea>';
}

// Sanitization settings example
function aws_sanitize_url_field( $input ) {
	$output = sanitize_text_field( $input );
	// strip '@'
	$output = str_replace('@', 'replace', $output);
	return $output;
}

/*
   Generate the AWS theme pages
   ========================================================================== */

// Generate AWS admin page
function aws_theme_create_page () {

	if ( !current_user_can('manage_options')) {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'aws' ) );
	}

	require_once( get_template_directory() . '/inc/aws-options.php' );
}

// Generate AWS code snippets subpage
function aws_theme_code_snippets() {

	if ( !current_user_can('manage_options')) {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'aws' ) );
	}

	require_once( get_template_directory() . '/inc/aws-code-snippets.php' );
}

// Generate AWS custom CSS subpage
function aws_theme_custom_css() {

	if ( !current_user_can('manage_options')) {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'aws' ) );
	}

	require_once( get_template_directory() . '/inc/aws-custom-css.php' );
}

/* ========================================================================== */