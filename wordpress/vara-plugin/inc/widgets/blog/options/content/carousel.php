<?php
/**
 * Posts > Content Options > Carousel
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_responsive_control(
	'posts_carousel_items',
	[
		'label' => esc_html__('Items', 'vara-plugin'),
		'description' => esc_html__('The number of items you want to see on the screen.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'default' => 3,
		'min'     => 1,
		'max'     => 20,
		'step'    => 1
	]
);

$this->add_responsive_control(
	'posts_carousel_margin',
	[
		'label' => esc_html__('Margin', 'vara-plugin'),
		'description' => esc_html__('Enter the margin space, number will be represented in pixels.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'default' => 0,
		'min'     => 0,
		'max'     => 100,
		'step'    => 1
	]
);

$this->add_control(
	'posts_carousel_height',
	[
		'label' => esc_html__('Height', 'vara-plugin'),
		'description' => esc_html__('Set the height of images to auto or full.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'auto' => esc_html__('Auto', 'vara-plugin'),
			'full' => esc_html__('Full', 'vara-plugin')
		],
		'default' => 'auto'
	]
);

$this->add_responsive_control(
	'posts_carousel_custom_height',
	[
		'label' => esc_html__('Custom Height', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SLIDER,
		'size_units' => ['vh', 'px', '%'],
		'selectors' => [
			'{{WRAPPER}} .gs-entries-wrapper .owl-stage .owl-item .gs-full-height-img' => 'height: {{SIZE}}{{UNIT}};',
		],
		'default' => [
			'unit' => 'vh',
			'size' => '80'
		],
		'range' => [
			'px' => [
				'min' => 0,
				'max' => 1000,
				'step' => 5,
			]
		],
		'condition' => [
			'posts_carousel_height' => 'full'
		]
	]
);

$this->add_control(
	'posts_carousel_loop',
	[
		'label' => esc_html__('Loop', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('On', 'vara-plugin'),
		'label_off' => esc_html__('Off', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$this->add_control(
	'posts_carousel_mouse_drag',
	[
		'label' => esc_html__('Mouse Drag', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('On', 'vara-plugin'),
		'label_off' => esc_html__('Off', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
	]
);

$this->add_control(
	'posts_carousel_touch_drag',
	[
		'label' => esc_html__('Touch Drag', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('On', 'vara-plugin'),
		'label_off' => esc_html__('Off', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
	]
);

$this->add_control(
	'posts_carousel_navigation',
	[
		'label' => esc_html__('Navigation', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('On', 'vara-plugin'),
		'label_off' => esc_html__('Off', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$this->add_control(
	'posts_carousel_dots',
	[
		'label' => esc_html__('Dots', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('On', 'vara-plugin'),
		'label_off' => esc_html__('Off', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$this->add_control(
	'posts_carousel_autoplay',
	[
		'label' => esc_html__('Autoplay', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('On', 'vara-plugin'),
		'label_off' => esc_html__('Off', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$this->add_control(
	'posts_carousel_pause',
	[
		'label' => esc_html__('Pause on mouse house', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('On', 'vara-plugin'),
		'label_off' => esc_html__('Off', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$this->add_responsive_control(
	'posts_carousel_stage_padding',
	[
		'label' => esc_html__('Stage Padding', 'vara-plugin'),
		'description' => esc_html__('Padding left and right on stage (can see neighbours).', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'default' => 0,
		'min'     => 0,
		'max'     => 500,
		'step'    => 1
	]
);

$this->add_control(
	'posts_carousel_start_position',
	[
		'label' => esc_html__('Start Position', 'vara-plugin'),
		'description' => esc_html__('Enter from which element you want to start the position of carousel.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'default' => 0,
		'min'     => 0,
		'max'     => 500,
		'step'    => 1
	]
);

$this->add_control(
	'posts_carousel_autoplay_timeout',
	[
		'label' => esc_html__('Auto Play Timeout', 'vara-plugin'),
		'description' => esc_html__('Autoplay interval timeout, number is represented in seconds.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'default' => 2,
		'min'     => 0,
		'max'     => 500,
		'step'    => 0.1
	]
);

$this->add_control(
	'posts_carousel_smart_speed',
	[
		'label' => esc_html__('Smart Speed', 'vara-plugin'),
		'description' => esc_html__('Speed Calculate, number is represented in seconds.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'default' => 4.5,
		'min'     => 0,
		'max'     => 500,
		'step'    => 0.1
	]
);