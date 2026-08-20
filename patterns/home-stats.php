<?php
/**
 * Title: Homepage Statistics & Impact Metrics
 * Slug: digital-agency/home-stats
 * Categories: digital-agency-general
 * Description: 4-column high-impact metrics and numbers counter strip.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"tagName":"section","className":"agency-stats-section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-16","bottom":"var:preset|spacing|space-16","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-card"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-stats-section has-surface-dark-card-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-16);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-16);padding-left:var(--wp--preset--spacing--space-5);border-top:1px solid var(--wp--preset--color--border-dark-subtle);border-bottom:1px solid var(--wp--preset--color--border-dark-subtle);">
  <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|space-8"}}} -->
  <div class="wp-block-columns alignwide">
    <!-- wp:column -->
    <div class="wp-block-column agency-stat-item">
      <div style="font-family:var(--wp--preset--font-family--syne);font-size:3.5rem;font-weight:800;color:var(--wp--preset--color--primary-accent);line-height:1;margin-bottom:0.5rem;">10+</div>
      <p style="color:var(--wp--preset--color--text-light-primary);font-weight:600;font-size:1.125rem;margin:0 0 0.25rem 0;"><?php esc_html_e( 'Years of Excellence', 'digital-agency' ); ?></p>
      <p style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;margin:0;"><?php esc_html_e( 'Pioneering digital strategies globally', 'digital-agency' ); ?></p>
    </div>
    <!-- /wp:column -->

    <!-- wp:column -->
    <div class="wp-block-column agency-stat-item">
      <div style="font-family:var(--wp--preset--font-family--syne);font-size:3.5rem;font-weight:800;color:var(--wp--preset--color--primary-accent);line-height:1;margin-bottom:0.5rem;">350+</div>
      <p style="color:var(--wp--preset--color--text-light-primary);font-weight:600;font-size:1.125rem;margin:0 0 0.25rem 0;"><?php esc_html_e( 'Projects Delivered', 'digital-agency' ); ?></p>
      <p style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;margin:0;"><?php esc_html_e( 'From early startups to Fortune 500', 'digital-agency' ); ?></p>
    </div>
    <!-- /wp:column -->

    <!-- wp:column -->
    <div class="wp-block-column agency-stat-item">
      <div style="font-family:var(--wp--preset--font-family--syne);font-size:3.5rem;font-weight:800;color:var(--wp--preset--color--primary-accent);line-height:1;margin-bottom:0.5rem;">99%</div>
      <p style="color:var(--wp--preset--color--text-light-primary);font-weight:600;font-size:1.125rem;margin:0 0 0.25rem 0;"><?php esc_html_e( 'Client Retention', 'digital-agency' ); ?></p>
      <p style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;margin:0;"><?php esc_html_e( 'Multi-year strategic partnerships', 'digital-agency' ); ?></p>
    </div>
    <!-- /wp:column -->

    <!-- wp:column -->
    <div class="wp-block-column agency-stat-item">
      <div style="font-family:var(--wp--preset--font-family--syne);font-size:3.5rem;font-weight:800;color:var(--wp--preset--color--primary-accent);line-height:1;margin-bottom:0.5rem;">24</div>
      <p style="color:var(--wp--preset--color--text-light-primary);font-weight:600;font-size:1.125rem;margin:0 0 0.25rem 0;"><?php esc_html_e( 'Industry Honors', 'digital-agency' ); ?></p>
      <p style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;margin:0;"><?php esc_html_e( 'Awwwards, Clutch & Webby recognized', 'digital-agency' ); ?></p>
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</section>
<!-- /wp:group -->
