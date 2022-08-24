<?php
/**
 * Grada Studio Functions
 */

/**
 * Theme Plugin Styles
 */
function grada_theme_plugin_styles() {
	wp_enqueue_style('grada-style', plugin_dir_url(__FILE__) . '/assets/css/style.css', false, GDS_CORE_VERSION, null);

	if (grada_custom_fonts_styles())  {
		wp_add_inline_style('grada-style', implode(' ', grada_custom_fonts_styles()));
	}
}

/**
 * Theme Plugin Scripts
 */
function grada_theme_plugin_scripts() {
	wp_enqueue_script('countdown', plugin_dir_url(__FILE__) . '/assets/js/jquery.countdown.min.js', array('jquery'), GDS_CORE_VERSION, TRUE);
	wp_enqueue_script('justified-gallery', plugin_dir_url(__FILE__) . '/assets/js/jquery.justifiedGallery.min.js', array('jquery'), GDS_CORE_VERSION, TRUE);
	wp_enqueue_script('easings', plugin_dir_url(__FILE__) . '/assets/js/jquery.easing.min.js', array('jquery'), GDS_CORE_VERSION, TRUE);

	if (get_theme_mod('google_maps_api_key')) {
		wp_enqueue_script('vara-google-maps', 'https://maps.googleapis.com/maps/api/js?key='. get_theme_mod('google_maps_api_key') .'', array('jquery'), GDS_CORE_VERSION);
	}
}

/**
 * Share Social Media
 *
 * Implement share function
 * to singles or pages.
 */
function grada_share_social_media() {
	$grada_shortTitle = get_the_title();
	$grada_shortURL = get_permalink();
	$output = array();

	$grada_social_array = array(
		'facebook' => array(
			'icon' => 'ei-social_facebook',
			'class' => 'facebook',
			'link' => 'https://www.facebook.com/sharer/sharer.php?u='. esc_url($grada_shortURL) . ''
		),
		'twitter' => array(
			'icon' => 'ei-social_twitter',
			'class' => 'twitter',
			'link' => 'https://twitter.com/intent/tweet?text='. esc_attr($grada_shortTitle) .'&amp;url='. esc_url($grada_shortURL).''
		),
		'linkedin' => array(
			'icon' => 'ei-social_linkedin',
			'class' => 'linkedin',
			'link' => 'https://www.linkedin.com/shareArticle?mini=true&url='. esc_url($grada_shortURL) .'&title='. esc_attr($grada_shortTitle) .''
		),
		'pinterest' => array(
			'icon' => 'ei-social_pinterest',
			'class' => 'pinterest',
			'link' => 'https://pinterest.com/pin/create/button/?url='. esc_url($grada_shortURL) .'&description='. esc_attr($grada_shortTitle) .''
		)
	);

	$output[] = '<div class="social-network-links">';
	$output[] = '<h5>'. esc_html__('Share:', 'vara-plugin') .'</h5>';
	$output[] = '<ul>';
	foreach ($grada_social_array as $grada_social) {
		$output[] = '<li class='. $grada_social['class'] .'><a href='. $grada_social['link'] .'><i class="'. $grada_social['icon'] .'"></i></a></li>';
	}
	$output[] = '</ul>';
	$output[] = '</div>';

	echo implode(' ', $output);
}

/**
 * Register Portfolio Post Type
 */
function grada_register_portfolio_post_type($custom_post_type = '') {

	$post_name = $custom_post_type ? $custom_post_type : esc_html__('Portfolio', 'vara-plugin');

	// Post Type
	$labels = array(
		'name'                  => esc_html__($post_name, 'vara-plugin'),
		'singular_name'         => esc_html__($post_name . ' Item', 'vara-plugin'),
		'menu_name'             => esc_html_x($post_name, 'admin menu', 'vara-plugin'),
		'name_admin_bar'        => esc_html_x($post_name . ' Item', 'add new on admin bar', 'vara-plugin'),
		'add_new'               => esc_html__('Add New Item', 'vara-plugin'),
		'add_new_item'          => esc_html__('Add New ' . $post_name . ' Item', 'vara-plugin'),
		'new_item'              => esc_html__('Add New ' . $post_name . ' Item', 'vara-plugin'),
		'edit_item'             => esc_html__('Edit ' . $post_name . ' Item', 'vara-plugin'),
		'view_item'             => esc_html__('View Item', 'vara-plugin'),
		'all_items'             => esc_html__('All ' . $post_name . ' Items', 'vara-plugin'),
		'search_items'          => esc_html__('Search ' . $post_name . '', 'vara-plugin'),
		'parent_item_colon'     => esc_html__('Parent ' . $post_name . ' Item:', 'vara-plugin'),
		'not_found'             => esc_html__('No ' . strtolower($post_name) . ' items found', 'vara-plugin'),
		'not_found_in_trash'    => esc_html__('No ' . strtolower($post_name) . ' items found in trash', 'vara-plugin'),
		'filter_items_list'     => esc_html__('Filter ' . strtolower($post_name) . ' items list', 'vara-plugin'),
		'items_list_navigation' => esc_html__($post_name . ' items list navigation', 'vara-plugin'),
		'items_list'            => esc_html__($post_name . ' items list', 'vara-plugin')
	);

	$supports = array(
		'title',
		'editor',
		'excerpt',
		'thumbnail',
		'comments',
		'author',
		'custom-fields',
		'revisions',
	);

	$args = array(
		'labels'          => $labels,
		'supports'        => $supports,
		'public'          => true,
		'capability_type' => 'post',
		'rewrite'         => array('slug' => strtolower($post_name)), // Permalinks format
		'menu_position'   => 5,
		'menu_icon'       => (version_compare( $GLOBALS['wp_version'], '3.8', '>=')) ? 'dashicons-portfolio' : false,
		'has_archive'     => false
	);

	register_post_type('portfolio', $args);
}

