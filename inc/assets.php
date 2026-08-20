<?php
/**
 * Asset Enqueue & Font Optimization Subsystem
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue frontend stylesheets and deferred JavaScript modules
 */
function digital_agency_enqueue_assets(): void {
    // 1. Theme declaration stylesheet
    wp_enqueue_style(
        'digital-agency-style',
        get_stylesheet_uri(),
        array(),
        DIGITAL_AGENCY_VERSION
    );

    // 2. Production Micro-Styles & Component Enhancements
    wp_enqueue_style(
        'digital-agency-main',
        DIGITAL_AGENCY_URI . '/assets/css/main.css',
        array( 'digital-agency-style' ),
        DIGITAL_AGENCY_VERSION
    );

    // 3. Web Fonts (Syne & Inter via optimized Google CDN with display=swap fallback)
    wp_enqueue_style(
        'digital-agency-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Syne:wght@600;700;800&display=swap',
        array(),
        null
    );

    // 4. Core Interactive Theme Script (Deferred, zero render-blocking)
    wp_enqueue_script(
        'digital-agency-theme',
        DIGITAL_AGENCY_URI . '/assets/js/theme.js',
        array(),
        DIGITAL_AGENCY_VERSION,
        array(
            'strategy'  => 'defer',
            'in_footer' => true,
        )
    );

}
add_action( 'wp_enqueue_scripts', 'digital_agency_enqueue_assets' );

/**
 * Enqueue block editor specific webfonts to ensure 100% visual fidelity in the Site Editor
 */
function digital_agency_editor_assets(): void {
    wp_enqueue_style(
        'digital-agency-editor-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Syne:wght@600;700;800&display=swap',
        array(),
        null
    );
}
add_action( 'enqueue_block_editor_assets', 'digital_agency_editor_assets' );

/**
 * Add preconnect resource hints for performance optimization
 *
 * @param array<string> $urls URLs to print for resource hints.
 * @param string        $relation_type The relation type the URLs are printed for.
 * @return array<string> Filtered URLs.
 */
function digital_agency_resource_hints( array $urls, string $relation_type ): array {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = 'https://fonts.googleapis.com';
        $urls[] = array(
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        );
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'digital_agency_resource_hints', 10, 2 );
