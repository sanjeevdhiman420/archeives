<?php
/**
 * Gallery Images > Style Options > Subtitle
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'gallery_images_style_subtitle_color',
	[
		'label' => esc_html__('Color', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-subtitle span' => 'color: {{VALUE}} !important'
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' => 'gallery_images_style_subtitle_typography',
		'label' => esc_html__('Typography', 'vara-plugin'),
		'selector' => '{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-subtitle span'
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Text_Shadow::get_type(),
	[
		'name' => 'gallery_images_style_subtitle_shadow',
		'label' => esc_html__('Text Shadow', 'vara-plugin'),
		'selector' => '{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-subtitle span'
	]
);

$this->add_control(
	'gallery_images_style_subtitle_alignment',
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
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-subtitle' => 'text-align: {{VALUE}}'
		]
	]
);