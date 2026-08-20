<?php
/**
 * Title: Careers Directory & Culture
 * Slug: digital-agency/archive-career
 * Categories: digital-agency-careers
 * Description: Open positions directory with location tags, compensation, and studio culture perks.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$careers_query = digital_agency_get_open_careers();
?>
<!-- wp:pattern {"slug":"digital-agency/page-header"} /-->

<!-- wp:group {"tagName":"section","className":"agency-careers-archive","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-16","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-careers-archive has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-16);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|space-12"}}}} -->
  <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--space-12);text-align:center;max-width:760px;margin-left:auto;margin-right:auto;">
    <!-- wp:paragraph {"className":"agency-eyebrow"} -->
    <p class="agency-eyebrow" style="justify-content:center;"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'JOIN THE SQUAD', 'digital-agency' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}},"fontSize":"heading-2"} -->
    <h2 class="wp-block-heading has-heading-2-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( 'Build the Future of Growth Engineering', 'digital-agency' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|text-light-secondary"}},"fontSize":"body-regular"} -->
    <p class="has-text-light-secondary-color has-text-color has-body-regular-font-size"><?php esc_html_e( 'We operate in autonomous high-impact pods. Zero bureaucracy, competitive compensation, and equity opportunities.', 'digital-agency' ); ?></p>
    <!-- /wp:paragraph -->
  </div>
  <!-- /wp:group -->

  <!-- Open Roles List -->
  <!-- wp:html -->
  <div class="agency-careers-list" style="display:flex;flex-direction:column;gap:1.5rem;max-width:1100px;margin:0 auto 4rem auto;">
    <?php
    if ( $careers_query->have_posts() ) :
        while ( $careers_query->have_posts() ) : $careers_query->the_post();
            $post_id  = get_the_ID();
            $meta     = digital_agency_get_career_meta( $post_id );
            $dept     = get_the_terms( $post_id, 'department' );
            $dept_str = ( ! empty( $dept ) && ! is_wp_error( $dept ) ) ? $dept[0]->name : __( 'Engineering', 'digital-agency' );
            ?>
            <article class="agency-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;padding:2rem 2.5rem;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1.5rem;transition:transform 0.2s, border-color 0.2s;">
              <div style="flex:1;min-width:280px;">
                <div style="display:flex;gap:0.75rem;align-items:center;margin-bottom:0.5rem;">
                  <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--primary-accent);text-transform:uppercase;"><?php echo esc_html( $dept_str ); ?></span>
                  <?php if ( ! empty( $meta['type'] ) ) : ?>
                    <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.75rem;">• <?php echo esc_html( $meta['type'] ); ?></span>
                  <?php endif; ?>
                </div>

                <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:700;margin:0 0 0.5rem 0;">
                  <a href="<?php the_permalink(); ?>" style="color:#FFF;text-decoration:none;"><?php the_title(); ?></a>
                </h3>

                <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.5;margin:0;">
                  <?php echo esc_html( get_the_excerpt() ?: wp_trim_words( get_the_content(), 15 ) ); ?>
                </p>
              </div>

              <div style="display:flex;align-items:center;gap:2rem;">
                <?php if ( ! empty( $meta['location'] ) ) : ?>
                  <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;">📍 <?php echo esc_html( $meta['location'] ); ?></span>
                <?php endif; ?>

                <a href="<?php the_permalink(); ?>" class="wp-block-button__link wp-element-button" style="border-radius:9999px;background:var(--wp--preset--color--surface-dark-elevated);border:1px solid var(--wp--preset--color--border-dark-strong);color:#FFF;font-weight:600;padding:0.75rem 1.5rem;text-decoration:none;white-space:nowrap;">
                  <?php esc_html_e( 'View Role', 'digital-agency' ); ?> ↗
                </a>
              </div>
            </article>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        ?>
        <div style="text-align:center;padding:4rem 2rem;background:var(--wp--preset--color--surface-dark-card);border-radius:20px;">
          <h3 style="font-family:var(--wp--preset--font-family--syne);color:#FFF;margin-bottom:0.5rem;"><?php esc_html_e( 'No Open Vacancies Right Now', 'digital-agency' ); ?></h3>
          <p style="color:var(--wp--preset--color--text-light-secondary);max-width:500px;margin:0 auto 1.5rem auto;"><?php esc_html_e( 'We are always interested in meeting exceptional growth engineers, media buyers, and art directors. Send a speculative portfolio directly.', 'digital-agency' ); ?></p>
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="wp-block-button__link wp-element-button" style="border-radius:9999px;background:var(--wp--preset--color--primary-accent);color:var(--wp--preset--color--surface-dark-base);font-weight:700;padding:0.75rem 1.5rem;text-decoration:none;"><?php esc_html_e( 'Send Speculative CV ↗', 'digital-agency' ); ?></a>
        </div>
        <?php
    endif;
    ?>
  </div>
  <!-- /wp:html -->
</section>
<!-- /wp:group -->
