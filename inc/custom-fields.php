<?php
/**
 * Custom Fields & Post Meta Engine (WordPress 6.5+ Block Bindings & REST API Ready)
 *
 * @package DigitalAgency
 * @version 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register all Post Meta fields natively with schema validation and REST exposure
 */
function digital_agency_register_post_meta(): void {

    $auth_callback = function() {
        return current_user_can( 'edit_posts' );
    };

    // -------------------------------------------------------------------------
    // 1. Service Meta Fields
    // -------------------------------------------------------------------------
    $service_fields = array(
        '_agency_service_icon'            => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => 'arrow-up-right' ),
        '_agency_service_starting_price' => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_service_timeline'       => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_service_highlight_badge'=> array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_service_video_url'      => array( 'type' => 'string',  'sanitize' => 'esc_url_raw',             'default' => '' ),
        '_agency_service_gallery'        => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '[]' ),
        '_agency_service_included'       => array( 'type' => 'string',  'sanitize' => 'sanitize_textarea_field', 'default' => '[]' ),
        '_agency_service_expertise'      => array( 'type' => 'string',  'sanitize' => 'sanitize_textarea_field', 'default' => '[]' ),
        '_agency_service_benefits'       => array( 'type' => 'string',  'sanitize' => 'sanitize_textarea_field', 'default' => '[]' ),
        '_agency_service_featured'       => array( 'type' => 'integer', 'sanitize' => 'absint',                  'default' => 0 ),
    );

    foreach ( $service_fields as $meta_key => $args ) {
        register_post_meta( 'service', $meta_key, array(
            'show_in_rest'      => true,
            'single'            => true,
            'type'              => $args['type'],
            'default'           => $args['default'],
            'sanitize_callback' => $args['sanitize'],
            'auth_callback'     => $auth_callback,
        ) );
    }

    // -------------------------------------------------------------------------
    // 2. Project / Case Study Meta Fields
    // -------------------------------------------------------------------------
    $project_fields = array(
        '_agency_project_client'             => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_project_year'               => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_project_country'            => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_project_url'                => array( 'type' => 'string',  'sanitize' => 'esc_url_raw',             'default' => '' ),
        '_agency_project_video_url'          => array( 'type' => 'string',  'sanitize' => 'esc_url_raw',             'default' => '' ),
        '_agency_project_impact_metric'      => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_project_metric_label'       => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_project_challenge'          => array( 'type' => 'string',  'sanitize' => 'wp_kses_post',            'default' => '' ),
        '_agency_project_solution'           => array( 'type' => 'string',  'sanitize' => 'wp_kses_post',            'default' => '' ),
        '_agency_project_gallery'            => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '[]' ),
        '_agency_project_testimonial_id'     => array( 'type' => 'integer', 'sanitize' => 'absint',                  'default' => 0 ),
        '_agency_project_testimonial_quote'  => array( 'type' => 'string',  'sanitize' => 'sanitize_textarea_field', 'default' => '' ),
        '_agency_project_testimonial_author' => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_project_featured'           => array( 'type' => 'integer', 'sanitize' => 'absint',                  'default' => 0 ),
    );

    foreach ( $project_fields as $meta_key => $args ) {
        register_post_meta( 'project', $meta_key, array(
            'show_in_rest'      => true,
            'single'            => true,
            'type'              => $args['type'],
            'default'           => $args['default'],
            'sanitize_callback' => $args['sanitize'],
            'auth_callback'     => $auth_callback,
        ) );
    }

    // -------------------------------------------------------------------------
    // 3. Team Member Meta Fields
    // -------------------------------------------------------------------------
    $team_fields = array(
        '_agency_team_position' => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_team_email'    => array( 'type' => 'string',  'sanitize' => 'sanitize_email',          'default' => '' ),
        '_agency_team_phone'    => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_team_linkedin' => array( 'type' => 'string',  'sanitize' => 'esc_url_raw',             'default' => '' ),
        '_agency_team_twitter'  => array( 'type' => 'string',  'sanitize' => 'esc_url_raw',             'default' => '' ),
        '_agency_team_github'   => array( 'type' => 'string',  'sanitize' => 'esc_url_raw',             'default' => '' ),
        '_agency_team_skills'   => array( 'type' => 'string',  'sanitize' => 'sanitize_textarea_field', 'default' => '[]' ),
        '_agency_team_featured' => array( 'type' => 'integer', 'sanitize' => 'absint',                  'default' => 0 ),
    );

    foreach ( $team_fields as $meta_key => $args ) {
        register_post_meta( 'team_member', $meta_key, array(
            'show_in_rest'      => true,
            'single'            => true,
            'type'              => $args['type'],
            'default'           => $args['default'],
            'sanitize_callback' => $args['sanitize'],
            'auth_callback'     => $auth_callback,
        ) );
    }

    // -------------------------------------------------------------------------
    // 4. Career Meta Fields
    // -------------------------------------------------------------------------
    $career_fields = array(
        '_agency_career_job_type'         => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => 'Full-Time' ),
        '_agency_career_location'         => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => 'Remote' ),
        '_agency_career_salary_range'     => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_career_experience'       => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_career_apply_email'      => array( 'type' => 'string',  'sanitize' => 'sanitize_email',          'default' => '' ),
        '_agency_career_status'           => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => 'Open' ),
        '_agency_career_responsibilities' => array( 'type' => 'string',  'sanitize' => 'sanitize_textarea_field', 'default' => '[]' ),
        '_agency_career_requirements'     => array( 'type' => 'string',  'sanitize' => 'sanitize_textarea_field', 'default' => '[]' ),
        '_agency_career_skills'           => array( 'type' => 'string',  'sanitize' => 'sanitize_textarea_field', 'default' => '[]' ),
        '_agency_career_featured'         => array( 'type' => 'integer', 'sanitize' => 'absint',                  'default' => 0 ),
    );

    foreach ( $career_fields as $meta_key => $args ) {
        register_post_meta( 'career', $meta_key, array(
            'show_in_rest'      => true,
            'single'            => true,
            'type'              => $args['type'],
            'default'           => $args['default'],
            'sanitize_callback' => $args['sanitize'],
            'auth_callback'     => $auth_callback,
        ) );
    }

    // -------------------------------------------------------------------------
    // 5. Testimonial Meta Fields
    // -------------------------------------------------------------------------
    $testimonial_fields = array(
        '_agency_testimonial_author'   => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field', 'default' => '' ),
        '_agency_testimonial_company'  => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field', 'default' => '' ),
        '_agency_testimonial_role'     => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field', 'default' => '' ),
        '_agency_testimonial_rating'   => array( 'type' => 'integer', 'sanitize' => 'absint',              'default' => 5 ),
        '_agency_testimonial_featured' => array( 'type' => 'integer', 'sanitize' => 'absint',              'default' => 0 ),
    );

    foreach ( $testimonial_fields as $meta_key => $args ) {
        register_post_meta( 'testimonial', $meta_key, array(
            'show_in_rest'      => true,
            'single'            => true,
            'type'              => $args['type'],
            'default'           => $args['default'],
            'sanitize_callback' => $args['sanitize'],
            'auth_callback'     => $auth_callback,
        ) );
    }

    // -------------------------------------------------------------------------
    // 6. Pricing Plan Meta Fields
    // -------------------------------------------------------------------------
    $pricing_fields = array(
        '_agency_plan_price'          => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '$2,999' ),
        '_agency_plan_billing_period' => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '/month' ),
        '_agency_plan_badge'          => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_plan_button_text'    => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => 'Choose Plan' ),
        '_agency_plan_button_url'     => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '#contact' ),
        '_agency_plan_features'       => array( 'type' => 'string',  'sanitize' => 'sanitize_textarea_field', 'default' => '[]' ),
        '_agency_plan_featured'       => array( 'type' => 'integer', 'sanitize' => 'absint',                  'default' => 0 ),
    );

    foreach ( $pricing_fields as $meta_key => $args ) {
        register_post_meta( 'pricing_plan', $meta_key, array(
            'show_in_rest'      => true,
            'single'            => true,
            'type'              => $args['type'],
            'default'           => $args['default'],
            'sanitize_callback' => $args['sanitize'],
            'auth_callback'     => $auth_callback,
        ) );
    }
}
add_action( 'init', 'digital_agency_register_post_meta' );

