<?php
/**
 * Posts > Content Options > Filters
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'products_filters_visibility',
	[
		'label' => esc_html__('Filters', 'vara-plugin'),
		'description' => esc_html__('Show the categories as filters. Make sure to add the categories in the query field.'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);


$this->add_control(
	'products_filters_query_product',
	[
		'label' => esc_html__('Filters Query', 'vara-plugin'),
		'description' => __('Select the categories you want to display as filters. <br /> <small>Note: This option does not affect the query, is created only to display filters on metro layout type.</small>', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT2,
		'label_block' => true,
		'options' => $this->grada_return_taxonomies('product_cat'),
		'multiple' => true,
		'conditions' => [
			'terms' => [
				[
					'name' => 'products_layout_type',
					'operator' => '==',
					'value' => 'metro',
				],
				[
					'name' => 'products_filters_visibility',
					'operator' => '==',
					'value' => 'yes'
				]
			],
		]
	]
);

$this->add_control(
	'products_filters_filter_all',
	[
		'label' => esc_html__('Show All Filter', 'vara-plugin'),
		'description' => esc_html__('Show a filter which is able to filter all posts.'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
		'condition' => [
			'products_filters_visibility' => 'yes'
		]
	]
);

$this->add_control(
	'products_filters_filter_all_string',
	[
		'label'   => esc_html__('String', 'vara-plugin'),
		'description' => esc_html__('Override the filter \'All\'.', 'vara-plugin'),
		'type'    => Controls_Manager::TEXT,
		'default' => esc_html__('All', 'vara-plugin'),
		'conditions' => [
			'relation' => 'and',
			'terms' => [
				[
					'name' => 'products_filters_visibility',
					'operator' => '==',
					'value' => 'yes',
				],
				[
					'name' => 'products_filters_filter_all',
					'operator' => '==',
					'value' => 'yes'
				],
			],
		]
	]
);