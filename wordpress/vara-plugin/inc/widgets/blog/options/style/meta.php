<?php
/**
 * Posts > Style Options > Meta
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'posts_style_meta_color',
	[
		'label' => esc_html__('Color', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .gs-blog-wrapper .gs-blog-post .entry-details .entry-details-meta .entry-meta-date' => 'color: {{VALUE}} !important',
			'{{WRAPPER}} .gs-blog-wrapper .gs-blog-post .entry-details .entry-details-meta .entry-meta-category ul li a' => 'color: {{VALUE}} !important',
			'{{WRAPPER}} .gs-blog-wrapper .gs-blog-post .entry-details .entry-details-meta .entry-meta-tags ul li a' => 'color: {{VALUE}} !important',
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' => 'posts_style_meta_typography',
		'label' => esc_html__('Typography', 'vara-plugin'),
		'selector' =>'
        {{WRAPPER}} .gs-blog-wrapper .gs-blog-post .entry-details .entry-details-meta .entry-meta-date,
        {{WRAPPER}} .gs-blog-wrapper .gs-blog-post .entry-details .entry-details-meta .entry-meta-category ul li a,
        {{WRAPPER}} .gs-blog-wrapper .gs-blog-post .entry-details .entry-details-meta .entry-meta-tags ul li a'
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Text_Shadow::get_type(),
	[
		'name' => 'posts_style_meta_shadow',
		'label' => esc_html__('Text Shadow', 'vara-plugin'),
		'selector' => '
        {{WRAPPER}} .gs-blog-wrapper .gs-blog-post .entry-details .entry-details-meta .entry-meta-date,
        {{WRAPPER}} .gs-blog-wrapper .gs-blog-post .entry-details .entry-details-meta .entry-meta-category ul li a,
        {{WRAPPER}} .gs-blog-wrapper .gs-blog-post .entry-details .entry-details-meta .entry-meta-tags ul li a'
	]
);

$this->add_control(
	'posts_style_meta_alignment',
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
		'separator' => 'before',
		'selectors' => [
			'{{WRAPPER}} .gs-blog-wrapper .gs-blog-post .entry-details .entry-details-meta' => 'text-align: {{VALUE}}',
		]
	]
);