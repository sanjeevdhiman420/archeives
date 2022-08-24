<?php
/**
 * Posts > Content Options > Layout
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_responsive_control(
	'posts_columns',
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
			'terms' => [
				[
					'name' => 'posts_layout',
					'operator' => '==',
					'value' => 'isotope',
				],
				[
					'name' => 'posts_layout_type',
					'operator' => '!=',
					'value' => 'justified',
				],
				[
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'posts_layout',
							'operator' => '==',
							'value' => 'carousel'
						],
						[
							'name' => 'posts_layout_type',
							'operator' => '!==',
							'value' => 'metro',
						],
					]
				]
			],
		]
	]
);

$this->add_control(
	'posts_animation',
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
			'gsZoomOut' 	 	=> esc_html__('Zoom Out', 'vara-plugin'),
			'gsPreserve3d' 	=> esc_html__('Preserve 3d', 'vara-plugin')
		],
		'default' => 'gsFadeIn',
	]
);

$this->add_control(
	'posts_animation_delay',
	[
		'label' => esc_html__('Animation Delay', 'vara-plugin'),
		'description' => esc_html__('Activate the delay effect on posts.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'return_value' => 'yes',
		'default' => 'no',
		'condition' => [
			'posts_animation!' => 'none'
		]
	]
);

$this->add_control(
	'posts_offset',
	[
		'label' => esc_html__('Offset', 'vara-plugin'),
		'description' => esc_html__('Activate an offset layout which will set spacing every second post.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'return_value' => 'yes',
		'default' => 'no',
		'prefix_class' => 'layout-waves-',
		'conditions' => [
			'terms' => [
				[
					'name' => 'posts_layout',
					'operator' => '==',
					'value' => 'isotope',
				],
				[
					'name' => 'posts_layout_type',
					'operator' => '!=',
					'value' => 'metro',
				],
				[
					'name' => 'posts_layout_type',
					'operator' => '!=',
					'value' => 'justified',
				],
			],
		]
	]
);

$this->add_responsive_control(
	'posts_spacing',
	[
		'label' => esc_html__('Spacing', 'vara-plugin'),
		'description' => __('Move the slider to set the value of spacing. <br /><small>Note: The value is represented in pixels.</small>', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SLIDER,
		'condition' => [
			'posts_layout' => 'isotope',
			'posts_layout_type!' => 'justified'
		],
		'size_units' => ['px', 'rem', '%'],
		'range' => [
			'px' => [
				'min' => 0,
				'max' => 200,
				'step' => 1,
			],
		],
		'selectors' => [
			'{{WRAPPER}} .isotope-container' => 'margin-left: calc(-{{SIZE}}{{UNIT}} / 2); margin-right: calc(-{{SIZE}}{{UNIT}} / 2)',
			'{{WRAPPER}} .isotope-container .iso-item' => 'padding-left: calc({{SIZE}}{{UNIT}} / 2); padding-right: calc({{SIZE}}{{UNIT}} / 2); margin-bottom: {{SIZE}}{{UNIT}} !important;',
			'{{WRAPPER}}.layout-waves-yes .iso-item[data-col-num="2-columns"]:nth-child(2)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
			'{{WRAPPER}}.layout-waves-yes .iso-item[data-col-num="3-columns"]:nth-child(1)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
			'{{WRAPPER}}.layout-waves-yes .iso-item[data-col-num="3-columns"]:nth-child(3)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
			'{{WRAPPER}}.layout-waves-yes .iso-item[data-col-num="4-columns"]:nth-child(1)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
			'{{WRAPPER}}.layout-waves-yes .iso-item[data-col-num="4-columns"]:nth-child(3)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
			'{{WRAPPER}}.layout-waves-yes .iso-item[data-col-num="5-columns"]:nth-child(1)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
			'{{WRAPPER}}.layout-waves-yes .iso-item[data-col-num="5-columns"]:nth-child(3)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
			'{{WRAPPER}}.layout-waves-yes .iso-item[data-col-num="5-columns"]:nth-child(5)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
			'{{WRAPPER}}.layout-waves-yes .iso-item[data-col-num="6-columns"]:nth-child(1)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
			'{{WRAPPER}}.layout-waves-yes .iso-item[data-col-num="6-columns"]:nth-child(3)' => 'margin-top: {{SIZE}}{{UNIT}} !important',
			'{{WRAPPER}}.layout-waves-yes .iso-item[data-col-num="6-columns"]:nth-child(5)' => 'margin-top: {{SIZE}}{{UNIT}} !important'
		],
		'render_type' => 'template'
	]
);