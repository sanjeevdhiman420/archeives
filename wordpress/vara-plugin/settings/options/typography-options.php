<?php
/**
 * Typography Options
 */

// Create Panel and Sections
Kirki::add_panel('typography_options', array(
	'title'       => esc_html__('Typography', 'vara-plugin'),
	'priority'    => 9
));
Kirki::add_section('typography_general', array(
	'title'          => esc_html__('General', 'vara-plugin'),
	'panel'			=> 'typography_options'
));
Kirki::add_section('typography_menu', array(
	'title'          => esc_html__('Menu', 'vara-plugin'),
	'panel'			=> 'typography_options'
));
Kirki::add_section('typography_headings', array(
	'title'          => esc_html__('Headings', 'vara-plugin'),
	'panel'			=> 'typography_options'
));
Kirki::add_section('typography_paragraphs', array(
	'title'          => esc_html__('Paragraphs', 'vara-plugin'),
	'panel'			=> 'typography_options'
));
Kirki::add_section('typography_portfolio_item', array(
	'title'          => esc_html__('Portfolio Item', 'vara-plugin'),
	'panel'			=> 'typography_options'
));
Kirki::add_section('typography_blog_single', array(
	'title'          => esc_html__('Blog Post', 'vara-plugin'),
	'panel'			=> 'typography_options'
));
Kirki::add_section('typography_product', array(
	'title'          => esc_html__('Product', 'vara-plugin'),
	'panel'			=> 'typography_options'
));
Kirki::add_section('typography_widgets', array(
	'title'          => esc_html__('Widgets', 'vara-plugin'),
	'panel'			=> 'typography_options'
));
Kirki::add_section('typography_breadcrumbs', array(
	'title'          => esc_html__('Breadcrumbs', 'vara-plugin'),
	'panel'			=> 'typography_options'
));
Kirki::add_section('typography_hero', array(
	'title'          => esc_html__('Hero', 'vara-plugin'),
	'panel'			=> 'typography_options'
));
Kirki::add_section('typography_error_404', array(
	'title'          => esc_html__('Error 404', 'vara-plugin'),
	'panel'			=> 'typography_options'
));
Kirki::add_section('typography_forms', array(
	'title'          => esc_html__('Forms', 'vara-plugin'),
	'panel'			=> 'typography_options'
));
Kirki::add_section('typography_custom_fonts', array(
	'title'          => esc_html__('Custom Fonts', 'vara-plugin'),
	'panel'			=> 'typography_options'
));

/**
 * Font Family
 */
$grada_family_selectors = [
	'primary' => 'h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6, b, strong, .gs-page-heading-outer .gs-page-heading-inner .gs-page-heading-title, input[type=submit], button, .button, .breadcrumb-list .breadcrumb-list-item, .gs-comments .gs-comments-list .gs-comment .gs-comment-body .gs-comment-author .comment-reply-link, .dropdown-shopping-cart .dropdown-cart-list .dropdown-cart-list-item .dropdown-cart-item-info .title, .dropdown-cart-bottom .dropdown-cart-subtotal .price .amount, .tagcloud a, .woocommerce .single-product .gs-product-summary .product_meta > span, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .gs-product-badge, .gs-page-404 .gs-page-heading-outer .gs-page-heading-inner .gs-page-heading-title h1',
	'secondary' => 'body, input, textarea, select, code',
	'menu' => 'ul.menu.site-header-menu li.menu-item a'
];

/**
 * Default
 */
