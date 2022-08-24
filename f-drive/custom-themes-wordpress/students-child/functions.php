<?php
add_action('wp_enqueue_script', function(){
    wp_enqueue_style("my-style", get_stylesheet_uri().'./style.css');
	wp_enqueue_style("my-style-2", get_stylesheet_uri().'/assets/css/style.css');
    });
   
// Change dashboard Posts to News

?>