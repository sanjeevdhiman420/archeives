<?php
/**
 * Plugin Name: Vara Plugin
 * Description: Core plugin for Vara.
 * Version:     1.1
 * Author:      GradaStudio
 * Author URI:  https://gradastudio.com/
 * Text Domain: vara-plugin
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Global Variables
 *
 * Defining global variables to make
 * usage easier.
 */
define('GDS_CORE_VERSION', '1.0.1');
define('GDS_FILE', __FILE__);
define('GDS_REL_PATH', dirname( plugin_basename( __FILE__ ) ) );
define('GDS_THEME_PLACEHOLDER', get_template_directory_uri() . '/assets/images/placeholder.png');

/**
 * Include Plugins
 */
include_once(__DIR__ . '/inc/plugins/acf-flexible-content/acf-flexible-content.php');
include_once(__DIR__ . '/inc/plugins/acf-repeater/acf-repeater.php');
include_once(__DIR__ . '/inc/plugins/kirki/kirki.php');
include_once(__DIR__ . '/inc/plugin.php');

/**
 * Loads plugin text domain so it can be used in translation
 */
function grada_addon_text_domain() {
	load_plugin_textdomain( 'vara-plugin', false, GDS_REL_PATH . '/languages' );
}

add_action( 'plugins_loaded', 'grada_addon_text_domain' );

/**
 * Init
 */
function grada_theme_plugin_init() {
	// Predefined Image Sizes
	add_image_size('grada-img-size-small', 384, 260, true);
	add_image_size('grada-img-size-square', 500, 500, true);
	add_image_size('grada-img-size-medium', 600, 447, true);
	add_image_size('grada-img-size-tall', 500, 700, true);
	add_image_size('grada-img-size-large', 1000, 1000, true);
	add_image_size('grada-img-size-list', 820, 510, true);

	// Post Type
	grada_custom_post_types();

}
add_action('init', 'grada_theme_plugin_init');

/**
 * Grada Studio Custom Post Types
 */
function grada_custom_post_types() {

	// Prefix
	$grada_portfolio_prefix = get_theme_mod('portfolio_prefix') ? ucfirst(get_theme_mod('portfolio_prefix')) : '';
	grada_register_portfolio_post_type($grada_portfolio_prefix);
	grada_register_portfolio_categories($grada_portfolio_prefix);
	grada_register_portfolio_tags($grada_portfolio_prefix);

	grada_custom_gallery_attachment();
}

/**
 * Load Realite Plugin
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 */
function grada_plugins_loaded() {
	include(__DIR__ . '/functions.php');
	include(__DIR__ . '/settings/kirki-options.php');

	// Actions and Filters
	add_action('wp_enqueue_scripts', 'grada_theme_plugin_styles');
	add_action('wp_enqueue_scripts', 'grada_theme_plugin_scripts');

	// Load localization file
	load_plugin_textdomain('vara-plugin');
}
add_action('plugins_loaded', 'grada_plugins_loaded');