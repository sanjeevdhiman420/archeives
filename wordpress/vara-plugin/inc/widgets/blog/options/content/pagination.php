<?php
/**
 * Posts > Content Options > Pagination
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'posts_pagination_visibility',
	[
		'label' => esc_html__('Pagination Visibility', 'vara-plugin'),
		'description' => esc_html__('Select the visibility of pagination.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
	]
);

$this->add_control(
	'posts_pagination_style',
	[
		'label' => esc_html__('Pagination Style', 'vara-plugin'),
		'description' => esc_html__('Select the pagination style, normal is with numbers and arrows and Show More is with button. ', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'normal' => esc_html__('Normal (Links)', 'vara-plugin'),
			'show-more' => esc_html__('Show More (Ajax)', 'vara-plugin'),
		],
		'default' => 'normal',
		'condition' => [
			'posts_pagination_visibility' => 'yes',
		]
	]
);