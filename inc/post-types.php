<?php
function register_post_types() {
    register_post_type('resources',array(
        'labels' => array(
            'name' => 'Resources',
            'singular_name' => 'Resource',
            'menu_name' => 'Resources'
        ),
        'rewrite' => array(
            'slug' => 'resources',
            'with_front' => false
        ),
        'public' => false,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'has_archive' => false,
        'supports' => array('title','thumbnail'),
        'menu_icon' => 'dashicons-media-text',
    ));
}
add_action('init','register_post_types');