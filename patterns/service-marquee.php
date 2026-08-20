<?php
/**
 * Title: Continuous Service Ticker Marquee
 * Slug: digital-agency/service-marquee
 * Categories: digital-agency-general
 * Description: Continuous horizontal ticker dynamically displaying published agency capabilities with lime star glyphs.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$services_query = digital_agency_get_services( array( 'posts_per_page' => 8 ) );
$items = array();

if ( $services_query->have_posts() ) {
    while ( $services_query->have_posts() ) {
        $services_query->the_post();
        $items[] = get_the_title();
    }
    wp_reset_postdata();
}

if ( empty( $items ) ) {
    $items = array(
        __( 'SEARCH ENGINE OPTIMIZATION', 'digital-agency' ),
        __( 'PERFORMANCE MARKETING', 'digital-agency' ),
        __( 'BESPOKE WEB ENGINEERING', 'digital-agency' ),
        __( 'STRATEGIC BRAND ARCHITECTURE', 'digital-agency' ),
        __( 'DIGITAL CONVERSION SCALE', 'digital-agency' ),
        __( 'UI/UX PRODUCT DESIGN', 'digital-agency' ),
    );
}

// Build repeated list for continuous loop
$loop_items = array_merge( $items, $items );
?>
<!-- wp:group {"tagName":"div","className":"agency-marquee-container","align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull agency-marquee-container">
  <div class="agency-marquee-track" aria-hidden="true">
    <?php foreach ( $loop_items as $item_title ) : ?>
      <span class="agency-marquee-item"><?php echo esc_html( mb_strtoupper( $item_title ) ); ?> <span class="agency-marquee-star">✦</span></span>
    <?php endforeach; ?>
  </div>
</div>
<!-- /wp:group -->
