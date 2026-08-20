<?php
/**
 * Custom Post Types Registration Engine
 *
 * @package DigitalAgency
 * @version 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register all Custom Post Types for the Digital Agency theme
 */
function digital_agency_register_post_types(): void {

    // -------------------------------------------------------------------------
    // 1. Service CPT (`service`)
    // -------------------------------------------------------------------------
    $service_labels = array(
        'name'                  => _x( 'Services', 'Post type general name', 'digital-agency' ),
        'singular_name'         => _x( 'Service', 'Post type singular name', 'digital-agency' ),
        'menu_name'             => _x( 'Services', 'Admin Menu text', 'digital-agency' ),
        'name_admin_bar'        => _x( 'Service', 'Add New on Toolbar', 'digital-agency' ),
        'add_new'               => __( 'Add New Service', 'digital-agency' ),
        'add_new_item'          => __( 'Add New Service', 'digital-agency' ),
        'new_item'              => __( 'New Service', 'digital-agency' ),
        'edit_item'             => __( 'Edit Service', 'digital-agency' ),
        'view_item'             => __( 'View Service', 'digital-agency' ),
        'all_items'             => __( 'All Services', 'digital-agency' ),
        'search_items'          => __( 'Search Services', 'digital-agency' ),
        'not_found'             => __( 'No services found.', 'digital-agency' ),
        'not_found_in_trash'    => __( 'No services found in Trash.', 'digital-agency' ),
        'featured_image'        => _x( 'Service Cover Image', 'Overrides the “Featured Image” phrase', 'digital-agency' ),
        'set_featured_image'    => _x( 'Set service cover image', 'Overrides the “Set featured image” phrase', 'digital-agency' ),
        'remove_featured_image' => _x( 'Remove service cover image', 'Overrides the “Remove featured image” phrase', 'digital-agency' ),
        'use_featured_image'    => _x( 'Use as service cover image', 'Overrides the “Use as featured image” phrase', 'digital-agency' ),
        'archives'              => _x( 'Service Archives', 'The post type archive label', 'digital-agency' ),
    );

    $service_args = array(
        'labels'             => $service_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array(
            'slug'       => 'services',
            'with_front' => false,
        ),
        'capability_type'    => 'post',
        'has_archive'        => 'services',
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-chart-pie',
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields', 'page-attributes' ),
    );

    register_post_type( 'service', $service_args );

    // -------------------------------------------------------------------------
    // 2. Project / Case Study CPT (`project`)
    // -------------------------------------------------------------------------
    $project_labels = array(
        'name'                  => _x( 'Projects', 'Post type general name', 'digital-agency' ),
        'singular_name'         => _x( 'Project', 'Post type singular name', 'digital-agency' ),
        'menu_name'             => _x( 'Projects', 'Admin Menu text', 'digital-agency' ),
        'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'digital-agency' ),
        'add_new'               => __( 'Add New Project', 'digital-agency' ),
        'add_new_item'          => __( 'Add New Case Study / Project', 'digital-agency' ),
        'new_item'              => __( 'New Project', 'digital-agency' ),
        'edit_item'             => __( 'Edit Project', 'digital-agency' ),
        'view_item'             => __( 'View Project', 'digital-agency' ),
        'all_items'             => __( 'All Projects', 'digital-agency' ),
        'search_items'          => __( 'Search Projects', 'digital-agency' ),
        'not_found'             => __( 'No projects found.', 'digital-agency' ),
        'not_found_in_trash'    => __( 'No projects found in Trash.', 'digital-agency' ),
        'featured_image'        => _x( 'Project Showcase Image', 'Overrides the “Featured Image” phrase', 'digital-agency' ),
        'set_featured_image'    => _x( 'Set showcase image', 'Overrides the “Set featured image” phrase', 'digital-agency' ),
        'remove_featured_image' => _x( 'Remove showcase image', 'Overrides the “Remove featured image” phrase', 'digital-agency' ),
        'use_featured_image'    => _x( 'Use as showcase image', 'Overrides the “Use as featured image” phrase', 'digital-agency' ),
        'archives'              => _x( 'Project Archives', 'The post type archive label', 'digital-agency' ),
    );

    $project_args = array(
        'labels'             => $project_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array(
            'slug'       => 'projects',
            'with_front' => false,
        ),
        'capability_type'    => 'post',
        'has_archive'        => 'projects',
        'hierarchical'       => false,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-portfolio',
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields', 'page-attributes' ),
    );

    register_post_type( 'project', $project_args );

    // -------------------------------------------------------------------------
    // 3. Team Member CPT (`team_member`)
    // -------------------------------------------------------------------------
    $team_labels = array(
        'name'                  => _x( 'Team Members', 'Post type general name', 'digital-agency' ),
        'singular_name'         => _x( 'Team Member', 'Post type singular name', 'digital-agency' ),
        'menu_name'             => _x( 'Team', 'Admin Menu text', 'digital-agency' ),
        'name_admin_bar'        => _x( 'Team Member', 'Add New on Toolbar', 'digital-agency' ),
        'add_new'               => __( 'Add New Member', 'digital-agency' ),
        'add_new_item'          => __( 'Add New Team Member', 'digital-agency' ),
        'new_item'              => __( 'New Team Member', 'digital-agency' ),
        'edit_item'             => __( 'Edit Team Member', 'digital-agency' ),
        'view_item'             => __( 'View Team Member', 'digital-agency' ),
        'all_items'             => __( 'All Team Members', 'digital-agency' ),
        'search_items'          => __( 'Search Team Members', 'digital-agency' ),
        'not_found'             => __( 'No team members found.', 'digital-agency' ),
        'not_found_in_trash'    => __( 'No team members found in Trash.', 'digital-agency' ),
        'featured_image'        => _x( 'Member Portrait', 'Overrides the “Featured Image” phrase', 'digital-agency' ),
        'set_featured_image'    => _x( 'Set portrait photo', 'Overrides the “Set featured image” phrase', 'digital-agency' ),
        'remove_featured_image' => _x( 'Remove portrait photo', 'Overrides the “Remove featured image” phrase', 'digital-agency' ),
        'use_featured_image'    => _x( 'Use as portrait photo', 'Overrides the “Use as featured image” phrase', 'digital-agency' ),
        'archives'              => _x( 'Team Directory', 'The post type archive label', 'digital-agency' ),
    );

    $team_args = array(
        'labels'             => $team_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array(
            'slug'       => 'team',
            'with_front' => false,
        ),
        'capability_type'    => 'post',
        'has_archive'        => 'team',
        'hierarchical'       => false,
        'menu_position'      => 22,
        'menu_icon'          => 'dashicons-groups',
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields', 'page-attributes' ),
    );

    register_post_type( 'team_member', $team_args );

    // -------------------------------------------------------------------------
    // 4. Career / Job Opening CPT (`career`)
    // -------------------------------------------------------------------------
    $career_labels = array(
        'name'                  => _x( 'Careers', 'Post type general name', 'digital-agency' ),
        'singular_name'         => _x( 'Job Opening', 'Post type singular name', 'digital-agency' ),
        'menu_name'             => _x( 'Careers', 'Admin Menu text', 'digital-agency' ),
        'name_admin_bar'        => _x( 'Job Opening', 'Add New on Toolbar', 'digital-agency' ),
        'add_new'               => __( 'Add New Role', 'digital-agency' ),
        'add_new_item'          => __( 'Add New Job Opening', 'digital-agency' ),
        'new_item'              => __( 'New Job Opening', 'digital-agency' ),
        'edit_item'             => __( 'Edit Job Opening', 'digital-agency' ),
        'view_item'             => __( 'View Job Opening', 'digital-agency' ),
        'all_items'             => __( 'All Openings', 'digital-agency' ),
        'search_items'          => __( 'Search Careers', 'digital-agency' ),
        'not_found'             => __( 'No job openings found.', 'digital-agency' ),
        'not_found_in_trash'    => __( 'No job openings found in Trash.', 'digital-agency' ),
        'archives'              => _x( 'Careers Directory', 'The post type archive label', 'digital-agency' ),
    );

    $career_args = array(
        'labels'             => $career_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array(
            'slug'       => 'career',
            'with_front' => false,
        ),
        'capability_type'    => 'post',
        'has_archive'        => 'career',
        'hierarchical'       => false,
        'menu_position'      => 23,
        'menu_icon'          => 'dashicons-id',
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'editor', 'excerpt', 'revisions', 'custom-fields', 'page-attributes' ),
    );

    register_post_type( 'career', $career_args );

    // -------------------------------------------------------------------------
    // 5. Testimonial CPT (`testimonial`)
    // -------------------------------------------------------------------------
    $testimonial_labels = array(
        'name'                  => _x( 'Testimonials', 'Post type general name', 'digital-agency' ),
        'singular_name'         => _x( 'Testimonial', 'Post type singular name', 'digital-agency' ),
        'menu_name'             => _x( 'Testimonials', 'Admin Menu text', 'digital-agency' ),
        'name_admin_bar'        => _x( 'Testimonial', 'Add New on Toolbar', 'digital-agency' ),
        'add_new'               => __( 'Add New Testimonial', 'digital-agency' ),
        'add_new_item'          => __( 'Add New Testimonial', 'digital-agency' ),
        'new_item'              => __( 'New Testimonial', 'digital-agency' ),
        'edit_item'             => __( 'Edit Testimonial', 'digital-agency' ),
        'view_item'             => __( 'View Testimonial', 'digital-agency' ),
        'all_items'             => __( 'All Testimonials', 'digital-agency' ),
        'search_items'          => __( 'Search Testimonials', 'digital-agency' ),
        'not_found'             => __( 'No testimonials found.', 'digital-agency' ),
        'not_found_in_trash'    => __( 'No testimonials found in Trash.', 'digital-agency' ),
        'featured_image'        => _x( 'Client Photo', 'Overrides the “Featured Image” phrase', 'digital-agency' ),
        'set_featured_image'    => _x( 'Set client photo', 'Overrides the “Set featured image” phrase', 'digital-agency' ),
        'remove_featured_image' => _x( 'Remove client photo', 'Overrides the “Remove featured image” phrase', 'digital-agency' ),
        'use_featured_image'    => _x( 'Use as client photo', 'Overrides the “Use as featured image” phrase', 'digital-agency' ),
    );

    $testimonial_args = array(
        'labels'             => $testimonial_labels,
        'public'             => false, // Internal CPT embedded via patterns & queries
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 24,
        'menu_icon'          => 'dashicons-format-quote',
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
    );

    register_post_type( 'testimonial', $testimonial_args );

    // -------------------------------------------------------------------------
    // 6. Pricing Plan CPT (`pricing_plan`)
    // -------------------------------------------------------------------------
    $pricing_labels = array(
        'name'                  => _x( 'Pricing Plans', 'Post type general name', 'digital-agency' ),
        'singular_name'         => _x( 'Pricing Plan', 'Post type singular name', 'digital-agency' ),
        'menu_name'             => _x( 'Pricing Plans', 'Admin Menu text', 'digital-agency' ),
        'name_admin_bar'        => _x( 'Pricing Plan', 'Add New on Toolbar', 'digital-agency' ),
        'add_new'               => __( 'Add New Plan', 'digital-agency' ),
        'add_new_item'          => __( 'Add New Pricing Plan', 'digital-agency' ),
        'new_item'              => __( 'New Pricing Plan', 'digital-agency' ),
        'edit_item'             => __( 'Edit Pricing Plan', 'digital-agency' ),
        'view_item'             => __( 'View Pricing Plan', 'digital-agency' ),
        'all_items'             => __( 'All Pricing Plans', 'digital-agency' ),
        'search_items'          => __( 'Search Pricing Plans', 'digital-agency' ),
        'not_found'             => __( 'No pricing plans found.', 'digital-agency' ),
        'not_found_in_trash'    => __( 'No pricing plans found in Trash.', 'digital-agency' ),
    );

    $pricing_args = array(
        'labels'             => $pricing_labels,
        'public'             => false, // Internal CPT rendered in pricing grids
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 25,
        'menu_icon'          => 'dashicons-money-alt',
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'editor', 'custom-fields', 'page-attributes' ),
    );

    register_post_type( 'pricing_plan', $pricing_args );
}
add_action( 'init', 'digital_agency_register_post_types' );
