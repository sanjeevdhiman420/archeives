<?php
/**
 * Portfolio > Content Options > Functionality
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'portfolio_layout',
	[
		'label' => esc_html__('Layout', 'vara-plugin'),
		'description' => esc_html__('Select the layout of posts.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'isotope' => esc_html__('Isotope', 'vara-plugin'),
			'carousel' => esc_html__('Carousel', 'vara-plugin')
		],
		'default' => 'isotope'
	]
);

$this->add_control(
	'portfolio_layout_type',
	[
		'label' => esc_html__('Layout Type', 'vara-plugin'),
		'description' => esc_html__('Select the layout type of isotope.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'masonry' => esc_html__('Masonry', 'vara-plugin'),
			'metro' => esc_html__('Metro', 'vara-plugin'),
			'fitrows' => esc_html__('FitRows', 'vara-plugin'),
			'justified' => esc_html__('Justified', 'vara-plugin')
		],
		'default' => 'masonry',
		'condition' => [
			'portfolio_layout' => 'isotope'
		]
	]
);

$this->add_control(
	'portfolio_layout_model',
	[
		'label' => esc_html__('Layout Model', 'vara-plugin'),
		'description' => esc_html__('Select the layout model.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'classic-grid' => esc_html__('Grid Classic', 'vara-plugin'),
			'meta-overlay' => esc_html__('Meta Overlay', 'vara-plugin'),
			'text-follow' => esc_html__('Text Follow', 'vara-plugin')

		],
		'default' => 'classic-grid',
		'condition' => [
			'portfolio_layout_type!' => 'justified'
		]
	]
);