$grada_attributes_selectors = [
	'menu' => 'ul.menu.site-header-menu li.menu-item > a',
	'sub-menu' => 'ul.menu.site-header-menu li.menu-item.menu-item-has-children > ul.sub-menu li.menu-item a',
	'mobile-menu' => '.gs-site-header.gs-mobile-header-default .mobile-navigation nav ul.menu li.menu-item a',
	'h1' => 'h1, .h1, .gs-page-heading-outer .gs-page-heading-inner .gs-page-heading-title',
	'h2' => 'h2, .h2, .gs-fullscreen-search .gs-fullscreen-search-inner .search-wrapper-inner .search-wrapper-form input[type=search], .woocommerce .single-product .gs-product-summary .price',
	'h3' => 'h3, .h3, .gs-logo.gs-logo--text a, .woocommerce-account .woocommerce #customer_login h2',
	'h4' => 'h4, .h4, .woocommerce .wc-bacs-bank-details-account-name, .woocommerce .single-product .woocommerce-tabs .woocommerce-Tabs-panel h2',
	'h5' => 'h5, .h5, .woocommerce .wc-bacs-bank-details-heading, .woocommerce .single-product .gs-product-summary table.group_table tr td.woocommerce-grouped-product-list-item__price .amount, .woocommerce .single-product .woocommerce-tabs .woocommerce-Tabs-panel .woocommerce-Reviews #comments .commentlist .comment .comment_container .comment-text .meta .woocommerce-review__author, .woocommerce .cart-collaterals .cart_totals h2, .woocommerce-checkout .woocommerce-billing-fields h2, .woocommerce-checkout .woocommerce-shipping-fields .ship-to-different-address, .woocommerce-checkout #order_review_heading, .woocommerce-account .addresses .title h3, .woocommerce .woocommerce-order-details .woocommerce-order-details__title, .woocommerce .woocommerce-customer-details .woocommerce-columns .woocommerce-column__title, .woocommerce .woocommerce-order-downloads .woocommerce-order-downloads__title, .woocommerce table tfoot tr:last-child th, .woocommerce table tfoot tr:last-child td',
	'h6' => 'h6, .h6, legend, .woocommerce .single-product .gs-product-summary .product_meta > span, .woocommerce .single-product .woocommerce-tabs .woocommerce-Tabs-panel.woocommerce-Tabs-panel--additional_information table tr th, .woocommerce ul.order_details li, .woocommerce ul.order_details li strong, .gs-product-badge, .dropdown-cart .dropdown-shopping-cart .dropdown-cart-list .dropdown-cart-list-item .dropdown-cart-item-info .title, .gs-comments .gs-comments-list .gs-comment .gs-comment-body .gs-comment-author .comment-reply-link',
	'paragraphs' => 'body, .wp-caption p.wp-caption-text, .select2 .selection .select2-selection .select2-selection__rendered, table td, table th, .woocommerce .single-product .gs-product-summary .product_meta > span a, .gs-site-footer .subfooter-area .subfooter-area-inner .subfooter-coypright-text > *, .gs-woo-page .product-holder .entry-details .product-description, .gs-site-footer .footer-widgetized-area .footer-widgets-inner .widget, .widget ul li',
	'widgets-title' => '.widget .widget-title-outer .widgettitle',
	'breadcrumbs-title' => '.gs-breadcrumb .gs-breadcrumb-wrapper .gs-breadcrumb-title',
	'breadcrumbs-navigation' => '.breadcrumb-list .breadcrumb-list-item',
	'forms-label' => 'label',
	'forms-input' => 'input, textarea, select, input[type=submit]',
	'forms-button' => '.gs-btn-regular, button, .gs-add-to-cart-btn, .button, .woocommerce .button, .woocommerce .sidebar-container input[type=submit], .woocommerce .sidebar-container button, .woocommerce .sidebar-container .button, .woocommerce a.button, .dropdown-cart-bottom .dropdown-cart-btn .button',
];


/**
 * Font Family
 */
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_primary',
	'label'       => esc_html__('Primary', 'vara-plugin'),
	'description' => esc_html__('Change the primary font family in theme.', 'vara-plugin'),
	'section'     => 'typography_general',
	'default'     => array(
		'font-family'    => '',
	),
	'output' => array(
		array('element' => $grada_family_selectors['primary'])
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_secondary',
	'label'       => esc_html__('Secondary', 'vara-plugin'),
	'description' => esc_html__('Change the secondary font family in theme.', 'vara-plugin'),
	'section'     => 'typography_general',
	'default'     => array(
		'font-family'    => '',
	),
	'output' => array(
		array('element' => $grada_family_selectors['secondary'])
	)
));

/**
 * Menu
 */
Kirki::add_field('grada_kirki', [
	'type'        => 'custom',
	'settings'    => 'typography_menu_message',
	'label'       => __('<small style="font-size: 10px; font-style: italic; font-weight: normal;">Do not forget to enter the unit too, for example px, rem or em.</small>', 'vara-plugin'),
	'section'     => 'typography_menu',
]);
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_menu',
	'label'       => esc_html__('Menu Font', 'vara-plugin'),
	'description' => esc_html__('Change the font family of the main menu.', 'vara-plugin'),
	'section'     => 'typography_menu',
	'default'     => array(
		'font-family'    => '',
	),
	'output' => array(
		array('element' => $grada_family_selectors['menu'])
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_menu_font_properties',
	'label'       => esc_html__('Menu Font Properties', 'vara-plugin'),
	'section'     => 'typography_menu',
	'default'     => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => $grada_attributes_selectors['menu'],
		),
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_submenu_font_properties',
	'label'       => esc_html__('Submenu Font Properties', 'vara-plugin'),
	'section'     => 'typography_menu',
	'default'     => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => $grada_attributes_selectors['sub-menu'],
		),
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_mobile_menu_font_properties',
	'label'       => esc_html__('Mobile Menu Font Properties', 'vara-plugin'),
	'section'     => 'typography_menu',
	'default'     => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => $grada_attributes_selectors['mobile-menu'],
		),
	),
));

/**
 * Headings
 */
