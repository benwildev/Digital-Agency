<?php
/**
 * Title: Single Team Member Detail Layout
 * Slug: digital-agency/single-team
 * Categories: digital-agency-team
 * Description: Executive profile view with biography, structured skillset percentages, and direct contact options.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$post_id  = get_the_ID();
$meta     = digital_agency_get_team_meta( $post_id );
$dept     = get_the_terms( $post_id, 'department' );
$dept_str = ( ! empty( $dept ) && ! is_wp_error( $dept ) ) ? $dept[0]->name : '';
?>
<!-- wp:pattern {"slug":"digital-agency/page-header"} /-->

<!-- wp:group {"tagName":"article","className":"agency-team-single","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-16","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<article class="wp-block-group alignfull agency-team-single has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-16);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|space-12"}}} -->
  <div class="wp-block-columns alignwide">
    <!-- Left Column: Portrait & Meta (38%) -->
    <!-- wp:column {"width":"38%"} -->
    <div class="wp-block-column" style="flex-basis:38%">
      <div style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;padding:2rem;position:sticky;top:100px;">
        <div class="agency-bw-image" style="border-radius:18px;overflow:hidden;height:380px;background:var(--wp--preset--color--surface-dark-elevated);margin-bottom:1.5rem;">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); ?>
          <?php else : ?>
            <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:4rem;color:var(--wp--preset--color--text-light-muted);">✦</div>
          <?php endif; ?>
        </div>

        <h2 style="font-family:var(--wp--preset--font-family--syne);font-size:1.75rem;font-weight:800;color:#FFF;margin:0 0 0.35rem 0;">
          <?php the_title(); ?>
        </h2>

        <p style="color:var(--wp--preset--color--primary-accent);font-size:1rem;font-weight:600;margin:0 0 1.5rem 0;">
          <?php echo esc_html( $meta['position'] ?: __( 'Strategy Partner', 'digital-agency' ) ); ?>
          <?php if ( ! empty( $dept_str ) ) : ?>
            <span style="color:var(--wp--preset--color--text-light-muted);font-weight:400;"> • <?php echo esc_html( $dept_str ); ?></span>
          <?php endif; ?>
        </p>

        <div style="border-top:1px solid var(--wp--preset--color--border-dark-subtle);padding-top:1.25rem;display:flex;flex-direction:column;gap:0.75rem;">
          <?php if ( ! empty( $meta['email'] ) ) : ?>
            <div style="display:flex;justify-content:space-between;font-size:0.875rem;">
              <span style="color:var(--wp--preset--color--text-light-muted);"><?php esc_html_e( 'Direct Email:', 'digital-agency' ); ?></span>
              <a href="<?php echo esc_url( 'mailto:' . antispambot( $meta['email'] ) ); ?>" style="color:#FFF;text-decoration:none;"><?php echo esc_html( antispambot( $meta['email'] ) ); ?></a>
            </div>
          <?php endif; ?>

          <?php if ( ! empty( $meta['linkedin'] ) || ! empty( $meta['twitter'] ) ) : ?>
            <div style="display:flex;justify-content:space-between;align-items:center;font-size:0.875rem;margin-top:0.5rem;">
              <span style="color:var(--wp--preset--color--text-light-muted);"><?php esc_html_e( 'Profiles:', 'digital-agency' ); ?></span>
              <div style="display:flex;gap:1rem;">
                <?php if ( ! empty( $meta['linkedin'] ) ) : ?>
                  <a href="<?php echo esc_url( $meta['linkedin'] ); ?>" target="_blank" rel="noopener noreferrer" style="color:var(--wp--preset--color--primary-accent);text-decoration:none;font-weight:600;">LinkedIn ↗</a>
                <?php endif; ?>
                <?php if ( ! empty( $meta['twitter'] ) ) : ?>
                  <a href="<?php echo esc_url( $meta['twitter'] ); ?>" target="_blank" rel="noopener noreferrer" style="color:var(--wp--preset--color--primary-accent);text-decoration:none;font-weight:600;">Twitter ↗</a>
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <!-- /wp:column -->

    <!-- Right Column: Narrative Biography & Validated Skills (62%) -->
    <!-- wp:column {"width":"62%"} -->
    <div class="wp-block-column" style="flex-basis:62%">
      <div style="margin-bottom:3rem;">
        <span class="agency-eyebrow" style="margin-bottom:1rem;"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'EXECUTIVE PROFILE', 'digital-agency' ); ?></span>
        <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:2rem;font-weight:800;color:#FFF;margin-bottom:1.5rem;">
          <?php esc_html_e( 'Background & Industry Experience', 'digital-agency' ); ?>
        </h3>
        <div class="agency-team-body" style="color:var(--wp--preset--color--text-light-secondary);font-size:1.0625rem;line-height:1.8;">
          <?php the_content(); ?>
        </div>
      </div>

      <!-- Validated Skills & Capabilities Grid -->
      <?php if ( ! empty( $meta['skills'] ) && is_array( $meta['skills'] ) ) : ?>
        <div style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;padding:2.5rem;margin-bottom:3rem;">
          <h4 style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:700;color:#FFF;margin-bottom:1.75rem;">
            <?php esc_html_e( 'Specialized Domain Mastery', 'digital-agency' ); ?>
          </h4>

          <div style="display:flex;flex-direction:column;gap:1.5rem;">
            <?php
            foreach ( $meta['skills'] as $skill ) :
                $name = ! empty( $skill['name'] ) ? $skill['name'] : '';
                $pct  = isset( $skill['percentage'] ) ? min( 100, max( 0, (int) $skill['percentage'] ) ) : 90;
                if ( empty( $name ) ) continue;
                ?>
                <div>
                  <div style="display:flex;justify-content:space-between;margin-bottom:0.5rem;font-size:0.9375rem;">
                    <span style="color:#FFF;font-weight:600;"><?php echo esc_html( $name ); ?></span>
                    <span style="color:var(--wp--preset--color--primary-accent);font-weight:700;"><?php echo esc_html( (string) $pct ); ?>%</span>
                  </div>
                  <div style="height:8px;background:var(--wp--preset--color--surface-dark-elevated);border-radius:9999px;overflow:hidden;">
                    <div style="height:100%;width:<?php echo esc_attr( (string) $pct ); ?>%;background:var(--wp--preset--color--primary-accent);border-radius:9999px;"></div>
                  </div>
                </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</article>
<!-- /wp:group -->
