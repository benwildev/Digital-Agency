<?php
/**
 * Global Agency Settings Engine (WordPress Native Options API)
 *
 * @package DigitalAgency
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register global agency business settings with sanitize callbacks
 */
function digital_agency_register_settings(): void {
    $settings = array(
        'agency_business_name'    => 'sanitize_text_field',
        'agency_phone'            => 'sanitize_text_field',
        'agency_email'            => 'sanitize_email',
        'agency_address'          => 'sanitize_textarea_field',
        'agency_office_locations' => 'sanitize_text_field',
        'agency_social_linkedin'  => 'esc_url_raw',
        'agency_social_twitter'   => 'esc_url_raw',
        'agency_social_instagram' => 'esc_url_raw',
        'agency_social_github'    => 'esc_url_raw',
        'agency_social_facebook'  => 'esc_url_raw',
        'agency_primary_cta_text' => 'sanitize_text_field',
        'agency_primary_cta_url'  => 'esc_url_raw',
        'agency_newsletter_label' => 'sanitize_text_field',
    );

    foreach ( $settings as $key => $sanitizer ) {
        register_setting( 'digital_agency_settings_group', $key, array(
            'type'              => 'string',
            'sanitize_callback' => $sanitizer,
            'show_in_rest'      => true,
            'default'           => '',
        ) );
    }
}
add_action( 'admin_init', 'digital_agency_register_settings' );

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
 * Render Agency Settings Form
 */
function digital_agency_render_settings_page(): void {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Digital Agency Business Information', 'digital-agency' ); ?></h1>
        <p class="description"><?php esc_html_e( 'Configure global contact details, social profiles, and default call-to-action endpoints utilized across the theme.', 'digital-agency' ); ?></p>

        <form method="post" action="options.php">
            <?php
            settings_fields( 'digital_agency_settings_group' );
            do_settings_sections( 'digital_agency_settings_group' );
            ?>
            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><label for="agency_business_name"><?php esc_html_e( 'Agency / Business Name', 'digital-agency' ); ?></label></th>
                    <td><input type="text" id="agency_business_name" name="agency_business_name" value="<?php echo esc_attr( get_option( 'agency_business_name', 'Digital Agency' ) ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="agency_phone"><?php esc_html_e( 'Primary Phone', 'digital-agency' ); ?></label></th>
                    <td><input type="text" id="agency_phone" name="agency_phone" value="<?php echo esc_attr( get_option( 'agency_phone', '+1 (555) 019-2834' ) ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="agency_email"><?php esc_html_e( 'Primary Email', 'digital-agency' ); ?></label></th>
                    <td><input type="email" id="agency_email" name="agency_email" value="<?php echo esc_attr( get_option( 'agency_email', 'hello@digitalagency.com' ) ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="agency_office_locations"><?php esc_html_e( 'Global Office Cities (Top Bar)', 'digital-agency' ); ?></label></th>
                    <td><input type="text" id="agency_office_locations" name="agency_office_locations" value="<?php echo esc_attr( get_option( 'agency_office_locations', 'NYC • LONDON • SINGAPORE' ) ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="agency_address"><?php esc_html_e( 'Headquarters Address', 'digital-agency' ); ?></label></th>
                    <td><textarea id="agency_address" name="agency_address" rows="3" class="large-text"><?php echo esc_textarea( get_option( 'agency_address', "350 5th Ave, 42nd Floor\nNew York, NY 10118" ) ); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row"><label for="agency_social_linkedin"><?php esc_html_e( 'LinkedIn URL', 'digital-agency' ); ?></label></th>
                    <td><input type="url" id="agency_social_linkedin" name="agency_social_linkedin" value="<?php echo esc_url( get_option( 'agency_social_linkedin', 'https://linkedin.com' ) ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="agency_social_twitter"><?php esc_html_e( 'X / Twitter URL', 'digital-agency' ); ?></label></th>
                    <td><input type="url" id="agency_social_twitter" name="agency_social_twitter" value="<?php echo esc_url( get_option( 'agency_social_twitter', 'https://x.com' ) ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="agency_social_instagram"><?php esc_html_e( 'Instagram URL', 'digital-agency' ); ?></label></th>
                    <td><input type="url" id="agency_social_instagram" name="agency_social_instagram" value="<?php echo esc_url( get_option( 'agency_social_instagram', '' ) ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="agency_social_github"><?php esc_html_e( 'GitHub URL', 'digital-agency' ); ?></label></th>
                    <td><input type="url" id="agency_social_github" name="agency_social_github" value="<?php echo esc_url( get_option( 'agency_social_github', '' ) ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="agency_primary_cta_text"><?php esc_html_e( 'Primary Header CTA Button Text', 'digital-agency' ); ?></label></th>
                    <td><input type="text" id="agency_primary_cta_text" name="agency_primary_cta_text" value="<?php echo esc_attr( get_option( 'agency_primary_cta_text', 'Get a Quote' ) ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="agency_primary_cta_url"><?php esc_html_e( 'Primary Header CTA Button URL', 'digital-agency' ); ?></label></th>
                    <td><input type="text" id="agency_primary_cta_url" name="agency_primary_cta_url" value="<?php echo esc_attr( get_option( 'agency_primary_cta_url', '#contact' ) ); ?>" class="regular-text" /></td>
                </tr>
            </table>
            <?php submit_button( __( 'Save Agency Settings', 'digital-agency' ) ); ?>
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
