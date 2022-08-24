<?php

/**
 * Classic Grid
 */
$grada_portfolio_text_follow_class = ['gs-portfolio-item', 'gs-portfolio-item--text-follow'];
$grada_portfolio_content_holder_class = ['entry-details'];
?>
<article class="<?php echo esc_attr(implode(' ', $grada_portfolio_text_follow_class)); ?>">
    <div class="entry-overlay-wrapper">
        <div class="entry-thumbnail">
            <a href="<?php the_permalink() ?>" class="entry-thumbnail__link">
			    <?php if ($settings['portfolio_layout_type'] == 'carousel' && $settings['portfolio_carousel_height'] == 'full') : ?>
				    <?php if (has_post_thumbnail()) : ?>
                        <div class="gs-full-height-img gs-bg-img-style" style="background-image: url(<?php the_post_thumbnail_url() ?>)"></div>
				    <?php else : ?>
                        <div class="gs-full-height-img gs-bg-img-style" style="background-image: url(<?php echo esc_url(VARA_THEME_PLACEHOLDER) ?>)"></div>
				    <?php endif; ?>
			    <?php elseif (has_post_thumbnail()) : ?>
                    <div class="entry-image-ratio" style="<?php echo esc_attr(grada_thumbnail_calculation($grada_thumbnail_output)) ?>">
					    <?php
					    /**
					     * Thumbnail Sizes
					     *
					     * It inherits the option via set query var.
					     */
					    if ($grada_thumbnail_output) {
						    the_post_thumbnail($grada_thumbnail_output);
					    } else {
						    the_post_thumbnail();
					    }
					    ?>
                    </div>
			    <?php else: ?>
                    <div class="entry-image-ratio" style="padding-bottom: 100%;">
                        <img src="<?php echo esc_url(VARA_THEME_PLACEHOLDER) ?>" alt="<?php echo esc_attr__('Image Placeholder Image', 'vara-plugin'); ?>">
                    </div>
			    <?php endif; ?>
            </a>
        </div>
    </div>
    <div class="<?php echo esc_attr( implode(' ', $grada_portfolio_content_holder_class)); ?>">
        <div class="entry-details__inner">
            <div class="portfolio-info">
				<?php if ($settings['portfolio_meta_categories'] == 'yes' ) : ?>
                    <div class="entry-details-meta">
						<?php
						/**
						 * Categories
						 */
						get_template_part('tpls/taxonomy/categories-portfolio');
						?>
                    </div>
				<?php endif; ?>
				<?php if ($settings['portfolio_meta_title'] == 'yes') : ?>
                    <h4 class="entry-details-title">
                        <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                    </h4>
				<?php endif; ?>
            </div>
        </div>
    </div>
</article>