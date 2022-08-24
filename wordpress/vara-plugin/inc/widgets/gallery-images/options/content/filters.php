<?php
/**
 * Gallery Images > Content Options > Filters
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'gallery_images_filters_filter_all',
	[
		'label' => esc_html__('Show All Filter', 'vara-plugin'),
		'description' => esc_html__('Show a filter which is able to filter all posts.'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes'
	]
);

$this->add_control(
	'gallery_images_filters_filter_all_string',
	[
		'label'   => esc_html__('String', 'vara-plugin'),
		'description' => esc_html__('Override the filter \'All\'.', 'vara-plugin'),
		'type'    => Controls_Manager::TEXT,
		'default' => esc_html__('All', 'vara-plugin'),
		'conditions' => [
			'relation' => 'and',
			'terms' => [
				[
					'name' => 'gallery_images_filters_filter_all',
					'operator' => '==',
					'value' => 'yes'
				],
			],
		]
	]
);