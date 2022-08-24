<?php
/**
 * Media Gallery > Style Options > Image
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_responsive_control(
	'gallery_images_style_image_margin',
	[
		'label' => esc_html__('Margin', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'size_units' => ['px', '%'],
		'devices' => ['desktop', 'tablet', 'mobile'],
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-inner .gallery-item-thumbnail-holder' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		]
	]
);

$this->add_responsive_control(
	'gallery_images_style_image_padding',
	[
		'label' => esc_html__('Padding', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'size_units' => ['px', 'em', '%'],
		'devices' => ['desktop', 'tablet', 'mobile'],
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-inner .gallery-item-thumbnail-holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
		'separator' => 'after'
	]
);

$this->start_controls_tabs(
	'gallery_images_style_image_tabs'
);

$this->start_controls_tab(
	'gallery_images_style_image_normal_tab',
	[
		'label' => esc_html__('Normal', 'vara-plugin')
	]
);

$this->add_control(
	'gallery_images_style_image_border_type',
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
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-inner .gallery-item-thumbnail-holder' => 'border-style: {{VALUE}}'
		],
	]
);

$this->add_control(
	'gallery_images_style_image_border_width',
	[
		'label' => esc_html__('Border Width', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'conditions' => [
			'terms' => [
				[
					'name' => 'gallery_images_style_image_border_type',
					'operator' => '!=',
					'value' => 'none',
				]
			]
		],
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-inner .gallery-item-thumbnail-holder' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
		],
	]
);

$this->add_control(
	'gallery_images_style_image_border_color',
	[
		'label' => esc_html__('Border Color', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'conditions' => [
			'terms' => [
				[
					'name' => 'gallery_images_style_image_border_type',
					'operator' => '!=',
					'value' => 'none',
				]
			]
		],
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-inner .gallery-item-thumbnail-holder' => 'border-color: {{VALUE}}'
		],
	]
);

$this->add_responsive_control(
	'gallery_images_style_image_border_radius',
	[
		'label' => esc_html__('Border Radius', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-inner .gallery-item-thumbnail-holder' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Box_Shadow::get_type(),
	[
		'name' => 'gallery_images_style_image_box_shadow',
		'label' => esc_html__('Box Shadow', 'vara-plugin'),
		'selector' => '{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-inner .gallery-item-thumbnail-holder',
	]
);


$this->end_controls_tab();

$this->start_controls_tab(
	'gallery_images_style_image_hover_tab',
	[
		'label' => esc_html__('Hover', 'vara-plugin')
	]
);

$this->add_control(
	'gallery_images_style_image_hover_border_type',
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
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-inner .gallery-item-thumbnail-holder:hover' => 'border-style: {{VALUE}}'
		],
	]
);

$this->add_control(
	'gallery_images_style_image_hover_border_width',
	[
		'label' => esc_html__('Border Width', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'conditions' => [
			'terms' => [
				[
					'name' => 'gallery_images_style_image_hover_border_type',
					'operator' => '!=',
					'value' => 'none',
				]
			]
		],
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-inner .gallery-item-thumbnail-holder:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
		],
	]
);

$this->add_control(
	'gallery_images_style_image_hover_border_color',
	[
		'label' => esc_html__('Border Color', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'conditions' => [
			'terms' => [
				[
					'name' => 'gallery_images_style_image_hover_border_type',
					'operator' => '!=',
					'value' => 'none',
				]
			]
		],
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-inner .gallery-item-thumbnail-holder:hover' => 'border-color: {{VALUE}}'
		],
	]
);

$this->add_control(
	'gallery_images_style_image_hover_border_radius',
	[
		'label' => esc_html__('Border Radius', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-inner .gallery-item-thumbnail-holder:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Box_Shadow::get_type(),
	[
		'name' => 'gallery_images_style_image_hover_box_shadow',
		'label' => esc_html__('Box Shadow', 'vara-plugin'),
		'selector' => '{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-inner .gallery-item-thumbnail-holder:hover',
	]
);

$this->end_controls_tab();

$this->end_controls_tabs();