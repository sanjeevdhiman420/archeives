<?php
/**
 * Portfolio > Style Options > Entry Details
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_responsive_control(
	'portfolio_style_entry_details_margin',
	[
		'label' => esc_html__('Margin', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'size_units' => ['px', '%'],
		'devices' => ['desktop', 'tablet', 'mobile'],
		'selectors' => [
			'{{WRAPPER}} .gs-portfolio-list .gs-portfolio-item--classic-grid .entry-details__inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			'{{WRAPPER}} .gs-portfolio-list .gs-portfolio-item--meta-overlay .entry-overlay-wrapper .entry-details__inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
		]
	]
);

$this->add_responsive_control(
	'portfolio_style_entry_details_padding',
	[
		'label' => esc_html__('Padding', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'size_units' => ['px', 'em', '%'],
		'devices' => ['desktop', 'tablet', 'mobile'],
		'selectors' => [
			'{{WRAPPER}} .gs-portfolio-list .gs-portfolio-item--classic-grid .entry-details__inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			'{{WRAPPER}} .gs-portfolio-list .gs-portfolio-item--meta-overlay .entry-overlay-wrapper .entry-details__inner .portfolio-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
		],
	]
);

$this->add_control(
	'portfolio_style_entry_details_spacing',
	[
		'label' => esc_html__('Spacing', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'size_units' => ['px', 'em', '%'],
		'devices' => ['desktop', 'tablet', 'mobile'],
		'selectors' => [
			'{{WRAPPER}} .gs-portfolio-list .gs-portfolio-item--meta-overlay .entry-overlay-wrapper .entry-details' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}}; left: {{LEFT}}{{UNIT}}',
		],
		'conditions' => [
			'terms' => [
				[
					'name' => 'portfolio_layout_model',
					'operator' => '==',
					'value' => 'meta-overlay',
				]
			]
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Background::get_type(),
	[
		'name' => 'portfolio_style_meta_box_background',
		'label' => esc_html__('Background', 'vara-plugin'),
		'types' => ['classic', 'gradient'],
		'separator' => 'before',
		'selector' => '{{WRAPPER}} .gs-portfolio-list .gs-portfolio-item--meta-overlay .entry-overlay-wrapper .entry-details .portfolio-info'
	]
);

$this->add_control(
	'portfolio_style_entry_details_border_type',
	[
		'label' => esc_html__('Border Type', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'none' => esc_html__('None', 'vara-plugin'),
			'solid' => esc_html__('Solid', 'vara-plugin'),
			'double' => esc_html__('Double', 'vara-plugin'),
			'dotted' => esc_html__('Dotted', 'vara-plugin'),
			'dashed' => esc_html__('Dashed', 'vara-plugin'),
			'groove' => esc_html__('Groove', 'vara-plugin')
		],
		'default' => 'none',
		'separator' => 'before',
		'selectors' => [
			'{{WRAPPER}} .gs-portfolio-item--meta-overlay .entry-overlay-wrapper .entry-details__inner' => 'border-style: {{VALUE}}',
			'{{WRAPPER}} .gs-portfolio-item--classic-grid .entry-details__inner' => 'border-style: {{VALUE}}'
		],
	]
);

$this->add_control(
	'portfolio_style_entry_details_border_width',
	[
		'label' => esc_html__('Border Width', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'conditions' => [
			'terms' => [
				[
					'name' => 'portfolio_style_entry_details_border_type',
					'operator' => '!=',
					'value' => 'none',
				]
			]
		],
		'selectors' => [
			'{{WRAPPER}} .gs-portfolio-item--meta-overlay .entry-overlay-wrapper .entry-details__inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
			'{{WRAPPER}} .gs-portfolio-item--classic-grid .entry-details__inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
		],
	]
);

$this->add_control(
	'portfolio_style_entry_details_border_color',
	[
		'label' => esc_html__('Border Color', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'conditions' => [
			'terms' => [
				[
					'name' => 'portfolio_style_entry_details_border_type',
					'operator' => '!=',
					'value' => 'none',
				]
			]
		],
		'selectors' => [
			'{{WRAPPER}} .gs-portfolio-item--meta-overlay .entry-overlay-wrapper .entry-details__inner' => 'border-color: {{VALUE}}',
			'{{WRAPPER}} .gs-portfolio-item--classic-grid .entry-details__inner' => 'border-color: {{VALUE}}'
		],
	]
);

$this->add_control(
	'portfolio_style_entry_details_border_radius',
	[
		'label' => esc_html__('Border Radius', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'selectors' => [
			'{{WRAPPER}} .gs-portfolio-item--meta-overlay .entry-overlay-wrapper .entry-details__inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
			'{{WRAPPER}} .gs-portfolio-item--classic-grid .entry-details__inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
		],
	]
);