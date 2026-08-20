<?php
/**
 * Title: Homepage Awards & Recognition Strip
 * Slug: digital-agency/home-awards
 * Categories: digital-agency-about
 * Description: 4-column industry recognition and credential strip (customizable demo credentials).
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"tagName":"section","className":"agency-awards-section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-12","bottom":"var:preset|spacing|space-12","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-elevated"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-awards-section has-surface-dark-elevated-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-12);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-12);padding-left:var(--wp--preset--spacing--space-5);border-top:1px solid var(--wp--preset--color--border-dark-subtle);border-bottom:1px solid var(--wp--preset--color--border-dark-subtle);">
  <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|space-8"}},"verticalAlignment":"center"} -->
  <div class="wp-block-columns alignwide are-vertically-aligned-center">
    <div class="wp-block-column" style="text-align:center;">
      <span style="color:var(--wp--preset--color--primary-accent);font-size:1.5rem;display:block;margin-bottom:0.25rem;">🏆</span>
      <strong style="color:#FFF;font-size:0.9375rem;display:block;"><?php esc_html_e( 'Awwwards Honoree', 'digital-agency' ); ?></strong>
      <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.75rem;"><?php esc_html_e( 'Excellence in Web Design', 'digital-agency' ); ?></span>
    </div>

    <div class="wp-block-column" style="text-align:center;">
      <span style="color:var(--wp--preset--color--primary-accent);font-size:1.5rem;display:block;margin-bottom:0.25rem;">⭐</span>
      <strong style="color:#FFF;font-size:0.9375rem;display:block;"><?php esc_html_e( 'Clutch Top 1% Global', 'digital-agency' ); ?></strong>
      <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.75rem;"><?php esc_html_e( 'Verified B2B Leadership', 'digital-agency' ); ?></span>
    </div>

    <div class="wp-block-column" style="text-align:center;">
      <span style="color:var(--wp--preset--color--primary-accent);font-size:1.5rem;display:block;margin-bottom:0.25rem;">🚀</span>
      <strong style="color:#FFF;font-size:0.9375rem;display:block;"><?php esc_html_e( 'Google Premier Partner', 'digital-agency' ); ?></strong>
      <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.75rem;"><?php esc_html_e( 'Top 3% Agency Tier', 'digital-agency' ); ?></span>
    </div>

    <div class="wp-block-column" style="text-align:center;">
      <span style="color:var(--wp--preset--color--primary-accent);font-size:1.5rem;display:block;margin-bottom:0.25rem;">🌐</span>
      <strong style="color:#FFF;font-size:0.9375rem;display:block;"><?php esc_html_e( 'Webby Award Nominee', 'digital-agency' ); ?></strong>
      <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.75rem;"><?php esc_html_e( 'Digital Performance Category', 'digital-agency' ); ?></span>
    </div>
  </div>
  <!-- /wp:columns -->
</section>
<!-- /wp:group -->
