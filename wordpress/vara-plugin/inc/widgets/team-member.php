<?php
namespace GradaElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class GradaTeamMember extends Widget_Base {

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
		return 'grada-team-member';
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
		return esc_html__('Team Member', 'vara-plugin');
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
		return 'eicon-lock-user grada-badge';
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

		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'General', 'vara-plugin' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'type',
			[
				'label' => esc_html__( 'Type', 'vara-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'info-bottom'				=> esc_html__( 'Info Below Image', 'vara-plugin' ),
					'info-on-hover'             => esc_html__( 'Info on Hover', 'vara-plugin' ),
				),
				'default' => 'info-bottom'
			]
		);

		$this->add_control(
			'team_image',
			[
				'label' => esc_html__( 'Image', 'vara-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri() . '/assets/images/placeholder.png'
				]
			]
		);

		$this->add_control(
			'team_name',
			[
				'label' => esc_html__( 'Name', 'vara-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'team_name_html_tag',
			[
				'label' => esc_html__('HTML Tag', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'h1' => esc_html__('H1', 'vara-plugin'),
					'h2' => esc_html__('H2', 'vara-plugin'),
					'h3' => esc_html__('H3', 'vara-plugin'),
					'h4' => esc_html__('H4', 'vara-plugin'),
					'h5' => esc_html__('H5', 'vara-plugin'),
					'h6' => esc_html__('H6', 'vara-plugin'),
					'div' => esc_html__('div', 'vara-plugin'),
					'span' => esc_html__('span', 'vara-plugin'),
					'p' => esc_html__('p', 'vara-plugin')
				],
				'default' => 'h4'
			]
		);

		$this->add_control(
			'team_link',
			[
				'label' => esc_html__( 'Link', 'vara-plugin' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'team_position',
			[
				'label' => esc_html__( 'Position', 'vara-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'team_description',
			[
				'label' => esc_html__( 'Description', 'vara-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$this->end_controls_section();

		// Social Icons
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Social Icons', 'vara-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'social_icon',
			[
				'label' => esc_html__( 'Icon', 'vara-plugin' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-wordpress',
					'library' => 'fa-brands',
				],
				'recommended' => [
					'fa-brands' => [
						'facebook-f',
						'android',
						'apple',
						'behance',
						'bitbucket',
						'codepen',
						'delicious',
						'deviantart',
						'digg',
						'dribbble',
						'elementor',
						'facebook',
						'flickr',
						'foursquare',
						'free-code-camp',
						'github',
						'gitlab',
						'globe',
						'houzz',
						'instagram',
						'jsfiddle',
						'linkedin',
						'medium',
						'meetup',
						'mix',
						'mixcloud',
						'odnoklassniki',
						'pinterest',
						'product-hunt',
						'reddit',
						'shopping-cart',
						'skype',
						'slideshare',
						'snapchat',
						'soundcloud',
						'spotify',
						'stack-overflow',
						'steam',
						'telegram',
						'thumb-tack',
						'tripadvisor',
						'tumblr',
						'twitch',
						'twitter',
						'viber',
						'vimeo',
						'vk',
						'weibo',
						'weixin',
						'whatsapp',
						'wordpress',
						'xing',
						'yelp',
						'youtube',
						'500px',
					],
					'fa-solid' => [
						'envelope',
						'link',
						'rss',
					],
				],
				'fa4compatibility' => 'icon',
			]
		);

		$repeater->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'vara-plugin' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'is_external' => 'true',
				],
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'https://your-link.com', 'vara-plugin' ),
			]
		);

		$repeater->add_control(
			'item_icon_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => esc_html__( 'Default', 'elementor' ),
					'custom' => esc_html__( 'Custom', 'elementor' ),
				],
			]
		);

		$repeater->add_control(
			'item_icon_secondary_color',
			[
				'label' => esc_html__( 'Icon Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'item_icon_color' => 'custom',
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}.gs-social-icon' => 'color: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'social_icon_list',
			[
				'label' => esc_html__( 'Social Icons', 'vara-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'prevent_empty' => false,
				'default' => [
					[
						'social_icon' => [
							'value' => 'fab fa-facebook-f',
							'library' => 'fa-brands',
						],
					],
					[
						'social_icon' => [
							'value' => 'fab fa-twitter',
							'library' => 'fa-brands',
						],
					],
					[
						'social_icon' => [
							'value' => 'fab fa-linkedin-in',
							'library' => 'fa-brands',
						],
					],
				],
				'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( social_icon, social, true, migrated, true ) }}}',
			]
		);

		$this->add_control(
			'team_social_icons_color',
			[
				'label' => esc_html__( 'Icons Color', 'vara-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gs-team-member .gs-team-social-media .gs-social-icon' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_3,
				],
			]
		);

		$this->end_controls_section();

		/**
		 * Thumbnail
		 */
		$this->start_controls_section(
			'team_image_thumbnail',
			[
				'label' => esc_html__('Image', 'vara-plugin')
			]
		);

		$this->add_control(
			'team_image_thumbnail_resizer',
			[
				'label' => esc_html__('Thumbnail Resizer', 'vara-plugin'),
				'description' => esc_html__('Activate a thumbnail resizer, it will crop all the images to a given width & height.', 'vara-plugin'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('On', 'vara-plugin'),
				'label_off' => esc_html__('Off', 'vara-plugin'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'team_image_thumbnail_sizes', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'label' => esc_html__('Thumbnail Sizes', 'vara-plugin'),
				'description' => esc_html__('Select the thumbnail size.', 'vara-plugin'),
				'default' => 'large',
				'condition' => [
					'team_image_thumbnail_resizer' => 'yes'
				]
			]
		);

		$this->end_controls_section();

		// Team style
		$this->start_controls_section(
			'team_style',
			[
				'label' => esc_html__( 'Style', 'vara-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'team_name_color',
			[
				'label' => esc_html__( 'Name Color', 'vara-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gs-team-member .gs-team-name' => 'color: {{VALUE}};',
					'{{WRAPPER}} .gs-team-member .gs-team-name a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .gs-team-member .gs-team-name a:after' => 'background-color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_3,
				],
				'condition' => [
					'team_name!' => ''
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'team_name_typography',
				'label' => esc_html__('Name Typography', 'vara-plugin'),
				'selector' => '{{WRAPPER}} .gs-team-member .gs-team-name',
				'condition' => [
					'team_name!' => ''
				],
			]
		);

		$this->add_control(
			'team_position_color',
			[
				'label' => esc_html__( 'Role Color', 'vara-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gs-team-member .gs-team-role' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_3,
				],
				'condition' => [
					'team_position!' => ''
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'team_position_typography',
				'label' => esc_html__('Role Typography', 'vara-plugin'),
				'selector' => '{{WRAPPER}} .gs-team-member .gs-team-role',
				'condition' => [
					'team_position!' => ''
				],
			]
		);

		$this->add_control(
			'team_description_color',
			[
				'label' => esc_html__( 'Description Color', 'vara-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gs-team-member .gs-team-member-content' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_3,
				],
				'condition' => [
					'team_description!' => ''
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'team_description_typography',
				'label' => esc_html__('Description Typography', 'vara-plugin'),
				'selector' => '{{WRAPPER}} .gs-team-member .gs-team-member-content',
				'condition' => [
					'team_description!' => ''
				],
			]
		);

		$this->add_group_control(
		        \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'team_hover_background_color',
                'label' => esc_html__( 'Hover Background', 'vara-plugin' ),
                'selector' => '{{WRAPPER}} .gs-team-member .gs-team-image .overlay',
                'condition' => [
	                'type' => 'info-on-hover'
                ]
            ]
        );

		$this->end_controls_section();

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

		$fallback_defaults = [
			'fa fa-facebook',
			'fa fa-twitter',
			'fa fa-google-plus',
		];

		$team_member_class = ['gs-team-member', 'gs-team-member-' . $settings['type']];

		?>
		<div class="<?php echo esc_attr( implode(' ', $team_member_class) );?>">
            <div class="gs-team-member-inner">
                <div class="gs-team-image">
                    <?php
                        // Image Size
                        if ($settings['team_image_thumbnail_resizer'] == 'yes') {
                            if ($settings['team_image_thumbnail_sizes_custom_dimension']) {
                                $media_custom_dimension = $settings['team_image_thumbnail_sizes_custom_dimension'];
                                $team_image_size = [isset($media_custom_dimension['width']) ? $media_custom_dimension['width'] : 500, isset($media_custom_dimension['width']) ? $media_custom_dimension['width'] : 9999];
                            } else {
                                $team_image_size = $settings['team_image_thumbnail_sizes_size'];
                            }
                        } else {
                            $team_image_size = 'full';
                        }

                        if ($settings['team_image']) {
	                        if (strpos($settings['team_image']['url'], 'assets/images/placeholder.png')) {
		                        $team_image_padding = 'padding-bottom: 100%';
	                        } else {
		                        $team_image_padding = grada_image_aspect_ratio_calculation($settings['team_image']['id'], $team_image_size);
	                        }
                        }

                    if ($settings['team_image']['id']) {
	                    echo sprintf(
		                    '<div class="%s" style="%s">%s</div>',
		                    'entry-image-ratio',
		                    esc_attr($team_image_padding),
		                    wp_get_attachment_image($settings['team_image']['id'], $team_image_size)
	                    );
                    } else {
	                    echo sprintf(
		                    '<div class="%s" style="%s"><img src="%s" alt="%s"></div>',
		                    'entry-image-ratio',
		                    'padding-bottom: 100%',
		                    esc_url($settings['team_image']['url']),
		                    esc_attr(grada_get_attachment_alt($settings['team_image']['id']))
	                    );
                    }
                    ?>
                    <?php if ($settings['type'] == 'info-on-hover') : ?>
                        <div class="overlay"></div>
                    <?php endif; ?>
                </div>
                <div class="gs-team-info">
                    <?php
                        $team_name = $settings['team_name'];

                        if ( ! empty( $settings['team_link']['url'] ) ) {
                            $this->add_link_attributes( 'team_member_link', $settings['team_link'] );

	                        $team_name = sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'team_member_link' ), $team_name );
                        }

                        echo sprintf( '<%1$s class="%2$s" %3$s>%4$s</%1$s>',
                            $settings['team_name_html_tag'],
                            'gs-team-name',
                            $this->get_render_attribute_string( 'title' ),
                            $team_name
                        );

                    ?>
                    <?php if ( !empty( $settings['team_position'] ) ) : ?>
                        <p class="gs-team-role"><?php echo $settings['team_position']; ?></p>
                    <?php endif; ?>
                    <?php if ( !empty($settings['social_icon_list']) ) : ?>
                        <div class="gs-team-social-media">
                            <?php foreach ( $settings['social_icon_list'] as $index => $social_item ) :
                                $migration_allowed = \Elementor\Icons_Manager::is_migration_allowed();

                                $migrated = isset( $social_item['__fa4_migrated']['social_icon'] );
                                $is_new = empty( $social_item['social'] ) && $migration_allowed;
                                $social = '';

                                // add old default
                                if ( empty( $social_item['social'] ) && ! $migration_allowed ) {
                                    $social_item['social'] = isset( $fallback_defaults[ $index ] ) ? $fallback_defaults[ $index ] : 'fa fa-wordpress';
                                }

                                if ( ! empty( $social_item['social'] ) ) {
                                    $social = str_replace( 'fa fa-', '', $social_item['social'] );
                                }

                                if ( ( $is_new || $migrated ) && 'svg' !== $social_item['social_icon']['library'] ) {
                                    $social = explode( ' ', $social_item['social_icon']['value'], 2 );
                                    if ( empty( $social[1] ) ) {
                                        $social = '';
                                    } else {
                                        $social = str_replace( 'fa-', '', $social[1] );
                                    }
                                }
                                if ( 'svg' === $social_item['social_icon']['library'] ) {
                                    $social = get_post_meta( $social_item['social_icon']['value']['id'], '_wp_attachment_image_alt', true );
                                }

                                $link_key = 'link_' . $index;

                                $this->add_render_attribute( $link_key, 'class', [
                                    'gs-social-icon',
                                    'elementor-repeater-item-' . $social_item['_id']
                                ] );

                                $this->add_link_attributes( $link_key, $social_item['link'] );

                                ?>
                                <a <?php echo $this->get_render_attribute_string( $link_key ); ?>>
                                    <?php
                                    if ( $is_new || $migrated ) {
                                        \Elementor\Icons_Manager::render_icon( $social_item['social_icon'] );
                                    } else { ?>
                                        <i class="<?php echo esc_attr( $social_item['social'] ); ?>"></i>
                                    <?php } ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
	            <?php
                    if ( ! empty( $settings['team_link']['url'] ) ) {
                        echo sprintf( '<a %1$s class="%2$s"></a>', $this->get_render_attribute_string( 'team_member_link' ), 'team-member-link' );
                    }
	            ?>
            </div>
            <?php if ( ! empty( $settings['team_description'] ) ) : ?>
                <div class="gs-team-member-content">
                    <?php echo wpautop( $settings['team_description'] );?>
                </div>
            <?php endif; ?>
		</div>
		<?php
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
