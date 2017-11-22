<?php
// ==== CONFIGURATION (CUSTOM) ==== //

// Specify custom configuration values in this file; these will override values in `functions-config-defaults.php`
// The general idea here is to allow for themes to be customized for specific installations

/**
 * Remove All Meta Generators
 *
 * @param $html
 *
 * @return mixed
 */
function remove_revslider_meta_tag() {
	return '';
}
remove_action('wp_head', 'wp_generator');
add_filter( 'revslider_meta_generator', 'remove_revslider_meta_tag' );

/**
 * Remove everything related with Embedding in the HTMLfemo
 */
function unregister_wp_embed_script() {
	if (!is_admin()) {
		wp_deregister_script('wp-embed');
	}
}
add_action('init', 'unregister_wp_embed_script');

/**
 * Remove everything related with emojis
 */
function disable_wp_emojicons() {

	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}
add_action( 'init', 'disable_wp_emojicons' );

/**
 * Enqueue JQuery Library on footer
 */
function jquery_to_footer() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', false, ['jquery-core', 'jquery-migrate'], false, true );
	wp_enqueue_script( 'jquery-core', '/wp-includes/js/jquery/jquery.js', [], false, true);
	wp_enqueue_script( 'jquery-migrate', '/wp-includes/js/jquery/jquery-migrate.min.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'jquery_to_footer');

/**
 * Add defer attribute to my scripts of choice
 *
 * @param $tag
 * @param $handle
 *
 * @return mixed
 */
function add_defer_attribute($tag, $handle) {
	// add script handles to the array below
	$scripts_to_defer = array('wp-embed', 'classicwhite-plugins', 'classicwhite-core');

	foreach($scripts_to_defer as $defer_script) {
		if ($defer_script === $handle) {
			return str_replace(' src', ' defer="defer" src', $tag);
		}
	}
	return $tag;
}
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
