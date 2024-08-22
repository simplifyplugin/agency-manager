<?php

add_action('rest_api_init', function() {
    register_rest_route('agency/v1', '/create/', array(
        'methods' => 'POST',
        'callback' => 'create_agency_post',
        'permission_callback' => function() {
            return current_user_can('agency_owner');
        }
    ));
});

function create_agency_post(WP_REST_Request $request) {
    $agency_name = sanitize_text_field($request['title']);
    $agency_desc = sanitize_textarea_field($request['content']);
    $lat = sanitize_text_field($request['lat']);
    $lng = sanitize_text_field($request['lng']);
    $category = sanitize_text_field($request['category']);

    $post_id = wp_insert_post(array(
        'post_title'   => $agency_name,
        'post_content' => $agency_desc,
        'post_type'    => 'agency',
        'post_status'  => 'publish',
        'post_category' => array($category),
    ));

    if ($post_id) {
        update_post_meta($post_id, '_agency_lat', $lat);
        update_post_meta($post_id, '_agency_lng', $lng);
    }

    return new WP_REST_Response(array('id' => $post_id, 'status' => 'success'), 200);
}
