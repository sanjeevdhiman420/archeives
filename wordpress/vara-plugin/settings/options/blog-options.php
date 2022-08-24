<?php 
/**
 * Blog Options
 */

// Create Panel and Sections
Kirki::add_panel('blog_options', array(
    'title'       => esc_attr__('Blog', 'vara-plugin'),
    'priority'    => 5
));
Kirki::add_section('blog_functionality_options', array(
    'title'          => esc_attr__('Functionality', 'vara-plugin'),
	'priority'       => 1,
	'panel'			=> 'blog_options'
));
Kirki::add_section('blog_style_options', array(
    'title'          => esc_attr__('Style', 'vara-plugin'),
	'priority'       => 2,
	'panel'			=> 'blog_options'
));
Kirki::add_section('blog_thumbnail_options', array(
    'title'       => esc_attr__('Thumbnail', 'vara-plugin'),
    'panel'		  => 'blog_options',
    'priority'    => 3
));
Kirki::add_section('blog_post_options', array(
    'title'          => esc_attr__('Post', 'vara-plugin'),
	'priority'       => 4,
	'panel'			=> 'blog_options'
));
Kirki::add_section('blog_static_options', array(
    'title'          => esc_attr__('Static', 'vara-plugin'),
    'description'    => esc_attr__('The options in this section will be displayed only in the blog static page.', 'vara-plugin'),
	'priority'       => 5,
	'panel'			=> 'blog_options'
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_type',
    'label'       => esc_html__('Type', 'vara-plugin'),
    'description' => __('Select the type of Blog.', 'vara-plugin'),
	'section'     => 'blog_functionality_options',
	'default'     => 'classic-grid',
    'choices'     => array(
	    'left-image' => esc_html__('Featured Image left', 'vara-plugin'),
	    'classic-grid' => esc_html__('Grid Classic', 'vara-plugin')
    )
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_sidebar',
    'label'       => esc_html__('Sidebar', 'vara-plugin'),
    'description' => __('Select the placement of sidebar or hide it, default is right.', 'vara-plugin'),
	'section'     => 'blog_functionality_options',
	'default'     => '2',
    'choices'     => array(
        '1' => esc_attr__('Left', 'vara-plugin'),
        '2' => esc_attr__('Right', 'vara-plugin'),
        '3' => esc_attr__('Hide', 'vara-plugin')
    )
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_pagination_visibility',
    'label'       => esc_html__('Pagination Visibility', 'vara-plugin'),
    'description' => __('Select the pagination visibility. <br /><small>The pagination will not be displayed if there are less posts than posts per page number, even if the option is show.</small>', 'vara-plugin'),
	'section'     => 'blog_functionality_options',
	'default'     => '1',
    'choices'     => array(
        '1' => esc_attr__('Show', 'vara-plugin'),
        '2' => esc_attr__('Hide', 'vara-plugin')
    ),
));
/**
 * Blog Style
 */
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_columns',
    'label'       => esc_html__('Columns', 'vara-plugin'),
    'description' => __('Select the columns of Blog, default is two columns.', 'vara-plugin'),
	'section'     => 'blog_style_options',
	'default'     => '2',
    'choices'     => array(
        '1' => esc_attr__('1 Column', 'vara-plugin'),
        '2' => esc_attr__('2 Columns', 'vara-plugin'),
        '3' => esc_attr__('3 Columns', 'vara-plugin'),
        '4' => esc_attr__('4 Columns', 'vara-plugin')
    )
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_animation',
    'label'       => esc_html__('Animation', 'vara-plugin'),
    'description' => __('Select initial loading animation for posts.', 'vara-plugin'),
	'section'     => 'blog_style_options',
	'default'     => '2',
    'choices'     => array(
        '1' => esc_attr__('None', 'vara-plugin'),
        '2' => esc_attr__('Fade In', 'vara-plugin'),
        '3' => esc_attr__('Fade In Up', 'vara-plugin'),
        '4' => esc_attr__('Fade In (with delay)', 'vara-plugin'),
        '5' => esc_attr__('Fade In Up (with delay)', 'vara-plugin'),
    )
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_spacing',
    'label'       => esc_html__('Spacing', 'vara-plugin'),
    'description' => __('Add custom spacing between posts.', 'vara-plugin'),
	'section'     => 'blog_style_options',
	'default'     => '2',
    'choices'     => array(
        '1' => esc_attr__('On', 'vara-plugin'),
        '2' => esc_attr__('Off', 'vara-plugin')
    )
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'slider',
	'settings'    => 'blog_spacing_value',
	'label'       => __('Spacing Value', 'vara-plugin'),
	'description' => __('Move the slider to set the value of spacing. <br /> <small>Note: The value is represented in pixels.</small>', 'vara-plugin'),
    'section'     => 'blog_style_options',
    'default'     => 30,
	'choices'     => array(
		'min'  => '0',
		'max'  => '100',
		'step' => '1',
    ),
    'active_callback' => array(
        array(
            'setting'  => 'blog_spacing',
            'operator' => '==',
            'value'    => '1'
        ),
    )
));

