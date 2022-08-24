<?php
/**
 * Gallery Images > Style Options > Hover
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'gallery_images_hover_visibility',
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
	'gallery_images_style_hover_active',
	[
		'label' => esc_html__('Active Hover', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('On', 'vara-plugin'),
		'label_off' => esc_html__('Off', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$this->add_control(
	'gallery_images_image_hover',
	[
		'label' => esc_html__('Image Hover Effect', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'' => esc_html__('None','vara-plugin'),
			'zoom' => esc_html__( 'Zoom','vara-plugin'),
			'translatex' => esc_html__( 'TranslateX','vara-plugin'),
		],
		'default' => ''
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Background::get_type(),
	[
		'name' => 'gallery_images_style_hover_background_type',
		'label' => esc_html__('Background', 'vara-plugin'),
		'types' => ['classic', 'gradient'],
		'selector' => '{{WRAPPER}} .gs-gallery-item .gallery-item-inner .gallery-item-thumbnail-holder .gallery-item_overlay_bg',
		'separator' => 'before'
	]
);

$this->add_control(
	'gallery_images_style_hover_content_vertical_alignment',
	[
		'label' => esc_html__('Content Vertical Alignment', 'vara-plugin'),
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
		'separator' => 'before',
		'conditions' => [
			'terms' => [
				[
					'name' => 'gallery_images_layout_model',
					'operator' => '!=',
					'value' => 'info-bottom'
				],
			]
		],
	]
);