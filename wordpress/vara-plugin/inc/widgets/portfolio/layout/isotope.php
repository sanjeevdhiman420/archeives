<?php
/**
 * Posts Layout Isotope
 */
$grada_masonry_class = ['row', 'isotope-container'];

/**
 * Layout Type Model
 */
switch ($settings['portfolio_layout_type']) {
	case 'fitrows':
		$grada_masonry_class[] = 'fitRows';
		break;
	case 'justified':
		$grada_masonry_class[] = 'justified';
		break;
}

/**
 * Posts Columns
 *
 * It changes the columns via the selector
 * item class, option can be inherited too.
 */
$grada_selector_class = 'iso-item';

if (isset($settings['portfolio_columns']) && $settings['portfolio_layout_type'] != 'justified') {
	switch ($settings['portfolio_columns']) {
		case '1-column':
			$grada_selector_class .= ' col-lg-12';
			break;
		case '2-columns':
			$grada_selector_class .= ' col-lg-6';
			break;
		default:
			$grada_selector_class .= ' col-lg-4';
			break;
		case '4-columns':
			$grada_selector_class .= ' col-lg-3';
			break;
		case '5-columns':
			$grada_selector_class .= ' gs-col-lg-5';
			break;
		case '6-columns':
			$grada_selector_class .= ' col-lg-2';
			break;
	}
}

if (isset($settings['portfolio_columns_tablet']) && $settings['portfolio_layout_type'] != 'justified') {
	switch ($settings['portfolio_columns_tablet']) {
		case '1-column':
			$grada_selector_class .= ' col-md-12';
			break;
		default:
			$grada_selector_class .= ' col-md-6';
			break;
		case '3-columns':
			$grada_selector_class .= ' col-md-4';
			break;
		case '4-columns':
			$grada_selector_class .= ' col-md-3';
			break;
		case '5-columns':
			$grada_selector_class .= ' gs-col-md-5';
			break;
		case '6-columns':
			$grada_selector_class .= ' col-md-2';
			break;
	}
}

if (isset($settings['portfolio_columns_mobile']) && $settings['portfolio_layout_type'] != 'justified') {
	switch ($settings['portfolio_columns_mobile']) {
		default:
			$grada_selector_class .= ' col-12';
			break;
		case '2-columns':
			$grada_selector_class .= ' col-6';
			break;
		case '3-columns':
			$grada_selector_class .= ' col-4';
			break;
		case '4-columns':
			$grada_selector_class .= ' col-3';
			break;
		case '5-columns':
			$grada_selector_class .= ' gs-col-5';
			break;
		case '6-columns':
			$grada_selector_class .= ' col-2';
			break;
	}
}

/**
 * Animation & WOW Delay
 */
$grada_data_wow_delay = false;
$grada_data_wow_seconds = 0;

if ($settings['portfolio_animation'] != 'none') {
	$grada_portfolio_item_class .= ' wow ' . $settings['portfolio_animation'];

	$grada_data_wow_delay = $settings['portfolio_animation_delay'] == 'yes' ? true : false;
}

/**
 * Meta
 */
set_query_var('grada_portfolio_meta_thumbnail', $settings['portfolio_meta_thumbnail']);
set_query_var('grada_portfolio_meta_title', $settings['portfolio_meta_title']);
set_query_var('grada_portfolio_meta_categories', $settings['portfolio_meta_categories']);

?>