// Hover
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'blog_hover_title',
	'section'     => 'blog_style_options',
	'default'     => '<h1>' . esc_html__('Hover', 'vara-plugin') . '</h1><hr>'
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_hover_visibility',
    'label'       => esc_html__('Visibility', 'vara-plugin'),
    'description' => esc_html__('Select the visibility of the hover.', 'vara-plugin'),
	'section'     => 'blog_style_options',
	'default'     => 'none',
    'choices'     => array(
	    'none' => esc_html__('None', 'vara-plugin'),
	    'grayscale' => esc_html__('Grayscale', 'vara-plugin'),
	    'image-clip' => esc_html__('Clip Effect', 'vara-plugin'),
	    'scale' => esc_html__('Scale', 'vara-plugin'),
    )
));

// Meta
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'blog_meta_title',
	'section'     => 'blog_style_options',
	'default'     => '<h1>' . esc_html__('Meta', 'vara-plugin') . '</h1><hr>'
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_date_visibility',
    'label'       => esc_html__('Date', 'vara-plugin'),
    'description' => __('Select the visibility of the date.', 'vara-plugin'),
	'section'     => 'blog_style_options',
	'default'     => 'yes',
    'choices'     => array(
        'yes' => esc_attr__('Show', 'vara-plugin'),
        'no' => esc_attr__('Hide', 'vara-plugin')
    )
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_categories_visibility',
    'label'       => esc_html__('Categories', 'vara-plugin'),
    'description' => __('Select the visibility of the categories.', 'vara-plugin'),
	'section'     => 'blog_style_options',
	'default'     => 'yes',
    'choices'     => array(
        'yes' => esc_attr__('Show', 'vara-plugin'),
        'no' => esc_attr__('Hide', 'vara-plugin')
    )
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_tags_visibility',
    'label'       => esc_html__('Tags', 'vara-plugin'),
    'description' => __('Select the visibility of the tags.', 'vara-plugin'),
	'section'     => 'blog_style_options',
	'default'     => 'no',
    'choices'     => array(
        'yes' => esc_attr__('Show', 'vara-plugin'),
        'no' => esc_attr__('Hide', 'vara-plugin')
    )
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_excerpt_visibility',
    'label'       => esc_html__('Excerpt', 'vara-plugin'),
    'description' => __('Select the visibility of the excerpt.', 'vara-plugin'),
	'section'     => 'blog_style_options',
	'default'     => 'yes',
    'choices'     => array(
        'yes' => esc_attr__('Show', 'vara-plugin'),
        'no' => esc_attr__('Hide', 'vara-plugin')
    )
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_author_visibility',
    'label'       => esc_html__('Author', 'vara-plugin'),
    'description' => __('Select the visibility of the author.', 'vara-plugin'),
	'section'     => 'blog_style_options',
	'default'     => 'yes',
    'choices'     => array(
        'yes' => esc_attr__('Show', 'vara-plugin'),
        'no' => esc_attr__('Hide', 'vara-plugin')
    )
));

/**
 * Thumbnail Resizer
 */
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_thumbnail_visibility',
    'label'       => esc_html__('Visibility', 'vara-plugin'),
    'description' => __('Select the visibility of the thumbnail on blog pages.', 'vara-plugin'),
	'section'     => 'blog_thumbnail_options',
	'default'     => 'yes',
    'choices'     => array(
        'yes' => esc_attr__('Show', 'vara-plugin'),
        'no' => esc_attr__('Hide', 'vara-plugin')
    ),
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_thumbnail_resizer',
    'label'       => esc_html__('Resizer', 'vara-plugin'),
    'description' => __('Activate a thumbnail resizer, it will crop all the images to a given width & height. <br /><small>Note: Do not forget to regenerate thumbnails.</small>', 'vara-plugin'),
	'section'     => 'blog_thumbnail_options',
	'default'     => 'no',
    'choices'     => array(
        'yes' => esc_attr__('On', 'vara-plugin'),
        'no' => esc_attr__('Off', 'vara-plugin')
    ),
));

Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_thumbnail_sizes',
    'label'       => esc_html__('Image Sizes', 'vara-plugin'),
    'description' => __('Select the image size, you can add new thumbnail sizes in the general options.', 'vara-plugin'),
	'section'     => 'blog_thumbnail_options',
	'default'     => 'full',
    'choices'     => grada_thumbnail_sizes(),
    'active_callback' => array(
        array(
            'setting'  => 'blog_thumbnail_resizer',
            'operator' => '==',
            'value'    => 'yes'
        ),
    )
));

