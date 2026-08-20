<?php
/**
 * Title: Agency About & Culture Layout
 * Slug: digital-agency/page-about
 * Categories: digital-agency-pages
 * Description: Editorial about page detailing studio philosophy, performance methodology, executive team, and credentials.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$business_name = digital_agency_get_setting( 'agency_business_name', 'Benwil Digital Agency' );
?>
<!-- wp:pattern {"slug":"digital-agency/page-header"} /-->

<!-- wp:group {"tagName":"section","className":"agency-about-manifesto","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-16","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-about-manifesto has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-16);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|space-12"}},"verticalAlignment":"center"} -->
  <div class="wp-block-columns alignwide are-vertically-aligned-center">
    <!-- wp:column {"width":"50%"} -->
    <div class="wp-block-column" style="flex-basis:50%">
      <!-- wp:paragraph {"className":"agency-eyebrow"} -->
      <p class="agency-eyebrow"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'OUR STUDIO PHILOSOPHY', 'digital-agency' ); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"800"}},"fontSize":"display-large"} -->
      <h2 class="wp-block-heading has-display-large-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:800;letter-spacing:-0.02em;">
        <?php esc_html_e( 'Engineering unfair market advantages for ambitious brands.', 'digital-agency' ); ?>
      </h2>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|text-light-secondary"},"spacing":{"margin":{"top":"var:preset|spacing|space-6"}}},"fontSize":"body-large"} -->
      <p class="has-text-light-secondary-color has-text-color has-body-large-font-size" style="margin-top:var(--wp--preset--spacing--space-6);line-height:1.7;">
        <?php echo esc_html( sprintf( __( 'Founded with a clear mandate, %s operates as a specialized growth acceleration studio. We dismantle legacy marketing bloat and deploy rigorous engineering principles across search, paid media, and web platforms.', 'digital-agency' ), $business_name ) ); ?>
      </p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"50%"} -->
    <div class="wp-block-column" style="flex-basis:50%">
      <div style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;padding:3rem;display:flex;flex-direction:column;gap:1.75rem;">
        <div>
          <span style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:800;color:var(--wp--preset--color--primary-accent);">01. Full-Funnel Ownership</span>
          <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.6;margin-top:0.35rem;"><?php esc_html_e( 'We eliminate agency silos by connecting customer acquisition directly with platform performance.', 'digital-agency' ); ?></p>
        </div>
        <hr class="wp-block-separator has-border-dark-subtle-color has-background" style="margin:0;" />
        <div>
          <span style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:800;color:var(--wp--preset--color--primary-accent);">02. Performance Engineering</span>
          <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.6;margin-top:0.35rem;"><?php esc_html_e( 'Every web asset is built with sub-second speeds, accessible semantic markup, and zero-compromise code quality.', 'digital-agency' ); ?></p>
        </div>
        <hr class="wp-block-separator has-border-dark-subtle-color has-background" style="margin:0;" />
        <div>
          <span style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:800;color:var(--wp--preset--color--primary-accent);">03. Radical Transparency</span>
          <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.6;margin-top:0.35rem;"><?php esc_html_e( 'Real-time telemetry, clear ROI attribution, and no vanity metrics.', 'digital-agency' ); ?></p>
        </div>
      </div>
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</section>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"digital-agency/home-stats"} /-->
<!-- wp:pattern {"slug":"digital-agency/home-process"} /-->
<!-- wp:pattern {"slug":"digital-agency/home-team"} /-->
<!-- wp:pattern {"slug":"digital-agency/home-awards"} /-->
