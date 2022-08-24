#Display video field(custom field) from any cpt(meta fields) and display all videos on frontend like IG video of insta and also muted.
<?php
if ($_GET['cat']) {
    query_posts(
        array(
            'paged' => $wp_query->get('paged'),
            'post_type' => array('company'),
            'posts_per_page' => -1,
            'company_category' => $company_category,
        )
    );
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            $video = get_field("upload_video");
            if ($video) {
                $iframe = get_field('upload_video');
                // Use preg_match to find iframe src.
                preg_match('/src="(.+?)"/', $iframe, $matches);
                $src = $matches[1];
                $params = array(
                    'controls'  => 1,
                    'autoplay' => 1,
                    'loop' => 1,
                    'muted' => 1,
                    'quality' => 'auto',
                    "autopause" => false,
                    "api" => "1&player_id=video1",
                );
                $new_src = add_query_arg($params, $src);
                $iframe = str_replace($src, $new_src, $iframe);
                echo '<div class="wrapper">' . $iframe . '</div>';
            }
        }
    }
}
?>