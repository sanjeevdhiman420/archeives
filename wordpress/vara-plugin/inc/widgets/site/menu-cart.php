<?php
namespace GradaElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (!class_exists('WooCommerce')) {
	return;
}

/**
 * @since 1.0.0
 */
class GradaMenuCart extends Widget_Base {

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
		return 'grada-menu-cart';
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
		return esc_html__('Menu Cart', 'vara-plugin');
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
		return 'eicon-cart-light grada-badge';
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
			'menu_cart_functionality',
			[
				'label' => esc_html__('Functionality', 'vara-plugin'),
			]
		);

		$this->add_control(
			'menu_cart_raw',
			[
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => esc_html__('Do not forget to select the cart page at WooCommerce > Settings > Advanced.', 'vara-plugin'),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
			]
		);

		$this->add_control(
			'menu_cart_alignment',
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
					'{{WRAPPER}} .header-shopping-cart-holder' => 'justify-content: flex-{{VALUE}} !important; -webkit-box-pack: {{VALUE}} !important; -ms-flex-pack: {{VALUE}} !important;'
				],
				'default' => 'start'
			]
		);

		$this->add_control(
			'menu_cart_color',
			[
				'label' => esc_html__('Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-shopping-cart-icon' => 'color: {{VALUE}} !important',
				]
			]
		);

		$this->add_responsive_control(
			'menu_cart_size',
			[
				'label' => esc_html__('Size', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'vw'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1
					]
				],
				'selectors' => [
					'{{WRAPPER}} .header-shopping-cart-icon svg' => 'width: {{SIZE}}{{UNIT}} !important; height: {{SIZE}}{{UNIT}} !important',
				]
			]
		);

		$this->add_control(
			'menu_cart_content',
			[
				'label' => esc_html__('Hide Cart Content', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no',
				'selectors' => [
					'{{WRAPPER}} .header-shopping-cart .dropdown-cart' => 'display: none !important',
				]
			]
		);

		$this->add_control(
			'menu_cart_badge_heading',
			[
				'label' => esc_html__('Badge', 'vara-plugin'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'menu_cart_badge_color',
			[
				'label' => esc_html__('Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-shopping-cart .header-shopping-cart-icon span' => 'color: {{VALUE}} !important',
				]
			]
		);

		$this->add_control(
			'menu_cart_badge_background_color',
			[
				'label' => esc_html__('Background Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-shopping-cart .header-shopping-cart-icon span' => 'background-color: {{VALUE}} !important',
				]
			]
		);

		$this->add_responsive_control(
			'menu_cart_badge_size',
			[
				'label' => esc_html__('Size', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'vw'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1
					]
				],
				'selectors' => [
					'{{WRAPPER}} .header-shopping-cart-icon span.number' => 'width: {{SIZE}}{{UNIT}} !important; height: {{SIZE}}{{UNIT}} !important; line-height: {{SIZE}}{{UNIT}} !important',
				]
			]
		);

		$this->add_responsive_control(
			'menu_cart_badge_number',
			[
				'label' => esc_html__('Number', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'vw'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1
					]
				],
				'selectors' => [
					'{{WRAPPER}} .header-shopping-cart-icon span.number' => 'font-size: {{SIZE}}{{UNIT}} !important',
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
		?>
		<div class="header-shopping-cart-holder d-flex justify-content-center">
			<div class="header-shopping-cart d-inline-flex">
				<a class="header-shopping-cart-icon" href="<?php echo esc_url(wc_get_cart_url()) ?>">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
					<span class="cart-number">
						<?php
						if (isset(WC()->cart->cart_contents_count)) {
							echo sprintf('%d', WC()->cart->cart_contents_count);
						} elseif (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
							echo 0;
						}
						?>
					</span>
				</a>
                <div class="dropdown-cart">
                    <div class="dropdown-shopping-cart widget_shopping_cart_content"></div>
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
