<?php
/**
 * Posts > Style Options
 */

/**
 * Post Box
 */
$this->start_controls_section(
	'posts_style_post_box',
	[
		'label' => esc_html__('Post Box', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		'condition' => [
			'posts_layout_type!' => 'justified'
		]
	]
);

include(__DIR__ . '/post-box.php');

$this->end_controls_section();

/**
 * Meta Box
 */
$this->start_controls_section(
	'posts_style_meta_box',
	[
		'label' => esc_html__('Meta Box', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	]
);

include(__DIR__ . '/meta-box.php');

$this->end_controls_section();

$this->end_controls_section();

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
 * Meta
 */
$this->start_controls_section(
	'posts_style_meta',
	[
		'label' => esc_html__('Meta', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		'conditions' => [
			'terms' => [
				[
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'posts_meta_categories',
							'operator' => '==',
							'value' => 'yes'
						],
						[
							'name' => 'posts_meta_date',
							'operator' => '==',
							'value' => 'yes'
						],
						[
							'name' => 'posts_meta_tags',
							'operator' => '==',
							'value' => 'yes'
						]
					]
				]
			],
		]
	]
);

include(__DIR__ . '/meta.php');

$this->end_controls_section();

/**
 * Excerpt
 */
$this->start_controls_section(
	'posts_style_excerpt',
	[
		'label' => esc_html__('Excerpt', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		'conditions' => [
			'terms' => [
				[
					'name' => 'posts_meta_excerpt',
					'operator' => '==',
					'value' => 'yes'
				],
				[
					'name' => 'posts_layout_type',
					'operator' => '!=',
					'value' => 'justified'
				],
			],
		]
	]
);

include(__DIR__ . '/excerpt.php');

$this->end_controls_section();

/**
 * Author
 */
$this->start_controls_section(
	'posts_style_author',
	[
		'label' => esc_html__('Author', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		'conditions' => [
			'terms' => [
				[
					'name' => 'posts_meta_author',
					'operator' => '==',
					'value' => 'yes'
				]
			],
		],
	]
);

include(__DIR__ . '/author.php');

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
					'name' => 'posts_layout',
					'operator' => '==',
					'value' => 'isotope'
				],
				[
					'name' => 'posts_filters_visibility',
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
	'posts_style_pagination',
	[
		'label' => esc_html__('Pagination', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		'conditions' => [
			'relation' => 'and',
			'terms' => [
				[
					'name' => 'posts_layout',
					'operator' => '==',
					'value' => 'isotope'
				],
				[
					'name' => 'posts_pagination_visibility',
					'operator' => '==',
					'value' => 'yes'
				]
			]
		]
	]
);

include(__DIR__ . '/pagination.php');

$this->end_controls_section();