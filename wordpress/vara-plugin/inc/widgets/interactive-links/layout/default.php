<?php
/**
 * Interactive Posts - Inline
 */
$index = 1;

/**
 * Animation & WOW Delay
 */
$grada_interactive_animation = $settings['portfolio_animation'];
$grada_interactive_item_holder_class = 'text-showcase-item';
$grada_interactive_holder_class = 'gs-overflow-hidden';
$grada_interactive_item_class = '';

$grada_data_wow_delay = false;
$grada_data_wow_seconds = 0;

if ($settings['portfolio_animation'] != 'none') {
	$grada_interactive_item_class .= ' wow ' . $settings['portfolio_animation'];

	$grada_data_wow_delay = $settings['animation_delay'] == 'yes' ? true : false;
}

/**
 * Columns
 *
 * It changes the columns via the selector
 * item class, option can be inherited too.
 */
if ($settings['layout'] == 'block') {
	$grada_interactive_item_holder_class .= ' iso-item';
	$grada_interactive_holder_class .= ' row isotope-container';
	if (isset($settings['columns'])) {
		switch ($settings['columns']) {
			case '1-column':
				$grada_interactive_item_holder_class .= ' col-lg-12';
				break;
			case '2-columns':
				$grada_interactive_item_holder_class .= ' col-lg-6';
				break;
			default:
				$grada_interactive_item_holder_class .= ' col-lg-4';
				break;
			case '4-columns':
				$grada_interactive_item_holder_class .= ' col-lg-3';
				break;
			case '5-columns':
				$grada_interactive_item_holder_class .= ' gs-col-lg-5';
				break;
			case '6-columns':
				$grada_interactive_item_holder_class .= ' col-lg-2';
				break;
		}
	}

	if (isset($settings['columns_tablet'])) {
		switch ($settings['columns_tablet']) {
			case '1-column':
				$grada_interactive_item_holder_class .= ' col-md-12';
				break;
			default:
				$grada_interactive_item_holder_class .= ' col-md-6';
				break;
			case '3-columns':
				$grada_interactive_item_holder_class .= ' col-md-4';
				break;
			case '4-columns':
				$grada_interactive_item_holder_class .= ' col-md-3';
				break;
			case '5-columns':
				$grada_interactive_item_holder_class .= ' gs-col-md-5';
				break;
			case '6-columns':
				$grada_interactive_item_holder_class .= ' col-md-2';
				break;
		}
	}

	if (isset($settings['columns_mobile'])) {
		switch ($settings['columns_mobile']) {
			default:
				$grada_interactive_item_holder_class .= ' col-12';
				break;
			case '2-columns':
				$grada_interactive_item_holder_class .= ' col-6';
				break;
			case '3-columns':
				$grada_interactive_item_holder_class .= ' col-4';
				break;
			case '4-columns':
				$grada_interactive_item_holder_class .= ' col-3';
				break;
			case '5-columns':
				$grada_interactive_item_holder_class .= ' gs-col-5';
				break;
			case '6-columns':
				$grada_interactive_item_holder_class .= ' col-2';
				break;
		}
	}
}

/**
 * Separator Visibility
 */
if (!$settings['separator_visibility']) {
	$grada_interactive_item_holder_class .= ' no-divider';
}
?>
<div class="<?php echo esc_attr($grada_interactive_holder_class);?>">
	<?php while ($query->have_posts()) : $query->the_post(); ?>
		<?php
		/**
		 * WOW Animation
		 */
		$grada_data_wow_seconds == 12 ? $grada_data_wow_seconds = 0 : '';
		$grada_wow_holder = "data-wow-delay=". $grada_data_wow_seconds/10 ."s";

		/**
		 * Terms
		 *
		 * Get the terms that are
		 * attached to the post.
		 */
		$terms = get_the_terms(get_the_ID(), $grada_posts_taxonomy);
		$terms_array_imp = '';
		if ($terms) {
			$terms_array = array();
			foreach ($terms as $cat) {
				$terms_array[] = $cat->name;
			}
			$terms_array_imp = implode(' ', $terms_array);
		}
		?>
		<div <?php post_class($grada_interactive_item_holder_class) ?> data-selector="<?php the_ID() ?>">
			<div class="text-showcase-item-inner <?php echo esc_attr($grada_interactive_item_class) ?>" <?php echo esc_attr($grada_data_wow_delay === true && $grada_data_wow_seconds ? $grada_wow_holder : '') ?>>
				<?php
                    // Categories
                    if ($terms_array_imp && $settings['category_visibility'] == 'yes') {
                        ?>
                        <span class="category"><?php echo $terms_array_imp ?></span>
                        <?php
                    }
				?>
                <?php
                    echo sprintf( '<%1$s class="%2$s"><a href="%3$s">%4$s</a></%1$s>',
                        $settings['html_tag'],
                        'text-showcase-title',
                        get_the_permalink(),
                        get_the_title()
                    );
                ?>
			</div>
			<?php
			if (has_post_thumbnail()) {
				the_post_thumbnail();
			} else {
				grada_theme_placeholder();
			}
			?>
		</div>
	<?php $grada_data_wow_seconds = $grada_data_wow_seconds + 2; $index++; endwhile; ?>
</div>
