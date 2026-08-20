<?php
/**
 * Dynamic Query Engine & Relationship Helpers
 *
 * @package DigitalAgency
 * @version 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Retrieve Agency Services with filtering and performance caching options
 *
 * @param array<string, mixed> $args Query arguments override.
 * @return WP_Query
 */
function digital_agency_get_services( array $args = array() ): WP_Query {
    $defaults = array(
        'post_type'              => 'service',
        'posts_per_page'         => 6,
        'post_status'            => 'publish',
        'orderby'                => 'menu_order date',
        'order'                  => 'ASC',
        'no_found_rows'          => true,
        'update_post_meta_cache' => true,
        'update_post_term_cache' => true,
    );

    $query_args = wp_parse_args( $args, $defaults );

    if ( ! empty( $args['category'] ) ) {
        $query_args['tax_query'] = array(
            array(
                'taxonomy' => 'service_category',
                'field'    => is_numeric( $args['category'] ) ? 'term_id' : 'slug',
                'terms'    => $args['category'],
            ),
        );
    }

    if ( isset( $args['featured'] ) && true === $args['featured'] ) {
        $query_args['meta_query'] = array(
            array(
                'key'     => '_agency_service_featured',
                'value'   => 1,
                'compare' => '=',
            ),
        );
    }

    return new WP_Query( $query_args );
}

/**
 * Retrieve Agency Case Studies & Projects
 *
 * @param array<string, mixed> $args Query arguments override.
 * @return WP_Query
 */
function digital_agency_get_projects( array $args = array() ): WP_Query {
    $defaults = array(
        'post_type'              => 'project',
        'posts_per_page'         => 6,
        'post_status'            => 'publish',
        'orderby'                => 'date',
        'order'                  => 'DESC',
        'no_found_rows'          => true,
        'update_post_meta_cache' => true,
        'update_post_term_cache' => true,
    );

    $query_args = wp_parse_args( $args, $defaults );

    if ( ! empty( $args['category'] ) ) {
        $query_args['tax_query'] = array(
            array(
                'taxonomy' => 'project_category',
                'field'    => is_numeric( $args['category'] ) ? 'term_id' : 'slug',
                'terms'    => $args['category'],
            ),
        );
    }

    if ( isset( $args['featured'] ) && true === $args['featured'] ) {
        $query_args['meta_query'] = array(
            array(
                'key'     => '_agency_project_featured',
                'value'   => 1,
                'compare' => '=',
            ),
        );
    }

    return new WP_Query( $query_args );
}

/**
 * Retrieve Featured Projects for Homepage / Portfolios
 *
 * @param int $limit Max items to return.
 * @return WP_Query
 */
function digital_agency_get_featured_projects( int $limit = 4 ): WP_Query {
    return digital_agency_get_projects( array(
        'posts_per_page' => $limit,
        'featured'       => true,
    ) );
}

/**
 * Retrieve Team Members with Department & Leadership filters
 *
 * @param array<string, mixed> $args Query arguments override.
 * @return WP_Query
 */
function digital_agency_get_team_members( array $args = array() ): WP_Query {
    $defaults = array(
        'post_type'              => 'team_member',
        'posts_per_page'         => 8,
        'post_status'            => 'publish',
        'orderby'                => 'menu_order date',
        'order'                  => 'ASC',
        'no_found_rows'          => true,
        'update_post_meta_cache' => true,
        'update_post_term_cache' => true,
    );

    $query_args = wp_parse_args( $args, $defaults );

    if ( ! empty( $args['department'] ) ) {
        $query_args['tax_query'] = array(
            array(
                'taxonomy' => 'department',
                'field'    => is_numeric( $args['department'] ) ? 'term_id' : 'slug',
                'terms'    => $args['department'],
            ),
        );
    }

    if ( isset( $args['leadership'] ) && true === $args['leadership'] ) {
        $query_args['meta_query'] = array(
            array(
                'key'     => '_agency_team_featured',
                'value'   => 1,
                'compare' => '=',
            ),
        );
    }

    return new WP_Query( $query_args );
}

