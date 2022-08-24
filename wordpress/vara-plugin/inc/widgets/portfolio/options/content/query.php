<?php
/**
 * Portfolio > Content Options > Query
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
 * Auto Query
 */
$this->add_control(
	'portfolio_auto_query',
	[
		'label' => esc_html__('Auto Query', 'vara-plugin'),
		'description' => esc_html__('Can be useful when used for related posts or assigned to other archive pages. Doesn\'t work in normal pages, only in singles or archives.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'return_value' => 'yes',
		'default' => 'no',
		'condition' => [
			'portfolio_layout_type!' => 'metro'
		]
	]
);

/**
 * Normal Query
 */
$this->add_control(
	'portfolio_query_normal_post',
	[
		'label' => esc_html__('Query', 'vara-plugin'),
		'description' => __('Select the tags you want to get the products from. <br /> <small> Note: If no tag is selected all posts will be displayed.</small>', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT2,
		'label_block' => true,
		'options' => $this->grada_return_taxonomies('project_tag'),
		'multiple' => true,
		'conditions' => [
			'terms' => [
				[
					'name' => 'portfolio_auto_query',
					'operator' => '!=',
					'value' => 'yes',
				],
				[
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'portfolio_layout',
							'operator' => '==',
							'value' => 'carousel'
						],
						[
							'name' => 'portfolio_layout_type',
							'operator' => '!==',
							'value' => 'metro',
						],
					]
				]
			],
		]
	]
);

/**
 * Metro Query
 */
$this->add_control(
	'portfolio_query_metro_post',
	[
		'label' => esc_html__('Query', 'vara-plugin'),
		'description' => __('Select the posts you want to show in metro. <br /><small>Note: Do not select the same item two times, it may cause issues.</small>', 'vara-plugin'),
		'prevent_empty' => false,
		'type' => Controls_Manager::REPEATER,
		'fields' => [
			[
				'name' => 'post_id',
				'label' => esc_html__('Post', 'vara-plugin'),
				'description' => esc_html__('Select the post.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $this->grada_reutnr_portfolio_items('portfolio')
			],
			[
				'name' => 'portfolio_column',
				'label' => esc_html__('Column', 'vara-plugin'),
				'description' => esc_html__('Select the post column.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1-column' => esc_attr__('1 Column', 'vara-plugin'),
					'2-column' => esc_attr__('2 Column', 'vara-plugin'),
					'3-column' => esc_attr__('3 Column', 'vara-plugin'),
					'4-column' => esc_attr__('4 Column', 'vara-plugin'),
					'5-column' => esc_attr__('5 Column', 'vara-plugin'),
					'6-column' => esc_attr__('6 Column', 'vara-plugin'),
					'7-column' => esc_attr__('7 Column', 'vara-plugin'),
					'8-column' => esc_attr__('8 Column', 'vara-plugin'),
					'9-column' => esc_attr__('9 Column', 'vara-plugin'),
					'10-column' => esc_attr__('10 Column', 'vara-plugin'),
					'11-column' => esc_attr__('11 Column', 'vara-plugin'),
					'12-column' => esc_attr__('12 Column', 'vara-plugin')
				],
				'default' => '3-column'
			],
		],
		'conditions' => [
			'relation' => 'and',
			'terms' => [
				[
					'name' => 'portfolio_layout',
					'operator' => '==',
					'value' => 'isotope',
				],
				[
					'name' => 'portfolio_layout_type',
					'operator' => '==',
					'value' => 'metro',
				],
			],
		]
	]
);

/**
 * Order and Orderby
 */
$this->add_control(
	'portfolio_query_order',
	[
		'label' => esc_html__('Order', 'vara-plugin'),
		'description' => esc_html__('Change the order of the query, ascending order from lowest to highest values and so on.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'ASC' => esc_html__('Ascending', 'vara-plugin'),
			'DESC' => esc_html__('Descending', 'vara-plugin')
		],
		'default' => 'ASC',
		'condition' => [
			'portfolio_layout_type!' => 'metro'
		]
	]
);

$this->add_control(
	'portfolio_query_orderby',
	[
		'label' => esc_html__('Orderby', 'vara-plugin'),
		'description' => esc_html__('Sort retrieved posts by parameter. Defaults to menu order.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'post_date' => esc_html__('Date', 'vara-plugin'),
			'rand' => esc_html__('Random', 'vara-plugin'),
			'relevance' => esc_html__('Relevance', 'vara-plugin'),
			'menu_order' => esc_html__('Menu Order', 'vara-plugin')
		],
		'default' => 'menu_order',
		'condition' => [
			'portfolio_layout_type!' => 'metro'
		]
	]
);

/**
 * Posts Per Page
 */
$this->add_control(
	'portfolio_ppp',
	[
		'label'   => esc_html__('Posts Per Page', 'vara-plugin'),
		'description' => esc_html__('Enter the number of posts you want to display on the first page, a pagination will be created if there are more posts than this number.', 'vara-plugin'),
		'type'    => Controls_Manager::NUMBER,
		'default' => 10,
		'min'     => 1,
		'max'     => 10000,
		'step'    => 1
	]
);