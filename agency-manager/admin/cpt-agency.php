<?php 

function create_agency_post_type() {
    // Register Custom Post Type
    $labels = array(
        'name'                  => _x('Agencies', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Agency', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Agencies', 'text_domain'),
        'name_admin_bar'        => __('Agency', 'text_domain'),
        'archives'              => __('Agency Archives', 'text_domain'),
        'attributes'            => __('Agency Attributes', 'text_domain'),
        'parent_item_colon'     => __('Parent Agency:', 'text_domain'),
        'all_items'             => __('All Agencies', 'text_domain'),
        'add_new_item'          => __('Add New Agency', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
        'new_item'              => __('New Agency', 'text_domain'),
        'edit_item'             => __('Edit Agency', 'text_domain'),
        'update_item'           => __('Update Agency', 'text_domain'),
        'view_item'             => __('View Agency', 'text_domain'),
        'view_items'            => __('View Agencies', 'text_domain'),
        'search_items'          => __('Search Agency', 'text_domain'),
        'not_found'             => __('Not found', 'text_domain'),
        'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
        'featured_image'        => __('Featured Image', 'text_domain'),
        'set_featured_image'    => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image'    => __('Use as featured image', 'text_domain'),
        'insert_into_item'      => __('Insert into agency', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this agency', 'text_domain'),
        'items_list'            => __('Agencies list', 'text_domain'),
        'items_list_navigation' => __('Agencies list navigation', 'text_domain'),
        'filter_items_list'     => __('Filter agencies list', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Agency', 'text_domain'),
        'description'           => __('Agency Description', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'custom-fields', 'revisions', 'author'),
        'taxonomies'            => array('category'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rest_base'             => 'agencies',
        'map_meta_cap'          => true,
    );
    register_post_type('agency', $args);
}
add_action('init', 'create_agency_post_type', 0);
