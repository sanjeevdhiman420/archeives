<?php
/**
 * Gallery Images > Style Options > Meta Box
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_responsive_control(
	'gallery_images_style_meta_box_margin',
	[
		'label' => esc_html__('Margin', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'size_units' => ['px', '%'],
		'devices' => ['desktop', 'tablet', 'mobile'],
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-details .gallery-item-details-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
		]
	]
);

$this->add_responsive_control(
	'gallery_images_style_meta_box_padding',
	[
		'label' => esc_html__('Padding', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'size_units' => ['px', 'em', '%'],
		'devices' => ['desktop', 'tablet', 'mobile'],
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-details .gallery-item-details-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Background::get_type(),
	[
		'name' => 'gallery_images_style_meta_box_background',
		'label' => esc_html__('Background', 'vara-plugin'),
		'types' => ['classic', 'gradient'],
		'separator' => 'before',
		'selector' => '{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-details .gallery-item-details-inner'
	]
);

$this->add_control(
	'gallery_images_style_meta_box_border_type',
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
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-details .gallery-item-details-inner' => 'border-style: {{VALUE}}'
		],
	]
);

$this->add_control(
	'gallery_images_style_meta_box_border_width',
	[
		'label' => esc_html__('Border Width', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'conditions' => [
			'terms' => [
				[
					'name' => 'gallery_images_style_meta_box_border_type',
					'operator' => '!=',
					'value' => 'none',
				]
			]
		],
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-details .gallery-item-details-inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
		],
	]
);

$this->add_control(
	'gallery_images_style_meta_box_border_color',
	[
		'label' => esc_html__('Border Color', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'conditions' => [
			'terms' => [
				[
					'name' => 'gallery_images_style_meta_box_border_type',
					'operator' => '!=',
					'value' => 'none',
				]
			]
		],
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-details .gallery-item-details-inner' => 'border-color: {{VALUE}}'
		],
	]
);

$this->add_control(
	'gallery_images_style_meta_box_border_radius',
	[
		'label' => esc_html__('Border Radius', 'vara-plugin'),
		'type' => Controls_Manager::DIMENSIONS,
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-details .gallery-item-details-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
		],
	]
);