function grada_register_portfolio_categories($custom_post_type = '') {
	$post_name = $custom_post_type ? $custom_post_type : esc_html__('Portfolio', 'vara-plugin');

	$labels = array(
		'name'                       => esc_html__($post_name . ' Categories', 'vara-plugin'),
		'singular_name'              => esc_html__($post_name . ' Category', 'vara-plugin'),
		'menu_name'                  => esc_html__($post_name . ' Categories', 'vara-plugin'),
		'edit_item'                  => esc_html__('Edit ' . $post_name . ' Category', 'vara-plugin'),
		'update_item'                => esc_html__('Update ' . $post_name . ' Category', 'vara-plugin'),
		'add_new_item'               => esc_html__('Add New ' . $post_name . ' Category', 'vara-plugin'),
		'new_item_name'              => esc_html__('New ' . $post_name . ' Category Name', 'vara-plugin'),
		'parent_item'                => esc_html__('Parent ' . $post_name . ' Category', 'vara-plugin'),
		'parent_item_colon'          => esc_html__('Parent ' . $post_name . ' Category:', 'vara-plugin'),
		'all_items'                  => esc_html__('All ' . $post_name . ' Categories', 'vara-plugin'),
		'search_items'               => esc_html__('Search ' . $post_name . ' Categories', 'vara-plugin'),
		'popular_items'              => esc_html__('Popular ' . $post_name . ' Categories', 'vara-plugin'),
		'separate_items_with_commas' => esc_html__('Separate ' . strtolower($post_name) . ' categories with commas', 'vara-plugin'),
		'add_or_remove_items'        => esc_html__('Add or remove ' . strtolower($post_name) . ' categories', 'vara-plugin'),
		'choose_from_most_used'      => esc_html__('Choose from the most used ' . strtolower($post_name) . ' categories', 'vara-plugin'),
		'not_found'                  => esc_html__('No ' . strtolower($post_name) . ' categories found.', 'vara-plugin'),
		'items_list_navigation'      => esc_html__($post_name . ' categories list navigation', 'vara-plugin'),
		'items_list'                 => esc_html__($post_name . ' categories list', 'vara-plugin'),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_tagcloud'     => true,
		'hierarchical'      => true,
		'rewrite'           => array('slug' => strtolower($post_name) . '-cat'),
		'show_admin_column' => true,
		'query_var'         => true,
	);

	register_taxonomy('project_cat', 'portfolio', $args);
}

function grada_register_portfolio_tags($custom_post_type = '') {
	$post_name = $custom_post_type ? $custom_post_type : esc_html__( 'Portfolio', 'vara-plugin' );

	$labels = array(
		'name'                       => esc_html__( $post_name . ' Tags', 'vara-plugin' ),
		'singular_name'              => esc_html__( $post_name . ' Tag', 'vara-plugin' ),
		'menu_name'                  => esc_html__( $post_name . ' Tags', 'vara-plugin' ),
		'search_items'               => esc_html__( 'Search ' . $post_name . ' Tags', 'vara-plugin' ),
		'all_items'                  => esc_html__( 'All ' . $post_name . ' Tags', 'vara-plugin' ),
		'parent_item'                => esc_html__( 'Parent ' . $post_name . ' Tag', 'vara-plugin' ),
		'parent_item_colon'          => esc_html__( 'Parent ' . $post_name . ' Tags:', 'vara-plugin' ),
		'edit_item'                  => esc_html__( 'Edit ' . $post_name . ' Tag', 'vara-plugin' ),
		'update_item'                => esc_html__( 'Update ' . $post_name . ' Tag', 'vara-plugin' ),
		'add_new_item'               => esc_html__( 'Add New ' . $post_name . ' Tag', 'vara-plugin' ),
		'new_item_name'              => esc_html__( 'New ' . $post_name . ' Tag Name', 'vara-plugin' ),
	);

	$args = array(
		'labels'            => $labels,
		'hierarchical'      => false,
		'show_ui'           => true,
		'query_var'         => true,
		'show_admin_column' => true,
		'rewrite'           => array('slug' => strtolower($post_name) . '-tag'),
	);

	register_taxonomy('project_tag', 'portfolio', $args );
}

