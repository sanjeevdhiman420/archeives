<?php
/**
 * Footer Options
 */

// Create Panel and Sections
Kirki::add_panel('footer_options', array(
	'title'       => esc_html__('Footer', 'vara-plugin'),
	'priority'    => 3
));
Kirki::add_section('footer_general_section', array(
	'title'          => esc_html__('General', 'vara-plugin'),
	'priority'       => 1,
	'panel'			=> 'footer_options'
));
Kirki::add_section('footer_copyright_section', array(
	'title'          => esc_html__('Copyright', 'vara-plugin'),
	'priority'       => 2,
	'panel'			=> 'footer_options'
));
Kirki::add_section('footer_widgets_section', array(
	'title'          => esc_html__('Widgets', 'vara-plugin'),
	'priority'       => 3,
	'panel'			=> 'footer_options'
));
Kirki::add_section('footer_social_media_section', array(
	'title'          => esc_html__('Social Media', 'vara-plugin'),
	'priority'       => 4,
	'panel'			=> 'footer_options'
));

// General Settings
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'footer_type',
	'label'       => esc_html__('Type', 'vara-plugin'),
	'description' => esc_html__('Select the footer type. <br /> <small>Note: Make sure to create templates with Elementor as footer type.</small>', 'vara-plugin'),
	'section'     => 'footer_general_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Default', 'vara-plugin'),
		'2' => esc_html__('Template', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'footer_template',
	'label'       => esc_html__('Template', 'vara-plugin'),
	'description' => esc_html__('Select the footer template.', 'vara-plugin'),
	'section'     => 'footer_general_section',
	'choices'     => grada_get_elementor_template('footer'),
	'active_callback' => array(
		array(
			'setting'  => 'footer_type',
			'operator' => '==',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'footer_skin',
	'label'       => esc_html__('Skin', 'vara-plugin'),
	'description' => esc_html__('Select the footer skin, the default is dark.', 'vara-plugin'),
	'section'     => 'footer_general_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Dark', 'vara-plugin'),
		'2' => esc_html__('Light', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'footer_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'footer_container',
	'label'       => esc_html__('Container', 'vara-plugin'),
	'description' => __('Select if you want to use container holder for the footer. <br /> <small>Note: By selecting off, the footer will push into left and right.</small>', 'vara-plugin'),
	'section'     => 'footer_general_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('On', 'vara-plugin'),
		'2' => esc_html__('Off', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'footer_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'footer_parallax',
	'label'       => esc_html__('Parallax', 'vara-plugin'),
	'description' => esc_html__('Enable a parallax effect for your footer. The footer will come smoothly in the position fixed when scrolling at the bottom.', 'vara-plugin'),
	'section'     => 'footer_general_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('On', 'vara-plugin'),
		'2' => esc_html__('Off', 'vara-plugin')
	),
));

// Copyright Settings
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'footer_copyright_visibility',
	'label'       => esc_html__('Visibility', 'vara-plugin'),
	'description' => esc_html__('Show or hide the copyright, by hiding the copyright the social media will be hidden too.', 'vara-plugin'),
	'section'     => 'footer_copyright_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'footer_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'textarea',
	'settings'    => 'footer_copyright',
	'label'       => esc_html__('Copyright', 'vara-plugin'),
	'description' => esc_html__('Enter the text that will appear in footer as copyright. <small>Note: It accepts HTML tags.</small>', 'vara-plugin'),
	'section'     => 'footer_copyright_section',
	'active_callback' => array(
		array(
			'setting'  => 'footer_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'footer_copyright_automated',
	'label'       => esc_html__('Automated', 'vara-plugin'),
	'description' => esc_html__('Enable the automated copyright, it will work only if you don\'t add copyright in the field above.', 'vara-plugin'),
	'section'     => 'footer_copyright_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('On', 'vara-plugin'),
		'2' => esc_html__('Off', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'footer_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'footer_copyright_alignment',
	'label'       => esc_html__('Alignment', 'vara-plugin'),
	'description' => esc_html__('Select the alignment of copyright, if selected left the social media will be placed on the right and so on.', 'vara-plugin'),
	'section'     => 'footer_copyright_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Left', 'vara-plugin'),
		'2' => esc_html__('Right', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'footer_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));

// Widgets Settings
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'footer_widgets',
	'label'       => esc_html__('Visibility', 'vara-plugin'),
	'description' => esc_html__('Show or hide the widgets on footer.', 'vara-plugin'),
	'section'     => 'footer_widgets_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'footer_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'footer_widgets_columns',
	'label'       => esc_html__('Columns', 'vara-plugin'),
	'description' => esc_html__('Select the columns of widgets, default is 4 columns.', 'vara-plugin'),
	'section'     => 'footer_widgets_section',
	'default'     => '4',
	'choices'     => array(
		'1' => esc_html__('One Column', 'vara-plugin'),
		'2' => esc_html__('Two Columns', 'vara-plugin'),
		'3' => esc_html__('Three Columns', 'vara-plugin'),
		'4' => esc_html__('Four Columns', 'vara-plugin'),
		'5' => esc_html__('Five Columns', 'vara-plugin'),
		'6' => esc_html__('Six Columns', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'footer_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'footer_mobile_visibility',
	'label'       => esc_html__('Mobile Visibility', 'vara-plugin'),
	'description' => esc_html__('Select the visibility of the widgets in mobile layout mode (< 768px).', 'vara-plugin'),
	'section'     => 'footer_widgets_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'footer_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));

// Social Media Settings
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'footer_social_media_visibility',
	'label'       => esc_html__('Visibility', 'vara-plugin'),
	'description' => esc_html__('Show or hide the social media in footer.', 'vara-plugin'),
	'section'     => 'footer_social_media_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'footer_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'sortable',
	'settings'    => 'footer_social_media_enabled',
	'label'       => esc_html__('Social Media', 'vara-plugin'),
	'description' => __('Select which ones you want to display as social media in footer. Click on the eye to make them visible, you can also drag & drop them. <br /><small>Note: Do not forget to add the links at Theme Options > Social Media.</small>', 'vara-plugin'),
	'section'     => 'footer_social_media_section',
	'default'     => array(
		'facebook',
		'twitter',
		'dribbble',
		'pinterest',
		'linkedin'
	),
	'choices' => array(
		'facebook' => esc_html__('Facebook', 'vara-plugin'),
		'twitter' => esc_html__('Twitter', 'vara-plugin'),
		'google_plus' => esc_html__('Google Plus', 'vara-plugin'),
		'vimeo' => esc_html__('Vimeo', 'vara-plugin'),
		'dribbble' => esc_html__('Dribbble', 'vara-plugin'),
		'pinterest' => esc_html__('Pinterest', 'vara-plugin'),
		'youtube' => esc_html__('Youtube', 'vara-plugin'),
		'tumblr' => esc_html__('Tumblr', 'vara-plugin'),
		'linkedin' => esc_html__('Linkedin', 'vara-plugin'),
		'flickr' => esc_html__('Flickr', 'vara-plugin'),
		'spotify' => esc_html__('Spotify', 'vara-plugin'),
		'instagram' => esc_html__('Instagram', 'vara-plugin'),
	),
	'active_callback' => array(
		array(
			'setting'  => 'footer_social_media_visibility',
			'operator' => '==',
			'value'    => '1'
		),
		array(
			'setting'  => 'footer_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));