<?php
/**
 * Title: Projects & Case Studies Archive
 * Slug: digital-agency/archive-project
 * Categories: digital-agency-projects
 * Description: High-impact portfolio showcase of client transformations with metrics, category filters, and case study excerpts.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$projects_query = digital_agency_get_projects( array( 'posts_per_page' => 12 ) );
?>
<!-- wp:pattern {"slug":"digital-agency/page-header"} /-->

<!-- wp:group {"tagName":"section","className":"agency-projects-archive","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-16","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-projects-archive has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-16);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|space-12"}}}} -->
  <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--space-12);text-align:center;max-width:760px;margin-left:auto;margin-right:auto;">
    <!-- wp:paragraph {"className":"agency-eyebrow"} -->
    <p class="agency-eyebrow" style="justify-content:center;"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'PROVEN TRACK RECORD', 'digital-agency' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}},"fontSize":"heading-2"} -->
    <h2 class="wp-block-heading has-heading-2-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( 'Case Studies in Exponential Growth & Market Authority', 'digital-agency' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|text-light-secondary"}},"fontSize":"body-regular"} -->
    <p class="has-text-light-secondary-color has-text-color has-body-regular-font-size"><?php esc_html_e( 'Explore detailed strategic breakdowns of how we solved complex acquisition, engineering, and brand challenges for industry-leading clients.', 'digital-agency' ); ?></p>
    <!-- /wp:paragraph -->
  </div>
  <!-- /wp:group -->

  <!-- wp:html -->
  <div class="agency-projects-grid" style="display:grid;grid-template-columns:repeat(auto-fill, minmax(420px, 1fr));gap:2.5rem;max-width:1400px;margin:0 auto;">
    <?php
    if ( $projects_query->have_posts() ) :
        while ( $projects_query->have_posts() ) : $projects_query->the_post();
            $post_id  = get_the_ID();
            $meta     = digital_agency_get_project_meta( $post_id );
            $terms    = get_the_terms( $post_id, 'project_category' );
            $term_str = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->name : __( 'Case Study', 'digital-agency' );
            ?>
            <article class="agency-card agency-project-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;overflow:hidden;display:flex;flex-direction:column;justify-content:space-between;transition:transform 0.3s ease, border-color 0.3s ease;">
              <div>
                <div class="agency-bw-image" style="height:260px;position:relative;background:var(--wp--preset--color--surface-dark-elevated);display:flex;align-items:center;justify-content:center;border-bottom:1px solid var(--wp--preset--color--border-dark-subtle);">
                  <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); ?>
                  <?php else : ?>
                    <span style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:700;color:var(--wp--preset--color--text-light-secondary);text-align:center;padding:1rem;">✦ <?php the_title(); ?></span>
                  <?php endif; ?>

                  <?php if ( ! empty( $meta['impact_metric'] ) ) : ?>
                    <div style="position:absolute;bottom:1.25rem;left:1.25rem;background:rgba(10, 19, 15, 0.85);backdrop-filter:blur(8px);border:1px solid var(--wp--preset--color--primary-accent);border-radius:9999px;padding:0.35rem 0.85rem;color:var(--wp--preset--color--primary-accent);font-weight:800;font-size:0.875rem;">
                      <?php echo esc_html( $meta['impact_metric'] ); ?>
                    </div>
                  <?php endif; ?>
                </div>

                <div style="padding:2rem 2rem 1.5rem 2rem;">
                  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.75rem;">
                    <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--primary-accent);text-transform:uppercase;letter-spacing:0.08em;"><?php echo esc_html( $term_str ); ?></span>
                    <?php if ( ! empty( $meta['year'] ) ) : ?>
                      <span style="font-size:0.75rem;color:var(--wp--preset--color--text-light-muted);font-weight:600;"><?php echo esc_html( $meta['year'] ); ?></span>
                    <?php endif; ?>
                  </div>

                  <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:700;margin:0 0 0.75rem 0;">
                    <a href="<?php the_permalink(); ?>" style="color:#FFF;text-decoration:none;"><?php the_title(); ?></a>
                  </h3>

                  <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.6;margin-bottom:1.25rem;">
                    <?php echo esc_html( get_the_excerpt() ?: wp_trim_words( get_the_content(), 18 ) ); ?>
                  </p>
                </div>
              </div>

              <div style="padding:0 2rem 2rem 2rem;">
                <div style="border-top:1px solid var(--wp--preset--color--border-dark-subtle);padding-top:1.25rem;display:flex;justify-content:space-between;align-items:center;">
                  <?php if ( ! empty( $meta['client'] ) ) : ?>
                    <span style="font-size:0.8125rem;color:var(--wp--preset--color--text-light-muted);"><?php esc_html_e( 'Client:', 'digital-agency' ); ?> <strong style="color:#FFF;"><?php echo esc_html( $meta['client'] ); ?></strong></span>
                  <?php else : ?>
                    <span style="font-size:0.8125rem;color:var(--wp--preset--color--text-light-muted);"><?php esc_html_e( 'Enterprise Client', 'digital-agency' ); ?></span>
                  <?php endif; ?>

                  <a href="<?php the_permalink(); ?>" style="color:var(--wp--preset--color--primary-accent);font-weight:700;font-size:0.875rem;text-decoration:none;display:inline-flex;align-items:center;gap:0.35rem;">
                    <?php esc_html_e( 'View Case Study', 'digital-agency' ); ?> ↗
                  </a>
                </div>
              </div>
            </article>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        ?>
        <div style="grid-column:1 / -1;text-align:center;padding:4rem 2rem;background:var(--wp--preset--color--surface-dark-card);border-radius:20px;">
          <h3 style="font-family:var(--wp--preset--font-family--syne);color:#FFF;margin-bottom:0.5rem;"><?php esc_html_e( 'Case Studies Currently Under Embargo', 'digital-agency' ); ?></h3>
          <p style="color:var(--wp--preset--color--text-light-secondary);max-width:500px;margin:0 auto 1.5rem auto;"><?php esc_html_e( 'Selected performance transformations are confidential under NDA. Contact our managing partners for a customized portfolio walkthrough.', 'digital-agency' ); ?></p>
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="wp-block-button__link wp-element-button" style="border-radius:9999px;background:var(--wp--preset--color--primary-accent);color:var(--wp--preset--color--surface-dark-base);font-weight:700;padding:0.75rem 1.5rem;text-decoration:none;"><?php esc_html_e( 'Request Private Walkthrough ↗', 'digital-agency' ); ?></a>
        </div>
        <?php
    endif;
    ?>
  </div>
  <!-- /wp:html -->
</section>
<!-- /wp:group -->
