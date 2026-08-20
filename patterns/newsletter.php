<?php
/**
 * Title: Global Newsletter Subscription Section
 * Slug: digital-agency/newsletter
 * Categories: digital-agency-cta, digital-agency-general
 * Description: 2-column global newsletter conversion card with accessible form markup.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$newsletter_label = digital_agency_get_setting( 'agency_newsletter_label', __( 'Our Newsletter', 'digital-agency' ) );
?>
<!-- wp:group {"tagName":"section","className":"agency-newsletter-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-16","bottom":"var:preset|spacing|space-16","left":"var:preset|spacing|space-8","right":"var:preset|spacing|space-8"},"margin":{"top":"var:preset|spacing|space-16","bottom":"var:preset|spacing|space-16"}},"color":{"background":"var:preset|color|surface-dark-card"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group agency-newsletter-card has-surface-dark-card-background-color has-background" style="margin-top:var(--wp--preset--spacing--space-16);margin-bottom:var(--wp--preset--spacing--space-16);padding-top:var(--wp--preset--spacing--space-16);padding-right:var(--wp--preset--spacing--space-8);padding-bottom:var(--wp--preset--spacing--space-16);padding-left:var(--wp--preset--spacing--space-8)">
  <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|space-8"}},"verticalAlignment":"center"} -->
  <div class="wp-block-columns alignwide are-vertically-aligned-center">
    <!-- wp:column {"width":"55%"} -->
    <div class="wp-block-column" style="flex-basis:55%">
      <!-- wp:paragraph {"className":"agency-eyebrow"} -->
      <p class="agency-eyebrow"><span class="agency-eyebrow__dot"></span> <?php echo esc_html( $newsletter_label ); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}},"fontSize":"heading-2"} -->
      <h2 class="wp-block-heading has-heading-2-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( 'Subscribe for Digital Growth Tips & Updates', 'digital-agency' ); ?></h2>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|text-light-secondary"}},"fontSize":"body-regular"} -->
      <p class="has-text-light-secondary-color has-text-color has-body-regular-font-size"><?php esc_html_e( 'Join 15,000+ business leaders receiving our monthly strategies on organic search, paid scale, and digital engineering.', 'digital-agency' ); ?></p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"45%"} -->
    <div class="wp-block-column" style="flex-basis:45%">
      <!-- wp:html -->
      <form class="agency-newsletter-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
        <label for="agency-newsletter-email" class="screen-reader-text"><?php esc_html_e( 'Email Address', 'digital-agency' ); ?></label>
        <input type="email" id="agency-newsletter-email" name="agency_newsletter_email" placeholder="<?php esc_attr_e( 'Enter your work email...', 'digital-agency' ); ?>" required autocomplete="email" />
        <button type="submit" class="wp-block-button__link wp-element-button" style="border-radius:8px;background-color:var(--wp--preset--color--primary-accent);color:var(--wp--preset--color--surface-dark-base);font-weight:700;padding:0.875rem 1.5rem;border:none;cursor:pointer;white-space:nowrap;"><?php esc_html_e( 'Subscribe', 'digital-agency' ); ?></button>
      </form>
      <!-- /wp:html -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</section>
<!-- /wp:group -->
