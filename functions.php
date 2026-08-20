<?php
/**
 * Digital Agency Theme Bootstrap & Module Loader
 *
 * @package DigitalAgency
 * @version 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Define Theme Constants
 */
define( 'DIGITAL_AGENCY_VERSION', '1.1.0' );
define( 'DIGITAL_AGENCY_DIR', get_template_directory() );
define( 'DIGITAL_AGENCY_URI', get_template_directory_uri() );

/**
 * Load Modular Architecture Subsystems
 */
require_once DIGITAL_AGENCY_DIR . '/inc/setup.php';
require_once DIGITAL_AGENCY_DIR . '/inc/assets.php';
require_once DIGITAL_AGENCY_DIR . '/inc/helpers.php';
require_once DIGITAL_AGENCY_DIR . '/inc/patterns.php';
require_once DIGITAL_AGENCY_DIR . '/inc/post-types.php';
require_once DIGITAL_AGENCY_DIR . '/inc/taxonomies.php';
require_once DIGITAL_AGENCY_DIR . '/inc/settings.php';
require_once DIGITAL_AGENCY_DIR . '/inc/custom-fields.php';
require_once DIGITAL_AGENCY_DIR . '/inc/dynamic-queries.php';
