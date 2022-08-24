<?php
/**
 * Portfolio > Content Options > Filters
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'portfolio_filters_visibility',
	[
		'label' => esc_html__('Filters', 'vara-plugin'),
		'description' => esc_html__('Show the categories as filters. Make sure to add the categories in the query field.'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$this->add_control(
	'portfolio_filters_left',
	[
		'label' => esc_html__('Filters Left', 'vara-plugin'),
		'description' => esc_html__('Show the filters on left side of portfolio.'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('On', 'vara-plugin'),
		'label_off' => esc_html__('Off', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'no',
		'conditions' => [
			'terms' => [
				[
					'name' => 'portfolio_filters_visibility',
					'operator' => '==',
					'value' => 'yes'
				]
			],
		]
	]
);

$this->add_responsive_control(
	'filter_width',
	[
		'label' => esc_html__('Filter Left Width', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SLIDER,
		'size_units' => ['%', 'px'],
		'default' => [
			'size' => 25,
			'unit' => '%'
		],
		'selectors' => [
			'{{WRAPPER}} .gs-portfolio-wrapper .gs-filters' => 'width: {{SIZE}}{{UNIT}}',
			'{{WRAPPER}} .gs-portfolio-wrapper' => 'padding-left: {{SIZE}}{{UNIT}}',
		],
		'conditions' => [
			'terms' => [
				[
					'name' => 'portfolio_filters_left',
					'operator' => '==',
					'value' => 'yes'
				]
			],
		]
	]
);

$this->add_control(
	'filter_title',
	[
		'label' => esc_html__('Filter Title', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => 'Sort by:',
		'conditions' => [
			'terms' => [
				[
					'name' => 'portfolio_filters_left',
					'operator' => '==',
					'value' => 'yes'
				]
			],
		]
	]
);

$this->add_control(
	'portfolio_filters_query_portfolio',
	[
		'label' => esc_html__('Filters Query', 'vara-plugin'),
		'description' => __('Select the categories you want to display as filters. <br /> <small>Note: This option does not affect the query, is created only to display filters on metro layout type.</small>', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT2,
		'label_block' => true,
		'options' => $this->grada_return_taxonomies('project_cat'),
		'multiple' => true,
		'conditions' => [
			'terms' => [
				[
					'name' => 'portfolio_filters_visibility',
					'operator' => '==',
					'value' => 'yes'
				]
			],
		]
	]
);

$this->add_control(
	'portfolio_filters_filter_all',
	[
		'label' => esc_html__('Show All Filter', 'vara-plugin'),
		'description' => esc_html__('Show a filter which is able to filter all posts.'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'yes',
		'condition' => [
			'portfolio_filters_visibility' => 'yes'
		]
	]
);

$this->add_control(
	'portfolio_filters_filter_all_string',
	[
		'label'   => esc_html__('String', 'vara-plugin'),
		'description' => esc_html__('Override the filter \'All\'.', 'vara-plugin'),
		'type'    => Controls_Manager::TEXT,
		'default' => esc_html__('All', 'vara-plugin'),
		'conditions' => [
			'relation' => 'and',
			'terms' => [
				[
					'name' => 'portfolio_filters_visibility',
					'operator' => '==',
					'value' => 'yes',
				],
				[
					'name' => 'portfolio_filters_filter_all',
					'operator' => '==',
					'value' => 'yes'
				],
			],
		]
	]
);