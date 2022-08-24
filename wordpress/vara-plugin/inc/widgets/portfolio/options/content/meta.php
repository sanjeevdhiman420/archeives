<?php
/**
 * Portfolio > Content Options > Meta
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'portfolio_meta_thumbnail',
	[
		'label' => esc_html__('Thumbnail', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
		'condition' => [
			'portfolio_layout_model' => ['left-image', 'classic-grid'],
		]
	]
);

$this->add_control(
	'portfolio_meta_title',
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
	'portfolio_meta_categories',
	[
		'label' => esc_html__('Categories', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
	]
);