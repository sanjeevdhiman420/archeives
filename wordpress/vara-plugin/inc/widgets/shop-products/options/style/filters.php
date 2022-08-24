<?php
/**
 * Posts > Style Options > Filters
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'products_style_filters_color',
	[
		'label' => esc_html__('Color', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .gs-filters ul li a' => 'color: {{VALUE}}',
		]
	]
);

$this->add_control(
	'products_style_filters_hover_color',
	[
		'label' => esc_html__('Hover & Active', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .gs-filters ul li.active a' => 'color: {{VALUE}}',
			'{{WRAPPER}} .gs-filters ul li:hover a' => 'color: {{VALUE}}'
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' => 'products_style_filters_typography',
		'label' => esc_html__('Typography', 'vara-plugin'),
		'selector' => '{{WRAPPER}} .gs-filters ul li a'
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Text_Shadow::get_type(),
	[
		'name' => 'products_style_filters_shadow',
		'label' => esc_html__('Text Shadow', 'vara-plugin'),
		'selector' => '{{WRAPPER}} .gs-filters ul li a'
	]
);

$this->add_responsive_control(
	'products_style_filters_spacing',
	[
		'label' => esc_html__('Spacing', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SLIDER,
		'size_units' => ['vw', 'px', '%'],
		'selectors' => [
			'{{WRAPPER}} .gs-filters ul li' => 'margin-left: {{SIZE}}{{UNIT}};',
		],
	]
);

$this->add_control(
	'products_style_filters_alignment',
	[
		'label' => esc_html__('Alignment', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::CHOOSE,
		'options' => [
			'left' => [
				'title' => esc_html__('Left', 'vara-plugin'),
				'icon' => 'fa fa-align-left',
			],
			'center' => [
				'title' => esc_html__('Center', 'vara-plugin'),
				'icon' => 'fa fa-align-center',
			],
			'right' => [
				'title' => esc_html__('Right', 'vara-plugin'),
				'icon' => 'fa fa-align-right',
			],
		],
		'default' => 'left'
	]
);