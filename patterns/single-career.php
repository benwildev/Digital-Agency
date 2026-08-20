<?php
/**
 * Title: Single Career Opening Detail
 * Slug: digital-agency/single-career
 * Categories: digital-agency-careers
 * Description: Job listing with responsibilities, requirements, technical skills, and application form CTA.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$post_id  = get_the_ID();
$meta     = digital_agency_get_career_meta( $post_id );
$dept     = get_the_terms( $post_id, 'department' );
$dept_str = ( ! empty( $dept ) && ! is_wp_error( $dept ) ) ? $dept[0]->name : __( 'Engineering', 'digital-agency' );
?>
<!-- wp:pattern {"slug":"digital-agency/page-header"} /-->

<!-- wp:group {"tagName":"article","className":"agency-career-single","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-16","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<article class="wp-block-group alignfull agency-career-single has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-16);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|space-12"}}} -->
  <div class="wp-block-columns alignwide">
    <!-- Left: Job Details & Responsibilities (65%) -->
    <!-- wp:column {"width":"65%"} -->
    <div class="wp-block-column" style="flex-basis:65%">
      <div class="agency-career-body" style="color:var(--wp--preset--color--text-light-secondary);font-size:1.0625rem;line-height:1.8;margin-bottom:3rem;">
        <?php the_content(); ?>
      </div>

      <!-- Key Responsibilities -->
      <?php if ( ! empty( $meta['responsibilities'] ) && is_array( $meta['responsibilities'] ) ) : ?>
        <div style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;padding:2.5rem;margin-bottom:3rem;">
          <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:700;color:#FFF;margin-bottom:1.5rem;">
            <?php esc_html_e( 'Core Responsibilities', 'digital-agency' ); ?>
          </h3>
          <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:1rem;">
            <?php foreach ( $meta['responsibilities'] as $resp ) : ?>
              <li style="display:flex;align-items:flex-start;gap:0.75rem;color:var(--wp--preset--color--text-light-secondary);font-size:1rem;line-height:1.6;">
                <span style="color:var(--wp--preset--color--primary-accent);font-weight:bold;">✦</span>
                <span><?php echo esc_html( $resp ); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <!-- Requirements & Qualifications -->
      <?php if ( ! empty( $meta['requirements'] ) && is_array( $meta['requirements'] ) ) : ?>
        <div style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;padding:2.5rem;margin-bottom:3rem;">
          <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:700;color:#FFF;margin-bottom:1.5rem;">
            <?php esc_html_e( 'Qualifications & Experience', 'digital-agency' ); ?>
          </h3>
          <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:1rem;">
            <?php foreach ( $meta['requirements'] as $req ) : ?>
              <li style="display:flex;align-items:flex-start;gap:0.75rem;color:var(--wp--preset--color--text-light-secondary);font-size:1rem;line-height:1.6;">
                <span style="color:var(--wp--preset--color--primary-accent);font-weight:bold;">✓</span>
                <span><?php echo esc_html( $req ); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>
    </div>
    <!-- /wp:column -->

    <!-- Right: Sticky Application Sidebar (35%) -->
    <!-- wp:column {"width":"35%"} -->
    <div class="wp-block-column" style="flex-basis:35%">
      <div style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;padding:2.5rem;position:sticky;top:100px;">
        <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--primary-accent);text-transform:uppercase;letter-spacing:0.1em;display:block;margin-bottom:0.75rem;"><?php echo esc_html( $dept_str ); ?></span>

        <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.75rem;font-weight:800;color:#FFF;margin-bottom:1.5rem;">
          <?php the_title(); ?>
        </h3>

        <div style="border-top:1px solid var(--wp--preset--color--border-dark-subtle);border-bottom:1px solid var(--wp--preset--color--border-dark-subtle);padding:1.5rem 0;margin-bottom:2rem;display:flex;flex-direction:column;gap:1rem;">
          <?php if ( ! empty( $meta['location'] ) ) : ?>
            <div style="display:flex;justify-content:space-between;align-items:center;">
              <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;"><?php esc_html_e( 'Location', 'digital-agency' ); ?></span>
              <strong style="color:#FFF;font-size:0.9375rem;"><?php echo esc_html( $meta['location'] ); ?></strong>
            </div>
          <?php endif; ?>

          <?php if ( ! empty( $meta['type'] ) ) : ?>
            <div style="display:flex;justify-content:space-between;align-items:center;">
              <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;"><?php esc_html_e( 'Employment', 'digital-agency' ); ?></span>
              <strong style="color:#FFF;font-size:0.9375rem;"><?php echo esc_html( $meta['type'] ); ?></strong>
            </div>
          <?php endif; ?>

          <?php if ( ! empty( $meta['salary'] ) ) : ?>
            <div style="display:flex;justify-content:space-between;align-items:center;">
              <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;"><?php esc_html_e( 'Compensation', 'digital-agency' ); ?></span>
              <strong style="color:var(--wp--preset--color--primary-accent);font-size:1.0625rem;"><?php echo esc_html( $meta['salary'] ); ?></strong>
            </div>
          <?php endif; ?>
        </div>

        <a href="<?php echo esc_url( home_url( '/contact/?apply=' . get_the_ID() ) ); ?>" class="wp-block-button__link wp-element-button" style="display:block;text-align:center;border-radius:10px;background:var(--wp--preset--color--primary-accent);color:var(--wp--preset--color--surface-dark-base);font-weight:700;padding:1rem;text-decoration:none;margin-bottom:1.5rem;">
          <?php esc_html_e( 'Apply for this Role ↗', 'digital-agency' ); ?>
        </a>

        <?php if ( ! empty( $meta['skills'] ) && is_array( $meta['skills'] ) ) : ?>
          <div>
            <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--text-light-muted);text-transform:uppercase;display:block;margin-bottom:0.75rem;"><?php esc_html_e( 'Relevant Skillset', 'digital-agency' ); ?></span>
            <div style="display:flex;flex-wrap:wrap;gap:0.5rem;">
              <?php foreach ( $meta['skills'] as $skill_tag ) : ?>
                <span class="agency-metric-pill" style="font-size:0.75rem;padding:0.25rem 0.6rem;">
                  <?php echo esc_html( $skill_tag ); ?>
                </span>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</article>
<!-- /wp:group -->
