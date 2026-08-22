<?php
/**
 * Global Agency Settings Engine (WordPress Native Options & Settings API)
 *
 * @package DigitalAgency
 * @version 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register global agency business settings with strict sanitize callbacks
 */
function digital_agency_register_settings(): void {

    // 1. Business Information Section
    add_settings_section(
        'digital_agency_section_business',
        __( 'Business & Contact Information', 'digital-agency' ),
        function() {
            echo '<p class="description">' . esc_html__( 'Core commercial identity, headquarters address, and primary contact channels.', 'digital-agency' ) . '</p>';
        },
        'agency-settings'
    );

    $business_settings = array(
        'agency_business_name' => array(
            'label'    => __( 'Agency / Business Name', 'digital-agency' ),
            'sanitize' => 'sanitize_text_field',
            'default'  => 'Digital Agency',
            'type'     => 'text',
        ),
        'agency_phone' => array(
            'label'    => __( 'Primary Contact Phone', 'digital-agency' ),
            'sanitize' => 'sanitize_text_field',
            'default'  => '+1 (555) 019-2834',
            'type'     => 'text',
        ),
        'agency_email' => array(
            'label'    => __( 'Primary Inquiries Email', 'digital-agency' ),
            'sanitize' => function( $val ) {
                $clean = sanitize_email( $val );
                return is_email( $clean ) ? $clean : get_option( 'agency_email', 'hello@digitalagency.com' );
            },
            'default'  => 'hello@digitalagency.com',
            'type'     => 'email',
        ),
        'agency_address' => array(
            'label'    => __( 'Headquarters Address (Multiline)', 'digital-agency' ),
            'sanitize' => 'sanitize_textarea_field',
            'default'  => "350 5th Ave, 42nd Floor\nNew York, NY 10118",
            'type'     => 'textarea',
        ),
    );

    foreach ( $business_settings as $key => $config ) {
        register_setting( 'digital_agency_settings_group', $key, array(
            'type'              => 'string',
            'sanitize_callback' => $config['sanitize'],
            'show_in_rest'      => true,
            'default'           => $config['default'],
        ) );

        add_settings_field(
            $key,
            $config['label'],
            'digital_agency_render_settings_field',
            'agency-settings',
            'digital_agency_section_business',
            array(
                'key'     => $key,
                'type'    => $config['type'],
                'default' => $config['default'],
            )
        );
    }

    // 2. Global Office Locations Section
    add_settings_section(
        'digital_agency_section_locations',
        __( 'Global Office Hubs', 'digital-agency' ),
        function() {
            echo '<p class="description">' . esc_html__( 'International presence displayed in the global top bar banner.', 'digital-agency' ) . '</p>';
        },
        'agency-settings'
    );

    register_setting( 'digital_agency_settings_group', 'agency_office_locations', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'show_in_rest'      => true,
        'default'           => 'NYC • LONDON • SINGAPORE',
    ) );

    add_settings_field(
        'agency_office_locations',
        __( 'Global Office Cities (Top Bar)', 'digital-agency' ),
        'digital_agency_render_settings_field',
        'agency-settings',
        'digital_agency_section_locations',
        array(
            'key'     => 'agency_office_locations',
            'type'    => 'text',
            'default' => 'NYC • LONDON • SINGAPORE',
        )
    );

    // 3. Social & Professional Profiles Section
    add_settings_section(
        'digital_agency_section_social',
        __( 'Social & Corporate Profiles', 'digital-agency' ),
        function() {
            echo '<p class="description">' . esc_html__( 'Verified social media links rendered across the footer, navigation menus, and contact screens.', 'digital-agency' ) . '</p>';
        },
        'agency-settings'
    );

    $social_settings = array(
        'agency_social_linkedin'  => array( 'label' => __( 'LinkedIn URL', 'digital-agency' ), 'default' => 'https://linkedin.com' ),
        'agency_social_twitter'   => array( 'label' => __( 'X / Twitter URL', 'digital-agency' ), 'default' => 'https://x.com' ),
        'agency_social_instagram' => array( 'label' => __( 'Instagram URL', 'digital-agency' ), 'default' => 'https://instagram.com' ),
        'agency_social_github'    => array( 'label' => __( 'GitHub URL', 'digital-agency' ), 'default' => 'https://github.com' ),
        'agency_social_facebook'  => array( 'label' => __( 'Facebook URL', 'digital-agency' ), 'default' => 'https://facebook.com' ),
    );

    foreach ( $social_settings as $key => $config ) {
        register_setting( 'digital_agency_settings_group', $key, array(
            'type'              => 'string',
            'sanitize_callback' => 'esc_url_raw',
            'show_in_rest'      => true,
            'default'           => $config['default'],
        ) );

        add_settings_field(
            $key,
            $config['label'],
            'digital_agency_render_settings_field',
            'agency-settings',
            'digital_agency_section_social',
            array(
                'key'     => $key,
                'type'    => 'url',
                'default' => $config['default'],
            )
        );
    }

    // 4. Primary Call to Action & Global Banners Section
    add_settings_section(
        'digital_agency_section_cta',
        __( 'Primary Call to Action (CTA)', 'digital-agency' ),
        function() {
            echo '<p class="description">' . esc_html__( 'Global conversion button rendered in the persistent header navigation.', 'digital-agency' ) . '</p>';
        },
        'agency-settings'
    );

    register_setting( 'digital_agency_settings_group', 'agency_primary_cta_text', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'show_in_rest'      => true,
        'default'           => 'Get a Quote',
    ) );

    add_settings_field(
        'agency_primary_cta_text',
        __( 'Header CTA Button Text', 'digital-agency' ),
        'digital_agency_render_settings_field',
        'agency-settings',
        'digital_agency_section_cta',
        array(
            'key'     => 'agency_primary_cta_text',
            'type'    => 'text',
            'default' => 'Get a Quote',
        )
    );

    register_setting( 'digital_agency_settings_group', 'agency_primary_cta_url', array(
        'type'              => 'string',
        'sanitize_callback' => 'esc_url_raw',
        'show_in_rest'      => true,
        'default'           => '#contact',
    ) );

    add_settings_field(
        'agency_primary_cta_url',
        __( 'Header CTA Target URL', 'digital-agency' ),
        'digital_agency_render_settings_field',
        'agency-settings',
        'digital_agency_section_cta',
        array(
            'key'     => 'agency_primary_cta_url',
            'type'    => 'text',
            'default' => '#contact',
        )
    );

    // 5. Newsletter & Communication Section
    add_settings_section(
        'digital_agency_section_newsletter',
        __( 'Newsletter Subscription', 'digital-agency' ),
        function() {
            echo '<p class="description">' . esc_html__( 'Lead generation headline displayed above the subscription form input.', 'digital-agency' ) . '</p>';
        },
        'agency-settings'
    );

    register_setting( 'digital_agency_settings_group', 'agency_newsletter_label', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'show_in_rest'      => true,
        'default'           => 'Subscribe for Digital Growth Tips & Updates',
    ) );

    add_settings_field(
        'agency_newsletter_label',
        __( 'Newsletter Form Headline', 'digital-agency' ),
        'digital_agency_render_settings_field',
        'agency-settings',
        'digital_agency_section_newsletter',
        array(
            'key'     => 'agency_newsletter_label',
            'type'    => 'text',
            'default' => 'Subscribe for Digital Growth Tips & Updates',
        )
    );
}
add_action( 'admin_init', 'digital_agency_register_settings' );

