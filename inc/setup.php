<?php
/**
 * Theme Setup & Core Configuration
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Configure theme supports, image sizes, and text domain
 */
function digital_agency_setup(): void {
    // Make theme available for translation.
    load_theme_textdomain( 'digital-agency', DIGITAL_AGENCY_DIR . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Register custom responsive image sizes tailored to the agency design system.
    add_image_size( 'agency-hero', 1920, 1080, true );           // High-res hero banner
    add_image_size( 'agency-project-large', 1200, 750, true );   // Featured case study display
    add_image_size( 'agency-card-thumbnail', 600, 400, true );   // Standard 3-column card
    add_image_size( 'agency-team-portrait', 500, 650, true );    // High-res team portrait
    add_image_size( 'agency-avatar', 120, 120, true );           // Client & author avatar

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Support responsive embedded content.
    add_theme_support( 'responsive-embeds' );

    // Support wide alignment in editor.
    add_theme_support( 'align-wide' );

    // Support core block styles.
    add_theme_support( 'wp-block-styles' );

    // Support editor styles and link the editor stylesheet.
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor.css' );
}
add_action( 'after_setup_theme', 'digital_agency_setup' );

/**
 * Expose custom image sizes in the WordPress block media editor
 *
 * @param array<string, string> $sizes Standard registered sizes.
 * @return array<string, string> Merged sizes with custom agency sizes.
 */
function digital_agency_custom_image_sizes( array $sizes ): array {
    return array_merge(
        $sizes,
        array(
            'agency-hero'           => esc_html__( 'Agency Hero (1920x1080)', 'digital-agency' ),
            'agency-project-large'  => esc_html__( 'Agency Project Large (1200x750)', 'digital-agency' ),
            'agency-card-thumbnail' => esc_html__( 'Agency Card Thumbnail (600x400)', 'digital-agency' ),
            'agency-team-portrait'  => esc_html__( 'Agency Team Portrait (500x650)', 'digital-agency' ),
        )
    );
}
add_filter( 'image_size_names_choose', 'digital_agency_custom_image_sizes' );
