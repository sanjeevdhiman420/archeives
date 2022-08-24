<?php
namespace GradaElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class GradaSectionTitle extends Widget_Base {

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
		return 'grada-section-title';
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
		return esc_html__('Section Title', 'vara-plugin');
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
		return 'eicon-heading grada-badge';
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
			'general',
			[
				'label' => esc_html__( 'General', 'vara-plugin' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'vara-plugin' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter your title', 'vara-plugin' ),
				'default' => esc_html__( 'Add Your Heading Text Here', 'vara-plugin' ),
			]
		);

		$this->add_control(
			'section_title_content',
			[
				'label' => esc_html__('Description', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->add_responsive_control(
			'section_title_width',
			[
				'label' => esc_html__('Container Width', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['%', 'px'],
				'default' => [
					'size' => 100,
					'unit' => '%'
				],
				'selectors' => [
					'{{WRAPPER}} .gs-section-title-holder' => 'max-width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'section_title_align',
			[
				'label' => esc_html__( 'Alignment', 'vara-plugin' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gs-section-title-holder' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'section_title_html_tag',
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

		// Title Style
		$this->start_controls_section(
			'title_style',
			[
				'label' => esc_html__( 'Title', 'vara-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_title_color',
			[
				'label' => esc_html__( 'Title Color', 'vara-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gs-section-title-holder .gs-section-title' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_3,
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'section_title_typography',
				'label' => esc_html__('Title Typography', 'vara-plugin'),
				'selector' => '{{WRAPPER}} .gs-section-title-holder .gs-section-title'
			]
		);

		$this->end_controls_section();

		// Content Style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__( 'Content', 'vara-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'section_title_content!' => ''
				],
			]
		);

		$this->add_control(
			'section_content_spacing',
			[
				'label' => esc_html__( 'Spacing', 'vara-plugin' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gs-section-title-holder .gs-section-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'section_content_color',
			[
				'label' => esc_html__( 'Content Color', 'vara-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gs-section-title-holder .gs-section-title-content' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_3,
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'section_content_typography',
				'label' => esc_html__('Content Typography', 'vara-plugin'),
				'selector' => '{{WRAPPER}} .gs-section-title-holder .gs-section-title-content'
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

		$section_title_class = ['gs-section-title-holder'];

		if ( $settings['section_title_align'] === 'center' ) {
		    $section_title_class[] = 'ml-auto';
		    $section_title_class[] = 'mr-auto';
        }

		?>
			<div class="<?php echo esc_attr( implode( ' ', $section_title_class ) ); ?>">
                <?php if ( !empty( $settings['section_title']) || !empty($settings['section_title_content'])) : ?>
                    <div class="gs-section-title-inner">

			            <?php if ( !empty( $settings['section_title'] ) ) : ?>
                            <?php echo sprintf( '<%1$s class="%2$s">%3$s</%1$s>',
					            $settings['section_title_html_tag'],
					            'gs-section-title',
					            $settings['section_title']
				            ); ?>
                        <?php endif; ?>
			            <?php if ( !empty( $settings['section_title_content'] ) ) : ?>
                            <div class="gs-section-title-content">
	                            <?php echo wpautop( $settings['section_title_content'] ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
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
