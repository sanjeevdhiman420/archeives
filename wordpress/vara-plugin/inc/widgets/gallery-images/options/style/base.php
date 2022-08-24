<?php
/**
 * Gallery Images > Style Options
 */

/**
 * Hover
 */
$this->start_controls_section(
	'gallery_images_style_hover',
	[
		'label' => esc_html__('Hover', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		'conditions' => [
			'terms' => [
				[
					'name' => 'gallery_images_layout_model',
					'operator' => '!=',
					'value' => 'info-bottom'
				],
			]
		],
	]
);

include(__DIR__ . '/hover.php');

$this->end_controls_section();

/**
 * Image
 */
$this->start_controls_section(
	'gallery_images_style_image',
	[
		'label' => esc_html__('Image', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		'conditions' => [
			'terms' => [
				[
					'name' => 'gallery_images_layout_type',
					'operator' => '!=',
					'value' => 'justified'
				],
			]
		]
	]
);

include(__DIR__ . '/image.php');

$this->end_controls_section();

/**
 * Meta Box
 */
$this->start_controls_section(
	'gallery_images_style_meta_box',
	[
		'label' => esc_html__('Meta Box', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		'conditions' => [
			'terms' => [
				[
					'name' => 'gallery_images_layout_type',
					'operator' => '!=',
					'value' => 'justified'
				],
			]
		]
	]
);

include(__DIR__ . '/meta-box.php');

$this->end_controls_section();

/**
 * Title
 */
$this->start_controls_section(
	'gallery_images_style_title',
	[
		'label' => esc_html__('Title', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE
	]
);

include(__DIR__ . '/title.php');

$this->end_controls_section();

/**
 * Subitle
 */
$this->start_controls_section(
	'gallery_images_style_subtitle',
	[
		'label' => esc_html__('Subtitle', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	]
);

include(__DIR__ . '/subtitle.php');

$this->end_controls_section();

/**
 * Description
 */
$this->start_controls_section(
	'gallery_images_style_description',
	[
		'label' => esc_html__('Description', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	]
);

include(__DIR__ . '/description.php');

$this->end_controls_section();

/**
 * Filters
 */
$this->start_controls_section(
	'gallery_images_style_filters',
	[
		'label' => esc_html__('Filters', 'vara-plugin'),
		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		'conditions' => [
			'relation' => 'and',
			'terms' => [
				[
					'name' => 'gallery_images_layout',
					'operator' => '==',
					'value' => 'isotope'
				],
				[
					'name' => 'gallery_images_filters_visibility',
					'operator' => '==',
					'value' => 'yes'
				]
			]
		]
	]
);

include(__DIR__ . '/filters.php');

$this->end_controls_section();