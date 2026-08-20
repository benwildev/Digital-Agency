<?php
/**
 * Title: Team Leadership Directory
 * Slug: digital-agency/archive-team
 * Categories: digital-agency-team
 * Description: Complete team leadership directory featuring partner profiles, specialties, and social credentials.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$team_query = digital_agency_get_team_members( array( 'posts_per_page' => 16 ) );
?>
<!-- wp:pattern {"slug":"digital-agency/page-header"} /-->

<!-- wp:group {"tagName":"section","className":"agency-team-archive","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-16","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-team-archive has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-16);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|space-12"}}}} -->
  <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--space-12);text-align:center;max-width:760px;margin-left:auto;margin-right:auto;">
    <!-- wp:paragraph {"className":"agency-eyebrow"} -->
    <p class="agency-eyebrow" style="justify-content:center;"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'STRATEGIC LEADERSHIP', 'digital-agency' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}},"fontSize":"heading-2"} -->
    <h2 class="wp-block-heading has-heading-2-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( 'The Minds Behind Market-Leading Transformations', 'digital-agency' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|text-light-secondary"}},"fontSize":"body-regular"} -->
    <p class="has-text-light-secondary-color has-text-color has-body-regular-font-size"><?php esc_html_e( 'Our cross-functional squads combine seasoned growth strategists, principal software engineers, and creative directors.', 'digital-agency' ); ?></p>
    <!-- /wp:paragraph -->
  </div>
  <!-- /wp:group -->

  <!-- wp:html -->
  <div class="agency-team-grid" style="display:grid;grid-template-columns:repeat(auto-fill, minmax(280px, 1fr));gap:2rem;max-width:1400px;margin:0 auto;">
    <?php
    if ( $team_query->have_posts() ) :
        while ( $team_query->have_posts() ) : $team_query->the_post();
            $post_id  = get_the_ID();
            $meta     = digital_agency_get_team_meta( $post_id );
            $dept     = get_the_terms( $post_id, 'department' );
            $dept_str = ( ! empty( $dept ) && ! is_wp_error( $dept ) ) ? $dept[0]->name : '';
            ?>
            <article class="agency-card agency-team-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;overflow:hidden;transition:transform 0.3s ease, border-color 0.3s ease;">
              <div class="agency-bw-image" style="height:320px;position:relative;background:var(--wp--preset--color--surface-dark-elevated);">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); ?>
                <?php else : ?>
                  <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:3rem;color:var(--wp--preset--color--text-light-muted);">✦</div>
                <?php endif; ?>

                <?php if ( ! empty( $dept_str ) ) : ?>
                  <div style="position:absolute;top:1rem;left:1rem;background:rgba(10, 19, 15, 0.85);backdrop-filter:blur(6px);border:1px solid var(--wp--preset--color--border-dark-subtle);border-radius:9999px;padding:0.25rem 0.65rem;font-size:0.6875rem;color:#FFF;font-weight:700;text-transform:uppercase;">
                    <?php echo esc_html( $dept_str ); ?>
                  </div>
                <?php endif; ?>
              </div>

              <div style="padding:1.75rem 1.5rem 1.5rem 1.5rem;">
                <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.25rem;font-weight:700;margin:0 0 0.35rem 0;">
                  <a href="<?php the_permalink(); ?>" style="color:#FFF;text-decoration:none;"><?php the_title(); ?></a>
                </h3>

                <p style="color:var(--wp--preset--color--primary-accent);font-size:0.875rem;font-weight:600;margin:0 0 1rem 0;">
                  <?php echo esc_html( $meta['position'] ?: __( 'Partner & Strategist', 'digital-agency' ) ); ?>
                </p>

                <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.875rem;line-height:1.5;margin-bottom:1.25rem;">
                  <?php echo esc_html( get_the_excerpt() ?: wp_trim_words( get_the_content(), 12 ) ); ?>
                </p>

                <div style="border-top:1px solid var(--wp--preset--color--border-dark-subtle);padding-top:1rem;display:flex;justify-content:space-between;align-items:center;">
                  <div style="display:flex;gap:0.75rem;">
                    <?php if ( ! empty( $meta['linkedin'] ) ) : ?>
                      <a href="<?php echo esc_url( $meta['linkedin'] ); ?>" target="_blank" rel="noopener noreferrer" style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;text-decoration:none;" aria-label="<?php esc_attr_e( 'LinkedIn Profile', 'digital-agency' ); ?>">in</a>
                    <?php endif; ?>
                    <?php if ( ! empty( $meta['twitter'] ) ) : ?>
                      <a href="<?php echo esc_url( $meta['twitter'] ); ?>" target="_blank" rel="noopener noreferrer" style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;text-decoration:none;" aria-label="<?php esc_attr_e( 'Twitter / X Profile', 'digital-agency' ); ?>">𝕏</a>
                    <?php endif; ?>
                  </div>

                  <a href="<?php the_permalink(); ?>" style="color:var(--wp--preset--color--primary-accent);font-weight:700;font-size:0.8125rem;text-decoration:none;">
                    <?php esc_html_e( 'Full Bio', 'digital-agency' ); ?> ↗
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
          <h3 style="font-family:var(--wp--preset--font-family--syne);color:#FFF;margin-bottom:0.5rem;"><?php esc_html_e( 'Team Directory Updating', 'digital-agency' ); ?></h3>
          <p style="color:var(--wp--preset--color--text-light-secondary);max-width:500px;margin:0 auto;"><?php esc_html_e( 'Our cross-functional leadership squad is expanding. Explore open career opportunities to join us.', 'digital-agency' ); ?></p>
        </div>
        <?php
    endif;
    ?>
  </div>
  <!-- /wp:html -->
</section>
<!-- /wp:group -->