/**
 * Retrieve Open Career Vacancies
 *
 * @param array<string, mixed> $args Query arguments override.
 * @return WP_Query
 */
function digital_agency_get_open_careers( array $args = array() ): WP_Query {
    $defaults = array(
        'post_type'              => 'career',
        'posts_per_page'         => 12,
        'post_status'            => 'publish',
        'orderby'                => 'date',
        'order'                  => 'DESC',
        'no_found_rows'          => true,
        'update_post_meta_cache' => true,
        'update_post_term_cache' => true,
        'meta_query'             => array(
            array(
                'key'     => '_agency_career_status',
                'value'   => 'Closed',
                'compare' => '!=',
            ),
        ),
    );

    $query_args = wp_parse_args( $args, $defaults );

    if ( ! empty( $args['department'] ) ) {
        $query_args['tax_query'] = array(
            array(
                'taxonomy' => 'department',
                'field'    => is_numeric( $args['department'] ) ? 'term_id' : 'slug',
                'terms'    => $args['department'],
            ),
        );
    }

    return new WP_Query( $query_args );
}

/**
 * Retrieve Client Testimonials
 *
 * @param array<string, mixed> $args Query arguments override.
 * @return WP_Query
 */
function digital_agency_get_testimonials( array $args = array() ): WP_Query {
    $defaults = array(
        'post_type'              => 'testimonial',
        'posts_per_page'         => 6,
        'post_status'            => 'publish',
        'orderby'                => 'menu_order date',
        'order'                  => 'ASC',
        'no_found_rows'          => true,
        'update_post_meta_cache' => true,
    );

    $query_args = wp_parse_args( $args, $defaults );

    if ( isset( $args['featured'] ) && true === $args['featured'] ) {
        $query_args['meta_query'] = array(
            array(
                'key'     => '_agency_testimonial_featured',
                'value'   => 1,
                'compare' => '=',
            ),
        );
    }

    return new WP_Query( $query_args );
}

/**
 * Retrieve Agency Pricing Plans
 *
 * @param array<string, mixed> $args Query arguments override.
 * @return WP_Query
 */
function digital_agency_get_pricing_plans( array $args = array() ): WP_Query {
    $defaults = array(
        'post_type'              => 'pricing_plan',
        'posts_per_page'         => 6,
        'post_status'            => 'publish',
        'orderby'                => 'menu_order date',
        'order'                  => 'ASC',
        'no_found_rows'          => true,
        'update_post_meta_cache' => true,
    );

    $query_args = wp_parse_args( $args, $defaults );

    return new WP_Query( $query_args );
}

/**
 * Retrieve Related Case Studies based on shared Project Category
 *
 * @param int $post_id Current Project post ID.
 * @param int $limit   Max items to retrieve.
 * @return WP_Query
 */
function digital_agency_get_related_projects( int $post_id, int $limit = 2 ): WP_Query {
    $terms = wp_get_post_terms( $post_id, 'project_category', array( 'fields' => 'ids' ) );

    $query_args = array(
        'post_type'              => 'project',
        'posts_per_page'         => $limit,
        'post__not_in'           => array( $post_id ),
        'orderby'                => 'rand',
        'no_found_rows'          => true,
        'update_post_meta_cache' => true,
    );

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        $query_args['tax_query'] = array(
            array(
                'taxonomy' => 'project_category',
                'field'    => 'term_id',
                'terms'    => $terms,
            ),
        );
    }

    return new WP_Query( $query_args );
}

/**
 * Retrieve Related Services based on shared Service Category
 *
 * @param int $post_id Current Service post ID.
 * @param int $limit   Max items to retrieve.
 * @return WP_Query
 */
function digital_agency_get_related_services( int $post_id, int $limit = 3 ): WP_Query {
    $terms = wp_get_post_terms( $post_id, 'service_category', array( 'fields' => 'ids' ) );

    $query_args = array(
        'post_type'              => 'service',
        'posts_per_page'         => $limit,
        'post__not_in'           => array( $post_id ),
        'orderby'                => 'menu_order date',
        'order'                  => 'ASC',
        'no_found_rows'          => true,
        'update_post_meta_cache' => true,
    );

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        $query_args['tax_query'] = array(
            array(
                'taxonomy' => 'service_category',
                'field'    => 'term_id',
                'terms'    => $terms,
            ),
        );
    }

    return new WP_Query( $query_args );
}

