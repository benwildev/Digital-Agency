<?php
/**
 * Title: Homepage 4-Step Growth Process
 * Slug: digital-agency/home-process
 * Categories: digital-agency-about
 * Description: 4-column numbered process cards detailing the agency workflow framework.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"tagName":"section","className":"agency-process-section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-20","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-process-section has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-20);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <div style="text-align:center;max-width:720px;margin:0 auto var(--wp--preset--spacing--space-16) auto;">
    <!-- wp:paragraph {"className":"agency-eyebrow"} -->
    <p class="agency-eyebrow" style="justify-content:center;"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'HOW WE WORK', 'digital-agency' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}},"fontSize":"heading-2"} -->
    <h2 class="wp-block-heading has-heading-2-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( 'Our Streamlined 4-Step Growth Framework', 'digital-agency' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|text-light-secondary"}},"fontSize":"body-regular"} -->
    <p class="has-text-light-secondary-color has-text-color has-body-regular-font-size"><?php esc_html_e( 'A systematic methodology designed to de-risk expansion and compound ROI from Day 1.', 'digital-agency' ); ?></p>
    <!-- /wp:paragraph -->
  </div>

  <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|space-6"}}} -->
  <div class="wp-block-columns alignwide">
    <!-- Step 1 -->
    <!-- wp:column -->
    <div class="wp-block-column agency-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;padding:2rem;">
      <span style="font-family:var(--wp--preset--font-family--syne);font-size:2rem;font-weight:800;color:var(--wp--preset--color--primary-accent);display:block;margin-bottom:1rem;">01</span>
      <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.25rem;font-weight:700;color:#FFF;margin-bottom:0.75rem;"><?php esc_html_e( 'Research & Discovery', 'digital-agency' ); ?></h3>
      <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.875rem;line-height:1.6;margin:0;"><?php esc_html_e( 'Comprehensive technical audits, competitor benchmarking, audience intent mapping, and analytics setup.', 'digital-agency' ); ?></p>
    </div>
    <!-- /wp:column -->

    <!-- Step 2 -->
    <!-- wp:column -->
    <div class="wp-block-column agency-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;padding:2rem;">
      <span style="font-family:var(--wp--preset--font-family--syne);font-size:2rem;font-weight:800;color:var(--wp--preset--color--primary-accent);display:block;margin-bottom:1rem;">02</span>
      <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.25rem;font-weight:700;color:#FFF;margin-bottom:0.75rem;"><?php esc_html_e( 'Strategy & Roadmapping', 'digital-agency' ); ?></h3>
      <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.875rem;line-height:1.6;margin:0;"><?php esc_html_e( 'Architecting custom growth sprints, high-converting UX wireframes, and precise keyword/channel allocations.', 'digital-agency' ); ?></p>
    </div>
    <!-- /wp:column -->

    <!-- Step 3 -->
    <!-- wp:column -->
    <div class="wp-block-column agency-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;padding:2rem;">
      <span style="font-family:var(--wp--preset--font-family--syne);font-size:2rem;font-weight:800;color:var(--wp--preset--color--primary-accent);display:block;margin-bottom:1rem;">03</span>
      <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.25rem;font-weight:700;color:#FFF;margin-bottom:0.75rem;"><?php esc_html_e( 'Execution & Launch', 'digital-agency' ); ?></h3>
      <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.875rem;line-height:1.6;margin:0;"><?php esc_html_e( 'Engineering high-speed web platforms, creative production, and targeted paid campaign launches.', 'digital-agency' ); ?></p>
    </div>
    <!-- /wp:column -->

    <!-- Step 4 -->
    <!-- wp:column -->
    <div class="wp-block-column agency-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;padding:2rem;">
      <span style="font-family:var(--wp--preset--font-family--syne);font-size:2rem;font-weight:800;color:var(--wp--preset--color--primary-accent);display:block;margin-bottom:1rem;">04</span>
      <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.25rem;font-weight:700;color:#FFF;margin-bottom:0.75rem;"><?php esc_html_e( 'Optimization & Scale', 'digital-agency' ); ?></h3>
      <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.875rem;line-height:1.6;margin:0;"><?php esc_html_e( 'Continuous multivariate A/B testing, budget scaling, and expanding into new high-yield market segments.', 'digital-agency' ); ?></p>
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</section>
<!-- /wp:group -->
