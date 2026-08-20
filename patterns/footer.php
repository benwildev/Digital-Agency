<?php
/**
 * Title: Global 4-Column Footer
 * Slug: digital-agency/footer
 * Categories: digital-agency-footer
 * Description: Dynamic 4-column footer querying services CPT, global contact details, social links, and legal notices.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$business_name = digital_agency_get_setting( 'agency_business_name', get_bloginfo( 'name' ) );
$email         = digital_agency_get_setting( 'agency_email', 'hello@digitalagency.com' );
$phone         = digital_agency_get_setting( 'agency_phone', '+1 (555) 019-2834' );
$address       = digital_agency_get_setting( 'agency_address', "350 5th Ave, 42nd Floor\nNew York, NY 10118" );

$social_links = array(
    'linkedin'  => array( 'url' => digital_agency_get_setting( 'agency_social_linkedin', 'https://linkedin.com' ), 'label' => __( 'Follow us on LinkedIn', 'digital-agency' ), 'icon' => 'in' ),
    'twitter'   => array( 'url' => digital_agency_get_setting( 'agency_social_twitter', 'https://x.com' ), 'label' => __( 'Follow us on X', 'digital-agency' ), 'icon' => '𝕏' ),
    'instagram' => array( 'url' => digital_agency_get_setting( 'agency_social_instagram', '' ), 'label' => __( 'Follow us on Instagram', 'digital-agency' ), 'icon' => 'ig' ),
    'github'    => array( 'url' => digital_agency_get_setting( 'agency_social_github', '' ), 'label' => __( 'Follow us on GitHub', 'digital-agency' ), 'icon' => 'gh' ),
    'facebook'  => array( 'url' => digital_agency_get_setting( 'agency_social_facebook', '' ), 'label' => __( 'Follow us on Facebook', 'digital-agency' ), 'icon' => 'fb' ),
);

// Dynamic Service Query for Footer Column 2
$footer_services = digital_agency_get_services( array( 'posts_per_page' => 4 ) );

$privacy_url = get_privacy_policy_url() ?: home_url( '/privacy-policy/' );
$projects_url = get_post_type_archive_link( 'project' ) ?: home_url( '/projects/' );
$team_url     = get_post_type_archive_link( 'team_member' ) ?: home_url( '/team/' );
$career_url   = get_post_type_archive_link( 'career' ) ?: home_url( '/career/' );
$contact_url  = home_url( '/contact/' );
?>
<!-- wp:group {"tagName":"footer","className":"agency-footer","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-20","bottom":"var:preset|spacing|space-8","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-card"}},"layout":{"type":"constrained"}} -->
<footer class="wp-block-group agency-footer has-surface-dark-card-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-20);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-8);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|space-8","left":"var:preset|spacing|space-8"}}}} -->
  <div class="wp-block-columns alignwide">
    <!-- wp:column {"width":"35%"} -->
    <div class="wp-block-column" style="flex-basis:35%">
      <!-- wp:site-title {"level":3,"style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}},"fontSize":"heading-3"} /-->
      <!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|text-light-secondary"}},"fontSize":"body-regular"} -->
      <p class="has-text-light-secondary-color has-text-color has-body-regular-font-size">We engineer data-driven growth, bespoke web platforms, and commanding brand identities for market leaders globally.</p>
      <!-- /wp:paragraph -->

      <!-- wp:html -->
      <div class="agency-social-links" aria-label="<?php esc_attr_e( 'Social Media Links', 'digital-agency' ); ?>">
        <?php foreach ( $social_links as $social ) : ?>
          <?php if ( ! empty( $social['url'] ) ) : ?>
            <a href="<?php echo esc_url( $social['url'] ); ?>" class="agency-social-btn" aria-label="<?php echo esc_attr( $social['label'] ); ?>" target="_blank" rel="noopener noreferrer">
              <?php echo esc_html( $social['icon'] ); ?>
            </a>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <!-- /wp:html -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"20%"} -->
    <div class="wp-block-column" style="flex-basis:20%">
      <!-- wp:heading {"level":4,"fontSize":"heading-4","style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}}} -->
      <h4 class="wp-block-heading has-heading-4-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( 'Services', 'digital-agency' ); ?></h4>
      <!-- /wp:heading -->
      
      <!-- wp:html -->
      <p class="has-text-light-muted-color has-text-color has-body-small-font-size" style="line-height:2;">
        <?php
        if ( $footer_services->have_posts() ) :
            while ( $footer_services->have_posts() ) : $footer_services->the_post();
                ?>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            ?>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'SEO Optimization', 'digital-agency' ); ?></a><br>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Performance Marketing', 'digital-agency' ); ?></a><br>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Web Engineering', 'digital-agency' ); ?></a><br>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Brand Architecture', 'digital-agency' ); ?></a>
            <?php
        endif;
        ?>
      </p>
      <!-- /wp:html -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"20%"} -->
    <div class="wp-block-column" style="flex-basis:20%">
      <!-- wp:heading {"level":4,"fontSize":"heading-4","style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}}} -->
      <h4 class="wp-block-heading has-heading-4-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( 'Agency', 'digital-agency' ); ?></h4>
      <!-- /wp:heading -->
      
      <!-- wp:html -->
      <p class="has-text-light-muted-color has-text-color has-body-small-font-size" style="line-height:2;">
        <a href="<?php echo esc_url( $projects_url ); ?>"><?php esc_html_e( 'Case Studies', 'digital-agency' ); ?></a><br>
        <a href="<?php echo esc_url( $team_url ); ?>"><?php esc_html_e( 'About Our Team', 'digital-agency' ); ?></a><br>
        <a href="<?php echo esc_url( $career_url ); ?>"><?php esc_html_e( 'Open Careers', 'digital-agency' ); ?></a><br>
        <a href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact & Locations', 'digital-agency' ); ?></a>
      </p>
      <!-- /wp:html -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"25%"} -->
    <div class="wp-block-column" style="flex-basis:25%">
      <!-- wp:heading {"level":4,"fontSize":"heading-4","style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700"}}} -->
      <h4 class="wp-block-heading has-heading-4-font-size" style="font-family:var(--wp--preset--font-family--syne);font-weight:700"><?php esc_html_e( 'Headquarters', 'digital-agency' ); ?></h4>
      <!-- /wp:heading -->
      
      <!-- wp:html -->
      <p class="has-text-light-secondary-color has-text-color has-body-small-font-size" style="line-height:1.8;">
        <?php if ( ! empty( $address ) ) : ?>
          <?php echo nl2br( esc_html( $address ) ); ?><br><br>
        <?php endif; ?>
        <?php if ( ! empty( $email ) ) : ?>
          <strong><?php esc_html_e( 'E:', 'digital-agency' ); ?></strong> <a href="<?php echo esc_url( 'mailto:' . antispambot( $email ) ); ?>"><?php echo esc_html( antispambot( $email ) ); ?></a><br>
        <?php endif; ?>
        <?php if ( ! empty( $phone ) ) : ?>
          <strong><?php esc_html_e( 'P:', 'digital-agency' ); ?></strong> <a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
        <?php endif; ?>
      </p>
      <!-- /wp:html -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->

  <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|space-12","bottom":"var:preset|spacing|space-6"}}},"backgroundColor":"border-dark-subtle","className":"is-style-wide"} -->
  <hr class="wp-block-separator has-text-color has-border-dark-subtle-color has-alpha-channel-opacity has-border-dark-subtle-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--space-12);margin-bottom:var(--wp--preset--spacing--space-6)"/>
  <!-- /wp:separator -->

  <!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"},"style":{"color":{"text":"var:preset|color|text-light-muted"}},"fontSize":"caption-eyebrow"} -->
  <div class="wp-block-group has-text-light-muted-color has-text-color has-caption-eyebrow-font-size">
    <!-- wp:paragraph -->
    <p>© <?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( $business_name ); ?>. <?php esc_html_e( 'All rights reserved.', 'digital-agency' ); ?></p>
    <!-- /wp:paragraph -->
    <!-- wp:paragraph -->
    <p><a href="<?php echo esc_url( $privacy_url ); ?>"><?php esc_html_e( 'Privacy Policy', 'digital-agency' ); ?></a> • <a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms & Conditions', 'digital-agency' ); ?></a></p>
    <!-- /wp:paragraph -->
  </div>
  <!-- /wp:group -->
</footer>
<!-- /wp:group -->
