<?php
namespace GradaElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class GradaCountdown extends Widget_Base {

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
		return 'grada-countdown';
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
		return esc_html__('Countdown', 'vara-plugin');
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
		return 'eicon-countdown grada-badge';
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
			'countdown_functionality',
			[
				'label' => esc_html__('Functionality', 'vara-plugin'),
			]
		);

		$this->add_control(
			'due_date',
			[
				'label' => esc_html__('Due Date', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
				'default' => date('Y-m-d H:i', strtotime('+1 month') + (get_option('gmt_offset') * HOUR_IN_SECONDS)),
				'description' => esc_html__('Date set according to your timezone: %s.', 'vara-plugin'),
			]
		);

		$this->add_control(
			'view',
			[
				'label' => esc_html__('View', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'block' => esc_html__('Block', 'vara-plugin'),
					'inline' => esc_html__('Inline', 'vara-plugin'),
				],
				'default' => 'block'
			]
		);

		$this->add_control(
			'days',
			[
				'label' => esc_html__('Days', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'vara-plugin'),
				'label_off' => esc_html__('Hide', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'hours',
			[
				'label' => esc_html__('Hours', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'vara-plugin'),
				'label_off' => esc_html__('Hide', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'minutes',
			[
				'label' => esc_html__('Minutes', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'vara-plugin'),
				'label_off' => esc_html__('Hide', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'seconds',
			[
				'label' => esc_html__('Seconds', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'vara-plugin'),
				'label_off' => esc_html__('Hide', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'labels',
			[
				'label' => esc_html__('Labels', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'vara-plugin'),
				'label_off' => esc_html__('Hide', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'custom_labels',
			[
				'label' => esc_html__('Custom Labels', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'vara-plugin'),
				'label_off' => esc_html__('No', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => [
					'labels' => 'yes'
				]
			]
		);

		$this->add_control(
			'custom_labels_days',
			[
				'label'   => esc_html__('Days', 'vara-plugin'),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__('Days', 'vara-plugin'),
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'labels',
							'operator' => '==',
							'value' => 'yes',
						],
						[
							'name' => 'custom_labels',
							'operator' => '==',
							'value' => 'yes',
						],
						[
							'name' => 'days',
							'operator' => '==',
							'value' => 'yes'
						],
					],
				]
			]
		);

		$this->add_control(
			'custom_labels_hours',
			[
				'label'   => esc_html__('Hours', 'vara-plugin'),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__('Hours', 'vara-plugin'),
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'labels',
							'operator' => '==',
							'value' => 'yes',
						],
						[
							'name' => 'custom_labels',
							'operator' => '==',
							'value' => 'yes',
						],
						[
							'name' => 'hours',
							'operator' => '==',
							'value' => 'yes'
						],
					],
				]
			]
		);

		$this->add_control(
			'custom_labels_minutes',
			[
				'label'   => esc_html__('Minutes', 'vara-plugin'),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__('Minutes', 'vara-plugin'),
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'labels',
							'operator' => '==',
							'value' => 'yes',
						],
						[
							'name' => 'custom_labels',
							'operator' => '==',
							'value' => 'yes',
						],
						[
							'name' => 'minutes',
							'operator' => '==',
							'value' => 'yes'
						],
					],
				]
			]
		);

		$this->add_control(
			'custom_labels_seconds',
			[
				'label'   => esc_html__('Seconds', 'vara-plugin'),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__('Seconds', 'vara-plugin'),
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'labels',
							'operator' => '==',
							'value' => 'yes',
						],
						[
							'name' => 'custom_labels',
							'operator' => '==',
							'value' => 'yes',
						],
						[
							'name' => 'seconds',
							'operator' => '==',
							'value' => 'yes'
						],
					],
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'countdown_boxes',
			[
				'label' => esc_html__('Boxes', 'vara-plugin'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'boxes_container_width',
			[
				'label' => esc_html__('Container Width', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['%', 'px'],
				'default' => [
					'size' => 100,
					'unit' => '%'
				],
				'selectors' => [
					'{{WRAPPER}} .gs-countdown' => 'max-width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'boxes_background_color',
			[
				'label' => esc_html__('Background Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gs-countdown .gs-countdown-section' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'boxes_border',
				'selector' => '{{WRAPPER}} .gs-countdown .gs-countdown-section',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'boxes_border_radius',
			[
				'label' => esc_html__('Border Radius', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .gs-countdown .gs-countdown-section' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'boxes_space_between',
			[
				'label' => esc_html__('Space Between', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .gs-countdown .gs-countdown-section:not(:first-of-type)' => 'margin-left: calc( {{SIZE}}{{UNIT}}/2 );',
					'{{WRAPPER}} .gs-countdown .gs-countdown-section:not(:last-of-type)' => 'margin-left: calc( {{SIZE}}{{UNIT}}/2 );',
				],
			]
		);

		$this->add_control(
			'boxes_padding',
			[
				'label' => esc_html__('Padding', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .gs-countdown .gs-countdown-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'countdown_content',
			[
				'label' => esc_html__('Content', 'vara-plugin'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_numbers_heading',
			[
				'label' => esc_html__('Numbers', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::HEADING
			]
		);

		$this->add_control(
			'numbers_color',
			[
				'label' => esc_html__('Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gs-countdown .gs-countdown-section .gs-countdown-value' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'numbers_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .gs-countdown .gs-countdown-section .gs-countdown-value',
			]
		);

		$this->add_control(
			'content_labels_heading',
			[
				'label' => esc_html__('Labels', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'labels_color',
			[
				'label' => esc_html__('Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gs-countdown .gs-countdown-section .gs-countdown-period' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'labels_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .gs-countdown .gs-countdown-section .gs-countdown-period',
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

		$countdown_markup = [];

		$countdown = [
			'days' => [
				'number' => '%D',
				'label' => $settings['custom_labels_days'] ? $settings['custom_labels_days'] : esc_html__('Days', 'vara-plugin'),
				'visibility' => $settings['days']
			],
			'hours' => [
				'number' => '%H',
				'label' => $settings['custom_labels_hours'] ? $settings['custom_labels_hours'] : esc_html__('Hours', 'vara-plugin'),
				'visibility' => $settings['hours']
			],
			'minutes' => [
				'number' => '%M',
				'label' => $settings['custom_labels_minutes'] ? $settings['custom_labels_minutes'] : esc_html__('Minutes', 'vara-plugin'),
				'visibility' => $settings['minutes']
			],
			'seconds' => [
				'number' => '%S',
				'label' => $settings['custom_labels_seconds'] ? $settings['custom_labels_seconds'] : esc_html__('Seconds', 'vara-plugin'),
				'visibility' => $settings['seconds']
			],
		];

		$countdown_id = 'gs-countdown-' . uniqid();

		/**
		 * View
		 */
		if ($settings['view'] == 'block') {
			$countdown_numbers_class = 'gs-countdown-value d-block';
			$countdown_label_class = 'gs-countdown-period d-block';
		} else {
			$countdown_numbers_class = 'gs-countdown-value d-inline-block';
			$countdown_label_class = 'gs-countdown-period d-inline-block';
		}

		foreach($countdown as $count) {
			if ($count['visibility'] == 'yes') {
				$countdown_markup[] = '<div class="gs-countdown-section"><span class="'. $countdown_numbers_class .'">'. $count['number'] .'</span>';
				$countdown_markup[] = $settings['labels'] ? '<span class="'. $countdown_label_class .'">' . $count['label'] .'</span>' : '';
				$countdown_markup[] = '</div>';
			}
		}
		?>
		<div id="<?php echo esc_attr( $countdown_id ); ?>" class="gs-countdown"></div>
		<script type="text/javascript">
            jQuery(document).ready(function($){
                $('#<?php echo esc_attr( $countdown_id ); ?>').countdown('<?php echo $settings['due_date'] ?>', function(event) {
                    var $this = $(this).html(event.strftime('<?php echo implode('', $countdown_markup) ?>'));
                });
            });
		</script>
		<?php
	}
}
