<?php
/**
 * Title: Services Archive Layout
 * Slug: digital-agency/archive-service
 * Categories: digital-agency-services
 * Description: Comprehensive services directory with deliverable tags, price indicators, and methodology overview.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$services_query = digital_agency_get_services( array( 'posts_per_page' => 12 ) );
?>
<!-- wp:pattern {"slug":"digital-agency/page-header"} /-->

<!-- wp:group {"tagName":"section","className":"agency-services-archive","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-16","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-services-archive has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-16);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|space-12"}}}} -->
  <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--space-12);text-align:center;max-width:760px;margin-left:auto;margin-right:auto;">
    <!-- wp:paragraph {"className":"agency-eyebrow"} -->
    <p class="agency-eyebrow" style="justify-content:center;"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'FULL CAPABILITY SUITE', 'digital-agency' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}},"fontSize":"heading-2"} -->
    <h2 class="wp-block-heading has-heading-2-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( 'End-to-End Growth Architecture for Industry Leaders', 'digital-agency' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|text-light-secondary"}},"fontSize":"body-regular"} -->
    <p class="has-text-light-secondary-color has-text-color has-body-regular-font-size"><?php esc_html_e( 'Every service is engineered around measurable revenue growth, technical excellence, and rapid compounding return on investment.', 'digital-agency' ); ?></p>
    <!-- /wp:paragraph -->
  </div>
  <!-- /wp:group -->

  <!-- wp:html -->
  <div class="agency-services-grid" style="display:grid;grid-template-columns:repeat(auto-fill, minmax(360px, 1fr));gap:2rem;max-width:1400px;margin:0 auto;">
    <?php
    if ( $services_query->have_posts() ) :
        $index = 1;
        while ( $services_query->have_posts() ) : $services_query->the_post();
            $post_id = get_the_ID();
            $meta    = digital_agency_get_service_meta( $post_id );
            $idx_str = str_pad( (string) $index, 2, '0', STR_PAD_LEFT );
            $cats    = get_the_terms( $post_id, 'service_category' );
            $cat_name = ( ! empty( $cats ) && ! is_wp_error( $cats ) ) ? $cats[0]->name : '';
            ?>
            <article class="agency-card agency-service-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;padding:2.5rem;display:flex;flex-direction:column;justify-content:space-between;transition:transform 0.3s ease, border-color 0.3s ease;">
              <div>
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;">
                  <span style="font-family:var(--wp--preset--font-family--syne);font-size:1.75rem;font-weight:800;color:var(--wp--preset--color--primary-accent);"><?php echo esc_html( $idx_str ); ?></span>
                  <?php if ( ! empty( $meta['badge'] ) ) : ?>
                    <span class="agency-eyebrow" style="font-size:0.6875rem;padding:0.2rem 0.6rem;"><?php echo esc_html( $meta['badge'] ); ?></span>
                  <?php elseif ( ! empty( $cat_name ) ) : ?>
                    <span style="font-size:0.75rem;color:var(--wp--preset--color--text-light-muted);font-weight:600;text-transform:uppercase;letter-spacing:0.05em;"><?php echo esc_html( $cat_name ); ?></span>
                  <?php endif; ?>
                </div>

                <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.625rem;font-weight:700;margin:0 0 1rem 0;">
                  <a href="<?php the_permalink(); ?>" style="color:#FFF;text-decoration:none;"><?php the_title(); ?></a>
                </h3>

                <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.6;margin-bottom:1.5rem;">
                  <?php echo esc_html( get_the_excerpt() ?: wp_trim_words( get_the_content(), 20 ) ); ?>
                </p>

                <?php if ( ! empty( $meta['included'] ) && is_array( $meta['included'] ) ) : ?>
                  <ul style="list-style:none;padding:0;margin:0 0 1.5rem 0;display:flex;flex-direction:column;gap:0.5rem;">
                    <?php foreach ( array_slice( $meta['included'], 0, 3 ) as $inc_item ) : ?>
                      <li style="font-size:0.875rem;color:var(--wp--preset--color--text-light-secondary);display:flex;align-items:center;gap:0.5rem;">
                        <span style="color:var(--wp--preset--color--primary-accent);">✦</span> <?php echo esc_html( $inc_item ); ?>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
              </div>

              <div style="border-top:1px solid var(--wp--preset--color--border-dark-subtle);padding-top:1.25rem;display:flex;justify-content:space-between;align-items:center;">
                <?php if ( ! empty( $meta['price'] ) ) : ?>
                  <span style="font-size:0.875rem;color:var(--wp--preset--color--text-light-muted);"><?php esc_html_e( 'Starts at', 'digital-agency' ); ?> <strong style="color:var(--wp--preset--color--primary-accent);"><?php echo esc_html( $meta['price'] ); ?></strong></span>
                <?php else : ?>
                  <span style="font-size:0.875rem;color:var(--wp--preset--color--text-light-muted);"><?php esc_html_e( 'Custom Scope', 'digital-agency' ); ?></span>
                <?php endif; ?>

                <a href="<?php the_permalink(); ?>" class="agency-card-arrow" style="width:38px;height:38px;border-radius:50%;background:var(--wp--preset--color--surface-dark-elevated);border:1px solid var(--wp--preset--color--border-dark-strong);display:inline-flex;align-items:center;justify-content:center;color:#FFF;text-decoration:none;transition:background 0.2s, color 0.2s;" aria-label="<?php esc_attr_e( 'Explore service details', 'digital-agency' ); ?>">↗</a>
              </div>
            </article>
            <?php
            $index++;
        endwhile;
        wp_reset_postdata();
    else :
        ?>
        <div style="grid-column:1 / -1;text-align:center;padding:4rem 2rem;background:var(--wp--preset--color--surface-dark-card);border-radius:20px;">
          <h3 style="font-family:var(--wp--preset--font-family--syne);color:#FFF;margin-bottom:0.5rem;"><?php esc_html_e( 'Services Portfolio Currently Being Updated', 'digital-agency' ); ?></h3>
          <p style="color:var(--wp--preset--color--text-light-secondary);max-width:500px;margin:0 auto 1.5rem auto;"><?php esc_html_e( 'Our strategic capabilities are customized to specific enterprise client roadmaps. Contact our partners directly to receive an audit deck.', 'digital-agency' ); ?></p>
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="wp-block-button__link wp-element-button" style="border-radius:9999px;background:var(--wp--preset--color--primary-accent);color:var(--wp--preset--color--surface-dark-base);font-weight:700;padding:0.75rem 1.5rem;text-decoration:none;"><?php esc_html_e( 'Inquire with Strategy Pod ↗', 'digital-agency' ); ?></a>
        </div>
        <?php
    endif;
    ?>
  </div>
  <!-- /wp:html -->
</section>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"digital-agency/home-process"} /-->