// =============================================================================
// ADMIN META BOXES & EDITORIAL INTERFACES
// =============================================================================

function digital_agency_add_meta_boxes(): void {
    add_meta_box(
        'agency_service_details',
        __( 'Service Scope, Deliverables & Media', 'digital-agency' ),
        'digital_agency_render_service_meta_box',
        'service',
        'normal',
        'high'
    );

    add_meta_box(
        'agency_project_details',
        __( 'Case Study Metadata, Impact Metrics & Gallery', 'digital-agency' ),
        'digital_agency_render_project_meta_box',
        'project',
        'normal',
        'high'
    );

    add_meta_box(
        'agency_team_details',
        __( 'Team Member Information & Skill Competencies', 'digital-agency' ),
        'digital_agency_render_team_meta_box',
        'team_member',
        'normal',
        'high'
    );

    add_meta_box(
        'agency_career_details',
        __( 'Job Opening Parameters, Responsibilities & Skills', 'digital-agency' ),
        'digital_agency_render_career_meta_box',
        'career',
        'normal',
        'high'
    );

    add_meta_box(
        'agency_testimonial_details',
        __( 'Client Endorsement & Rating Details', 'digital-agency' ),
        'digital_agency_render_testimonial_meta_box',
        'testimonial',
        'normal',
        'high'
    );

    add_meta_box(
        'agency_pricing_details',
        __( 'Pricing Plan Parameters & Features', 'digital-agency' ),
        'digital_agency_render_pricing_meta_box',
        'pricing_plan',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'digital_agency_add_meta_boxes' );

/**
 * Render Service Meta Box
 */
function digital_agency_render_service_meta_box( WP_Post $post ): void {
    wp_nonce_field( 'digital_agency_save_meta', 'digital_agency_meta_nonce' );

    $price        = get_post_meta( $post->ID, '_agency_service_starting_price', true );
    $timeline     = get_post_meta( $post->ID, '_agency_service_timeline', true );
    $badge        = get_post_meta( $post->ID, '_agency_service_highlight_badge', true );
    $video_url    = get_post_meta( $post->ID, '_agency_service_video_url', true );
    $gallery_raw  = get_post_meta( $post->ID, '_agency_service_gallery', true );
    $gallery_ids  = implode( ', ', array_map( 'absint', (array) json_decode( (string) $gallery_raw, true ) ?: array() ) );
    $featured     = (int) get_post_meta( $post->ID, '_agency_service_featured', true );

    $included_raw = (string) get_post_meta( $post->ID, '_agency_service_included', true );
    $included_txt = implode( "\n", array_map( function( $item ) {
        return is_array( $item ) ? ( $item['title'] ?? '' ) : (string) $item;
    }, (array) json_decode( $included_raw, true ) ?: array() ) );

    $expertise_raw = (string) get_post_meta( $post->ID, '_agency_service_expertise', true );
    $expertise_txt = implode( "\n", array_map( function( $item ) {
        return is_array( $item ) ? ( $item['title'] ?? '' ) : (string) $item;
    }, (array) json_decode( $expertise_raw, true ) ?: array() ) );

    $benefits_raw = (string) get_post_meta( $post->ID, '_agency_service_benefits', true );
    $benefits_txt = implode( "\n", array_map( function( $item ) {
        return is_array( $item ) ? ( $item['title'] ?? '' ) : (string) $item;
    }, (array) json_decode( $benefits_raw, true ) ?: array() ) );

    ?>
    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="_agency_service_starting_price"><?php esc_html_e( 'Starting Price / Retainer', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_service_starting_price" name="_agency_service_starting_price" value="<?php echo esc_attr( $price ); ?>" class="regular-text" placeholder="e.g. $2,500/mo" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_service_timeline"><?php esc_html_e( 'Estimated Timeline', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_service_timeline" name="_agency_service_timeline" value="<?php echo esc_attr( $timeline ); ?>" class="regular-text" placeholder="e.g. 2-4 Weeks" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_service_highlight_badge"><?php esc_html_e( 'Card Highlight Badge', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_service_highlight_badge" name="_agency_service_highlight_badge" value="<?php echo esc_attr( $badge ); ?>" class="regular-text" placeholder="e.g. MOST POPULAR" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_service_video_url"><?php esc_html_e( 'Service Video URL (YouTube / Vimeo / MP4)', 'digital-agency' ); ?></label></th>
            <td><input type="url" id="_agency_service_video_url" name="_agency_service_video_url" value="<?php echo esc_url( $video_url ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_service_gallery_ids"><?php esc_html_e( 'Gallery Image Attachment IDs', 'digital-agency' ); ?></label></th>
            <td>
                <input type="text" id="_agency_service_gallery_ids" name="_agency_service_gallery_ids" value="<?php echo esc_attr( $gallery_ids ); ?>" class="regular-text" placeholder="e.g. 102, 105, 108" />
                <p class="description"><?php esc_html_e( 'Comma-separated WordPress Media Library attachment IDs', 'digital-agency' ); ?></p>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_service_included_text"><?php esc_html_e( 'Services Included (One per line)', 'digital-agency' ); ?></label></th>
            <td><textarea id="_agency_service_included_text" name="_agency_service_included_text" rows="4" class="large-text"><?php echo esc_textarea( $included_txt ); ?></textarea></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_service_expertise_text"><?php esc_html_e( 'Key Expertise Points (One per line)', 'digital-agency' ); ?></label></th>
            <td><textarea id="_agency_service_expertise_text" name="_agency_service_expertise_text" rows="4" class="large-text"><?php echo esc_textarea( $expertise_txt ); ?></textarea></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_service_benefits_text"><?php esc_html_e( 'Client Benefits (One per line)', 'digital-agency' ); ?></label></th>
            <td><textarea id="_agency_service_benefits_text" name="_agency_service_benefits_text" rows="4" class="large-text"><?php echo esc_textarea( $benefits_txt ); ?></textarea></td>
        </tr>
        <tr>
            <th scope="row"><?php esc_html_e( 'Featured Service', 'digital-agency' ); ?></th>
            <td>
                <label for="_agency_service_featured">
                    <input type="checkbox" id="_agency_service_featured" name="_agency_service_featured" value="1" <?php checked( $featured, 1 ); ?> />
                    <?php esc_html_e( 'Feature on homepage and highlighted service grids', 'digital-agency' ); ?>
                </label>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Render Project Meta Box
 */
function digital_agency_render_project_meta_box( WP_Post $post ): void {
    wp_nonce_field( 'digital_agency_save_meta', 'digital_agency_meta_nonce' );

    $client       = get_post_meta( $post->ID, '_agency_project_client', true );
    $year         = get_post_meta( $post->ID, '_agency_project_year', true );
    $country      = get_post_meta( $post->ID, '_agency_project_country', true );
    $url          = get_post_meta( $post->ID, '_agency_project_url', true );
    $video_url    = get_post_meta( $post->ID, '_agency_project_video_url', true );
    $impact       = get_post_meta( $post->ID, '_agency_project_impact_metric', true );
    $metric_label = get_post_meta( $post->ID, '_agency_project_metric_label', true );
    $challenge    = get_post_meta( $post->ID, '_agency_project_challenge', true );
    $solution     = get_post_meta( $post->ID, '_agency_project_solution', true );
    $testi_id     = (int) get_post_meta( $post->ID, '_agency_project_testimonial_id', true );
    $featured     = (int) get_post_meta( $post->ID, '_agency_project_featured', true );

    $gallery_raw  = get_post_meta( $post->ID, '_agency_project_gallery', true );
    $gallery_ids  = implode( ', ', array_map( 'absint', (array) json_decode( (string) $gallery_raw, true ) ?: array() ) );

    // Query available testimonials for dropdown
    $testimonials = get_posts( array( 'post_type' => 'testimonial', 'numberposts' => -1, 'post_status' => 'publish' ) );

    ?>
    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="_agency_project_client"><?php esc_html_e( 'Client / Brand Name', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_project_client" name="_agency_project_client" value="<?php echo esc_attr( $client ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_project_impact_metric"><?php esc_html_e( 'Key Impact Metric Badge', 'digital-agency' ); ?></label></th>
            <td>
                <input type="text" id="_agency_project_impact_metric" name="_agency_project_impact_metric" value="<?php echo esc_attr( $impact ); ?>" class="regular-text" placeholder="e.g. +320% ROI or 4.8x ROAS" />
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_project_metric_label"><?php esc_html_e( 'Impact Metric Label', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_project_metric_label" name="_agency_project_metric_label" value="<?php echo esc_attr( $metric_label ); ?>" class="regular-text" placeholder="e.g. Organic Traffic Growth" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_project_year"><?php esc_html_e( 'Project Year', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_project_year" name="_agency_project_year" value="<?php echo esc_attr( $year ); ?>" class="small-text" placeholder="2026" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_project_country"><?php esc_html_e( 'Client Location / Country', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_project_country" name="_agency_project_country" value="<?php echo esc_attr( $country ); ?>" class="regular-text" placeholder="e.g. New York, USA" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_project_url"><?php esc_html_e( 'Live Project URL', 'digital-agency' ); ?></label></th>
            <td><input type="url" id="_agency_project_url" name="_agency_project_url" value="<?php echo esc_url( $url ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_project_video_url"><?php esc_html_e( 'Case Study Video URL', 'digital-agency' ); ?></label></th>
            <td><input type="url" id="_agency_project_video_url" name="_agency_project_video_url" value="<?php echo esc_url( $video_url ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_project_gallery_ids"><?php esc_html_e( 'Project Gallery Attachment IDs', 'digital-agency' ); ?></label></th>
            <td>
                <input type="text" id="_agency_project_gallery_ids" name="_agency_project_gallery_ids" value="<?php echo esc_attr( $gallery_ids ); ?>" class="regular-text" placeholder="e.g. 201, 204, 209" />
                <p class="description"><?php esc_html_e( 'Comma-separated media attachment IDs', 'digital-agency' ); ?></p>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_project_testimonial_id"><?php esc_html_e( 'Linked Client Testimonial', 'digital-agency' ); ?></label></th>
            <td>
                <select id="_agency_project_testimonial_id" name="_agency_project_testimonial_id">
                    <option value="0"><?php esc_html_e( '— None / No linked testimonial —', 'digital-agency' ); ?></option>
                    <?php foreach ( $testimonials as $testi ) : ?>
                        <option value="<?php echo esc_attr( $testi->ID ); ?>" <?php selected( $testi_id, $testi->ID ); ?>><?php echo esc_html( $testi->post_title ); ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_project_challenge"><?php esc_html_e( 'The Challenge Narrative', 'digital-agency' ); ?></label></th>
            <td><textarea id="_agency_project_challenge" name="_agency_project_challenge" rows="4" class="large-text"><?php echo esc_textarea( $challenge ); ?></textarea></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_project_solution"><?php esc_html_e( 'The Solution & Strategy', 'digital-agency' ); ?></label></th>
            <td><textarea id="_agency_project_solution" name="_agency_project_solution" rows="4" class="large-text"><?php echo esc_textarea( $solution ); ?></textarea></td>
        </tr>
        <tr>
            <th scope="row"><?php esc_html_e( 'Featured Case Study', 'digital-agency' ); ?></th>
            <td>
                <label for="_agency_project_featured">
                    <input type="checkbox" id="_agency_project_featured" name="_agency_project_featured" value="1" <?php checked( $featured, 1 ); ?> />
                    <?php esc_html_e( 'Highlight on homepage case study showcase', 'digital-agency' ); ?>
                </label>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Render Team Member Meta Box with Structured Skill Meters
 */
function digital_agency_render_team_meta_box( WP_Post $post ): void {
    wp_nonce_field( 'digital_agency_save_meta', 'digital_agency_meta_nonce' );

    $position = get_post_meta( $post->ID, '_agency_team_position', true );
    $email    = get_post_meta( $post->ID, '_agency_team_email', true );
    $phone    = get_post_meta( $post->ID, '_agency_team_phone', true );
    $linkedin = get_post_meta( $post->ID, '_agency_team_linkedin', true );
    $twitter  = get_post_meta( $post->ID, '_agency_team_twitter', true );
    $github   = get_post_meta( $post->ID, '_agency_team_github', true );
    $featured = (int) get_post_meta( $post->ID, '_agency_team_featured', true );

    $skills_raw = (string) get_post_meta( $post->ID, '_agency_team_skills', true );
    $skills     = (array) json_decode( $skills_raw, true ) ?: array();
    $skills_txt = '';
    foreach ( $skills as $s ) {
        if ( ! empty( $s['name'] ) ) {
            $skills_txt .= $s['name'] . ' : ' . (int) ( $s['percentage'] ?? 90 ) . "\n";
        }
    }

    ?>
    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="_agency_team_position"><?php esc_html_e( 'Designation / Job Title', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_team_position" name="_agency_team_position" value="<?php echo esc_attr( $position ); ?>" class="regular-text" placeholder="e.g. Principal Brand Strategist" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_team_skills_text"><?php esc_html_e( 'Skill Competencies & Percentages (One per line: "Skill Name : 90")', 'digital-agency' ); ?></label></th>
            <td>
                <textarea id="_agency_team_skills_text" name="_agency_team_skills_text" rows="5" class="large-text" placeholder="Communication : 95&#10;Networking : 85&#10;Brand Architecture : 90"><?php echo esc_textarea( trim( $skills_txt ) ); ?></textarea>
                <p class="description"><?php esc_html_e( 'Format: Skill Name : Percentage (0 to 100). Used to render visual skill progress bars.', 'digital-agency' ); ?></p>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_team_email"><?php esc_html_e( 'Direct Email', 'digital-agency' ); ?></label></th>
            <td><input type="email" id="_agency_team_email" name="_agency_team_email" value="<?php echo esc_attr( $email ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_team_phone"><?php esc_html_e( 'Direct Phone', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_team_phone" name="_agency_team_phone" value="<?php echo esc_attr( $phone ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_team_linkedin"><?php esc_html_e( 'LinkedIn Profile URL', 'digital-agency' ); ?></label></th>
            <td><input type="url" id="_agency_team_linkedin" name="_agency_team_linkedin" value="<?php echo esc_url( $linkedin ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_team_twitter"><?php esc_html_e( 'X / Twitter Profile URL', 'digital-agency' ); ?></label></th>
            <td><input type="url" id="_agency_team_twitter" name="_agency_team_twitter" value="<?php echo esc_url( $twitter ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_team_github"><?php esc_html_e( 'GitHub Profile URL', 'digital-agency' ); ?></label></th>
            <td><input type="url" id="_agency_team_github" name="_agency_team_github" value="<?php echo esc_url( $github ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><?php esc_html_e( 'Leadership / Featured Member', 'digital-agency' ); ?></th>
            <td>
                <label for="_agency_team_featured">
                    <input type="checkbox" id="_agency_team_featured" name="_agency_team_featured" value="1" <?php checked( $featured, 1 ); ?> />
                    <?php esc_html_e( 'Display in homepage leadership preview', 'digital-agency' ); ?>
                </label>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Render Career Meta Box with Repeatable Responsibilities & Requirements
 */
function digital_agency_render_career_meta_box( WP_Post $post ): void {
    wp_nonce_field( 'digital_agency_save_meta', 'digital_agency_meta_nonce' );

    $job_type     = get_post_meta( $post->ID, '_agency_career_job_type', true ) ?: 'Full-Time';
    $location     = get_post_meta( $post->ID, '_agency_career_location', true ) ?: 'Remote';
    $salary       = get_post_meta( $post->ID, '_agency_career_salary_range', true );
    $experience   = get_post_meta( $post->ID, '_agency_career_experience', true );
    $apply_email  = get_post_meta( $post->ID, '_agency_career_apply_email', true );
    $status       = get_post_meta( $post->ID, '_agency_career_status', true ) ?: 'Open';
    $featured     = (int) get_post_meta( $post->ID, '_agency_career_featured', true );

    $resp_raw     = (string) get_post_meta( $post->ID, '_agency_career_responsibilities', true );
    $resp_txt     = implode( "\n", (array) json_decode( $resp_raw, true ) ?: array() );

    $req_raw      = (string) get_post_meta( $post->ID, '_agency_career_requirements', true );
    $req_txt      = implode( "\n", (array) json_decode( $req_raw, true ) ?: array() );

    $skills_raw   = (string) get_post_meta( $post->ID, '_agency_career_skills', true );
    $skills_txt   = implode( "\n", (array) json_decode( $skills_raw, true ) ?: array() );

    ?>
    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="_agency_career_job_type"><?php esc_html_e( 'Employment Type', 'digital-agency' ); ?></label></th>
            <td>
                <select id="_agency_career_job_type" name="_agency_career_job_type">
                    <option value="Full-Time" <?php selected( $job_type, 'Full-Time' ); ?>><?php esc_html_e( 'Full-Time', 'digital-agency' ); ?></option>
                    <option value="Part-Time" <?php selected( $job_type, 'Part-Time' ); ?>><?php esc_html_e( 'Part-Time', 'digital-agency' ); ?></option>
                    <option value="Contract" <?php selected( $job_type, 'Contract' ); ?>><?php esc_html_e( 'Contract', 'digital-agency' ); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_career_location"><?php esc_html_e( 'Location', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_career_location" name="_agency_career_location" value="<?php echo esc_attr( $location ); ?>" class="regular-text" placeholder="e.g. Remote / NYC" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_career_salary_range"><?php esc_html_e( 'Salary / Compensation', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_career_salary_range" name="_agency_career_salary_range" value="<?php echo esc_attr( $salary ); ?>" class="regular-text" placeholder="e.g. $110,000 - $140,000" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_career_experience"><?php esc_html_e( 'Experience Required', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_career_experience" name="_agency_career_experience" value="<?php echo esc_attr( $experience ); ?>" class="regular-text" placeholder="e.g. 4+ Years" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_career_apply_email"><?php esc_html_e( 'Application Recipient Email', 'digital-agency' ); ?></label></th>
            <td><input type="email" id="_agency_career_apply_email" name="_agency_career_apply_email" value="<?php echo esc_attr( $apply_email ); ?>" class="regular-text" placeholder="careers@agency.com" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_career_status"><?php esc_html_e( 'Listing Status', 'digital-agency' ); ?></label></th>
            <td>
                <select id="_agency_career_status" name="_agency_career_status">
                    <option value="Open" <?php selected( $status, 'Open' ); ?>><?php esc_html_e( 'Open', 'digital-agency' ); ?></option>
                    <option value="Urgent" <?php selected( $status, 'Urgent' ); ?>><?php esc_html_e( 'Urgent Hiring', 'digital-agency' ); ?></option>
                    <option value="Closed" <?php selected( $status, 'Closed' ); ?>><?php esc_html_e( 'Closed / Filled', 'digital-agency' ); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_career_responsibilities_text"><?php esc_html_e( 'Key Responsibilities (One per line)', 'digital-agency' ); ?></label></th>
            <td><textarea id="_agency_career_responsibilities_text" name="_agency_career_responsibilities_text" rows="4" class="large-text"><?php echo esc_textarea( $resp_txt ); ?></textarea></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_career_requirements_text"><?php esc_html_e( 'Role Requirements (One per line)', 'digital-agency' ); ?></label></th>
            <td><textarea id="_agency_career_requirements_text" name="_agency_career_requirements_text" rows="4" class="large-text"><?php echo esc_textarea( $req_txt ); ?></textarea></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_career_skills_text"><?php esc_html_e( 'Desired Skills & Tech Stack (One per line)', 'digital-agency' ); ?></label></th>
            <td><textarea id="_agency_career_skills_text" name="_agency_career_skills_text" rows="4" class="large-text"><?php echo esc_textarea( $skills_txt ); ?></textarea></td>
        </tr>
        <tr>
            <th scope="row"><?php esc_html_e( 'Featured Role', 'digital-agency' ); ?></th>
            <td>
                <label for="_agency_career_featured">
                    <input type="checkbox" id="_agency_career_featured" name="_agency_career_featured" value="1" <?php checked( $featured, 1 ); ?> />
                    <?php esc_html_e( 'Highlight on homepage or careers header banner', 'digital-agency' ); ?>
                </label>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Render Testimonial Meta Box
 */
function digital_agency_render_testimonial_meta_box( WP_Post $post ): void {
    wp_nonce_field( 'digital_agency_save_meta', 'digital_agency_meta_nonce' );

    $author   = get_post_meta( $post->ID, '_agency_testimonial_author', true );
    $company  = get_post_meta( $post->ID, '_agency_testimonial_company', true );
    $role     = get_post_meta( $post->ID, '_agency_testimonial_role', true );
    $rating   = (int) get_post_meta( $post->ID, '_agency_testimonial_rating', true ) ?: 5;
    $featured = (int) get_post_meta( $post->ID, '_agency_testimonial_featured', true );

    ?>
    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="_agency_testimonial_author"><?php esc_html_e( 'Client / Author Name', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_testimonial_author" name="_agency_testimonial_author" value="<?php echo esc_attr( $author ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_testimonial_company"><?php esc_html_e( 'Client Company / Brand', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_testimonial_company" name="_agency_testimonial_company" value="<?php echo esc_attr( $company ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_testimonial_role"><?php esc_html_e( 'Client Role / Title', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_testimonial_role" name="_agency_testimonial_role" value="<?php echo esc_attr( $role ); ?>" class="regular-text" placeholder="e.g. Chief Marketing Officer" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_testimonial_rating"><?php esc_html_e( 'Rating Score (1 to 5 Stars)', 'digital-agency' ); ?></label></th>
            <td>
                <select id="_agency_testimonial_rating" name="_agency_testimonial_rating">
                    <option value="5" <?php selected( $rating, 5 ); ?>>5 Stars (★★★★★)</option>
                    <option value="4" <?php selected( $rating, 4 ); ?>>4 Stars (★★★★☆)</option>
                    <option value="3" <?php selected( $rating, 3 ); ?>>3 Stars (★★★☆☆)</option>
                </select>
            </td>
        </tr>
        <tr>
            <th scope="row"><?php esc_html_e( 'Featured Testimonial', 'digital-agency' ); ?></th>
            <td>
                <label for="_agency_testimonial_featured">
                    <input type="checkbox" id="_agency_testimonial_featured" name="_agency_testimonial_featured" value="1" <?php checked( $featured, 1 ); ?> />
                    <?php esc_html_e( 'Feature on homepage client review slider', 'digital-agency' ); ?>
                </label>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Render Pricing Plan Meta Box
 */
function digital_agency_render_pricing_meta_box( WP_Post $post ): void {
    wp_nonce_field( 'digital_agency_save_meta', 'digital_agency_meta_nonce' );

    $price       = get_post_meta( $post->ID, '_agency_plan_price', true ) ?: '$2,999';
    $period      = get_post_meta( $post->ID, '_agency_plan_billing_period', true ) ?: '/month';
    $badge       = get_post_meta( $post->ID, '_agency_plan_badge', true );
    $btn_text    = get_post_meta( $post->ID, '_agency_plan_button_text', true ) ?: 'Choose Plan';
    $btn_url     = get_post_meta( $post->ID, '_agency_plan_button_url', true ) ?: '#contact';
    $featured    = (int) get_post_meta( $post->ID, '_agency_plan_featured', true );

    $feat_raw    = (string) get_post_meta( $post->ID, '_agency_plan_features', true );
    $feat_txt    = implode( "\n", (array) json_decode( $feat_raw, true ) ?: array() );

    ?>
    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="_agency_plan_price"><?php esc_html_e( 'Price Figure', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_plan_price" name="_agency_plan_price" value="<?php echo esc_attr( $price ); ?>" class="regular-text" placeholder="$2,999" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_plan_billing_period"><?php esc_html_e( 'Billing Period', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_plan_billing_period" name="_agency_plan_billing_period" value="<?php echo esc_attr( $period ); ?>" class="regular-text" placeholder="/month or /quarter" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_plan_badge"><?php esc_html_e( 'Plan Ribbon / Badge', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_plan_badge" name="_agency_plan_badge" value="<?php echo esc_attr( $badge ); ?>" class="regular-text" placeholder="e.g. MOST POPULAR" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_plan_features_text"><?php esc_html_e( 'Included Features (One per line)', 'digital-agency' ); ?></label></th>
            <td><textarea id="_agency_plan_features_text" name="_agency_plan_features_text" rows="6" class="large-text"><?php echo esc_textarea( $feat_txt ); ?></textarea></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_plan_button_text"><?php esc_html_e( 'Action Button Text', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_plan_button_text" name="_agency_plan_button_text" value="<?php echo esc_attr( $btn_text ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="_agency_plan_button_url"><?php esc_html_e( 'Action Button URL', 'digital-agency' ); ?></label></th>
            <td><input type="text" id="_agency_plan_button_url" name="_agency_plan_button_url" value="<?php echo esc_attr( $btn_url ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><?php esc_html_e( 'Featured / Highlighted Plan', 'digital-agency' ); ?></th>
            <td>
                <label for="_agency_plan_featured">
                    <input type="checkbox" id="_agency_plan_featured" name="_agency_plan_featured" value="1" <?php checked( $featured, 1 ); ?> />
                    <?php esc_html_e( 'Highlight with Lime Glow Border on pricing tables', 'digital-agency' ); ?>
                </label>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save Post Meta securely with nonces and permissions verification
 *
 * @param int $post_id Current post ID being saved.
 */
function digital_agency_save_post_meta( int $post_id ): void {
    if ( ! isset( $_POST['digital_agency_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['digital_agency_meta_nonce'] ) ), 'digital_agency_save_meta' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $post_type = get_post_type( $post_id );

    // Service Save
    if ( 'service' === $post_type ) {
        $fields = array(
            '_agency_service_starting_price' => 'sanitize_text_field',
            '_agency_service_timeline'       => 'sanitize_text_field',
            '_agency_service_highlight_badge'=> 'sanitize_text_field',
            '_agency_service_video_url'      => 'esc_url_raw',
        );
        foreach ( $fields as $key => $sanitizer ) {
            if ( isset( $_POST[ $key ] ) ) {
                update_post_meta( $post_id, $key, call_user_func( $sanitizer, wp_unslash( $_POST[ $key ] ) ) );
            }
        }
        update_post_meta( $post_id, '_agency_service_featured', isset( $_POST['_agency_service_featured'] ) ? 1 : 0 );

        // Parse Gallery IDs
        if ( isset( $_POST['_agency_service_gallery_ids'] ) ) {
            $ids = array_filter( array_map( 'absint', explode( ',', sanitize_text_field( wp_unslash( $_POST['_agency_service_gallery_ids'] ) ) ) ) );
            update_post_meta( $post_id, '_agency_service_gallery', wp_json_encode( array_values( $ids ) ) );
        }

        // Parse Line-by-Line Arrays
        if ( isset( $_POST['_agency_service_included_text'] ) ) {
            $lines = array_filter( array_map( 'sanitize_text_field', explode( "\n", wp_unslash( $_POST['_agency_service_included_text'] ) ) ) );
            $included = array_map( function( $l ) { return array( 'title' => trim( $l ) ); }, $lines );
            update_post_meta( $post_id, '_agency_service_included', wp_json_encode( array_values( $included ) ) );
        }

        if ( isset( $_POST['_agency_service_expertise_text'] ) ) {
            $lines = array_filter( array_map( 'sanitize_text_field', explode( "\n", wp_unslash( $_POST['_agency_service_expertise_text'] ) ) ) );
            $expertise = array_map( function( $l ) { return array( 'title' => trim( $l ) ); }, $lines );
            update_post_meta( $post_id, '_agency_service_expertise', wp_json_encode( array_values( $expertise ) ) );
        }

        if ( isset( $_POST['_agency_service_benefits_text'] ) ) {
            $lines = array_filter( array_map( 'sanitize_text_field', explode( "\n", wp_unslash( $_POST['_agency_service_benefits_text'] ) ) ) );
            $benefits = array_map( function( $l ) { return array( 'title' => trim( $l ) ); }, $lines );
            update_post_meta( $post_id, '_agency_service_benefits', wp_json_encode( array_values( $benefits ) ) );
        }
    }

    // Project Save
    if ( 'project' === $post_type ) {
        $fields = array(
            '_agency_project_client'        => 'sanitize_text_field',
            '_agency_project_year'          => 'sanitize_text_field',
            '_agency_project_country'       => 'sanitize_text_field',
            '_agency_project_url'           => 'esc_url_raw',
            '_agency_project_video_url'     => 'esc_url_raw',
            '_agency_project_impact_metric' => 'sanitize_text_field',
            '_agency_project_metric_label'  => 'sanitize_text_field',
            '_agency_project_challenge'     => 'wp_kses_post',
            '_agency_project_solution'      => 'wp_kses_post',
            '_agency_project_testimonial_id'=> 'absint',
        );
        foreach ( $fields as $key => $sanitizer ) {
            if ( isset( $_POST[ $key ] ) ) {
                update_post_meta( $post_id, $key, call_user_func( $sanitizer, wp_unslash( $_POST[ $key ] ) ) );
            }
        }
        update_post_meta( $post_id, '_agency_project_featured', isset( $_POST['_agency_project_featured'] ) ? 1 : 0 );

        // Parse Gallery IDs
        if ( isset( $_POST['_agency_project_gallery_ids'] ) ) {
            $ids = array_filter( array_map( 'absint', explode( ',', sanitize_text_field( wp_unslash( $_POST['_agency_project_gallery_ids'] ) ) ) ) );
            update_post_meta( $post_id, '_agency_project_gallery', wp_json_encode( array_values( $ids ) ) );
        }
    }

    // Team Save
    if ( 'team_member' === $post_type ) {
        $fields = array(
            '_agency_team_position' => 'sanitize_text_field',
            '_agency_team_email'    => 'sanitize_email',
            '_agency_team_phone'    => 'sanitize_text_field',
            '_agency_team_linkedin' => 'esc_url_raw',
            '_agency_team_twitter'  => 'esc_url_raw',
            '_agency_team_github'   => 'esc_url_raw',
        );
        foreach ( $fields as $key => $sanitizer ) {
            if ( isset( $_POST[ $key ] ) ) {
                update_post_meta( $post_id, $key, call_user_func( $sanitizer, wp_unslash( $_POST[ $key ] ) ) );
            }
        }
        update_post_meta( $post_id, '_agency_team_featured', isset( $_POST['_agency_team_featured'] ) ? 1 : 0 );

        // Parse Structured Skills & Percentages
        if ( isset( $_POST['_agency_team_skills_text'] ) ) {
            $lines = explode( "\n", wp_unslash( $_POST['_agency_team_skills_text'] ) );
            $skills = array();
            foreach ( $lines as $line ) {
                $line = trim( $line );
                if ( empty( $line ) ) continue;
                $parts = explode( ':', $line );
                $name = sanitize_text_field( trim( $parts[0] ) );
                $pct = isset( $parts[1] ) ? min( 100, max( 0, absint( trim( $parts[1] ) ) ) ) : 90;
                if ( ! empty( $name ) ) {
                    $skills[] = array(
                        'name'       => $name,
                        'percentage' => $pct,
                    );
                }
            }
            update_post_meta( $post_id, '_agency_team_skills', wp_json_encode( $skills ) );
        }
    }

    // Career Save
    if ( 'career' === $post_type ) {
        $fields = array(
            '_agency_career_job_type'     => 'sanitize_text_field',
            '_agency_career_location'     => 'sanitize_text_field',
            '_agency_career_salary_range' => 'sanitize_text_field',
            '_agency_career_experience'   => 'sanitize_text_field',
            '_agency_career_apply_email'  => 'sanitize_email',
            '_agency_career_status'       => 'sanitize_text_field',
        );
        foreach ( $fields as $key => $sanitizer ) {
            if ( isset( $_POST[ $key ] ) ) {
                update_post_meta( $post_id, $key, call_user_func( $sanitizer, wp_unslash( $_POST[ $key ] ) ) );
            }
        }
        update_post_meta( $post_id, '_agency_career_featured', isset( $_POST['_agency_career_featured'] ) ? 1 : 0 );

        // Responsibilities array
        if ( isset( $_POST['_agency_career_responsibilities_text'] ) ) {
            $lines = array_filter( array_map( 'sanitize_text_field', explode( "\n", wp_unslash( $_POST['_agency_career_responsibilities_text'] ) ) ) );
            update_post_meta( $post_id, '_agency_career_responsibilities', wp_json_encode( array_values( array_map( 'trim', $lines ) ) ) );
        }

        // Requirements array
        if ( isset( $_POST['_agency_career_requirements_text'] ) ) {
            $lines = array_filter( array_map( 'sanitize_text_field', explode( "\n", wp_unslash( $_POST['_agency_career_requirements_text'] ) ) ) );
            update_post_meta( $post_id, '_agency_career_requirements', wp_json_encode( array_values( array_map( 'trim', $lines ) ) ) );
        }

        // Skills array
        if ( isset( $_POST['_agency_career_skills_text'] ) ) {
            $lines = array_filter( array_map( 'sanitize_text_field', explode( "\n", wp_unslash( $_POST['_agency_career_skills_text'] ) ) ) );
            update_post_meta( $post_id, '_agency_career_skills', wp_json_encode( array_values( array_map( 'trim', $lines ) ) ) );
        }
    }

    // Testimonial Save
    if ( 'testimonial' === $post_type ) {
        $fields = array(
            '_agency_testimonial_author'  => 'sanitize_text_field',
            '_agency_testimonial_company' => 'sanitize_text_field',
            '_agency_testimonial_role'    => 'sanitize_text_field',
            '_agency_testimonial_rating'  => 'absint',
        );
        foreach ( $fields as $key => $sanitizer ) {
            if ( isset( $_POST[ $key ] ) ) {
                $val = call_user_func( $sanitizer, wp_unslash( $_POST[ $key ] ) );
                if ( '_agency_testimonial_rating' === $key ) {
                    $val = min( 5, max( 1, (int) $val ) );
                }
                update_post_meta( $post_id, $key, $val );
            }
        }
        update_post_meta( $post_id, '_agency_testimonial_featured', isset( $_POST['_agency_testimonial_featured'] ) ? 1 : 0 );
    }

    // Pricing Plan Save
    if ( 'pricing_plan' === $post_type ) {
        $fields = array(
            '_agency_plan_price'          => 'sanitize_text_field',
            '_agency_plan_billing_period' => 'sanitize_text_field',
            '_agency_plan_badge'          => 'sanitize_text_field',
            '_agency_plan_button_text'    => 'sanitize_text_field',
            '_agency_plan_button_url'     => 'sanitize_text_field',
        );
        foreach ( $fields as $key => $sanitizer ) {
            if ( isset( $_POST[ $key ] ) ) {
                update_post_meta( $post_id, $key, call_user_func( $sanitizer, wp_unslash( $_POST[ $key ] ) ) );
            }
        }
        update_post_meta( $post_id, '_agency_plan_featured', isset( $_POST['_agency_plan_featured'] ) ? 1 : 0 );

        if ( isset( $_POST['_agency_plan_features_text'] ) ) {
            $lines = array_filter( array_map( 'sanitize_text_field', explode( "\n", wp_unslash( $_POST['_agency_plan_features_text'] ) ) ) );
            update_post_meta( $post_id, '_agency_plan_features', wp_json_encode( array_values( array_map( 'trim', $lines ) ) ) );
        }
    }
}
add_action( 'save_post', 'digital_agency_save_post_meta' );

// =============================================================================
// ADMIN LIST COLUMNS & SORTABLE FILTERS
// =============================================================================

// 1. Service Columns
function digital_agency_service_columns( array $columns ): array {
    $new = array();
    foreach ( $columns as $k => $v ) {
        $new[ $k ] = $v;
        if ( 'title' === $k ) {
            $new['service_price']    = __( 'Starting Price', 'digital-agency' );
            $new['service_timeline'] = __( 'Timeline', 'digital-agency' );
            $new['service_featured'] = __( 'Featured', 'digital-agency' );
        }
    }
    return $new;
}
add_filter( 'manage_service_posts_columns', 'digital_agency_service_columns' );

function digital_agency_service_custom_column( string $column, int $post_id ): void {
    if ( 'service_price' === $column ) {
        echo esc_html( get_post_meta( $post_id, '_agency_service_starting_price', true ) ?: '—' );
    } elseif ( 'service_timeline' === $column ) {
        echo esc_html( get_post_meta( $post_id, '_agency_service_timeline', true ) ?: '—' );
    } elseif ( 'service_featured' === $column ) {
        echo get_post_meta( $post_id, '_agency_service_featured', true ) ? '<span style="color:#10b981;font-weight:bold;">✦ Yes</span>' : '—';
    }
}
add_action( 'manage_service_posts_custom_column', 'digital_agency_service_custom_column', 10, 2 );

// 2. Project Columns
function digital_agency_project_columns( array $columns ): array {
    $new = array();
    foreach ( $columns as $k => $v ) {
        $new[ $k ] = $v;
        if ( 'title' === $k ) {
            $new['project_client']   = __( 'Client', 'digital-agency' );
            $new['project_impact']   = __( 'Impact Metric', 'digital-agency' );
            $new['project_featured'] = __( 'Featured', 'digital-agency' );
        }
    }
    return $new;
}
add_filter( 'manage_project_posts_columns', 'digital_agency_project_columns' );

function digital_agency_project_custom_column( string $column, int $post_id ): void {
    if ( 'project_client' === $column ) {
        echo esc_html( get_post_meta( $post_id, '_agency_project_client', true ) ?: '—' );
    } elseif ( 'project_impact' === $column ) {
        $impact = get_post_meta( $post_id, '_agency_project_impact_metric', true );
        echo $impact ? '<strong style="color:#0284c7;">' . esc_html( $impact ) . '</strong>' : '—';
    } elseif ( 'project_featured' === $column ) {
        echo get_post_meta( $post_id, '_agency_project_featured', true ) ? '<span style="color:#10b981;font-weight:bold;">✦ Yes</span>' : '—';
    }
}
add_action( 'manage_project_posts_custom_column', 'digital_agency_project_custom_column', 10, 2 );

// 3. Team Columns
function digital_agency_team_columns( array $columns ): array {
    $new = array();
    foreach ( $columns as $k => $v ) {
        $new[ $k ] = $v;
        if ( 'title' === $k ) {
            $new['team_position'] = __( 'Designation', 'digital-agency' );
            $new['team_featured'] = __( 'Leadership', 'digital-agency' );
        }
    }
    return $new;
}
add_filter( 'manage_team_member_posts_columns', 'digital_agency_team_columns' );

function digital_agency_team_custom_column( string $column, int $post_id ): void {
    if ( 'team_position' === $column ) {
        echo esc_html( get_post_meta( $post_id, '_agency_team_position', true ) ?: '—' );
    } elseif ( 'team_featured' === $column ) {
        echo get_post_meta( $post_id, '_agency_team_featured', true ) ? '<span style="color:#10b981;font-weight:bold;">✦ Yes</span>' : '—';
    }
}
add_action( 'manage_team_member_posts_custom_column', 'digital_agency_team_custom_column', 10, 2 );

// 4. Career Columns
function digital_agency_career_columns( array $columns ): array {
    $new = array();
    foreach ( $columns as $k => $v ) {
        $new[ $k ] = $v;
        if ( 'title' === $k ) {
            $new['career_type']     = __( 'Type', 'digital-agency' );
            $new['career_location'] = __( 'Location', 'digital-agency' );
            $new['career_status']   = __( 'Status', 'digital-agency' );
        }
    }
    return $new;
}
add_filter( 'manage_career_posts_columns', 'digital_agency_career_columns' );

function digital_agency_career_custom_column( string $column, int $post_id ): void {
    if ( 'career_type' === $column ) {
        echo esc_html( get_post_meta( $post_id, '_agency_career_job_type', true ) ?: '—' );
    } elseif ( 'career_location' === $column ) {
        echo esc_html( get_post_meta( $post_id, '_agency_career_location', true ) ?: '—' );
    } elseif ( 'career_status' === $column ) {
        $status = get_post_meta( $post_id, '_agency_career_status', true ) ?: 'Open';
        $color = ( 'Urgent' === $status ) ? '#ef4444' : ( ( 'Closed' === $status ) ? '#6b7280' : '#10b981' );
        echo '<span style="color:' . esc_attr( $color ) . ';font-weight:600;">' . esc_html( $status ) . '</span>';
    }
}
add_action( 'manage_career_posts_custom_column', 'digital_agency_career_custom_column', 10, 2 );

// 5. Testimonial Columns
function digital_agency_testimonial_columns( array $columns ): array {
    $new = array();
    foreach ( $columns as $k => $v ) {
        $new[ $k ] = $v;
        if ( 'title' === $k ) {
            $new['testi_company']  = __( 'Company', 'digital-agency' );
            $new['testi_rating']   = __( 'Rating', 'digital-agency' );
            $new['testi_featured'] = __( 'Featured', 'digital-agency' );
        }
    }
    return $new;
}
add_filter( 'manage_testimonial_posts_columns', 'digital_agency_testimonial_columns' );

function digital_agency_testimonial_custom_column( string $column, int $post_id ): void {
    if ( 'testi_company' === $column ) {
        echo esc_html( get_post_meta( $post_id, '_agency_testimonial_company', true ) ?: '—' );
    } elseif ( 'testi_rating' === $column ) {
        $rating = (int) get_post_meta( $post_id, '_agency_testimonial_rating', true ) ?: 5;
        echo esc_html( str_repeat( '★', $rating ) );
    } elseif ( 'testi_featured' === $column ) {
        echo get_post_meta( $post_id, '_agency_testimonial_featured', true ) ? '<span style="color:#10b981;font-weight:bold;">✦ Yes</span>' : '—';
    }
}
add_action( 'manage_testimonial_posts_custom_column', 'digital_agency_testimonial_custom_column', 10, 2 );

// 6. Pricing Plan Columns
function digital_agency_pricing_plan_columns( array $columns ): array {
    $new = array();
    foreach ( $columns as $k => $v ) {
        $new[ $k ] = $v;
        if ( 'title' === $k ) {
            $new['plan_price']    = __( 'Price', 'digital-agency' );
            $new['plan_badge']    = __( 'Badge', 'digital-agency' );
            $new['plan_featured'] = __( 'Featured (Lime Glow)', 'digital-agency' );
        }
    }
    return $new;
}
add_filter( 'manage_pricing_plan_posts_columns', 'digital_agency_pricing_plan_columns' );

function digital_agency_pricing_plan_custom_column( string $column, int $post_id ): void {
    if ( 'plan_price' === $column ) {
        $price  = get_post_meta( $post_id, '_agency_plan_price', true );
        $period = get_post_meta( $post_id, '_agency_plan_billing_period', true );
        echo esc_html( $price . ' ' . $period );
    } elseif ( 'plan_badge' === $column ) {
        echo esc_html( get_post_meta( $post_id, '_agency_plan_badge', true ) ?: '—' );
    } elseif ( 'plan_featured' === $column ) {
        echo get_post_meta( $post_id, '_agency_plan_featured', true ) ? '<span style="color:#10b981;font-weight:bold;">✦ Yes</span>' : '—';
    }
}
add_action( 'manage_pricing_plan_posts_custom_column', 'digital_agency_pricing_plan_custom_column', 10, 2 );

// =============================================================================
// REST API FIRST-CLASS STRUCTURED FIELDS
// =============================================================================

/**
 * Register decoded, structured REST API fields for headless and dynamic block consumers
 */
function digital_agency_register_rest_fields(): void {
    // 1. Service REST fields
    register_rest_field( 'service', 'gallery_images', array(
        'get_callback' => function( array $post_arr ) {
            return digital_agency_get_service_gallery( $post_arr['id'] );
        },
        'schema'       => array( 'type' => 'array', 'description' => __( 'Decoded gallery image objects', 'digital-agency' ) ),
    ) );

    register_rest_field( 'service', 'included_services', array(
        'get_callback' => function( array $post_arr ) {
            return digital_agency_get_service_deliverables( $post_arr['id'] );
        },
        'schema'       => array( 'type' => 'array', 'description' => __( 'List of included services', 'digital-agency' ) ),
    ) );

    register_rest_field( 'service', 'expertise', array(
        'get_callback' => function( array $post_arr ) {
            return digital_agency_get_service_expertise( $post_arr['id'] );
        },
        'schema'       => array( 'type' => 'array', 'description' => __( 'List of expertise points', 'digital-agency' ) ),
    ) );

    register_rest_field( 'service', 'benefits', array(
        'get_callback' => function( array $post_arr ) {
            return digital_agency_get_service_benefits( $post_arr['id'] );
        },
        'schema'       => array( 'type' => 'array', 'description' => __( 'List of client benefits', 'digital-agency' ) ),
    ) );

    // 2. Project REST fields
    register_rest_field( 'project', 'gallery_images', array(
        'get_callback' => function( array $post_arr ) {
            return digital_agency_get_project_gallery( $post_arr['id'] );
        },
        'schema'       => array( 'type' => 'array', 'description' => __( 'Decoded case study gallery image objects', 'digital-agency' ) ),
    ) );

    register_rest_field( 'project', 'linked_testimonial', array(
        'get_callback' => function( array $post_arr ) {
            $testi_id = (int) get_post_meta( $post_arr['id'], '_agency_project_testimonial_id', true );
            if ( ! $testi_id ) return null;
            $testi = get_post( $testi_id );
            if ( ! $testi || 'publish' !== $testi->post_status ) return null;
            return array(
                'id'      => $testi->ID,
                'author'  => $testi->post_title,
                'quote'   => $testi->post_content,
                'company' => get_post_meta( $testi->ID, '_agency_testimonial_company', true ),
                'role'    => get_post_meta( $testi->ID, '_agency_testimonial_role', true ),
                'rating'  => (int) get_post_meta( $testi->ID, '_agency_testimonial_rating', true ) ?: 5,
            );
        },
        'schema'       => array( 'type' => 'object', 'description' => __( 'Linked client testimonial object', 'digital-agency' ) ),
    ) );

    // 3. Team Member REST fields
    register_rest_field( 'team_member', 'skills', array(
        'get_callback' => function( array $post_arr ) {
            return digital_agency_get_team_skills( $post_arr['id'] );
        },
        'schema'       => array(
            'type'        => 'array',
            'description' => __( 'Team member skill competencies with percentage ratings', 'digital-agency' ),
            'items'       => array(
                'type'       => 'object',
                'properties' => array(
                    'name'       => array( 'type' => 'string' ),
                    'percentage' => array( 'type' => 'integer' ),
                ),
            ),
        ),
    ) );

    // 4. Career REST fields
    register_rest_field( 'career', 'responsibilities', array(
        'get_callback' => function( array $post_arr ) {
            return digital_agency_get_career_responsibilities( $post_arr['id'] );
        },
        'schema'       => array( 'type' => 'array', 'description' => __( 'Job responsibilities list', 'digital-agency' ) ),
    ) );

    register_rest_field( 'career', 'requirements', array(
        'get_callback' => function( array $post_arr ) {
            return digital_agency_get_career_requirements( $post_arr['id'] );
        },
        'schema'       => array( 'type' => 'array', 'description' => __( 'Job requirements list', 'digital-agency' ) ),
    ) );

    register_rest_field( 'career', 'skills', array(
        'get_callback' => function( array $post_arr ) {
            return digital_agency_get_career_skills( $post_arr['id'] );
        },
        'schema'       => array( 'type' => 'array', 'description' => __( 'Job desired skills list', 'digital-agency' ) ),
    ) );

    // 5. Pricing Plan REST fields
    register_rest_field( 'pricing_plan', 'features', array(
        'get_callback' => function( array $post_arr ) {
            return digital_agency_get_pricing_plan_features( $post_arr['id'] );
        },
        'schema'       => array( 'type' => 'array', 'description' => __( 'Pricing plan features list', 'digital-agency' ) ),
    ) );
}
add_action( 'rest_api_init', 'digital_agency_register_rest_fields' );

