<?php 

function agency_add_meta_boxes() {
    add_meta_box(
        'agency_coordinates',
        __('Coordinates', 'text_domain'),
        'agency_coordinates_callback',
        'agency',
        'normal',
        'high'
    );
}

function agency_coordinates_callback($post) {
    wp_nonce_field('save_agency_coordinates', 'agency_coordinates_nonce');

    $lat = get_post_meta($post->ID, '_agency_lat', true);
    $lng = get_post_meta($post->ID, '_agency_lng', true);

    echo '<label for="agency_lat">' . __('Latitude', 'text_domain') . '</label>';
    echo '<input type="text" id="agency_lat" name="agency_lat" value="' . esc_attr($lat) . '" />';
    echo '<br><br>';
    echo '<label for="agency_lng">' . __('Longitude', 'text_domain') . '</label>';
    echo '<input type="text" id="agency_lng" name="agency_lng" value="' . esc_attr($lng) . '" />';
}

function save_agency_coordinates($post_id) {
    if (!isset($_POST['agency_coordinates_nonce'])) {
        return $post_id;
    }
    $nonce = $_POST['agency_coordinates_nonce'];

    if (!wp_verify_nonce($nonce, 'save_agency_coordinates')) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    if (isset($_POST['agency_lat'])) {
        update_post_meta($post_id, '_agency_lat', sanitize_text_field($_POST['agency_lat']));
    }

    if (isset($_POST['agency_lng'])) {
        update_post_meta($post_id, '_agency_lng', sanitize_text_field($_POST['agency_lng']));
    }
}

add_action('add_meta_boxes', 'agency_add_meta_boxes');
add_action('save_post', 'save_agency_coordinates');
