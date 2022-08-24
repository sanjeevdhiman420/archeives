<?php
/**
 * Posts Layout Carousel
 */

/**
 * Animation & WOW Delay
 */
$grada_data_wow_delay = false;
$grada_data_wow_seconds = 0;

if ($settings['posts_animation'] != 'none') {
	if ($settings['posts_animation_delay'] == 'yes' && !\Elementor\Plugin::$instance->editor->is_edit_mode()) {
		$grada_data_wow_delay = true;
		$grada_posts_item_class .= $settings['posts_carousel_stage_padding'] ? ' wow ' . $settings['posts_animation'] : ' wow init-anim';
	} elseif ($settings['posts_animation_delay'] != 'yes') {
		$grada_posts_item_class .= ' wow ' . $settings['posts_animation'];
	}
}

if ( has_post_thumbnail() ) {
	$grada_posts_item_class .= ' has-post-thumbnail';
}

$blog_carusel_id = uniqid( 'gs-blog-carousel-' );

?>
<div class="owl-carousel owl-theme" id="<?php echo esc_attr( $blog_carusel_id ); ?>" data-animation="<?php echo esc_attr($settings['posts_animation']) ?>" data-wow="<?php echo esc_attr($settings['posts_animation_delay']) ?>">

	<?php while ($query->have_posts()) : $query->the_post(); ?>
		<?php
		/**
		 * WOW Animation
		 */
		if ($settings['posts_carousel_items'] == 2 && $grada_data_wow_seconds == 4) {
			$grada_data_wow_seconds = 0;
		} elseif ($settings['posts_carousel_items'] == 3 && $grada_data_wow_seconds == 6) {
			$grada_data_wow_seconds = 0;
		} elseif ($settings['posts_carousel_items'] == 4 && $grada_data_wow_seconds == 8) {
			$grada_data_wow_seconds = 0;
		} elseif ($settings['posts_carousel_items'] == 5 && $grada_data_wow_seconds == 10) {
			$grada_data_wow_seconds = 0;
		} elseif ($settings['posts_carousel_items'] == 6 && $grada_data_wow_seconds == 12) {
			$grada_data_wow_seconds = 0;
		}

		$grada_wow_holder = "data-wow-delay=". $grada_data_wow_seconds / 10 ."s";
		?>
		<article <?php post_class( $grada_posts_item_class ) ?> id="id-<?php the_ID() ?>"  data-entry-id="<?php the_ID() ?>" <?php echo esc_attr($grada_data_wow_delay === true && $grada_data_wow_seconds ? $grada_wow_holder : '') ?>>
			<?php
			/**
			 * Layout Type
			 */
			get_template_part('tpls/blog/style/' . $settings['posts_layout_model'] );
			?>
		</article>
	<?php $grada_data_wow_seconds = $grada_data_wow_seconds + 2; endwhile; ?>

</div>
<script type="text/javascript">
    jQuery(function ($) {
        var owl = $('#<?php echo esc_attr( $blog_carusel_id )?>');
        var isRtl = $('body').hasClass('rtl') ? true : false;

        owl.owlCarousel({
            items: <?php echo esc_attr($settings['posts_carousel_items_mobile'] ? $settings['posts_carousel_items_mobile'] : '1') ?>,
            margin: <?php echo esc_attr($settings['posts_carousel_margin_mobile'] ? $settings['posts_carousel_margin_mobile'] : '0') ?>,
            rtl: isRtl,
            autoHeight: <?php echo esc_attr($settings['posts_carousel_height'] == '1' ? 'false' : 'true') ?>,
            loop: <?php echo esc_attr($settings['posts_carousel_loop'] === 'yes' ? 'true' : 'false') ?>,
            mouseDrag: <?php echo esc_attr($settings['posts_carousel_mouse_drag'] === 'yes' ? 'true' : 'false') ?>,
            touchDrag: <?php echo esc_attr($settings['posts_carousel_touch_drag'] === 'yes' ? 'true' : 'false') ?>,
            stagePadding: <?php echo esc_attr($settings['posts_carousel_stage_padding_mobile'] ? $settings['posts_carousel_stage_padding_mobile'] : '0') ?>,
            startPosition: <?php echo esc_attr($settings['posts_carousel_start_position'] ? $settings['posts_carousel_start_position'] : '0') ?>,
            nav: <?php echo esc_attr($settings['posts_carousel_navigation'] === 'yes' ? 'true' : 'false') ?>,
            navText: [
                '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19 12H5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 19L5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 5L19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            ],
            dots: <?php echo esc_attr($settings['posts_carousel_dots'] === 'yes' ? 'true' : 'false') ?>,
            autoplay: <?php echo esc_attr($settings['posts_carousel_autoplay'] === 'yes' ? 'true' : 'false') ?>,
            autoplayTimeout: <?php echo esc_attr($settings['posts_carousel_autoplay_timeout'] ? $settings['posts_carousel_autoplay_timeout'] * 1000 : '2000') ?>,
            autoplayHoverPause: <?php echo esc_attr($settings['posts_carousel_pause'] === 'yes' ? 'true' : 'false') ?>,
            smartSpeed: <?php echo esc_attr($settings['posts_carousel_smart_speed'] ? $settings['posts_carousel_smart_speed'] * 100 : '450') ?>,
            responsive:{
                768:{
                    items: <?php echo esc_attr($settings['posts_carousel_items_tablet'] ? $settings['posts_carousel_items_tablet'] : '2') ?>,
                    margin: <?php echo esc_attr($settings['posts_carousel_margin_tablet'] ? $settings['posts_carousel_margin_tablet'] : '0') ?>,
                    stagePadding: <?php echo esc_attr($settings['posts_carousel_stage_padding_tablet'] ? $settings['posts_carousel_stage_padding_tablet'] : '0') ?>
                },
                992:{
                    items: <?php echo esc_attr($settings['posts_carousel_items'] ? $settings['posts_carousel_items'] : '0') ?>,
                    margin: <?php echo esc_attr($settings['posts_carousel_margin'] ? $settings['posts_carousel_margin'] : '0') ?>,
                    stagePadding: <?php echo esc_attr($settings['posts_carousel_stage_padding'] ? $settings['posts_carousel_stage_padding'] : '0') ?>
                }
            }
        });
    });
</script>