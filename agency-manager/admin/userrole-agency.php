<?php
function create_agency_owner_role() {
    add_role(
        'agency_owner',
        __('Agency Owner', 'text_domain'),
        array(
            'read'         => true,
            'edit_posts'   => false,
            'edit_agency'  => true,
            'publish_agency' => true,
            'delete_agency' => true,
            'edit_others_agency' => false,
        )
    );
}

function add_agency_capabilities() {
    $role = get_role('agency_owner');
    $role->add_cap('edit_agency');
    $role->add_cap('publish_agency');
    $role->add_cap('delete_agency');
    $role->add_cap('read_agency');
    $role->add_cap('read');
}
add_action('init', 'create_agency_owner_role');
add_action('admin_init', 'add_agency_capabilities');
