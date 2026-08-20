<?php
/**
 * Custom Taxonomies Registration Engine
 *
 * @package DigitalAgency
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register all Custom Taxonomies for the Digital Agency theme
 */
function digital_agency_register_taxonomies(): void {

    // -------------------------------------------------------------------------
    // 1. Service Category Taxonomy (`service_category`)
    // -------------------------------------------------------------------------
    $service_cat_labels = array(
        'name'              => _x( 'Service Categories', 'taxonomy general name', 'digital-agency' ),
        'singular_name'     => _x( 'Service Category', 'taxonomy singular name', 'digital-agency' ),
        'search_items'      => __( 'Search Service Categories', 'digital-agency' ),
        'all_items'         => __( 'All Service Categories', 'digital-agency' ),
        'parent_item'       => __( 'Parent Category', 'digital-agency' ),
        'parent_item_colon' => __( 'Parent Category:', 'digital-agency' ),
        'edit_item'         => __( 'Edit Service Category', 'digital-agency' ),
        'update_item'       => __( 'Update Service Category', 'digital-agency' ),
        'add_new_item'      => __( 'Add New Service Category', 'digital-agency' ),
        'new_item_name'     => __( 'New Service Category Name', 'digital-agency' ),
        'menu_name'         => __( 'Service Categories', 'digital-agency' ),
    );

    register_taxonomy(
        'service_category',
        array( 'service' ),
        array(
            'hierarchical'      => true,
            'labels'            => $service_cat_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'show_in_rest'      => true,
            'rewrite'           => array(
                'slug'       => 'service-category',
                'with_front' => false,
            ),
        )
    );

    // -------------------------------------------------------------------------
    // 2. Project / Case Study Category Taxonomy (`project_category`)
    // -------------------------------------------------------------------------
    $project_cat_labels = array(
        'name'              => _x( 'Project Categories', 'taxonomy general name', 'digital-agency' ),
        'singular_name'     => _x( 'Project Category', 'taxonomy singular name', 'digital-agency' ),
        'search_items'      => __( 'Search Project Categories', 'digital-agency' ),
        'all_items'         => __( 'All Project Categories', 'digital-agency' ),
        'parent_item'       => __( 'Parent Category', 'digital-agency' ),
        'parent_item_colon' => __( 'Parent Category:', 'digital-agency' ),
        'edit_item'         => __( 'Edit Project Category', 'digital-agency' ),
        'update_item'       => __( 'Update Project Category', 'digital-agency' ),
        'add_new_item'      => __( 'Add New Project Category', 'digital-agency' ),
        'new_item_name'     => __( 'New Project Category Name', 'digital-agency' ),
        'menu_name'         => __( 'Project Categories', 'digital-agency' ),
    );

    register_taxonomy(
        'project_category',
        array( 'project' ),
        array(
            'hierarchical'      => true,
            'labels'            => $project_cat_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'show_in_rest'      => true,
            'rewrite'           => array(
                'slug'       => 'project-category',
                'with_front' => false,
            ),
        )
    );

    // -------------------------------------------------------------------------
    // 3. Department Taxonomy (`department`) for Team & Careers
    // -------------------------------------------------------------------------
    $dept_labels = array(
        'name'              => _x( 'Departments', 'taxonomy general name', 'digital-agency' ),
        'singular_name'     => _x( 'Department', 'taxonomy singular name', 'digital-agency' ),
        'search_items'      => __( 'Search Departments', 'digital-agency' ),
        'all_items'         => __( 'All Departments', 'digital-agency' ),
        'parent_item'       => __( 'Parent Department', 'digital-agency' ),
        'parent_item_colon' => __( 'Parent Department:', 'digital-agency' ),
        'edit_item'         => __( 'Edit Department', 'digital-agency' ),
        'update_item'       => __( 'Update Department', 'digital-agency' ),
        'add_new_item'      => __( 'Add New Department', 'digital-agency' ),
        'new_item_name'     => __( 'New Department Name', 'digital-agency' ),
        'menu_name'         => __( 'Departments', 'digital-agency' ),
    );

    register_taxonomy(
        'department',
        array( 'team_member', 'career' ),
        array(
            'hierarchical'      => true,
            'labels'            => $dept_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'show_in_rest'      => true,
            'rewrite'           => array(
                'slug'       => 'department',
                'with_front' => false,
            ),
        )
    );
}
add_action( 'init', 'digital_agency_register_taxonomies' );
