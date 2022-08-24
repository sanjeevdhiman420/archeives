<?php
/**
 * Social Media
 */

// Create Panel and Sections
Kirki::add_section('social_media', array(
	'title'       => esc_html__('Social Media', 'vara-plugin'),
	'priority'    => 10
));

// Settings
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'social_media_message',
	'section'     => 'social_media',
	'default'     => '<h1>' . esc_html__('General', 'vara-plugin') . '</h1><hr>'
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'social_media_new_window',
	'label'       => esc_html__('New Window', 'vara-plugin'),
	'description' => esc_html__('Enable if you want the social media links to open in a new window.', 'vara-plugin'),
	'section'     => 'social_media',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('Enable', 'vara-plugin'),
		'2' => esc_html__('Disable', 'vara-plugin')
	),
));

// Url
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'social_media_url_message',
	'section'     => 'social_media',
	'default'     => '<h1>' . esc_html__('URLs', 'vara-plugin') . '</h1><hr>'
));
Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => 'social_media_facebook',
	'label'    => esc_html__('Facebook URL', 'vara-plugin'),
	'section'  => 'social_media'
));
Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => 'social_media_twitter',
	'label'    => esc_html__('Twitter URL', 'vara-plugin'),
	'section'  => 'social_media'
));
Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => 'social_media_instagram',
	'label'    => esc_html__('Instagram URL', 'vara-plugin'),
	'section'  => 'social_media'
));
Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => 'social_media_google_plus',
	'label'    => esc_html__('Google Plus URL', 'vara-plugin'),
	'section'  => 'social_media'
));
Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => 'social_media_vimeo',
	'label'    => esc_html__('Vimeo URL', 'vara-plugin'),
	'section'  => 'social_media'
));
Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => 'social_media_dribbble',
	'label'    => esc_html__('Dribbble URL', 'vara-plugin'),
	'section'  => 'social_media'
));
Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => 'social_media_pinterest',
	'label'    => esc_html__('Pinterest URL', 'vara-plugin'),
	'section'  => 'social_media'
));
Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => 'social_media_youtube',
	'label'    => esc_html__('Youtube URL', 'vara-plugin'),
	'section'  => 'social_media'
));
Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => 'social_media_tumblr',
	'label'    => esc_html__('Tumblr URL', 'vara-plugin'),
	'section'  => 'social_media'
));
Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => 'social_media_linkedin',
	'label'    => esc_html__('Linkedin URL', 'vara-plugin'),
	'section'  => 'social_media'
));
Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => 'social_media_flickr',
	'label'    => esc_html__('Flickr URL', 'vara-plugin'),
	'section'  => 'social_media'
));
Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => 'social_media_spotify',
	'label'    => esc_html__('Spotify URL', 'vara-plugin'),
	'section'  => 'social_media'
));