/**
 * Post
 */
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_post_thumbnail',
    'label'       => esc_html__('Thumbnail', 'vara-plugin'),
    'description' => __('Select the visibility of the thumbnail on post.', 'vara-plugin'),
	'section'     => 'blog_post_options',
	'default'     => '1',
    'choices'     => array(
        '1' => esc_attr__('Show', 'vara-plugin'),
        '2' => esc_attr__('Hide', 'vara-plugin')
    ),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_post_share',
    'label'       => esc_html__('Share', 'vara-plugin'),
    'description' => __('Select the visibility of share icons. <br /><small>Note: Make sure to install and activate the GradaStudio Share plugin.</small>', 'vara-plugin'),
	'section'     => 'blog_post_options',
	'default'     => '2',
    'choices'     => array(
        '1' => esc_attr__('Show', 'vara-plugin'),
        '2' => esc_attr__('Hide', 'vara-plugin')
    ),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_post_sidebar',
    'label'       => esc_html__('Sidebar', 'vara-plugin'),
    'description' => __('Select the placement of sidebar or hide it, default is right.', 'vara-plugin'),
	'section'     => 'blog_post_options',
	'default'     => '2',
    'choices'     => array(
        '1' => esc_attr__('Left', 'vara-plugin'),
        '2' => esc_attr__('Right', 'vara-plugin'),
        '3' => esc_attr__('Hide', 'vara-plugin')
    ),
));

// Navigation
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'blog_post_navigation_title',
	'section'     => 'blog_post_options',
	'default'     => '<h1>' . esc_html__('Navigation', 'vara-plugin') . '</h1><hr>'
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_post_navigation_visibility',
    'label'       => esc_html__('Navigation Visibility', 'vara-plugin'),
    'description' => __('Show or hide the navigation on blog post.', 'vara-plugin'),
	'section'     => 'blog_post_options',
	'default'     => '1',
    'choices'     => array(
        '1' => esc_attr__('Show', 'vara-plugin'),
        '2' => esc_attr__('Hide', 'vara-plugin')
    ),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_post_navigation_category',
    'label'       => esc_html__('Navigation Category', 'vara-plugin'),
    'description' => __('Enable if you want the posts to be navigated only in the same category.', 'vara-plugin'),
	'section'     => 'blog_post_options',
	'default'     => '2',
    'choices'     => array(
        '1' => esc_attr__('Enable', 'vara-plugin'),
        '2' => esc_attr__('Disable', 'vara-plugin')
    ),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_post_navigation_category',
    'label'       => esc_html__('Category', 'vara-plugin'),
    'description' => __('Enable if you want the posts to be navigated only in the same category.', 'vara-plugin'),
	'section'     => 'blog_post_options',
	'default'     => '2',
    'choices'     => array(
        '1' => esc_attr__('Enable', 'vara-plugin'),
        '2' => esc_attr__('Disable', 'vara-plugin')
    ),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_post_navigation_back_url',
    'label'       => esc_html__('Back URL', 'vara-plugin'),
    'description' => __('Add an url which will be displayed on the center and will send you to blog.', 'vara-plugin'),
	'section'     => 'blog_post_options',
	'default'     => '1',
    'choices'     => array(
        '1' => esc_attr__('Show', 'vara-plugin'),
        '2' => esc_attr__('Hide', 'vara-plugin')
    ),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'text',
	'settings'    => 'blog_post_navigation_back_url_link',
    'label'       => esc_html__('Link', 'vara-plugin'),
    'description' => __('Change the link of the text, by default it will send you to the blog page.', 'vara-plugin'),
    'section'     => 'blog_post_options',
    'active_callback' => array(
        array(
            'setting'  => 'blog_post_navigation_back_url',
            'operator' => '==',
            'value'    => '1'
        ),
    )
));

