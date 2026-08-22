<?php
/**
 * Title: Strategic Pricing & Retainer Plans
 * Slug: digital-agency/page-pricing
 * Categories: digital-agency-pricing
 * Description: Transparent growth retainers with feature breakdowns, highlight badges, and direct engagement CTAs.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$pricing_query = digital_agency_get_pricing_plans();
?>
<!-- wp:pattern {"slug":"digital-agency/page-header"} /-->

<!-- wp:group {"tagName":"section","className":"agency-pricing-section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-16","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-pricing-section has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-16);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|space-12"}}}} -->
  <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--space-12);text-align:center;max-width:760px;margin-left:auto;margin-right:auto;">
    <!-- wp:paragraph {"className":"agency-eyebrow"} -->
    <p class="agency-eyebrow" style="justify-content:center;"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'GROWTH ENGAGEMENT MODELS', 'digital-agency' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}},"fontSize":"heading-2"} -->
    <h2 class="wp-block-heading has-heading-2-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( 'Predictable Investment. Compounding Returns.', 'digital-agency' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|text-light-secondary"}},"fontSize":"body-regular"} -->
    <p class="has-text-light-secondary-color has-text-color has-body-regular-font-size"><?php esc_html_e( 'Select the retainer tier engineered for your current growth stage. Every tier is backed by dedicated partner-level strategy.', 'digital-agency' ); ?></p>
    <!-- /wp:paragraph -->
  </div>
  <!-- /wp:group -->

  <!-- wp:html -->
  <div class="agency-pricing-grid" style="display:grid;grid-template-columns:repeat(auto-fit, minmax(340px, 1fr));gap:2rem;max-width:1300px;margin:0 auto;align-items:stretch;">
    <?php
    if ( $pricing_query->have_posts() ) :
        while ( $pricing_query->have_posts() ) : $pricing_query->the_post();
            $post_id  = get_the_ID();
            $meta     = digital_agency_get_pricing_meta( $post_id );
            $featured = ! empty( $meta['is_featured'] );
            ?>
            <article class="agency-card <?php echo $featured ? 'agency-pricing-card--featured' : ''; ?>" style="background:<?php echo $featured ? 'var(--wp--preset--color--surface-dark-elevated)' : 'var(--wp--preset--color--surface-dark-card)'; ?>;border:<?php echo $featured ? '2px solid var(--wp--preset--color--primary-accent)' : '1px solid var(--wp--preset--color--border-dark-strong)'; ?>;border-radius:24px;padding:3rem 2.5rem;display:flex;flex-direction:column;justify-content:space-between;position:relative;<?php echo $featured ? 'box-shadow:0 0 40px rgba(200, 245, 96, 0.08);' : ''; ?>">
              <?php if ( ! empty( $meta['badge'] ) ) : ?>
                <div style="position:absolute;top:-14px;left:50%;transform:translateX(-50%);background:var(--wp--preset--color--primary-accent);color:var(--wp--preset--color--surface-dark-base);font-weight:800;font-size:0.75rem;padding:0.25rem 1rem;border-radius:9999px;text-transform:uppercase;letter-spacing:0.05em;">
                  <?php echo esc_html( $meta['badge'] ); ?>
                </div>
              <?php endif; ?>

              <div>
                <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.75rem;font-weight:800;color:#FFF;margin:0 0 0.5rem 0;">
                  <?php the_title(); ?>
                </h3>

                <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.5;margin-bottom:2rem;">
                  <?php echo esc_html( get_the_excerpt() ?: wp_trim_words( get_the_content(), 15 ) ); ?>
                </p>

                <div style="margin-bottom:2.5rem;display:flex;align-items:baseline;gap:0.5rem;">
                  <span style="font-family:var(--wp--preset--font-family--syne);font-size:3rem;font-weight:800;color:<?php echo $featured ? 'var(--wp--preset--color--primary-accent)' : '#FFF'; ?>;line-height:1;">
                    <?php echo esc_html( $meta['price'] ?? '$2,500' ); ?>
                  </span>
                  <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;">/ <?php echo esc_html( $meta['billing_period'] ?? $meta['period'] ?? 'month' ); ?></span>
                </div>

                <?php if ( ! empty( $meta['features'] ) && is_array( $meta['features'] ) ) : ?>
                  <ul style="list-style:none;padding:0;margin:0 0 2.5rem 0;display:flex;flex-direction:column;gap:0.85rem;">
                    <?php foreach ( $meta['features'] as $feat ) : ?>
                      <li style="font-size:0.9375rem;color:var(--wp--preset--color--text-light-secondary);display:flex;align-items:flex-start;gap:0.75rem;">
                        <span style="color:var(--wp--preset--color--primary-accent);font-weight:bold;">✓</span>
                        <span><?php echo esc_html( $feat ); ?></span>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
              </div>

              <div>
                <a href="<?php echo esc_url( $meta['button_url'] ?? $meta['cta_url'] ?? home_url( '/contact/' ) ); ?>" class="wp-block-button__link wp-element-button" style="display:block;text-align:center;border-radius:12px;background:<?php echo $featured ? 'var(--wp--preset--color--primary-accent)' : 'transparent'; ?>;color:<?php echo $featured ? 'var(--wp--preset--color--surface-dark-base)' : '#FFF'; ?>;border:<?php echo $featured ? 'none' : '1px solid var(--wp--preset--color--border-dark-strong)'; ?>;font-weight:700;padding:1rem;text-decoration:none;transition:background 0.2s;">
                  <?php echo esc_html( $meta['button_text'] ?? $meta['cta_text'] ?? __( 'Get Started ↗', 'digital-agency' ) ); ?>
                </a>
              </div>
            </article>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        ?>
        <!-- Fallback Default Retainer Tier Display when Database has 0 posts -->
        <article class="agency-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;padding:3rem 2.5rem;">
          <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.75rem;font-weight:800;color:#FFF;margin-bottom:0.5rem;"><?php esc_html_e( 'Growth Starter', 'digital-agency' ); ?></h3>
          <p style="color:var(--wp--preset--color--text-light-secondary);margin-bottom:2rem;"><?php esc_html_e( 'High-velocity technical optimization and foundational performance marketing.', 'digital-agency' ); ?></p>
          <div style="font-size:3rem;font-weight:800;color:#FFF;margin-bottom:2rem;">$2,500 <span style="font-size:1rem;color:var(--wp--preset--color--text-light-muted);">/ mo</span></div>
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="wp-block-button__link wp-element-button" style="display:block;text-align:center;border-radius:12px;background:var(--wp--preset--color--primary-accent);color:var(--wp--preset--color--surface-dark-base);font-weight:700;padding:1rem;text-decoration:none;"><?php esc_html_e( 'Inquire Now ↗', 'digital-agency' ); ?></a>
        </article>
        <?php
    endif;
    ?>
  </div>
  <!-- /wp:html -->
</section>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"digital-agency/home-faq"} /-->
