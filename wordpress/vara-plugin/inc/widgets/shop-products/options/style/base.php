<?php
/**
 * Posts > Style Options
 */

/**
 * Title
 */
$this->start_controls_section(
	'posts_style_title',
	[
		'label' => esc_html__('Title', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		'condition' => [
			'posts_meta_title' => 'yes'
		]
	]
);

include(__DIR__ . '/title.php');

$this->end_controls_section();

/**
 * Filters
 */
$this->start_controls_section(
	'posts_style_filters',
	[
		'label' => esc_html__('Filters', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		'conditions' => [
			'relation' => 'and',
			'terms' => [
				[
					'name' => 'products_layout',
					'operator' => '==',
					'value' => 'isotope'
				],
				[
					'name' => 'products_filters_visibility',
					'operator' => '==',
					'value' => 'yes'
				]
			]
		]
	]
);

include(__DIR__ . '/filters.php');

$this->end_controls_section();

/**
 * Pagination
 */
$this->start_controls_section(
	'products_style_pagination',
	[
		'label' => esc_html__('Pagination', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		'conditions' => [
			'relation' => 'and',
			'terms' => [
				[
					'name' => 'products_layout',
					'operator' => '==',
					'value' => 'isotope'
				],
				[
					'name' => 'products_pagination_visibility',
					'operator' => '==',
					'value' => 'yes'
				]
			]
		]
	]
);

include(__DIR__ . '/pagination.php');

$this->end_controls_section();