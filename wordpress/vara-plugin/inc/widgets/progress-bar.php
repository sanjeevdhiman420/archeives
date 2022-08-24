<?php
namespace GradaElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class GradaProgressBar extends Widget_Base {

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
		return 'gds-skill-bar';
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
		return esc_html__('Progress Bar', 'vara-plugin');
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
		return 'eicon-skill-bar grada-badge';
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
			'progress_bar_functionality',
			[
				'label' => esc_html__('Functionality', 'vara-plugin'),
			]
		);

		$this->add_control(
			'progress_bar_title',
			[
				'label'   => esc_html__('Title', 'vara-plugin'),
				'description' => esc_html__('Enter the title of the progress bar.', 'vara-plugin'),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__('Example Title', 'vara-plugin')
			]
		);

		$this->add_control(
			'progress_bar_percentage',
			[
				'label' => esc_html__('Percentage', 'vara-plugin'),
				'description' => esc_html__('Select the percentage of the progress bar between 1 and 100.', 'vara-plugin'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['%'],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				]
			]
		);

		$this->add_control(
			'progress_bar_height',
			[
				'label'   => esc_html__('Height', 'vara-plugin'),
				'description' => esc_html__('Enter the height of the progress bar.', 'vara-plugin'),
				'type'    => Controls_Manager::NUMBER,
				'default' => 2,
				'min'     => 1,
				'max'     => 500,
				'step'    => 1
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'progress_bar_style',
			[
				'label' => esc_html__('Style', 'vara-plugin'),
			]
		);

		$this->add_control(
			'progress_bar_color',
			[
				'label' => esc_html__('Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gs-progress-bar .gs-progress-bar-wrapper .gs-progress-bar-fill span' => 'background-color: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'progress_bar_bg_color',
			[
				'label' => esc_html__('Background Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gs-progress-bar .gs-progress-bar-wrapper' => 'background-color: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'progress_bar_title_color',
			[
				'label' => esc_html__('Title Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gs-progress-bar .gs-progress-bar-text .gs-progress-bar-title' => 'color: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'progress_bar_percentage_color',
			[
				'label' => esc_html__('Percentage Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gs-progress-bar .gs-progress-bar-text span' => 'color: {{VALUE}}',
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'typography_section',
			[
				'label' => esc_html__('Typography', 'vara-plugin'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'progress_bar_title_typography',
				'label' => esc_html__('Title', 'vara-plugin'),
				'selector' =>'{{WRAPPER}} .gs-progress-bar .gs-progress-bar-text .gs-progress-bar-title'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'progress_bar_percentage_typography',
				'label' => esc_html__('Percentage', 'vara-plugin'),
				'selector' => '{{WRAPPER}} .gs-progress-bar .gs-progress-bar-text span'
			]
		);

		$this->end_controls_section();
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
		?>
		<div class="gs-progress-bar">
			<div class="gs-progress-bar-text d-flex align-items-center">
				<div class="gs-progress-bar-title"><?php echo esc_attr($settings['progress_bar_title']) ?></div>
				<span class="gs-progress-bar-percentages ml-auto"><?php echo esc_attr($settings['progress_bar_percentage']['size']) ?>%</span>
			</div>
			<div class="gs-progress-bar-wrapper" style="height: <?php echo esc_attr($settings['progress_bar_height'] / 12) ?>rem">
                <span class="gs-progress-bar-fill" style="width: <?php echo esc_attr($settings['progress_bar_percentage']['size']) ?>%">
                    <span class="gsAnimateWidth wow"></span>
                </span>
			</div>
		</div>
		<?php
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
