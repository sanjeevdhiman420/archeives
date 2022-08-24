<?php
/**
 * Posts > Style Options > Excerpt
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'posts_style_excerpt_color',
	[
		'label' => esc_html__('Color', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .gs-blog-wrapper .gs-blog-post .entry-details p' => 'color: {{VALUE}}',
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' => 'posts_style_excerpt_typography',
		'label' => esc_html__('Typography', 'vara-plugin'),
		'selector' =>'{{WRAPPER}} .gs-blog-wrapper .gs-blog-post .entry-details p'
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Text_Shadow::get_type(),
	[
		'name' => 'posts_style_excerpt_shadow',
		'label' => esc_html__('Text Shadow', 'vara-plugin'),
		'selector' =>'{{WRAPPER}} .gs-blog-wrapper .gs-blog-post .entry-details p'
	]
);

$this->add_control(
	'posts_style_excerpt_alignment',
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
			'{{WRAPPER}} .gs-blog-wrapper .gs-blog-post .entry-details p' => 'text-align: {{VALUE}}',
		]
	]
);