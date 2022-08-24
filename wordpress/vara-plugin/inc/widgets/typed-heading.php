<?php
namespace GradaElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class GradaTypedHeading extends Widget_Base {

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
		return 'grada-typing-heading';
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
		return esc_html__('Typed Heading', 'vara-plugin');
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
		return 'eicon-animation-text grada-badge';
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
			'typed_heading_functionality',
			[
				'label' => esc_html__('Functionality', 'vara-plugin'),
			]
		);

		$this->add_control(
			'typed_heading_content',
			[
				'label' => esc_html__('Content', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('This is an {{Amazing, Interactive}} Heading.', 'vara-plugin'),
				'description' => __('Add the words inside the double curly brackets, separate the words with commas. <br /> <small>{{First Word, Second Word, Third Word}}</small>', 'vara-plugin')
			]
		);

		$this->add_control(
			'typed_heading_loop',
			[
				'label' => esc_html__('Loop', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('On', 'vara-plugin'),
				'label_off' => esc_html__('Off', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'typed_heading_cursor_char',
			[
				'label' => esc_html__('Cursor Character', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'typed_heading_type_speed',
			[
				'label' => esc_html__('Type Speed', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 9999,
				'step' => 1,
				'default' => 110,
			]
		);

		$this->add_control(
			'typed_heading_start_delay',
			[
				'label' => esc_html__('Start Delay', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 9999,
				'step' => 1,
				'default' => 310,
			]
		);

		$this->add_control(
			'typed_heading_back_delay',
			[
				'label' => esc_html__('Back Delay', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 9999,
				'step' => 1,
				'default' => 510,
			]
		);

		$this->add_control(
			'typed_heading_back_speed',
			[
				'label' => esc_html__('Back Speed', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 9999,
				'step' => 1,
				'default' => 60,
			]
		);

		$this->add_control(
			'typed_heading_html_tag',
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
				'default' => 'h1'
			]
		);

		$this->add_control(
			'typed_heading_alignment',
			[
				'label' => esc_html__('Alignment', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
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
			'typed_heading_content_color',
			[
				'label' => esc_html__('Content Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gs-auto-type' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'typed_heading_typed_color',
			[
				'label' => esc_html__('Typed Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gs-auto-type span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'typed_heading_typed_background_color',
			[
				'label' => esc_html__('Typed Background Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gs-auto-type span' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typed_heading_content_typography',
				'label' => esc_html__('Content Typography', 'vara-plugin'),
				'selector' => '{{WRAPPER}} .gs-auto-type'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typed_heading_typography',
				'label' => esc_html__('Typed Typography', 'vara-plugin'),
				'selector' => '{{WRAPPER}} .gs-auto-type span'
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
		$grada_temporary_strings = $settings['typed_heading_content'];
		$grada_typed_heading_class = ['gs-auto-type'];

		$auto_type_id = 'gs-type-' . uniqid();

		if ($settings['typed_heading_content']) {
			$typed_span = "<span id='". $auto_type_id ."'></span>";
			preg_match_all("/\\{{(.*?)\\}}/", $settings['typed_heading_content'], $typed_strings);
			$settings['typed_heading_content'] = preg_replace("/\\{{(.*?)\\}}/", $typed_span, $settings['typed_heading_content']);
			$typed_strings[1][0] = explode(', ', $typed_strings[1][0]);
		}

		// Alignment
		if ($settings['typed_heading_alignment'] == 'center') {
			$grada_typed_heading_class[] = 'gs-text-center';
		} elseif ($settings['typed_heading_alignment'] == 'right') {
			$grada_typed_heading_class[] = 'gs-text-right';
		}
		// HTML Output
		echo '<'. esc_attr($settings['typed_heading_html_tag']) .' class="'. esc_attr(implode(' ', $grada_typed_heading_class)) .'">' . wp_kses_post($settings['typed_heading_content']) . '</'. esc_attr($settings['typed_heading_html_tag']) .'>';
		?>
		<script>
            jQuery(document).ready(function($){
                new Typed("#<?php echo esc_attr( $auto_type_id ) ?>", {
                    'cursorChar': '<?php echo esc_attr($settings['typed_heading_cursor_char'] ?  $settings['typed_heading_cursor_char'] : '_') ?>',
                    'backSpeed': <?php echo esc_attr($settings['typed_heading_back_speed'] ?  $settings['typed_heading_back_speed'] : '60') ?>,
                    'backDelay': <?php echo esc_attr($settings['typed_heading_back_delay'] ?  $settings['typed_heading_back_delay'] : '510') ?>,
                    'startDelay': <?php echo esc_attr($settings['typed_heading_start_delay'] ?  $settings['typed_heading_start_delay'] : '510') ?>,
                    'typeSpeed': <?php echo esc_attr($settings['typed_heading_type_speed'] ?  $settings['typed_heading_type_speed'] : '510') ?>,
                    'loop': <?php echo esc_attr($settings['typed_heading_loop'] === 'yes' ? 'true' : 'false') ?>,
                    'strings': [<?php foreach( $typed_strings[1][0] as $grada_explode ){ if ($grada_explode != null ){ echo "\"" . esc_attr($grada_explode) . "\"" . ","; } }?>]
                });
            });
		</script>
		<?php
	}
}
