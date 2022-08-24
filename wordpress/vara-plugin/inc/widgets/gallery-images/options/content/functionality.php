<?php
/**
 * Gallery Images > Content Options > Functionality
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'gallery_images_layout',
	[
		'label' => esc_html__('Layout', 'vara-plugin'),
		'description' => esc_html__('Select the layout of posts.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'isotope' => esc_html__('Isotope', 'vara-plugin'),
			'carousel' => esc_html__('Carousel', 'vara-plugin')
		],
		'default' => 'isotope'
	]
);

$this->add_control(
	'gallery_images_layout_type',
	[
		'label' => esc_html__('Layout Type', 'vara-plugin'),
		'description' => esc_html__('Select the layout type of isotope.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'masonry' => esc_html__('Masonry', 'vara-plugin'),
			'metro' => esc_html__('Metro', 'vara-plugin'),
			'fitrows' => esc_html__('FitRows', 'vara-plugin'),
			'justified' => esc_html__('Justified', 'vara-plugin')
		],
		'default' => 'masonry',
		'conditions' => [
			'terms' => [
				[
					'name' => 'gallery_images_layout',
					'operator' => '==',
					'value' => 'isotope'
				],
			]
		]
	]
);

$this->add_control(
	'gallery_images_layout_model',
	[
		'label' => esc_html__('Layout Model', 'vara-plugin'),
		'description' => esc_html__('Select the layout model.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'info-overlay' => esc_html__('Info Overlay', 'vara-plugin'),
			'info-bottom' => esc_html__('Info Bottom', 'vara-plugin')
		],
		'default' => 'info-overlay',
		'condition' => [
			'gallery_images_layout_type!' => 'justified'
		]
	]
);

$this->add_control(
	'gallery_images_lightbox',
	[
		'label' => esc_html__('Lightbox', 'vara-plugin'),
		'description' => esc_html__('Enable the lightbox for the images, the images will open in a large slideshow when clicked.'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Yes', 'vara-plugin'),
		'label_off' => esc_html__('No', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'no'
	]
);

/**
 * Categories
 *
 * Get all categories and
 * display them in a select, it's up
 * to the post type to change this category
 */
$media_categories = [];
$media_terms = get_terms('gallery_category', array('hide_empty' => false));
if ($media_terms && !is_wp_error($media_terms)) {
	foreach ($media_terms as $term) {
		$media_categories[$term->slug] = $term->name;
	}
}

