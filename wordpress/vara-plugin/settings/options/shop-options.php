<?php
/**
 * Shop Options
 */

// Create Panel and Sections
Kirki::add_panel('shop_options', array(
	'title'       => esc_attr__('Shop', 'vara-plugin'),
	'priority'    => 6
));
Kirki::add_section('shop_functionality_section', array(
	'title'          => esc_attr__('Functionality', 'vara-plugin'),
	'priority'       => 1,
	'panel'			=> 'shop_options'
));
Kirki::add_section('shop_style_section', array(
	'title'          => esc_attr__('Style', 'vara-plugin'),
	'priority'       => 2,
	'panel'			=> 'shop_options'
));
Kirki::add_section('shop_thumbnail_section', array(
	'title'          => esc_attr__('Thumbnail', 'vara-plugin'),
	'priority'       => 3,
	'panel'			=> 'shop_options'
));
Kirki::add_section('shop_product_section', array(
	'title'          => esc_attr__('Product', 'vara-plugin'),
	'priority'       => 4,
	'panel'			=> 'shop_options'
));

/**
 * Functionality
 */
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'shop_type',
	'label'       => esc_html__('Type', 'vara-plugin'),
	'description' => __('Select the type of shop.', 'vara-plugin'),
	'section'     => 'shop_functionality_section',
	'default'     => 'classic-grid',
	'choices'     => array(
		'left-image' => esc_html__('Featured Image left', 'vara-plugin'),
		'classic-grid' => esc_html__('Grid Classic', 'vara-plugin'),
		'meta-overlay' => esc_html__('Meta Overlay', 'vara-plugin'),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'shop_sidebar',
	'label'       => esc_html__('Sidebar', 'vara-plugin'),
	'description' => __('Select the placement of sidebar or hide it, default is right.', 'vara-plugin'),
	'section'     => 'shop_functionality_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_attr__('Left', 'vara-plugin'),
		'2' => esc_attr__('Right', 'vara-plugin'),
		'3' => esc_attr__('Hide', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'shop_result_count',
	'label'       => esc_html__('Result Count', 'vara-plugin'),
	'description' => __('Show or hide the result count.', 'vara-plugin'),
	'section'     => 'shop_functionality_section',
	'default'     => 'show',
	'choices'     => array(
		'show' => esc_attr__('Show', 'vara-plugin'),
		'hide' => esc_attr__('Hide', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'shop_catalog_ordering',
	'label'       => esc_html__('Catalog Ordering', 'vara-plugin'),
	'description' => __('Show or hide the catalog ordering.', 'vara-plugin'),
	'section'     => 'shop_functionality_section',
	'default'     => 'show',
	'choices'     => array(
		'show' => esc_attr__('Show', 'vara-plugin'),
		'hide' => esc_attr__('Hide', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'shop_catalog_ordering_default',
	'label'       => esc_html__('Default Order', 'vara-plugin'),
	'description' => __('Select which order you want to set default.', 'vara-plugin'),
	'section'     => 'shop_functionality_section',
	'default'     => 'menu_order',
	'choices'     => array(
		'menu_order' => esc_attr__('Default sorting', 'vara-plugin'),
		'popularity' => esc_attr__('Sort by popularity', 'vara-plugin'),
		'rating' => esc_attr__('Sort by average rating', 'vara-plugin'),
		'date' => esc_attr__('Sort by newness', 'vara-plugin'),
		'price' => esc_attr__('Sort by price: low to high', 'vara-plugin'),
		'price-desc' => esc_attr__('Sort by price: high to low', 'vara-plugin')
	),
	'active_callback' => array(
		array(
			'setting'  => 'shop_catalog_ordering',
			'operator' => '==',
			'value'    => 'show'
		),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'text',
	'settings'    => 'shop_ppp',
	'label'       => esc_attr__('Posts Per Page', 'vara-plugin'),
	'description' => __('Enter the number of products you want to display on the first page, a pagination will be created if there are more products than this number.', 'vara-plugin'),
	'section'     => 'shop_functionality_section'
));

/**
 * Style
 */
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'shop_columns',
	'label'       => esc_html__('Columns', 'vara-plugin'),
	'description' => __('Select the columns of Shop, default is two columns.', 'vara-plugin'),
	'section'     => 'shop_style_section',
	'default'     => '2-columns',
	'choices'     => array(
		'1-column' => esc_attr__('1 Column', 'vara-plugin'),
		'2-columns' => esc_attr__('2 Columns', 'vara-plugin'),
		'3-columns' => esc_attr__('3 Columns', 'vara-plugin'),
		'4-columns' => esc_attr__('4 Columns', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'shop_animation',
	'label'       => esc_html__('Animation', 'vara-plugin'),
	'description' => __('Select initial loading animation for products.', 'vara-plugin'),
	'section'     => 'shop_style_section',
	'default'     => 'fade-in',
	'choices'     => array(
		'none' => esc_attr__('None', 'vara-plugin'),
		'fade-in' => esc_attr__('Fade In', 'vara-plugin'),
		'fade-in-up' => esc_attr__('Fade In Up', 'vara-plugin'),
		'fade-in-delay' => esc_attr__('Fade In (with delay)', 'vara-plugin'),
		'fade-in-up-delay' => esc_attr__('Fade In Up (with delay)', 'vara-plugin'),
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'shop_spacing',
	'label'       => esc_html__('Spacing', 'vara-plugin'),
	'description' => __('Add custom spacing between products.', 'vara-plugin'),
	'section'     => 'shop_style_section',
	'default'     => 'no',
	'choices'     => array(
		'yes' => esc_attr__('On', 'vara-plugin'),
		'no' => esc_attr__('Off', 'vara-plugin')
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'slider',
	'settings'    => 'shop_spacing_value',
	'label'       => __('Spacing Value', 'vara-plugin'),
	'description' => __('Move the slider to set the value of spacing. <br /> <small>Note: The value is represented in pixels.</small>', 'vara-plugin'),
	'section'     => 'shop_style_section',
	'default'     => 30,
	'choices'     => array(
		'min'  => '0',
		'max'  => '100',
		'step' => '1',
	),
	'active_callback' => array(
		array(
			'setting'  => 'shop_spacing',
			'operator' => '==',
			'value'    => 'yes'
		),
	)
));

/**
 * Thumbnail Resizer
 */
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'shop_thumbnail_resizer',
	'label'       => esc_html__('Thumbnail', 'vara-plugin'),
	'description' => __('Activate a thumbnail resizer, it will crop all the images to a given width & height. <br /><small>Note: Do not forget to regenerate thumbnails.</small>', 'vara-plugin'),
	'section'     => 'shop_thumbnail_section',
	'default'     => 'no',
	'choices'     => array(
		'yes' => esc_attr__('On', 'vara-plugin'),
		'no' => esc_attr__('Off', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'shop_thumbnail_sizes',
	'label'       => esc_html__('Thumbnail Size', 'vara-plugin'),
	'description' => __('Select the image size, you can add new thumbnail sizes in the general options.', 'vara-plugin'),
	'section'     => 'shop_thumbnail_section',
	'default'     => 'full',
	'choices'     => grada_thumbnail_sizes(),
	'active_callback' => array(
		array(
			'setting'  => 'shop_thumbnail_resizer',
			'operator' => '==',
			'value'    => 'yes'
		),
	)
));

/**
 * Product Settings
 */
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'product_sidebar',
	'label'       => esc_html__('Sidebar', 'vara-plugin'),
	'description' => __('Select the placement of sidebar or hide it, default is hidden.', 'vara-plugin'),
	'section'     => 'shop_product_section',
	'default'     => '3',
	'choices'     => array(
		'1' => esc_attr__('Left', 'vara-plugin'),
		'2' => esc_attr__('Right', 'vara-plugin'),
		'3' => esc_attr__('Hide', 'vara-plugin')
	)
));
// Navigation
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'product_navigation_message',
	'section'     => 'shop_product_section',
	'default'     => '<h1>' . esc_html__('Navigation', 'vara-plugin') . '</h1><hr>'
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'product_navigation',
	'label'       => esc_html__('Navigation', 'vara-plugin'),
	'description' => __('Select the visibility of the navigation.', 'vara-plugin'),
	'section'     => 'shop_product_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_attr__('Show', 'vara-plugin'),
		'2' => esc_attr__('Hide', 'vara-plugin')
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'product_navigation_back_url',
	'label'       => esc_html__('Back URL', 'vara-plugin'),
	'description' => __('Add an url which will be displayed on the center and will send you to shop.', 'vara-plugin'),
	'section'     => 'product_options',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_attr__('Show', 'vara-plugin'),
		'2' => esc_attr__('Hide', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'text',
	'settings'    => 'product_navigation_back_url_link',
	'label'       => esc_html__('Link', 'vara-plugin'),
	'description' => __('Change the link of the text, by default it will send you to the shop page.', 'vara-plugin'),
	'section'     => 'product_options',
	'active_callback' => array(
		array(
			'setting'  => 'product_navigation_back_url',
			'operator' => '==',
			'value'    => '1'
		),
	)
));

// Gallery
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'product_share',
	'label'       => esc_html__('Share', 'vara-plugin'),
	'description' => __('Select the visibility of share icons. <br /><small>Note: Make sure to install and activate the GradaStudio Share plugin.</small>', 'vara-plugin'),
	'section'     => 'shop_product_section',
	'default'     => '2',
	'choices'     => array(
		'1' => esc_attr__('Show', 'vara-plugin'),
		'2' => esc_attr__('Hide', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'product_gallery_message',
	'section'     => 'shop_product_section',
	'default'     => '<h1>' . esc_html__('Gallery', 'vara-plugin') . '</h1><hr>'
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'product_gallery_alignment',
	'label'       => esc_html__('Alignment', 'vara-plugin'),
	'description' => __('Select the alignment of the gallery, if left is selected the content will move right and vice versa.', 'vara-plugin'),
	'section'     => 'shop_product_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_attr__('Left', 'vara-plugin'),
		'2' => esc_attr__('Right', 'vara-plugin')
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'product_gallery_width',
	'label'       => esc_html__('Width', 'vara-plugin'),
	'description' => __('Select the width of the gallery.', 'vara-plugin'),
	'section'     => 'shop_product_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_attr__('One Half (1/2)', 'vara-plugin'),
		'2' => esc_attr__('Two Third Column (2/3)', 'vara-plugin'),
		'3' => esc_attr__('Three Fourth Column (3/4)', 'vara-plugin')
	)
));

// Related
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'product_gallery_related',
	'section'     => 'shop_product_section',
	'default'     => '<h1>' . esc_html__('Related', 'vara-plugin') . '</h1><hr>'
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'product_related',
	'label'       => esc_html__('Visibility', 'vara-plugin'),
	'description' => __('Select the visibility of the related products.', 'vara-plugin'),
	'section'     => 'shop_product_section',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_attr__('Show', 'vara-plugin'),
		'2' => esc_attr__('Hide', 'vara-plugin')
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'product_related_count',
	'label'       => esc_html__('Number', 'vara-plugin'),
	'description' => __('Select how many products you want to display in related section.', 'vara-plugin'),
	'section'     => 'shop_product_section',
	'default'     => '4',
	'choices'     => array(
		'1' => esc_attr__('1 Product', 'vara-plugin'),
		'2' => esc_attr__('2 Products', 'vara-plugin'),
		'3' => esc_attr__('3 Products', 'vara-plugin'),
		'4' => esc_attr__('4 Products', 'vara-plugin')
	)
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'product_thumbnail_resizer',
	'label'       => esc_html__('Thumbnail', 'vara-plugin'),
	'description' => __('Activate a thumbnail resizer, it will crop all the related products images to a given width & height. <br /><small>Note: Do not forget to regenerate thumbnails.</small>', 'vara-plugin'),
	'section'     => 'shop_product_section',
	'default'     => 'no',
	'choices'     => array(
		'yes' => esc_attr__('On', 'vara-plugin'),
		'no' => esc_attr__('Off', 'vara-plugin')
	),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'product_thumbnail_sizes',
	'label'       => esc_html__('Thumbnail Size', 'vara-plugin'),
	'description' => __('Select the image size, you can add new thumbnail sizes in the general options.', 'vara-plugin'),
	'section'     => 'shop_product_section',
	'default'     => 'full',
	'choices'     => grada_thumbnail_sizes(),
	'active_callback' => array(
		array(
			'setting'  => 'product_thumbnail_resizer',
			'operator' => '==',
			'value'    => 'yes'
		),
	)
));
