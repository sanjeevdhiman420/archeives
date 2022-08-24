<?php
/**
 * Gallery Images > Content Options
 */

/**
 * Functionality
 */
$this->start_controls_section(
	'gallery_images_functionality',
	[
		'label' => esc_html__('Functionality', 'vara-plugin')
	]
);

include(__DIR__ . '/functionality.php');

$this->end_controls_section();

/**
 * Layout
 */
$this->start_controls_section(
	'gallery_images_style_layout',
	[
		'label' => esc_html__('Layout', 'vara-plugin')
	]
);

include(__DIR__ . '/layout.php');

$this->end_controls_section();

/**
 * Carousel
 */
$this->start_controls_section(
	'gallery_images_carousel',
	[
		'label' => esc_html__('Carousel', 'vara-plugin'),
		'condition' => [
			'gallery_images_layout' => 'carousel'
		]
	]
);

include(__DIR__ . '/carousel.php');

$this->end_controls_section();

/**
 * Justified
 */
$this->start_controls_section(
	'gallery_images_justified',
	[
		'label' => esc_html__('Justified', 'vara-plugin'),
		'condition' => [
			'gallery_images_layout_type' => 'justified'
		]
	]
);

include(__DIR__ . '/justified.php');

$this->end_controls_section();

/**
 * Filters
 */
$this->start_controls_section(
	'gallery_images_filters_section',
	[
		'label' => esc_html__('Filters', 'vara-plugin'),
		'conditions' => [
			'relation' => 'and',
			'terms' => [
				[
					'name' => 'gallery_images_layout',
					'operator' => '==',
					'value' => 'isotope',
				],
				[
					'name' => 'gallery_images_filters_visibility',
					'operator' => '==',
					'value' => 'yes',
				]
			]
		]
	]
);

include(__DIR__ . '/filters.php');

$this->end_controls_section();

/**
 * Thumbnail
 */
$this->start_controls_section(
	'gallery_images_thumbnail',
	[
		'label' => esc_html__('Thumbnail', 'vara-plugin')
	]
);

include(__DIR__ . '/thumbnail.php');

$this->end_controls_section();