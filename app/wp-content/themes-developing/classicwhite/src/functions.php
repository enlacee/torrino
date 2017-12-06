<?php
// ==== FUNCTIONS ==== //

// Load the configuration file for this installation; all options are set here
if (is_readable(trailingslashit(get_stylesheet_directory()) . 'functions-config.php')) {
	require_once trailingslashit(get_stylesheet_directory()) . 'functions-config.php';
}

// Load configuration defaults for this theme; anything not set in the custom configuration (above) will be set here
require_once trailingslashit(get_stylesheet_directory()) . 'functions-config-defaults.php';

// An example of how to manage loading front-end assets (scripts, styles, and fonts)
require_once trailingslashit(get_stylesheet_directory()) . 'inc/assets.php';

// Required class Custom Posts
//require_once trailingslashit(get_stylesheet_directory()) . 'inc/custom_posts/MyCustomPost.php';

//Required Geo IP
//require_once trailingslashit(get_stylesheet_directory()) . 'inc/geoip/GeoIP.php';

// Required class Actions
//require_once trailingslashit(get_stylesheet_directory()) . 'inc/actions/NavHeadAction.php';

// Required class Widgets
//require_once trailingslashit(get_stylesheet_directory()) . 'inc/widgets/MyWidget.php';

// Required class Template
require_once trailingslashit(get_stylesheet_directory()) . 'inc/ClassicWhite.php';

// Only the bare minimum to get the theme up and running
function theme_setup()
{
	// Language loading
	load_theme_textdomain('classicwhite-theme', trailingslashit(get_template_directory()) . 'languages');

	// HTML5 support; mainly here to get rid of some nasty default styling that WordPress used to inject
	add_theme_support('html5', array('search-form', 'gallery'));

	// $content_width limits the size of the largest image size available via the media uploader
	// It should be set once and left alone apart from that; don't do anything fancy with it; it is part of WordPress core
	global $content_width;
	if (!isset($content_width) || !is_int($content_width)) {
		$content_width = (int)960;
	}
}

add_action('after_setup_theme', 'theme_setup', 11);

$ClassicWhite = new ClassicWhite();

/**
 * Custom theme fields
 */
function prefix_customizer_register( $wp_customize ) {

	$wp_customize->add_panel( 'panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Redes Sociales', 'textdomain' ),
		'description' => __( 'Description of what this panel does.', 'textdomain' ),
	) );

	$wp_customize->add_section( 'section_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'URLS', 'textdomain' ),
		'description' => '',
		'panel' => 'panel_id',
	) );

	// facebook
	$wp_customize->add_setting( 'url_field_facebook', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );
	$wp_customize->add_control( 'url_field_facebook', array(
		'type' => 'url',
		'priority' => 10,
		'section' => 'section_id',
		'label' => __( 'URL Facebook', 'textdomain' ),
		'description' => '',
	) );
	// twitter
	$wp_customize->add_setting( 'url_field_twitter', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );
	$wp_customize->add_control( 'url_field_twitter', array(
		'type' => 'url',
		'priority' => 10,
		'section' => 'section_id',
		'label' => __( 'URL twitter', 'textdomain' ),
		'description' => '',
	) );
	// pinterest
	$wp_customize->add_setting( 'url_field_pinterest', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );
	$wp_customize->add_control( 'url_field_pinterest', array(
		'type' => 'url',
		'priority' => 10,
		'section' => 'section_id',
		'label' => __( 'URL pinterest', 'textdomain' ),
		'description' => '',
	) );
	// youtube
	$wp_customize->add_setting( 'url_field_youtube', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );
	$wp_customize->add_control( 'url_field_youtube', array(
		'type' => 'url',
		'priority' => 10,
		'section' => 'section_id',
		'label' => __( 'URL youtube', 'textdomain' ),
		'description' => '',
	) );
	// linkedin
	$wp_customize->add_setting( 'url_field_linkedin', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );
	$wp_customize->add_control( 'url_field_linkedin', array(
		'type' => 'url',
		'priority' => 10,
		'section' => 'section_id',
		'label' => __( 'URL linkedin', 'textdomain' ),
		'description' => '',
	) );

}
add_action( 'customize_register', 'prefix_customizer_register' );
