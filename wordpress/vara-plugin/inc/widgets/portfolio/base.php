<?php
namespace GradaElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class GradaPortfolio extends Widget_Base {

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
		return 'grada-portfolio';
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
		return esc_html__('Portfolio', 'vara-plugin');
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
		return 'eicon-gallery-grid grada-badge';
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

	public function grada_return_taxonomies($terms, $type = 'slug', $single = false) {
		if (is_singular(['portfolio', 'post', 'product']) && $single) {
			$terms = get_the_terms(get_the_ID(), $terms);
			$name = $type;
		} else {
			$terms = get_terms($terms);
			$name = 'name';
		}

		$output = [];

		if (!$terms && is_wp_error($terms)) {
			return;
		}

		foreach ($terms as $term) {
			$output[$term->$type] = $term->$name;
		}

		return $output;
	}

	public function grada_reutnr_portfolio_items($post_type) {
		$post_type = get_posts([
			'post_type' => $post_type,
			'posts_per_page' => -1
		]);

		$output = [];

		if (!$post_type) {
			return;
		}

		foreach ($post_type as $post) {
			$output[$post->ID] = $post->post_title;
		}

		return $output;
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
		 * Justified
		 *
		 * Override the layotu model when
		 * Justified is selected, because
		 * it works only with meta inside
		 */
		if ($settings['portfolio_layout_type'] == 'justified') {
			$settings['portfolio_layout_model'] = 'meta-overlay';
		}

		$grada_portfolio_type = 'portfolio';
		$grada_portfolio_name = 'portfolio';
		$grada_portfolio_taxonomy = 'project_tag';
		$grada_portfolio_category = 'project_cat';
		$grada_portfolio_normal_query = $settings['portfolio_query_normal_post'];
		$grada_portfolio_metro_query = $settings['portfolio_query_metro_post'];
		$grada_portfolio_wrapper_class = 'gs-portfolio-wrapper';
		$grada_portfolio_holder_class = 'gs-portfolio-list gs-portfolio-list--'. $settings['portfolio_layout_model'] .'';
		$grada_portfolio_item_class = 'portfolio-item-holder';

		/**
		 * Paged
		 *
		 * Tell the WordPress exactly
		 * what page is active.
		 */
		if (get_query_var('paged')) {
			$paged = get_query_var('paged');
		} elseif (get_query_var('page')) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		/**
		 * Loop Operator
		 *
		 * Show all posts incase no
		 * category is selected. Works
		 * only when isotope is selected.
		 */
		if ($grada_portfolio_normal_query) {
			$loop_operator = "IN";
		} else {
			$loop_operator = "NOT IN";
		}

		/**
		 * Query IDs
		 */
		$grada_portfolio_query = [];
		if ($grada_portfolio_metro_query) {
			foreach ($grada_portfolio_metro_query as $post) {
				$grada_portfolio_query[] = $post['post_id'];
			}
		}

		/**
		 * Query
		 */
		if ($settings['portfolio_layout_type'] == 'metro') {
			$args = [
				'post_type' => $grada_portfolio_type,
				'posts_per_page' => $settings['portfolio_ppp'],
				'paged' => $paged,
				'post__in' => $grada_portfolio_query,
				'orderby' => 'post__in'
			];
		} else {
			$args = [
				'post_type' => $grada_portfolio_type,
				'posts_per_page' => $settings['portfolio_ppp'],
				'paged' => $paged,
				'orderby' => $settings['portfolio_query_orderby'],
				'order' => $settings['portfolio_query_order'],
				'tax_query' => [
					[
						'taxonomy' => $grada_portfolio_taxonomy,
						'field' => 'slug',
						'terms' => $grada_portfolio_normal_query,
						'operator' => $loop_operator
					]
				],
			];
		}

		$grada_filter = isset($_GET['filter']) ? $_GET['filter'] : '';
		$grada_exclude = isset($_GET['exclude']) ? $_GET['exclude'] : '';

		if ($grada_filter) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => $grada_portfolio_taxonomy,
					'field' => 'slug',
					'terms' => $grada_filter
				)
			);
		}

		if ($grada_exclude) {
			$args['post__not_in'] = $grada_exclude;
		}

		$query = new \WP_Query($args);

		/**
		 * Meta
		 */
		$settings['portfolio_layout_model'] == 'meta-overlay' ? $settings['portfolio_meta_thumbnail'] = 'yes' : '';
		set_query_var('grada_portfolio_meta_thumbnail', $settings['portfolio_meta_thumbnail']);
		set_query_var('grada_portfolio_meta_title', $settings['portfolio_meta_title']);
		set_query_var('grada_portfolio_meta_categories', $settings['portfolio_meta_categories']);

		/**
		 * Carousel Height
		 */
		set_query_var('grada_portfolio_carousel_height', $settings['portfolio_carousel_height']);

		/**
		 * Thumbnail Sizes
		 */
		$grada_thumbnail_output = null;

		if ($settings['portfolio_thumbnail_resizer'] == 'yes') {
			if ($settings['portfolio_thumbnail_resizer'] == 'yes') {
				if ($settings['portfolio_thumbnail_sizes_custom_dimension']) {
					$media_custom_dimension = $settings['portfolio_thumbnail_sizes_custom_dimension'];
					$media_image_size = [isset($media_custom_dimension['width']) ? $media_custom_dimension['width'] : 500, isset($media_custom_dimension['width']) ? $media_custom_dimension['width'] : 9999];
				} else {
					$media_image_size = $settings['portfolio_thumbnail_sizes_size'];
				}
			} else {
				$media_image_size = 'full';
			}
			$grada_thumbnail_output = $media_image_size;
		}

		set_query_var('grada_portfolio_thumbnail_resizer', $grada_thumbnail_output);

		/**
		 * Hover
		 */
		set_query_var('grada_portfolio_hover_visibility', $settings['portfolio_hover_visibility']);
		set_query_var('grada_portfolio_style_hover_active', $settings['portfolio_style_hover_active']);
		set_query_var('grada_portfolio_style_hover_meta_vertical_alignment', $settings['portfolio_style_hover_meta_vertical_alignment']);
		set_query_var('grada_portfolio_style_hover_type', $settings['portfolio_style_hover_type']);

		/**
		 * Classes
		 */
		$entires_wrapper_class = ['gs-entries-style-'. $settings['portfolio_layout_model']];

		if ($settings['portfolio_filters_left'] == 'yes') {
		    $entires_wrapper_class[] = 'portfolio-filter-left-active';
        }

		if ($query->have_posts()) :
			?>
			<div class="gs-entries-wrapper gs-portfolio-custom-cursor gs-entries-filter <?php echo esc_attr( implode( ' ', $entires_wrapper_class ) ); ?> <?php echo esc_attr($grada_portfolio_wrapper_class) ?>" data-entries-id="<?php echo esc_attr($this->get_ID()) ?>">
				<?php $settings['portfolio_layout'] != 'carousel' ? include(__DIR__ . '/parts/filters.php')  :  '' ?>
				<div class="<?php echo esc_attr($grada_portfolio_holder_class) ?> gs-overflow-hidden">
					<?php
					/**
					 * Layout Type
					 */
					if ($settings['portfolio_layout'] == 'isotope') {
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

}