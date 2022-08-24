<?php
/**
 * Portfolio > Style Options > Hover
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'portfolio_hover_visibility',
	[
		'label' => esc_html__('Visibility', 'vara-plugin'),
		'description' => esc_html__('Select the visibility of the hover.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'show'	=> esc_html__('Show', 'vara-plugin'),
			'hide'	=> esc_html__('Hide', 'vara-plugin')
		],
		'default' => 'show',
	]
);

$this->add_control(
	'portfolio_style_hover_active',
	[
		'label' => esc_html__('Active Hover', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('On', 'vara-plugin'),
		'label_off' => esc_html__('Off', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'no'
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Background::get_type(),
	[
		'name' => 'portfolio_style_hover_background_type',
		'label' => esc_html__('Background', 'vara-plugin'),
		'types' => ['classic', 'gradient'],
		'selector' => '{{WRAPPER}} .gs-portfolio-list .gs-portfolio-item .entry-overlay-wrapper .entry-thumbnail__overlay',
		'separator' => 'before'
	]
);

$this->add_responsive_control(
	'portfolio_style_hover_spacing',
	[
		'label' => esc_html__('Spacing', 'vara-plugin'),
		'size_units' => ['px', 'em', '%'],
		'devices' => ['desktop', 'tablet', 'mobile'],
		'type' => Controls_Manager::DIMENSIONS,
		'selectors' => [
			'{{WRAPPER}} .gs-portfolio-list .gs-portfolio-item .entry-overlay-wrapper .entry-thumbnail__overlay' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}}; left: {{LEFT}}{{UNIT}}',
		]
	]
);

$this->add_control(
	'portfolio_style_hover_meta_vertical_alignment',
	[
		'label' => esc_html__('Meta Vertical Alignment', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::CHOOSE,
		'options' => [
			'start' => [
				'title' => esc_html__('Top', 'vara-plugin'),
				'icon' => 'eicon-v-align-top'
			],
			'center' => [
				'title' => esc_html__('Middle', 'vara-plugin'),
				'icon' => 'eicon-v-align-middle'
			],
			'end' => [
				'title' => esc_html__('Bottom', 'vara-plugin'),
				'icon' => 'eicon-v-align-bottom'
			]
		],
		'conditions' => [
			'terms' => [
				[
					'name' => 'portfolio_layout_model',
					'operator' => '==',
					'value' => 'meta-overlay'
				]
			]
		],
		'separator' => 'before'
	]
);

$this->add_control(
	'portfolio_style_hover_type',
	[
		'label' => esc_html__('Meta Style on Hover', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'top' => esc_html__( 'From Top', 'vara-plugin' ),
			'right' => esc_html__( 'From Right', 'vara-plugin' ),
			'bottom' => esc_html__( 'From Bottom', 'vara-plugin' ),
			'left' => esc_html__( 'From Left', 'vara-plugin' ),
			'scale' => esc_html__( 'Scale', 'vara-plugin' ),
		],
		'default' => 'top',
		'conditions' => [
			'terms' => [
				[
					'name' => 'portfolio_layout_model',
					'operator' => '==',
					'value' => 'meta-overlay'
				]
			]
		],
		'separator' => 'before'
	]
);