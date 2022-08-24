<?php
namespace GradaElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class GradaInteractiveLinks extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'grada-text-showcase';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__('Text Showcase', 'vara-plugin');
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-handle grada-badge';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return ['grada-category'];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'functionality',
			[
				'label' => esc_html__('Functionality', 'vara-plugin')
			]
		);

		$this->add_control(
			'layout',
			[
				'label' => esc_html__('Layout', 'vara-plugin'),
				'description' => esc_html__('Select initial loading animation for posts.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'list'			=> esc_html__('List', 'vara-plugin'),
					'block' 			=> esc_html__('Block', 'vara-plugin'),
				],
				'default' => 'list',
			]
		);

		$this->add_control(
			'post_type',
			[
				'label' => esc_html__('Post Type', 'vara-plugin'),
				'description' => esc_html__('Select the post type that you want to get on your interactive posts element.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'post' => esc_html__('Post', 'vara-plugin'),
					'portfolio' => esc_html__('Portfolio', 'vara-plugin'),
					'product' => esc_html__('Product', 'vara-plugin')
				],
				'default' => 'post'
			]
		);

		$this->add_control(
			'query_portfolio',
			[
				'label' => esc_html__('Query', 'vara-plugin'),
				'description' => __('Select the categories you want to get the posts from. <br /> <small> Note: If no category is selected all posts will be displayed.</small>', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => $this->grada_get_taxonomies('project_cat'),
				'multiple' => true,
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label'   => esc_html__('Posts Per Page', 'vara-plugin'),
				'description' => esc_html__('Enter the number of posts you want to display on the first page.', 'vara-plugin'),
				'type'    => Controls_Manager::NUMBER,
				'default' => 10,
				'min'     => 1,
				'max'     => 10000,
				'step'    => 1
			]
		);

		$this->add_control(
			'html_tag',
			[
				'label' => esc_html__('HTML Tag', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'h1' => esc_html__('H1', 'vara-plugin'),
					'h2' => esc_html__('H2', 'vara-plugin'),
					'h3' => esc_html__('H3', 'vara-plugin'),
					'h4' => esc_html__('H4', 'vara-plugin'),
					'h5' => esc_html__('H5', 'vara-plugin'),
					'h6' => esc_html__('H6', 'vara-plugin'),
					'div' => esc_html__('div', 'vara-plugin'),
					'span' => esc_html__('span', 'vara-plugin'),
					'p' => esc_html__('p', 'vara-plugin')
				],
				'default' => 'h2'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'layout_style',
			[
				'label' => esc_html__('Layout', 'vara-plugin')
			]
		);

		$this->add_control(
			'portfolio_animation',
			[
				'label' => esc_html__('Animation', 'vara-plugin'),
				'description' => esc_html__('Select initial loading animation for posts.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' 				 	=> esc_html__('None', 'vara-plugin'),
					'gsFadeIn'	 	=> esc_html__('Fade In', 'vara-plugin'),
					'gsFadeInUp' 	  	=> esc_html__('Fade In Up', 'vara-plugin'),
					'gsFadeInLeft'  	=> esc_html__('Fade In Left', 'vara-plugin'),
					'gsFadeInRight' 	=> esc_html__('Fade In Right', 'vara-plugin'),
					'gsZoomIn' 	 	=> esc_html__('Zoom In', 'vara-plugin'),
					'gsZoomOut' 	 	=> esc_html__('Zoom Out', 'vara-plugin'),
					'gsPreserve3d' 	=> esc_html__('Preserve 3d', 'vara-plugin'),
					'gsSkewIn' 	=> esc_html__('SkewIn', 'vara-plugin')
				],
				'default' => 'gsFadeIn',
			]
		);

		$this->add_control(
			'animation_delay',
			[
				'label' => esc_html__('Animation Delay', 'vara-plugin'),
				'description' => esc_html__('Activate the delay effect on posts.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => [
					'portfolio_animation!' => 'none'
				]
			]
		);

		$this->add_responsive_control(
			'columns',
			[
				'label' => esc_html__('Columns', 'vara-plugin'),
				'description' => esc_html__('Select the columns of the isotope grid.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1-column'			 	=> esc_html__('1 Column', 'vara-plugin'),
					'2-columns'			 	=> esc_html__('2 Columns', 'vara-plugin'),
					'3-columns'			 	=> esc_html__('3 Columns', 'vara-plugin'),
					'4-columns'			 	=> esc_html__('4 Columns', 'vara-plugin'),
					'5-columns'			 	=> esc_html__('5 Columns', 'vara-plugin'),
					'6-columns'			 	=> esc_html__('6 Columns', 'vara-plugin')
				],
				'default' => '3-columns',
				'tablet_default' => '2-columns',
				'mobile_default' => '1-column',
				'condition' => [
					'layout' => 'block'
				],
			]
		);

		$this->add_control(
			'first_active',
			[
				'label' => esc_html__('First Active', 'vara-plugin'),
				'description' => esc_html__('Make the first item active.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('On', 'vara-plugin'),
				'label_off' => esc_html__('Off', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'yes',
				'render_type' => 'template'
			]
		);

		$this->add_responsive_control(
			'horizontal_spacing',
			[
				'label' => esc_html__('Horizontal Spacing', 'vara-plugin'),
				'description' => esc_html__('Move the slider to set the value of spacing.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', 'rem', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .l-interactive-posts-wrapper .o-interactive-item:not(:last-of-type)' => 'margin-right: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'layout' => 'inline'
				],
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'vertical_spacing',
			[
				'label' => esc_html__('Vertical Spacing', 'vara-plugin'),
				'description' => esc_html__('Move the slider to set the value of spacing.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', 'rem', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gs-text-showcase-holder .text-showcase-item:not(:last-of-type)' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'layout' => 'list'
				]
			]
		);

		$this->end_controls_section();

		/**
		 * Meta
		 */
		$this->start_controls_section(
			'meta_style',
			[
				'label' => esc_html__('Meta', 'vara-plugin')
			]
		);

		$this->add_control(
			'category_visibility',
			[
				'label' => esc_html__('Category', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'vara-plugin'),
				'label_off' => esc_html__('Hide', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'no'
			]
		);

		$this->end_controls_section();
	}

	function grada_get_taxonomies($terms = 'category') {
		$post_categories = [];
		$terms = get_terms($terms);

		if ($terms && !is_wp_error($terms)) {
			foreach ($terms as $term) {
				$post_categories[$term->slug] = $term->name;
			}
		}

		return $post_categories;
	}

	function grada_get_posts($posts = 'post') {
		$posts_output = [];
		$posts = get_posts(['post_type' => $posts, 'posts_per_page' => -1]);

		if ($posts) {
			foreach ($posts as $post) {
				$posts_output[$post->ID] = $post->post_title;
			}
		}

		return $posts_output;
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$grada_text_showcase_class = [
            'gs-text-showcase-holder',
            'showcase-' . $settings['layout']
        ];

		/**
		 * Post Type
		 */
		$grada_posts_type = 'portfolio';
		$grada_posts_taxonomy = 'project_cat';
		$grada_posts_normal_query = $settings['query_portfolio'];

		/**
		 * Paged
		 *
		 * Tell the WordPress exactly
		 * what page is active.
		 */
		if (get_query_var('paged')) {
			$paged = get_query_var('paged');
		} elseif (get_query_var('page')) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		/**
		 * Loop Operator
		 *
		 * Show all posts incase no
		 * category is selected. Works
		 * only when isotope is selected.
		 */
		if ($grada_posts_normal_query) {
			$loop_operator = "IN";
		} else {
			$loop_operator = "NOT IN";
		}

		/**
		 * Query
		 */
		$args = [
			'post_type' => $grada_posts_type,
			'posts_per_page' => $settings['posts_per_page'],
			'paged' => $paged,
			'tax_query' => [
				[
					'taxonomy' => $grada_posts_taxonomy,
					'field' => 'slug',
					'terms' => $grada_posts_normal_query,
					'operator' => $loop_operator
				]
			],
		];

		$grada_filter = isset($_GET['filter']) ? $_GET['filter'] : '';
		$grada_exclude = isset($_GET['exclude']) ? $_GET['exclude'] : '';

		if ($grada_filter) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => $grada_posts_taxonomy,
					'field' => 'slug',
					'terms' => $grada_filter
				)
			);
		}

		if ($grada_exclude) {
			$args['post__not_in'] = $grada_exclude;
		}

		$query = new \WP_Query($args);

		if ($query->have_posts()) : ?>
			<div class="<?php echo esc_attr(implode(' ', $grada_text_showcase_class)); ?>" data-first-show="<?php echo esc_attr($settings['first_active']) ?>">
				<?php include(__DIR__ . '/layout/default.php') ?>
			</div>
		<?php
		endif; wp_reset_postdata();
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {}
}