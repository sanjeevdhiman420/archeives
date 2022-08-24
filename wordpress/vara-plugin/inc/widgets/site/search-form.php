<?php
namespace GradaElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class GradaSearchForm extends Widget_Base {

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
		return 'grada-search-form';
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
		return esc_html__('Search Form', 'vara-plugin');
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
		return 'eicon-site-search grada-badge';
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
			'search_form_functionality',
			[
				'label' => esc_html__('Functionality', 'vara-plugin')
			]
		);

		$this->add_control(
			'search_form_raw',
			[
				'raw' => __('<small>If you\'re experiencing issues while opening the lightbox of the search, please reload the page on editor or check it on the front-end.</small>', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'field_type' => 'html'
			]
		);

		$this->add_control(
			'search_form_placeholder',
			[
				'label' => esc_html__('Placeholder', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('Search...', 'vara-plugin')
			]
		);

		$this->add_control(
			'search_form_alignment',
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
				'label_block' => false,
				'selectors' => [
					'{{WRAPPER}} .search-button-trigger-holder' => 'justify-content: flex-{{VALUE}} !important; -webkit-box-pack: {{VALUE}} !important; -ms-flex-pack: {{VALUE}} !important;'
				],
				'default' => 'start'
			]
		);

		$this->add_responsive_control(
			'search_form_size',
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
					'{{WRAPPER}} .search-button-trigger svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}} !important',
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'search_form_style',
			[
				'label' => esc_html__('Style', 'vara-plugin'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->start_controls_tabs('search_form_normal');

		$this->start_controls_tab(
			'search_form_normal_tab',
			[
				'label' => esc_html__('Normal', 'vara-plugin'),
			]
		);

		$this->add_control(
			'search_form_normal_color',
			[
				'label' => esc_html__('Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_3,
				],
				'selectors' => [
					'{{WRAPPER}} .search-button-trigger svg' => 'fill: {{VALUE}} !important',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'search_form_hover_tab',
			[
				'label' => esc_html__('Hover', 'vara-plugin'),
			]
		);

		$this->add_control(
			'search_form_hover_color',
			[
				'label' => esc_html__('Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_3,
				],
				'selectors' => [
					'{{WRAPPER}} .search-button-trigger:hover svg' => 'fill: {{VALUE}} !important'
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'search_form_overlay',
			[
				'label' => esc_html__('Overlay', 'vara-plugin'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'search_form_typography',
				'label' => esc_html__('Typography', 'vara-plugin'),
				'selector' =>'{{WRAPPER}} .gs-fullscreen-search .gs-fullscreen-search-inner .search-wrapper-inner .search-wrapper-form input[type="search"]'
			]
		);

		$this->add_control(
			'search_form_text_color',
			[
				'label' => esc_html__('Text Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gs-fullscreen-search .gs-fullscreen-search-inner .search-wrapper-inner .search-wrapper-form input[type="search"]' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .gs-fullscreen-search .gs-fullscreen-search-inner .search-wrapper-inner .search-wrapper-form input::-webkit-input-placeholder' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .gs-fullscreen-search .gs-fullscreen-search-inner .search-wrapper-inner .search-wrapper-form input:-moz-placeholder' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .gs-fullscreen-search .gs-fullscreen-search-inner .search-wrapper-inner .search-wrapper-form input::-moz-placeholder' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .gs-fullscreen-search .gs-fullscreen-search-inner .search-wrapper-inner .search-wrapper-form input:-ms-input-placeholder' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .gs-fullscreen-search .gs-fullscreen-search-inner .search-wrapper-inner .search-wrapper-form .search-form-button span' => 'color: {{VALUE}} !important',
				]
			]
		);

		$this->add_control(
			'search_form_background_color',
			[
				'label' => esc_html__('Background Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gs-fullscreen-search .gs-fullscreen-search-inner' => 'background-color: {{VALUE}} !important'
				]
			]
		);

		$this->add_responsive_control(
			'search_form_icon_size',
			[
				'label' => esc_html__('Icon Size', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'vw'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1
					]
				],
				'selectors' => [
					'{{WRAPPER}} .gs-fullscreen-search .gs-fullscreen-search-inner .search-wrapper-inner .search-wrapper-form .search-form-button span svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
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

		/**
		 * Placeholder
		 */
		if ($settings['search_form_placeholder']) {
			$grada_search_form_placeholder = $settings['search_form_placeholder'];
		} else {
			$grada_search_form_placeholder = esc_html__('Type and hit enter...', 'vara-plugin');
		}
		?>
		<div class="gs-fullscreen-search-holder">
			<div class="search-button-trigger-holder d-flex justify-content-center">
                <a href="#" class="search-button-trigger">
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.9167 20.5833C16.7031 20.5833 20.5833 16.7031 20.5833 11.9167C20.5833 7.1302 16.7031 3.25 11.9167 3.25C7.1302 3.25 3.25 7.1302 3.25 11.9167C3.25 16.7031 7.1302 20.5833 11.9167 20.5833Z" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22.75 22.75L18.0375 18.0375" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <span class="close-button search-wrapper-close"></span>
			</div>
			<div class="gs-fullscreen-search">
				<div class="gs-fullscreen-search-inner">
					<div class="container">
						<div class="search-wrapper-inner">
							<div class="search-wrapper-form">
								<form action="<?php echo esc_url(home_url('/')) ?>" method="get">
									<input class="search-form-input" placeholder="<?php echo esc_attr($grada_search_form_placeholder) ?>" type="search" name="s" id="search" />
									<label class="search-form-button">
										<input type="submit" />
										<span>
											<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.9167 20.5833C16.7031 20.5833 20.5833 16.7031 20.5833 11.9167C20.5833 7.1302 16.7031 3.25 11.9167 3.25C7.1302 3.25 3.25 7.1302 3.25 11.9167C3.25 16.7031 7.1302 20.5833 11.9167 20.5833Z" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M22.75 22.75L18.0375 18.0375" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
										</span>
									</label>
								</form>
							</div>
						</div>
					</div>
				</div>
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
