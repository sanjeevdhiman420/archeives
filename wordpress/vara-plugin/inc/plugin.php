<?php
/**
 * Grada Elementor
 * 
 * Page Builder included directly
 * to the theme with custom elements.
 */

namespace GradaElementor;

defined( 'ABSPATH') || die();

// Notice if the Elementor is not active
if (!did_action('elementor/loaded')) {
	return;
}

use Elementor\Plugin as Elementor;
use GradaElementor\Widgets\GradaBlogPosts;
use GradaElementor\Widgets\GradaPortfolio;
use GradaElementor\Widgets\GradaProgressBar;
use GradaElementor\Widgets\GradaGalleryImages;
use GradaElementor\Widgets\GradaTeamMember;
use GradaElementor\Widgets\GradaTypedHeading;
use GradaElementor\Widgets\GradaAnimatedTitle;
use GradaElementor\Widgets\GradaCountdown;
use GradaElementor\Widgets\GradaTestimonialCarousel;
use GradaElementor\Widgets\GradaGoogleMaps;
use GradaElementor\Widgets\GradaShopProducts;
use GradaElementor\Widgets\GradaSectionTitle;
use GradaElementor\Widgets\GradaInteractiveLinks;

use GradaElementor\Widgets\GradaHamburger;
use GradaElementor\Widgets\GradaMenuCart;
use GradaElementor\Widgets\GradaNavMenu;
use GradaElementor\Widgets\GradaSearchForm;
use GradaElementor\Widgets\GradaSiteLogo;
use GradaElementor\Widgets\GradaSiteTitle;

/**
 * Plugin class.
 *
 * @since 1.0.0
 */
final class Plugin {
	/**
	 * Plugin instance.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Plugin
	 */
	public static $instance;

	/**
	 * Modules.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var object
	 */
	public $modules = [];

	/**
	 * The plugin name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var string
	 */
	public static $plugin_name;

	/**
	 * The plugin version number.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var string
	 */
	public static $plugin_version;

	/**
	 * The minimum Elementor version number required.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var string
	 */
	public static $minimum_elementor_version = '2.0.0';

	/**
	 * The plugin directory.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var string
	 */
	public static $plugin_path;

	/**
	 * The plugin URL.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var string
	 */
	public static $plugin_url;

	/**
	 * The plugin assets URL.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var string
	 */
	public static $plugin_assets_url;

	private $post_id;

	/**
	 * Ensures only one instance of the plugin class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function __construct() {
		add_action('plugins_loaded', [$this, 'check_elementor_version' ]);

		add_filter('elementor/fonts/groups', [$this, 'grada_elementor_group']);

		add_filter('elementor/fonts/additional_fonts',[$this, 'grada_custom_fonts']);
	}

	/**
	 * Checks Elementor version compatibility.
	 *
	 * First checks if Elementor is installed and active,
	 * then checks Elementor version compatibility.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function check_elementor_version() {
		if (!version_compare(ELEMENTOR_VERSION, self::$minimum_elementor_version, '>=')) {
			if (current_user_can('update_plugins')) {
				add_action('admin_notices',
				[$this, 'admin_notice_minimum_elementor_version']);
			}
			return;
		}

		spl_autoload_register([$this, 'autoload']);

		$this->add_hooks();
	}

	/**
	 * Autoload classes based on namespace.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param string $class Name of class.
	 */
	public function autoload($class) {

		// Return if GradaElementor name space is not set.
		if (false === strpos($class, __NAMESPACE__)) {
			return;
		}

		/**
		 * Prepare filename.
		 *
		 * @todo Refactor to use preg_replace.
		 */
		$filename = str_replace(__NAMESPACE__ . '\\', '', $class);
		$filename = str_replace('\\', DIRECTORY_SEPARATOR, $filename);
		$filename = str_replace('_', '-', $filename);
		$filename = dirname(__FILE__) . '/' . strtolower($filename) . '.php';

		// Return if file is not found.
		if (! is_readable($filename)) {
			return;
		}

		include $filename;
	}

