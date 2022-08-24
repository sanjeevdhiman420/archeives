<?php
/**
 * Posts > Content Options > Justified
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'posts_justified_height',
	[
		'label' => esc_html__('Height', 'vara-plugin'),
		'description' => esc_html__('The preferred rows height in pixel.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'default' => 200,
		'min'     => 1,
		'max'     => 1000,
		'step'    => 10,
		'frontend_available' => true
	]
);

$this->add_control(
	'posts_justified_margins',
	[
		'label' => esc_html__('Margins', 'vara-plugin'),
		'description' => esc_html__('Decide the margins between the images.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::NUMBER,
		'default' => 1,
		'min'     => 1,
		'max'     => 500,
		'step'    => 1,
		'frontend_available' => true
	]
);

$this->add_control(
	'posts_justified_last_row',
	[
		'label' => esc_html__('Visibility', 'vara-plugin'),
		'description' => esc_html__('Decide the justify for the last row.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'justify' => esc_html__('Justify', 'vara-plugin'),
			'nojustify' => esc_html__('No Justify', 'vara-plugin'),
			'hide' => esc_html__('Hide', 'vara-plugin'),
		],
		'default' => 'justify',
		'frontend_available' => true
	]
);