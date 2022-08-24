<?php
add_action( 'wp_enqueue_scripts', 'my_plugin_add_stylesheet' );
function my_plugin_add_stylesheet() {
    wp_enqueue_style( 'my-style', get_stylesheet_directory_uri() . '/style.css', false, '1.0', 'all' );
}
function slider(){
    $supports= array(
        'tiitle' ,
        'editor',
        'author',
        'thumbnail',
        'excerpt',
        'trackbacks',
        'custom-fields',
        'comments',
        'revisions',
        'page-attributes',
        'post-formats',
        'subtitle',
  
    );
    $labels = array(
        'name' => _x('Slider', 'plural'),
        'singular_name' => _x('Slider', 'singular'),
        'menu_name' => _x('Slider', 'admin menu'),
        'name_admin_bar' => _x('slider', 'admin bar'),
        'add_new' => _x('Add New', 'add new'),
        'add_new_item' => __('Add New slider'),
        'new_item' => __('New slider'),
        'edit_item' => __('Edit slider'),
        'view_item' => __('View slider'),
        'all_items' => __('All slider'),
        'search_items' => __('Search slider'),
        'not_found' => __('No slider found.'),
         );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' =>true,
        'query_var' =>true,
        'rewrite' => array('slug'=> 'slider'),
        'has_archive' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
        'taxonomies' => array('category'),
        'menu_icon'           => 'dashicons-cart',
   );
    register_post_type('slider', $args);
}
add_action('init', 'slider');
function cw_post_type_feature() {
   $supports = array(
   'title', // post title
   'subtitle',/////////
   'editor', // post content
   'author', // post author
   'thumbnail', // featured images
   'revisions', // post revisions
   'post-formats',
   'page-attributes'// post formats
   );
   $labels = array(
   'name' => _x('Features', 'plural'),
   'singular_name' => _x('Features', 'singular'),
   'menu_name' => _x('Features', 'admin menu'),
   'name_admin_bar' => _x('features', 'admin bar'),
   'add_new' => _x('Add New', 'add new'),
   'add_new_item' => __('Add New feature'),
   'new_item' => __('New feature'),
   'edit_item' => __('Edit feature'),
   'view_item' => __('View feature'),
   'all_items' => __('All feature'),
   'search_items' => __('Search feature'),
   'not_found' => __('No feature found.'),
    );
   $args = array(
   'supports' => $supports,
   'labels' => $labels,
   'public' => true,
   'query_var' => true,
   'rewrite' => array('slug' => 'features'),
   'has_archive' => true,
   'hierarchical' => true,
    'show_in_rest' => true,
    'taxonomies'  => array( 'category' ),
    
   );
   register_post_type('features', $args);
   }
   add_action('init', 'cw_post_type_feature');

   add_role('custom_user', __(
    'Custom_user'),
    array(
        'read'            => true, // Allows a user to read
        'create_posts'      => true, // Allows user to create new posts
        'edit_posts'        => true, // Allows user to edit their own posts
        'edit_others_posts' => true, // Allows user to edit others posts too
        'publish_posts' => true, // Allows the user to publish posts
        'manage_categories' => true, // Allows user to manage post categories
        )
 );
function crrn_user(){
if(current_user_can( 'Custom_user' )):
else:
endif;

}
add_action('login_redirect','crrn_user');
?>