<?php
function enqueue_google_maps_script() {
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY', null, null, true);
    wp_enqueue_script('custom-map', AGENCY_PLUGIN_DIR. 'public/js/custom-map.js', array('google-maps'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_google_maps_script');

function list_agencies_on_map() {
    $args = array('post_type' => 'agency', 'posts_per_page' => -1);
    $agencies = new WP_Query($args);
    $markers = array();

    if ($agencies->have_posts()) {
        while ($agencies->have_posts()) {
            $agencies->the_post();
            $lat = get_post_meta(get_the_ID(), '_agency_lat', true);
            $lng = get_post_meta(get_the_ID(), '_agency_lng', true);
            $markers[] = array('lat' => $lat, 'lng' => $lng, 'title' => get_the_title());
        }
    }

    wp_localize_script('custom-map', 'agencyData', array('markers' => $markers));
    wp_reset_postdata();
}
add_action('wp_footer', 'list_agencies_on_map');
