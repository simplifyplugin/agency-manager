<?php
function agency_permalink_structure($post_link, $post) {
    if ($post->post_type == 'agency') {
        $post_link = str_replace('%post_id%', $post->ID, home_url('agencyowner/' . $post->ID));
    }
    return $post_link;
}
add_filter('post_type_link', 'agency_permalink_structure', 10, 2);