	/**
	 * Adds required hooks.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function add_hooks() {
		add_action('elementor/init', [$this, 'init'], 0);

		add_action('elementor/widgets/widgets_registered', [$this, 'grada_register_grada_widgets']);

		add_action('elementor/element/after_section_end', [$this, 'grada_fixed_options'], 10, 3);

		add_action('elementor/editor/after_enqueue_styles', function() {
			wp_enqueue_style('grada-elementor-style', plugin_dir_url(__FILE__) . '../assets/css/elementor.css', false, GDS_CORE_VERSION, null);
		});

		add_action('elementor/frontend/before_enqueue_scripts', function() {
			wp_enqueue_script(
				'grada-elementor-script',
				plugin_dir_url(__FILE__) . '../assets/js/elementor.js',
				[
					'elementor-frontend', 
				],
				GDS_CORE_VERSION,
				true // in_footer
			);
		});

		add_action('elementor/theme/register_locations', [$this, 'grada_register_elementor_locations']);

		add_action('elementor/widgets/widgets_registered', [$this, 'grada_unregister_wordpress_widgets'], 10, 3);

		add_action('elementor/controls/animations/additional_animations', [$this, 'grada_extra_animations']);

	}

	public function grada_extra_animations() {
		return [
			'Zooming' => [
				'zoomIn' => 'Zoom In',
				'zoomInDown' => 'Zoom In Down',
				'zoomInLeft' => 'Zoom In Left',
				'zoomInRight' => 'Zoom In Right',
				'zoomInUp' => 'Zoom In Up',
				'gsZoomOut' => 'Zoom Out'
			],
			'Skew' => [
				'gsSkewIn' => 'SkewIn'
			]
		];
	}

	public function grada_unregister_wordpress_widgets($widgetManager) {
		$widgetManager->unregister_widget_type('wp-widget-pages');
		$widgetManager->unregister_widget_type('wp-widget-calendar');
		$widgetManager->unregister_widget_type('wp-widget-media_audio');
		$widgetManager->unregister_widget_type('wp-widget-media_image');
		$widgetManager->unregister_widget_type('wp-widget-media_gallery');
		$widgetManager->unregister_widget_type('wp-widget-media_video');
		$widgetManager->unregister_widget_type('wp-widget-rss');
		$widgetManager->unregister_widget_type('wp-widget-recent-comments');
		$widgetManager->unregister_widget_type('wp-widget-tag_cloud');
		$widgetManager->unregister_widget_type('wp-widget-search');
		$widgetManager->unregister_widget_type('wp-widget-categories');
		$widgetManager->unregister_widget_type('wp-widget-text');
		$widgetManager->unregister_widget_type('wp-widget-meta');
		$widgetManager->unregister_widget_type('wp-widget-archives');
		$widgetManager->unregister_widget_type('wp-widget-recent-posts');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_product_search');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_price_filter');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_layered_nav');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_layered_nav_filters');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_widget_cart');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_product_categories');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_product_tag_cloud');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_recently_viewed_products');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_recent_reviews');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_top_rated_products');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_rating_filter');
		$widgetManager->unregister_widget_type('wp-widget-woocommerce_products');
		$widgetManager->unregister_widget_type('wp-widget-rev-slider-widget');
		$widgetManager->unregister_widget_type('wp-widget-custom_html');
	}

	public function grada_register_grada_widgets() {
		$this->includes();
		$this->register_widget();
	}

	public function grada_elementor_group($font_groups) {
		$new_group['grada_custom_fonts'] = __('Custom Fonts', 'vara-plugin');
		$font_groups = $new_group + $font_groups;

		return $font_groups;
	}

	public function grada_custom_fonts($fonts) {

//		$custom_fonts = grada_custom_fonts();
		
		if (!empty($custom_fonts)) {
			foreach ($custom_fonts as $font) {
				$fonts[$font['label']] = 'grada_custom_fonts';
			}
		}

		return $fonts;
	}

	/**
	 * Add support elementor theme locations.
	 */
	public function grada_register_elementor_locations($elementor_theme_manager) {
		$elementor_theme_manager->register_location('header');
		$elementor_theme_manager->register_location('footer');
		$elementor_theme_manager->register_location('hero');
	}

