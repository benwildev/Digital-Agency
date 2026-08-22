<?php
/**
 * Title: Single Case Study Detail Layout
 * Slug: digital-agency/single-project
 * Categories: digital-agency-projects
 * Description: In-depth case study breakdown featuring challenge, solution, quantifiable outcomes, media gallery, and linked testimonial.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$post_id      = get_the_ID();
$meta         = digital_agency_get_project_meta( $post_id );
$terms        = get_the_terms( $post_id, 'project_category' );
$term_str     = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->name : __( 'Case Study', 'digital-agency' );
$related      = digital_agency_get_related_projects( $post_id, 2 );
$gallery_imgs = ! empty( $meta['gallery'] ) ? digital_agency_get_gallery_images( $meta['gallery'] ) : array();

// Relational Testimonial Query
$testimonial_post = null;
$testimonial_meta = null;
if ( ! empty( $meta['testimonial_id'] ) ) {
    $t_post = get_post( (int) $meta['testimonial_id'] );
    if ( $t_post && 'publish' === $t_post->post_status && 'testimonial' === $t_post->post_type ) {
        $testimonial_post = $t_post;
        $testimonial_meta = digital_agency_get_testimonial_meta( $t_post->ID );
    }
}
?>
<!-- wp:pattern {"slug":"digital-agency/page-header"} /-->

<!-- wp:group {"tagName":"article","className":"agency-project-single","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-16","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<article class="wp-block-group alignfull agency-project-single has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-16);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- Featured Hero Visual / Video -->
  <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|space-16"}}}} -->
  <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--space-16);">
    <?php if ( has_post_thumbnail() ) : ?>
      <div class="agency-bw-image" style="border-radius:28px;overflow:hidden;max-height:560px;position:relative;border:1px solid var(--wp--preset--color--border-dark-strong);">
        <?php the_post_thumbnail( 'full', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); ?>
        <?php if ( ! empty( $meta['impact_metric'] ) ) : ?>
          <div style="position:absolute;bottom:2rem;left:2rem;background:rgba(10, 19, 15, 0.9);backdrop-filter:blur(10px);border:1px solid var(--wp--preset--color--primary-accent);border-radius:9999px;padding:0.6rem 1.5rem;color:var(--wp--preset--color--primary-accent);font-weight:800;font-size:1.25rem;">
            ✦ <?php echo esc_html( $meta['impact_metric'] ); ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
  <!-- /wp:group -->

  <!-- Project Meta Strip -->
  <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|space-16"}}}} -->
  <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--space-16);background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;padding:2rem 2.5rem;display:grid;grid-template-columns:repeat(auto-fit, minmax(180px, 1fr));gap:2rem;">
    <?php if ( ! empty( $meta['client'] ) ) : ?>
      <div>
        <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--text-light-muted);text-transform:uppercase;display:block;margin-bottom:0.35rem;"><?php esc_html_e( 'CLIENT', 'digital-agency' ); ?></span>
        <strong style="color:#FFF;font-size:1.125rem;"><?php echo esc_html( $meta['client'] ); ?></strong>
      </div>
    <?php endif; ?>

    <div>
      <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--text-light-muted);text-transform:uppercase;display:block;margin-bottom:0.35rem;"><?php esc_html_e( 'DISCIPLINE', 'digital-agency' ); ?></span>
      <strong style="color:var(--wp--preset--color--primary-accent);font-size:1.125rem;"><?php echo esc_html( $term_str ); ?></strong>
    </div>

    <?php if ( ! empty( $meta['year'] ) ) : ?>
      <div>
        <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--text-light-muted);text-transform:uppercase;display:block;margin-bottom:0.35rem;"><?php esc_html_e( 'TIMELINE / YEAR', 'digital-agency' ); ?></span>
        <strong style="color:#FFF;font-size:1.125rem;"><?php echo esc_html( $meta['year'] . ( ! empty( $meta['timeline'] ) ? ' • ' . $meta['timeline'] : '' ) ); ?></strong>
      </div>
    <?php endif; ?>

    <?php if ( ! empty( $meta['country'] ) ) : ?>
      <div>
        <span style="font-size:0.75rem;font-weight:700;color:var(--wp--preset--color--text-light-muted);text-transform:uppercase;display:block;margin-bottom:0.35rem;"><?php esc_html_e( 'GEOGRAPHY', 'digital-agency' ); ?></span>
        <strong style="color:#FFF;font-size:1.125rem;"><?php echo esc_html( $meta['country'] ); ?></strong>
      </div>
    <?php endif; ?>
  </div>
  <!-- /wp:group -->

  <!-- Structured Narrative Grid (Challenge, Strategy, Results) -->
  <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|space-16"}}}} -->
  <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--space-16);">
    <!-- Primary Content -->
    <div class="agency-project-body" style="color:var(--wp--preset--color--text-light-secondary);font-size:1.125rem;line-height:1.8;margin-bottom:3.5rem;max-width:900px;">
      <?php the_content(); ?>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(320px, 1fr));gap:2.5rem;">
      <?php if ( ! empty( $meta['challenge'] ) ) : ?>
        <div style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;padding:2.5rem;">
          <span class="agency-eyebrow" style="margin-bottom:1rem;"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( '01. THE CHALLENGE', 'digital-agency' ); ?></span>
          <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:700;color:#FFF;margin-bottom:1rem;"><?php esc_html_e( 'Market Bottleneck', 'digital-agency' ); ?></h3>
          <p style="color:var(--wp--preset--color--text-light-secondary);font-size:1rem;line-height:1.7;"><?php echo esc_html( $meta['challenge'] ); ?></p>
        </div>
      <?php endif; ?>

      <?php if ( ! empty( $meta['solution'] ) ) : ?>
        <div style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;padding:2.5rem;">
          <span class="agency-eyebrow" style="margin-bottom:1rem;"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( '02. THE STRATEGY', 'digital-agency' ); ?></span>
          <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:700;color:#FFF;margin-bottom:1rem;"><?php esc_html_e( 'Execution Architecture', 'digital-agency' ); ?></h3>
          <p style="color:var(--wp--preset--color--text-light-secondary);font-size:1rem;line-height:1.7;"><?php echo esc_html( $meta['solution'] ); ?></p>
        </div>
      <?php endif; ?>

      <?php if ( ! empty( $meta['results'] ) ) : ?>
        <div style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--primary-accent);border-radius:20px;padding:2.5rem;box-shadow:0 0 30px rgba(200, 245, 96, 0.05);">
          <span class="agency-eyebrow" style="margin-bottom:1rem;"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( '03. THE IMPACT', 'digital-agency' ); ?></span>
          <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.5rem;font-weight:700;color:var(--wp--preset--color--primary-accent);margin-bottom:1rem;"><?php esc_html_e( 'Quantifiable ROI', 'digital-agency' ); ?></h3>
          <p style="color:var(--wp--preset--color--text-light-primary);font-size:1rem;line-height:1.7;font-weight:500;"><?php echo esc_html( $meta['results'] ); ?></p>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <!-- /wp:group -->

  <!-- Gallery Artifacts -->
  <?php if ( ! empty( $gallery_imgs ) ) : ?>
    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|space-16"}}}} -->
    <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--space-16);">
      <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.75rem;font-weight:700;color:#FFF;margin-bottom:2rem;">
        <?php esc_html_e( 'Project Media & System Artifacts', 'digital-agency' ); ?>
      </h3>
      <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(340px, 1fr));gap:2rem;">
        <?php foreach ( $gallery_imgs as $img ) : ?>
          <div class="agency-bw-image" style="border-radius:20px;overflow:hidden;height:280px;border:1px solid var(--wp--preset--color--border-dark-strong);">
            <img src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" style="width:100%;height:100%;object-fit:cover;" />
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- /wp:group -->
  <?php endif; ?>

  <!-- Relational Linked Testimonial -->
  <?php if ( $testimonial_post && $testimonial_meta ) : ?>
    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|space-16"}}}} -->
    <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--space-16);background:var(--wp--preset--color--surface-dark-elevated);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:24px;padding:3.5rem;">
      <div style="color:var(--wp--preset--color--primary-accent);font-size:1.25rem;margin-bottom:1.5rem;letter-spacing:0.15em;">★★★★★</div>
      <blockquote style="margin:0 0 2rem 0;font-size:1.5rem;font-weight:500;color:#FFF;line-height:1.5;font-style:italic;">
        "<?php echo esc_html( wp_strip_all_tags( $testimonial_post->post_content ) ); ?>"
      </blockquote>
      <div style="display:flex;align-items:center;gap:1rem;">
        <?php if ( has_post_thumbnail( $testimonial_post->ID ) ) : ?>
          <div style="width:52px;height:52px;border-radius:50%;overflow:hidden;">
            <?php echo get_the_post_thumbnail( $testimonial_post->ID, 'thumbnail', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); ?>
          </div>
        <?php endif; ?>
        <div>
          <strong style="color:#FFF;font-size:1.0625rem;display:block;"><?php echo esc_html( $testimonial_meta['author'] ?: $testimonial_post->post_title ); ?></strong>
          <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.875rem;"><?php echo esc_html( $testimonial_meta['role'] . ( ! empty( $testimonial_meta['company'] ) ? ' • ' . $testimonial_meta['company'] : '' ) ); ?></span>
        </div>
      </div>
    </div>
    <!-- /wp:group -->
  <?php endif; ?>

  <!-- Related Case Studies -->
  <?php if ( $related->have_posts() ) : ?>
    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|space-20"}}}} -->
    <div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--space-20);border-top:1px solid var(--wp--preset--color--border-dark-subtle);padding-top:var(--wp--preset--spacing--space-16);">
      <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.75rem;font-weight:700;color:#FFF;margin-bottom:2rem;">
        <?php esc_html_e( 'More Transformation Case Studies', 'digital-agency' ); ?>
      </h3>
      <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(360px, 1fr));gap:2.5rem;">
        <?php
        while ( $related->have_posts() ) : $related->the_post();
            $r_id   = get_the_ID();
            $r_meta = digital_agency_get_project_meta( $r_id );
            ?>
            <div class="agency-card" style="background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;overflow:hidden;display:flex;flex-direction:column;justify-content:space-between;">
              <div class="agency-bw-image" style="height:200px;background:var(--wp--preset--color--surface-dark-elevated);">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'medium_large', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); ?>
                <?php endif; ?>
              </div>
              <div style="padding:2rem;">
                <h4 style="font-family:var(--wp--preset--font-family--syne);font-size:1.375rem;font-weight:700;margin:0 0 0.5rem 0;">
                  <a href="<?php the_permalink(); ?>" style="color:#FFF;text-decoration:none;"><?php the_title(); ?></a>
                </h4>
                <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.875rem;line-height:1.6;margin-bottom:1rem;">
                  <?php echo esc_html( get_the_excerpt() ?: wp_trim_words( get_the_content(), 15 ) ); ?>
                </p>
                <a href="<?php the_permalink(); ?>" style="color:var(--wp--preset--color--primary-accent);font-weight:700;font-size:0.875rem;text-decoration:none;">
                  <?php esc_html_e( 'Read Case Study', 'digital-agency' ); ?> ↗
                </a>
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