/**
 * Helper to retrieve structured project metadata
 *
 * @param int|null $post_id Post ID.
 * @return array<string, mixed>
 */
function digital_agency_get_project_meta( ?int $post_id = null ): array {
    $id = $post_id ?: get_the_ID();
    if ( ! $id ) {
        return array();
    }

    return array(
        'client'             => (string) get_post_meta( $id, '_agency_project_client', true ),
        'year'               => (string) get_post_meta( $id, '_agency_project_year', true ),
        'country'            => (string) get_post_meta( $id, '_agency_project_country', true ),
        'url'                => (string) get_post_meta( $id, '_agency_project_url', true ),
        'video_url'          => (string) get_post_meta( $id, '_agency_project_video_url', true ),
        'impact_metric'      => (string) get_post_meta( $id, '_agency_project_impact_metric', true ),
        'metric_label'       => (string) get_post_meta( $id, '_agency_project_metric_label', true ),
        'challenge'          => (string) get_post_meta( $id, '_agency_project_challenge', true ),
        'solution'           => (string) get_post_meta( $id, '_agency_project_solution', true ),
        'testimonial_id'     => (int) get_post_meta( $id, '_agency_project_testimonial_id', true ),
        'testimonial_quote'  => (string) get_post_meta( $id, '_agency_project_testimonial_quote', true ),
        'testimonial_author' => (string) get_post_meta( $id, '_agency_project_testimonial_author', true ),
        'featured'           => (bool) get_post_meta( $id, '_agency_project_featured', true ),
    );
}

/**
 * Get Service Deliverables array
 */
function digital_agency_get_service_deliverables( int $post_id ): array {
    return digital_agency_decode_json_array( get_post_meta( $post_id, '_agency_service_included', true ) );
}

/**
 * Get Service Expertise array
 */
function digital_agency_get_service_expertise( int $post_id ): array {
    return digital_agency_decode_json_array( get_post_meta( $post_id, '_agency_service_expertise', true ) );
}

/**
 * Get Service Benefits array
 */
function digital_agency_get_service_benefits( int $post_id ): array {
    return digital_agency_decode_json_array( get_post_meta( $post_id, '_agency_service_benefits', true ) );
}

/**
 * Get Service Gallery image objects
 */
function digital_agency_get_service_gallery( int $post_id, string $size = 'large' ): array {
    return digital_agency_get_gallery_images( $post_id, '_agency_service_gallery', $size );
}

/**
 * Get Project Gallery image objects
 */
function digital_agency_get_project_gallery( int $post_id, string $size = 'large' ): array {
    return digital_agency_get_gallery_images( $post_id, '_agency_project_gallery', $size );
}

/**
 * Get Team Member Skills array
 */
function digital_agency_get_team_skills( int $post_id ): array {
    return digital_agency_decode_json_array( get_post_meta( $post_id, '_agency_team_skills', true ) );
}

/**
 * Get Career Responsibilities array
 */
function digital_agency_get_career_responsibilities( int $post_id ): array {
    return digital_agency_decode_json_array( get_post_meta( $post_id, '_agency_career_responsibilities', true ) );
}

/**
 * Get Career Requirements array
 */
function digital_agency_get_career_requirements( int $post_id ): array {
    return digital_agency_decode_json_array( get_post_meta( $post_id, '_agency_career_requirements', true ) );
}

/**
 * Get Career Skills array
 */
function digital_agency_get_career_skills( int $post_id ): array {
    return digital_agency_decode_json_array( get_post_meta( $post_id, '_agency_career_skills', true ) );
}

/**
 * Get Pricing Plan Features array
 */
function digital_agency_get_pricing_plan_features( int $post_id ): array {
    return digital_agency_decode_json_array( get_post_meta( $post_id, '_agency_plan_features', true ) );
}
