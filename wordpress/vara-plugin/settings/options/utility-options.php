<?php
/**
 * Utility Options
 */

// Create Panel and Sections
Kirki::add_panel('utility_options', array(
	'title'       => esc_html__('Utility', 'vara-plugin'),
	'priority'    => 7
));
Kirki::add_section('title_section', array(
	'title'          => esc_html__('Title', 'vara-plugin'),
	'panel'			=> 'utility_options'
));
Kirki::add_section('breadcrumbs_section', array(
	'title'          => esc_html__('Breadcrumbs', 'vara-plugin'),
	'panel'			=> 'utility_options'
));
Kirki::add_section('hero_section', array(
	'title'          => esc_html__('Hero', 'vara-plugin'),
	'panel'			=> 'utility_options'
));
Kirki::add_section('to_top_section', array(
	'title'          => esc_html__('To Top', 'vara-plugin'),
	'panel'			=> 'utility_options'
));
Kirki::add_section('search_section', array(
	'title'          => esc_html__('Search', 'vara-plugin'),
	'panel'			=> 'utility_options'
));
Kirki::add_section('404_section', array(
	'title'          => esc_html__('Error 404', 'vara-plugin'),
	'panel'			=> 'utility_options'
));
Kirki::add_section('google_maps_section', array(
	'title'          => esc_html__('Google Maps', 'vara-plugin'),
	'panel'			=> 'utility_options'
));

// Title Options
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'general_title_page',
	'label'       => esc_html__('Page Title', 'vara-plugin'),
	'description' => __('Show or hide the title on pages.', 'vara-plugin'),
	'section'     => 'title_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'general_title_post',
	'label'       => esc_html__('Post Title', 'vara-plugin'),
	'description' => __('Show or hide the title on posts.', 'vara-plugin'),
	'section'     => 'title_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'general_title_product',
	'label'       => esc_html__('Product Title', 'vara-plugin'),
	'description' => __('Show or hide the title on products.', 'vara-plugin'),
	'section'     => 'title_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'general_title_portfolio_item',
	'label'       => esc_html__('Portfolio Item Title', 'vara-plugin'),
	'description' => __('Show or hide the title on portfolio items.', 'vara-plugin'),
	'section'     => 'title_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
));

// Breadcrumbs Options
Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => 'breadcrumbs_separator',
	'label'    => __('Separator', 'vara-plugin'),
	'description'  => esc_html__('Enter the text that will appear as separator between each breadcrumb.', 'vara-plugin'),
	'section'  => 'breadcrumbs_section'
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'breadcrumbs_page_visibility',
	'label'       => esc_html__('Page Visibility', 'vara-plugin'),
	'description' => __('Show or hide the breadcrumb in pages.', 'vara-plugin'),
	'section'     => 'breadcrumbs_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'breadcrumbs_post_visibility',
	'label'       => esc_html__('Post Visibility', 'vara-plugin'),
	'description' => __('Show or hide the breadcrumb in posts.', 'vara-plugin'),
	'section'     => 'breadcrumbs_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
));
if (class_exists('WooCommerce')) {
	Kirki::add_field('grada_kirki', array(
		'type'        => 'select',
		'settings'    => 'breadcrumbs_product_visibility',
		'label'       => esc_html__('Product Visibility', 'vara-plugin'),
		'description' => __('Show or hide the breadcrumb in products.', 'vara-plugin'),
		'section'     => 'breadcrumbs_section',
		'default'     => '2',
		'choices'     => array(
			'1' => esc_html__('Show', 'vara-plugin'),
			'2' => esc_html__('Hide', 'vara-plugin')
		),
	));
}
if (class_exists('WooCommerce')) {
	Kirki::add_field('grada_kirki', array(
		'type'        => 'select',
		'settings'    => 'breadcrumbs_shop_visibility',
		'label'       => esc_html__('Shop Visibility', 'vara-plugin'),
		'description' => __('Show or hide the breadcrumb in shop.', 'vara-plugin'),
		'section'     => 'breadcrumbs_section',
		'default'     => '2',
		'choices'     => array(
			'1' => esc_html__('Show', 'vara-plugin'),
			'2' => esc_html__('Hide', 'vara-plugin')
		),
	));
}
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'breadcrumbs_portfolio_item_visibility',
	'label'       => esc_html__('Portfolio Item Visibility', 'vara-plugin'),
	'description' => __('Show or hide the breadcrumb in portfolio items.', 'vara-plugin'),
	'section'     => 'breadcrumbs_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'breadcrumbs_archives_visibility',
	'label'       => esc_html__('Archives Visibility', 'vara-plugin'),
	'description' => __('Show or hide the breadcrumb in archives(Categories, Tags, Custom Taxonomies).', 'vara-plugin'),
	'section'     => 'breadcrumbs_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
));

