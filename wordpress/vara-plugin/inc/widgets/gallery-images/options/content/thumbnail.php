<?php
/**
 * Gallery Images > Content Options > Thumbnail
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

$this->add_control(
	'gallery_images_thumbnail_resizer',
	[
		'label' => esc_html__('Thumbnail Resizer', 'vara-plugin'),
		'description' => esc_html__('Activate a thumbnail resizer, it will crop all the images to a given width & height.', 'vara-plugin'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('On', 'vara-plugin'),
		'label_off' => esc_html__('Off', 'vara-plugin'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$this->add_group_control(
	\Elementor\Group_Control_Image_Size::get_type(),
	[
		'name' => 'gallery_images_thumbnail_sizes', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
		'label' => esc_html__('Thumbnail Sizes', 'vara-plugin'),
		'description' => esc_html__('Select the thumbnail size.', 'vara-plugin'),
		'default' => 'large',
		'condition' => [
			'gallery_images_thumbnail_resizer' => 'yes'
		]
	]
);