<?php
/**
 * Portfolio > Content Options
 */

/**
 * Functionality
 */
$this->start_controls_section(
	'portfolio_functionality', [
		'label' => esc_html__('Functionality', 'vara-plugin')
	]
);

include(__DIR__ . '/functionality.php');

$this->end_controls_section();

/**
 * Query
 */
$this->start_controls_section(
	'portfolio_query', [
		'label' => esc_html__('Query', 'vara-plugin')
	]
);

include(__DIR__ . '/query.php');

$this->end_controls_section();

/**
 * Layout
 */
$this->start_controls_section(
	'portfolio_style_layout', [
		'label' => esc_html__('Layout', 'vara-plugin')
	]
);

include(__DIR__ . '/layout.php');

$this->end_controls_section();

/**
 * Meta
 */
$this->start_controls_section(
	'portfolio_meta',
	[
		'label' => esc_html__('Meta', 'vara-plugin'),
	]
);

include(__DIR__ . '/meta.php');

$this->end_controls_section();

/**
 * Carousel
 */
$this->start_controls_section(
	'portfolio_carousel',
	[
		'label' => esc_html__('Carousel', 'vara-plugin'),
		'condition' => [
			'portfolio_layout' => 'carousel'
		]
	]
);

include(__DIR__ . '/carousel.php');

$this->end_controls_section();

/**
 * Justified
 */
$this->start_controls_section(
	'posts_justified',
	[
		'label' => esc_html__('Justified', 'vara-plugin'),
		'condition' => [
			'portfolio_layout_type' => 'justified'
		]
	]
);

include(__DIR__ . '/justified.php');

$this->end_controls_section();

/**
 * Filters
 */
$this->start_controls_section(
	'portfolio_filters',
	[
		'label' => esc_html__('Filters', 'vara-plugin'),
		'condition' => [
			'portfolio_layout' => 'isotope',
		]
	]
);

include(__DIR__ . '/filters.php');

$this->end_controls_section();

/**
 * Pagination
 */
$this->start_controls_section(
	'portfolio_pagination',
	[
		'label' => esc_html__('Pagination', 'vara-plugin'),
		'condition' => [
			'portfolio_layout' => 'isotope',
		]
	]
);

include(__DIR__ . '/pagination.php');

$this->end_controls_section();

/**
 * Thumbnail
 */
$this->start_controls_section(
	'portfolio_thumbnail',
	[
		'label' => esc_html__('Thumbnail', 'vara-plugin'),
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

include(__DIR__ . '/thumbnail.php');

$this->end_controls_section();