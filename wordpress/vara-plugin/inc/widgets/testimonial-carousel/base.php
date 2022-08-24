<?php
namespace GradaElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class GradaTestimonialCarousel extends Widget_Base {

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
		return 'grada-testimonial-carousel';
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
		return esc_html__('Testimonial Carousel', 'vara-plugin');
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
		return 'eicon-testimonial-carousel grada-badge';
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
			'slides_section',
			[
				'label' => esc_html__('Slides', 'vara-plugin'),
			]
		);

		$this->add_control(
			'slides',
			[
				'label' => esc_html__('Slides', 'vara-plugin'),
				'description' => esc_html__('Add slides to the testimonial carousel.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'content',
						'label' => esc_html__('Content', 'vara-plugin'),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__('I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'vara-plugin')
					],
					[
						'name' => 'image',
						'label' => esc_html__('Image', 'vara-plugin'),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => get_template_directory_uri() . '/assets/images/placeholder.png'
						],
					],
					[
						'name' => 'name',
						'label' => esc_html__('Name', 'vara-plugin'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__('John Doe', 'vara-plugin')
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'vara-plugin'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__('Developer', 'vara-plugin')
					],
				],
				'default' => [
					[
						'content' => esc_html__('I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'vara-plugin'),
						'name' => esc_html__('John Doe', 'vara-plugin'),
						'title' => esc_html__('Developer', 'vara-plugin'),
						'image' => [
							'url' => get_template_directory_uri() . '/assets/images/placeholder.png'
						],
					],
					[
						'content' => esc_html__('I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'vara-plugin'),
						'name' => esc_html__('Chris Parker', 'vara-plugin'),
						'title' => esc_html__('Designer', 'vara-plugin'),
						'image' => [
							'url' => get_template_directory_uri() . '/assets/images/placeholder.png'
						],
					],
					[
						'content' => esc_html__('I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'vara-plugin'),
						'name' => esc_html__('Peter Jack', 'vara-plugin'),
						'title' => esc_html__('CEO', 'vara-plugin'),
						'image' => [
							'url' => get_template_directory_uri() . '/assets/images/placeholder.png'
						],
					],
				],
			]
		);

		$this->add_control(
			'layout',
			[
				'label' => esc_html__('Layout', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'image-inline' => esc_html__('Image Inline', 'vara-plugin'),
					'image-stacked' => esc_html__('Image Stacked', 'vara-plugin'),
					'image-above' => esc_html__('Image Above', 'vara-plugin'),
					'image-left' => esc_html__('Image Left', 'vara-plugin'),
					'image-right' => esc_html__('Image Right', 'vara-plugin'),
				],
				'default' => 'image-inline',
				'render_type' => 'template',
				'prefix_class' => 'gs-testimonial-list-'
			]
		);

		$this->add_control(
			'alignment',
			[
				'label' => esc_html__('Alignment', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label_block' => false,
				'default' => 'center',
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
				'prefix_class' => 'testimonials-content-'
			]
		);

		$this->add_responsive_control(
			'columns',
			[
				'label' => __('Columns', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1' => __('1 Column', 'vara-plugin'),
					'2' => __('2 Columns', 'vara-plugin'),
					'3' => __('3 Columns', 'vara-plugin'),
					'4' => __('4 Columns', 'vara-plugin'),
					'5' => __('5 Columns', 'vara-plugin'),
					'6' => __('6 Columns', 'vara-plugin')
				],
				'default' => '1'
			]
		);

		$this->add_control(
			'animation',
			[
				'label' => __('Animation', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' 				 	=> esc_html__('None', 'vara-plugin'),
					'gsFadeIn'	 	=> esc_html__('Fade In', 'vara-plugin'),
					'gsFadeInUp' 	  	=> esc_html__('Fade In Up', 'vara-plugin'),
					'gsFadeInLeft'  	=> esc_html__('Fade In Left', 'vara-plugin'),
					'gsFadeInRight' 	=> esc_html__('Fade In Right', 'vara-plugin'),
					'gsZoomIn' 	 	=> esc_html__('Zoom In', 'vara-plugin'),
					'gsZoomOut' 	 	=> esc_html__('Zoom Out', 'vara-plugin'),
					'gsPreserve3d' 	=> esc_html__('Preserve 3d', 'vara-plugin'),
                    'gsSkewIn' => esc_html__('SkewIn', 'vara-plugin')
				],
				'default' => 'gsFadeIn',
			]
		);

		$this->add_control(
			'animation_delay',
			[
				'label' => __('Animation Delay', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => [
					'animation!' => 'none'
				]
			]
		);

		$this->add_responsive_control(
			'width',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => __('Width', 'vara-plugin'),
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1300,
					],
					'%' => [
						'min' => 50,
					],
				],
				'size_units' => ['%', 'px'],
				'default' => [
					'size' => 100,
					'unit' => '%',
				],
				'selectors' => [
					'{{WRAPPER}} .owl-item .gs-testimonial-item' => 'width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'carousel',
			[
				'label' => __('Carousel', 'vara-plugin')
			]
		);

		$this->add_responsive_control(
			'carousel_margin',
			[
				'label' => __('Margin', 'vara-plugin'),
				'description' => __('Enter the margin space, number will be represented in pixels.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 10,
				'min'     => 0,
				'max'     => 100,
				'step'    => 1
			]
		);

		$this->add_control(
			'carousel_auto_height',
			[
				'label' => __('Auto Height', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1' => __('On', 'vara-plugin'),
					'2' => __('Off', 'vara-plugin'),
				],
				'default' => '1'
			]
		);

		$this->add_control(
			'carousel_loop',
			[
				'label' => __('Loop', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'vara-plugin'),
				'label_off' => __('Off', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'carousel_mouse_drag',
			[
				'label' => __('Mouse Drag', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'vara-plugin'),
				'label_off' => __('Off', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'carousel_touch_drag',
			[
				'label' => __('Touch Drag', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'vara-plugin'),
				'label_off' => __('Off', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'carousel_navigation',
			[
				'label' => __('Navigation', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'vara-plugin'),
				'label_off' => __('Off', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'carousel_navigation_bottom',
			[
				'label' => __('Navigation Bottom?', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'vara-plugin'),
				'label_off' => __('Off', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'no',
                'condition' => [
                    'carousel_navigation' => 'yes'
                ]
			]
		);

		$this->add_control(
			'carousel_dots',
			[
				'label' => __('Dots', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'vara-plugin'),
				'label_off' => __('Off', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'carousel_autoplay',
			[
				'label' => __('Autoplay', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'vara-plugin'),
				'label_off' => __('Off', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'carousel_pause',
			[
				'label' => __('Pause on mouse house', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('On', 'vara-plugin'),
				'label_off' => __('Off', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_responsive_control(
			'carousel_stage_padding',
			[
				'label' => __('Stage Padding', 'vara-plugin'),
				'description' => __('Padding left and right on stage (can see neighbours).', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 0,
				'min'     => 0,
				'max'     => 500,
				'step'    => 1
			]
		);

		$this->add_control(
			'carousel_start_position',
			[
				'label' => __('Start Position', 'vara-plugin'),
				'description' => __('Enter from which element you want to start the position of carousel.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 0,
				'min'     => 0,
				'max'     => 500,
				'step'    => 1
			]
		);

		$this->add_control(
			'carousel_autoplay_timeout',
			[
				'label' => __('Auto Play Timeout', 'vara-plugin'),
				'description' => __('Autoplay interval timeout, number is represented in seconds.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 2,
				'min'     => 0,
				'max'     => 500,
				'step'    => 0.1
			]
		);

		$this->add_control(
			'carousel_smart_speed',
			[
				'label' => __('Smart Speed', 'vara-plugin'),
				'description' => __('Speed Calculate, number is represented in seconds.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 4.5,
				'min'     => 0,
				'max'     => 500,
				'step'    => 0.1
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slides_section_style',
			[
				'label' => __('Slides', 'vara-plugin'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'slide_background_color',
			[
				'label' => __('Background Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gs-testimonial-item' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'slide_border_type',
			[
				'label' => __('Border Type', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => __('None', 'vara-plugin'),
					'solid' => __('Solid', 'vara-plugin'),
					'double' => __('Double', 'vara-plugin'),
					'dotted' => __('Dotted', 'vara-plugin'),
					'dashed' => __('Dashed', 'vara-plugin'),
					'groove' => __('Groove', 'vara-plugin')
				],
				'default' => 'none',
				'selectors' => [
					'{{WRAPPER}} .gs-testimonial-item' => 'border-style: {{VALUE}}'
				],
			]
		);

		$this->add_responsive_control(
			'slide_border_size',
			[
				'label' => __('Border Size', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .gs-testimonial-item' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition' => [
					'slide_border_type!' => 'none'
				]
			]
		);

		$this->add_control(
			'slide_border_color',
			[
				'label' => __('Border Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gs-testimonial-item' => 'border-color: {{VALUE}}',
				],
				'condition' => [
					'slide_border_type!' => 'none'
				]
			]
		);


		$this->add_responsive_control(
			'slide_border_radius',
			[
				'label' => __('Border Radius', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'%' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gs-testimonial-item' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'slide_border_type!' => 'none'
				]
			]
		);

		$this->add_responsive_control(
			'slide_padding',
			[
				'label' => __('Padding', 'vara-plugin'),
				'size_units' => ['px', 'rem', '%'],
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .gs-testimonial-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __('Content', 'vara-plugin'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_gap',
			[
				'label' => __('Gap', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.gs-testimonial-list-image-inline .testimonial-body' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}}.gs-testimonial-list-image-stacked .testimonial-body' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}}.gs-testimonial-list-image-right .testimonial-body' => 'padding-right: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}}.gs-testimonial-list-image-left .testimonial-body' => 'padding-left: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}}.gs-testimonial-list-image-above .testimonial-body' => 'margin-top: {{SIZE}}{{UNIT}}'
				],
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Text Color', 'vara-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gs-testimonial-item .testimonial-text' => 'color: {{VALUE}};',
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
				'label' => esc_html__('Text Typography', 'vara-plugin'),
				'selector' => '{{WRAPPER}} .gs-testimonial-item .testimonial-text'
			]
		);

		$this->add_control(
			'name_title_style',
			[
				'label' => __('Name', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'name_color',
			[
				'label' => __('Text Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-author-name' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'selector' => '{{WRAPPER}} .testimonial-author-name',
			]
		);

		$this->add_control(
			'heading_title_style',
			[
				'label' => __('Title', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __('Text Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-author-job' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .testimonial-author-job',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image_style',
			[
				'label' => __('Image', 'vara-plugin'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'image_size',
			[
				'label' => __('Size', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-avatar' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'image_border_size',
			[
				'label' => __('Border Size', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial-avatar img' => 'border-width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'image_border_type',
			[
				'label' => __('Border Type', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => __('None', 'vara-plugin'),
					'solid' => __('Solid', 'vara-plugin'),
					'double' => __('Double', 'vara-plugin'),
					'dotted' => __('Dotted', 'vara-plugin'),
					'dashed' => __('Dashed', 'vara-plugin'),
					'groove' => __('Groove', 'vara-plugin')
				],
				'default' => 'none',
				'selectors' => [
					'{{WRAPPER}} .testimonial-avatar img' => 'border-style: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'image_border_radius',
			[
				'label' => __('Border Radius', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'%' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-avatar img' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'image_border_color',
			[
				'label' => __('Border Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-avatar img' => 'border-color: {{VALUE}}',
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

		$testimonial_id = 'testimonial-carousel-' . uniqid();

		$carousel_class = ['owl-carousel', 'owl-theme'];

		if ( $settings['carousel_navigation_bottom'] ) {
		    $carousel_class[] = 'owl-nav-bottom';
        }

		/**
		 * Animation & WOW Delay
		 */
		$grada_data_wow_delay = false;
		$grada_data_wow_seconds = 0;
		$grada_slider_class = 'wow gs-testimonial-item';

		if ($settings['animation'] != 'none') {
			if ($settings['animation_delay'] == 'yes' && !\Elementor\Plugin::$instance->editor->is_edit_mode()) {
				$grada_data_wow_delay = true;
				$grada_slider_class .= $settings['carousel_stage_padding'] ? ' wow ' . $settings['animation'] : ' wow init-anim';
			} elseif ($settings['animation_delay'] != 'yes') {
				$grada_slider_class .= ' wow ' . $settings['animation'];
			}
		}
		?>
		<div class="<?php echo esc_attr(implode(' ', $carousel_class));?>" id="<?php echo esc_attr( $testimonial_id ); ?>" data-animation="<?php echo esc_attr($settings['animation']) ?>" data-wow="<?php echo esc_attr($settings['animation_delay']) ?>">
			<?php foreach ($settings['slides'] as $slide) : ?>
				<?php
				/**
				 * WOW Animation
				 */
				if ($grada_data_wow_seconds == 6) {
					$grada_data_wow_seconds = 0;
				}
				$grada_wow_holder = "data-wow-delay=". $grada_data_wow_seconds / 10 ."s";
				?>
				<div class="<?php echo esc_attr($grada_slider_class) ?>" <?php echo esc_attr($grada_data_wow_delay === true && $grada_data_wow_seconds ? $grada_wow_holder : '') ?>>
					<?php if ($slide['image']['url'] && $settings['layout'] == 'image-above') : ?>
						<div class="testimonial-avatar">
							<img src="<?php echo esc_url($slide['image']['url']) ?>" alt="<?php echo esc_attr($slide['name']) ?>">
						</div>
					<?php endif; ?>
					<?php if ($slide['content']) : ?>
						<div class="testimonial-body">
							<?php if ($slide['content']) : ?>
								<div class="testimonial-text"><?php echo wp_kses_post($slide['content']) ?></div>
							<?php endif; ?>
							<?php if ($settings['layout'] == 'image-left' || $settings['layout'] == 'image-right') : ?>
								<div class="testimonial-author">
									<?php if ($slide['name']) : ?>
										<span class="testimonial-author-name"><?php echo esc_attr($slide['name']) ?></span>
									<?php endif; ?>
									<?php if ($slide['title']) : ?>
										<span class="testimonial-author-job"><?php echo esc_attr($slide['title']) ?></span>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<div class="testimonial-bottom">
						<?php if ($slide['image']['url'] && $settings['layout'] != 'image-above') : ?>
							<div class="testimonial-avatar">
								<img src="<?php echo esc_url($slide['image']['url']) ?>" alt="<?php echo esc_attr($slide['name']) ?>">
							</div>
						<?php endif; ?>
						<?php if ($settings['layout'] != 'image-left' && $settings['layout'] != 'image-right') : ?>
							<div class="testimonial-author">
								<?php if ($slide['name']) : ?>
									<span class="testimonial-author-name"><?php echo esc_attr($slide['name']) ?></span>
								<?php endif; ?>
								<?php if ($slide['title']) : ?>
									<span class="testimonial-author-job"><?php echo esc_attr($slide['title']) ?></span>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<?php $grada_data_wow_seconds = $grada_data_wow_seconds + 2; endforeach; ?>
		</div>
		<script type="text/javascript">
            jQuery(function ($) {
                var owl = $('#<?php echo esc_attr( $testimonial_id ); ?>');
                var isRtl = $('body').hasClass('rtl') ? true : false;

                owl.owlCarousel({
                    items: <?php echo esc_attr($settings['columns_mobile'] ? $settings['columns_mobile'] : '1') ?>,
                    margin: <?php echo esc_attr($settings['carousel_margin_mobile'] ? $settings['carousel_margin_mobile'] : '10') ?>,
                    rtl: isRtl,
                    autoHeight: <?php echo esc_attr($settings['carousel_auto_height'] == '1' ? 'true' : 'false') ?>,
                    loop: <?php echo esc_attr($settings['carousel_loop'] === 'yes' ? 'true' : 'false') ?>,
                    mouseDrag: <?php echo esc_attr($settings['carousel_mouse_drag'] === 'yes' ? 'true' : 'false') ?>,
                    touchDrag: <?php echo esc_attr($settings['carousel_touch_drag'] === 'yes' ? 'true' : 'false') ?>,
                    stagePadding: <?php echo esc_attr($settings['carousel_stage_padding_mobile'] ? $settings['carousel_stage_padding_mobile'] : '0') ?>,
                    startPosition: <?php echo esc_attr($settings['carousel_start_position'] ? $settings['carousel_start_position'] : '0') ?>,
                    nav: <?php echo esc_attr($settings['carousel_navigation'] === 'yes' ? 'true' : 'false') ?>,
                    navText: [
                        '<svg width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.75 16.5L8.25 11l5.5-5.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                        '<svg width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.25 16.5l5.5-5.5-5.5-5.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                    ],
                    dots: <?php echo esc_attr($settings['carousel_dots'] === 'yes' ? 'true' : 'false') ?>,
                    autoplay: <?php echo esc_attr($settings['carousel_autoplay'] === 'yes' ? 'true' : 'false') ?>,
                    autoplayTimeout: <?php echo esc_attr($settings['carousel_autoplay_timeout'] ? $settings['carousel_autoplay_timeout'] * 1000 : '2000') ?>,
                    autoplayHoverPause: <?php echo esc_attr($settings['carousel_pause'] === 'yes' ? 'true' : 'false') ?>,
                    smartSpeed: <?php echo esc_attr($settings['carousel_smart_speed'] ? $settings['carousel_smart_speed'] * 100 : '450') ?>,
                    responsive:{
                        768:{
                            items: <?php echo esc_attr($settings['columns_tablet'] ? $settings['columns_tablet'] : '1') ?>,
                            margin: <?php echo esc_attr($settings['carousel_margin_tablet'] ? $settings['carousel_margin_tablet'] : '5') ?>,
                            stagePadding: <?php echo esc_attr($settings['carousel_stage_padding_tablet'] ? $settings['carousel_stage_padding_tablet'] : '0') ?>
                        },
                        992:{
                            items: <?php echo esc_attr($settings['columns'] ? $settings['columns'] : '1') ?>,
                            margin: <?php echo esc_attr($settings['carousel_margin'] ? $settings['carousel_margin'] : '0') ?>,
                            stagePadding: <?php echo esc_attr($settings['carousel_stage_padding'] ? $settings['carousel_stage_padding'] : '0') ?>
                        }
                    }
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
