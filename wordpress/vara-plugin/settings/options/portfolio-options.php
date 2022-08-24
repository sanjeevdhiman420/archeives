<?php
/**
 * Portfolio Options
 */

// Create Panel and Sections
Kirki::add_panel('portfolio_options', array(
	'title'       => esc_attr__('Portfolio', 'vara-plugin'),
	'priority'    => 4
));
Kirki::add_section('portfolio_functionality_options', array(
	'title'       => esc_attr__('Functionality', 'vara-plugin'),
	'panel'		  => 'portfolio_options',
	'priority'    => 1
));
Kirki::add_section('portfolio_item_options', array(
	'title'       => esc_attr__('Portfolio Item', 'vara-plugin'),
	'panel'		  => 'portfolio_options',
	'priority'    => 2
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'text',
	'settings'    => 'portfolio_prefix',
	'label'       => esc_html__('Prefix', 'vara-plugin'),
	'description' => __('Change the portfolio prefix before the post, e.g. <br /> https://gradastudio.com/<b>portfolio</b>/portfolio-1#.<br /> <small>Note: The default prefix is portfolio. Do not forget to click save changes on the the permalinks after.</small>', 'vara-plugin'),
	'section'     => 'portfolio_functionality_options'
));

/**
 * Portfolio Item Settings
 */
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'portfolio_item_share',
	'label'       => esc_html__('Share', 'vara-plugin'),
	'description' => __('Select the visibility of share icons. <br /><small>Note: Make sure to install and activate the GradaStudio Share plugin.</small>', 'vara-plugin'),
	'section'     => 'portfolio_item_options',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_attr__('Show', 'vara-plugin'),
		'2' => esc_attr__('Hide', 'vara-plugin')
	),
));


// Navigation
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'portfolio_item_navigation_message',
	'section'     => 'portfolio_item_options',
	'default'     => '<h1>' . esc_html__('Navigation', 'vara-plugin') . '</h1><hr>'
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'portfolio_item_navigation_visibility',
	'label'       => esc_html__('Visibility', 'vara-plugin'),
	'description' => __('Show or hide the navigation on portfolio item.', 'vara-plugin'),
	'section'     => 'portfolio_item_options',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_attr__('Show', 'vara-plugin'),
		'2' => esc_attr__('Hide', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'portfolio_item_navigation_category',
	'label'       => esc_html__('Category', 'vara-plugin'),
	'description' => __('Enable if you want the posts to be navigated only in the same category.', 'vara-plugin'),
	'section'     => 'portfolio_item_options',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_attr__('Enable', 'vara-plugin'),
		'2' => esc_attr__('Disable', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'portfolio_item_navigation_back_url',
	'label'       => esc_html__('Back URL', 'vara-plugin'),
	'description' => __('Add an url which will be displayed on the center and will send you to portfolio.', 'vara-plugin'),
	'section'     => 'portfolio_item_options',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_attr__('Show', 'vara-plugin'),
		'2' => esc_attr__('Hide', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'text',
	'settings'    => 'portfolio_item_navigation_back_url_link',
	'label'       => esc_html__('Link', 'vara-plugin'),
	'description' => __('Change the link of the text.', 'vara-plugin'),
	'section'     => 'portfolio_item_options',
	'active_callback' => array(
		array(
			'setting'  => 'portfolio_item_navigation_back_url',
			'operator' => '==',
			'value'    => '1'
		),
	)
));

// Gallery
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'portfolio_item_gallery_message',
	'section'     => 'portfolio_item_options',
	'default'     => '<h1>' . esc_html__('Gallery', 'vara-plugin') . '</h1><hr>'
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'portfolio_item_gallery_columns',
	'label'       => esc_html__('Columns', 'vara-plugin'),
	'description' => __('Select the columns of gallery.', 'vara-plugin'),
	'section'     => 'portfolio_item_options',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_attr__('1 Column', 'vara-plugin'),
		'2' => esc_attr__('2 Columns', 'vara-plugin'),
		'3' => esc_attr__('3 Columns', 'vara-plugin'),
		'4' => esc_attr__('4 Columns', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'portfolio_item_gallery_animation',
	'label'       => esc_html__('Animation', 'vara-plugin'),
	'description' => __('Select initial loading animation for gallery.', 'vara-plugin'),
	'section'     => 'portfolio_item_options',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_attr__('None', 'vara-plugin'),
		'2' => esc_attr__('Fade In', 'vara-plugin'),
		'3' => esc_attr__('Fade In Up', 'vara-plugin'),
		'4' => esc_attr__('Fade In (with delay)', 'vara-plugin'),
		'5' => esc_attr__('Fade In Up (with delay)', 'vara-plugin')
	),
));