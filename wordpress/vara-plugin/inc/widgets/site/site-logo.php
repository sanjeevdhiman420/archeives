<?php
namespace GradaElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class GradaSiteLogo extends Widget_Base {

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
		return 'grada-site-logo';
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
		return esc_html__('Site Logo', 'vara-plugin');
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
		return 'eicon-site-logo grada-badge';
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
			'site_logo_functionality',
			[
				'label' => esc_html__('Functionality', 'vara-plugin'),
			]
		);
		
		$this->add_control(
			'site_logo_image',
			[
				'label' => esc_html__('Image', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src()
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'site_logo_image_size', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'label' => esc_html__('Image Size', 'vara-plugin'),
				'description' => esc_html__('Select the image size.', 'vara-plugin'),
				'default' => 'full'
			]
		);

		$this->add_control(
			'site_logo_alignment',
			[
				'label' => esc_html__('Alignment', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => esc_html__('Left', 'vara-plugin'),
						'icon' => 'fa fa-align-left'
					],
					'center' => [
						'title' => esc_html__('Center', 'vara-plugin'),
						'icon' => 'fa fa-align-center'
					],
					'end' => [
						'title' => esc_html__('Right', 'vara-plugin'),
						'icon' => 'fa fa-align-right'
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .gs-logo' => 'justify-content: flex-{{VALUE}} !important; -webkit-box-pack: {{VALUE}} !important; -ms-flex-pack: {{VALUE}} !important;'
				],
				'default' => 'start'
			]
		);

		$this->add_control(
			'site_logo_link',
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
			'site_logo_link_external',
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
					'site_logo_link' => 'external-url'
				]
			]
		);

		$this->add_responsive_control(
			'site_logo_width',
			[
				'label' => esc_html__('Width', 'vara-plugin'),
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
					'{{WRAPPER}} .gs-logo img' => 'width: {{SIZE}}{{UNIT}}',
				],
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

		/**
		 * Image Size
		 */
		if ($settings['site_logo_image_size_size']) {
			$grada_site_logo_size = $settings['site_logo_image_size_size'] == 'custom' ? [isset($settings['site_logo_image_size_custom_dimension']['width']) ? $settings['site_logo_image_size_custom_dimension']['width'] : 500, isset($settings['site_logo_image_size_custom_dimension']['height']) ? $settings['site_logo_image_size_custom_dimension']['height'] : 9999] : $settings['site_logo_image_size_size'];
		} else {
			$grada_site_logo_size = 'full';
		}

		/**
		 * Link
		 */
		switch ($settings['site_logo_link']) {
			case 'none':
				$grada_site_logo_link = 'none';
				break;
			default:
				$grada_site_logo_link = home_url('/');
				break;
			case 'external-url':
				$grada_site_logo_link = isset($settings['site_logo_link_external']['url']) && $settings['site_logo_link_external']['url'] != 0 ? $settings['site_logo_link_external']['url'] : '#';
				break;
		}
		
		echo sprintf(
			'<div class="%s"><a %s target="%s" %s>%s</a></div>',
			'gs-logo d-flex justify-content-center',
			$grada_site_logo_link != 'none' ? 'href='. esc_url($grada_site_logo_link) .'' : '',
			$grada_site_logo_link != 'none' && isset($settings['site_logo_link_external']['is_external']) && $settings['site_logo_link_external']['is_external'] == 'on'
			? '_blank' : '_self',
			$grada_site_logo_link != 'none' && isset($settings['site_logo_link_external']['nofollow']) && $settings['site_logo_link_external']['nofollow'] == '1'
			? 'rel="nofollow"' : '',
			isset($settings['site_logo_image']['id']) && $settings['site_logo_image']['id'] != 0 ? wp_get_attachment_image($settings['site_logo_image']['id'], $grada_site_logo_size) : '<img src='. \Elementor\Utils::get_placeholder_image_src() .' />'
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
