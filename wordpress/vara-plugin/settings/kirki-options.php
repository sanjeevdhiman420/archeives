<?php

/**
 * Kirki (Customizer Options)
 *
 * General
 * Header
 * Footer
 * Style
 * Portfolio
 * Blog
 * Shop
 * Utility
 * Social Media
 */
if (!class_exists('Kirki')){
	return;
}

// Add Config for Kirki Settings
Kirki::add_config('grada_kirki', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod'
));

// Include Options
include(__DIR__ . '/options/general-options.php');
include(__DIR__ . '/options/header-options.php');
include(__DIR__ . '/options/footer-options.php');
include(__DIR__ . '/options/portfolio-options.php');
include(__DIR__ . '/options/blog-options.php');
if (class_exists('WooCommerce')) {
	include(__DIR__ . '/options/shop-options.php');
}

include(__DIR__ . '/options/style-options.php');
include(__DIR__ . '/options/typography-options.php');
include(__DIR__ . '/options/utility-options.php');
include(__DIR__ . '/options/social-media.php');

// Adds different style to customizer
function grada_kirki_customizer_style($config) {
	return wp_parse_args( array(
		'disable_loader' => true
	), $config );
}
add_filter('kirki_config', 'grada_kirki_customizer_style');

// Remove WooCommerce default Panel
function grada_customize_options($wp_customize) {
	if (class_exists('WooCommerce')) {
		$wp_customize->remove_panel('woocommerce');
	}
}
add_action('customize_register', 'grada_customize_options');


if ( class_exists( 'WooCommerce' ) ) {
	add_filter( 'woocommerce_gallery_thumbnail_size', 'grada_woocommerce_gallery_thumbnail_size' );
}

if ( !function_exists( 'grada_woocommerce_gallery_thumbnail_size' ) ) {
	function grada_woocommerce_gallery_thumbnail_size() {
		return 'grada-img-size-square';
	}
}