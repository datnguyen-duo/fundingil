<?php
function register_taxonomies() {
    register_taxonomy( 'resource-category', 'resources', array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => _x( 'Category', 'taxonomy general name' ),
            'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Categories' ),
            'all_items'         => __( 'All categories' ),
            'parent_item'       => __( 'Parent Category' ),
            'parent_item_colon' => __( 'Parent Category:' ),
            'edit_item'         => __( 'Edit Category' ),
            'update_item'       => __( 'Update Category' ),
            'add_new_item'      => __( 'Add New Category' ),
            'new_item_name'     => __( 'New Category Name' ),
            'menu_name'         => __( 'Categories' ),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'public'            => false,
        'rewrite'           => array( 'slug' => 'resources-category' ),
    ) );
}
add_action( 'init', 'register_taxonomies', 0 );