<?php
/**
 * Gallery Images > Content Options > Layout
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_responsive_control(
	'gallery_images_columns',
	[
		'label' => esc_html__('Columns', 'vara-plugin'),
		'description' => esc_html__('Select the columns of the isotope grid.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'1-column'			 	=> esc_html__('1 Column', 'vara-plugin'),
			'2-columns'			 	=> esc_html__('2 Columns', 'vara-plugin'),
			'3-columns'			 	=> esc_html__('3 Columns', 'vara-plugin'),
			'4-columns'			 	=> esc_html__('4 Columns', 'vara-plugin'),
			'5-columns'			 	=> esc_html__('5 Columns', 'vara-plugin'),
			'6-columns'			 	=> esc_html__('6 Columns', 'vara-plugin')
		],
		'default' => '3-columns',
		'tablet_default' => '2-columns',
		'mobile_default' => '1-column',
		'conditions' => [
			'relation' => 'and',
			'terms' => [
				[
					'name' => 'gallery_images_layout',
					'operator' => '!=',
					'value' => 'carousel'
				],
				[
					'name' => 'gallery_images_layout_type',
					'operator' => '!==',
					'value' => 'metro',
				],
				[
					'name' => 'gallery_images_layout_type',
					'operator' => '!==',
					'value' => 'justified',
				],
			]
		]
	]
);

$this->add_control(
	'gallery_images_animation',
	[
		'label' => esc_html__('Animation', 'vara-plugin'),
		'description' => esc_html__('Select initial loading animation for posts.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'none' 				 	=> esc_html__('None', 'vara-plugin'),
			'gsFadeIn'	 	=> esc_html__('Fade In', 'vara-plugin'),
			'gsFadeInUp' 	  	=> esc_html__('Fade In Up', 'vara-plugin'),
			'gsFadeInLeft'  	=> esc_html__('Fade In Left', 'vara-plugin'),
			'gsFadeInRight' 	=> esc_html__('Fade In Right', 'vara-plugin'),
			'gsZoomIn' 	 	=> esc_html__('Zoom In', 'vara-plugin'),
			'gsPreserve3d' 	=> esc_html__('Preserve 3d', 'vara-plugin')
		],
		'default' => 'gsFadeIn',
	]
);

$this->add_control(
	'gallery_images_animation_delay',
	[
		'label' => esc_html__('Animation Delay', 'vara-plugin'),
		'description' => esc_html__('Activate the delay effect on posts.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'return_value' => 'yes',
		'default' => 'no',
		'condition' => [
			'gallery_images_animation!' => 'none'
		]
	]
);

$this->add_control(
	'gallery_images_frames',
	[
		'label' => esc_html__('Browser Frame', 'vara-plugin'),
		'description' => esc_html__('Add browser frame on gallery images', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'return_value' => 'yes',
		'default' => 'no',
		'conditions' => [
			'relation' => 'and',
			'terms' => [
				[
					'name' => 'gallery_images_layout_type',
					'operator' => '!=',
					'value' => 'justified'
				],
			],
		]
	]
);

$this->add_responsive_control(
	'gallery_images_spacing',
	[
		'label' => esc_html__('Spacing', 'vara-plugin'),
		'description' => __('Move the slider to set the value of spacing. <br /><small>Note: The value is represented in pixels.</small>', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SLIDER,
		'conditions' => [
			'terms' => [
				[
					'name' => 'gallery_images_layout',
					'operator' => '==',
					'value' => 'isotope',
				],
				[
					'name' => 'gallery_images_layout_type',
					'operator' => '!=',
					'value' => 'justified',
				],
			],
		],
		'size_units' => ['px', 'rem', '%'],
		'range' => [
			'px' => [
				'min' => 0,
				'max' => 200,
				'step' => 1,
			],
		],
		'condition' => [
			'gallery_images_layout' => 'isotope'
		],
		'selectors' => [
			'{{WRAPPER}} .isotope-container' => 'margin-left: calc(-{{SIZE}}{{UNIT}} / 2); margin-right: calc(-{{SIZE}}{{UNIT}} / 2)',
			'{{WRAPPER}} .isotope-container .iso-item' => 'padding-left: calc({{SIZE}}{{UNIT}} / 2); padding-right: calc({{SIZE}}{{UNIT}} / 2);  margin-bottom: {{SIZE}}{{UNIT}};'
		],
		'render_type' => 'template'
	]
);