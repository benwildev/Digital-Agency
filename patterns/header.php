<?php
/**
 * Title: Global Sticky Main Header
 * Slug: digital-agency/header
 * Categories: digital-agency-header
 * Description: Sticky navigation header with brand mark, customizable navigation block, and dynamic primary CTA button.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$business_name = digital_agency_get_setting( 'agency_business_name', get_bloginfo( 'name' ) );
$cta_text      = digital_agency_get_setting( 'agency_primary_cta_text', 'Get a Quote' );
$cta_url       = digital_agency_get_setting( 'agency_primary_cta_url', '#contact' );
?>
<!-- wp:group {"tagName":"header","className":"agency-header","style":{"spacing":{"padding":{"top":"1.1rem","bottom":"1.1rem","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
<header class="wp-block-group agency-header" style="padding-top:1.1rem;padding-right:var(--wp--preset--spacing--space-5);padding-bottom:1.1rem;padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|space-3"}}} -->
  <div class="wp-block-group">
    <?php if ( has_custom_logo() ) : ?>
      <!-- wp:site-logo {"width":36,"shouldSyncIcon":false} /-->
    <?php else : ?>
      <!-- wp:html -->
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="agency-brand" style="text-decoration:none;display:inline-flex;align-items:center;gap:0.625rem;">
        <span class="agency-brand__logo-icon" style="width:32px;height:32px;background:var(--wp--preset--color--primary-accent);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--wp--preset--color--surface-dark-base);font-weight:900;font-size:1.125rem;">✦</span>
        <span style="font-family:var(--wp--preset--font-family--syne);font-weight:800;font-size:1.25rem;letter-spacing:-0.02em;color:#FFFFFF;"><?php echo esc_html( $business_name ); ?></span>
      </a>
      <!-- /wp:html -->
    <?php endif; ?>
  </div>
  <!-- /wp:group -->

  <!-- wp:navigation {"overlayMenu":"mobile","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|space-6"}},"fontSize":"body-small"} /-->

  <!-- wp:buttons {"layout":{"type":"flex"}} -->
  <div class="wp-block-buttons">
    <!-- wp:button {"style":{"border":{"radius":"9999px"}},"className":"is-style-fill","fontSize":"body-small"} -->
    <div class="wp-block-button has-custom-font-size is-style-fill has-body-small-font-size">
      <a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $cta_url ); ?>" style="border-radius:9999px"><?php echo esc_html( $cta_text ); ?></a>
    </div>
    <!-- /wp:button -->
  </div>
  <!-- /wp:buttons -->
</header>
<!-- /wp:group -->
