<?php
/**
 * Custom Fields & Post Meta Engine (Advanced Admin UX, REST API & Block Bindings Ready)
 *
 * @package DigitalAgency
 * @version 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// =============================================================================
// 1. POST META REGISTRATION (SCHEMA & REST EXPOSURE)
// =============================================================================

/**
 * Register all Post Meta fields natively with schema validation and REST exposure
 */
function digital_agency_register_post_meta(): void {

    $auth_callback = function() {
        return current_user_can( 'edit_posts' );
    };

    // 1. Service Meta Fields
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

    // 2. Project / Case Study Meta Fields
    $project_fields = array(
        '_agency_project_client'             => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_project_year'               => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_project_country'            => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_project_url'                => array( 'type' => 'string',  'sanitize' => 'esc_url_raw',             'default' => '' ),
        '_agency_project_video_url'          => array( 'type' => 'string',  'sanitize' => 'esc_url_raw',             'default' => '' ),
        '_agency_project_impact_metric'      => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_project_metric_label'       => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '' ),
        '_agency_project_challenge'          => array( 'type' => 'string',  'sanitize' => 'wp_kses_post',            'default' => '' ),
        '_agency_project_strategy'           => array( 'type' => 'string',  'sanitize' => 'wp_kses_post',            'default' => '' ),
        '_agency_project_solution'           => array( 'type' => 'string',  'sanitize' => 'wp_kses_post',            'default' => '' ),
        '_agency_project_results'            => array( 'type' => 'string',  'sanitize' => 'wp_kses_post',            'default' => '' ),
        '_agency_project_gallery'            => array( 'type' => 'string',  'sanitize' => 'sanitize_text_field',     'default' => '[]' ),
        '_agency_project_testimonial_id'     => array( 'type' => 'integer', 'sanitize' => 'absint',                  'default' => 0 ),
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

    // 3. Team Member Meta Fields
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

    // 4. Career Meta Fields
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

    // 5. Testimonial Meta Fields
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

    // 6. Pricing Plan Meta Fields
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
// 2. ADMIN METABOXES REGISTRATION
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

// =============================================================================
// 3. METABOX EDITORIAL RENDERING ENGINES
// =============================================================================

/**
 * 3.1 Render Service Meta Box
 */
function digital_agency_render_service_meta_box( WP_Post $post ): void {
    wp_nonce_field( 'digital_agency_save_meta', 'digital_agency_meta_nonce' );

    $meta = digital_agency_get_service_meta( $post->ID );
    $price        = $meta['price'] ?? '';
    $timeline     = $meta['timeline'] ?? '';
    $badge        = $meta['badge'] ?? '';
    $video_url    = $meta['video_url'] ?? '';
    $gallery      = $meta['gallery'] ?? array();
    $featured     = ! empty( $meta['featured'] );
    $deliverables = $meta['deliverables'] ?? array();
    $expertise    = $meta['expertise'] ?? array();
    $benefits     = $meta['benefits'] ?? array();

    $gallery_ids_json = wp_json_encode( array_map( 'absint', (array) $gallery ) );
    ?>
    <div class="agency-admin-metabox">

        <!-- Section 1: Service Details -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-admin-generic"></span>
                    <?php esc_html_e( 'Service Parameters & Commercials', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-admin-grid-2">
                <div class="agency-admin-field">
                    <label for="_agency_service_starting_price"><?php esc_html_e( 'Starting Investment / Retainer', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_service_starting_price" name="_agency_service_starting_price" value="<?php echo esc_attr( $price ); ?>" placeholder="e.g. $4,500" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_service_timeline"><?php esc_html_e( 'Estimated Execution Timeline', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_service_timeline" name="_agency_service_timeline" value="<?php echo esc_attr( $timeline ); ?>" placeholder="e.g. 4-6 Weeks" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_service_highlight_badge"><?php esc_html_e( 'Card Highlight Badge', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_service_highlight_badge" name="_agency_service_highlight_badge" value="<?php echo esc_attr( $badge ); ?>" placeholder="e.g. CORE SERVICE" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_service_video_url"><?php esc_html_e( 'Service Explainer Video URL (YouTube / Vimeo / MP4)', 'digital-agency' ); ?></label>
                    <input type="url" id="_agency_service_video_url" name="_agency_service_video_url" value="<?php echo esc_url( $video_url ); ?>" placeholder="https://..." />
                </div>
            </div>
            <div style="margin-top:16px;">
                <label style="font-weight:600;font-size:13px;display:flex;align-items:center;gap:8px;cursor:pointer;">
                    <input type="checkbox" name="_agency_service_featured" value="1" <?php checked( $featured, true ); ?> />
                    <?php esc_html_e( 'Highlight as Featured Capability on Homepage', 'digital-agency' ); ?>
                </label>
            </div>
        </div>

        <!-- Section 2: Media Gallery -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-format-gallery"></span>
                    <?php esc_html_e( 'Service Visual Gallery', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-gallery-wrapper">
                <input type="hidden" name="_agency_service_gallery_json" value="<?php echo esc_attr( $gallery_ids_json ); ?>" data-gallery-input />
                <div class="agency-gallery-thumbs" data-gallery-thumbs>
                    <?php if ( ! empty( $gallery ) ) : ?>
                        <?php foreach ( $gallery as $att_id ) : ?>
                            <?php
                            $att_id = absint( $att_id );
                            $thumb_src = wp_get_attachment_image_src( $att_id, 'thumbnail' );
                            if ( $thumb_src ) :
                            ?>
                                <div class="agency-gallery-thumb-item" data-attachment-id="<?php echo esc_attr( $att_id ); ?>">
                                    <img src="<?php echo esc_url( $thumb_src[0] ); ?>" alt="" />
                                    <button type="button" class="agency-gallery-thumb-remove" data-gallery-remove aria-label="<?php esc_attr_e( 'Remove image', 'digital-agency' ); ?>">&times;</button>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="agency-gallery-empty-msg"><?php esc_html_e( 'No images in service gallery. Click below to add from Media Library.', 'digital-agency' ); ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <button type="button" class="button button-secondary" data-gallery-select data-frame-title="<?php esc_attr_e( 'Select Service Gallery Images', 'digital-agency' ); ?>" data-frame-button="<?php esc_attr_e( 'Add Images to Gallery', 'digital-agency' ); ?>">
                        <span class="dashicons dashicons-images-alt2" style="vertical-align:text-bottom;margin-right:4px;"></span>
                        <?php esc_html_e( 'Manage Gallery Images', 'digital-agency' ); ?>
                    </button>
                </div>
            </div>
        </div>

        <!-- Section 3: Deliverables Repeatable List -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-saved"></span>
                    <?php esc_html_e( 'Deliverables & Included Scope', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-repeatable-wrapper">
                <ul class="agency-repeatable-list">
                    <?php if ( ! empty( $deliverables ) ) : ?>
                        <?php foreach ( $deliverables as $item ) : ?>
                            <li class="agency-repeatable-row">
                                <input type="text" name="_agency_service_included_items[]" value="<?php echo esc_attr( $item ); ?>" class="agency-repeatable-input" placeholder="<?php esc_attr_e( 'e.g. Comprehensive technical audit', 'digital-agency' ); ?>" />
                                <button type="button" class="agency-repeatable-remove" data-repeatable-remove aria-label="<?php esc_attr_e( 'Remove item', 'digital-agency' ); ?>">&times;</button>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <button type="button" class="agency-repeatable-add" data-repeatable-add data-field-name="_agency_service_included_items" data-placeholder="<?php esc_attr_e( 'e.g. Technical SEO & Schema markup architecture', 'digital-agency' ); ?>">
                    <span class="dashicons dashicons-plus"></span>
                    <?php esc_html_e( 'Add Deliverable', 'digital-agency' ); ?>
                </button>
            </div>
        </div>

        <!-- Section 4: Key Expertise Repeatable List -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-awards"></span>
                    <?php esc_html_e( 'Strategic Expertise Points', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-repeatable-wrapper">
                <ul class="agency-repeatable-list">
                    <?php if ( ! empty( $expertise ) ) : ?>
                        <?php foreach ( $expertise as $item ) : ?>
                            <li class="agency-repeatable-row">
                                <input type="text" name="_agency_service_expertise_items[]" value="<?php echo esc_attr( $item ); ?>" class="agency-repeatable-input" placeholder="<?php esc_attr_e( 'e.g. Core Web Vitals optimization', 'digital-agency' ); ?>" />
                                <button type="button" class="agency-repeatable-remove" data-repeatable-remove aria-label="<?php esc_attr_e( 'Remove item', 'digital-agency' ); ?>">&times;</button>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <button type="button" class="agency-repeatable-add" data-repeatable-add data-field-name="_agency_service_expertise_items" data-placeholder="<?php esc_attr_e( 'e.g. High-throughput MySQL scaling', 'digital-agency' ); ?>">
                    <span class="dashicons dashicons-plus"></span>
                    <?php esc_html_e( 'Add Expertise Point', 'digital-agency' ); ?>
                </button>
            </div>
        </div>

        <!-- Section 5: Client Benefits Repeatable List -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-chart-line"></span>
                    <?php esc_html_e( 'Client Return on Investment & Benefits', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-repeatable-wrapper">
                <ul class="agency-repeatable-list">
                    <?php if ( ! empty( $benefits ) ) : ?>
                        <?php foreach ( $benefits as $item ) : ?>
                            <li class="agency-repeatable-row">
                                <input type="text" name="_agency_service_benefits_items[]" value="<?php echo esc_attr( $item ); ?>" class="agency-repeatable-input" placeholder="<?php esc_attr_e( 'e.g. 40%+ reduction in server response latency', 'digital-agency' ); ?>" />
                                <button type="button" class="agency-repeatable-remove" data-repeatable-remove aria-label="<?php esc_attr_e( 'Remove item', 'digital-agency' ); ?>">&times;</button>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <button type="button" class="agency-repeatable-add" data-repeatable-add data-field-name="_agency_service_benefits_items" data-placeholder="<?php esc_attr_e( 'e.g. Higher search ranking velocity', 'digital-agency' ); ?>">
                    <span class="dashicons dashicons-plus"></span>
                    <?php esc_html_e( 'Add Client Benefit', 'digital-agency' ); ?>
                </button>
            </div>
        </div>

    </div>
    <?php
}

/**
 * 3.2 Render Project / Case Study Meta Box
 */
function digital_agency_render_project_meta_box( WP_Post $post ): void {
    wp_nonce_field( 'digital_agency_save_meta', 'digital_agency_meta_nonce' );

    $meta = digital_agency_get_project_meta( $post->ID );
    $client       = $meta['client'] ?? '';
    $year         = $meta['year'] ?? '';
    $country      = $meta['country'] ?? '';
    $url          = $meta['url'] ?? '';
    $video_url    = $meta['video_url'] ?? '';
    $impact       = $meta['impact'] ?? '';
    $metric_label = $meta['metric_label'] ?? '';
    $challenge    = $meta['challenge'] ?? '';
    $strategy     = $meta['strategy'] ?? '';
    $solution     = $meta['solution'] ?? '';
    $results      = $meta['results'] ?? '';
    $gallery      = $meta['gallery'] ?? array();
    $testi_id     = $meta['testimonial_id'] ?? 0;
    $featured     = ! empty( $meta['featured'] );

    $gallery_ids_json = wp_json_encode( array_map( 'absint', (array) $gallery ) );

    // Fetch published testimonials for relationship selector
    $testimonials = get_posts( array(
        'post_type'      => 'testimonial',
        'post_status'    => 'publish',
        'posts_per_page' => 50,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ) );
    ?>
    <div class="agency-admin-metabox">

        <!-- Section 1: Project Parameters -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-portfolio"></span>
                    <?php esc_html_e( 'Case Study Parameters & Impact Metrics', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-admin-grid-3">
                <div class="agency-admin-field">
                    <label for="_agency_project_client"><?php esc_html_e( 'Client / Brand Name', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_project_client" name="_agency_project_client" value="<?php echo esc_attr( $client ); ?>" placeholder="e.g. Finscale Global" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_project_year"><?php esc_html_e( 'Project Year / Timeline', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_project_year" name="_agency_project_year" value="<?php echo esc_attr( $year ); ?>" placeholder="e.g. 2026" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_project_country"><?php esc_html_e( 'Region / Market', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_project_country" name="_agency_project_country" value="<?php echo esc_attr( $country ); ?>" placeholder="e.g. North America / Global" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_project_impact_metric"><?php esc_html_e( 'Impact Metric Highlight', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_project_impact_metric" name="_agency_project_impact_metric" value="<?php echo esc_attr( $impact ); ?>" placeholder="e.g. +340% ROAS" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_project_metric_label"><?php esc_html_e( 'Metric Attribution Label', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_project_metric_label" name="_agency_project_metric_label" value="<?php echo esc_attr( $metric_label ); ?>" placeholder="e.g. Net Pipeline Acceleration" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_project_url"><?php esc_html_e( 'Live Website / Product URL', 'digital-agency' ); ?></label>
                    <input type="url" id="_agency_project_url" name="_agency_project_url" value="<?php echo esc_url( $url ); ?>" placeholder="https://..." />
                </div>
            </div>
            <div class="agency-admin-field" style="margin-top:16px;">
                <label for="_agency_project_video_url"><?php esc_html_e( 'Showcase Reel / Video URL (YouTube / Vimeo / MP4)', 'digital-agency' ); ?></label>
                <input type="url" id="_agency_project_video_url" name="_agency_project_video_url" value="<?php echo esc_url( $video_url ); ?>" placeholder="https://..." />
            </div>
            <div style="margin-top:16px;">
                <label style="font-weight:600;font-size:13px;display:flex;align-items:center;gap:8px;cursor:pointer;">
                    <input type="checkbox" name="_agency_project_featured" value="1" <?php checked( $featured, true ); ?> />
                    <?php esc_html_e( 'Feature on Homepage Project Showcase', 'digital-agency' ); ?>
                </label>
            </div>
        </div>

        <!-- Section 2: Narrative Breakdown -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-editor-quote"></span>
                    <?php esc_html_e( 'Case Study Narrative (01 Challenge • 02 Strategy • 03 Impact)', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-admin-field" style="margin-bottom:16px;">
                <label for="_agency_project_challenge"><strong><?php esc_html_e( '01. The Challenge (Market Bottleneck)', 'digital-agency' ); ?></strong></label>
                <textarea id="_agency_project_challenge" name="_agency_project_challenge" rows="3"><?php echo esc_textarea( $challenge ); ?></textarea>
            </div>
            <div class="agency-admin-field" style="margin-bottom:16px;">
                <label for="_agency_project_strategy"><strong><?php esc_html_e( '02. The Strategy (Execution Architecture)', 'digital-agency' ); ?></strong></label>
                <textarea id="_agency_project_strategy" name="_agency_project_strategy" rows="3"><?php echo esc_textarea( $strategy ); ?></textarea>
            </div>
            <div class="agency-admin-field" style="margin-bottom:16px;">
                <label for="_agency_project_solution"><strong><?php esc_html_e( '03. The Solution / Engineering Implementation', 'digital-agency' ); ?></strong></label>
                <textarea id="_agency_project_solution" name="_agency_project_solution" rows="3"><?php echo esc_textarea( $solution ); ?></textarea>
            </div>
            <div class="agency-admin-field">
                <label for="_agency_project_results"><strong><?php esc_html_e( '04. Quantifiable Results & ROI Breakdown', 'digital-agency' ); ?></strong></label>
                <textarea id="_agency_project_results" name="_agency_project_results" rows="3"><?php echo esc_textarea( $results ); ?></textarea>
            </div>
        </div>

        <!-- Section 3: Media Gallery -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-format-gallery"></span>
                    <?php esc_html_e( 'Case Study Visual Mockups & Gallery', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-gallery-wrapper">
                <input type="hidden" name="_agency_project_gallery_json" value="<?php echo esc_attr( $gallery_ids_json ); ?>" data-gallery-input />
                <div class="agency-gallery-thumbs" data-gallery-thumbs>
                    <?php if ( ! empty( $gallery ) ) : ?>
                        <?php foreach ( $gallery as $att_id ) : ?>
                            <?php
                            $att_id = absint( $att_id );
                            $thumb_src = wp_get_attachment_image_src( $att_id, 'thumbnail' );
                            if ( $thumb_src ) :
                            ?>
                                <div class="agency-gallery-thumb-item" data-attachment-id="<?php echo esc_attr( $att_id ); ?>">
                                    <img src="<?php echo esc_url( $thumb_src[0] ); ?>" alt="" />
                                    <button type="button" class="agency-gallery-thumb-remove" data-gallery-remove aria-label="<?php esc_attr_e( 'Remove image', 'digital-agency' ); ?>">&times;</button>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="agency-gallery-empty-msg"><?php esc_html_e( 'No gallery images selected. Manage visual assets with the button below.', 'digital-agency' ); ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <button type="button" class="button button-secondary" data-gallery-select data-frame-title="<?php esc_attr_e( 'Select Project Case Study Images', 'digital-agency' ); ?>" data-frame-button="<?php esc_attr_e( 'Add Images to Project', 'digital-agency' ); ?>">
                        <span class="dashicons dashicons-images-alt2" style="vertical-align:text-bottom;margin-right:4px;"></span>
                        <?php esc_html_e( 'Manage Project Gallery', 'digital-agency' ); ?>
                    </button>
                </div>
            </div>
        </div>

        <!-- Section 4: Linked Client Testimonial Relationship -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-testimonial"></span>
                    <?php esc_html_e( 'Linked Client Endorsement (Relational Model)', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-admin-field">
                <label for="_agency_project_testimonial_id"><?php esc_html_e( 'Select Client Testimonial', 'digital-agency' ); ?></label>
                <select id="_agency_project_testimonial_id" name="_agency_project_testimonial_id">
                    <option value="0"><?php esc_html_e( '— No Linked Testimonial —', 'digital-agency' ); ?></option>
                    <?php foreach ( $testimonials as $t_post ) : ?>
                        <?php
                        $t_author  = get_post_meta( $t_post->ID, '_agency_testimonial_author', true ) ?: $t_post->post_title;
                        $t_company = get_post_meta( $t_post->ID, '_agency_testimonial_company', true );
                        $t_label   = $t_author . ( $t_company ? ' (' . $t_company . ')' : '' );
                        ?>
                        <option value="<?php echo esc_attr( $t_post->ID ); ?>" <?php selected( $testi_id, $t_post->ID ); ?>>
                            <?php echo esc_html( $t_label ); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <p class="description"><?php esc_html_e( 'Automatically embeds the verified client testimonial, star rating, and executive avatar directly on this single project case study page.', 'digital-agency' ); ?></p>
            </div>
        </div>

    </div>
    <?php
}

/**
 * 3.3 Render Team Member Meta Box
 */
function digital_agency_render_team_meta_box( WP_Post $post ): void {
    wp_nonce_field( 'digital_agency_save_meta', 'digital_agency_meta_nonce' );

    $meta = digital_agency_get_team_meta( $post->ID );
    $position = $meta['position'] ?? '';
    $email    = $meta['email'] ?? '';
    $phone    = $meta['phone'] ?? '';
    $linkedin = $meta['linkedin'] ?? '';
    $twitter  = $meta['twitter'] ?? '';
    $github   = $meta['github'] ?? '';
    $skills   = $meta['skills'] ?? array();
    $featured = ! empty( $meta['featured'] );
    ?>
    <div class="agency-admin-metabox">

        <!-- Section 1: Designation & Contact -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-businessman"></span>
                    <?php esc_html_e( 'Role Designation & Communication', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-admin-grid-3">
                <div class="agency-admin-field">
                    <label for="_agency_team_position"><?php esc_html_e( 'Position / Title', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_team_position" name="_agency_team_position" value="<?php echo esc_attr( $position ); ?>" placeholder="e.g. Principal Technical Architect" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_team_email"><?php esc_html_e( 'Direct Work Email', 'digital-agency' ); ?></label>
                    <input type="email" id="_agency_team_email" name="_agency_team_email" value="<?php echo esc_attr( $email ); ?>" placeholder="alex@agency.com" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_team_phone"><?php esc_html_e( 'Direct Phone Number', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_team_phone" name="_agency_team_phone" value="<?php echo esc_attr( $phone ); ?>" placeholder="+1 (555) 019-2834" />
                </div>
            </div>
            <div style="margin-top:16px;">
                <label style="font-weight:600;font-size:13px;display:flex;align-items:center;gap:8px;cursor:pointer;">
                    <input type="checkbox" name="_agency_team_featured" value="1" <?php checked( $featured, true ); ?> />
                    <?php esc_html_e( 'Highlight in Executive Leadership Grid on Homepage & About Page', 'digital-agency' ); ?>
                </label>
            </div>
        </div>

        <!-- Section 2: Social Profiles -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-share"></span>
                    <?php esc_html_e( 'Executive Profiles & Professional Socials', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-admin-grid-3">
                <div class="agency-admin-field">
                    <label for="_agency_team_linkedin"><?php esc_html_e( 'LinkedIn URL', 'digital-agency' ); ?></label>
                    <input type="url" id="_agency_team_linkedin" name="_agency_team_linkedin" value="<?php echo esc_url( $linkedin ); ?>" placeholder="https://linkedin.com/in/..." />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_team_twitter"><?php esc_html_e( 'X / Twitter URL', 'digital-agency' ); ?></label>
                    <input type="url" id="_agency_team_twitter" name="_agency_team_twitter" value="<?php echo esc_url( $twitter ); ?>" placeholder="https://x.com/..." />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_team_github"><?php esc_html_e( 'GitHub Profile URL', 'digital-agency' ); ?></label>
                    <input type="url" id="_agency_team_github" name="_agency_team_github" value="<?php echo esc_url( $github ); ?>" placeholder="https://github.com/..." />
                </div>
            </div>
        </div>

        <!-- Section 3: Skill Competencies -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-performance"></span>
                    <?php esc_html_e( 'Skill Competency Ratings (0% to 100%)', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-repeatable-wrapper">
                <ul class="agency-repeatable-list">
                    <?php if ( ! empty( $skills ) ) : ?>
                        <?php foreach ( $skills as $sk ) : ?>
                            <?php
                            $sk_name = is_array( $sk ) ? ( $sk['name'] ?? '' ) : (string) $sk;
                            $sk_pct  = is_array( $sk ) ? min( 100, max( 0, (int) ( $sk['percentage'] ?? 90 ) ) ) : 90;
                            ?>
                            <li class="agency-skill-row">
                                <input type="text" name="_agency_team_skill_name[]" value="<?php echo esc_attr( $sk_name ); ?>" placeholder="<?php esc_attr_e( 'Skill Name (e.g. Enterprise Architecture)', 'digital-agency' ); ?>" class="agency-skill-name" />
                                <input type="range" value="<?php echo esc_attr( $sk_pct ); ?>" min="0" max="100" class="agency-skill-range" />
                                <input type="number" name="_agency_team_skill_pct[]" value="<?php echo esc_attr( $sk_pct ); ?>" min="0" max="100" class="agency-skill-number" />
                                <button type="button" class="agency-repeatable-remove" data-repeatable-remove aria-label="<?php esc_attr_e( 'Remove skill', 'digital-agency' ); ?>">&times;</button>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <button type="button" class="agency-repeatable-add" data-repeatable-add data-skill-repeatable data-field-name="_agency_team_skill" data-placeholder="<?php esc_attr_e( 'e.g. Cloud Infrastructure Scaling', 'digital-agency' ); ?>">
                    <span class="dashicons dashicons-plus"></span>
                    <?php esc_html_e( 'Add Skill Competency', 'digital-agency' ); ?>
                </button>
            </div>
        </div>

    </div>
    <?php
}

/**
 * 3.4 Render Testimonial Meta Box
 */
function digital_agency_render_testimonial_meta_box( WP_Post $post ): void {
    wp_nonce_field( 'digital_agency_save_meta', 'digital_agency_meta_nonce' );

    $meta     = digital_agency_get_testimonial_meta( $post->ID );
    $author   = $meta['author'] ?? '';
    $company  = $meta['company'] ?? '';
    $role     = $meta['role'] ?? '';
    $rating   = min( 5, max( 1, (int) ( $meta['rating'] ?? 5 ) ) );
    $featured = ! empty( $meta['featured'] );
    ?>
    <div class="agency-admin-metabox">

        <!-- Section 1: Client & Review Details -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-format-quote"></span>
                    <?php esc_html_e( 'Executive Endorsement & Star Rating', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-admin-grid-3">
                <div class="agency-admin-field">
                    <label for="_agency_testimonial_author"><?php esc_html_e( 'Client / Executive Name', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_testimonial_author" name="_agency_testimonial_author" value="<?php echo esc_attr( $author ); ?>" placeholder="e.g. Sarah Jenkins" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_testimonial_company"><?php esc_html_e( 'Company / Brand Name', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_testimonial_company" name="_agency_testimonial_company" value="<?php echo esc_attr( $company ); ?>" placeholder="e.g. Finscale Global" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_testimonial_role"><?php esc_html_e( 'Executive Designation / Title', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_testimonial_role" name="_agency_testimonial_role" value="<?php echo esc_attr( $role ); ?>" placeholder="e.g. Chief Marketing Officer" />
                </div>
            </div>

            <!-- Rating Selector -->
            <div class="agency-admin-field" style="margin-top:20px;">
                <label><strong><?php esc_html_e( 'Verified Rating Score', 'digital-agency' ); ?></strong></label>
                <div class="agency-rating-selector">
                    <?php for ( $r = 5; $r >= 1; $r-- ) : ?>
                        <label class="agency-rating-option">
                            <input type="radio" name="_agency_testimonial_rating" value="<?php echo esc_attr( $r ); ?>" <?php checked( $rating, $r ); ?> />
                            <span class="agency-rating-stars"><?php echo esc_html( str_repeat( '★', $r ) . str_repeat( '☆', 5 - $r ) ); ?></span>
                            <span>(<?php echo esc_html( $r ); ?>/5)</span>
                        </label>
                    <?php endfor; ?>
                </div>
            </div>

            <div style="margin-top:16px;">
                <label style="font-weight:600;font-size:13px;display:flex;align-items:center;gap:8px;cursor:pointer;">
                    <input type="checkbox" name="_agency_testimonial_featured" value="1" <?php checked( $featured, true ); ?> />
                    <?php esc_html_e( 'Feature in Primary Testimonial Slider on Homepage', 'digital-agency' ); ?>
                </label>
            </div>
        </div>

    </div>
    <?php
}

/**
 * 3.5 Render Pricing Plan Meta Box
 */
function digital_agency_render_pricing_meta_box( WP_Post $post ): void {
    wp_nonce_field( 'digital_agency_save_meta', 'digital_agency_meta_nonce' );

    $meta     = digital_agency_get_pricing_meta( $post->ID );
    $price    = $meta['price'] ?? '$4,800';
    $period   = $meta['period'] ?? '/month';
    $badge    = $meta['badge'] ?? '';
    $btn_text = $meta['button_text'] ?? 'Choose Plan';
    $btn_url  = $meta['button_url'] ?? '#contact';
    $featured = ! empty( $meta['featured'] );
    $features = $meta['features'] ?? array();
    ?>
    <div class="agency-admin-metabox">

        <!-- Section 1: Pricing Parameters -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-money-alt"></span>
                    <?php esc_html_e( 'Retainer Parameters & Call to Action', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-admin-grid-3">
                <div class="agency-admin-field">
                    <label for="_agency_plan_price"><?php esc_html_e( 'Price Figure', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_plan_price" name="_agency_plan_price" value="<?php echo esc_attr( $price ); ?>" placeholder="$4,800" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_plan_billing_period"><?php esc_html_e( 'Billing Cadence / Period', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_plan_billing_period" name="_agency_plan_billing_period" value="<?php echo esc_attr( $period ); ?>" placeholder="/month" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_plan_badge"><?php esc_html_e( 'Plan Ribbon / Badge', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_plan_badge" name="_agency_plan_badge" value="<?php echo esc_attr( $badge ); ?>" placeholder="e.g. MOST POPULAR" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_plan_button_text"><?php esc_html_e( 'CTA Button Text', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_plan_button_text" name="_agency_plan_button_text" value="<?php echo esc_attr( $btn_text ); ?>" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_plan_button_url"><?php esc_html_e( 'CTA Button URL / Target', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_plan_button_url" name="_agency_plan_button_url" value="<?php echo esc_attr( $btn_url ); ?>" />
                </div>
            </div>
            <div style="margin-top:16px;">
                <label style="font-weight:600;font-size:13px;display:flex;align-items:center;gap:8px;cursor:pointer;">
                    <input type="checkbox" name="_agency_plan_featured" value="1" <?php checked( $featured, true ); ?> />
                    <?php esc_html_e( 'Highlight with Primary Lime Accent Glow on Pricing Matrix', 'digital-agency' ); ?>
                </label>
            </div>
        </div>

        <!-- Section 2: Repeatable Plan Features -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-yes-alt"></span>
                    <?php esc_html_e( 'Included Plan Features & Deliverables', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-repeatable-wrapper">
                <ul class="agency-repeatable-list">
                    <?php if ( ! empty( $features ) ) : ?>
                        <?php foreach ( $features as $feat ) : ?>
                            <li class="agency-repeatable-row">
                                <input type="text" name="_agency_plan_features_items[]" value="<?php echo esc_attr( $feat ); ?>" class="agency-repeatable-input" placeholder="<?php esc_attr_e( 'e.g. Dedicated Technical Director', 'digital-agency' ); ?>" />
                                <button type="button" class="agency-repeatable-remove" data-repeatable-remove aria-label="<?php esc_attr_e( 'Remove feature', 'digital-agency' ); ?>">&times;</button>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <button type="button" class="agency-repeatable-add" data-repeatable-add data-field-name="_agency_plan_features_items" data-placeholder="<?php esc_attr_e( 'e.g. Continuous performance audits & 24/7 SLA', 'digital-agency' ); ?>">
                    <span class="dashicons dashicons-plus"></span>
                    <?php esc_html_e( 'Add Feature Item', 'digital-agency' ); ?>
                </button>
            </div>
        </div>

    </div>
    <?php
}

/**
 * 3.6 Render Career / Job Opening Meta Box
 */
function digital_agency_render_career_meta_box( WP_Post $post ): void {
    wp_nonce_field( 'digital_agency_save_meta', 'digital_agency_meta_nonce' );

    $meta     = digital_agency_get_career_meta( $post->ID );
    $job_type = $meta['type'] ?? 'Full-Time';
    $location = $meta['location'] ?? 'Remote / Global';
    $salary   = $meta['salary'] ?? '$120k – $150k';
    $experience = get_post_meta( $post->ID, '_agency_career_experience', true ) ?: '5+ Years';
    $apply_email = get_post_meta( $post->ID, '_agency_career_apply_email', true ) ?: 'careers@digitalagency.com';
    $status   = get_post_meta( $post->ID, '_agency_career_status', true ) ?: 'Open';
    $featured = ! empty( $meta['featured'] );
    $resp     = $meta['responsibilities'] ?? array();
    $req      = $meta['requirements'] ?? array();
    $skills   = $meta['skills'] ?? array();
    ?>
    <div class="agency-admin-metabox">

        <!-- Section 1: Job Parameters -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-id"></span>
                    <?php esc_html_e( 'Position Parameters & Compensation', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-admin-grid-3">
                <div class="agency-admin-field">
                    <label for="_agency_career_job_type"><?php esc_html_e( 'Employment Arrangement', 'digital-agency' ); ?></label>
                    <select id="_agency_career_job_type" name="_agency_career_job_type">
                        <option value="Full-Time" <?php selected( $job_type, 'Full-Time' ); ?>><?php esc_html_e( 'Full-Time', 'digital-agency' ); ?></option>
                        <option value="Part-Time" <?php selected( $job_type, 'Part-Time' ); ?>><?php esc_html_e( 'Part-Time', 'digital-agency' ); ?></option>
                        <option value="Contract" <?php selected( $job_type, 'Contract' ); ?>><?php esc_html_e( 'Contract / Retainer', 'digital-agency' ); ?></option>
                    </select>
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_career_location"><?php esc_html_e( 'Location / Office Hub', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_career_location" name="_agency_career_location" value="<?php echo esc_attr( $location ); ?>" placeholder="e.g. Remote / NYC" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_career_salary_range"><?php esc_html_e( 'Compensation Package', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_career_salary_range" name="_agency_career_salary_range" value="<?php echo esc_attr( $salary ); ?>" placeholder="e.g. $120k – $150k" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_career_experience"><?php esc_html_e( 'Experience Level', 'digital-agency' ); ?></label>
                    <input type="text" id="_agency_career_experience" name="_agency_career_experience" value="<?php echo esc_attr( $experience ); ?>" placeholder="e.g. 5+ Years" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_career_apply_email"><?php esc_html_e( 'Application Recipient Email', 'digital-agency' ); ?></label>
                    <input type="email" id="_agency_career_apply_email" name="_agency_career_apply_email" value="<?php echo esc_attr( $apply_email ); ?>" placeholder="careers@agency.com" />
                </div>
                <div class="agency-admin-field">
                    <label for="_agency_career_status"><?php esc_html_e( 'Hiring Status', 'digital-agency' ); ?></label>
                    <select id="_agency_career_status" name="_agency_career_status">
                        <option value="Open" <?php selected( $status, 'Open' ); ?>><?php esc_html_e( 'Open / Accepting Applications', 'digital-agency' ); ?></option>
                        <option value="Urgent" <?php selected( $status, 'Urgent' ); ?>><?php esc_html_e( 'Urgent Priority Hiring', 'digital-agency' ); ?></option>
                        <option value="Closed" <?php selected( $status, 'Closed' ); ?>><?php esc_html_e( 'Closed / Filled', 'digital-agency' ); ?></option>
                    </select>
                </div>
            </div>
            <div style="margin-top:16px;">
                <label style="font-weight:600;font-size:13px;display:flex;align-items:center;gap:8px;cursor:pointer;">
                    <input type="checkbox" name="_agency_career_featured" value="1" <?php checked( $featured, true ); ?> />
                    <?php esc_html_e( 'Feature as Key Opportunity on Homepage & Careers Banner', 'digital-agency' ); ?>
                </label>
            </div>
        </div>

        <!-- Section 2: Core Responsibilities -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-list-view"></span>
                    <?php esc_html_e( 'Core Responsibilities', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-repeatable-wrapper">
                <ul class="agency-repeatable-list">
                    <?php if ( ! empty( $resp ) ) : ?>
                        <?php foreach ( $resp as $item ) : ?>
                            <li class="agency-repeatable-row">
                                <input type="text" name="_agency_career_responsibilities_items[]" value="<?php echo esc_attr( $item ); ?>" class="agency-repeatable-input" placeholder="<?php esc_attr_e( 'e.g. Architect scalable Full Site Editing themes', 'digital-agency' ); ?>" />
                                <button type="button" class="agency-repeatable-remove" data-repeatable-remove aria-label="<?php esc_attr_e( 'Remove item', 'digital-agency' ); ?>">&times;</button>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <button type="button" class="agency-repeatable-add" data-repeatable-add data-field-name="_agency_career_responsibilities_items" data-placeholder="<?php esc_attr_e( 'e.g. Lead code architecture and technical reviews', 'digital-agency' ); ?>">
                    <span class="dashicons dashicons-plus"></span>
                    <?php esc_html_e( 'Add Responsibility', 'digital-agency' ); ?>
                </button>
            </div>
        </div>

        <!-- Section 3: Qualifications & Requirements -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-welcome-learn-more"></span>
                    <?php esc_html_e( 'Qualifications & Experience Requirements', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-repeatable-wrapper">
                <ul class="agency-repeatable-list">
                    <?php if ( ! empty( $req ) ) : ?>
                        <?php foreach ( $req as $item ) : ?>
                            <li class="agency-repeatable-row">
                                <input type="text" name="_agency_career_requirements_items[]" value="<?php echo esc_attr( $item ); ?>" class="agency-repeatable-input" placeholder="<?php esc_attr_e( 'e.g. 5+ years experience in WordPress engineering', 'digital-agency' ); ?>" />
                                <button type="button" class="agency-repeatable-remove" data-repeatable-remove aria-label="<?php esc_attr_e( 'Remove item', 'digital-agency' ); ?>">&times;</button>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <button type="button" class="agency-repeatable-add" data-repeatable-add data-field-name="_agency_career_requirements_items" data-placeholder="<?php esc_attr_e( 'e.g. Deep knowledge of Gutenberg block APIs', 'digital-agency' ); ?>">
                    <span class="dashicons dashicons-plus"></span>
                    <?php esc_html_e( 'Add Qualification', 'digital-agency' ); ?>
                </button>
            </div>
        </div>

        <!-- Section 4: Desired Skills -->
        <div class="agency-admin-section">
            <div class="agency-admin-section-header">
                <h4 class="agency-admin-section-title">
                    <span class="dashicons dashicons-category"></span>
                    <?php esc_html_e( 'Desired Skills & Tech Stack', 'digital-agency' ); ?>
                </h4>
            </div>
            <div class="agency-repeatable-wrapper">
                <ul class="agency-repeatable-list">
                    <?php if ( ! empty( $skills ) ) : ?>
                        <?php foreach ( $skills as $item ) : ?>
                            <li class="agency-repeatable-row">
                                <input type="text" name="_agency_career_skills_items[]" value="<?php echo esc_attr( $item ); ?>" class="agency-repeatable-input" placeholder="<?php esc_attr_e( 'e.g. Modern PHP 8, Semantic HTML, CSS Custom Properties', 'digital-agency' ); ?>" />
                                <button type="button" class="agency-repeatable-remove" data-repeatable-remove aria-label="<?php esc_attr_e( 'Remove item', 'digital-agency' ); ?>">&times;</button>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <button type="button" class="agency-repeatable-add" data-repeatable-add data-field-name="_agency_career_skills_items" data-placeholder="<?php esc_attr_e( 'e.g. React / Gutenberg Block Development', 'digital-agency' ); ?>">
                    <span class="dashicons dashicons-plus"></span>
                    <?php esc_html_e( 'Add Skill / Technology', 'digital-agency' ); ?>
                </button>
            </div>
        </div>

    </div>
    <?php
}

// =============================================================================
// 4. SECURE POST META SAVE HANDLER
// =============================================================================

function digital_agency_save_post_meta( int $post_id ): void {
    // 1. Verify Nonce
    if ( ! isset( $_POST['digital_agency_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['digital_agency_meta_nonce'] ) ), 'digital_agency_save_meta' ) ) {
        return;
    }

    // 2. Prevent Autosave overwrite
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // 3. Prevent Revision overwrite
    if ( wp_is_post_revision( $post_id ) ) {
        return;
    }

    // 4. Check User Permissions
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $post_type = get_post_type( $post_id );

    // -------------------------------------------------------------------------
    // 4.1 Save Service Meta
    // -------------------------------------------------------------------------
    if ( 'service' === $post_type ) {
        $scalar_fields = array(
            '_agency_service_starting_price'  => 'sanitize_text_field',
            '_agency_service_timeline'        => 'sanitize_text_field',
            '_agency_service_highlight_badge' => 'sanitize_text_field',
            '_agency_service_video_url'       => 'esc_url_raw',
        );
        foreach ( $scalar_fields as $key => $sanitizer ) {
            if ( isset( $_POST[ $key ] ) ) {
                update_post_meta( $post_id, $key, call_user_func( $sanitizer, wp_unslash( $_POST[ $key ] ) ) );
            }
        }
        update_post_meta( $post_id, '_agency_service_featured', isset( $_POST['_agency_service_featured'] ) ? 1 : 0 );

        // Gallery JSON
        if ( isset( $_POST['_agency_service_gallery_json'] ) ) {
            $raw = json_decode( sanitize_text_field( wp_unslash( $_POST['_agency_service_gallery_json'] ) ), true );
            $ids = array_filter( array_map( 'absint', (array) ( $raw ?: array() ) ) );
            update_post_meta( $post_id, '_agency_service_gallery', wp_json_encode( array_values( $ids ) ) );
        }

        // Repeatable Deliverables
        if ( isset( $_POST['_agency_service_included_items'] ) && is_array( $_POST['_agency_service_included_items'] ) ) {
            $items = array_values( array_filter( array_map( 'sanitize_text_field', wp_unslash( $_POST['_agency_service_included_items'] ) ) ) );
            update_post_meta( $post_id, '_agency_service_included', wp_json_encode( $items ) );
        }

        // Repeatable Expertise
        if ( isset( $_POST['_agency_service_expertise_items'] ) && is_array( $_POST['_agency_service_expertise_items'] ) ) {
            $items = array_values( array_filter( array_map( 'sanitize_text_field', wp_unslash( $_POST['_agency_service_expertise_items'] ) ) ) );
            update_post_meta( $post_id, '_agency_service_expertise', wp_json_encode( $items ) );
        }

        // Repeatable Benefits
        if ( isset( $_POST['_agency_service_benefits_items'] ) && is_array( $_POST['_agency_service_benefits_items'] ) ) {
            $items = array_values( array_filter( array_map( 'sanitize_text_field', wp_unslash( $_POST['_agency_service_benefits_items'] ) ) ) );
            update_post_meta( $post_id, '_agency_service_benefits', wp_json_encode( $items ) );
        }
    }

    // -------------------------------------------------------------------------
    // 4.2 Save Project Meta
    // -------------------------------------------------------------------------
    if ( 'project' === $post_type ) {
        $scalar_fields = array(
            '_agency_project_client'         => 'sanitize_text_field',
            '_agency_project_year'           => 'sanitize_text_field',
            '_agency_project_country'        => 'sanitize_text_field',
            '_agency_project_url'            => 'esc_url_raw',
            '_agency_project_video_url'      => 'esc_url_raw',
            '_agency_project_impact_metric'  => 'sanitize_text_field',
            '_agency_project_metric_label'   => 'sanitize_text_field',
            '_agency_project_challenge'      => 'wp_kses_post',
            '_agency_project_strategy'       => 'wp_kses_post',
            '_agency_project_solution'       => 'wp_kses_post',
            '_agency_project_results'        => 'wp_kses_post',
            '_agency_project_testimonial_id' => 'absint',
        );
        foreach ( $scalar_fields as $key => $sanitizer ) {
            if ( isset( $_POST[ $key ] ) ) {
                update_post_meta( $post_id, $key, call_user_func( $sanitizer, wp_unslash( $_POST[ $key ] ) ) );
            }
        }
        update_post_meta( $post_id, '_agency_project_featured', isset( $_POST['_agency_project_featured'] ) ? 1 : 0 );

        // Gallery JSON
        if ( isset( $_POST['_agency_project_gallery_json'] ) ) {
            $raw = json_decode( sanitize_text_field( wp_unslash( $_POST['_agency_project_gallery_json'] ) ), true );
            $ids = array_filter( array_map( 'absint', (array) ( $raw ?: array() ) ) );
            update_post_meta( $post_id, '_agency_project_gallery', wp_json_encode( array_values( $ids ) ) );
        }
    }

    // -------------------------------------------------------------------------
    // 4.3 Save Team Member Meta
    // -------------------------------------------------------------------------
    if ( 'team_member' === $post_type ) {
        $scalar_fields = array(
            '_agency_team_position' => 'sanitize_text_field',
            '_agency_team_email'    => 'sanitize_email',
            '_agency_team_phone'    => 'sanitize_text_field',
            '_agency_team_linkedin' => 'esc_url_raw',
            '_agency_team_twitter'  => 'esc_url_raw',
            '_agency_team_github'   => 'esc_url_raw',
        );
        foreach ( $scalar_fields as $key => $sanitizer ) {
            if ( isset( $_POST[ $key ] ) ) {
                update_post_meta( $post_id, $key, call_user_func( $sanitizer, wp_unslash( $_POST[ $key ] ) ) );
            }
        }
        update_post_meta( $post_id, '_agency_team_featured', isset( $_POST['_agency_team_featured'] ) ? 1 : 0 );

        // Repeatable Skills with Clamped Percentage
        if ( isset( $_POST['_agency_team_skill_name'] ) && is_array( $_POST['_agency_team_skill_name'] ) ) {
            $names = wp_unslash( $_POST['_agency_team_skill_name'] );
            $pcts  = isset( $_POST['_agency_team_skill_pct'] ) ? wp_unslash( $_POST['_agency_team_skill_pct'] ) : array();
            $skills = array();

            foreach ( $names as $i => $name ) {
                $name_clean = sanitize_text_field( trim( (string) $name ) );
                if ( empty( $name_clean ) ) {
                    continue;
                }
                $pct_val = isset( $pcts[ $i ] ) ? min( 100, max( 0, absint( $pcts[ $i ] ) ) ) : 90;
                $skills[] = array(
                    'name'       => $name_clean,
                    'percentage' => $pct_val,
                );
            }
            update_post_meta( $post_id, '_agency_team_skills', wp_json_encode( $skills ) );
        }
    }

    // -------------------------------------------------------------------------
    // 4.4 Save Career Meta
    // -------------------------------------------------------------------------
    if ( 'career' === $post_type ) {
        $scalar_fields = array(
            '_agency_career_job_type'     => 'sanitize_text_field',
            '_agency_career_location'     => 'sanitize_text_field',
            '_agency_career_salary_range' => 'sanitize_text_field',
            '_agency_career_experience'   => 'sanitize_text_field',
            '_agency_career_apply_email'  => 'sanitize_email',
            '_agency_career_status'       => 'sanitize_text_field',
        );
        foreach ( $scalar_fields as $key => $sanitizer ) {
            if ( isset( $_POST[ $key ] ) ) {
                update_post_meta( $post_id, $key, call_user_func( $sanitizer, wp_unslash( $_POST[ $key ] ) ) );
            }
        }
        update_post_meta( $post_id, '_agency_career_featured', isset( $_POST['_agency_career_featured'] ) ? 1 : 0 );

        // Repeatable Responsibilities
        if ( isset( $_POST['_agency_career_responsibilities_items'] ) && is_array( $_POST['_agency_career_responsibilities_items'] ) ) {
            $items = array_values( array_filter( array_map( 'sanitize_text_field', wp_unslash( $_POST['_agency_career_responsibilities_items'] ) ) ) );
            update_post_meta( $post_id, '_agency_career_responsibilities', wp_json_encode( $items ) );
        }

        // Repeatable Requirements
        if ( isset( $_POST['_agency_career_requirements_items'] ) && is_array( $_POST['_agency_career_requirements_items'] ) ) {
            $items = array_values( array_filter( array_map( 'sanitize_text_field', wp_unslash( $_POST['_agency_career_requirements_items'] ) ) ) );
            update_post_meta( $post_id, '_agency_career_requirements', wp_json_encode( $items ) );
        }

        // Repeatable Skills
        if ( isset( $_POST['_agency_career_skills_items'] ) && is_array( $_POST['_agency_career_skills_items'] ) ) {
            $items = array_values( array_filter( array_map( 'sanitize_text_field', wp_unslash( $_POST['_agency_career_skills_items'] ) ) ) );
            update_post_meta( $post_id, '_agency_career_skills', wp_json_encode( $items ) );
        }
    }

    // -------------------------------------------------------------------------
    // 4.5 Save Testimonial Meta
    // -------------------------------------------------------------------------
    if ( 'testimonial' === $post_type ) {
        $scalar_fields = array(
            '_agency_testimonial_author'  => 'sanitize_text_field',
            '_agency_testimonial_company' => 'sanitize_text_field',
            '_agency_testimonial_role'    => 'sanitize_text_field',
        );
        foreach ( $scalar_fields as $key => $sanitizer ) {
            if ( isset( $_POST[ $key ] ) ) {
                update_post_meta( $post_id, $key, call_user_func( $sanitizer, wp_unslash( $_POST[ $key ] ) ) );
            }
        }
        if ( isset( $_POST['_agency_testimonial_rating'] ) ) {
            $rating_val = min( 5, max( 1, absint( $_POST['_agency_testimonial_rating'] ) ) );
            update_post_meta( $post_id, '_agency_testimonial_rating', $rating_val );
        }
        update_post_meta( $post_id, '_agency_testimonial_featured', isset( $_POST['_agency_testimonial_featured'] ) ? 1 : 0 );
    }

    // -------------------------------------------------------------------------
    // 4.6 Save Pricing Plan Meta
    // -------------------------------------------------------------------------
    if ( 'pricing_plan' === $post_type ) {
        $scalar_fields = array(
            '_agency_plan_price'          => 'sanitize_text_field',
            '_agency_plan_billing_period' => 'sanitize_text_field',
            '_agency_plan_badge'          => 'sanitize_text_field',
            '_agency_plan_button_text'    => 'sanitize_text_field',
            '_agency_plan_button_url'     => 'sanitize_text_field',
        );
        foreach ( $scalar_fields as $key => $sanitizer ) {
            if ( isset( $_POST[ $key ] ) ) {
                update_post_meta( $post_id, $key, call_user_func( $sanitizer, wp_unslash( $_POST[ $key ] ) ) );
            }
        }
        update_post_meta( $post_id, '_agency_plan_featured', isset( $_POST['_agency_plan_featured'] ) ? 1 : 0 );

        // Repeatable Features
        if ( isset( $_POST['_agency_plan_features_items'] ) && is_array( $_POST['_agency_plan_features_items'] ) ) {
            $items = array_values( array_filter( array_map( 'sanitize_text_field', wp_unslash( $_POST['_agency_plan_features_items'] ) ) ) );
            update_post_meta( $post_id, '_agency_plan_features', wp_json_encode( $items ) );
        }
    }
}
add_action( 'save_post', 'digital_agency_save_post_meta' );

// =============================================================================
// 5. ADMIN LIST TABLES, CUSTOM COLUMNS & SORTABLE HEADERS
// =============================================================================

// 5.1 Service Columns
function digital_agency_service_columns( array $columns ): array {
    $new = array();
    foreach ( $columns as $k => $v ) {
        $new[ $k ] = $v;
        if ( 'title' === $k ) {
            $new['service_price']    = __( 'Starting Retainer', 'digital-agency' );
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

// 5.2 Project Columns
function digital_agency_project_columns( array $columns ): array {
    $new = array();
    foreach ( $columns as $k => $v ) {
        $new[ $k ] = $v;
        if ( 'title' === $k ) {
            $new['project_client']   = __( 'Client', 'digital-agency' );
            $new['project_year']     = __( 'Year', 'digital-agency' );
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
    } elseif ( 'project_year' === $column ) {
        echo esc_html( get_post_meta( $post_id, '_agency_project_year', true ) ?: '—' );
    } elseif ( 'project_impact' === $column ) {
        $impact = get_post_meta( $post_id, '_agency_project_impact_metric', true );
        echo $impact ? '<strong style="color:#0284c7;">' . esc_html( $impact ) . '</strong>' : '—';
    } elseif ( 'project_featured' === $column ) {
        echo get_post_meta( $post_id, '_agency_project_featured', true ) ? '<span style="color:#10b981;font-weight:bold;">✦ Yes</span>' : '—';
    }
}
add_action( 'manage_project_posts_custom_column', 'digital_agency_project_custom_column', 10, 2 );

// 5.3 Team Columns
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

// 5.4 Career Columns
function digital_agency_career_columns( array $columns ): array {
    $new = array();
    foreach ( $columns as $k => $v ) {
        $new[ $k ] = $v;
        if ( 'title' === $k ) {
            $new['career_type']     = __( 'Type', 'digital-agency' );
            $new['career_location'] = __( 'Location', 'digital-agency' );
            $new['career_status']   = __( 'Status', 'digital-agency' );
            $new['career_featured'] = __( 'Featured', 'digital-agency' );
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
        echo '<span style="color:' . esc_attr( $color ) . ';font-weight:700;">' . esc_html( $status ) . '</span>';
    } elseif ( 'career_featured' === $column ) {
        echo get_post_meta( $post_id, '_agency_career_featured', true ) ? '<span style="color:#10b981;font-weight:bold;">✦ Yes</span>' : '—';
    }
}
add_action( 'manage_career_posts_custom_column', 'digital_agency_career_custom_column', 10, 2 );

// 5.5 Testimonial Columns
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
        $rating = min( 5, max( 1, (int) ( get_post_meta( $post_id, '_agency_testimonial_rating', true ) ?: 5 ) ) );
        echo '<span style="color:#f59e0b;font-size:14px;">' . esc_html( str_repeat( '★', $rating ) . str_repeat( '☆', 5 - $rating ) ) . '</span>';
    } elseif ( 'testi_featured' === $column ) {
        echo get_post_meta( $post_id, '_agency_testimonial_featured', true ) ? '<span style="color:#10b981;font-weight:bold;">✦ Yes</span>' : '—';
    }
}
add_action( 'manage_testimonial_posts_custom_column', 'digital_agency_testimonial_custom_column', 10, 2 );

// 5.6 Pricing Plan Columns
function digital_agency_pricing_plan_columns( array $columns ): array {
    $new = array();
    foreach ( $columns as $k => $v ) {
        $new[ $k ] = $v;
        if ( 'title' === $k ) {
            $new['plan_price']    = __( 'Price / Cadence', 'digital-agency' );
            $new['plan_badge']    = __( 'Badge', 'digital-agency' );
            $new['plan_featured'] = __( 'Featured (Lime Glow)', 'digital-agency' );
            $new['plan_order']    = __( 'Menu Order', 'digital-agency' );
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
    } elseif ( 'plan_order' === $column ) {
        $post = get_post( $post_id );
        echo esc_html( $post->menu_order ?? 0 );
    }
}
add_action( 'manage_pricing_plan_posts_custom_column', 'digital_agency_pricing_plan_custom_column', 10, 2 );

// -----------------------------------------------------------------------------
// 5.7 Sortable Columns Registration & Query Handling
// -----------------------------------------------------------------------------

function digital_agency_sortable_columns( array $columns ): array {
    $columns['plan_order']   = 'menu_order';
    $columns['testi_rating'] = 'testi_rating';
    $columns['project_year'] = 'project_year';
    return $columns;
}
add_filter( 'manage_edit-pricing_plan_sortable_columns', 'digital_agency_sortable_columns' );
add_filter( 'manage_edit-testimonial_sortable_columns', 'digital_agency_sortable_columns' );
add_filter( 'manage_edit-project_sortable_columns', 'digital_agency_sortable_columns' );

function digital_agency_sortable_column_orderby( WP_Query $query ): void {
    if ( ! is_admin() || ! $query->is_main_query() ) {
        return;
    }

    $orderby = $query->get( 'orderby' );

    if ( 'testi_rating' === $orderby ) {
        $query->set( 'meta_key', '_agency_testimonial_rating' );
        $query->set( 'orderby', 'meta_value_num' );
    } elseif ( 'project_year' === $orderby ) {
        $query->set( 'meta_key', '_agency_project_year' );
        $query->set( 'orderby', 'meta_value' );
    }
}
add_action( 'pre_get_posts', 'digital_agency_sortable_column_orderby' );

// -----------------------------------------------------------------------------
// 5.8 Admin Taxonomy Dropdown Filters
// -----------------------------------------------------------------------------

function digital_agency_restrict_manage_posts( string $post_type ): void {
    if ( 'service' === $post_type ) {
        $taxonomy = 'service_category';
        $selected = isset( $_GET[ $taxonomy ] ) ? sanitize_text_field( wp_unslash( $_GET[ $taxonomy ] ) ) : '';
        $info_taxonomy = get_taxonomy( $taxonomy );
        if ( $info_taxonomy ) {
            wp_dropdown_categories( array(
                'show_option_all' => sprintf( __( 'All %s', 'digital-agency' ), $info_taxonomy->label ),
                'taxonomy'        => $taxonomy,
                'name'            => $taxonomy,
                'orderby'         => 'name',
                'selected'        => $selected,
                'show_count'      => true,
                'hide_empty'      => false,
                'value_field'     => 'slug',
            ) );
        }
    } elseif ( 'project' === $post_type ) {
        $taxonomy = 'project_category';
        $selected = isset( $_GET[ $taxonomy ] ) ? sanitize_text_field( wp_unslash( $_GET[ $taxonomy ] ) ) : '';
        $info_taxonomy = get_taxonomy( $taxonomy );
        if ( $info_taxonomy ) {
            wp_dropdown_categories( array(
                'show_option_all' => sprintf( __( 'All %s', 'digital-agency' ), $info_taxonomy->label ),
                'taxonomy'        => $taxonomy,
                'name'            => $taxonomy,
                'orderby'         => 'name',
                'selected'        => $selected,
                'show_count'      => true,
                'hide_empty'      => false,
                'value_field'     => 'slug',
            ) );
        }
    } elseif ( in_array( $post_type, array( 'team_member', 'career' ), true ) ) {
        $taxonomy = 'department';
        $selected = isset( $_GET[ $taxonomy ] ) ? sanitize_text_field( wp_unslash( $_GET[ $taxonomy ] ) ) : '';
        $info_taxonomy = get_taxonomy( $taxonomy );
        if ( $info_taxonomy ) {
            wp_dropdown_categories( array(
                'show_option_all' => sprintf( __( 'All %s', 'digital-agency' ), $info_taxonomy->label ),
                'taxonomy'        => $taxonomy,
                'name'            => $taxonomy,
                'orderby'         => 'name',
                'selected'        => $selected,
                'show_count'      => true,
                'hide_empty'      => false,
                'value_field'     => 'slug',
            ) );
        }
    }
}
add_action( 'restrict_manage_posts', 'digital_agency_restrict_manage_posts' );

// =============================================================================
// 6. REST API FIRST-CLASS STRUCTURED FIELDS
// =============================================================================

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
