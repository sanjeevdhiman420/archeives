<?php
namespace GradaElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class GradaSiteTitle extends Widget_Base {

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
		return 'grada-site-title';
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
		return esc_html__('Site Title', 'vara-plugin');
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
		return 'eicon-site-title grada-badge';
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
		return ['grada-site-category'];
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
			'site_title_functionality',
			[
				'label' => esc_html__('Functionality', 'vara-plugin'),
			]
		);

		$this->add_control(
			'site_title',
			[
				'label' => esc_html__('Title', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'site-title' => esc_html__('Site Title', 'vara-plugin'),
					'custom' => esc_html__('Custom', 'vara-plugin'),
				],
				'default' => 'site-title'
			]
		);

		$this->add_control(
			'site_title_custom_title',
			[
				'label' => esc_html__('Custom Title', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'site_title' => 'custom'
				]
			]
		);

		$this->add_control(
			'site_title_link',
			[
				'label' => esc_html__('Link', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('None', 'vara-plugin'),
					'site-url' => esc_html__('Site URL', 'vara-plugin'),
					'external-url' => esc_html__('External URL', 'vara-plugin')
				],
				'default' => 'site-url'
			]
		);

		$this->add_control(
			'site_title_link_external',
			[
				'label' => esc_html__('External Link', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('https://gradastudio.com', 'vara-plugin'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => true,
				],
				'condition' => [
					'site_title_link' => 'external-url'
				]
			]
		);

		$this->add_responsive_control(
			'site_title_size',
			[
				'label' => esc_html__('Size', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'vw'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 400,
						'step' => 1
					]
				],
				'selectors' => [
					'{{WRAPPER}} .gs-logo-text a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'site_title_html_tag',
			[
				'label' => esc_html__('HTML Tag', 'vara-plugin'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'site_title_style',
			[
				'label' => esc_html__('Style', 'vara-plugin'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'site_title_color',
			[
				'label' => esc_html__('Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gs-logo-text a' => 'color: {{VALUE}} !important',
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'site_title_typography',
				'label' => esc_html__('Typography', 'vara-plugin'),
				'selector' =>'{{WRAPPER}} .gs-logo-text a'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'site_title_shadow',
				'label' => esc_html__('Text Shadow', 'vara-plugin'),
				'selector' =>'{{WRAPPER}} .gs-logo-text a'
			]
		);

		$this->add_responsive_control(
			'site_title_alignment',
			[
				'label' => esc_html__('Alignment', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'vara-plugin'),
						'icon' => 'fa fa-align-left'
					],
					'center' => [
						'title' => esc_html__('Center', 'vara-plugin'),
						'icon' => 'fa fa-align-center'
					],
					'right' => [
						'title' => esc_html__('Right', 'vara-plugin'),
						'icon' => 'fa fa-align-right'
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gs-logo-text' => 'text-align: {{VALUE}}',
				]
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

		$grada_site_title = $settings['site_title'] == 'custom' ? $settings['site_title_custom_title'] : get_bloginfo('title');

		/**
		 * Link
		 */
		switch ($settings['site_title_link']) {
			case 'none':
				$grada_site_title_link = 'none';
				break;
			default:
				$grada_site_title_link = home_url('/');
				break;
			case 'external-url':
				$grada_site_title_link = isset($settings['site_title_link_external']['url']) && $settings['site_title_link_external']['url'] != 0 ? $settings['site_title_link_external']['url'] : '#';
				break;
		}

		echo sprintf(
			'<%s class="%s"><a %s target="%s" %s>%s</a></%s>',
			esc_attr($settings['site_title_html_tag']),
			'gs-logo-text',
			$grada_site_title_link != 'none' ? 'href='. esc_url($grada_site_title_link) .'' : '',
			$grada_site_title_link != 'none' && isset($settings['site_title_link_external']['is_external']) && $settings['site_title_link_external']['is_external'] == 'on'
				? '_blank' : '_self',
			$grada_site_title_link != 'none' && isset($settings['site_title_link_external']['nofollow']) && $settings['site_title_link_external']['nofollow'] == '1'
				? 'rel="nofollow"' : '',
			$grada_site_title,
			esc_attr($settings['site_title_html_tag'])
		);
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
