<?php
/**
 * Title: Agency Starter Banner
 * Slug: digital-agency/starter-banner
 * Categories: digital-agency-hero
 * Description: Basic hero banner pattern foundation for the Digital Agency theme.
 *
 * @package DigitalAgency
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-20","bottom":"var:preset|spacing|space-20","left":"var:preset|spacing|space-5","right":"var:preset|spacing|space-5"}},"color":{"background":"var:preset|color|surface-dark-base"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-dark-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--space-20);padding-right:var(--wp--preset--spacing--space-5);padding-bottom:var(--wp--preset--spacing--space-20);padding-left:var(--wp--preset--spacing--space-5)">
  <!-- wp:group {"layout":{"type":"constrained","contentSize":"960px"},"style":{"spacing":{"blockGap":"var:preset|spacing|space-6"}},"textAlign":"center"} -->
  <div class="wp-block-group has-text-align-center">
    <!-- wp:paragraph {"className":"agency-eyebrow"} -->
    <p class="agency-eyebrow">✦ DIGITAL MARKETING &amp; STRATEGY</p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":1,"fontSize":"display-hero"} -->
    <h1 class="wp-block-heading has-text-align-center has-display-hero-font-size">Engineering High-Growth Digital Brands</h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"fontSize":"body-large","style":{"color":{"text":"var:preset|color|text-light-secondary"}}} -->
    <p class="has-text-align-center has-text-light-secondary-color has-text-color has-body-large-font-size">We build commanding digital experiences and performance marketing ecosystems that scale ambitious brands.</p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons">
      <!-- wp:button {"style":{"border":{"radius":"9999px"}}} -->
      <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact" style="border-radius:9999px">Start a Project</a></div>
      <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->
