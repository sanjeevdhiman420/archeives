<?php
/**
 * Shop Top Bar
 */

/**
 * Result Count
 */
$grada_result_count_args = [
	'total'    => $query->found_posts,
	'per_page' => $settings['products_ppp'] ? $settings['products_ppp'] : 10,
	'current'  => $args['paged'],
];

/**
 * Result Count
 */
$grada_result_count = $settings['products_meta_results_count'];
$grada_result_count_class = 'col-sm-6';

/**
 * Catalog Ordering
 */
$grada_catalog_ordering = $settings['products_meta_catalog_ordering'];
$grada_catalog_ordering_class = 'col-sm-6';

$grada_catalog_ordering == 'no' || !$grada_catalog_ordering ? $grada_result_count_class = 'col-12' : '';
$grada_result_count == 'no' || !$grada_result_count ? $grada_catalog_ordering_class = 'col-12' : '';

if ($grada_result_count == 'yes' || $grada_catalog_ordering == 'yes') :
	?>
	<div class="gs-shop-header medium-pb">
		<div class="row align-items-center">
			<?php if ($grada_result_count == 'yes') : ?>
				<div class="<?php echo esc_attr($grada_result_count_class) ?>">
					<?php wc_get_template('loop/result-count.php', $grada_result_count_args) ?>
				</div>
			<?php endif; ?>
			<?php if ($grada_catalog_ordering == 'yes') : ?>
				<div class="<?php echo esc_attr($grada_catalog_ordering_class) ?>">
					<?php
					wc_get_template('loop/orderby.php', array(
						'catalog_orderby_options' => $catalog_orderby_options,
						'orderby' => $orderby,
						'show_default_orderby' => $show_default_orderby,
					));
					?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>