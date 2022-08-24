<?php
/**
 * Posts > Content Options
 */

/**
 * Functionality
 */
$this->start_controls_section(
	'posts_functionality', [
		'label' => esc_html__('Functionality', 'vara-plugin')
	]
);

include(__DIR__ . '/functionality.php');

$this->end_controls_section();

/**
 * Query
 */
$this->start_controls_section(
	'posts_query', [
		'label' => esc_html__('Query', 'vara-plugin')
	]
);

include(__DIR__ . '/query.php');

$this->end_controls_section();

/**
 * Layout
 */
$this->start_controls_section(
	'posts_style_layout', [
		'label' => esc_html__('Layout', 'vara-plugin')
	]
);

include(__DIR__ . '/layout.php');

$this->end_controls_section();

/**
 * Meta
 *
 * In all cases visible except meta
 * tooltip and fixed, can't be hidden
 * in the JavaScript properly.
 */
$this->start_controls_section(
	'posts_meta',
	[
		'label' => esc_html__('Meta', 'vara-plugin'),
	]
);

include(__DIR__ . '/meta.php');

$this->end_controls_section();

/**
 * Carousel
 *
 * Options that are listed only
 * when carousel is selected
 * as layout.
 */
$this->start_controls_section(
	'posts_carousel',
	[
		'label' => esc_html__('Carousel', 'vara-plugin'),
		'condition' => [
			'posts_layout' => 'carousel'
		]
	]
);

include(__DIR__ . '/carousel.php');

$this->end_controls_section();

/**
 * Justified
 *
 * Options that are listed only
 * when justified is selected
 * as layout type.
 */
$this->start_controls_section(
	'posts_justified',
	[
		'label' => esc_html__('Justified', 'vara-plugin'),
		'condition' => [
			'posts_layout_type' => 'justified'
		]
	]
);

include(__DIR__ . '/justified.php');

$this->end_controls_section();

/**
 * Filters
 *
 * Are displayed only
 * in isotope layout.
 */
$this->start_controls_section(
	'posts_filters',
	[
		'label' => esc_html__('Filters', 'vara-plugin'),
		'condition' => [
			'posts_layout' => 'isotope',
		]
	]
);

include(__DIR__ . '/filters.php');

$this->end_controls_section();

/**
 * Pagination
 */
$this->start_controls_section(
	'posts_pagination',
	[
		'label' => esc_html__('Pagination', 'vara-plugin'),
		'condition' => [
			'posts_layout' => 'isotope',
		]
	]
);

include(__DIR__ . '/pagination.php');

$this->end_controls_section();

/**
 * Thumbnail
 */
$this->start_controls_section(
	'posts_thumbnail',
	[
		'label' => esc_html__('Thumbnail', 'vara-plugin'),
		'conditions' => [
			'terms' => [
				[
					'name' => 'posts_meta_thumbnail',
					'operator' => '==',
					'value' => 'yes'
				],
			]
		]
	]
);

include(__DIR__ . '/thumbnail.php');

$this->end_controls_section();