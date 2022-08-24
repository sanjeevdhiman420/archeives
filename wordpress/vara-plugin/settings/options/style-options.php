<?php
/**
 * Style Options
 */

// Create Panel and Sections
Kirki::add_section('style_options', array(
	'title'          => esc_html__('Style', 'vara-plugin'),
	'priority'    => 8
));

// Settings
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'style_options_message',
	'section'     => 'style_options',
	'default'     => '<h1>' . esc_html__('General', 'vara-plugin') . '</h1><hr>'
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'color',
	'settings'    => 'style_bg_color',
	'label'       => esc_html__('Background Color', 'vara-plugin'),
	'description' => esc_html__('Change the background color of theme.', 'vara-plugin'),
	'section'     => 'style_options',
	'default'     => '#FFFFFF',
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'color',
	'settings'    => 'style_main_color',
	'label'       => esc_html__('Main Color', 'vara-plugin'),
	'description' => esc_html__('Change the color of all main elements.', 'vara-plugin'),
	'section'     => 'style_options',
	'default'     => '#f08923',
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'color',
	'settings'    => 'style_headings_color',
	'label'       => esc_html__('Headings Color', 'vara-plugin'),
	'description' => esc_html__('Change the color of all headings.', 'vara-plugin'),
	'section'     => 'style_options',
	'default'     => '#212121',
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'color',
	'settings'    => 'style_paragraphs_color',
	'label'       => esc_html__('Paragraphs Color', 'vara-plugin'),
	'description' => esc_html__('Change the color of all paragraphs.', 'vara-plugin'),
	'section'     => 'style_options',
	'default'     => '#4b575c',
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'color',
	'settings'    => 'style_border_color',
	'label'       => esc_html__('Border Color', 'vara-plugin'),
	'description' => esc_html__('Change the color of the thin borders.', 'vara-plugin'),
	'section'     => 'style_options',
	'default'     => '#e5e5e5',
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'color',
	'settings'    => 'style_pattern_color',
	'label'       => esc_html__('Pattern Color', 'vara-plugin'),
	'description' => esc_html__('Change the color of the patterns.', 'vara-plugin'),
	'section'     => 'style_options',
	'default'     => '#f7f7f7',
));