// Hero Settings
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'hero_message',
	'section'     => 'hero_section',
	'default'     => '<h1>' . esc_html__('Settings', 'vara-plugin') . '</h1> <hr>'
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'hero_visibility',
	'label'       => esc_html__('Visibility', 'vara-plugin'),
	'description' => __('Show or hide the hero, all posts and pages will have the option to inherit this value or set it individually.', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'hero_type',
	'label'       => esc_html__('Type', 'vara-plugin'),
	'description' => __('Select the type of hero. <br /><small>Note: Do not forget to add heroes in Elementor Templates.</small>', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Default', 'vara-plugin'),
		'2' => esc_html__('Template', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'hero_template',
	'label'       => esc_html__('Template', 'vara-plugin'),
	'description' => __('Select the template.', 'vara-plugin'),
	'section'     => 'hero_section',
	'choices'     => grada_get_elementor_template('hero'),
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '==',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'dimension',
	'settings'    => 'hero_height',
	'label'       => esc_html__('Height', 'vara-plugin'),
	'description' => esc_html__('Enter the height, do not forget to add the unit too, for example px/vh/rem/em/%.', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '45vh',
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'hero_container',
	'label'       => esc_html__('Container', 'vara-plugin'),
	'description' => __('Select if you want the hero to be boxed in 1140px width or not.', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('On', 'vara-plugin'),
		'2' => esc_html__('Off', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'hero_alignment',
	'label'       => esc_html__('Alignment', 'vara-plugin'),
	'description' => __('Select the text alignment of the hero.', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('Left', 'vara-plugin'),
		'2' => esc_html__('Center', 'vara-plugin'),
		'3' => esc_html__('Right', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));

// Image
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'hero_message_image',
	'section'     => 'hero_section',
	'default'     => '<h1>' . esc_html__('Image', 'vara-plugin') . '</h1> <hr>',
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'hero_image',
	'label'       => esc_html__('Image', 'vara-plugin'),
	'description' => __('Select the image you want to display as hero background image.', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Use the post/page featured image', 'vara-plugin'),
		'2' => esc_html__('Custom Image', 'vara-plugin'),
		'3' => esc_html__('No Image', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'image',
	'settings'    => 'hero_custom_image',
	'label'       => esc_html__('Custom Image', 'vara-plugin'),
	'description' => esc_html__('Upload a custom image which will be displayed in all posts/page heroes, except those who do not inherit from the option.', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '',
	'choices'     => array(
		'save_as' => 'id',
	),
	'active_callback' => array(
		array(
			'setting'  => 'hero_image',
			'operator' => '==',
			'value'    => '2'
		),
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		)
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'hero_image_repeat',
	'label'       => esc_html__('Repeat', 'vara-plugin'),
	'description' => __('Select the image repeat settings.', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('No Repeat', 'vara-plugin'),
		'2' => esc_html__('Repeat All', 'vara-plugin'),
		'3' => esc_html__('Repeat Horizontally', 'vara-plugin'),
		'4' => esc_html__('Repeat Vertically', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'hero_image_attachment',
	'label'       => esc_html__('Attachment', 'vara-plugin'),
	'description' => __('Select the image attachment.', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Scroll', 'vara-plugin'),
		'2' => esc_html__('Fixed', 'vara-plugin'),
		'3' => esc_html__('Local', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'hero_image_position',
	'label'       => esc_html__('Position', 'vara-plugin'),
	'description' => __('Select the image position.', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '5',
	'choices'     => array(
		'1' => esc_html__('Left Top', 'vara-plugin'),
		'2' => esc_html__('Left Center', 'vara-plugin'),
		'3' => esc_html__('Left Bottom', 'vara-plugin'),
		'4' => esc_html__('Center Top', 'vara-plugin'),
		'5' => esc_html__('Center Center', 'vara-plugin'),
		'6' => esc_html__('Center Bottom', 'vara-plugin'),
		'7' => esc_html__('Right Top', 'vara-plugin'),
		'8' => esc_html__('Right Center', 'vara-plugin'),
		'9' => esc_html__('Right Bottom', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'hero_image_size',
	'label'       => esc_html__('Size', 'vara-plugin'),
	'description' => __('Select the image size.', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('Auto', 'vara-plugin'),
		'2' => esc_html__('Cover', 'vara-plugin'),
		'3' => esc_html__('Contain', 'vara-plugin'),
		'4' => esc_html__('Initial', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'hero_image_overlay',
	'label'       => esc_html__('Overlay', 'vara-plugin'),
	'description' => __('Show an overlay for the background image.', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'number',
	'settings'    => 'hero_image_overlay_opacity',
	'label'       => esc_html__('Overlay Opacity', 'vara-plugin'),
	'description' => __('Enter the number of overlay opacity, the number can be in range of 0 and 1.', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => 0,
	'choices'     => array(
		'min'  => 0,
		'max'  => 1,
		'step' => 0.01
	),
	'active_callback' => array(
		array(
			'setting'  => 'hero_image_overlay',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'color',
	'settings'    => 'hero_image_overlay_color',
	'label'       => esc_html__('Overlay Color', 'vara-plugin'),
	'description' => __('Select the color of overlay.', 'vara-plugin'),
	'section'     => 'hero_section',
	'active_callback' => array(
		array(
			'setting'  => 'hero_image_overlay',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		)
	)
));

// Title
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'hero_message_title',
	'section'     => 'hero_section',
	'default'     => '<h1>' . esc_html__('Title', 'vara-plugin') . '</h1><hr>',
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'hero_title',
	'label'       => esc_html__('Title', 'vara-plugin'),
	'description' => __('Select the title you want to display in the hero.', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Use the post/page title', 'vara-plugin'),
		'2' => esc_html__('Custom Title', 'vara-plugin'),
		'3' => esc_html__('No Title', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'editor',
	'settings'    => 'hero_custom_title',
	'label'       => esc_html__('Editor', 'vara-plugin'),
	'description' => __('Enter the title, it accepts html tags too.', 'vara-plugin'),
	'section'     => 'hero_section',
	'active_callback' => array(
		array(
			'setting'  => 'hero_title',
			'operator' => '==',
			'value'    => '2',
		),
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		)
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'hero_title_animation',
	'label'       => esc_html__('Animation', 'vara-plugin'),
	'description' => __('Select initial loading animation for the title.', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('None', 'vara-plugin'),
		'2' => esc_html__('Fade In', 'vara-plugin'),
		'3' => esc_html__('Fade In Up', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'color',
	'settings'    => 'hero_title_color',
	'label'       => __('Color', 'vara-plugin'),
	'description' => __('Change the text color of title. <br /><small>Note: The default color is #232931.</small>', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '#232931',
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));

// Subtitle
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'hero_message_subtitle',
	'section'     => 'hero_section',
	'default'     => '<h1>' . esc_html__('Subtitle', 'vara-plugin') . '</h1> <hr>',
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'hero_subtitle_animation',
	'label'       => esc_html__('Subtitle', 'vara-plugin'),
	'description' => __('Select if you want to inherit the subtitle or set it custom..', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('Breadcrumb', 'vara-plugin'),
		'2' => esc_html__('Custom', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'editor',
	'settings'    => 'hero_subtitle',
	'label'       => esc_html__('Editor', 'vara-plugin'),
	'description' => __('Enter the subtitle, it accepts html tags too.', 'vara-plugin'),
	'section'     => 'hero_section',
	'active_callback' => array(
		array(
			'setting'  => 'hero_subtitle_animation',
			'operator' => '==',
			'value'    => '2',
		),
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		)
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'hero_subtitle_animation',
	'label'       => esc_html__('Animation', 'vara-plugin'),
	'description' => __('Select initial loading animation for the subtitle.', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('None', 'vara-plugin'),
		'2' => esc_html__('Fade In', 'vara-plugin'),
		'3' => esc_html__('Fade In Up', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'color',
	'settings'    => 'hero_subtitle_color',
	'label'       => __('Color', 'vara-plugin'),
	'description' => __('Change the text color of subtitle. <br /><small>Note: The default color is #858585.</small>', 'vara-plugin'),
	'section'     => 'hero_section',
	'default'     => '#858585',
	'active_callback' => array(
		array(
			'setting'  => 'hero_type',
			'operator' => '!=',
			'value'    => '2'
		),
	)
));


/**
 * To Top
 */
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'to_top_visibility',
	'label'       => esc_html__('Visibility', 'vara-plugin'),
	'description' => __('Show or hide the to top button.', 'vara-plugin'),
	'section'     => 'to_top_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'to_top_skin',
	'label'       => esc_html__('Skin', 'vara-plugin'),
	'description' => __('Select the skin of the to top button.', 'vara-plugin'),
	'section'     => 'to_top_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Dark', 'vara-plugin'),
		'2' => esc_html__('Light', 'vara-plugin')
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'to_top_animation',
	'label'       => esc_html__('Animation', 'vara-plugin'),
	'description' => __('Select the animation of to the top button.', 'vara-plugin'),
	'section'     => 'to_top_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__('Translate', 'vara-plugin'),
		'2' => esc_html__('Scale', 'vara-plugin')
	)
));

/**
 * Search
 */
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'search_columns',
	'label'       => esc_html__('Columns', 'vara-plugin'),
	'description' => __('Select the columns of the search page.', 'vara-plugin'),
	'section'     => 'search_section',
	'default'     => '3',
	'choices'     => array(
		'1' => esc_html__('1 Column', 'vara-plugin'),
		'2' => esc_html__('2 Columns', 'vara-plugin'),
		'3' => esc_html__('3 Columns', 'vara-plugin'),
		'4' => esc_html__('4 Columns', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'search_sidebar',
	'label'       => esc_html__('Sidebar', 'vara-plugin'),
	'description' => __('Select the sidebar placement in the search page or hide it.', 'vara-plugin'),
	'section'     => 'search_section',
	'default'     => '3',
	'choices'     => array(
		'1' => esc_html__('Left', 'vara-plugin'),
		'2' => esc_html__('Right', 'vara-plugin'),
		'3' => esc_html__('Hide', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'multicheck',
	'settings'    => 'search_post_types',
	'label'       => esc_html__('Post Type', 'vara-plugin'),
	'description' => __('Select the included post types in the search page.', 'vara-plugin'),
	'section'     => 'search_section',
	'default'     => array('post', 'page', 'portfolio', 'product'),
	'choices'     => array(
		'post' => esc_html__('Post', 'vara-plugin'),
		'page' => esc_html__('Page', 'vara-plugin'),
		'portfolio' => esc_html__('Portfolio', 'vara-plugin'),
		'product' => esc_html__('Product', 'vara-plugin')
	),
));

/**
 * 404 Page
 */
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => '404_type',
	'label'       => esc_html__('Type', 'vara-plugin'),
	'description' => __('Select the 404 type. <br /> <small>Note: Make sure to create templates with Elementor as section type.</small>', 'vara-plugin'),
	'section'     => '404_section',
	'default'     => 'default',
	'choices'     => array(
		'default' => esc_html__('Default', 'vara-plugin'),
		'template' => esc_html__('Template', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => '404_template',
	'label'       => esc_html__('Template', 'vara-plugin'),
	'description' => __('Select the 404 template.', 'vara-plugin'),
	'section'     => '404_section',
	'choices'     => grada_get_elementor_template('page'),
	'active_callback' => array(
		array(
			'setting'  => '404_type',
			'operator' => '==',
			'value'    => 'template'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => '404_title',
	'label'    => __('Title test', 'vara-plugin'),
	'description'  => __('Default: <small>404</small>', 'vara-plugin'),
	'section'  => '404_section',
	'active_callback' => array(
		array(
			'setting'  => '404_type',
			'operator' => '!=',
			'value'    => 'template'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'     => 'textarea',
	'settings' => '404_description',
	'label'    => __('Description', 'vara-plugin'),
	'description'  => __('Default: <small>The page you were looking for couldn\'t be found. The page could be removed or you misspelled the word while searching for it.</small>', 'vara-plugin'),
	'section'  => '404_section',
	'active_callback' => array(
		array(
			'setting'  => '404_type',
			'operator' => '!=',
			'value'    => 'template'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => '404_button_url',
	'label'    => __('Button Url', 'vara-plugin'),
	'description'  => __('Default: <small>The home directory.</small>', 'vara-plugin'),
	'section'  => '404_section',
	'active_callback' => array(
		array(
			'setting'  => '404_type',
			'operator' => '!=',
			'value'    => 'template'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'     => 'text',
	'settings' => '404_button_text',
	'label'    => __('Button Text', 'vara-plugin'),
	'description'  => __('Default: <small>Back to Homepage</small>', 'vara-plugin'),
	'section'  => '404_section',
	'active_callback' => array(
		array(
			'setting'  => '404_type',
			'operator' => '!=',
			'value'    => 'template'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => '404_section_message',
	'section'     => '404_section',
	'default'     => '<h1>' . esc_html__('Hero', 'vara-plugin') . '</h1> <hr>',
	'active_callback' => array(
		array(
			'setting'  => '404_type',
			'operator' => '!=',
			'value'    => 'template'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'image',
	'settings'    => '404_hero_image',
	'label'       => esc_html__('Image', 'vara-plugin'),
	'description' => __('Upload an image to the hero of the 404 page.', 'vara-plugin'),
	'section'     => '404_section',
	'choices'     => array(
		'save_as' => 'id'
	),
	'active_callback' => array(
		array(
			'setting'  => '404_type',
			'operator' => '!=',
			'value'    => 'template'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => '404_hero_overlay',
	'label'       => esc_html__('Overlay', 'vara-plugin'),
	'description' => __('Show an overlay for the background image.', 'vara-plugin'),
	'section'     => '404_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_html__('Show', 'vara-plugin'),
		'2' => esc_html__('Hide', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => '404_type',
			'operator' => '!=',
			'value'    => 'template'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'number',
	'settings'    => '404_hero_overlay_opacity',
	'label'       => esc_html__('Overlay Opacity', 'vara-plugin'),
	'description' => __('Enter the number of overlay opacity, the number can be in range of 0 and 1.', 'vara-plugin'),
	'section'     => '404_section',
	'default'     => 0,
	'choices'     => array(
		'min'  => 0,
		'max'  => 1,
		'step' => 0.01
	),
	'active_callback' => array(
		array(
			'setting'  => '404_hero_overlay',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => '404_type',
			'operator' => '!=',
			'value'    => 'template'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'color',
	'settings'    => '404_hero_overlay_color',
	'label'       => esc_html__('Overlay Color', 'vara-plugin'),
	'description' => __('Select the color of overlay.', 'vara-plugin'),
	'section'     => '404_section',
	'active_callback' => array(
		array(
			'setting'  => '404_hero_overlay',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => '404_type',
			'operator' => '!=',
			'value'    => 'template'
		),
	)
));

/**
 * Google Maps
 */
Kirki::add_field('grada_kirki', array(
	'type'        => 'text',
	'settings'    => 'google_maps_api_key',
	'label'       => esc_html__('API Key', 'vara-plugin'),
	'description' => __('To use the Google Maps JavaScript API, you must register your app project on the <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_BLANK">Google API Console</a> and get a Google API key which you can add to your app.', 'vara-plugin'),
	'section'     => 'google_maps_section'
));