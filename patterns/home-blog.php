<?php
/**
 * Title: Homepage Latest News & Insights
 * Slug: digital-agency/home-blog
 * Categories: digital-agency-general
 * Description: 3-column articles grid querying recent WordPress blog posts.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$blog_query = new WP_Query( array(
    'post_type'           => 'post',
    'posts_per_page'      => 3,
    'post_status'         => 'publish',
    'ignore_sticky_posts' => true,
    'no_found_rows'       => true,
) );
?>
<!-- wp:group {"tagName":"section","className":"agency-blog-section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-20","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-card"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-blog-section has-surface-dark-card-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-20);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|space-12"}}}} -->
  <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--space-12)">
    <div style="max-width:680px;">
      <!-- wp:paragraph {"className":"agency-eyebrow"} -->
      <p class="agency-eyebrow"><span class="agency-eyebrow__dot"></span> <?php esc_html_e( 'LATEST INSIGHTS', 'digital-agency' ); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"level":2,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}},"fontSize":"heading-2"} -->
      <h2 class="wp-block-heading has-heading-2-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( 'Market Strategies & Engineering Perspectives', 'digital-agency' ); ?></h2>
      <!-- /wp:heading -->
    </div>

    <!-- wp:buttons {"layout":{"type":"flex"}} -->
    <div class="wp-block-buttons">
      <!-- wp:button {"style":{"border":{"radius":"9999px"}},"className":"is-style-outline","fontSize":"body-small"} -->
      <div class="wp-block-button has-custom-font-size is-style-outline has-body-small-font-size">
        <a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" style="border-radius:9999px;font-weight:600;padding:0.75rem 1.5rem;"><?php esc_html_e( 'View All Articles ↗', 'digital-agency' ); ?></a>
      </div>
      <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
  </div>
  <!-- /wp:group -->

  <!-- wp:html -->
  <div class="agency-blog-grid" style="display:grid;grid-template-columns:repeat(auto-fill, minmax(340px, 1fr));gap:2rem;max-width:1400px;margin:0 auto;">
    <?php
    if ( $blog_query->have_posts() ) :
        while ( $blog_query->have_posts() ) : $blog_query->the_post();
            $cats = get_the_category();
            $cat_name = ! empty( $cats ) ? $cats[0]->name : __( 'Strategy', 'digital-agency' );
            ?>
            <article class="agency-card agency-post-card" style="background:var(--wp--preset--color--surface-dark-elevated);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;overflow:hidden;display:flex;flex-direction:column;justify-content:space-between;">
              <div>
                <?php if ( has_post_thumbnail() ) : ?>
                  <div class="agency-bw-image" style="height:200px;width:100%;">
                    <?php the_post_thumbnail( 'medium_large', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); ?>
                  </div>
                <?php endif; ?>

                <div style="padding:1.75rem 1.75rem 0 1.75rem;">
                  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.75rem;">
                    <span style="font-size:0.75rem;font-weight:700;letter-spacing:0.08em;color:var(--wp--preset--color--primary-accent);text-transform:uppercase;"><?php echo esc_html( $cat_name ); ?></span>
                    <span style="font-size:0.75rem;color:var(--wp--preset--color--text-light-muted);"><?php echo get_the_date( 'M j, Y' ); ?></span>
                  </div>

                  <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.375rem;font-weight:700;margin:0 0 1rem 0;">
                    <a href="<?php the_permalink(); ?>" style="color:#FFF;text-decoration:none;"><?php the_title(); ?></a>
                  </h3>

                  <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.6;margin-bottom:1.5rem;">
                    <?php echo esc_html( get_the_excerpt() ?: wp_trim_words( get_the_content(), 15 ) ); ?>
                  </p>
                </div>
              </div>

              <div style="padding:0 1.75rem 1.75rem 1.75rem;">
                <a href="<?php the_permalink(); ?>" style="color:var(--wp--preset--color--primary-accent);font-weight:600;font-size:0.875rem;text-decoration:none;"><?php esc_html_e( 'Read Article ↗', 'digital-agency' ); ?></a>
              </div>
            </article>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        // Fallback demo blog articles
        $demo_articles = array(
            array( 'title' => __( 'The Future of Organic Search: Navigating LLM-Driven SERP Shifts in 2026', 'digital-agency' ), 'cat' => 'SEO Strategy', 'date' => 'Aug 14, 2026', 'desc' => 'How leading enterprises are transforming keyword silos into authoritative entities and direct answer engines.' ),
            array( 'title' => __( 'Why Full-Funnel Attribution is the Only Antidote to Rising Paid CAC', 'digital-agency' ), 'cat' => 'Performance Ads', 'date' => 'Jul 29, 2026', 'desc' => 'Deconstructing first-party data capture, server-side tracking, and multi-touch pipeline attribution models.' ),
            array( 'title' => __( 'WordPress Block Themes vs Headless React: The Total Cost of Ownership Case', 'digital-agency' ), 'cat' => 'Web Engineering', 'date' => 'Jul 12, 2026', 'desc' => 'An architectural deep-dive into Core Web Vitals, editorial autonomy, and long-term maintenance overhead.' ),
        );
        foreach ( $demo_articles as $a ) :
            ?>
            <article class="agency-card agency-post-card" style="background:var(--wp--preset--color--surface-dark-elevated);border:1px solid var(--wp--preset--color--border-dark-strong);border-radius:20px;overflow:hidden;display:flex;flex-direction:column;justify-content:space-between;padding:1.75rem;">
              <div>
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.75rem;">
                  <span style="font-size:0.75rem;font-weight:700;letter-spacing:0.08em;color:var(--wp--preset--color--primary-accent);text-transform:uppercase;"><?php echo esc_html( $a['cat'] ); ?></span>
                  <span style="font-size:0.75rem;color:var(--wp--preset--color--text-light-muted);"><?php echo esc_html( $a['date'] ); ?></span>
                </div>
                <h3 style="font-family:var(--wp--preset--font-family--syne);font-size:1.375rem;font-weight:700;margin:0 0 1rem 0;color:#FFF;"><?php echo esc_html( $a['title'] ); ?></h3>
                <p style="color:var(--wp--preset--color--text-light-secondary);font-size:0.9375rem;line-height:1.6;margin-bottom:1.5rem;"><?php echo esc_html( $a['desc'] ); ?></p>
              </div>
              <div>
                <span style="color:var(--wp--preset--color--primary-accent);font-weight:600;font-size:0.875rem;">Read Article ↗</span>
              </div>
            </article>
            <?php
        endforeach;
    endif;
    ?>
  </div>
  <!-- /wp:html -->
</section>
<!-- /wp:group -->
