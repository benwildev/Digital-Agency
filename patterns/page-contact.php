<?php
/**
 * Title: Agency Contact & Hub Locations
 * Slug: digital-agency/page-contact
 * Categories: digital-agency-pages
 * Description: Strategic contact portal with global hub addresses, direct partner inquiries, and structured intake form.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$business_name  = digital_agency_get_setting( 'agency_business_name', 'Digital Agency' );
$business_email = digital_agency_get_setting( 'agency_email', 'hello@digitalagency.com' );
$business_phone = digital_agency_get_setting( 'agency_phone', '+1 (555) 019-2834' );
$business_addr  = digital_agency_get_setting( 'agency_address', '100 Innovation Blvd, Suite 400, New York, NY 10001' );
$presence       = digital_agency_get_setting( 'agency_locations', 'NYC • London • Singapore' );
$social_tw      = digital_agency_get_setting( 'agency_social_twitter', '' );
$social_li      = digital_agency_get_setting( 'agency_social_linkedin', '' );
$social_gh      = digital_agency_get_setting( 'agency_social_github', '' );
?>
<!-- wp:pattern {"slug":"digital-agency/page-header"} /-->

<!-- wp:group {"tagName":"section","className":"agency-contact-section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-16","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-contact-section has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-16);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|space-12"}}} -->
  <div class="wp-block-columns alignwide">
    <!-- Left: Contact Details & Hubs (42%) -->
    <!-- wp:column {"width":"42%"} -->
    <div class="wp-block-column" style="flex-basis:42%">
      <div style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;padding:3rem 2.5rem;">
        <span class="agency-eyebrow" style="margin-bottom:1.5rem;"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'DIRECT COMMUNICATION', 'digital-agency' ); ?></span>

        <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.75rem;font-weight:800;color:#FFF;margin-bottom:2rem;">
          <?php esc_html_e( 'Engage Our Strategy Pod', 'digital-agency' ); ?>
        </h3>

        <div style="display:flex;flex-direction:column;gap:1.75rem;margin-bottom:2.5rem;">
          <?php if ( ! empty( $business_email ) ) : ?>
            <div>
              <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--text-light-muted);text-transform:uppercase;display:block;margin-bottom:0.25rem;"><?php esc_html_e( 'EMAIL INQUIRIES', 'digital-agency' ); ?></span>
              <a href="<?php echo esc_url( 'mailto:' . antispambot( $business_email ) ); ?>" style="color:#FFF;font-weight:600;font-size:1.125rem;text-decoration:none;"><?php echo esc_html( antispambot( $business_email ) ); ?></a>
            </div>
          <?php endif; ?>

          <?php if ( ! empty( $business_phone ) ) : ?>
            <div>
              <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--text-light-muted);text-transform:uppercase;display:block;margin-bottom:0.25rem;"><?php esc_html_e( 'DIRECT TELEPHONE', 'digital-agency' ); ?></span>
              <a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $business_phone ) ); ?>" style="color:#FFF;font-weight:600;font-size:1.125rem;text-decoration:none;"><?php echo esc_html( $business_phone ); ?></a>
            </div>
          <?php endif; ?>

          <?php if ( ! empty( $business_addr ) ) : ?>
            <div>
              <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--text-light-muted);text-transform:uppercase;display:block;margin-bottom:0.25rem;"><?php esc_html_e( 'HEADQUARTERS', 'digital-agency' ); ?></span>
              <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.5;margin:0;"><?php echo esc_html( $business_addr ); ?></p>
            </div>
          <?php endif; ?>

          <?php if ( ! empty( $presence ) ) : ?>
            <div>
              <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--text-light-muted);text-transform:uppercase;display:block;margin-bottom:0.25rem;"><?php esc_html_e( 'GLOBAL PRESENCE', 'digital-agency' ); ?></span>
              <p style="color:var(--wp--preset--color--primary-accent);font-weight:700;font-size:0.9375rem;margin:0;"><?php echo esc_html( $presence ); ?></p>
            </div>
          <?php endif; ?>
        </div>

        <?php if ( ! empty( $social_tw ) || ! empty( $social_li ) || ! empty( $social_gh ) ) : ?>
          <div style="border-top:1px solid var(--wp--preset--color--border-dark-subtle);padding-top:1.5rem;">
            <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--text-light-muted);text-transform:uppercase;display:block;margin-bottom:0.75rem;"><?php esc_html_e( 'OFFICIAL NETWORKS', 'digital-agency' ); ?></span>
            <div style="display:flex;gap:1rem;">
              <?php if ( ! empty( $social_tw ) ) : ?>
                <a href="<?php echo esc_url( $social_tw ); ?>" target="_blank" rel="noopener noreferrer" style="color:var(--wp--preset--color--primary-accent);text-decoration:none;font-weight:600;font-size:0.875rem;">Twitter / X ↗</a>
              <?php endif; ?>
              <?php if ( ! empty( $social_li ) ) : ?>
                <a href="<?php echo esc_url( $social_li ); ?>" target="_blank" rel="noopener noreferrer" style="color:var(--wp--preset--color--primary-accent);text-decoration:none;font-weight:600;font-size:0.875rem;">LinkedIn ↗</a>
              <?php endif; ?>
              <?php if ( ! empty( $social_gh ) ) : ?>
                <a href="<?php echo esc_url( $social_gh ); ?>" target="_blank" rel="noopener noreferrer" style="color:var(--wp--preset--color--primary-accent);text-decoration:none;font-weight:600;font-size:0.875rem;">GitHub ↗</a>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <!-- /wp:column -->

    <!-- Right: Semantic Contact Form (58%) -->
    <!-- wp:column {"width":"58%"} -->
    <div class="wp-block-column" style="flex-basis:58%">
      <div style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;padding:3rem 2.5rem;">
        <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.75rem;font-weight:800;color:#FFF;margin-bottom:1rem;">
          <?php esc_html_e( 'Request Consultation', 'digital-agency' ); ?>
        </h3>
        <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.6;margin-bottom:2rem;">
          <?php esc_html_e( 'Provide preliminary details regarding your current engagement goals. Our managing partners will review and respond within 24 business hours.', 'digital-agency' ); ?>
        </p>

        <!-- wp:html -->
        <form class="agency-contact-form" action="<?php echo esc_url( home_url( '/contact/' ) ); ?>" method="post" style="display:flex;flex-direction:column;gap:1.25rem;">
          <div class="agency-lead-form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
            <div>
              <label for="contact-name" class="screen-reader-text"><?php esc_html_e( 'Your Name', 'digital-agency' ); ?></label>
              <input type="text" id="contact-name" name="contact_name" placeholder="<?php esc_attr_e( 'Your Full Name *', 'digital-agency' ); ?>" required autocomplete="name" />
            </div>
            <div>
              <label for="contact-email" class="screen-reader-text"><?php esc_html_e( 'Work Email', 'digital-agency' ); ?></label>
              <input type="email" id="contact-email" name="contact_email" placeholder="<?php esc_attr_e( 'Work Email *', 'digital-agency' ); ?>" required autocomplete="email" />
            </div>
          </div>

          <div class="agency-lead-form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
            <div>
              <label for="contact-company" class="screen-reader-text"><?php esc_html_e( 'Company / Organization', 'digital-agency' ); ?></label>
              <input type="text" id="contact-company" name="contact_company" placeholder="<?php esc_attr_e( 'Company / Website', 'digital-agency' ); ?>" autocomplete="organization" />
            </div>
            <div>
              <label for="contact-budget" class="screen-reader-text"><?php esc_html_e( 'Expected Monthly Budget', 'digital-agency' ); ?></label>
              <select id="contact-budget" name="contact_budget" style="color:var(--wp--preset--color--text-light-primary);background:var(--wp--preset--color--surface-dark-card);">
                <option value=""><?php esc_html_e( 'Target Monthly Budget...', 'digital-agency' ); ?></option>
                <option value="tier_1">$2,500 – $5,000 / mo</option>
                <option value="tier_2">$5,000 – $10,000 / mo</option>
                <option value="tier_3">$10,000 – $25,000+ / mo</option>
                <option value="bespoke"><?php esc_html_e( 'Bespoke Platform Build', 'digital-agency' ); ?></option>
              </select>
            </div>
          </div>

          <div>
            <label for="contact-message" class="screen-reader-text"><?php esc_html_e( 'Brief Project Overview', 'digital-agency' ); ?></label>
            <textarea id="contact-message" name="contact_message" rows="5" placeholder="<?php esc_attr_e( 'Describe your growth objectives, target metrics, or existing bottlenecks...', 'digital-agency' ); ?>" required></textarea>
          </div>

          <button type="submit" class="wp-block-button__link wp-element-button" style="background-color:var(--wp--preset--color--primary-accent);color:var(--wp--preset--color--surface-dark-base);font-weight:700;font-size:1rem;padding:1rem;border-radius:10px;border:none;cursor:pointer;width:100%;transition:opacity 0.2s;">
            <?php esc_html_e( 'Submit Consultation Request ↗', 'digital-agency' ); ?>
          </button>
        </form>
        <!-- /wp:html -->
      </div>
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</section>
<!-- /wp:group -->