<div class="<?php echo esc_attr(implode(' ', $grada_masonry_class)) ?>" data-entries-source="<?php echo md5($this->get_id()); ?>">
	<?php while ($query->have_posts()) : $query->the_post(); ?>
		<?php
		/**
		 * WOW Animation
		 */
		$grada_data_wow_seconds == 12 ? $grada_data_wow_seconds = 0 : '';
		$grada_wow_holder = "data-wow-delay=". $grada_data_wow_seconds/10 ."s";

		/**
		 * Metro Column
		 */
		if ($grada_portfolio_metro_query && $settings['portfolio_layout_type'] == 'metro') {
			$grada_selector_class = 'iso-item';
			foreach ($grada_portfolio_metro_query as $item) {
				if (get_the_ID() == $item['post_id']) {
					switch ($item['portfolio_column']) {
						case '1-column':
							$grada_selector_class .= ' col-md-6 col-lg-1';
							break;
						case '2-column':
							$grada_selector_class .= ' col-md-6 col-lg-2';
							break;
						default:
							$grada_selector_class .= ' col-md-6 col-lg-3';
							break;
						case '4-column':
							$grada_selector_class .= ' col-md-6 col-lg-4';
							break;
						case '5-column':
							$grada_selector_class .= ' col-md-6 col-lg-5';
							break;
						case '6-column':
							$grada_selector_class .= ' col-md-6';
							break;
						case '7-column':
							$grada_selector_class .= ' col-md-7';
							break;
						case '8-column':
							$grada_selector_class .= ' col-md-8';
							break;
						case '9-column':
							$grada_selector_class .= ' col-md-9';
							break;
						case '10-column':
							$grada_selector_class .= ' col-md-10';
							break;
						case '11-column':
							$grada_selector_class .= ' col-md-11';
							break;
						case '12-column':
							$grada_selector_class .= ' col-12';
							break;
					}
				}
			}
		}

		/**
		 * Portfolio List
		 */
		if ( $settings['portfolio_layout_model'] == 'list' ) {
			$grada_selector_class .= ' iso-item col-12';
        }

		/**
		 * Terms
		 *
		 * Get the terms that are
		 * attached to the post.
		 */
		$terms = get_the_terms(get_the_ID(), $grada_portfolio_taxonomy);
		$terms_array_imp = '';
		if ($terms) {
			$terms_array = array();
			foreach ($terms as $cat) {
				$terms_array[] = $cat->slug;
			}
			$terms_array_imp = implode(' ', $terms_array);
		}

		?>
		<article <?php post_class($grada_selector_class . ' ' . $terms_array_imp) ?> id="id-<?php the_ID() ?>" data-col-num="<?php echo esc_attr(isset($settings['portfolio_columns']) ? $settings['portfolio_columns'] : '') ?>" data-entry-id="<?php the_ID() ?>">
			<div class="entry-holder <?php echo esc_attr($grada_portfolio_item_class) ?>" <?php echo esc_attr($grada_data_wow_delay === true && $grada_data_wow_seconds ? $grada_wow_holder : '') ?>>
				<?php
				/**
				 * Layout Type
				 */
				if ( $settings['portfolio_layout_model'] == 'text-follow' ) {
					include(__DIR__ . '/../type/text-follow.php');
                } else {
					get_template_part('tpls/portfolio/style/' . $settings['portfolio_layout_model'] );
                }
				?>
			</div>
		</article>
		<?php $grada_data_wow_seconds = $grada_data_wow_seconds + 2; endwhile; ?>
</div>

<?php include(__DIR__ . '/../parts/pagination.php') ?>

<?php if (\Elementor\Plugin::$instance->editor->is_edit_mode() && ($settings['portfolio_layout_type'] == 'masonry' || $settings['portfolio_layout_type'] == 'metro')) : ?>
	<script>
        (function($) {
            var $masonry = $('.isotope-container[data-entries-source=<?php echo md5($this->get_id()); ?>]');

            if ($masonry.length) {
                $masonry.isotope({
                    layoutMode: 'packery',
                    itemSelector: '.iso-item'
                });
            }

            window.dispatchEvent(new Event('resize'));
        })(jQuery);
	</script>
<?php endif; ?>

<?php if (\Elementor\Plugin::$instance->editor->is_edit_mode() && $settings['portfolio_layout_type'] == 'justified') : ?>
	<script>
        (function($) {
            var $justified = $('.justified[data-entries-source=<?php echo md5($this->get_id()); ?>]');

            if ($justified.length) {

                $justified.justifiedGallery({
                    rowHeight: <?php echo esc_attr($settings['justified_height']) ?>,
                    margins: 0,
                    selector: '.iso-item',
                    imgSelector: '.entry-image-ratio img',
                    captions: false,
                    waitThumnbailsLoad: false,
                    lastRow: '<?php echo esc_attr($settings['justified_last_row']) ?>'
                });
            }

            window.dispatchEvent(new Event('resize'));
        })(jQuery);
	</script>
<?php endif; ?>
