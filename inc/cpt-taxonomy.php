<?php

function school_register_custom_post_types() {
    // register cpt for staff
    $labels = array(
        'name'                  => _x( 'Staff', 'post type general name' ),
        'singular_name'         => _x( 'Staff', 'post type general name' ),
        'menu_name'             => __( 'Staff', 'admin menu' ),
        'name_admin_bar'        => __( 'Staff', 'add new on admin bar' ),
        'add_new'               => __( 'Add New', 'staff' ),
        'add_new_item'          => __( 'Add New Staff' ),
        'new_item'              => __( 'New Staff' ),
        'edit_item'             => __( 'Edit Staff' ),
        'view_item'             => __( 'View Staff' ),
        'all_items'             => __( 'All Staff' ),
        'search_items'          => __( 'Search Staff' ),
        'parent_item_colon'     => __( 'Parent Staff:' ),
        'not_found'             => __( 'Not staff found' ),
        'not_found_in_trash'    => __( 'Not staff found in Trash' ),
        'archives'              => __( 'Staff Archives' ),
        'insert_into_item'      => __( 'Insert into staff' ),
        'uploaded_to_this_item' => __( 'Uploaded to this staff' ),
        'filter_items_list'     => __( 'Filter staff list' ),
        'items_list_navigation' => __( 'Staff list navigation' ),
        'items_list'            => __( 'Staff list' ),
        'featured_image'        => __( 'Featured Image' ),
        'set_featured_image'    => __( 'Set featured image' ),
        'remove_featured_image' => __( 'Remove featured image' ),
        'use_featured_image'    => __( 'Use as featured image' )
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'show_in_rest'          => true, 
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'staff' ),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 5,
		'menu_icon'             => 'dashicons-archive',
        'supports'              => array( 'title' ),
    );

    register_post_type( 'schoo-staff', $args );
}
add_action( 'init', 'school_register_custom_post_types' );

function school_register_taxonomies() {
    $labels = array(
        'name'                       => _x( 'Departments', 'Taxonomy General Name' ),
        'singular_name'              => _x( 'Department', 'Taxonomy Singular Name' ),
        'menu_name'                  => __( 'Department' ),
        'all_items'                  => __( 'All Departments' ),
        'parent_item'                => __( 'Parent Department' ),
        'parent_item_colon'          => __( 'Parent Department:' ),
        'new_item_name'              => __( 'New Department Name' ),
        'add_new_item'               => __( 'Add New Department' ),
        'edit_item'                  => __( 'Edit Department' ),
        'update_item'                => __( 'Update Department' ),
        'view_item'                  => __( 'View Department' ),
        'separate_items_with_commas' => __( 'Separate departments with commas' ),
        'add_or_remove_items'        => __( 'Add or remove departments' ),
        'choose_from_most_used'      => __( 'Choose from the most used' ),
        'popular_items'              => __( 'Popular Departments' ),
        'search_items'               => __( 'Search Departments' ),
        'not_found'                  => __( 'Not Found' ),
        'no_terms'                   => __( 'No departments' ),
        'items_list'                 => __( 'Departments list' ),
        'items_list_navigation'      => __( 'Departments list navigation' ),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
        'show_in_rest'      => true,
    );

    register_taxonomy( 'school-department', array( 'school-staff' ), $args );
    wp_insert_term( 'Faculty', 'school-department' );
    wp_insert_term( 'Administrative', 'school-department' );
}
add_action( 'init', 'school_register_taxonomies', 0 );