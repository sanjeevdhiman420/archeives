<?php
namespace GradaElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class GradaHamburger extends Widget_Base {

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
		return 'grada-burger-icon';
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
		return esc_html__('Hamburger', 'vara-plugin');
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
		return 'eicon-menu-toggle grada-badge';
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
			'hamburger_functionality',
			[
				'label' => esc_html__('Functionality', 'vara-plugin'),
			]
		);

		$this->add_control(
			'hamburger_raw',
			[
				'raw' => __('<small>This element purpose is to open the menu when you hide the section via the fixed options.</small>', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'field_type' => 'html'
			]
		);

		$this->add_control(
            'hamburger_text',
            [
                'label' => esc_html__( 'Opener Text', 'vara-plugin' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'description' => __( 'Enter opener text that will show next to the icon. <br><small>Note: Leave it empty to hide.</small>'),
                'placeholder' => esc_html__( 'Menu', 'vara-plugin' )
            ]
        );

		$this->add_control(
			'hamburger_alignment',
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
					'{{WRAPPER}} .gs-section-opener' => 'justify-content: flex-{{VALUE}} !important; -webkit-box-pack: {{VALUE}} !important; -ms-flex-pack: {{VALUE}} !important;'
				],
				'default' => 'start'
			]
		);

		$this->add_control(
			'hamburger_selector',
			[
				'label'   => esc_html__('Selector', 'vara-plugin'),
				'description' => __('Enter which section you\'d like to open with this hamburger, if nothing is set it will open all hidden sections. <br /> <small>Note: Do not enter the hashtag, only the name of the ID, the ID\'s in sections can be added in advanced tab.</small>', 'vara-plugin'),
				'type'    => Controls_Manager::TEXT,
				'placeholder' => esc_html__('a-uniqe-id', 'vara-plugin')
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'hamburger_style',
			[
				'label' => esc_html__('Style', 'vara-plugin'),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'hamburger_padding',
			[
				'label' => esc_html__( 'Padding', 'vara-plugin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .gs-burger-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs('hamburger_normal');

		$this->start_controls_tab(
			'hamburger_normal_tab',
			[
				'label' => __('Normal', 'vara-plugin'),
			]
		);

		$this->add_control(
			'hamburger_normal_color',
			[
				'label' => esc_html__('Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_3,
				],
				'selectors' => [
					'{{WRAPPER}} .gs-burger-icon .burger-icon span' => 'background-color: {{VALUE}} !important',
					'{{WRAPPER}} .gs-burger-icon .gs-burger-icon-text' => 'color: {{VALUE}} !important'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hamburger_background',
				'label' => esc_html__( 'Background', 'vara-plugin' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .gs-burger-icon',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'hamburger_hover_tab',
			[
				'label' => __('Hover', 'vara-plugin'),
			]
		);

		$this->add_control(
			'hamburger_hover_color',
			[
				'label' => esc_html__('Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_3,
				],
				'selectors' => [
					'{{WRAPPER}} .gs-burger-icon:hover .gs-burger-icon span' => 'background-color: {{VALUE}} !important',
					'{{WRAPPER}} .gs-burger-icon:hover .gs-burger-icon-text' => 'color: {{VALUE}} !important'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hamburger_hover_background',
				'label' => esc_html__( 'Background', 'vara-plugin' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .gs-burger-icon',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

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

		$burger_align_class = 'burger-align-' . $settings['hamburger_alignment'];

		if ($settings['hamburger_selector']) {
			$hamburger_selector = '#' . $settings['hamburger_selector'];
		} else {
			$hamburger_selector = '.gs-locked-section-invisible';
		}
		?>
		<div class="gs-section-opener d-flex justify-content-center <?php echo esc_attr($burger_align_class); ?>" id="<?php echo esc_attr($this->get_ID()) ?>">
			<a href="#" class="gs-burger-icon" id="gs-locked-section-opener">
				<?php if ( !empty( $settings['hamburger_text'] ) && $settings['hamburger_alignment'] == 'end' ) : ?>
                    <span class="gs-burger-icon-text"><?php echo esc_html( $settings['hamburger_text'] ); ?></span>
				<?php endif; ?>
                <span class="burger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                <?php if ( !empty( $settings['hamburger_text'] ) && in_array( $settings['hamburger_alignment'], ['start','center'], true ) ) : ?>
                    <span class="gs-burger-icon-text"><?php echo esc_html( $settings['hamburger_text'] ); ?></span>
                <?php endif; ?>
			</a>
		</div>
		<script>
            jQuery(document).ready(function($) {
                $('.gs-section-opener#<?php echo esc_attr($this->get_ID()) ?> #gs-locked-section-opener').on('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    $('<?php echo esc_attr($hamburger_selector) ?>').toggleClass('active');
                });
            });
		</script>
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
