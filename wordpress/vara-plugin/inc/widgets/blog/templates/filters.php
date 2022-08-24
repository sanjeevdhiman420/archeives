<?php
/**
 * Posts Filters
 */
if (!$settings['posts_filters_visibility'] || $settings['posts_filters_visibility'] == 'no' || $settings['posts_layout'] == 'carousel') {
	return;
}
$posts_filters_class = ['gs-filters'];

/**
 * Query Filters
 */
if ($settings['posts_layout_type'] == 'metro') {
	$grada_posts_normal_query = $settings['posts_filters_query_post'];
}

/**
 * All Filter
 */
if ($settings['posts_filters_filter_all_string']) {
	$grada_posts_filter_all = $settings['posts_filters_filter_all_string'];
} else {
	$grada_posts_filter_all = esc_html__('All', 'vara-plugin');
}

/**
 * Filters Alignment
 */
if ($settings['posts_style_filters_alignment'] == 'center') {
	$posts_filters_class[] = 'gs-text-center';
} elseif ($settings['posts_style_filters_alignment'] == 'right') {
	$posts_filters_class[] = 'gs-text-right';
}
?>
<div class="<?php echo esc_attr(implode(' ', $posts_filters_class)) ?>">
	<ul id="filters">
		<?php if ($settings['posts_filters_filter_all']) : ?>
			<li class="active" data-filter="*"><a><?php echo esc_attr($grada_posts_filter_all) ?></a></li>
		<?php endif; ?>
		<?php
		if ($grada_posts_normal_query) {
			foreach ($grada_posts_normal_query as $term) {
				$term_info = get_term_by('slug', $term, $grada_posts_taxonomy);
				echo '<li data-filter=".'. esc_attr($term_info->slug) .'"><a>'. esc_attr($term_info->name) .'</a></li>';
			}
		} else {
			foreach (get_terms($grada_posts_taxonomy) as $term) {
				echo '<li data-filter=".'. esc_attr($term->slug) .'"><a>'. esc_attr($term->name) .'</a></li>';
			}
		}
		?>
	</ul>
</div>