function grada_custom_gallery_attachment() {
	$labels = array(
		'name'                       => esc_html__('Gallery Categories', 'vara-plugin'),
		'singular_name'              => esc_html__('Gallery Category', 'vara-plugin'),
		'menu_name'                  => esc_html__('Gallery Categories', 'vara-plugin'),
		'edit_item'                  => esc_html__('Edit Gallery Category', 'vara-plugin'),
		'update_item'                => esc_html__('Update Gallery Category', 'vara-plugin'),
		'add_new_item'               => esc_html__('Add New Gallery Category', 'vara-plugin'),
		'new_item_name'              => esc_html__('New Gallery Category Name', 'vara-plugin'),
		'parent_item'                => esc_html__('Parent Gallery Category', 'vara-plugin'),
		'parent_item_colon'          => esc_html__('Parent Gallery Category:', 'vara-plugin'),
		'all_items'                  => esc_html__('All Gallery Categories', 'vara-plugin'),
		'search_items'               => esc_html__('Search Gallery Categories', 'vara-plugin'),
		'popular_items'              => esc_html__('Popular Gallery Categories', 'vara-plugin'),
		'separate_items_with_commas' => esc_html__('Separate portfolio categories with commas', 'vara-plugin'),
		'add_or_remove_items'        => esc_html__('Add or remove media categories', 'vara-plugin'),
		'choose_from_most_used'      => esc_html__('Choose from the most used media categories', 'vara-plugin'),
		'not_found'                  => esc_html__('No media categories found.', 'vara-plugin'),
		'items_list_navigation'      => esc_html__('Gallery categories list navigation', 'vara-plugin'),
		'items_list'                 => esc_html__('Gallery categories list', 'vara-plugin'),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => false,
		'show_in_nav_menus' => false,
		'show_ui'           => true,
		'show_in_quick_edit'=> false,
		'meta_box_cb'       => false,
		'show_tagcloud'     => false,
		'hierarchical'      => false,
		'rewrite'           => array('slug' => 'gallery_category'),
		'show_admin_column' => false,
		'query_var'         => false,
	);

	register_taxonomy('gallery_category', 'attachment', $args);
}

/**
 * Elementor Setting to Customizer
 */
function grada_inherit_elementor_option($inherit, $customizer, $default_customizer) {
	$customizer = get_theme_mod($customizer, $default_customizer);

	if (empty($inherit)) {
		$inherit = '1';
	}

	if ($inherit == '1') {
		$inherit = $customizer;
	} else {
		$inherit = $inherit - 1;
	}

	return $inherit;
}

/**
 * Custom Post Types
 *
 * Enable post types by default.
 */
function grada_add_custom_post_type_support() {
	$grada_cpt_support = get_option('elementor_cpt_support');

	if(!$grada_cpt_support) {
		$grada_cpt_support = ['page', 'post', 'portfolio'];
		update_option('elementor_cpt_support', $grada_cpt_support);
	} elseif (!in_array('portfolio', $grada_cpt_support)) {
		$grada_cpt_support[] = 'portfolio';
		update_option('elementor_cpt_support', $grada_cpt_support);
	}
}
add_action('after_switch_theme', 'grada_add_custom_post_type_support');

/**
 * Function
 */
function grada_thumbnail_sizes() {
	// Preset Image Sizes
	$thumbnail_sizes = [
		'full' => 'full',
		'grada-img-size-square' => 'grada-img-size-square',
		'grada-img-size-medium' => 'grada-img-size-medium',
		'grada-img-size-tall' => 'grada-img-size-tall',
		'grada-img-size-large' => 'grada-img-size-large'
	];

	// Custom Image Sizes
	if (get_theme_mod('general_image_sizes')) {
		$index = 1;
		foreach (get_theme_mod('general_image_sizes') as $image_size) {
			$thumbnail_sizes[strtolower(wp_get_theme()->get('Name')) . '-image-size-' . $index] = strtolower(wp_get_theme()->get('Name')) . '-image-size-' . $index;
			$index++;
		}
	}

	// WordPress Default Image Sizes
	foreach (get_intermediate_image_sizes() as $image_size) {
		$thumbnail_sizes[$image_size] = $image_size;
	}

	return $thumbnail_sizes;
}

/**
 * Placeholder
 */
