<?php
/**
 * Title: Homepage Lead Capture & Consultation CTA
 * Slug: digital-agency/home-cta
 * Categories: digital-agency-cta
 * Description: High-conversion lead generation card with structured consultation request form.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$business_email = digital_agency_get_setting( 'agency_email', 'hello@digitalagency.com' );
$business_phone = digital_agency_get_setting( 'agency_phone', '+1 (555) 019-2834' );
?>
<!-- wp:group {"tagName":"section","className":"agency-home-cta-section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-20","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-card"}},"layout":{"type":"constrained"}} -->
<section id="contact" class="wp-block-group alignfull agency-home-cta-section has-surface-dark-card-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-20);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <div style="background:var(--wp--preset--color--surface-dark-elevated);border:1px solid rgba(200, 245, 96, 0.3);border-radius:28px;padding:4rem 3rem;max-width:1300px;margin:0 auto;box-shadow:0 0 50px rgba(200, 245, 96, 0.05);">
    <!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|space-12"}},"verticalAlignment":"center"} -->
    <div class="wp-block-columns are-vertically-aligned-center">
      <!-- wp:column {"width":"48%"} -->
      <div class="wp-block-column" style="flex-basis:48%">
        <!-- wp:paragraph {"className":"agency-eyebrow"} -->
        <p class="agency-eyebrow"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'START YOUR TRANSFORMATION', 'digital-agency' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"800","letterSpacing":"-0.02em"}},"fontSize":"display-large"} -->
        <h2 class="wp-block-heading has-display-large-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:800;letter-spacing:-0.02em;word-break:normal;hyphens:none;">
          <?php esc_html_e( 'Ready to Scale to Market Dominance?', 'digital-agency' ); ?>
        </h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|text-light-secondary"},"spacing":{"margin":{"top":"var:preset|spacing|space-4","bottom":"var:preset|spacing|space-8"}}},"fontSize":"body-large"} -->
        <p class="has-text-light-secondary-color has-text-color has-body-large-font-size" style="margin-top:var(--wp--preset--spacing--space-4);margin-bottom:var(--wp--preset--spacing--space-8);">
          <?php esc_html_e( 'Schedule a strategic growth consultation. We will audit your current positioning, identify high-yield conversion gaps, and formulate a customized 90-day roadmap.', 'digital-agency' ); ?>
        </p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|space-6"}}} -->
        <div class="wp-block-group">
          <?php if ( ! empty( $business_email ) ) : ?>
            <div>
              <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--text-light-muted);text-transform:uppercase;display:block;margin-bottom:0.25rem;"><?php esc_html_e( 'DIRECT INQUIRIES', 'digital-agency' ); ?></span>
              <a href="<?php echo esc_url( 'mailto:' . antispambot( $business_email ) ); ?>" style="color:#FFF;font-weight:600;text-decoration:none;font-size:1.0625rem;"><?php echo esc_html( antispambot( $business_email ) ); ?></a>
            </div>
          <?php endif; ?>

          <?php if ( ! empty( $business_phone ) ) : ?>
            <div>
              <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--text-light-muted);text-transform:uppercase;display:block;margin-bottom:0.25rem;"><?php esc_html_e( 'SCHEDULE A CALL', 'digital-agency' ); ?></span>
              <a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $business_phone ) ); ?>" style="color:#FFF;font-weight:600;text-decoration:none;font-size:1.0625rem;"><?php echo esc_html( $business_phone ); ?></a>
            </div>
          <?php endif; ?>
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:column -->

      <!-- wp:column {"width":"52%"} -->
      <div class="wp-block-column" style="flex-basis:52%">
        <!-- wp:html -->
        <form class="agency-lead-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post" style="display:flex;flex-direction:column;gap:1.25rem;background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;padding:2.5rem;">
          <div class="agency-lead-form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
            <div>
              <label for="lead-name" class="screen-reader-text"><?php esc_html_e( 'Your Name', 'digital-agency' ); ?></label>
              <input type="text" id="lead-name" name="lead_name" placeholder="<?php esc_attr_e( 'Your Name *', 'digital-agency' ); ?>" required autocomplete="name" />
            </div>
            <div>
              <label for="lead-email" class="screen-reader-text"><?php esc_html_e( 'Work Email', 'digital-agency' ); ?></label>
              <input type="email" id="lead-email" name="lead_email" placeholder="<?php esc_attr_e( 'Work Email *', 'digital-agency' ); ?>" required autocomplete="email" />
            </div>
          </div>

          <div class="agency-lead-form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
            <div>
              <label for="lead-company" class="screen-reader-text"><?php esc_html_e( 'Company Name', 'digital-agency' ); ?></label>
              <input type="text" id="lead-company" name="lead_company" placeholder="<?php esc_attr_e( 'Company / Website', 'digital-agency' ); ?>" autocomplete="organization" />
            </div>
            <div>
              <label for="lead-service" class="screen-reader-text"><?php esc_html_e( 'Primary Objective', 'digital-agency' ); ?></label>
              <select id="lead-service" name="lead_service" style="color:var(--wp--preset--color--text-light-primary);background:var(--wp--preset--color--surface-dark-card);">
                <option value=""><?php esc_html_e( 'Select Primary Objective...', 'digital-agency' ); ?></option>
                <option value="seo"><?php esc_html_e( 'Search Engine Optimization (SEO)', 'digital-agency' ); ?></option>
                <option value="performance_ads"><?php esc_html_e( 'Performance Media / Paid Ads', 'digital-agency' ); ?></option>
                <option value="web_engineering"><?php esc_html_e( 'Bespoke Web Platform / Redesign', 'digital-agency' ); ?></option>
                <option value="brand_design"><?php esc_html_e( 'Brand Strategy & Identity', 'digital-agency' ); ?></option>
                <option value="full_retainer"><?php esc_html_e( 'Full-Funnel Growth Retainer', 'digital-agency' ); ?></option>
              </select>
            </div>
          </div>

          <div>
            <label for="lead-message" class="screen-reader-text"><?php esc_html_e( 'Project Details', 'digital-agency' ); ?></label>
            <textarea id="lead-message" name="lead_message" rows="3" placeholder="<?php esc_attr_e( 'Tell us about your current targets, timeline, and challenges...', 'digital-agency' ); ?>"></textarea>
          </div>

          <button type="submit" class="wp-block-button__link wp-element-button" style="background-color:var(--wp--preset--color--primary-accent);color:var(--wp--preset--color--surface-dark-base);font-weight:700;font-size:1rem;padding:1rem;border-radius:10px;border:none;cursor:pointer;width:100%;transition:opacity 0.2s;">
            <?php esc_html_e( 'Request Strategic Consultation ↗', 'digital-agency' ); ?>
          </button>
        </form>
        <!-- /wp:html -->
      </div>
      <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
  </div>
</section>
<!-- /wp:group -->
