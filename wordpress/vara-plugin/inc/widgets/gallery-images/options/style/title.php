<?php
/**
 * Gallery Images > Style Options > Title
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'gallery_images_style_title_color',
	[
		'label' => esc_html__('Color', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-title' => 'color: {{VALUE}} !important'
		]
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Typography::get_type(),
	[
		'name' => 'gallery_images_style_title_typography',
		'label' => esc_html__('Typography', 'vara-plugin'),
		'selector' =>'
        {{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-title'
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Text_Shadow::get_type(),
	[
		'name' => 'gallery_images_style_title_shadow',
		'label' => esc_html__('Text Shadow', 'vara-plugin'),
		'selector' =>'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-title'
	]
);

$this->add_control(
	'gallery_images_style_title_alignment',
	[
		'label' => __('Alignment', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::CHOOSE,
		'options' => [
			'left' => [
				'title' => __('Left', 'vara-plugin'),
				'icon' => 'fa fa-align-left',
			],
			'center' => [
				'title' => __('Center', 'vara-plugin'),
				'icon' => 'fa fa-align-center',
			],
			'right' => [
				'title' => __('Right', 'vara-plugin'),
				'icon' => 'fa fa-align-right',
			],
		],
		'selectors' => [
			'{{WRAPPER}} .gs-gallery-images .gs-gallery-item .gallery-item-title' => 'text-align: {{VALUE}}'
		]
	]
);