$this->add_control(
	'gallery_images_filters_visibility',
	[
		'label' => esc_html__('Filters', 'vara-plugin'),
		'description' => esc_html__('Make the media gallery sortable, do not forget to add filters in the repeater.'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'vara-plugin'),
		'label_off' => esc_html__('Hide', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'no',
		'condition' => [
			'gallery_images_layout' => 'isotope'
		],
	]
);

$this->add_control(
	'gallery_images_filters',
	[
		'label'   => __('Filters Query', 'vara-plugin'),
		'description' => __('Add the filters.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT2,
		'options' => $media_categories,
		'multiple' => true,
		'conditions' => [
			'terms' => [
				[
					'name' => 'gallery_images_layout',
					'operator' => '==',
					'value' => 'isotope'
				],
				[
					'name' => 'gallery_images_filters_visibility',
					'operator' => '==',
					'value' => 'yes'
				],
			]
		]
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'query_type', [
		'label' => esc_html__('Type', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::CHOOSE,
		'options' => [
			'image' => [
				'title' => esc_html__('Image', 'vara-plugin'),
				'icon' => 'fa fa-image',
			],
			'video' => [
				'title' => esc_html__('Video', 'vara-plugin'),
				'icon' => 'fa fa-video-camera',
			],
		],
		'default' => 'image',
		'toggle' => false,
		'label_block' => false,
	]
);

$repeater->add_control(
	'query_image', [
		'label' => esc_html__('Image', 'vara-plugin'),
		'type' => Controls_Manager::MEDIA,
		'default' => [
			'url' => get_template_directory_uri() . '/assets/images/placeholder.png'
		],
	]
);

$repeater->add_control(
	'query_video_link', [
		'label' => esc_html__('Video Link', 'vara-plugin'),
		'description' => esc_html__('YouTube link or video file (mp4 is recommended).', 'vara-plugin'),
		'type' => Controls_Manager::TEXT,
		'condition' => [
			'query_type' => 'video'
		]
	]
);

$repeater->add_control(
	'query_title', [
		'label' => esc_html__('Title', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Title', 'vara-plugin')
	]
);

$repeater->add_control(
	'query_subtitle', [
		'label' => esc_html__('Subtitle', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::TEXT
	]
);

$repeater->add_control(
	'query_category', [
		'label' => esc_html__('Category', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SELECT2,
		'options' => $media_categories,
		'multiple' => true
	]
);

$repeater->add_control(
	'query_url', [
		'label' => esc_html__('URL', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::URL,
		'condition' => [
			'query_type' => 'image'
		]
	]
);

$repeater->add_control(
	'query_description', [
		'label' => esc_html__('Description', 'vara-plugin'),
		'description' => __('Enter the description. <br /><small>Note: Description is not visible on meta inside.</small>', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::TEXTAREA
	]
);

/**
 * Query
 */
$this->add_control(
	'gallery_images_query_normal',
	[
		'label' => esc_html__('Query', 'vara-plugin'),
		'description' => esc_html__('Add images to the gallery.', 'vara-plugin'),
		'type' => Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'title_field' => '{{{ query_title }}}',
		'conditions' => [
			'terms' => [
				[
					'name' => 'gallery_images_layout_type',
					'operator' => '!=',
					'value' => 'metro'
				],
			]
		]
	]
);

$this->add_control(
	'gallery_images_query_metro',
	[
		'label' => esc_html__('Query', 'vara-plugin'),
		'description' => esc_html__('Add images to the gallery.', 'vara-plugin'),
		'type' => Controls_Manager::REPEATER,
		'fields' => [
			[
				'name' => 'query_type',
				'label' => esc_html__('Type', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'image' => [
						'title' => esc_html__('Image', 'vara-plugin'),
						'icon' => 'fa fa-image',
					],
					'video' => [
						'title' => esc_html__('Video', 'vara-plugin'),
						'icon' => 'fa fa-video-camera',
					],
				],
				'default' => 'image',
				'toggle' => false,
				'label_block' => false,
			],
			[
				'name' => 'query_image',
				'label' => esc_html__('Image', 'vara-plugin'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri() . '/assets/images/placeholder.png'
				]
			],
			[
				'name' => 'query_video_link',
				'label' => esc_html__('Video Link', 'vara-plugin'),
				'description' => esc_html__('YouTube link or video file (mp4 is recommended).', 'vara-plugin'),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'query_type' => 'video'
				]
			],
			[
				'name' => 'query_title',
				'label' => esc_html__('Title', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Title', 'vara-plugin'),
			],
			[
				'name' => 'query_subtitle',
				'label' => esc_html__('Subtitle', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::TEXT
			],
			[
				'name' => 'query_category',
				'label' => esc_html__('Category', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => $media_categories,
				'multiple' => true
			],
			[
				'name' => 'query_url',
				'label' => esc_html__('URL', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::URL
			],
			[
				'name' => 'query_description',
				'label' => esc_html__('Description', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::TEXTAREA
			],
			[
				'name' => 'query_column',
				'label' => esc_html__('Column', 'vara-plugin'),
				'description' => esc_html__('Select the column of metro.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1-column' => esc_attr__('1 Column', 'vara-plugin'),
					'2-column' => esc_attr__('2 Column', 'vara-plugin'),
					'3-column' => esc_attr__('3 Column', 'vara-plugin'),
					'4-column' => esc_attr__('4 Column', 'vara-plugin'),
					'5-column' => esc_attr__('5 Column', 'vara-plugin'),
					'6-column' => esc_attr__('6 Column', 'vara-plugin'),
					'7-column' => esc_attr__('7 Column', 'vara-plugin'),
					'8-column' => esc_attr__('8 Column', 'vara-plugin'),
					'9-column' => esc_attr__('9 Column', 'vara-plugin'),
					'10-column' => esc_attr__('10 Column', 'vara-plugin'),
					'11-column' => esc_attr__('11 Column', 'vara-plugin'),
					'12-column' => esc_attr__('12 Column', 'vara-plugin')
				],
				'default' => '3-column'
			]
		],
		'title_field' => '{{{ query_title }}}',
		'condition' => [
			'gallery_images_layout_type' => 'metro'
		]
	]
);