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
	/*
	 * Register Settings
	 */
	// General
	register_setting( 'aws-settings-group', 'site_logo' );
	register_setting( 'aws-settings-group', 'favicon' );
	register_setting( 'aws-settings-group', 'header_info' );
	register_setting( 'aws-settings-group', 'primary_phone' );
	register_setting( 'aws-settings-group', 'primary_email' );
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
	// Code Snippets
	register_setting( 'aws-snippets-group', 'snippets_header' );
	register_setting( 'aws-snippets-group', 'snippets_body' );
	register_setting( 'aws-snippets-group', 'snippets_footer' );
	register_setting( 'aws-snippets-group', 'conversion_page' );
	register_setting( 'aws-snippets-group', 'conversion_code' );
	// Custom CSS
	register_setting( 'aws-css-group', 'custom_css' );

	/*
	 * Sections
	 */
	add_settings_section( 'aws-general-options', 'General Options', 'aws_general_options', 'aws_options' );
	add_settings_section( 'aws-social-options', 'Social Options', 'aws_social_options', 'aws_options' );
	add_settings_section( 'aws-header-snippets', 'Code Snippets Header', 'aws_snippets_header', 'aws_code_snippets' );
	add_settings_section( 'aws-body-snippets', 'Code Snippets Body', 'aws_snippets_body', 'aws_code_snippets' );
	add_settings_section( 'aws-footer-snippets', 'Code Snippets Footer', 'aws_snippets_footer', 'aws_code_snippets' );
	add_settings_section( 'aws-conversion-tracking', 'Conversion Tracking', 'aws_snippets_conversion', 'aws_code_snippets' );
	add_settings_section( 'aws-custom-css', 'Custom CSS', 'aws_custom_styles', 'aws_custom_css' );

	/*
	 * Fields
	 */
	// General
	add_settings_field( 'site-logo', 'Site Logo', 'aws_site_logo', 'aws_options', 'aws-general-options' );
	add_settings_field( 'favicon', 'Favicon', 'aws_favicon', 'aws_options', 'aws-general-options' );
	add_settings_field( 'header-info', 'Header Info', 'aws_header_info', 'aws_options', 'aws-general-options' );
	add_settings_field( 'primary-phone', 'Primary Number', 'aws_primary_phone', 'aws_options', 'aws-general-options' );
	add_settings_field( 'primary-email', 'Primary Email', 'aws_primary_email', 'aws_options', 'aws-general-options' );
	// Social
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
	add_settings_field( 'body-snippets', 'Body Snippets', 'aws_body_snippets', 'aws_code_snippets', 'aws-body-snippets' );
	add_settings_field( 'footer-snippets', 'Footer Snippets', 'aws_footer_snippets', 'aws_code_snippets', 'aws-footer-snippets' );
	add_settings_field( 'conversion-page', 'Conversion Page', 'aws_conversion_page', 'aws_code_snippets', 'aws-conversion-tracking' );
	add_settings_field( 'conversion-code', 'Tracking Code', 'aws_conversion_code', 'aws_code_snippets', 'aws-conversion-tracking' );
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
function aws_snippets_body() {
	echo 'Use this section to input custom code snippets after the opening <strong>body</strong> tag of the document.';
}
function aws_snippets_footer() {
	echo 'Use this section to input custom code snippets before the closing <strong>body</strong> tag of the document.';
}
function aws_snippets_conversion() {
	echo 'Use this section to input a conversion tracking code that will only show on a specified page.';
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
function aws_favicon() {
	$favicon = esc_attr( get_option('favicon') );
	if (empty($favicon)) {
		echo "<div id='favicon-preview' style='background-image: url($favicon);'></div>";
		echo
		'<input type="button" class="button button-secondary" value="Upload Favicon" id="favicon-upload-button" />
			<p class="description">Recommended size is 16x16 pixels</p>
			<input type="hidden" id="favicon-url" name="favicon" value="" />';
	} else {
		echo "<div id='favicon-preview' style='background-image: url($favicon);'></div>";
		echo
			'<input type="button" class="button button-secondary" value="Update Favicon" id="favicon-upload-button" />
			<input type="button" class="button button-secondary" value="Remove" id="favicon-remove-button" />
			<p class="description">Recommended size is 16x16 pixels</p>
			<input type="hidden" id="favicon-url" name="favicon" value="'.$favicon.'" />';
	}
}
function aws_header_info() {
	$header_info = esc_attr( get_option('header_info') );
	echo '<input type="text" name="header_info" value="'.$header_info.'" placeholder="Enter anything to be displayed in the header above the navigation." />';
}
function aws_primary_phone() {
	$primary_phone = esc_attr( get_option('primary_phone') );
	echo '<input type="phone" name="primary_phone" value="'.$primary_phone.'" placeholder="(123) 456-7890" />';
}
function aws_primary_email() {
	$primary_email = esc_attr( get_option('primary_email') );
	echo '<input type="email" name="primary_email" value="'.$primary_email.'" placeholder="example@email.com" />';
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
	echo '<pre class="pre-block"><textarea rows="10" cols="140" name="snippets_header" placeholder="Enter code snippets here" />'.$header_snippets.'</textarea></pre>';
}
function aws_body_snippets() {
	$body_snippets = esc_attr( get_option('snippets_body') );
	echo '<pre class="pre-block"><textarea rows="10" cols="140" name="snippets_body" placeholder="Enter code snippets here" />'.$body_snippets.'</textarea></pre>';
}
function aws_footer_snippets() {
	$footer_snippets = esc_attr( get_option('snippets_footer') );
	echo '<pre class="pre-block"><textarea rows="10" cols="140" name="snippets_footer" placeholder="Enter code snippets here" />'.$footer_snippets.'</textarea></pre>';
}
function aws_conversion_page() {
	$conversion_page = esc_attr( get_option('conversion_page') );
	wp_dropdown_pages(
		array(
			'name' => 'conversion_page',
			'echo' => 1,
			'show_option_none' => __( '&mdash; Select &mdash;' ),
			'option_none_value' => '0',
			'selected' => $conversion_page
		)
	);
}
function aws_conversion_code() {
	$conversion_code = esc_attr( get_option('conversion_code') );
	echo '<pre class="pre-block"><textarea rows="10" cols="140" name="conversion_code" placeholder="Enter tracking code here" />'.$conversion_code.'</textarea></pre>';
}

// Custom CSS Page
function aws_custom_css() {
	$custom_css = esc_attr( get_option('custom_css') );
	echo '<pre class="pre-block"><textarea rows="10" cols="140" name="custom_css" placeholder="Enter custom CSS here" />'.$custom_css.'</textarea></pre>';
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