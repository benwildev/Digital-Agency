<?php
/**
 * Title: Homepage FAQ Accordion
 * Slug: digital-agency/home-faq
 * Categories: digital-agency-general
 * Description: 2-column accessible FAQ accordion utilizing native HTML5 details and summary elements.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"tagName":"section","className":"agency-faq-section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-20","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-faq-section has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-20);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|space-12"}}} -->
  <div class="wp-block-columns alignwide">
    <!-- wp:column {"width":"40%"} -->
    <div class="wp-block-column" style="flex-basis:40%">
      <!-- wp:paragraph {"className":"agency-eyebrow"} -->
      <p class="agency-eyebrow"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'FREQUENTLY ASKED QUESTIONS', 'digital-agency' ); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}},"fontSize":"heading-2"} -->
      <h2 class="wp-block-heading has-heading-2-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( 'Answers to Strategic & Operational Inquiries', 'digital-agency' ); ?></h2>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|text-light-secondary"},"spacing":{"margin":{"top":"var:preset|spacing|space-4","bottom":"var:preset|spacing|space-8"}}},"fontSize":"body-regular"} -->
      <p class="has-text-light-secondary-color has-text-color has-body-regular-font-size" style="margin-top:var(--wp--preset--spacing--space-4);margin-bottom:var(--wp--preset--spacing--space-8);">
        <?php esc_html_e( "Have a specific question not covered here? Schedule a discovery call with our partners to discuss your brand's growth roadmap.", 'digital-agency' ); ?>
      </p>
      <!-- /wp:paragraph -->

      <!-- wp:buttons {"layout":{"type":"flex"}} -->
      <div class="wp-block-buttons">
        <!-- wp:button {"style":{"border":{"radius":"9999px"}},"className":"is-style-outline","fontSize":"body-small"} -->
        <div class="wp-block-button has-custom-font-size is-style-outline has-body-small-font-size">
          <a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="border-radius:9999px;font-weight:600;padding:0.75rem 1.5rem;"><?php esc_html_e( 'Contact Our Team ↗', 'digital-agency' ); ?></a>
        </div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"60%"} -->
    <div class="wp-block-column" style="flex-basis:60%">
      <!-- wp:html -->
      <div class="agency-faq-accordion" style="display:flex;flex-direction:column;gap:1.25rem;">
        <details class="agency-faq-item" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:16px;padding:1.5rem;cursor:pointer;">
          <summary style="font-family:var(--wp--preset--font-family--syne);font-size:1.125rem;font-weight:700;color:#FFF;list-style:none;display:flex;justify-content:space-between;align-items:center;">
            <?php esc_html_e( 'What is the typical commitment and onboarding timeline?', 'digital-agency' ); ?>
            <span class="agency-faq-icon" style="color:var(--wp--preset--color--primary-accent);font-size:1.25rem;">+</span>
          </summary>
          <div style="margin-top:1rem;padding-top:1rem;border-top:1px solid var(--wp--preset--color--border-dark-subtle);color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.6;">
            <?php esc_html_e( 'Our core engagements operate on 6-month or 12-month growth retainers to ensure sufficient runway for compounding scale. Onboarding takes 10–14 business days, encompassing full tech-stack integration, tracking audit, and sprint planning.', 'digital-agency' ); ?>
          </div>
        </details>

        <details class="agency-faq-item" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:16px;padding:1.5rem;cursor:pointer;">
          <summary style="font-family:var(--wp--preset--font-family--syne);font-size:1.125rem;font-weight:700;color:#FFF;list-style:none;display:flex;justify-content:space-between;align-items:center;">
            <?php esc_html_e( 'How do you measure and report pipeline return on investment (ROI)?', 'digital-agency' ); ?>
            <span class="agency-faq-icon" style="color:var(--wp--preset--color--primary-accent);font-size:1.25rem;">+</span>
          </summary>
          <div style="margin-top:1rem;padding-top:1rem;border-top:1px solid var(--wp--preset--color--border-dark-subtle);color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.6;">
            <?php esc_html_e( 'We build custom server-side attribution models connected directly to your CRM (HubSpot, Salesforce, or Stripe). Every dollar spent is tied directly to closed-won revenue, Customer Lifetime Value (LTV), and Customer Acquisition Cost (CAC).', 'digital-agency' ); ?>
          </div>
        </details>

        <details class="agency-faq-item" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:16px;padding:1.5rem;cursor:pointer;">
          <summary style="font-family:var(--wp--preset--font-family--syne);font-size:1.125rem;font-weight:700;color:#FFF;list-style:none;display:flex;justify-content:space-between;align-items:center;">
            <?php esc_html_e( 'How does your team collaborate with our in-house marketing pod?', 'digital-agency' ); ?>
            <span class="agency-faq-icon" style="color:var(--wp--preset--color--primary-accent);font-size:1.25rem;">+</span>
          </summary>
          <div style="margin-top:1rem;padding-top:1rem;border-top:1px solid var(--wp--preset--color--border-dark-subtle);color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.6;">
            <?php esc_html_e( 'We embed as a dedicated specialized squad. We communicate directly via your Slack or Microsoft Teams channels, attend weekly sprint reviews, and manage sprint backlogs inside Linear, Asana, or Jira.', 'digital-agency' ); ?>
          </div>
        </details>

        <details class="agency-faq-item" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:16px;padding:1.5rem;cursor:pointer;">
          <summary style="font-family:var(--wp--preset--font-family--syne);font-size:1.125rem;font-weight:700;color:#FFF;list-style:none;display:flex;justify-content:space-between;align-items:center;">
            <?php esc_html_e( 'What makes your WordPress Block Theme engineering superior to page builders?', 'digital-agency' ); ?>
            <span class="agency-faq-icon" style="color:var(--wp--preset--color--primary-accent);font-size:1.25rem;">+</span>
          </summary>
          <div style="margin-top:1rem;padding-top:1rem;border-top:1px solid var(--wp--preset--color--border-dark-subtle);color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.6;">
            <?php esc_html_e( 'We build 100% native WordPress Full Site Editing (FSE) themes without heavy monolithic builders (Elementor, Divi) or JavaScript bloat. This delivers sub-second load times, flawless 95+ Core Web Vitals, and effortless Gutenberg editing without vendor lock-in.', 'digital-agency' ); ?>
          </div>
        </details>
      </div>
      <!-- /wp:html -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</section>
<!-- /wp:group -->
