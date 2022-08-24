<?php
/**
 * Posts > Style Options
 */

/**
 * Hover
 */
$this->start_controls_section(
	'portfolio_style_hover',
	[
		'label' => esc_html__('Hover', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		'conditions' => [
			'terms' => [
				[
					'name' => 'portfolio_meta_thumbnail',
					'operator' => '==',
					'value' => 'yes'
				],
			]
		]
	]
);

include(__DIR__ . '/hover.php');

$this->end_controls_section();

/**
 * Entry Details
 */
$this->start_controls_section(
	'portfolio_style_entry_details',
	[
		'label' => esc_html__('Entry Details', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	]
);

include(__DIR__ . '/entry-details.php');

$this->end_controls_section();

/**
 * Title
 */
$this->start_controls_section(
	'portfolio_style_title',
	[
		'label' => esc_html__('Title', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		'condition' => [
			'portfolio_meta_title' => 'yes'
		]
	]
);

include(__DIR__ . '/title.php');

$this->end_controls_section();

/**
 * Category
 */
$this->start_controls_section(
	'portfolio_style_category',
	[
		'label' => esc_html__('Meta: Categories', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		'condition' => [
			'portfolio_meta_categories' => 'yes'
		]
	]
);

include(__DIR__ . '/category.php');

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
					'name' => 'portfolio_layout',
					'operator' => '==',
					'value' => 'isotope'
				],
				[
					'name' => 'portfolio_filters_visibility',
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
	'portfolio_style_pagination',
	[
		'label' => esc_html__('Pagination', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		'conditions' => [
			'relation' => 'and',
			'terms' => [
				[
					'name' => 'portfolio_layout',
					'operator' => '==',
					'value' => 'isotope'
				],
				[
					'name' => 'portfolio_pagination_visibility',
					'operator' => '==',
					'value' => 'yes'
				]
			]
		]
	]
);

include(__DIR__ . '/pagination.php');

$this->end_controls_section();