/**
 * Render individual setting input field based on type
 *
 * @param array<string, mixed> $args Field configuration arguments.
 */
function digital_agency_render_settings_field( array $args ): void {
    $key     = $args['key'];
    $type    = $args['type'] ?? 'text';
    $default = $args['default'] ?? '';
    $val     = get_option( $key, $default );

    if ( 'textarea' === $type ) {
        echo '<textarea id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" rows="4" class="large-text code">' . esc_textarea( $val ) . '</textarea>';
    } else {
        echo '<input type="' . esc_attr( $type ) . '" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" class="regular-text" />';
    }
}

/**
 * Add Agency Settings Submenu Page under Appearance
 */
function digital_agency_add_settings_menu(): void {
    add_theme_page(
        __( 'Agency Business Info', 'digital-agency' ),
        __( 'Agency Info', 'digital-agency' ),
        'manage_options',
        'agency-settings',
        'digital_agency_render_settings_page'
    );
}
add_action( 'admin_menu', 'digital_agency_add_settings_menu' );

/**
 * Render Agency Settings Page UI
 */
function digital_agency_render_settings_page(): void {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'digital-agency' ) );
    }

    ?>
    <div class="wrap agency-settings-wrap">
        <h1 style="display:flex;align-items:center;gap:10px;margin-bottom:8px;">
            <span class="dashicons dashicons-admin-generic" style="font-size:28px;width:28px;height:28px;color:#0284c7;"></span>
            <?php esc_html_e( 'Global Agency Settings', 'digital-agency' ); ?>
        </h1>
        <p class="description" style="font-size:14px;margin-bottom:24px;">
            <?php esc_html_e( 'Configure commercial details, contact coordinates, international office hubs, and call-to-action destinations.', 'digital-agency' ); ?>
        </p>

        <?php settings_errors(); ?>

        <form method="post" action="options.php">
            <?php
            settings_fields( 'digital_agency_settings_group' );
            do_settings_sections( 'agency-settings' );
            submit_button( __( 'Save All Agency Settings', 'digital-agency' ) );
            ?>
        </form>
    </div>
    <?php
}

/**
 * Accessor helper to retrieve agency setting with fallback
 *
 * @param string $key Setting key.
 * @param mixed  $default Fallback default value.
 * @return mixed
 */
function digital_agency_get_setting( string $key, $default = '' ) {
    return get_option( $key, $default );
}
