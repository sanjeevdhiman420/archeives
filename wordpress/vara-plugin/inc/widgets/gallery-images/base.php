<?php
namespace GradaElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class GradaGalleryImages extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'grada-gallery-images';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__('Gallery Images', 'vara-plugin');
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image grada-badge';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return ['grada-category'];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		/**
		 * Content Options
		 */
		include(__DIR__ . '/options/content/base.php');

		/**
		 * Style Options
		 */
		include(__DIR__ . '/options/style/base.php');

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		/**
		 * Query
		 */
		$grada_gallery_images_query = $settings['gallery_images_layout_type'] == 'metro' ? $settings['gallery_images_query_metro'] : $settings['gallery_images_query_normal'];

		/**
		 * Layout Model
		 */
		$grada_gallery_images_class = ['gs-gallery-images'];

		/**
		 * Add browser frame on images
		 */
		if ($settings['gallery_images_frames'] == 'yes') {
		    $grada_gallery_images_class[] = 'gs-gallery-images-with-frame';
        }

		/**
		 * Justified
		 *
		 * Override the layotu model when
		 * Justified is selected, because
		 * it works only with meta inside
		 */
		if ($settings['gallery_images_layout_type'] == 'justified') {
			$settings['gallery_images_layout_model'] = 'info-overlay';
		}

		switch ($settings['gallery_images_layout_model']) {
			default:
				$grada_gallery_images_class[] = 'gs-gallery-images-info-overlay';
				break;
			case 'info-bottom':
				$grada_gallery_images_class[] = 'gs-gallery-images-info-bottom';
				break;
		}

		if ( $grada_gallery_images_query ) :
		?>
            <div class="gs-entries-wrapper gs-entries-filter" data-entries-id="<?php echo esc_attr($this->get_ID()) ?>">
	            <?php $settings['gallery_images_layout'] != 'carousel' ? include(__DIR__ . '/templates/filters.php')  : '' ?>

                <div class="<?php echo esc_attr(implode(' ', $grada_gallery_images_class)) ?>">
		            <?php
		            /**
		             * Layout Type
		             */
		            if ($settings['gallery_images_layout'] == 'isotope') {
			            include(__DIR__ . '/layout/isotope.php');
		            } else {
			            include(__DIR__ . '/layout/carousel.php');
		            }
		            ?>
                </div>
            </div>
        <?php
        endif; wp_reset_postdata();
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {}
}