<?php
/**
 * Theme Helper & Utility Functions
 *
 * @package DigitalAgency
 * @version 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Calculate estimated reading time for article content
 *
 * @param string|int|null $post_or_content Post ID or raw content string.
 * @return string Formatted reading time string (e.g. "4 min read").
 */
function digital_agency_get_reading_time( $post_or_content = null ): string {
    $content = '';

    if ( is_numeric( $post_or_content ) ) {
        $post = get_post( (int) $post_or_content );
        $content = $post ? $post->post_content : '';
    } elseif ( is_string( $post_or_content ) ) {
        $content = $post_or_content;
    } else {
        $content = get_the_content();
    }

    $word_count = str_word_count( wp_strip_all_tags( $content ) );
    $words_per_minute = 200;
    $minutes = max( 1, (int) ceil( $word_count / $words_per_minute ) );

    /* translators: %d: number of minutes */
    return sprintf( _n( '%d min read', '%d min read', $minutes, 'digital-agency' ), $minutes );
}

/**
 * Output accessible breadcrumbs navigation
 */
function digital_agency_breadcrumbs(): void {
    if ( is_front_page() ) {
        return;
    }

    echo '<nav class="agency-breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'digital-agency' ) . '">';
    echo '<ol class="agency-breadcrumbs__list">';
    echo '<li class="agency-breadcrumbs__item"><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'digital-agency' ) . '</a></li>';

    if ( is_singular() ) {
        $post_type = get_post_type();
        if ( 'post' === $post_type ) {
            $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                echo '<li class="agency-breadcrumbs__item"><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></li>';
            }
        } elseif ( 'page' !== $post_type ) {
            $post_type_obj = get_post_type_object( $post_type );
            if ( $post_type_obj && $post_type_obj->has_archive ) {
                echo '<li class="agency-breadcrumbs__item"><a href="' . esc_url( get_post_type_archive_link( $post_type ) ) . '">' . esc_html( $post_type_obj->labels->name ) . '</a></li>';
            }
        }
        echo '<li class="agency-breadcrumbs__item" aria-current="page">' . esc_html( get_the_title() ) . '</li>';
    } elseif ( is_archive() ) {
        echo '<li class="agency-breadcrumbs__item" aria-current="page">' . esc_html( get_the_archive_title() ) . '</li>';
    } elseif ( is_search() ) {
        /* translators: %s: Search query string */
        echo '<li class="agency-breadcrumbs__item" aria-current="page">' . sprintf( esc_html__( 'Search: "%s"', 'digital-agency' ), esc_html( get_search_query() ) ) . '</li>';
    } elseif ( is_404() ) {
        echo '<li class="agency-breadcrumbs__item" aria-current="page">' . esc_html__( 'Page Not Found', 'digital-agency' ) . '</li>';
    }

    echo '</ol>';
    echo '</nav>';
}

/**
 * Return sanitized inline SVGs for theme UI elements
 *
 * @param string $icon_name Icon slug identifier.
 * @return string Safe inline SVG string.
 */
function digital_agency_get_svg( string $icon_name ): string {
    $icons = array(
        'arrow-up-right' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>',
        'arrow-right'    => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
        'checkmark'      => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>',
        'star'           => '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
        'spark'          => '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg>',
        'phone'          => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>',
        'email'          => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>',
    );

    return $icons[ $icon_name ] ?? '';
}

/**
 * Safely decode a JSON array from post meta with fallback
 *
 * @param mixed $raw_data Raw meta value.
 * @return array<mixed>
 */
function digital_agency_decode_json_array( $raw_data ): array {
    if ( is_array( $raw_data ) ) {
        return $raw_data;
    }
    if ( ! is_string( $raw_data ) || empty( $raw_data ) ) {
        return array();
    }
    $decoded = json_decode( $raw_data, true );
    return is_array( $decoded ) ? $decoded : array();
}

/**
 * Retrieve structured attachment data objects for a gallery field
 *
 * @param int|array<int> $post_id_or_ids Post ID or array of attachment IDs.
 * @param string         $meta_key Meta key containing attachment IDs if post ID is passed.
 * @param string         $size Image size.
 * @return array<int, array<string, mixed>>
 */
function digital_agency_get_gallery_images( $post_id_or_ids, string $meta_key = '', string $size = 'large' ): array {
    if ( is_array( $post_id_or_ids ) ) {
        $ids = $post_id_or_ids;
    } elseif ( is_numeric( $post_id_or_ids ) && ! empty( $meta_key ) ) {
        $raw_ids = get_post_meta( (int) $post_id_or_ids, $meta_key, true );
        $ids     = digital_agency_decode_json_array( $raw_ids );
    } else {
        $ids = array();
    }

    $images = array();
    foreach ( $ids as $id ) {
        $attachment_id = absint( $id );
        if ( ! $attachment_id ) {
            continue;
        }

        $src = wp_get_attachment_image_src( $attachment_id, $size );
        if ( $src ) {
            $images[] = array(
                'id'     => $attachment_id,
                'url'    => $src[0],
                'width'  => $src[1],
                'height' => $src[2],
                'alt'    => get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ?: '',
            );
        }
    }
    return $images;
}
