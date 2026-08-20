<?php
/**
 * Title: Homepage Team Leadership Preview
 * Slug: digital-agency/home-team
 * Categories: digital-agency-team
 * Description: 4-column team member showcase dynamically querying the Team Member CPT with monochrome portraits.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$team_query = digital_agency_get_team_members( array( 'posts_per_page' => 4 ) );
?>
<!-- wp:group {"tagName":"section","className":"agency-team-section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-20","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-team-section has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-20);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|space-12"}}}} -->
  <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--space-12)">
    <div style="max-width:680px;">
      <!-- wp:paragraph {"className":"agency-eyebrow"} -->
      <p class="agency-eyebrow"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'OUR LEADERSHIP', 'digital-agency' ); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}},"fontSize":"heading-2"} -->
      <h2 class="wp-block-heading has-heading-2-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( 'The Minds Driving Your Digital Supremacy', 'digital-agency' ); ?></h2>
      <!-- /wp:heading -->
    </div>

    <!-- wp:buttons {"layout":{"type":"flex"}} -->
    <div class="wp-block-buttons">
      <!-- wp:button {"style":{"border":{"radius":"9999px"}},"className":"is-style-outline","fontSize":"body-small"} -->
      <div class="wp-block-button has-custom-font-size is-style-outline has-body-small-font-size">
        <a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/team/' ) ); ?>" style="border-radius:9999px;font-weight:600;padding:0.75rem 1.5rem;"><?php esc_html_e( 'Meet the Entire Team ↗', 'digital-agency' ); ?></a>
      </div>
      <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
  </div>
  <!-- /wp:group -->

  <!-- wp:html -->
  <div class="agency-team-grid" style="display:grid;grid-template-columns:repeat(auto-fill, minmax(260px, 1fr));gap:2rem;max-width:1400px;margin:0 auto;">
    <?php
    if ( $team_query->have_posts() ) :
        while ( $team_query->have_posts() ) : $team_query->the_post();
            $post_id  = get_the_ID();
            $meta     = digital_agency_get_team_meta( $post_id );
            $position = $meta['position'] ?: __( 'Growth Strategist', 'digital-agency' );
            ?>
            <div class="agency-card agency-team-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;overflow:hidden;transition:transform 0.3s ease, border-color 0.3s ease;">
              <div class="agency-bw-image" style="height:300px;width:100%;position:relative;background:#0e1e17;">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'medium_large', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); ?>
                <?php else : ?>
                  <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:var(--wp--preset--color--surface-dark-elevated);color:var(--wp--preset--color--primary-accent);font-family:var(--wp--preset--font-family--syne);font-size:2rem;font-weight:bold;">
                    <?php echo esc_html( mb_substr( get_the_title(), 0, 1 ) ); ?>
                  </div>
                <?php endif; ?>
              </div>

              <div style="padding:1.5rem;text-align:center;">
                <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.25rem;font-weight:700;margin:0 0 0.25rem 0;">
                  <a href="<?php the_permalink(); ?>" style="color:#FFF;text-decoration:none;"><?php the_title(); ?></a>
                </h3>
                <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;display:block;margin-bottom:1rem;"><?php echo esc_html( $position ); ?></span>

                <?php if ( ! empty( $meta['linkedin'] ) || ! empty( $meta['twitter'] ) ) : ?>
                  <div style="display:flex;justify-content:center;gap:0.5rem;">
                    <?php if ( ! empty( $meta['linkedin'] ) ) : ?>
                      <a href="<?php echo esc_url( $meta['linkedin'] ); ?>" class="agency-social-btn" style="width:32px;height:32px;font-size:0.75rem;" aria-label="<?php echo esc_attr( sprintf( __( 'LinkedIn profile for %s', 'digital-agency' ), get_the_title() ) ); ?>" target="_blank" rel="noopener noreferrer">in</a>
                    <?php endif; ?>
                    <?php if ( ! empty( $meta['twitter'] ) ) : ?>
                      <a href="<?php echo esc_url( $meta['twitter'] ); ?>" class="agency-social-btn" style="width:32px;height:32px;font-size:0.75rem;" aria-label="<?php echo esc_attr( sprintf( __( 'X profile for %s', 'digital-agency' ), get_the_title() ) ); ?>" target="_blank" rel="noopener noreferrer">𝕏</a>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        // Fallback demo team
        $demo_team = array(
            array( 'name' => 'Alexander Vance', 'role' => 'Managing Partner & Head of Strategy' ),
            array( 'name' => 'Sophia Thorne', 'role' => 'VP of Web Engineering' ),
            array( 'name' => 'Julian Montgomery', 'role' => 'Director of Performance Marketing' ),
            array( 'name' => 'Claire Delacroix', 'role' => 'Creative & Brand Architecture Lead' ),
        );
        foreach ( $demo_team as $m ) :
            ?>
            <div class="agency-card agency-team-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;overflow:hidden;">
              <div class="agency-bw-image" style="height:300px;width:100%;background:var(--wp--preset--color--surface-dark-elevated);display:flex;align-items:center;justify-content:center;">
                <div style="font-family:var(--wp--preset--font-family--syne);font-size:2.5rem;color:var(--wp--preset--color--primary-accent);font-weight:bold;">
                  <?php echo esc_html( mb_substr( $m['name'], 0, 1 ) ); ?>
                </div>
              </div>
              <div style="padding:1.5rem;text-align:center;">
                <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.25rem;font-weight:700;margin:0 0 0.25rem 0;color:#FFF;"><?php echo esc_html( $m['name'] ); ?></h3>
                <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;display:block;"><?php echo esc_html( $m['role'] ); ?></span>
              </div>
            </div>
            <?php
        endforeach;
    endif;
    ?>
  </div>
  <!-- /wp:html -->
</section>
<!-- /wp:group -->
