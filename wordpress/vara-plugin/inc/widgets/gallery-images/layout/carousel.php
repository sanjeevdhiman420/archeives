<?php
/**
 * Media Gallery Layout Carousel
 */

/**
 * Animation & WOW Delay
 */
$grada_data_wow_delay = false;
$grada_data_wow_seconds = 0;
$grada_posts_item_class = 'gs-gallery-item';

if ($settings['gallery_images_animation'] != 'none') {
	if ($settings['gallery_images_animation_delay'] == 'yes' && !\Elementor\Plugin::$instance->editor->is_edit_mode()) {
		$grada_data_wow_delay = true;
		$grada_posts_item_class .= $settings['gallery_images_carousel_stage_padding'] ? ' wow ' . $settings['gallery_images_animation'] : ' wow init-anim';
	} elseif ($settings['gallery_images_animation_delay'] != 'yes') {
		$grada_posts_item_class .= ' wow ' . $settings['gallery_images_animation'];
	}
}

$grada_gallery_id = 'gs-gallery-' . uniqid();

?>
<div id="<?php echo esc_attr($grada_gallery_id); ?>" class="owl-carousel owl-theme" data-animation="<?php echo esc_attr($settings['gallery_images_animation']) ?>" data-wow="<?php echo esc_attr($settings['gallery_images_animation_delay']) ?>">
	<?php foreach ($grada_gallery_images_query as $gallery_item) : ?>
		<?php
		/**
		 * WOW Animation
		 */
		if ($settings['gallery_images_carousel_items'] == 2 && $grada_data_wow_seconds == 4) {
			$grada_data_wow_seconds = 0;
		} elseif ($settings['gallery_images_carousel_items'] == 3 && $grada_data_wow_seconds == 6) {
			$grada_data_wow_seconds = 0;
		} elseif ($settings['gallery_images_carousel_items'] == 4 && $grada_data_wow_seconds == 8) {
			$grada_data_wow_seconds = 0;
		} elseif ($settings['gallery_images_carousel_items'] == 5 && $grada_data_wow_seconds == 10) {
			$grada_data_wow_seconds = 0;
		} elseif ($settings['gallery_images_carousel_items'] == 6 && $grada_data_wow_seconds == 12) {
			$grada_data_wow_seconds = 0;
		}

		$grada_wow_holder = "data-wow-delay=". $grada_data_wow_seconds/10 ."s";
		?>
        <div class="<?php echo esc_attr($grada_posts_item_class) ?>" <?php echo esc_attr($grada_data_wow_delay === true && $grada_data_wow_seconds ? $grada_wow_holder : '') ?>>
	        <?php
	        if ($settings['gallery_images_layout_model'] == 'info-overlay' ) {
		        include(__DIR__ . '/../type/overlay.php');
	        } else {
		        include(__DIR__ . '/../type/bottom.php');
	        }
	        ?>
        </div>
    <?php $grada_data_wow_seconds = $grada_data_wow_seconds + 2; endforeach; ?>
</div>
<script type="text/javascript">
    jQuery(function ($) {
        var owl = $('#<?php echo esc_attr($grada_gallery_id); ?>');
        var isRtl = $('body').hasClass('rtl') ? true : false;

        owl.owlCarousel({
            items: <?php echo esc_attr($settings['gallery_images_carousel_items_mobile'] ? $settings['gallery_images_carousel_items_mobile'] : '1') ?>,
            margin: <?php echo esc_attr($settings['gallery_images_carousel_margin_mobile'] ? $settings['gallery_images_carousel_margin_mobile'] : '10') ?>,
            rtl: isRtl,
            autoHeight: <?php echo esc_attr($settings['gallery_images_carousel_height'] == '1' ? 'true' : 'false') ?>,
            loop: <?php echo esc_attr($settings['gallery_images_carousel_loop'] === 'yes' ? 'true' : 'false') ?>,
            mouseDrag: <?php echo esc_attr($settings['gallery_images_carousel_mouse_drag'] === 'yes' ? 'true' : 'false') ?>,
            touchDrag: <?php echo esc_attr($settings['gallery_images_carousel_touch_drag'] === 'yes' ? 'true' : 'false') ?>,
            stagePadding: <?php echo esc_attr($settings['gallery_images_carousel_stage_padding_mobile'] ? $settings['gallery_images_carousel_stage_padding_mobile'] : '0') ?>,
            startPosition: <?php echo esc_attr($settings['gallery_images_carousel_start_position'] ? $settings['gallery_images_carousel_start_position'] : '0') ?>,
            nav: <?php echo esc_attr($settings['gallery_images_carousel_navigation'] === 'yes' ? 'true' : 'false') ?>,
            navText: [
                '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19 12H5" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 19L5 12L12 5" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 12H19" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 5L19 12L12 19" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            ],
            dots: <?php echo esc_attr($settings['gallery_images_carousel_dots'] === 'yes' ? 'true' : 'false') ?>,
            autoplay: <?php echo esc_attr($settings['gallery_images_carousel_autoplay'] === 'yes' ? 'true' : 'false') ?>,
            autoplayTimeout: <?php echo esc_attr($settings['gallery_images_carousel_autoplay_timeout'] ? $settings['gallery_images_carousel_autoplay_timeout'] * 1000 : '2000') ?>,
            autoplayHoverPause: <?php echo esc_attr($settings['gallery_images_carousel_pause'] === 'yes' ? 'true' : 'false') ?>,
            smartSpeed: <?php echo esc_attr($settings['gallery_images_carousel_smart_speed'] ? $settings['gallery_images_carousel_smart_speed'] * 100 : '450') ?>,
            responsive:{
                768:{
                    items: <?php echo esc_attr($settings['gallery_images_carousel_items_tablet'] ? $settings['gallery_images_carousel_items_tablet'] : '2') ?>,
                    margin: <?php echo esc_attr($settings['gallery_images_carousel_margin_tablet'] ? $settings['gallery_images_carousel_margin_tablet'] : '5') ?>,
                    stagePadding: <?php echo esc_attr($settings['gallery_images_carousel_stage_padding_tablet'] ? $settings['gallery_images_carousel_stage_padding_tablet'] : '0') ?>
                },
                992:{
                    items: <?php echo esc_attr($settings['gallery_images_carousel_items'] ? $settings['gallery_images_carousel_items'] : '0') ?>,
                    margin: <?php echo esc_attr($settings['gallery_images_carousel_margin'] ? $settings['gallery_images_carousel_margin'] : '0') ?>,
                    stagePadding: <?php echo esc_attr($settings['gallery_images_carousel_stage_padding'] ? $settings['gallery_images_carousel_stage_padding'] : '0') ?>
                }
            }
        });
    });
</script>