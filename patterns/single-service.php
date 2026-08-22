<?php
/**
 * Title: Single Service Detail Layout
 * Slug: digital-agency/single-service
 * Categories: digital-agency-services
 * Description: Comprehensive single service template with structured deliverables, benefits, expertise tags, gallery, and related services.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$post_id  = get_the_ID();
$meta     = digital_agency_get_service_meta( $post_id );
$cats     = get_the_terms( $post_id, 'service_category' );
$cat_name = ( ! empty( $cats ) && ! is_wp_error( $cats ) ) ? $cats[0]->name : '';
$related  = digital_agency_get_related_services( $post_id, 3 );
$gallery_imgs = ! empty( $meta['gallery'] ) ? digital_agency_get_gallery_images( $meta['gallery'] ) : array();
?>
<!-- wp:pattern {"slug":"digital-agency/page-header"} /-->

<!-- wp:group {"tagName":"article","className":"agency-service-single","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-16","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<article class="wp-block-group alignfull agency-service-single has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-16);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|space-12"}}} -->
  <div class="wp-block-columns alignwide">
    <!-- Left: Main Content (65%) -->
    <!-- wp:column {"width":"65%"} -->
    <div class="wp-block-column" style="flex-basis:65%">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="agency-bw-image" style="border-radius:24px;overflow:hidden;margin-bottom:2.5rem;max-height:480px;">
          <?php the_post_thumbnail( 'full', array( 'style' => 'width:100%;height:auto;object-fit:cover;' ) ); ?>
        </div>
      <?php endif; ?>

      <div class="agency-service-body" style="color:var(--wp--preset--color--text-light-secondary);font-size:1.0625rem;line-height:1.8;margin-bottom:3rem;">
        <?php the_content(); ?>
      </div>

      <!-- What's Included / Deliverables -->
      <?php if ( ! empty( $meta['included'] ) && is_array( $meta['included'] ) ) : ?>
        <div style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;padding:2.5rem;margin-bottom:3rem;">
          <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:700;color:#FFF;margin-bottom:1.5rem;">
            <?php esc_html_e( "What's Included in This Capability", 'digital-agency' ); ?>
          </h3>
          <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(260px, 1fr));gap:1rem;">
            <?php foreach ( $meta['included'] as $inc_item ) : ?>
              <div style="display:flex;align-items:flex-start;gap:0.75rem;background:var(--wp--preset--color--surface-dark-elevated);border-radius:12px;padding:1rem;">
                <span style="color:var(--wp--preset--color--primary-accent);font-weight:bold;">✦</span>
                <span style="color:#FFF;font-size:0.9375rem;"><?php echo esc_html( $inc_item ); ?></span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <!-- Key Strategic Benefits -->
      <?php if ( ! empty( $meta['benefits'] ) && is_array( $meta['benefits'] ) ) : ?>
        <div style="margin-bottom:3rem;">
          <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:700;color:#FFF;margin-bottom:1.5rem;">
            <?php esc_html_e( 'Quantifiable Business Benefits', 'digital-agency' ); ?>
          </h3>
          <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:1rem;">
            <?php foreach ( $meta['benefits'] as $benefit ) : ?>
              <li style="display:flex;align-items:flex-start;gap:0.75rem;background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:12px;padding:1.25rem;">
                <span style="color:var(--wp--preset--color--primary-accent);font-size:1.25rem;">✓</span>
                <span style="color:var(--wp--preset--color--text-light-secondary);font-size:1rem;"><?php echo esc_html( $benefit ); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <!-- Gallery Showcase -->
      <?php if ( ! empty( $gallery_imgs ) ) : ?>
        <div style="margin-bottom:3rem;">
          <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:700;color:#FFF;margin-bottom:1.5rem;">
            <?php esc_html_e( 'Visual Artifacts & Deliverables', 'digital-agency' ); ?>
          </h3>
          <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(240px, 1fr));gap:1.5rem;">
            <?php foreach ( $gallery_imgs as $img ) : ?>
              <div class="agency-bw-image" style="border-radius:16px;overflow:hidden;height:200px;">
                <img src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" style="width:100%;height:100%;object-fit:cover;" />
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <!-- /wp:column -->

    <!-- Right: Sticky Sidebar (35%) -->
    <!-- wp:column {"width":"35%"} -->
    <div class="wp-block-column" style="flex-basis:35%">
      <div style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;padding:2.5rem;position:sticky;top:100px;">
        <?php if ( ! empty( $cat_name ) ) : ?>
          <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--primary-accent);text-transform:uppercase;letter-spacing:0.1em;display:block;margin-bottom:0.75rem;"><?php echo esc_html( $cat_name ); ?></span>
        <?php endif; ?>

        <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.75rem;font-weight:800;color:#FFF;margin-bottom:1.5rem;">
          <?php the_title(); ?>
        </h3>

        <div style="border-top:1px solid var(--wp--preset--color--border-dark-subtle);border-bottom:1px solid var(--wp--preset--color--border-dark-subtle);padding:1.5rem 0;margin-bottom:2rem;display:flex;flex-direction:column;gap:1rem;">
          <?php if ( ! empty( $meta['price'] ) ) : ?>
            <div style="display:flex;justify-content:space-between;align-items:center;">
              <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;"><?php esc_html_e( 'Starting Investment', 'digital-agency' ); ?></span>
              <strong style="color:var(--wp--preset--color--primary-accent);font-size:1.25rem;"><?php echo esc_html( $meta['price'] ); ?></strong>
            </div>
          <?php endif; ?>

          <?php if ( ! empty( $meta['timeline'] ) ) : ?>
            <div style="display:flex;justify-content:space-between;align-items:center;">
              <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;"><?php esc_html_e( 'Sprint Timeline', 'digital-agency' ); ?></span>
              <span style="color:#FFF;font-weight:600;font-size:0.9375rem;"><?php echo esc_html( $meta['timeline'] ); ?></span>
            </div>
          <?php endif; ?>
        </div>

        <a href="#contact" class="wp-block-button__link wp-element-button" style="display:block;text-align:center;border-radius:10px;background:var(--wp--preset--color--primary-accent);color:var(--wp--preset--color--surface-dark-base);font-weight:700;padding:1rem;text-decoration:none;margin-bottom:1.5rem;">
          <?php esc_html_e( 'Book Strategic Consultation ↗', 'digital-agency' ); ?>
        </a>

        <?php if ( ! empty( $meta['expertise'] ) && is_array( $meta['expertise'] ) ) : ?>
          <div>
            <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--text-light-muted);text-transform:uppercase;display:block;margin-bottom:0.75rem;"><?php esc_html_e( 'Core Expertise Stack', 'digital-agency' ); ?></span>
            <div style="display:flex;flex-wrap:wrap;gap:0.5rem;">
              <?php foreach ( $meta['expertise'] as $tag ) : ?>
                <span class="agency-metric-pill" style="font-size:0.75rem;padding:0.25rem 0.6rem;">
                  <?php echo esc_html( $tag ); ?>
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

  <!-- Related Services -->
  <?php if ( $related->have_posts() ) : ?>
    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|space-20"}}}} -->
    <div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--space-20);border-top:1px solid var(--wp--preset--color--border-dark-subtle);padding-top:var(--wp--preset--spacing--space-16);">
      <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.75rem;font-weight:700;color:#FFF;margin-bottom:2rem;">
        <?php esc_html_e( 'Complementary Capabilities', 'digital-agency' ); ?>
      </h3>
      <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(320px, 1fr));gap:2rem;">
        <?php
        while ( $related->have_posts() ) : $related->the_post();
            $r_id   = get_the_ID();
            $r_meta = digital_agency_get_service_meta( $r_id );
            ?>
            <div class="agency-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;padding:2rem;display:flex;flex-direction:column;justify-content:space-between;">
              <div>
                <h4 style="font-family:var(--wp--preset--font-family--syne);font-size:1.375rem;font-weight:700;margin:0 0 0.75rem 0;">
                  <a href="<?php the_permalink(); ?>" style="color:#FFF;text-decoration:none;"><?php the_title(); ?></a>
                </h4>
                <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.875rem;line-height:1.6;margin-bottom:1.5rem;">
                  <?php echo esc_html( get_the_excerpt() ?: wp_trim_words( get_the_content(), 15 ) ); ?>
                </p>
              </div>
              <div style="border-top:1px solid var(--wp--preset--color--border-dark-subtle);padding-top:1rem;display:flex;justify-content:space-between;align-items:center;">
                <span style="font-size:0.8125rem;color:var(--wp--preset--color--text-light-muted);"><?php echo esc_html( $r_meta['price'] ?: __( 'Bespoke', 'digital-agency' ) ); ?></span>
                <a href="<?php the_permalink(); ?>" style="color:var(--wp--preset--color--primary-accent);font-weight:600;font-size:0.875rem;text-decoration:none;">↗</a>
              </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
      </div>
    </div>
    <!-- /wp:group -->
  <?php endif; ?>
</article>
<!-- /wp:group -->
