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

    register_post_type( 'staff', $args );

    // Register Students CPT
    $labels = array(
        'name'                  => _x( 'Students', 'post type general name' ),
        'singular_name'         => _x( 'Student', 'post type singular name'),
        'menu_name'             => _x( 'Students', 'admin menu' ),
        'name_admin_bar'        => _x( 'Student', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'student' ),
        'add_new_item'          => __( 'Add New Student' ),
        'new_item'              => __( 'New Student' ),
        'edit_item'             => __( 'Edit Student' ),
        'view_item'             => __( 'View Student' ),
        'all_items'             => __( 'All Students' ),
        'search_items'          => __( 'Search Students' ),
        'parent_item_colon'     => __( 'Parent Students:' ),
        'not_found'             => __( 'No students found.' ),
        'not_found_in_trash'    => __( 'No students found in Trash.' ),
        'archives'              => __( 'Student Archives'),
        'insert_into_item'      => __( 'Insert into student'),
        'uploaded_to_this_item' => __( 'Uploaded to this student'),
        'filter_item_list'      => __( 'Filter students list'),
        'items_list_navigation' => __( 'Students list navigation'),
        'items_list'            => __( 'Students list'),
        'featured_image'        => __( 'Student featured image'),
        'set_featured_image'    => __( 'Set student featured image'),
        'remove_featured_image' => __( 'Remove student featured image'),
        'use_featured_image'    => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'students' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-id',
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
        'template'           => array(
                                    array( 
                                        'core/paragraph', 
                                        array(
                                            'placeholder' => 'Short biography...',
                                        ) 
                                    ),
                                    array( 
                                        'core/button', 
                                        array(
                                            'placeholder' => 'Portfolio',
                                        )
                                    ),
                                ),
        'template_lock'      => 'all'
    );

    register_post_type( 'school-student', $args );
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

    register_taxonomy( 'department', array( 'staff' ), $args );
    wp_insert_term( 'Faculty', 'department' );
    wp_insert_term( 'Administrative', 'department' );

    // Student Specialty taxonomy
    $labels = array(
        'name'              => _x( 'Specialties', 'taxonomy general name' ),
        'singular_name'     => _x( 'Specialty', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Specialties' ),
        'all_items'         => __( 'All Specialty' ),
        'parent_item'       => __( 'Parent Specialty' ),
        'parent_item_colon' => __( 'Parent Specialty:' ),
        'edit_item'         => __( 'Edit Specialty' ),
        'view_item'         => __( 'View Specialty' ),
        'update_item'       => __( 'Update Specialty' ),
        'add_new_item'      => __( 'Add New Specialty' ),
        'new_item_name'     => __( 'New Specialty Name' ),
        'menu_name'         => __( 'Specialty' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'specialty' ),
    );
    register_taxonomy( 'school-specialty', array( 'school-student' ), $args );
}
add_action( 'init', 'school_register_taxonomies', 0 );