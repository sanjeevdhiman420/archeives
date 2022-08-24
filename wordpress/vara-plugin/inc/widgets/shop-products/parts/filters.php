<?php
/**
 * Posts Filters
 */
if (!$settings['products_filters_visibility'] || $settings['products_filters_visibility'] == 'no' || $settings['products_layout'] == 'carousel') {
	return;
}
$products_filters_class = ['gs-filters'];

/**
 * Query Filters
 */
if ($settings['products_layout_type'] == 'metro') {
	$grada_products_normal_query = $settings['products_filters_query_product'];
}

/**
 * All Filter
 */
if ($settings['products_filters_filter_all_string']) {
	$grada_products_filter_all = $settings['products_filters_filter_all_string'];
} else {
	$grada_products_filter_all = esc_html__('All', 'vara-plugin');
}

/**
 * Filters Alignment
 */
if ($settings['products_style_filters_alignment'] == 'center') {
	$products_filters_class[] = 'gs-text-center';
} elseif ($settings['products_style_filters_alignment'] == 'right') {
	$products_filters_class[] = 'gs-text-right';
}
?>
<div class="<?php echo esc_attr(implode(' ', $products_filters_class)) ?>">
	<ul id="filters">
		<?php if ($settings['products_filters_filter_all']) : ?>
			<li class="active" data-filter="*"><a><?php echo esc_attr($grada_products_filter_all) ?></a></li>
		<?php endif; ?>
		<?php
		if ($grada_products_normal_query) {
			foreach ($grada_products_normal_query as $term) {
				$term_info = get_term_by('slug', $term, $grada_products_taxonomy);
				echo '<li data-filter=".'. esc_attr($term_info->slug) .'"><a>'. esc_attr($term_info->name) .'</a></li>';
			}
		} else {
			foreach (get_terms($grada_products_taxonomy) as $term) {
				echo '<li data-filter=".'. esc_attr($term->slug) .'"><a>'. esc_attr($term->name) .'</a></li>';
			}
		}
		?>
	</ul>
</div>