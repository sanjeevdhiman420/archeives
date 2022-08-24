<?php
/**
 * Header Options
 */

// Create Panel and Sections
Kirki::add_panel('header_options', array(
	'title'       => esc_html__('Header', 'vara-plugin'),
	'priority'    => 2
));

Kirki::add_section('header_layout_section', array(
	'title'          => esc_html__('Layout', 'vara-plugin'),
	'priority'       => 1,
	'panel'			 => 'header_options'
));

Kirki::add_section('header_logo_section', array(
	'title'          => esc_html__('Logo', 'vara-plugin'),
	'priority'       => 2,
	'panel'			 => 'header_options'
));

Kirki::add_section('header_off_canvas_sidebar_section', array(
	'title'          => esc_html__('Off Canvas Sidebar', 'vara-plugin'),
	'priority'       => 3,
	'panel'			 => 'header_options'
));

Kirki::add_section('header_search_section', array(
	'title'          => esc_html__('Search', 'vara-plugin'),
	'priority'       => 4,
	'panel'			 => 'header_options'
));

Kirki::add_section('top_header_section', array(
	'title'          => esc_html__('Top Header', 'vara-plugin'),
	'priority'       => 5,
	'panel'			 => 'header_options'
));

if (class_exists('WooCommerce')) {
	Kirki::add_section('shopping_cart_section', array(
		'title'          => esc_html__('Shopping Cart', 'vara-plugin'),
		'priority'       => 6,
		'panel'			 => 'header_options'
	));
}

// Layout Settings
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'header_visibility',
	'label'       => esc_html__('Visibility', 'vara-plugin'),
	'description' => __('Show or hide the classic header in your website, default is show. <br /><small>Note: You\'ll still be able to place header templates.</small>', 'vara-plugin'),
	'section'     => 'header_layout_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'header_type',
	'label'       => esc_html__('Type', 'vara-plugin'),
	'description' => __('Select the header type. <br /> <small>Note: Make sure to create templates with Elementor as header type.</small>', 'vara-plugin'),
	'section'     => 'header_layout_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Default', 'vara-plugin'),
		'2' => esc_html__('Template', 'vara-plugin')
	),
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'header_template',
	'label'       => esc_html__('Template', 'vara-plugin'),
	'description' => esc_html__('Select the header template.', 'vara-plugin'),
	'section'     => 'header_layout_section',
	'choices'     => grada_get_elementor_template('header'),
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '==',
			'value'    => '2'
		),
	)
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'header_skin',
	'label'       => esc_html__('Skin', 'vara-plugin'),
	'description' => __('Select the header skin, the default is dark. <br /> <small>Note: Light skin means white logo text and white menu.</small>', 'vara-plugin'),
	'section'     => 'header_layout_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Dark', 'vara-plugin'),
		'2' => esc_html__('Light', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '!=',
			'value'    => '2'
		),
		array(
			'setting'  => 'header_visibility',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'header_position',
	'label'       => esc_html__('Position', 'vara-plugin'),
	'description' => __('Select the header position, the default is static. <br /> <small>Note: Absolute header will push the content to the top of page.</small>', 'vara-plugin'),
	'section'     => 'header_layout_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Static', 'vara-plugin'),
		'2' => esc_html__('Absolute', 'vara-plugin')
	),
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'header_transparency',
	'label'       => esc_html__('Transparency', 'vara-plugin'),
	'description' => __('Select the header transparency. <br /> <small>Note: Sticky will stay fixed in scroll.</small>', 'vara-plugin'),
	'section'     => 'header_layout_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Normal', 'vara-plugin'),
		'2' => esc_html__('Sticky', 'vara-plugin')
	),
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'header_sticky_template',
	'label'       => esc_html__('Sticky Template', 'vara-plugin'),
	'description' => esc_html__('Select the header template that will be used as sticky.', 'vara-plugin'),
	'section'     => 'header_layout_section',
	'choices'     => grada_get_elementor_template('header'),
	'active_callback' => array(
		array(
			'setting'  => 'header_transparency',
			'operator' => '==',
			'value'    => '2'
		),
		array(
			'setting'  => 'header_type',
			'operator' => '==',
			'value'    => '2'
		),
	)
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'header_autohide',
	'label'       => esc_html__('Autohide', 'vara-plugin'),
	'description' => __('Switch on if you want to activate the autohide header. The header will be hidden when scrolling down, it will appear only when user scrolls up. <br /> <small>Note: This option is valid only when Sticky is selected as transparency.</small>', 'vara-plugin'),
	'section'     => 'header_layout_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('On', 'vara-plugin'),
		'2' => esc_html__('Off', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_transparency',
			'operator' => '==',
			'value'    => '2'
		),
	)
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'header_container',
	'label'       => esc_html__('Container', 'vara-plugin'),
	'description' => __('Select if you want to use container holder for the header. <br /> <small>Note: By selecting off, the header will push into left and right.</small>', 'vara-plugin'),
	'section'     => 'header_layout_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('On', 'vara-plugin'),
		'2' => esc_html__('Off', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '!=',
			'value'    => '2'
		),
		array(
			'setting'  => 'header_visibility',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));