Kirki::add_field('grada_kirki', [
	'type'        => 'custom',
	'settings'    => 'typography_headings_message',
	'label'       => __('<small style="font-size: 10px; font-style: italic; font-weight: normal;">Do not forget to enter the unit too, for example px, rem or em.</small>', 'vara-plugin'),
	'section'     => 'typography_headings',
]);
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_heading_one',
	'label'       => esc_html__('Heading 1', 'vara-plugin'),
	'section'     => 'typography_headings',
	'default'     => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => $grada_attributes_selectors['h1'],
		),
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_heading_two',
	'label'       => esc_html__('Heading 2', 'vara-plugin'),
	'section'     => 'typography_headings',
	'default'     => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => $grada_attributes_selectors['h2'],
		),
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_heading_three',
	'label'       => esc_html__('Heading 3', 'vara-plugin'),
	'section'     => 'typography_headings',
	'default'     => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => $grada_attributes_selectors['h3'],
		),
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_heading_four',
	'label'       => esc_html__('Heading 4', 'vara-plugin'),
	'section'     => 'typography_headings',
	'default'     => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => $grada_attributes_selectors['h4'],
		),
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_heading_five',
	'label'       => esc_html__('Heading 5', 'vara-plugin'),
	'section'     => 'typography_headings',
	'default'     => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => $grada_attributes_selectors['h5'],
		),
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_heading_six',
	'label'       => esc_html__('Heading 6', 'vara-plugin'),
	'section'     => 'typography_headings',
	'default'     => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => $grada_attributes_selectors['h6'],
		),
	),
));

/**
 * Paragraphs
 */
Kirki::add_field('grada_kirki', [
	'type'        => 'custom',
	'settings'    => 'typography_paragraphs_message',
	'label'       => __('<small style="font-size: 10px; font-style: italic; font-weight: normal;">Do not forget to enter the unit too, for example px, rem or em.</small>', 'vara-plugin'),
	'section'     => 'typography_paragraphs',
]);
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_paragraphs',
	'label'       => esc_html__('Paragraphs', 'vara-plugin'),
	'section'     => 'typography_paragraphs',
	'default'     => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => $grada_attributes_selectors['paragraphs'],
		),
	),
));

/**
 * Widgets
 */
Kirki::add_field('grada_kirki', [
	'type'        => 'custom',
	'settings'    => 'typography_widgets_message',
	'label'       => __('<small style="font-size: 10px; font-style: italic; font-weight: normal;">Do not forget to enter the unit too, for example px, rem or em.</small>', 'vara-plugin'),
	'section'     => 'typography_widgets',
]);
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_widgets_title',
	'label'       => esc_html__('Title', 'vara-plugin'),
	'section'     => 'typography_widgets',
	'default'     => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => $grada_attributes_selectors['widgets-title'],
		),
	),
));

/**
 * Breadcrumbs
 */
Kirki::add_field('grada_kirki', [
	'type'        => 'custom',
	'settings'    => 'typography_breadcrumbs_message',
	'label'       => __('<small style="font-size: 10px; font-style: italic; font-weight: normal;">Do not forget to enter the unit too, for example px, rem or em.</small>', 'vara-plugin'),
	'section'     => 'typography_breadcrumbs',
]);
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_breadcrumbs_title',
	'label'       => esc_html__('Title', 'vara-plugin'),
	'section'     => 'typography_breadcrumbs',
	'default'     => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => $grada_attributes_selectors['breadcrumbs-title'],
		),
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_breadcrumbs_navigation',
	'label'       => esc_html__('Navigation', 'vara-plugin'),
	'section'     => 'typography_breadcrumbs',
	'default'     => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => $grada_attributes_selectors['breadcrumbs-navigation'],
		),
	),
));

/**
 * Forms
 */
Kirki::add_field('grada_kirki', [
	'type'        => 'custom',
	'settings'    => 'typography_forms_message',
	'label'       => __('<small style="font-size: 10px; font-style: italic; font-weight: normal;">Do not forget to enter the unit too, for example px, rem or em.</small>', 'vara-plugin'),
	'section'     => 'typography_forms',
]);
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_forms_label',
	'label'       => esc_html__('Label', 'vara-plugin'),
	'section'     => 'typography_forms',
	'default'     => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => $grada_attributes_selectors['forms-label'],
		),
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_forms_input',
	'label'       => esc_html__('Input', 'vara-plugin'),
	'section'     => 'typography_forms',
	'default'     => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => $grada_attributes_selectors['forms-input'],
		),
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'typography',
	'settings'    => 'typography_forms_button',
	'label'       => esc_html__('Button', 'vara-plugin'),
	'section'     => 'typography_forms',
	'default'     => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => $grada_attributes_selectors['forms-button'],
			'suffix' => '!important'
		),
	),
));

/**
 * Custom Fonts
 */
Kirki::add_field('grada_kirki', array(
	'type'        => 'repeater',
	'settings'    => 'custom_fonts',
	'label'       => esc_html__('Custom Fonts', 'vara-plugin'),
	'description' => esc_html__('Add Custom Fonts to theme which will appear to the general typography and in the Elementor typography control.', 'vara-plugin'),
	'section'     => 'typography_custom_fonts',
	'row_label' => array(
		'type' => 'text',
		'value' => esc_html__('Custom Font', 'vara-plugin')
	),
	'button_label' => esc_html__('Add new font', 'vara-plugin'),
	'fields' => array(
		'font_name' => array(
			'type'        => 'text',
			'label'       => esc_html__('Name', 'vara-plugin')
		),
		'font_ttf' => array(
			'type'        => 'text',
			'label'       => esc_html__('Font .ttf', 'vara-plugin'),
		),
		'font_woff' => array(
			'type'        => 'text',
			'label'       => esc_html__('Font .woff', 'vara-plugin'),
		),
	)
));
