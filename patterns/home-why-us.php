<?php
/**
 * Title: Homepage Why Choose Us / Differentiation
 * Slug: digital-agency/home-why-us
 * Categories: digital-agency-about
 * Description: 50/50 split layout highlighting strategic agency advantages and client ROI metrics.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"tagName":"section","className":"agency-why-us-section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-20","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-card"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-why-us-section has-surface-dark-card-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-20);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|space-12"}},"verticalAlignment":"center"} -->
  <div class="wp-block-columns alignwide are-vertically-aligned-center">
    <!-- wp:column {"width":"52%"} -->
    <div class="wp-block-column" style="flex-basis:52%">
      <!-- wp:paragraph {"className":"agency-eyebrow"} -->
      <p class="agency-eyebrow"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'WHY PARTNER WITH US', 'digital-agency' ); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}},"fontSize":"heading-2"} -->
      <h2 class="wp-block-heading has-heading-2-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( "We Don't Just Run Campaigns. We Build Growth Infrastructure.", 'digital-agency' ); ?></h2>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|text-light-secondary"},"spacing":{"margin":{"top":"var:preset|spacing|space-4","bottom":"var:preset|spacing|space-6"}}},"fontSize":"body-regular"} -->
      <p class="has-text-light-secondary-color has-text-color has-body-regular-font-size" style="margin-top:var(--wp--preset--spacing--space-4);margin-bottom:var(--wp--preset--spacing--space-6);">
        <?php esc_html_e( 'Traditional marketing agencies deliver fragmented tactics. We architect holistic revenue engines combining data intelligence, brand authority, and high-performance web engineering.', 'digital-agency' ); ?>
      </p>
      <!-- /wp:paragraph -->

      <!-- wp:html -->
      <ul style="list-style:none;padding:0;margin:0 0 2rem 0;display:flex;flex-direction:column;gap:1rem;">
        <li style="display:flex;align-items:flex-start;gap:0.75rem;">
          <span style="color:var(--wp--preset--color--primary-accent);font-weight:bold;font-size:1.125rem;">✓</span>
          <div>
            <strong style="color:#FFF;display:block;margin-bottom:0.25rem;"><?php esc_html_e( 'Proprietary Growth Frameworks', 'digital-agency' ); ?></strong>
            <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;"><?php esc_html_e( 'Data-backed execution tailored precisely to your unit economics and CAC targets.', 'digital-agency' ); ?></span>
          </div>
        </li>
        <li style="display:flex;align-items:flex-start;gap:0.75rem;">
          <span style="color:var(--wp--preset--color--primary-accent);font-weight:bold;font-size:1.125rem;">✓</span>
          <div>
            <strong style="color:#FFF;display:block;margin-bottom:0.25rem;"><?php esc_html_e( 'Sub-Second Web Engineering', 'digital-agency' ); ?></strong>
            <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;"><?php esc_html_e( 'Clean, bloat-free WordPress Block Theme architecture optimized for 95+ Core Web Vitals.', 'digital-agency' ); ?></span>
          </div>
        </li>
        <li style="display:flex;align-items:flex-start;gap:0.75rem;">
          <span style="color:var(--wp--preset--color--primary-accent);font-weight:bold;font-size:1.125rem;">✓</span>
          <div>
            <strong style="color:#FFF;display:block;margin-bottom:0.25rem;"><?php esc_html_e( 'Full-Funnel Revenue Attribution', 'digital-agency' ); ?></strong>
            <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;"><?php esc_html_e( 'Granular analytics and transparent dashboard reporting with zero vanity metrics.', 'digital-agency' ); ?></span>
          </div>
        </li>
        <li style="display:flex;align-items:flex-start;gap:0.75rem;">
          <span style="color:var(--wp--preset--color--primary-accent);font-weight:bold;font-size:1.125rem;">✓</span>
          <div>
            <strong style="color:#FFF;display:block;margin-bottom:0.25rem;"><?php esc_html_e( 'Dedicated Senior Pods', 'digital-agency' ); ?></strong>
            <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;"><?php esc_html_e( 'Direct access to senior strategists, designers, and engineers — never outsourced juniors.', 'digital-agency' ); ?></span>
          </div>
        </li>
      </ul>
      <!-- /wp:html -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"48%"} -->
    <div class="wp-block-column" style="flex-basis:48%">
      <div style="background:var(--wp--preset--color--surface-dark-elevated);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;padding:3rem;position:relative;text-align:center;">
        <div style="font-family:var(--wp--preset--font-family--syne);font-size:4.5rem;font-weight:800;color:var(--wp--preset--color--primary-accent);line-height:1;margin-bottom:1rem;">4.8x</div>
        <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:700;color:#FFF;margin-bottom:1rem;"><?php esc_html_e( 'Average Client ROAS Across Paid Channels', 'digital-agency' ); ?></h3>
        <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;max-width:400px;margin:0 auto;"><?php esc_html_e( 'Measured across over $25M in annual managed advertising spend across Google, Meta, and LinkedIn.', 'digital-agency' ); ?></p>
      </div>
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</section>
<!-- /wp:group -->
