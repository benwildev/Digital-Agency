<?php
/**
 * Title: Homepage Testimonials & Social Proof
 * Slug: digital-agency/home-testimonials
 * Categories: digital-agency-general
 * Description: 3-column client endorsement grid dynamically querying the Testimonial CPT with 5-star ratings.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$testimonials_query = digital_agency_get_testimonials( array( 'posts_per_page' => 3 ) );
?>
<!-- wp:group {"tagName":"section","className":"agency-testimonials-section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-20","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-card"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-testimonials-section has-surface-dark-card-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-20);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <div style="text-align:center;max-width:720px;margin:0 auto var(--wp--preset--spacing--space-16) auto;">
    <!-- wp:paragraph {"className":"agency-eyebrow"} -->
    <p class="agency-eyebrow" style="justify-content:center;"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'CLIENT VOICES', 'digital-agency' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}},"fontSize":"heading-2"} -->
    <h2 class="wp-block-heading has-heading-2-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( 'Trusted by Enterprise Leaders & Fast-Scaling Brands', 'digital-agency' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|text-light-secondary"}},"fontSize":"body-regular"} -->
    <p class="has-text-light-secondary-color has-text-color has-body-regular-font-size"><?php esc_html_e( 'Direct reviews from founders and growth executives who rely on our frameworks.', 'digital-agency' ); ?></p>
    <!-- /wp:paragraph -->
  </div>

  <!-- wp:html -->
  <div class="agency-testimonials-grid" style="display:grid;grid-template-columns:repeat(auto-fill, minmax(340px, 1fr));gap:2rem;max-width:1400px;margin:0 auto;">
    <?php
    if ( $testimonials_query->have_posts() ) :
        while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post();
            $post_id = get_the_ID();
            $meta    = digital_agency_get_testimonial_meta( $post_id );
            $rating  = (int) ( $meta['rating'] ?: 5 );
            ?>
            <div class="agency-card agency-testimonial-card" style="background:var(--wp--preset--color--surface-dark-elevated);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;padding:2.5rem;display:flex;flex-direction:column;justify-content:space-between;">
              <div>
                <div style="color:var(--wp--preset--color--primary-accent);font-size:1.125rem;margin-bottom:1.25rem;letter-spacing:0.1em;">
                  <?php echo esc_html( str_repeat( '★', max( 1, min( 5, $rating ) ) ) ); ?>
                </div>

                <blockquote style="margin:0 0 1.5rem 0;padding:0;color:var(--wp--preset--color--text-light-primary);font-size:1.0625rem;line-height:1.6;font-style:normal;">
                  "<?php echo esc_html( get_the_content() ); ?>"
                </blockquote>
              </div>

              <div style="border-top:1px solid var(--wp--preset--color--border-dark-subtle);padding-top:1.25rem;display:flex;align-items:center;gap:1rem;">
                <?php if ( has_post_thumbnail() ) : ?>
                  <div class="agency-bw-image" style="width:48px;height:48px;border-radius:50%;overflow:hidden;flex-shrink:0;">
                    <?php the_post_thumbnail( 'thumbnail', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); ?>
                  </div>
                <?php else : ?>
                  <div style="width:48px;height:48px;border-radius:50%;background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);display:flex;align-items:center;justify-content:center;color:var(--wp--preset--color--primary-accent);font-weight:bold;flex-shrink:0;">
                    <?php echo esc_html( mb_substr( $meta['author'] ?: get_the_title(), 0, 1 ) ); ?>
                  </div>
                <?php endif; ?>

                <div>
                  <strong style="color:#FFF;display:block;font-size:0.9375rem;"><?php echo esc_html( $meta['author'] ?: get_the_title() ); ?></strong>
                  <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.8125rem;"><?php echo esc_html( $meta['role'] ); ?><?php echo ( ! empty( $meta['company'] ) ) ? ' • ' . esc_html( $meta['company'] ) : ''; ?></span>
                </div>
              </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        // Fallback demo testimonials
        $demo_testimonials = array(
            array( 'author' => 'Marcus Vance', 'role' => 'VP of Growth', 'company' => 'Apex Pay Global', 'quote' => 'Digital Agency re-architected our entire paid acquisition engine. Within four months, our qualified inbound pipeline tripled while customer acquisition cost plummeted by 42%.' ),
            array( 'author' => 'Elena Rostova', 'role' => 'Chief Marketing Officer', 'company' => 'CloudScale SaaS', 'quote' => 'Their engineering rigor and content strategy are unparalleled. They built a custom WordPress platform that scores 99 on Core Web Vitals and doubled our organic search pipeline.' ),
            array( 'author' => 'David Chen', 'role' => 'Founder & CEO', 'company' => 'Aura Maison', 'quote' => 'The return on investment has been staggering. They operate not as an agency, but as an elite in-house growth squad obsessively focused on revenue metrics.' ),
        );
        foreach ( $demo_testimonials as $t ) :
            ?>
            <div class="agency-card agency-testimonial-card" style="background:var(--wp--preset--color--surface-dark-elevated);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;padding:2.5rem;display:flex;flex-direction:column;justify-content:space-between;">
              <div>
                <div style="color:var(--wp--preset--color--primary-accent);font-size:1.125rem;margin-bottom:1.25rem;letter-spacing:0.1em;">★★★★★</div>
                <blockquote style="margin:0 0 1.5rem 0;padding:0;color:var(--wp--preset--color--text-light-primary);font-size:1.0625rem;line-height:1.6;font-style:normal;">
                  "<?php echo esc_html( $t['quote'] ); ?>"
                </blockquote>
              </div>
              <div style="border-top:1px solid var(--wp--preset--color--border-dark-subtle);padding-top:1.25rem;display:flex;align-items:center;gap:1rem;">
                <div style="width:48px;height:48px;border-radius:50%;background:var(--wp--preset--color--surface-dark-card);border:1px solid var(--wp--preset--color--border-dark-strong);display:flex;align-items:center;justify-content:center;color:var(--wp--preset--color--primary-accent);font-weight:bold;flex-shrink:0;">
                  <?php echo esc_html( mb_substr( $t['author'], 0, 1 ) ); ?>
                </div>
                <div>
                  <strong style="color:#FFF;display:block;font-size:0.9375rem;"><?php echo esc_html( $t['author'] ); ?></strong>
                  <span style="color:var(--wp--preset--color--text-light-muted);font-size:0.8125rem;"><?php echo esc_html( $t['role'] ); ?> • <?php echo esc_html( $t['company'] ); ?></span>
                </div>
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
