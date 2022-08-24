<?php
/**
 * Portfolio > Style Options > Title
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'portfolio_style_title_color',
	[
		'label' => esc_html__('Color', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .gs-portfolio-list .gs-portfolio-item .entry-details-title a' => 'color: {{VALUE}} !important'
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' => 'portfolio_style_title_typography',
		'label' => esc_html__('Typography', 'vara-plugin'),
		'selector' => '{{WRAPPER}} .gs-portfolio-list .gs-portfolio-item .entry-details-title',
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Text_Shadow::get_type(),
	[
		'name' => 'portfolio_style_title_shadow',
		'label' => esc_html__('Text Shadow', 'vara-plugin'),
		'selector' =>'
        {{WRAPPER}} .gs-portfolio-list .gs-portfolio-item .entry-details-title',
	]
);

$this->add_control(
	'portfolio_style_title_alignment',
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
		'selectors' => [
			'{{WRAPPER}} .gs-portfolio-list .gs-portfolio-item .entry-details-title' => 'text-align: {{VALUE}}'
		]
	]
);