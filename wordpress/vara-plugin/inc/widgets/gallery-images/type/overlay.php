<?php
/**
 * Gallery Image - Info Overlay
 */
$gallery_holder_class = ['gallery-item-inner', 'type-info-overlay'];
$gallery_content_holder = ['gallery-item-details', 'd-flex'];

/**
 * Lightbox & Video
 */
if (($settings['gallery_images_lightbox'] == 'yes' && !\Elementor\Plugin::$instance->editor->is_edit_mode()) || $gallery_item['query_type'] == 'video') {
	$gallery_holder_class[] = 'gs-popup';

	if ($gallery_item['query_type'] == 'video') {
		$gallery_item['query_url']['url'] = $gallery_item['query_video_link'] ? $gallery_item['query_video_link'] : $gallery_item['query_url']['url'];
	} else {
		$gallery_item['query_url']['url'] = $gallery_item['query_url']['url'] ? $gallery_item['query_url']['url'] : $gallery_item['query_image']['url'];
	}
}

/**
 * Hover Active & Reverse
 */
if ($settings['gallery_images_style_hover_active'] == 'yes') {
	$gallery_holder_class[] = 'hover-active';
}

/**
 * Content Vertical Alignment
 */
if ($settings['gallery_images_style_hover_content_vertical_alignment']) {
	$gallery_content_holder[] = 'align-items-'. $settings['gallery_images_style_hover_content_vertical_alignment'] .'';
} else {
	$gallery_content_holder[] = 'align-items-center';
}

?>
<div class="<?php echo esc_attr(implode(' ', $gallery_holder_class)); ?>">
	<?php if ( $settings['gallery_images_frames'] == 'yes' && $settings['gallery_images_layout'] !== 'justified' ) : ?>
        <div class="image-gallery-frame">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 5.1" width="20px" fill="currentColor"><circle cx="19.5" cy="2.5" r="2.5"/><circle cx="11.1" cy="2.5" r="2.5"/><circle cx="2.5" cy="2.5" r="2.5"/></svg>
        </div>
	<?php endif; ?>
	<div class="gallery-item-thumbnail-holder">
        <?php
            // Image Size
            if ($settings['gallery_images_thumbnail_resizer'] == 'yes') {
                if ($settings['gallery_images_thumbnail_sizes_custom_dimension']) {
                    $media_custom_dimension = $settings['gallery_images_thumbnail_sizes_custom_dimension'];
                    $media_image_size = [isset($media_custom_dimension['width']) ? $media_custom_dimension['width'] : 500, isset($media_custom_dimension['width']) ? $media_custom_dimension['width'] : 9999];
                } else {
                    $media_image_size = $settings['gallery_images_thumbnail_sizes_size'];
                }
            } else {
                $media_image_size = 'full';
            }

            /**
             * Media Item Output
             */
            if ($gallery_item['query_image']) {
                $media_image_padding = strpos($gallery_item['query_image']['url'], 'assets/images/placeholder.png') ? 'padding-bottom: 100%' : grada_image_aspect_ratio_calculation($gallery_item['query_image']['id'], $media_image_size);

                if (strpos($gallery_item['query_image']['url'], 'assets/images/placeholder.png')) {
                    $media_image_padding = 'padding-bottom: 100%';
                } else {
                    $media_image_padding = grada_image_aspect_ratio_calculation($gallery_item['query_image']['id'], $media_image_size);
                }

                if ($settings['gallery_images_carousel_height'] == 'full') {
                    echo sprintf(
                        '<div class="gs-full-height-img gs-bg-img-style" style="background-image: url(%s)"></div>',
                        $gallery_item['query_image']['url']
                    );
                } elseif ($gallery_item['query_image']['id']) {
                    echo sprintf(
                        '<div class="%s" style="%s">%s</div>',
                        'entry-image-ratio',
                        esc_attr($media_image_padding),
                        wp_get_attachment_image($gallery_item['query_image']['id'], $media_image_size)
                    );
                } else {
                    echo sprintf(
                        '<div class="%s" style="%s"><img src="%s" alt="%s"></div>',
                        'entry-image-ratio',
                        'padding-bottom: 100%',
                        esc_url($gallery_item['query_image']['url']),
                        esc_attr(grada_get_attachment_alt($gallery_item['query_image']['id']))
                    );
                }
            }
        ?>
		<?php if ($settings['gallery_images_hover_visibility'] != 'hide') : ?>
            <div class="<?php echo esc_attr(implode(' ', $gallery_content_holder)); ?>">
                <div class="gallery-item-details-inner">
                    <?php if ($gallery_item['query_title']) : ?>
                        <h4 class="gallery-item-title"><?php echo esc_attr($gallery_item['query_title']); ?></h4>
                    <?php endif; ?>
                    <?php if ($gallery_item['query_subtitle']) : ?>
                        <div class="gallery-item-subtitle"><span><?php echo esc_attr($gallery_item['query_subtitle']) ?></span></div>
                    <?php endif; ?>
                    <?php if ($gallery_item['query_description']) : ?>
                        <div class="gallery-item-description">
                            <?php echo do_shortcode($gallery_item['query_description']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="gallery-item_overlay_bg"></div>
        <?php endif; ?>
		<?php
		if ($gallery_item['query_url']['url'] || $settings['gallery_images_lightbox'] == 'yes' || $gallery_item['query_type'] == 'video') {
			echo sprintf(
				'<a title="%s" class="gs-popup-link" data-type="%s" %s %s %s></a>',
				$gallery_item['query_title'] ? $gallery_item['query_title'] : '',
				$gallery_item['query_type'] == 'image' ? 'image' : 'video',
				$settings['gallery_images_lightbox'] == 'yes' || $gallery_item['query_type'] == 'video' ? 'data-mfp-src='. esc_url($gallery_item['query_url']['url']) .'' : 'href='. esc_url($gallery_item['query_url']['url']) .'',
				$gallery_item['query_url']['is_external'] == 'on' ? 'target="_blank"' : '',
				$gallery_item['query_url']['nofollow'] == 'on' ? 'rel="nofollow"' : ''
			);
		}
		?>
	</div>
</div>
