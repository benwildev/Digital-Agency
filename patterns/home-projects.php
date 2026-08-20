<?php
/**
 * Title: Homepage Featured Case Studies
 * Slug: digital-agency/home-projects
 * Categories: digital-agency-projects
 * Description: 2-column showcase dynamically querying the Project CPT with outcome metric badges and B&W hover effects.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$projects_query = digital_agency_get_featured_projects( 4 );
?>
<!-- wp:group {"tagName":"section","className":"agency-projects-section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-20","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-projects-section has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-20);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|space-12"}}}} -->
  <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--space-12)">
    <div style="max-width:680px;">
      <!-- wp:paragraph {"className":"agency-eyebrow"} -->
      <p class="agency-eyebrow"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'SELECTED CASE STUDIES', 'digital-agency' ); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}},"fontSize":"heading-2"} -->
      <h2 class="wp-block-heading has-heading-2-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( 'Real Transformations & Quantifiable Business Outcomes', 'digital-agency' ); ?></h2>
      <!-- /wp:heading -->
    </div>

    <!-- wp:buttons {"layout":{"type":"flex"}} -->
    <div class="wp-block-buttons">
      <!-- wp:button {"style":{"border":{"radius":"9999px"}},"className":"is-style-outline","fontSize":"body-small"} -->
      <div class="wp-block-button has-custom-font-size is-style-outline has-body-small-font-size">
        <a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" style="border-radius:9999px;font-weight:600;padding:0.75rem 1.5rem;"><?php esc_html_e( 'Explore All Case Studies ↗', 'digital-agency' ); ?></a>
      </div>
      <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
  </div>
  <!-- /wp:group -->

  <!-- wp:html -->
  <div class="agency-projects-grid" style="display:grid;grid-template-columns:repeat(auto-fill, minmax(520px, 1fr));gap:2.5rem;max-width:1400px;margin:0 auto;">
    <?php
    if ( $projects_query->have_posts() ) :
        while ( $projects_query->have_posts() ) : $projects_query->the_post();
            $post_id = get_the_ID();
            $meta    = digital_agency_get_project_meta( $post_id );
            $cats    = get_the_terms( $post_id, 'project_category' );
            $cat_name = ( ! empty( $cats ) && ! is_wp_error( $cats ) ) ? $cats[0]->name : __( 'Case Study', 'digital-agency' );
            ?>
            <article class="agency-card agency-project-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;overflow:hidden;transition:transform 0.3s ease, border-color 0.3s ease;">
              <div class="agency-bw-image" style="height:320px;width:100%;position:relative;background:#0e1e17;">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); ?>
                <?php else : ?>
                  <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:var(--wp--preset--color--surface-dark-elevated);color:var(--wp--preset--color--text-light-muted);font-family:var(--wp--preset--font-family--syne);font-size:1.25rem;">
                    ✦ <?php the_title(); ?>
                  </div>
                <?php endif; ?>

                <?php if ( ! empty( $meta['impact_metric'] ) ) : ?>
                  <span class="agency-metric-pill" style="position:absolute;bottom:1.25rem;left:1.25rem;z-index:2;">
                    <?php echo esc_html( $meta['impact_metric'] ); ?>
                  </span>
                <?php endif; ?>
              </div>

              <div style="padding:2rem;">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.75rem;">
                  <span style="font-size:0.75rem;font-weight:700;letter-spacing:0.08em;color:var(--wp--preset--color--primary-accent);text-transform:uppercase;"><?php echo esc_html( $cat_name ); ?></span>
                  <?php if ( ! empty( $meta['year'] ) ) : ?>
                    <span style="font-size:0.75rem;color:var(--wp--preset--color--text-light-muted);"><?php echo esc_html( $meta['year'] ); ?></span>
                  <?php endif; ?>
                </div>

                <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.625rem;font-weight:700;margin:0 0 1rem 0;">
                  <a href="<?php the_permalink(); ?>" style="color:#FFF;text-decoration:none;"><?php the_title(); ?></a>
                </h3>

                <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.6;margin-bottom:1.5rem;">
                  <?php echo esc_html( get_the_excerpt() ?: wp_trim_words( get_the_content(), 16 ) ); ?>
                </p>

                <div style="border-top:1px solid var(--wp--preset--color--border-dark-subtle);padding-top:1rem;display:flex;justify-content:space-between;align-items:center;">
                  <span style="font-size:0.875rem;color:var(--wp--preset--color--text-light-muted);"><?php esc_html_e( 'Client:', 'digital-agency' ); ?> <strong style="color:#FFF;"><?php echo esc_html( $meta['client'] ?: get_bloginfo( 'name' ) ); ?></strong></span>
                  <a href="<?php the_permalink(); ?>" style="color:var(--wp--preset--color--primary-accent);font-weight:600;font-size:0.875rem;text-decoration:none;"><?php esc_html_e( 'View Case Study ↗', 'digital-agency' ); ?></a>
                </div>
              </div>
            </article>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        // Fallback demo project cards
        $demo_projects = array(
            array( 'title' => __( 'Scaling FinTech Unicorn to $100M ARR', 'digital-agency' ), 'client' => 'Apex Pay Global', 'cat' => 'Performance Marketing', 'metric' => '+340% ROAS', 'year' => '2026', 'desc' => 'Orchestrated multi-channel programmatic acquisition and conversion rate optimization across 14 markets.' ),
            array( 'title' => __( 'B2B SaaS Organic Pipeline Multiplication', 'digital-agency' ), 'client' => 'CloudScale Analytics', 'cat' => 'SEO & Content', 'metric' => '+520% Organic Leads', 'year' => '2025', 'desc' => 'Engineered high-authority programmatic content clusters and technical SEO foundations.' ),
            array( 'title' => __( 'Luxury E-Commerce Global Rebrand & Platform', 'digital-agency' ), 'client' => 'Aura Maison', 'cat' => 'Brand & Web Engineering', 'metric' => '+185% Conversion Rate', 'year' => '2026', 'desc' => 'Crafted custom sub-second WordPress shopping experience and bespoke design system.' ),
            array( 'title' => __( 'HealthTech Patient Acquisition Transformation', 'digital-agency' ), 'client' => 'Novacare Health', 'cat' => 'Performance Ads', 'metric' => '-48% CAC Reduction', 'year' => '2025', 'desc' => 'High-intent search advertising and conversion funnels with HIPAA-compliant attribution.' ),
        );
        foreach ( $demo_projects as $p ) :
            ?>
            <article class="agency-card agency-project-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;overflow:hidden;">
              <div class="agency-bw-image" style="height:320px;width:100%;position:relative;background:var(--wp--preset--color--surface-dark-elevated);display:flex;align-items:center;justify-content:center;">
                <div style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;color:var(--wp--preset--color--text-light-muted);padding:2rem;text-align:center;">
                  ✦ <?php echo esc_html( $p['title'] ); ?>
                </div>
                <span class="agency-metric-pill" style="position:absolute;bottom:1.25rem;left:1.25rem;z-index:2;">
                  <?php echo esc_html( $p['metric'] ); ?>
                </span>
              </div>

              <div style="padding:2rem;">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.75rem;">
                  <span style="font-size:0.75rem;font-weight:700;letter-spacing:0.08em;color:var(--wp--preset--color--primary-accent);text-transform:uppercase;"><?php echo esc_html( $p['cat'] ); ?></span>
                  <span style="font-size:0.75rem;color:var(--wp--preset--color--text-light-muted);"><?php echo esc_html( $p['year'] ); ?></span>
                </div>

                <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.625rem;font-weight:700;margin:0 0 1rem 0;color:#FFF;"><?php echo esc_html( $p['title'] ); ?></h3>
                <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.6;margin-bottom:1.5rem;"><?php echo esc_html( $p['desc'] ); ?></p>

                <div style="border-top:1px solid var(--wp--preset--color--border-dark-subtle);padding-top:1rem;display:flex;justify-content:space-between;align-items:center;">
                  <span style="font-size:0.875rem;color:var(--wp--preset--color--text-light-muted);"><?php esc_html_e( 'Client:', 'digital-agency' ); ?> <strong style="color:#FFF;"><?php echo esc_html( $p['client'] ); ?></strong></span>
                  <span style="color:var(--wp--preset--color--primary-accent);font-weight:600;font-size:0.875rem;">View Case Study ↗</span>
                </div>
              </div>
            </article>
            <?php
        endforeach;
    endif;
    ?>
  </div>
  <!-- /wp:html -->
</section>
<!-- /wp:group -->