// Author
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'blog_post_author_title',
	'section'     => 'blog_post_options',
	'default'     => '<h1>' . esc_html__('Author', 'vara-plugin') . '</h1><hr>'
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_post_author',
    'label'       => esc_html__('Visibility', 'vara-plugin'),
    'description' => __('Show or hide the author in post single.', 'vara-plugin'),
	'section'     => 'blog_post_options',
	'default'     => '2',
    'choices'     => array(
        '1' => esc_attr__('Show', 'vara-plugin'),
        '2' => esc_attr__('Hide', 'vara-plugin')
    ),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_post_author_avatar',
    'label'       => esc_html__('Avatar', 'vara-plugin'),
    'description' => __('Show or hide the author avatar.', 'vara-plugin'),
	'section'     => 'blog_post_options',
	'default'     => '1',
    'choices'     => array(
        '1' => esc_attr__('Show', 'vara-plugin'),
        '2' => esc_attr__('Hide', 'vara-plugin')
    ),
    'active_callback' => array(
        array(
            'setting'  => 'blog_post_author',
            'operator' => '==',
            'value'    => '1'
        ),
    )
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_post_author_name',
    'label'       => esc_html__('Name', 'vara-plugin'),
    'description' => __('Show or hide the author name.', 'vara-plugin'),
	'section'     => 'blog_post_options',
	'default'     => '1',
    'choices'     => array(
        '1' => esc_attr__('Show', 'vara-plugin'),
        '2' => esc_attr__('Hide', 'vara-plugin')
    ),
    'active_callback' => array(
        array(
            'setting'  => 'blog_post_author',
            'operator' => '==',
            'value'    => '1'
        ),
    )
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_post_author_description',
    'label'       => esc_html__('Description', 'vara-plugin'),
    'description' => __('Show or hide the author description.', 'vara-plugin'),
	'section'     => 'blog_post_options',
	'default'     => '1',
    'choices'     => array(
        '1' => esc_attr__('Show', 'vara-plugin'),
        '2' => esc_attr__('Hide', 'vara-plugin')
    ),
    'active_callback' => array(
        array(
            'setting'  => 'blog_post_author',
            'operator' => '==',
            'value'    => '1'
        ),
    )
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_post_author_archive_button',
    'label'       => esc_html__('Archive Button', 'vara-plugin'),
    'description' => __('Show or hide the author archive button.', 'vara-plugin'),
	'section'     => 'blog_post_options',
	'default'     => '1',
    'choices'     => array(
        '1' => esc_attr__('Show', 'vara-plugin'),
        '2' => esc_attr__('Hide', 'vara-plugin')
    ),
    'active_callback' => array(
        array(
            'setting'  => 'blog_post_author',
            'operator' => '==',
            'value'    => '1'
        ),
    )
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'text',
	'settings'    => 'blog_post_author_archive_text',
    'label'       => esc_html__('Archive Text', 'vara-plugin'),
    'description' => __('Show or hide the author archive button.', 'vara-plugin'),
    'default'     => __('All Author Posts', 'vara-plugin'),
	'section'     => 'blog_post_options',
    'active_callback' => array(
        array(
            'setting'  => 'blog_post_author',
            'operator' => '==',
            'value'    => '1'
        ),
        array(
            'setting'  => 'blog_post_author_archive_button',
            'operator' => '==',
            'value'    => '1'
        ),
    )
));

// Related
Kirki::add_field('grada_kirki', array(
	'type'        => 'custom',
	'settings'    => 'blog_post_related_title',
	'section'     => 'blog_post_options',
	'default'     => '<h1>' . esc_html__('Related', 'vara-plugin') . '</h1><hr>'
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_post_related',
    'label'       => esc_html__('Related', 'vara-plugin'),
    'description' => __('Show or hide related posts in single. <br /> <small>Note: Do not forget to select the template below.</small>', 'vara-plugin'),
	'section'     => 'blog_post_options',
	'default'     => '2',
    'choices'     => array(
        '1' => esc_attr__('Show', 'vara-plugin'),
        '2' => esc_attr__('Hide', 'vara-plugin')
    ),
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'select',
	'settings'    => 'blog_post_related_template',
    'label'       => esc_html__('Template', 'vara-plugin'),
    'description' => __('Make sure to create the template with posts element onto it.', 'vara-plugin'),
	'section'     => 'blog_post_options',
	'default'     => '1',
    'choices'     => grada_get_elementor_template('section'),
    'active_callback' => array(
        array(
            'setting'  => 'blog_post_related',
            'operator' => '==',
            'value'    => '1'
        ),
    )
));

/**
 * Static Blog Page
 */
Kirki::add_field('grada_kirki', array(
	'type'        => 'text',
	'settings'    => 'blog_title',
    'label'       => esc_html__('Title', 'vara-plugin'),
    'description' => __('Enter the text that will appear as blog title.', 'vara-plugin'),
    'section'     => 'blog_static_options'
));
Kirki::add_field('grada_kirki', array(
	'type'        => 'textarea',
	'settings'    => 'blog_content',
    'label'       => esc_html__('Content', 'vara-plugin'),
    'description' => __('Enter the text that will appear as blog content.', 'vara-plugin'),
    'section'     => 'blog_static_options'
));
