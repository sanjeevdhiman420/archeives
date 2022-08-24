<?php
/**
 * Posts Filters
 */
if (!$settings['gallery_images_filters_visibility'] || $settings['gallery_images_filters_visibility'] == 'no' || $settings['gallery_images_layout'] == 'carousel') {
	return;
}
$gallery_images_filters_class = ['gs-filters'];

/**
 * All Filter
 */
if ($settings['gallery_images_filters_filter_all_string']) {
	$grada_gallery_images_filter_all = $settings['gallery_images_filters_filter_all_string'];
} else {
	$grada_gallery_images_filter_all = esc_html__('All', 'vara-plugin');
}

/**
 * Filters Alignment
 */
if ($settings['gallery_images_style_filters_alignment'] == 'center') {
	$gallery_images_filters_class[] = 'gs-text-center';
} elseif ($settings['gallery_images_style_filters_alignment'] == 'right') {
	$gallery_images_filters_class[] = 'gs-text-right';
}
?>
<div class="<?php echo esc_attr(implode(' ', $gallery_images_filters_class)) ?>">
	<ul id="filters">
		<?php if ($settings['gallery_images_filters_filter_all']) : ?>
			<li class="active" data-filter="*"><a><?php echo esc_attr($grada_gallery_images_filter_all) ?></a></li>
		<?php endif; ?>
		<?php
		if ($settings['gallery_images_filters']) {
			foreach ($settings['gallery_images_filters'] as $term) {
				$term_info = get_term_by('slug', $term, 'gallery_category');
				echo '<li data-filter=".'. esc_attr($term_info->slug) .'"><a>'. esc_attr($term_info->name) .'</a></li>';
			}
		} else {
			foreach (get_terms('gallery_category') as $term) {
				echo '<li data-filter=".'. esc_attr($term->slug) .'"><a>'. esc_attr($term->name) .'</a></li>';
			}
		}
		?>
	</ul>
</div>