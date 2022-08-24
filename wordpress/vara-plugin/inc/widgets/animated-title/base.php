<?php
namespace GradaElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class GradaAnimatedTitle extends Widget_Base {
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
		return 'gds-animated-title';
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
		return esc_html__('Animated Title', 'vara-plugin');
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
		return 'eicon-animated-headline grada-badge';
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
			'functionality_tab',
			[
				'label' => esc_html__('Functionality', 'vara-plugin'),
			]
		);

		$this->add_control(
			'content',
			[
				'label' => esc_html__('Content', 'vara-plugin'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Add Your Animated Heading Text Here', 'vara-plugin'),
				'description' => esc_html__('Add the animated heading.', 'vara-plugin')
			]
		);

		$this->add_control(
			'delay',
			[
				'label' => esc_html__('Delay (ms)', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 9999,
				'step' => 1,
				'default' => 200,
			]
		);

		$this->add_control(
			'increase_delay',
			[
				'label' => esc_html__('Increase Delay (ms)', 'vara-plugin'),
				'description' => esc_html__('When separating the words in new lines, the delay for words to words will be increased by 200.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 9999,
				'step' => 1,
				'default' => 200,
			]
		);

		$this->add_control(
			'html_tag',
			[
				'label' => esc_html__('HTML Tag', 'vara-plugin'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => esc_html__('H1', 'vara-plugin'),
					'h2' => esc_html__('H2', 'vara-plugin'),
					'h3' => esc_html__('H3', 'vara-plugin'),
					'h4' => esc_html__('H4', 'vara-plugin'),
					'h5' => esc_html__('H5', 'vara-plugin'),
					'h6' => esc_html__('H6', 'vara-plugin'),
					'div' => esc_html__('div', 'vara-plugin'),
					'span' => esc_html__('span', 'vara-plugin')
				],
				'default' => 'h2'
			]
		);

		$this->add_control(
			'alignment',
			[
				'label' => esc_html__('Alignment', 'vara-plugin'),
				'type' => Controls_Manager::CHOOSE,
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
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}}'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__('Style', 'vara-plugin'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color',
			[
				'label' => esc_html__('Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .a-animated-heading' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => esc_html__('Typography', 'vara-plugin'),
				'selector' => '{{WRAPPER}} .a-animated-heading'
			]
		);

		$this->end_controls_section();
	}

	public function split_the_heading($heading, $delay, $increase_delay) {
		$heading = explode(PHP_EOL, $heading);
		$headingArr = $output = [];

		foreach ($heading as $head) {
			$headingArr[] = explode(' ', $head);
		}

		foreach ($headingArr as $arr) {
			$output[] =  '<span><span class="wow" data-wow-delay="'. $delay / 1000 .'s">' . implode('</span> <span class="wow" data-wow-delay="'. $delay / 1000 .'s">', $arr) . '</span></span>';
			$delay += $increase_delay;
		}

		return implode(' ', $output);
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

		if ($settings['content']) {
			echo sprintf(
				'<%s class="%s"><span class="%s">%s</span></%s>',
				$settings['html_tag'],
				'a-animated-heading mb-0',
				'a-animated-heading__inner',
				$this->split_the_heading($settings['content'], $settings['delay'], $settings['increase_delay']),
				$settings['html_tag']
			);
		}
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