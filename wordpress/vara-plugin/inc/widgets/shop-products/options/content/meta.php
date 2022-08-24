<?php
/**
 * Posts > Content Options > Meta
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'products_meta_thumbnail',
	[
		'label' => esc_html__('Thumbnail', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
		'condition' => [
			'products_layout_model' => ['left-image', 'classic-grid'],
		]
	]
);

$this->add_control(
	'products_meta_title',
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
	'products_meta_categories',
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
	'products_meta_excerpt',
	[
		'label' => esc_html__('Excerpt', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
		'condition' => [
			'products_layout_model' => ['left-image', 'classic-grid'],
		]
	]
);

$this->add_control(
	'products_meta_price',
	[
		'label' => esc_html__('Price', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
	]
);

$this->add_control(
	'products_meta_results_count',
	[
		'label' => esc_html__('Results Count', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'no'
	]
);

$this->add_control(
	'products_meta_catalog_ordering',
	[
		'label' => esc_html__('Catalog Ordering', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$this->add_control(
	'products_meta_ordering_default',
	[
		'label' => esc_html__('Default Order', 'vara-plugin'),
		'description' => esc_html__('Select which order you want to set default.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'menu_order' => esc_attr__('Default sorting', 'vara-plugin'),
			'popularity' => esc_attr__('Sort by popularity', 'vara-plugin'),
			'rating' => esc_attr__('Sort by average rating', 'vara-plugin'),
			'date' => esc_attr__('Sort by newness', 'vara-plugin'),
			'price' => esc_attr__('Sort by price: low to high', 'vara-plugin'),
			'price-desc' => esc_attr__('Sort by price: high to low', 'vara-plugin')
		],
		'default' => 'menu_order'
	]
);