<?php
/**
 * Catalog Orderby
 */
$orderby_options = [
	'menu_order' => esc_html__('Default sorting', 'vara-plugin'),
	'popularity' => esc_html__('Sort by popularity', 'vara-plugin'),
	'rating'     => esc_html__('Sort by average rating', 'vara-plugin'),
	'date'       => esc_html__('Sort by newness', 'vara-plugin'),
	'price'      => esc_html__('Sort by price: low to high', 'vara-plugin'),
	'price-desc' => esc_html__('Sort by price: high to low', 'vara-plugin')
];

$catalog_orderby_options = apply_filters('woocommerce_catalog_orderby', $orderby_options);

/**
 * Change default order
 */

if (isset($_GET['orderby'])) {
	$orderby = wc_clean(wp_unslash($_GET['orderby']));
	$show_default_orderby = 'default';
} else {
	switch ($settings['products_meta_ordering_default']) {
		default:
			$show_default_orderby = $orderby = 'menu_order';
			break;
		case 'popularity':
			$show_default_orderby = $orderby = 'popularity';
			break;
		case 'rating':
			$show_default_orderby = $orderby = 'rating';
			break;
		case 'date':
			$show_default_orderby = $orderby = 'date';
			break;
		case 'price':
			$show_default_orderby = $orderby = 'price';
			break;
		case 'price-desc':
			$show_default_orderby = $orderby = 'price-desc';
			break;
	}
}

/**
 * Modify Query for Orderby
 */
switch ($orderby) {
	case 'default':
		$args['orderby'] = 'menu_order';
		$args['order'] = 'asc';
		break;
	case 'popularity':
		$args['orderby'] = 'meta_value_num';
		$args['meta_key'] = 'total_sales';
		$args['order'] = 'desc';
		break;
	case 'rating':
		$args['orderby'] = 'meta_value_num';
		$args['meta_key'] = '_wc_average_rating';
		$args['order'] = 'desc';
		break;
	case 'date':
		$args['orderby'] = 'date';
		$args['meta_key'] = '';
		$args['order'] = 'desc';
		break;
	case 'price':
		$args['orderby'] = 'meta_value_num';
		$args['meta_key'] = '_price';
		$args['order'] = 'asc';
		break;
	case 'price-desc':
		$args['orderby'] = 'meta_value_num';
		$args['meta_key'] = '_price';
		$args['order'] = 'desc';
		break;
}