// Logo Settings
Kirki::add_field('grada_kirki', array(
	'type'        => 'image',
	'settings'    => 'header_dark_logo',
	'label'       => esc_html__('Dark', 'vara-plugin'),
	'description' => esc_html__('Upload your dark logo, will be used as dark logo in dark skin.', 'vara-plugin'),
	'section'     => 'header_logo_section',
	'choices'     => array(
		'save_as' => 'id',
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '!=',
			'value'    => '2'
		),
		array(
			'setting'  => 'header_visibility',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'image',
	'settings'    => 'header_light_logo',
	'label'       => esc_html__('Light', 'vara-plugin'),
	'description' => esc_html__('Upload your light logo, will be used as white logo in light skin.', 'vara-plugin'),
	'section'     => 'header_logo_section',
	'choices'     => array(
		'save_as' => 'id',
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '!=',
			'value'    => '2'
		),
		array(
			'setting'  => 'header_visibility',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'text',
	'settings'    => 'header_logo_width',
	'label'       => esc_html__('Width', 'vara-plugin'),
	'description' => __('Enter the number that will change the logo image width. <br /><small>Note: Enter only the number without {px}.</small>', 'vara-plugin'),
	'section'     => 'header_logo_section',
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '!=',
			'value'    => '2'
		),
		array(
			'setting'  => 'header_visibility',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'text',
	'settings'    => 'header_logo_height',
	'label'       => esc_html__('Height', 'vara-plugin'),
	'description' => __('Enter the number that will change the logo image height. <br /><small>Note: Enter only the number without {px}.', 'vara-plugin'),
	'section'     => 'header_logo_section',
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '!=',
			'value'    => '2'
		),
		array(
			'setting'  => 'header_visibility',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));

Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => 'header_logo_text',
	'label'    => esc_html__('Text', 'vara-plugin'),
	'description'  => esc_html__('Enter the text that will appear as logo, incase you don\'t upload any image as logo.', 'vara-plugin'),
	'section'  => 'header_logo_section',
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '!=',
			'value'    => '2'
		),
		array(
			'setting'  => 'header_visibility',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'text',
	'settings'    => 'header_logo_text_size',
	'label'       => esc_html__('Text Size', 'vara-plugin'),
	'description' => __('Enter the number to change the logo text font size. <br /><small>Note: Enter only the number without {px}.</small.', 'vara-plugin'),
	'section'     => 'header_logo_section',
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '!=',
			'value'    => '2'
		),
		array(
			'setting'  => 'header_visibility',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));

// Off Canvas Sidebar
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'off_canvas_sidebar_visibility',
	'label'       => esc_html__('Visibility', 'vara-plugin'),
	'description' => esc_html__('Select the visibility of the off canvas sidebar.', 'vara-plugin'),
	'section'     => 'header_off_canvas_sidebar_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '!=',
			'value'    => '2'
		),
		array(
			'setting'  => 'header_visibility',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'off_canvas_sidebar_skin',
	'label'       => esc_html__('Skin Off Canvas Sidebar', 'vara-plugin'),
	'description' => esc_html__('Select the skin of the off canvas sidebar.', 'vara-plugin'),
	'section'     => 'header_off_canvas_sidebar_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Dark', 'vara-plugin'),
		'2' => esc_html__('Light', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '!=',
			'value'    => '2'
		),
		array(
			'setting'  => 'header_visibility',
			'operator' => '!=',
			'value'    => '2'
		),
		array(
			'setting'  => 'off_canvas_sidebar_visibility',
			'operator' => '!=',
			'value'    => '2'
		)
	)
));



// Search
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'header_search_visibility',
	'label'       => esc_html__('Visibility', 'vara-plugin'),
	'description' => esc_html__('Select the visibility of the search.', 'vara-plugin'),
	'section'     => 'header_search_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_type',
			'operator' => '!=',
			'value'    => '2'
		),
		array(
			'setting'  => 'header_visibility',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'header_search_mobile',
	'label'       => esc_html__('Mobile', 'vara-plugin'),
	'description' => esc_html__('Select the visibility of the search in mobile screens(991px and smaller).', 'vara-plugin'),
	'section'     => 'header_search_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_search_visibility',
			'operator' => '==',
			'value'    => '1'
		),
		array(
			'setting'  => 'header_type',
			'operator' => '!=',
			'value'    => '2'
		),
		array(
			'setting'  => 'header_visibility',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));

// Shopping Cart
if (class_exists('WooCommerce')) {
	Kirki::add_field('grada_kirki', array(
		'type'        => 'select',
		'settings'    => 'shopping_cart_visibility',
		'label'       => esc_html__('Visibility', 'vara-plugin'),
		'description' => esc_html__('Select the visibility of the shopping cart.', 'vara-plugin'),
		'section'     => 'shopping_cart_section',
		'default'     => '1',
		'choices'     => array(
			'1' => esc_html__('Show', 'vara-plugin'),
			'2' => esc_html__('Hide', 'vara-plugin')
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_type',
				'operator' => '!=',
				'value'    => '2'
			),
			array(
				'setting'  => 'header_visibility',
				'operator' => '!=',
				'value'    => '2'
			),
		)
	));
	Kirki::add_field('grada_kirki', array(
		'type'        => 'select',
		'settings'    => 'shopping_cart_mobile',
		'label'       => esc_html__('Mobile', 'vara-plugin'),
		'description' => esc_html__('Select the visibility of the shopping cart in mobile screens(991px and smaller).', 'vara-plugin'),
		'section'     => 'shopping_cart_section',
		'default'     => '2',
		'choices'     => array(
			'1' => esc_html__('Show', 'vara-plugin'),
			'2' => esc_html__('Hide', 'vara-plugin')
		),
		'active_callback' => array(
			array(
				'setting'  => 'shopping_cart_visibility',
				'operator' => '==',
				'value'    => '1'
			),
			array(
				'setting'  => 'header_type',
				'operator' => '!=',
				'value'    => '2'
			),
			array(
				'setting'  => 'header_visibility',
				'operator' => '!=',
				'value'    => '2'
			),
		)
	));
}