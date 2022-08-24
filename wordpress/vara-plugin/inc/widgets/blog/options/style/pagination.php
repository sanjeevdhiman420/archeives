<?php
/**
 * Posts > Style Options > Pagination
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' => 'posts_style_pagination_typography',
		'label' => esc_html__('Typography', 'vara-plugin'),
		'selector' => '{{WRAPPER}} .show-more-pagination > a, {{WRAPPER}} .gs-pagination ul.gs-pages-list li a'
	]
);

$this->start_controls_tabs(
	'posts_style_pagination_button'
);

$this->start_controls_tab(
	'posts_style_pagination_normal_tab',
	[
		'label' => esc_html__('Normal', 'vara-plugin')
	]
);

$this->add_control(
	'posts_style_pagination_color',
	[
		'label' => esc_html__('Color', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .show-more-pagination > a' => 'color: {{VALUE}} !important',
			'{{WRAPPER}} .gs-pagination ul.gs-pages-list li a' => 'color: {{VALUE}} !important',
		]
	]
);

$this->add_control(
	'posts_style_pagination_background_color',
	[
		'label' => esc_html__('Background Color', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .show-more-pagination > a' => 'background-color: {{VALUE}}',
			'{{WRAPPER}} .gs-pagination ul.gs-pages-list li a' => 'background-color: {{VALUE}}',
		]
	]
);

$this->end_controls_tab();

$this->start_controls_tab(
	'posts_style_pagination_hover_tab',
	[
		'label' => esc_html__('Hover', 'vara-plugin')
	]
);

$this->add_control(
	'posts_style_pagination_color_hover',
	[
		'label' => esc_html__('Color', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .show-more-pagination > a:hover' => 'color: {{VALUE}} !important',
			'{{WRAPPER}} .gs-pagination ul.gs-pages-list li a:hover' => 'color: {{VALUE}}',
			'{{WRAPPER}} .gs-pagination ul.gs-pages-list li.active a' => 'color: {{VALUE}} !important'
		]
	]
);

$this->add_control(
	'posts_style_pagination_background_color_hover',
	[
		'label' => esc_html__('Background Color', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .show-more-pagination > a:hover' => 'background-color: {{VALUE}}',
			'{{WRAPPER}} .gs-pagination ul.gs-pages-list li a:hover' => 'background-color: {{VALUE}}',
			'{{WRAPPER}} .gs-pagination ul.gs-pages-list li.active a' => 'background-color: {{VALUE}} !important',
		]
	]
);

$this->add_control(
	'posts_style_pagination_hover_animation',
	[
		'label' => esc_html__('Hover Animation', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
		'condition' => [
			'posts_pagination_style' => 'show-more'
		]
	]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->add_control(
	'posts_style_pagination_border_type',
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
		'condition' => [
			'posts_pagination_style' => 'show-more'
		],
		'selectors' => [
			'{{WRAPPER}} .show-more-pagination > a' => 'border-style: {{VALUE}}',
		],
	]
);

$this->add_control(
	'posts_style_pagination_border_width',
	[
		'label' => esc_html__('Border Width', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'conditions' => [
			'terms' => [
				[
					'name' => 'posts_style_pagination_border_type',
					'operator' => '!=',
					'value' => 'none',
				],
				[
					'name' => 'posts_pagination_style',
					'operator' => '==',
					'value' => 'show-more',
				]
			]
		],
		'selectors' => [
			'{{WRAPPER}} .show-more-pagination > a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
		],
	]
);

$this->add_control(
	'posts_style_pagination_border_color',
	[
		'label' => esc_html__('Border Color', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'conditions' => [
			'terms' => [
				[
					'name' => 'posts_style_pagination_border_type',
					'operator' => '!=',
					'value' => 'none',
				],
				[
					'name' => 'posts_pagination_style',
					'operator' => '==',
					'value' => 'show-more',
				],
			]
		],
		'selectors' => [
			'{{WRAPPER}} .show-more-pagination > a' => 'border-color: {{VALUE}}',
		],
	]
);

$this->add_control(
	'posts_style_pagination_border_radius',
	[
		'label' => esc_html__('Border Radius', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'conditions' => [
			'terms' => [
				[
					'name' => 'posts_pagination_style',
					'operator' => '==',
					'value' => 'show-more',
				],
			]
		],
		'selectors' => [
			'{{WRAPPER}} .show-more-pagination > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
		],
	]
);

$this->add_responsive_control(
	'posts_style_pagination_margin',
	[
		'label' => esc_html__('Margin', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'size_units' => ['px', '%', 'em'],
		'selectors' => [
			'{{WRAPPER}} .show-more-pagination > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			'{{WRAPPER}} .gs-pagination' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
		'separator' => 'before'
	]
);

$this->add_responsive_control(
	'posts_style_pagination_padding',
	[
		'label' => esc_html__('Padding', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::DIMENSIONS,
		'size_units' => ['px', 'em', '%'],
		'selectors' => [
			'{{WRAPPER}} .show-more-pagination > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
		'condition' => [
			'posts_pagination_style' => 'show-more'
		]
	]
);

$this->add_control(
	'posts_style_pagination_alignment',
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
		'default' => 'center',
		'condition' => [
			'posts_pagination_style' => 'show-more'
		],
	]
);