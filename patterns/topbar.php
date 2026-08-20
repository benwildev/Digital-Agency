<?php
/**
 * Title: Global Top Utility Bar
 * Slug: digital-agency/topbar
 * Categories: digital-agency-header
 * Description: Compact top bar displaying global agency contact information and presence indicator.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$email     = digital_agency_get_setting( 'agency_email', 'hello@digitalagency.com' );
$phone     = digital_agency_get_setting( 'agency_phone', '+1 (555) 019-2834' );
$locations = digital_agency_get_setting( 'agency_office_locations', 'NYC • LONDON • SINGAPORE' );
?>
<!-- wp:group {"tagName":"div","className":"agency-topbar","style":{"spacing":{"padding":{"top":"0.6rem","bottom":"0.6rem","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base","text":"var:preset|color|text-light-muted"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
<div class="wp-block-group agency-topbar has-text-light-muted-color has-surface-dark-base-background-color has-text-color has-background" style="padding-top:0.6rem;padding-right:var(--wp--preset--spacing--space-5);padding-bottom:0.6rem;padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|space-5"}}} -->
  <div class="wp-block-group">
    <?php if ( ! empty( $email ) ) : ?>
      <!-- wp:paragraph {"fontSize":"caption-eyebrow"} -->
      <p class="has-caption-eyebrow-font-size">
        <a href="<?php echo esc_url( 'mailto:' . antispambot( $email ) ); ?>" class="agency-topbar__item">
          <span class="agency-topbar__icon">✉</span> <?php echo esc_html( antispambot( $email ) ); ?>
        </a>
      </p>
      <!-- /wp:paragraph -->
    <?php endif; ?>

    <?php if ( ! empty( $phone ) ) : ?>
      <!-- wp:paragraph {"fontSize":"caption-eyebrow"} -->
      <p class="has-caption-eyebrow-font-size">
        <a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>" class="agency-topbar__item">
          <span class="agency-topbar__icon">☎</span> <?php echo esc_html( $phone ); ?>
        </a>
      </p>
      <!-- /wp:paragraph -->
    <?php endif; ?>
  </div>
  <!-- /wp:group -->

  <?php if ( ! empty( $locations ) ) : ?>
    <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|space-4"}}} -->
    <div class="wp-block-group">
      <!-- wp:paragraph {"fontSize":"caption-eyebrow"} -->
      <p class="has-caption-eyebrow-font-size">GLOBAL PRESENCE: <span style="color:var(--wp--preset--color--primary-accent)"><?php echo esc_html( $locations ); ?></span></p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
  <?php endif; ?>
</div>
<!-- /wp:group -->
