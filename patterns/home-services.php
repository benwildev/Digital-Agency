<?php
/**
 * Title: Homepage Services Showcase (3-Column Grid)
 * Slug: digital-agency/home-services
 * Categories: digital-agency-services
 * Description: 3-column service card grid dynamically querying the Service CPT with price indicators and deliverable tags.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$services_query = digital_agency_get_services( array( 'posts_per_page' => 6 ) );
?>
<!-- wp:group {"tagName":"section","className":"agency-services-section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-20","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-services-section has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-20);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|space-12"}}}} -->
  <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--space-12)">
    <div style="max-width:680px;">
      <!-- wp:paragraph {"className":"agency-eyebrow"} -->
      <p class="agency-eyebrow"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'OUR EXPERTISE', 'digital-agency' ); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}},"fontSize":"heading-2"} -->
      <h2 class="wp-block-heading has-heading-2-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( 'Strategic Capabilities Engineered for High-Growth Brands', 'digital-agency' ); ?></h2>
      <!-- /wp:heading -->
    </div>

    <!-- wp:buttons {"layout":{"type":"flex"}} -->
    <div class="wp-block-buttons">
      <!-- wp:button {"style":{"border":{"radius":"9999px"}},"className":"is-style-outline","fontSize":"body-small"} -->
      <div class="wp-block-button has-custom-font-size is-style-outline has-body-small-font-size">
        <a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/services/' ) ); ?>" style="border-radius:9999px;font-weight:600;padding:0.75rem 1.5rem;"><?php esc_html_e( 'View All Services ↗', 'digital-agency' ); ?></a>
      </div>
      <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
  </div>
  <!-- /wp:group -->

  <!-- wp:html -->
  <div class="agency-services-grid" style="display:grid;grid-template-columns:repeat(auto-fill, minmax(340px, 1fr));gap:2rem;max-width:1400px;margin:0 auto;">
    <?php
    if ( $services_query->have_posts() ) :
        $index = 1;
        while ( $services_query->have_posts() ) : $services_query->the_post();
            $post_id = get_the_ID();
            $price   = get_post_meta( $post_id, '_agency_service_starting_price', true );
            $badge   = get_post_meta( $post_id, '_agency_service_highlight_badge', true );
            $idx_str = str_pad( (string) $index, 2, '0', STR_PAD_LEFT );
            ?>
            <div class="agency-card agency-service-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;padding:2.5rem;display:flex;flex-direction:column;justify-content:space-between;transition:transform 0.3s ease, border-color 0.3s ease;">
              <div>
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;">
                  <span style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:800;color:var(--wp--preset--color--primary-accent);"><?php echo esc_html( $idx_str ); ?></span>
                  <?php if ( ! empty( $badge ) ) : ?>
                    <span class="agency-eyebrow" style="font-size:0.6875rem;padding:0.2rem 0.6rem;"><?php echo esc_html( $badge ); ?></span>
                  <?php endif; ?>
                </div>

                <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:700;margin:0 0 1rem 0;">
                  <a href="<?php the_permalink(); ?>" style="color:#FFF;text-decoration:none;"><?php the_title(); ?></a>
                </h3>

                <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.6;margin-bottom:1.5rem;">
                  <?php echo esc_html( get_the_excerpt() ?: wp_trim_words( get_the_content(), 18 ) ); ?>
                </p>
              </div>

              <div style="border-top:1px solid var(--wp--preset--color--border-dark-subtle);padding-top:1.25rem;display:flex;justify-content:space-between;align-items:center;">
                <?php if ( ! empty( $price ) ) : ?>
                  <span style="font-size:0.875rem;color:var(--wp--preset--color--text-light-muted);"><?php esc_html_e( 'Starts at', 'digital-agency' ); ?> <strong style="color:var(--wp--preset--color--primary-accent);"><?php echo esc_html( $price ); ?></strong></span>
                <?php else : ?>
                  <span style="font-size:0.875rem;color:var(--wp--preset--color--text-light-muted);"><?php esc_html_e( 'Bespoke Retainer', 'digital-agency' ); ?></span>
                <?php endif; ?>

                <a href="<?php the_permalink(); ?>" class="agency-card-arrow" style="width:36px;height:36px;border-radius:50%;background:var(--wp--preset--color--surface-dark-elevated);border:1px solid var(--wp--preset--color--border-dark-strong);display:inline-flex;align-items:center;justify-content:center;color:#FFF;text-decoration:none;transition:background 0.2s, color 0.2s;" aria-label="<?php esc_attr_e( 'Read more about this service', 'digital-agency' ); ?>">↗</a>
              </div>
            </div>
            <?php
            $index++;
        endwhile;
        wp_reset_postdata();
    else :
        // Fallback demo cards when database is empty
        $demo_services = array(
            array( 'title' => __( 'Search Engine Optimization', 'digital-agency' ), 'price' => '$2,500/mo', 'desc' => __( 'Dominate organic search with technical audits, keyword dominance, and high-tier authority acquisition.', 'digital-agency' ) ),
            array( 'title' => __( 'Performance Marketing', 'digital-agency' ), 'price' => '$3,500/mo', 'desc' => __( 'High-ROAS paid media across Google Ads, Meta, and LinkedIn with full-funnel tracking and conversion optimization.', 'digital-agency' ) ),
            array( 'title' => __( 'Bespoke Web Engineering', 'digital-agency' ), 'price' => '$5,000/mo', 'desc' => __( 'High-performance WordPress Block Themes and web platforms crafted for sub-second speeds and maximum conversion.', 'digital-agency' ) ),
            array( 'title' => __( 'Brand Architecture & Design', 'digital-agency' ), 'price' => '$4,000/mo', 'desc' => __( 'Visual identities, design systems, and creative direction that position your brand as the definitive market leader.', 'digital-agency' ) ),
            array( 'title' => __( 'Content Marketing & PR', 'digital-agency' ), 'price' => '$2,800/mo', 'desc' => __( 'Authoritative thought leadership, publication placements, and editorial frameworks that drive organic pipeline.', 'digital-agency' ) ),
            array( 'title' => __( 'Conversion Rate Optimization', 'digital-agency' ), 'price' => '$3,000/mo', 'desc' => __( 'Systematic A/B experimentation, UX auditing, and heatmapping to unlock latent value from existing traffic.', 'digital-agency' ) ),
        );
        $i = 1;
        foreach ( $demo_services as $s ) :
            $idx = str_pad( (string) $i, 2, '0', STR_PAD_LEFT );
            ?>
            <div class="agency-card agency-service-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;padding:2.5rem;display:flex;flex-direction:column;justify-content:space-between;">
              <div>
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;">
                  <span style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:800;color:var(--wp--preset--color--primary-accent);"><?php echo esc_html( $idx ); ?></span>
                </div>
                <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:700;margin:0 0 1rem 0;color:#FFF;"><?php echo esc_html( $s['title'] ); ?></h3>
                <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.6;margin-bottom:1.5rem;"><?php echo esc_html( $s['desc'] ); ?></p>
              </div>
              <div style="border-top:1px solid var(--wp--preset--color--border-dark-subtle);padding-top:1.25rem;display:flex;justify-content:space-between;align-items:center;">
                <span style="font-size:0.875rem;color:var(--wp--preset--color--text-light-muted);"><?php esc_html_e( 'Starts at', 'digital-agency' ); ?> <strong style="color:var(--wp--preset--color--primary-accent);"><?php echo esc_html( $s['price'] ); ?></strong></span>
                <span style="width:36px;height:36px;border-radius:50%;background:var(--wp--preset--color--surface-dark-elevated);border:1px solid var(--wp--preset--color--border-dark-strong);display:inline-flex;align-items:center;justify-content:center;color:#FFF;">↗</span>
              </div>
            </div>
            <?php
            $i++;
        endforeach;
    endif;
    ?>
  </div>
  <!-- /wp:html -->
</section>
<!-- /wp:group -->
