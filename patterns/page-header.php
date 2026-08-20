<?php
/**
 * Title: Reusable Page Header Hero with Breadcrumbs
 * Slug: digital-agency/page-header
 * Categories: digital-agency-hero, digital-agency-general
 * Description: High-contrast dark header hero displaying dynamic page title and accessible breadcrumb trail.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"tagName":"section","className":"agency-page-header","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-16","bottom":"var:preset|spacing|space-12","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull agency-page-header has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-16);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-12);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
  <div class="wp-block-group">
    <!-- wp:page-title {"textAlign":"center","style":{"typography":{"fontFamily":"var:preset|font-family|syne","fontWeight":"700","letterSpacing":"-0.02em"}},"fontSize":"display-large"} /-->
    
    <!-- wp:html -->
    <?php digital_agency_breadcrumbs(); ?>
    <!-- /wp:html -->
  </div>
  <!-- /wp:group -->
</section>
<!-- /wp:group -->