function grada_theme_placeholder() {
	echo '<img src=' . esc_url(GDS_THEME_PLACEHOLDER) . ' alt='. esc_attr__('Placeholder Image', 'vara-plugin') . '/>';
}

/**
 * HEX to RGBA
 *
 * Convert the normal hex to
 * rgba to easier use.
 */
function grada_hexToRgb($hex, $alpha = false) {
	$hex = str_replace('#', '', $hex);
	$length = strlen($hex);

	$rgb = [
		'r' => hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0)),
		'g' => hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0)),
		'b' => hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0))
	];

	if ($alpha == 'zero') {
		$rgb['a'] = 0;
	} elseif ($alpha) {
		$rgb['a'] = $alpha;
	}

	return implode(', ', $rgb);
}

/**
 * Color Lightness
 *
 * Pass a rgb color and get back
 * a hsl color, you can lighten
 * or darken via the fourth parameter
 * in the function from.
 */
function grada_color_lightness($rgb, $percentage = 0) {
	$r = $rgb[0];
	$g = $rgb[1];
	$b = $rgb[2];

	$r /= 255;
	$g /= 255;
	$b /= 255;

	$max = max($r, $g, $b);
	$min = min($r, $g, $b);

	$h; $s;

	$l = ($max + $min) / 2;
	$d = $max - $min;

	if ($d == 0) {
		$h = $s = 0;
	} else {
		$s = $d / (1 - abs(2 * $l - 1));
		switch ($max){
			case $r:
				$h = 60 * fmod( ( ( $g - $b ) / $d ), 6 );
				if ($b > $g) $h += 360;
				break;
			case $g:
				$h = 60 * ( ( $b - $r ) / $d + 2 );
				break;
			case $b:
				$h = 60 * ( ( $r - $g ) / $d + 4 );
				break;
		}
	}

	$output = [
		0 => round($h, 2),
		1 => round($s, 2) * 100,
		2 => round($l, 2) * 100
	];

	if ($percentage) {
		$output[2] += $percentage;
	}

	$output[1] .= '%';
	$output[2] .= '%';

	return implode(', ', $output);
}

/**
 * Get Elementor Templates.
 */
function grada_get_elementor_template($type) {
	$choices = [];

	$pages = get_posts( [
		'sort_column'    => 'post_title',
		'post_type'      => 'elementor_library',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'meta_query'     => [
			[
				'key'   => '_elementor_template_type',
				'value' => $type,
			],
		],
	] );

	foreach ( $pages as $page ) {
		$choices[ $page->ID ] = $page->post_title;
	}

	return $choices;
}

/**
 * Image Calculation
 *
 * A simple calculation which returns as padding
 * bottom the height of image, we use it to eleminate
 * the glitches of masonry when loading.
 */
function grada_image_aspect_ratio_calculation($image_id, $image_size = 'full') {
	$image_data = wp_get_attachment_image_src($image_id, $image_size);

	if (isset($image_data[2]) && isset($image_data[1])) {
		return 'padding-bottom: '. number_format($image_data[2] / $image_data[1] * 100, 6) .'% !important;';
	}
}

/**
 * Thumbnail Calculation
 *
 * A simple calculation which returns as padding
 * bottom the height of image, we use it to eleminate
 * the glitches of masonry when loading.
 */
function grada_thumbnail_calculation($thumbnail = 'full') {
	global $post;

	$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $thumbnail);

	if (isset($image_data[2]) && isset($image_data[1])) {
		return 'padding-bottom: '. number_format($image_data[2] / $image_data[1] * 100, 6) .'% !important;';
	}
}


/**
 * Attachment Alt
 *
 * Simply gets the attachment alt with the
 * id of image and returns it.
 */
function grada_get_attachment_alt($image_id) {
	return get_post_meta($image_id, '_wp_attachment_image_alt', true);
}

/**
 * Custom Fonts Media
 */
function grada_custom_fonts_styles() {
	if (!get_theme_mod('custom_fonts')) {
		return;
	}

	$grada_inline_style = [];

	foreach (get_theme_mod('custom_fonts') as $font) {
		$font_slug = isset($font['font_name']) ? $font['font_name'] : '';
		$font_label = isset($font['font_name']) ? $font['font_name'] : '';

		if (isset($font['font_ttf'])) {
			$font_url = $font['font_ttf'];
		} elseif (isset($font['font_woff'])) {
			$font_url = $font['font_woff'];
		}

		$grada_inline_style[] = '
            @font-face {
                font-family: "'. $font_slug .'";
                src: url('. $font_url .');
                font-weight: normal;
                font-style: normal;
            }
        ';
	}

	return $grada_inline_style;
}

/**
 * Allow SVG File Upload
 */
add_filter( 'upload_mimes', 'grada_allow_svg' );
function grada_allow_svg($mimes) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';

	return $mimes;
}