<?php
/**
 * Title: Homepage Hero Section
 * Slug: digital-agency/home-hero
 * Categories: digital-agency-hero
 * Description: Bold high-contrast hero section with dual CTAs, eyebrow badge, floating metrics, and hero visual container.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cta_text = digital_agency_get_setting( 'agency_primary_cta_text', __( 'Get a Quote', 'digital-agency' ) );
$cta_url  = digital_agency_get_setting( 'agency_primary_cta_url', '#contact' );
?>
<!-- wp:group {"tagName":"section","className":"agency-hero-section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-20","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-hero-section has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-20);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|space-12"}},"verticalAlignment":"center"} -->
  <div class="wp-block-columns alignwide are-vertically-aligned-center">
    <!-- wp:column {"width":"58%"} -->
    <div class="wp-block-column" style="flex-basis:58%">
      <!-- wp:paragraph {"className":"agency-eyebrow"} -->
      <p class="agency-eyebrow"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'AWARD-WINNING DIGITAL MARKETING AGENCY', 'digital-agency' ); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"level":1,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"800","lineHeight":"1.1","letterSpacing":"-0.03em"}},"fontSize":"display-hero"} -->
      <h1 class="wp-block-heading has-display-hero-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:800;line-height:1.1;letter-spacing:-0.03em;word-break:normal;hyphens:none;">
        <?php esc_html_e( 'Empowering Brands Through', 'digital-agency' ); ?> <span style="color:var(--wp--preset--color--primary-accent);font-style:italic;"><?php esc_html_e( 'Next-Gen', 'digital-agency' ); ?></span> <?php esc_html_e( 'Digital Scale', 'digital-agency' ); ?>
      </h1>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|text-light-secondary"},"spacing":{"margin":{"top":"var:preset|spacing|space-6","bottom":"var:preset|spacing|space-8"}}},"fontSize":"body-large"} -->
      <p class="has-text-light-secondary-color has-text-color has-body-large-font-size" style="margin-top:var(--wp--preset--spacing--space-6);margin-bottom:var(--wp--preset--spacing--space-8);max-width:580px;">
        <?php esc_html_e( 'We architect data-driven performance marketing, bespoke web platforms, and authoritative brand identities that dominate competitive markets.', 'digital-agency' ); ?>
      </p>
      <!-- /wp:paragraph -->

      <!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|space-4"}}} -->
      <div class="wp-block-buttons">
        <!-- wp:button {"style":{"border":{"radius":"9999px"}},"className":"is-style-fill","fontSize":"body-regular"} -->
        <div class="wp-block-button has-custom-font-size is-style-fill has-body-regular-font-size">
          <a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $cta_url ); ?>" style="border-radius:9999px;font-weight:700;padding:1rem 2rem;"><?php echo esc_html( $cta_text ); ?></a>
        </div>
        <!-- /wp:button -->

        <!-- wp:button {"style":{"border":{"radius":"9999px"}},"className":"is-style-outline","fontSize":"body-regular"} -->
        <div class="wp-block-button has-custom-font-size is-style-outline has-body-regular-font-size">
          <a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" style="border-radius:9999px;font-weight:600;padding:1rem 2rem;"><?php esc_html_e( 'Explore Our Work ↗', 'digital-agency' ); ?></a>
        </div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->

      <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|space-10"},"blockGap":"var:preset|spacing|space-4"}}} -->
      <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--space-10)">
        <div class="agency-metric-pill">
          <span>★ 4.9/5 Rating</span>
        </div>
        <!-- wp:paragraph {"fontSize":"caption-eyebrow","style":{"color":{"text":"var:preset|color|text-light-muted"}}} -->
        <p class="has-text-light-muted-color has-text-color has-caption-eyebrow-font-size"><?php esc_html_e( 'Trusted by 250+ enterprise leaders and fast-scaling brands worldwide.', 'digital-agency' ); ?></p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"42%"} -->
    <div class="wp-block-column" style="flex-basis:42%">
      <div class="agency-hero-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;padding:2.5rem;position:relative;box-shadow:0 20px 40px rgba(0,0,0,0.5);">
        <!-- wp:paragraph {"className":"agency-eyebrow"} -->
        <p class="agency-eyebrow" style="margin-bottom:1.5rem;"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'GROWTH BENCHMARK', 'digital-agency' ); ?></p>
        <!-- /wp:paragraph -->
        
        <div style="font-family:var(--wp--preset--font-family--syne);font-size:3.5rem;font-weight:800;color:var(--wp--preset--color--primary-accent);line-height:1;margin-bottom:0.5rem;">+320%</div>
        <p style="color:var(--wp--preset--color--text-light-primary);font-weight:600;font-size:1.125rem;margin-bottom:1.5rem;"><?php esc_html_e( 'Average Organic Growth Across Client Engagements', 'digital-agency' ); ?></p>
        
        <hr class="wp-block-separator has-border-dark-subtle-color has-background" style="margin:1.5rem 0;" />
        
        <div style="display:flex;justify-content:space-between;color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;">
          <span><?php esc_html_e( 'Retention Rate', 'digital-agency' ); ?>: <strong style="color:#FFF;">99.2%</strong></span>
          <span><?php esc_html_e( 'Campaign ROI', 'digital-agency' ); ?>: <strong style="color:var(--wp--preset--color--primary-accent);">4.8x</strong></span>
        </div>
      </div>
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</section>
<!-- /wp:group -->