	/**
	 * Fixed Options
	 * 
	 * Add fixed option to the section,
	 * it can be used for header builder.
	 */
	public function grada_fixed_options($section, $section_id, $args) {

		static $style_sections = [ 'section_background'];

		if (!in_array($section_id, $style_sections)) { return; }

		// Fixed
		$section->start_controls_section(
			'section_fixed_tab',
			[
				'label' => esc_html__('Fixed', 'vara-plugin'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$section->add_control(
			'section_fixed',
			[
				'label' => esc_html__('Fixed', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('On', 'vara-plugin'),
				'label_off' => esc_html__('Off', 'vara-plugin'),
				'return_value' => 'on',
				'default' => 'no',
				'prefix_class' => 'gs-locked-section-',
			]
		);

		$section->add_control(
			'section_fixed_hidden',
			[
				'label' => esc_html__('Hidden', 'vara-plugin'),
				'description' => __('<small>Note: Do not forget to place a hamburger to open this section, use navigator for easier orientation.</small>', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('On', 'vara-plugin'),
				'label_off' => esc_html__('Off', 'vara-plugin'),
				'return_value' => 'invisible',
				'default' => 'no',
				'condition' => [
					'section_fixed' => 'on'
				],
				'prefix_class' => 'gs-locked-section-',
			]
		);

		$section->add_control(
			'section_fixed_hidden_animation',
			[
				'label' => esc_html__('Animation', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'fade-in' => esc_html__('Fade In', 'vara-plugin'),
					'fade-in-left' => esc_html__('Fade In Left', 'vara-plugin'),
					'fade-in-right' => esc_html__('Fade In Right', 'vara-plugin'),
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_fixed',
							'operator' => '==',
							'value' => 'on'
						],
						[
							'name' => 'section_fixed_hidden',
							'operator' => '==',
							'value' => 'invisible'
						],
					]
				],
				'prefix_class' => 'gs-locked-section-',
				'default' => 'fade-in'
			]
		);

		$section->add_control(
			'section_fixed_width',
			[
                'label' => esc_html__('Width', 'vara-plugin'),
                'description' => esc_html__('Move the slider to set the width of fixed section.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'condition' => [
					'section_fixed' => 'on'
				],
				'size_units' => ['px', 'rem', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => 'width: 100%; max-width: {{SIZE}}{{UNIT}}'
				] 
			]
		);

		$section->add_control(
			'section_fixed_alignment',
			[
				'label' => esc_html__('Alignment', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'vara-plugin'),
						'icon' => 'fa fa-align-left',
					],
					'right' => [
						'title' => esc_html__('Right', 'vara-plugin'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'label_block' => false,
				'condition' => [
					'section_fixed' => 'on'
				],
				'prefix_class' => 'gs-locked-section-',
			]
		);

		$section->add_control(
			'section_fixed_close_button',
			[
				'label' => esc_html__('Close Button', 'vara-plugin'),
				'description' => esc_html__('If the close button doesn\'t appears, please refresh the page.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('On', 'vara-plugin'),
				'label_off' => esc_html__('Off', 'vara-plugin'),
				'return_value' => 'close-button',
				'default' => 'no',
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_fixed',
							'operator' => '==',
							'value' => 'on'
						],
						[
							'name' => 'section_fixed_hidden',
							'operator' => '==',
							'value' => 'invisible'
						],
					]
				],
				'prefix_class' => 'gs-locked-section-',
				'render_type' => 'template',
			]
		);

		$section->add_control(
			'section_fixed_close_button_heading',
			[
				'label' => esc_html__('Close Button', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_fixed_close_button',
							'operator' => '==',
							'value' => 'close-button'
						],
						[
							'name' => 'section_fixed_hidden',
							'operator' => '==',
							'value' => 'yes'
						],
					]
				],
			]
		);

		$section->add_control(
			'section_fixed_close_button_color',
			[
				'label' => esc_html__('Color', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gs-close-btn span:before' => 'background-color: {{VALUE}} !important',
					'{{WRAPPER}} .gs-close-btn span:after' => 'background-color: {{VALUE}} !important'
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'section_fixed_close_button',
							'operator' => '==',
							'value' => 'close-button'
						],
						[
							'name' => 'section_fixed_hidden',
							'operator' => '==',
							'value' => 'invisible'
						],
					]
				],
			]
		);

		$section->add_control(
			'_offset_orientation_h',
			[
				'label' => esc_html__('Horizontal Orientation', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label_block' => false,
				'toggle' => false,
				'default' => 'start',
				'options' => [
					'start' => [
						'title' => esc_html__('Start', 'vara-plugin'),
						'icon' => 'eicon-h-align-left',
					],
					'end' => [
						'title' => esc_html__('End', 'vara-plugin'),
						'icon' => 'eicon-h-align-right',
					],
				],
				'classes' => 'elementor-control-start-end',
				'render_type' => 'ui',
				'condition' => [
					'section_fixed_close_button' => 'close-button'
				]
			]
		);

		$section->add_responsive_control(
			'_offset_x',
			[
				'label' => esc_html__('Offset', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'default' => [
					'size' => '0',
				],
				'size_units' => [ 'px', '%', 'vw', 'vh' ],
				'selectors' => [
					'{{WRAPPER}} .gs-close-btn' => 'left: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'_offset_orientation_h!' => 'end',
					'section_fixed_close_button' => 'close-button'
				],
			]
		);

		$section->add_responsive_control(
			'_offset_x_end',
			[
				'label' => esc_html__('Offset', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 0.1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'default' => [
					'size' => '0',
				],
				'size_units' => [ 'px', '%', 'vw', 'vh' ],
				'selectors' => [
					'{{WRAPPER}} .gs-close-btn' => 'right: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'_offset_orientation_h' => 'end',
					'section_fixed_close_button' => 'close-button'
				],
			]
		);

		$section->add_control(
			'_offset_orientation_v',
			[
				'label' => esc_html__('Vertical Orientation', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label_block' => false,
				'toggle' => false,
				'default' => 'start',
				'options' => [
					'start' => [
						'title' => esc_html__( 'Top', 'vara-plugin'),
						'icon' => 'eicon-v-align-top',
					],
					'end' => [
						'title' => esc_html__( 'Bottom', 'vara-plugin'),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'render_type' => 'ui',
				'condition' => [
					'section_fixed_close_button' => 'close-button'
				],
			]
		);

		$section->add_responsive_control(
			'_offset_y',
			[
				'label' => esc_html__('Offset', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'size_units' => [ 'px', '%', 'vh', 'vw' ],
				'default' => [
					'size' => '0',
				],
				'selectors' => [
					'{{WRAPPER}} .gs-close-btn' => 'top: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'_offset_orientation_v!' => 'end',
					'section_fixed_close_button' => 'close-button'
				],
			]
		);

		$section->add_responsive_control(
			'_offset_y_end',
			[
				'label' => esc_html__('Offset', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
					'vh' => [
						'min' => -200,
						'max' => 200,
					],
					'vw' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'size_units' => [ 'px', '%', 'vh', 'vw' ],
				'default' => [
					'size' => '0',
				],
				'selectors' => [
					'{{WRAPPER}} .gs-close-btn' => 'bottom: {{SIZE}}{{UNIT}}; top: auto',
				],
				'condition' => [
					'_offset_orientation_v' => 'end',
					'section_fixed_close_button' => 'close-button'
				],
			]
		);
		
		$section->end_controls_section();
	}


	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		require __DIR__ . '/widgets/progress-bar.php';
		require __DIR__ . '/widgets/typed-heading.php';
		require __DIR__ . '/widgets/animated-title/base.php';
		require __DIR__ . '/widgets/countdown.php';
		require __DIR__ . '/widgets/testimonial-carousel/base.php';
		require __DIR__ . '/widgets/google-map/base.php';
		require __DIR__ . '/widgets/blog/base.php';
		require __DIR__ . '/widgets/gallery-images/base.php';
		require __DIR__ . '/widgets/portfolio/base.php';
		require __DIR__ . '/widgets/section-title.php';
		require __DIR__ . '/widgets/team-member.php';
		require __DIR__ . '/widgets/interactive-links/base.php';

		if ( class_exists('WooCommerce') ) {
			require __DIR__ . '/widgets/shop-products/base.php';
			require __DIR__ . '/widgets/site/menu-cart.php';
		}

		require __DIR__ . '/widgets/site/hamburger.php';
		require __DIR__ . '/widgets/site/nav-menu.php';
		require __DIR__ . '/widgets/site/search-form.php';
		require __DIR__ . '/widgets/site/site-logo.php';
		require __DIR__ . '/widgets/site/site-title.php';
	}
	
	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaProgressBar());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaTypedHeading());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaAnimatedTitle());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaCountdown());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaTestimonialCarousel());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaGoogleMaps());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaBlogPosts());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaGalleryImages());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaPortfolio());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaSectionTitle());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaTeamMember());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaInteractiveLinks());

		if ( class_exists('WooCommerce' ) ) {
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaShopProducts());
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaMenuCart());
		}

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaHamburger());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaNavMenu());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaSearchForm());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaSiteLogo());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new GradaSiteTitle());
	}

	/**
	 * Register modules.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_modules() {
		if ( ! class_exists( 'ElementorPro\Plugin') ) {
			new Core\Library\Module();
		}
	}

	/**
	 * Adds actions after Elementor init.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function init() {

		// Register modules.
		$this->register_modules();

		/**
		 * Elementor Container Width
		 */
		if (!get_option('elementor_container_width')) {
			update_option('elementor_container_width', '1370');
		}

		// Add this category, after basic category.
		Elementor::$instance->elements_manager->add_category(
			'grada-category',
			[
				'title' => esc_html__('Vara Plugin', 'vara-plugin'),
				'icon'  => 'fa fa-plug',
			],
			1
		);

		Elementor::$instance->elements_manager->add_category(
			'grada-site-category',
			[
				'title' => esc_html__('Vara Site', 'vara-plugin'),
				'icon'  => 'fa fa-plug',
			],
			2
		);

		do_action('GradaElementor/init');
	}

	public function set_post_id( $post_id ) {
		$this->post_id = $post_id;
	}
}

/**
 * Returns the Plugin application instance.
 *
 * @since 1.0.0
 *
 * @return Plugin
 */
function GradaElementor() {
	return Plugin::get_instance();
}

/**
 * Initializes the Plugin application.
 *
 * @since 1.0.0
 */
GradaElementor();
