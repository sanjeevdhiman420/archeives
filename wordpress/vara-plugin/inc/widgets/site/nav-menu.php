<?php
namespace GradaElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class GradaNavMenu extends Widget_Base {

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
		return 'grada-nav-menu';
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
		return esc_html__('Nav Menu', 'vara-plugin');
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
		return 'eicon-nav-menu grada-badge';
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

	private function get_all_menus() {
		$menus = wp_get_nav_menus();

		$options = [];

		foreach ( $menus as $menu ) {
			$options[ $menu->slug ] = $menu->name;
		}

		return $options;
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
			'nav_menu_functionality',
			[
				'label' => esc_html__('Functionality', 'vara-plugin'),
			]
		);

		$this->add_control(
			'nav_menu_raw',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => __('<strong>If there is any issue on the mega menu or dropdown menu, please reload the editor.</strong>', 'vara-plugin'),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-info'
			]
		);

		$menus = $this->get_all_menus();

		if ( ! empty( $menus ) ) {
			$this->add_control(
				'nav_menu',
				[
					'label' => esc_html__('Menu', 'vara-plugin'),
					'type' => Controls_Manager::SELECT,
					'options' => $menus,
					'default' => array_keys($menus)[0],
					'save_default' => true,
					'description' => sprintf(__('Go to the <a href="%s" target="_blank">Menus Screen</a> to manage your menus.', 'vara-plugin'), admin_url('nav-menus.php')),
				]
			);
		} else {
			$this->add_control(
				'nav_menu',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => sprintf(__('<strong>There are no menus in your site.</strong><br>Go to the <a href="%s" target="_blank">Menus Screen</a> to create one.', 'vara-plugin'), admin_url('nav-menus.php?action=edit&menu=0')),
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}

		$this->add_control(
			'nav_menu_layout',
			[
				'label' => esc_html__('Layout', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'horizontal' => esc_html__('Horizontal', 'vara-plugin'),
					'vertical' => esc_html__('Vertical', 'vara-plugin')
				],
				'default' => 'horizontal',
				'render_type' => 'template'
			]
		);

		$this->add_responsive_control(
			'nav_menu_alignment',
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
					'{{WRAPPER}} nav > ul:not(.sub-menu)' => 'text-align: {{VALUE}}',
				],
				'label_block' => false,
				'default' => 'left'
			]
		);

		$this->add_control(
			'nav_menu_active_class',
			[
				'label' => esc_html__('Active Class', 'vara-plugin'),
				'type' => Controls_Manager::SWITCHER,
				'description' => esc_html__('Enable the active class on scroll, the menu item href should be the same with section id.', 'vara-plugin'),
				'return_value' => 'on',
				'default' => 'no',
				'prefix_class' => 'navigation-menu-active-'
			]
		);

		$this->add_control(
			'nav_menu_mobile_menu_heading',
			[
				'label' => esc_html__('Mobile Menu', 'vara-plugin'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'nav_menu_mobile_visibility',
			[
				'label' => esc_html__('Visibility', 'vara-plugin'),
				'type' => Controls_Manager::SWITCHER,
				'description' => esc_html__('Activate the mobile menu on the mobile devices.', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'yes',
				'prefix_class' => 'nav-menu-view-'
			]
		);

		$this->add_control(
			'nav_menu_mobile_breakpoint',
			[
				'label' => esc_html__('Breakpoint', 'vara-plugin'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'desktop' => esc_html__('Desktop', 'vara-plugin'),
					'tablet' => esc_html__('Tablet', 'vara-plugin'),
					'mobile' => esc_html__('Mobile', 'vara-plugin'),
				],
				'condition' => [
					'nav_menu_mobile_visibility' => 'yes'
				],
				'prefix_class' => 'nav-menu-view-',
				'default' => 'mobile'
			]
		);

		$this->add_control(
			'nav_menu_mobile_full_width',
			[
				'label' => esc_html__('Full Width', 'vara-plugin'),
				'type' => Controls_Manager::SWITCHER,
				'description' => esc_html__('Stretch the dropdown of the menu to full width.', 'vara-plugin'),
				'prefix_class' => 'navigation-menu-',
				'return_value' => 'full-width',
				'default' => 'full-width',
				'condition' => [
					'nav_menu_mobile_visibility' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'nav_menu_mobile_dropdown_toggle_alignment',
			[
				'label' => esc_html__('Toggle Alignment', 'vara-plugin'),
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
				'condition' => [
					'nav_menu_mobile_visibility' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .widget-mobile-nav-btn-holder' => 'justify-content: flex-{{VALUE}} !important; -webkit-box-pack: {{VALUE}} !important; -ms-flex-pack: {{VALUE}} !important;'
				],
				'default' => 'start'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'nav_menu_style',
			[
				'label' => esc_html__('Main Menu', 'vara-plugin'),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'nav_menu_typography',
				'selector' => '{{WRAPPER}} nav > ul > li > a',
			]
		);

		$this->start_controls_tabs('nav_menu_normal');

		$this->start_controls_tab(
			'nav_menu_normal_tab',
			[
				'label' => esc_html__('Normal', 'vara-plugin'),
			]
		);

		$this->add_control(
			'nav_menu_normal_color',
			[
				'label' => esc_html__('Text Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .menu-navigation-regular > ul > li > a' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .menu-navigation-vertical > ul > li > a' => 'color: {{VALUE}} !important'
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'nav_menu_hover_tab',
			[
				'label' => esc_html__('Hover', 'vara-plugin'),
			]
		);

		$this->add_control(
			'nav_menu_hover_color',
			[
				'label' => esc_html__('Text Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .menu-navigation-regular ul li:hover > a' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .menu-navigation-vertical ul li:hover > a' => 'color: {{VALUE}} !important'
				],
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'nav_menu_active_tab',
			[
				'label' => esc_html__('Active', 'vara-plugin'),
			]
		);

		$this->add_control(
			'nav_menu_active_color',
			[
				'label' => esc_html__('Text Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .menu-navigation-regular ul li.menu-item.current_page_ancestor > a' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .menu-navigation-regular ul li.menu-item.current_page_item > a' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .menu-navigation-regular ul li.menu-item.active > a' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .menu-navigation-vertical ul li.menu-item.current_page_ancestor > a' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .menu-navigation-vertical ul li.menu-item.current_page_item > a' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .menu-navigation-vertical ul li.menu-item.active > a' => 'color: {{VALUE}} !important'
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'nav_menu_horizontal_padding',
			[
				'label' => esc_html__('Horizontal Padding', 'vara-plugin'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'size_units' => ['px', 'rem'],
				'devices' => ['desktop', 'tablet'],
				'selectors' => [
					'{{WRAPPER}} .menu-navigation-regular > ul > li' => 'margin-left: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .menu-navigation-vertical > ul > li' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}}',
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'nav_menu_vertical_padding',
			[
				'label' => esc_html__('Vertical Padding', 'vara-plugin'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'size_units' => ['px', 'rem'],
				'devices' => ['desktop', 'tablet'],
				'selectors' => [
					'{{WRAPPER}} nav > ul > li' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .menu-navigation-vertical > ul > li.menu-item-has-children > .submenu-icon' => 'margin-top: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'nav_menu_dropdown',
			[
				'label' => esc_html__('Dropdown', 'vara-plugin'),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'nav_menu_dropdown_typography',
				'exclude' => ['line_height'],
				'selector' => '{{WRAPPER}} nav ul li.menu-item-has-children > ul.sub-menu li a, {{WRAPPER}} nav ul li.menu-item.menu-item-has-children.menu-mega-dropdown > ul.sub-menu > li.menu-item ul.sub-menu li.menu-item a',
			]
		);

		$this->add_responsive_control(
			'nav_menu_dropdown_background_color',
			[
				'label' => esc_html__('Background Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} nav ul li.menu-item-has-children > ul.sub-menu, {{WRAPPER}} nav > ul > li > .sub-menu:after' => 'background-color: {{VALUE}} !important',
				],
				'separator' => 'after'
			]
		);

		$this->start_controls_tabs('nav_menu_dropdown_tabs');

		$this->start_controls_tab(
			'nav_menu_dropdown_normal_tab',
			[
				'label' => esc_html__('Normal', 'vara-plugin'),
			]
		);

		$this->add_responsive_control(
			'nav_menu_dropdown_normal_text_color',
			[
				'label' => esc_html__('Text Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} nav ul li.menu-item-has-children > ul.sub-menu li a' => 'color: {{VALUE}} !important',
				],
				'separator' => 'after'
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'nav_menu_dropdown_hover_tab',
			[
				'label' => esc_html__('Hover', 'vara-plugin'),
			]
		);

		$this->add_responsive_control(
			'nav_menu_dropdown_hover_text_color',
			[
				'label' => esc_html__('Text Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} nav ul li.menu-item-has-children > ul.sub-menu li:hover > a' => 'color: {{VALUE}} !important',
				],
				'separator' => 'after'
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'nav_menu_dropdown_active_tab',
			[
				'label' => esc_html__('Active', 'vara-plugin'),
			]
		);

		$this->add_responsive_control(
			'nav_menu_dropdown_active_text_color',
			[
				'label' => esc_html__('Text Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} nav ul li.menu-item-has-children > ul.sub-menu li.current-menu-item > a' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} nav ul li.menu-item-has-children > ul.sub-menu li.current_page_ancestor > a' => 'color: {{VALUE}} !important',
				],
				'separator' => 'after'
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'nav_menu_dropdown_width',
			[
				'label' => esc_html__('Width', 'vara-plugin'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', 'rem'],
				'range' => [
					'px' => [
						'max' => 400
					]
				],
				'selectors' => [
					'{{WRAPPER}} nav ul li.menu-item-has-children > ul.sub-menu' => 'min-width: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'nav_menu_layout' => 'horizontal'
				]
			]
		);

		$this->add_responsive_control(
			'nav_menu_dropdown_spacing',
			[
				'label' => esc_html__('Spacing', 'vara-plugin'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'rem', 'em'],
				'selectors' => [
					'{{WRAPPER}} .menu-navigation-regular ul li.menu-item-has-children > ul.sub-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .menu-navigation-regular ul li.menu-item-has-children:not(.menu-mega-dropdown) > ul.sub-menu ul.sub-menu' => 'margin-top: -{{TOP}}{{UNIT}} !important; margin-left: calc({{RIGHT}}{{UNIT}} + 1px) !important;',
					'{{WRAPPER}} .menu-navigation-regular ul li.menu-item-has-children:not(.menu-mega-dropdown) > ul.sub-menu ul.sub-menu::before' => 'left: calc(-{{RIGHT}}{{UNIT}} - 1px) !important; width: calc({{RIGHT}}{{UNIT}} + 2px) !important;',
					'{{WRAPPER}} .menu-navigation-regular ul li.menu-item-has-children:not(.menu-mega-dropdown) > ul.sub-menu ul.sub-menu.submenu-left' => 'margin-right: calc({{RIGHT}}{{UNIT}} + 1px) !important; margin-left: 0 !important;',
					'{{WRAPPER}} .menu-navigation-regular ul li.menu-item-has-children:not(.menu-mega-dropdown) > ul.sub-menu ul.sub-menu.submenu-left::before' => 'right: calc(-{{LEFT}}{{UNIT}} - 1px) !important; width: calc({{LEFT}}{{UNIT}} + 2px) !important; left: auto !important;',
					'{{WRAPPER}} .menu-navigation-regular ul.menu-mega-dropdown-holder li.menu-item-has-children.menu-mega-dropdown > ul.sub-menu' => 'padding-top: {{TOP}}{{UNIT}} !important; padding-bottom: {{BOTTOM}}{{UNIT}} !important;',
					'{{WRAPPER}} .menu-navigation-regular ul.menu-mega-dropdown-holder li.menu-item-has-children.menu-mega-dropdown > ul.sub-menu > li' => 'padding-right: {{RIGHT}}{{UNIT}} !important; padding-left: {{LEFT}}{{UNIT}} !important;',
					'{{WRAPPER}} .menu-navigation-vertical ul li.menu-item-has-children > ul.sub-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .mobile-nav-menu ul li.menu-item-has-children > ul.sub-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'nav_menu_dropdown_vertical_padding',
			[
				'label' => esc_html__('Vertical Padding', 'vara-plugin'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', 'rem'],
				'selectors' => [
					'{{WRAPPER}} nav ul li.menu-item-has-children > ul.sub-menu li:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				]
			]
		);

		$this->add_responsive_control(
			'nav_menu_dropdown_offset',
			[
				'label' => esc_html__('Offset', 'vara-plugin'),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .menu-navigation-regular > ul > li.menu-item-has-children > ul.sub-menu' => 'margin-top: {{SIZE}}{{UNIT}} !important;',
					'{{WRAPPER}} .menu-navigation-regular > ul > li.menu-item-has-children > ul.sub-menu::before' => 'height: {{SIZE}}{{UNIT}} !important; top: -{{SIZE}}{{UNIT}} !important;',
					'{{WRAPPER}} .menu-navigation-vertical > ul > li.menu-item-has-children > ul.sub-menu' => 'margin-top: {{SIZE}}{{UNIT}}; margin-bottom: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .mobile-nav-menu ul li.menu-item-has-children > ul.sub-menu' => 'margin-top: {{SIZE}}{{UNIT}}; margin-bottom: {{SIZE}}{{UNIT}}',
				],
				'size_units' => ['px', 'rem']
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'nav_menu_dropdown_divider',
				'selector' => '{{WRAPPER}} nav ul li.menu-item-has-children:not(.menu-mega-dropdown) > ul.sub-menu li',
				'exclude' => ['width'],
			]
		);

		$this->add_responsive_control(
			'nav_menu_dropdown_divider_width',
			[
				'label' => esc_html__('Border Width', 'vara-plugin'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} nav ul li.menu-item-has-children:not(.menu-mega-dropdown) > ul.sub-menu li' => 'border-bottom-width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} nav ul li.menu-item-has-children:not(.menu-mega-dropdown) > ul.sub-menu li:last-child' => 'border-bottom-width: 0 !important',
				],
				'condition' => [
					'nav_menu_dropdown_divider_border!' => '',
				],
			]
		);

		$this->add_control(
			'nav_menu_carret_heading',
			[
				'label' => esc_html__('Carret', 'vara-plugin'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'nav_menu_carret_color',
			[
				'label' => esc_html__('Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} nav ul li.menu-item-has-children > ul.sub-menu li.menu-item-has-children::after' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .menu-navigation-vertical ul li.menu-item-has-children .submenu-icon svg' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .mobile-nav-menu ul li.menu-item-has-children .submenu-icon svg' => 'color: {{VALUE}} !important',
				]
			]
		);

		$this->add_responsive_control(
			'nav_menu_carret_size',
			[
				'label' => esc_html__('Size', 'vara-plugin'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} nav ul li.menu-item-has-children > ul.sub-menu li.menu-item-has-children::after' => 'font-size: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .menu-navigation-vertical ul li.menu-item-has-children .submenu-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .mobile-nav-menu ul li.menu-item-has-children .submenu-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
				]
			]
		);

		$this->add_control(
			'nav_menu_mega_menu_heading',
			[
				'label' => esc_html__('Mega Menu', 'vara-plugin'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'nav_menu_layout' => 'horizontal'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'nav_menu_mega_menu_typography',
				'label' => esc_html__('Title', 'vara-plugin'),
				'exclude' => ['line_height'],
				'selector' => '{{WRAPPER}} nav > ul.menu-mega-dropdown-holder > li.menu-mega-dropdown > .sub-menu > li.menu-item-has-children > a',
				'condition' => [
					'nav_menu_layout' => 'horizontal'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'nav_menu_mega_menu_divider',
				'selector' => '{{WRAPPER}} .menu-mega-dropdown-holder .menu-mega-dropdown > ul.sub-menu > .menu-item',
				'exclude' => ['width'],
				'condition' => [
					'nav_menu_layout' => 'horizontal'
				]
			]
		);

		$this->add_control(
			'nav_menu_mega_menu_divider_width',
			[
				'label' => esc_html__('Border Width', 'vara-plugin'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .menu-mega-dropdown-holder .menu-mega-dropdown > ul.sub-menu > .menu-item' => 'border-left-width: {{SIZE}}{{UNIT}} !important',
				],
				'condition' => [
					'nav_menu_mega_menu_divider_border!' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'nav_menu_mobile_style',
			[
				'label' => esc_html__('Mobile', 'vara-plugin'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'nav_menu_mobile_visibility' => 'yes'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'nav_menu_mobile_typography',
				'exclude' => ['line_height'],
				'selector' => '{{WRAPPER}} .mobile-nav-menu nav > ul > li > a',
				'condition' => [
					'nav_menu_mobile_visibility' => 'yes'
				]
			]
		);

		$this->add_control(
			'nav_menu_mobile_background_color',
			[
				'label' => esc_html__('Background Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mobile-nav-menu' => 'background-color: {{VALUE}} !important',
				],
				'condition' => [
					'nav_menu_mobile_visibility' => 'yes'
				]
			]
		);

		$this->add_control(
			'nav_menu_mobile_vertical_padding',
			[
				'label' => esc_html__('Vertical Padding', 'vara-plugin'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .mobile-nav-menu nav > ul > li' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .mobile-nav-menu nav > ul > li.menu-item-has-children > .submenu-icon' => 'margin-top: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'nav_menu_mobile_visibility' => 'yes'
				]
			]
		);

		$this->add_control(
			'nav_menu_mobile_offset',
			[
				'label' => esc_html__('Offset', 'vara-plugin'),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .mobile-nav-menu' => 'margin-top: {{SIZE}}{{UNIT}} !important;'
				],
				'size_units' => ['px', 'rem'],
				'condition' => [
					'nav_menu_mobile_visibility' => 'yes'
				],
			]
		);

		$this->add_control(
			'nav_menu_mobile_padding',
			[
				'label' => esc_html__('Padding', 'vara-plugin'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'rem', 'em'],
				'selectors' => [
					'{{WRAPPER}} .mobile-nav-menu nav ul.menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'after'
			]
		);

		$this->start_controls_tabs('nav_menu_mobile_tabs');

		$this->start_controls_tab(
			'nav_menu_mobile_normal_tab',
			[
				'label' => esc_html__('Normal', 'vara-plugin'),
				'condition' => [
					'nav_menu_mobile_visibility' => 'yes'
				]
			]
		);

		$this->add_control(
			'nav_menu_mobile_normal_text_color',
			[
				'label' => esc_html__('Text Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mobile-nav-menu nav > ul > li > a' => 'color: {{VALUE}} !important',
				],
				'separator' => 'after',
				'condition' => [
					'nav_menu_mobile_visibility' => 'yes'
				]
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'nav_menu_mobile_hover_tab',
			[
				'label' => esc_html__('Hover', 'vara-plugin'),
				'condition' => [
					'nav_menu_mobile_visibility' => 'yes'
				]
			]
		);

		$this->add_control(
			'nav_menu_mobile_hover_text_color',
			[
				'label' => esc_html__('Text Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mobile-nav-menu nav ul li:hover > a' => 'color: {{VALUE}} !important',
				],
				'separator' => 'after',
				'condition' => [
					'nav_menu_mobile_visibility' => 'yes'
				]
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'nav_menu_mobile_active_tab',
			[
				'label' => esc_html__('Active', 'vara-plugin'),
				'condition' => [
					'nav_menu_mobile_visibility' => 'yes'
				]
			]
		);

		$this->add_control(
			'nav_menu_mobile_active_text_color',
			[
				'label' => esc_html__('Text Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mobile-nav-menu nav ul li.menu-item.current_page_ancestor > a' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .mobile-nav-menu ul li.menu-item.current_page_item > a' => 'color: {{VALUE}} !important',
				],
				'separator' => 'after',
				'condition' => [
					'nav_menu_mobile_visibility' => 'yes'
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'nav_menu_mobile_toggle_heading',
			[
				'label' => esc_html__('Toggle Icon', 'vara-plugin'),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_responsive_control(
			'nav_menu_mobile_toggle_size',
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
					'{{WRAPPER}} .widget-mobile-nav-btn' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}} !important',
				]
			]
		);

		$this->add_control(
			'nav_menu_mobile_toggle_padding',
			[
				'label' => esc_html__('Padding', 'vara-plugin'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'rem', 'em'],
				'selectors' => [
					'{{WRAPPER}} .widget-mobile-nav-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs('nav_menu_mobile_toggle_normal');

		$this->start_controls_tab(
			'nav_menu_mobile_toggle_normal_tab',
			[
				'label' => esc_html__('Normal', 'vara-plugin'),
			]
		);

		$this->add_control(
			'nav_menu_mobile_toggle_normal_color',
			[
				'label' => esc_html__('Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget-mobile-nav-btn .burger-icon span' => 'background-color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'nav_menu_mobile_toggle_normal_bg_color',
			[
				'label' => esc_html__('Background Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget-mobile-nav-btn' => 'background-color: {{VALUE}} !important',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'nav_menu_mobile_toggle_hover_tab',
			[
				'label' => esc_html__('Hover', 'vara-plugin'),
			]
		);

		$this->add_control(
			'nav_menu_mobile_toggle_hover_color',
			[
				'label' => esc_html__('Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget-mobile-nav-btn:hover .burger-icon span' => 'background-color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'nav_menu_mobile_toggle_hover_bg_color',
			[
				'label' => esc_html__('Background Color', 'vara-plugin'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget-mobile-nav-btn:hover' => 'background-color: {{VALUE}} !important',
				],
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

		/**
		 * Layout
		 */
		$nav_menu_class = ['widget-navigation-menu-wrapper'];
		if ($settings['nav_menu_layout'] == 'vertical') {
			$nav_menu_class[] = 'menu-navigation-vertical';
			// add_filter('wp_nav_menu_objects', 'defaultNeuron_remove_mega_menu_class', 10, 3);
		} else {
			$nav_menu_class[] = 'menu-navigation-regular';
		}

		$args = [
			'menu' => $settings['nav_menu'],
			'container' => 'nav',
			'container_class' => implode(' ', $nav_menu_class),
			'container_id' => $this->get_ID(),
			'menu_class' => 'menu',
		];

		$responsive_args = [
			'menu' => $settings['nav_menu'],
			'container' => 'nav',
			'container_class' => 'mobile-navigation'
		];

		if ($settings['nav_menu']) {
			wp_nav_menu($args);
		}
		?>
		<div class="widget-mobile-nav-menu-wrapper">
			<div class="widget-mobile-nav-btn-holder d-flex justify-content-center">
				<a href="#" class="widget-mobile-nav-btn d-inline-flex">
                    <span class="burger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
				</a>
			</div>
			<div class="mobile-nav-menu">
				<?php
				if ($settings['nav_menu']) {
					wp_nav_menu($responsive_args);
				}
				?>
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
