<?php
/**
 * Posts Pagination
 */
if (!$settings['products_pagination_visibility'] || $settings['products_layout'] == 'carousel' && function_exists('grada_paging_navigation')) {
	return;
}

$grada_show_more_text = esc_html__('Show More', 'vara-plugin');
$grada_show_more_button_holder_class = ['show-more-pagination'];
$grada_show_more_button_class = ['gs-btn gs-btn-regular gs-btn-accent', 'show-more-button'];

/**
 * Hover Animation
 */
if ($settings['products_style_pagination_hover_animation']) {
	$grada_show_more_button_class[] = 'elementor-animation-' . $settings['products_style_pagination_hover_animation'];
}

/**
 * Alignment
 */
if ($settings['products_style_pagination_alignment'] == 'center') {
	$grada_show_more_button_holder_class[] = 'gs-text-center';
} elseif ($settings['products_style_pagination_alignment'] == 'right') {
	$grada_show_more_button_holder_class[] = 'gs-text-right';
}
?>
<?php
if ($settings['products_pagination_style'] == 'normal') {
	grada_paging_navigation($query);
} elseif ($query->max_num_pages > $paged) { ?>
	<div class="<?php echo esc_attr(implode(' ', $grada_show_more_button_holder_class)) ?>">
		<a href="#" class="<?php echo esc_attr(implode(' ', $grada_show_more_button_class)) ?>" data-text="<?php echo esc_attr($grada_show_more_text) ?>"><?php echo esc_attr($grada_show_more_text) ?></a>
	</div>
<?php }
