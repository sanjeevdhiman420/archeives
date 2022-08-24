<?php
/**
 * Posts Filters
 */
if (!$settings['portfolio_filters_visibility'] || $settings['portfolio_filters_visibility'] == 'no' || $settings['portfolio_layout'] == 'carousel') {
	return;
}
$portfolio_filters_class = ['gs-filters'];

/**
 * Query Filters
 */
if ($settings['portfolio_layout_type'] == 'metro' || !empty($settings['portfolio_filters_query_portfolio'])) {
	$grada_portfolio_normal_query = $settings['portfolio_filters_query_portfolio'];
}

/**
 * All Filter
 */
if ($settings['portfolio_filters_filter_all_string']) {
	$grada_portfolio_filter_all = $settings['portfolio_filters_filter_all_string'];
} else {
	$grada_portfolio_filter_all = esc_html__('All', 'vara-plugin');
}
?>
<div class="<?php echo esc_attr(implode(' ', $portfolio_filters_class)) ?>">
    <?php if (!empty($settings['filter_title']) && $settings['portfolio_filters_left'] == 'yes' ) : ?>
        <h4><?php echo esc_html($settings['filter_title']); ?></h4>
    <?php endif; ?>
	<ul id="filters">
		<?php if ($settings['portfolio_filters_filter_all']) : ?>
			<li><a href="#" class="active" data-filter="*"><?php echo esc_attr($grada_portfolio_filter_all) ?></a></li>
		<?php endif; ?>
		<?php
            if ($grada_portfolio_normal_query) {
                foreach ($grada_portfolio_normal_query as $term) {
                    $term_info = get_term_by('slug', $term, 'project_cat');
                    echo '<li><a href="#" data-filter=".'. esc_attr($term_info->slug) .'">'. esc_attr($term_info->name) .'</a></li>';
                }
            } else {
                foreach (get_terms('project_cat') as $term) {
                    echo '<li><a href="#" data-filter=".'. esc_attr($term->slug) .'">'. esc_attr($term->name) .'</a></li>';
                }
            }
		?>
	</ul>
</div>