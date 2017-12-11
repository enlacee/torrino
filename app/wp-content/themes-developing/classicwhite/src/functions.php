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
require_once trailingslashit(get_stylesheet_directory()) . 'inc/custom_posts/class-product-custom-post.php';

//Required Geo IP
//require_once trailingslashit(get_stylesheet_directory()) . 'inc/geoip/GeoIP.php';

// Required class Actions
require_once trailingslashit(get_stylesheet_directory()) . 'inc/actions/HomeAction.php';

// Required class Widgets
require_once trailingslashit(get_stylesheet_directory()) . 'inc/widgets/home/class-cw-widget-home-page.php';
require_once trailingslashit(get_stylesheet_directory()) . 'inc/widgets/home/class-cw-widget-home-product.php';
require_once trailingslashit(get_stylesheet_directory()) . 'inc/widgets/MyWidget.php';

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
		'title' => __( 'Redes Sociales', 'classicwhite-theme' ),
		'description' => __( 'Description of what this panel does.', 'classicwhite-theme' ),
	) );

	$wp_customize->add_section( 'section_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'URLS', 'classicwhite-theme' ),
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
		'label' => __( 'URL Facebook', 'classicwhite-theme' ),
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
		'label' => __( 'URL twitter', 'classicwhite-theme' ),
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
		'label' => __( 'URL pinterest', 'classicwhite-theme' ),
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
		'label' => __( 'URL youtube', 'classicwhite-theme' ),
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
		'label' => __( 'URL linkedin', 'classicwhite-theme' ),
		'description' => '',
	) );

}
add_action( 'customize_register', 'prefix_customizer_register' );


/**
 *  Helpers Views
 */

/**
 * Limit words custom for views (cut for word)
 *
 * @param string $str description o content string
 * @param int $num number to cut
 * @param string $append_str string to concat
 * @return string
 */
function limit_words( $str, $num='', $append_str='' ) {
    $num = ($num == '') ? strlen($str) : $num;
    $palabras = preg_split( '/[\s]+/', $str, -1, PREG_SPLIT_OFFSET_CAPTURE );
    if( isset($palabras[$num][1]) ){
      $str = substr( $str, 0, $palabras[$num][1] ) . $append_str;
    }
    unset( $palabras, $num );
    return trim( $str );
}

/**
 * Cut string ok
 * @param  [type] $cadena [description]
 * @param  [type] $limite [description]
 * @param  string $corte  [description]
 * @param  string $pad    [description]
 * @return [type]         [description]
 */
function limit_string($cadena, $limite, $corte=" ", $pad="...")
{
    if(strlen($cadena) <= $limite)
        return $cadena;
    if(false !== ($breakpoint = strpos($cadena, $corte, $limite))) {
        if($breakpoint < strlen($cadena) - 1) {
            $cadena = substr($cadena, 0, $breakpoint) . $pad;
        }
    }
    return $cadena;

}
