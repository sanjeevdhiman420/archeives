<?php
/**
 * General Options
 */

// Create Section for General Options
Kirki::add_section( 'general_section', array(
	'title'          => esc_html__('General', 'vara-plugin'),
	'priority'       => 1
));

// General Settings
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'custom_fields_panel',
	'label'       => esc_html__('Custom Fields Panel', 'vara-plugin'),
	'description' => esc_html__('Enable or disable the custom fields panel(ACF Panel), default is disabled.', 'vara-plugin'),
	'section'     => 'general_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_attr__('Enable', 'vara-plugin'),
		'2' => esc_attr__('Disable', 'vara-plugin')
	),
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'comments_closed',
	'label'       => esc_html__('Comments Notice', 'vara-plugin'),
	'description' => esc_html__('Show or hide the notice \'Comments are Closed!\'.', 'vara-plugin'),
	'section'     => 'general_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_attr__('Show', 'vara-plugin'),
		'2' => esc_attr__('Hide', 'vara-plugin')
	),
));

Kirki::add_field('grada_kirki', array(
	'type'          => 'select',
	'settings'      => 'vertical_lines',
	'label'         => esc_html__( 'Vertical Lines', 'vara-plugin' ),
	'description'   => esc_html__( 'Show or hide decorative vertical lines', 'vara-plugin' ),
	'section'       => 'general_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_attr__('Show', 'vara-plugin'),
		'2' => esc_attr__('Hide', 'vara-plugin')
	)
));

Kirki::add_field('grada_kirki', array(
	'type'          => 'select',
	'settings'      => 'vertical_lines_color',
	'label'         => esc_html__( 'Vertical Lines', 'vara-plugin' ),
	'description'   => esc_html__( 'Show or hide decorative vertical lines', 'vara-plugin' ),
	'section'       => 'general_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_attr__('Light', 'vara-plugin'),
		'2' => esc_attr__('Dark', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'vertical_lines',
			'operator' => '==',
			'value'    => '1'
		),
	)
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'body_offset',
	'label'       => esc_html__('Body Offset', 'vara-plugin'),
	'description' => __('Create a left or right spacing to the content, best use case when creating a lateral header to eleminate the FOUC effect.', 'vara-plugin'),
	'section'     => 'general_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_attr__('On', 'vara-plugin'),
		'2' => esc_attr__('Off', 'vara-plugin')
	),
));

Kirki::add_field('grada_kirki', [
	'type'        => 'dimensions',
	'settings'    => 'body_offset_padding',
	'label'       => esc_html__('Offset Values', 'vara-plugin'),
	'description' => __('Enter the values of the offset, if you\'re using the menu on the left, add padding on the left side and so on. <br /><small>Note: Do not forget to enter the unit too.</small>', 'vara-plugin'),
	'section'     => 'general_section',
	'default'     => [
		'padding-left'  => '',
		'padding-right' => '',
	],
	'choices'     => [
		'labels' => [
			'padding-left'  => esc_html__('Left', 'vara-plugin'),
			'padding-right'  => esc_html__('Right', 'vara-plugin'),
		],
	],
	'active_callback' => array(
		array(
			'setting'  => 'body_offset',
			'operator' => '==',
			'value'    => '1'
		),
	)
]);

Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'body_offset_breakpoint',
	'label'       => esc_html__('Offset Breakpoint', 'vara-plugin'),
	'description' => __('Select from which device you want to remove the offset.', 'vara-plugin'),
	'section'     => 'general_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_attr__('Tablet', 'vara-plugin'),
		'2' => esc_attr__('Mobile', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'body_offset',
			'operator' => '==',
			'value'    => '1'
		),
	)
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'theme_borders',
	'label'       => esc_html__('Theme Borders', 'vara-plugin'),
	'description' => esc_html__('Add borders all around the theme, you\'ll be able to specify the thickness and the color in the fields below.', 'vara-plugin'),
	'section'     => 'general_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_attr__('On', 'vara-plugin'),
		'2' => esc_attr__('Off', 'vara-plugin')
	),
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'slider',
	'settings'    => 'theme_borders_thickness',
	'label'       => esc_html__('Border Thickness', 'vara-plugin'),
	'section'     => 'general_section',
	'default'     => 16,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'active_callback' => array(
		array(
			'setting'  => 'theme_borders',
			'operator' => '==',
			'value'    => '1'
		),
	)
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'color',
	'settings'    => 'theme_borders_color',
	'label'       => esc_html__('Border Color', 'vara-plugin'),
	'section'     => 'general_section',
	'default'     => '#FFFFFF',
	'active_callback' => array(
		array(
			'setting'  => 'theme_borders',
			'operator' => '==',
			'value'    => '1'
		),
	)
) );

Kirki::add_field('grada_kirki', array(
	'type'        => 'repeater',
	'settings'    => 'general_sidebars',
	'label'       => esc_attr__('Custom Sidebar', 'vara-plugin'),
	'description' => esc_html__('Create new sidebars and use them later via the page builder for different areas.', 'vara-plugin'),
	'section'     => 'general_section',
	'row_label' => array(
		'type' => 'text',
		'value' => esc_html__('Custom Sidebar', 'vara-plugin'),
	),
	'button_label' => esc_html__('Add new sidebar area', 'vara-plugin'),
	'default'      => '',
	'fields' => array(
		'sidebar_title' => array(
			'type'        => 'text',
			'label'       => esc_html__('Sidebar Title', 'vara-plugin'),
			'default'     => '',
		),
		'sidebar_description' => array(
			'type'        => 'text',
			'label'       => esc_html__('Sidebar Description', 'vara-plugin'),
			'default'     => '',
		),
	)
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'repeater',
	'settings'    => 'general_image_sizes',
	'label'       => esc_attr__('Image Size', 'vara-plugin'),
	'description' => __('Create new image sizes, if you leave height blank it will be set to auto. <br /> <small>Note: Enter only the number without unit, it\'s represented in pixels.</small>', 'vara-plugin'),
	'section'     => 'general_section',
	'row_label' => array(
		'type' => 'text',
		'value' => esc_attr__('Image Size', 'vara-plugin'),
	),
	'button_label' => esc_attr__('Add new image size', 'vara-plugin'),
	'default'      => array(
		array(
			'image_size_width' => '560',
			'image_size_height' => '400'
		)
	),
	'fields' => array(
		'image_size_width' => array(
			'type'        => 'text',
			'label'       => esc_attr__('Width', 'vara-plugin'),
		),
		'image_size_height' => array(
			'type'        => 'text',
			'label'       => esc_attr__('Height', 'vara-plugin'),
		),
	)
));