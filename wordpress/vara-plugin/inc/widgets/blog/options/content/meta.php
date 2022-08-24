<?php
/**
 * Posts > Content Options > Meta
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'posts_meta_thumbnail',
	[
		'label' => esc_html__('Thumbnail', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
		'conditions' => [
			'relation' => 'or',
			'terms' => [
				[
					'name' => 'posts_layout_model',
					'operator' => '==',
					'value' => 'classic-grid'
				],
				[
					'name' => 'posts_layout_model',
					'operator' => '==',
					'value' => 'left-image'
				]
			]
		]
	]
);

$this->add_control(
	'posts_meta_title',
	[
		'label' => esc_html__('Title', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
	]
);

$this->add_control(
	'posts_meta_date',
	[
		'label' => esc_html__('Date', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
	]
);

$this->add_control(
	'posts_meta_categories',
	[
		'label' => esc_html__('Categories', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
	]
);

$this->add_control(
	'posts_meta_tags',
	[
		'label' => esc_html__('Tags', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
		'conditions' => [
			'relation' => 'or',
			'terms' => [
				[
					'name' => 'posts_layout_model',
					'operator' => '==',
					'value' => 'classic-grid'
				],
				[
					'name' => 'posts_layout_model',
					'operator' => '==',
					'value' => 'left-image'
				]
			]
		]
	]
);

$this->add_control(
	'posts_meta_excerpt',
	[
		'label' => esc_html__('Excerpt', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
		'conditions' => [
			'relation' => 'or',
			'terms' => [
				[
					'name' => 'posts_layout_model',
					'operator' => '==',
					'value' => 'classic-grid'
				],
				[
					'name' => 'posts_layout_model',
					'operator' => '==',
					'value' => 'left-image'
				]
			]
		]
	]
);

$this->add_control(
	'posts_meta_author',
	[
		'label' => esc_html__('Author', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
	]
);