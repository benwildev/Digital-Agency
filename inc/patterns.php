<?php
/**
 * Block Pattern Categories & Registration Foundation
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register custom block pattern categories for the Digital Agency theme
 */
function digital_agency_register_pattern_categories(): void {
    $categories = array(
        'digital-agency-hero'         => array( 'label' => esc_html__( 'Agency: Heroes & Banners', 'digital-agency' ) ),
        'digital-agency-services'     => array( 'label' => esc_html__( 'Agency: Services & Capabilities', 'digital-agency' ) ),
        'digital-agency-portfolio'    => array( 'label' => esc_html__( 'Agency: Portfolio & Case Studies', 'digital-agency' ) ),
        'digital-agency-social-proof' => array( 'label' => esc_html__( 'Agency: Testimonials, Stats & Awards', 'digital-agency' ) ),
        'digital-agency-team'         => array( 'label' => esc_html__( 'Agency: Team & Leadership', 'digital-agency' ) ),
        'digital-agency-pricing'      => array( 'label' => esc_html__( 'Agency: Pricing & Plans', 'digital-agency' ) ),
        'digital-agency-cta'          => array( 'label' => esc_html__( 'Agency: Call to Action & Forms', 'digital-agency' ) ),
        'digital-agency-pages'        => array( 'label' => esc_html__( 'Agency: Complete Page Layouts', 'digital-agency' ) ),
    );

    foreach ( $categories as $slug => $properties ) {
        register_block_pattern_category( $slug, $properties );
    }
}
add_action( 'init', 'digital_agency_register_pattern_categories' );
