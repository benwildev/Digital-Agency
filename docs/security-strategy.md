# WordPress Security & Data Integrity Strategy

## 1. Core Security Principles

Security is baked into the theme architecture, guaranteeing defense-in-depth across input handling, output rendering, asynchronous requests, and user permissions.

---

## 2. Input Sanitization Protocols

Every parameter received via `$_POST`, `$_GET`, or REST payload must pass through strict sanitization filters prior to processing or database persistence:

```php
// Lead Form Payload Sanitization Matrix
$full_name = isset( $_POST['client_name'] ) ? sanitize_text_field( wp_unslash( $_POST['client_name'] ) ) : '';
$email     = isset( $_POST['client_email'] ) ? sanitize_email( wp_unslash( $_POST['client_email'] ) ) : '';
$service   = isset( $_POST['service_needed'] ) ? sanitize_text_field( wp_unslash( $_POST['service_needed'] ) ) : '';
$budget    = isset( $_POST['budget_range'] ) ? sanitize_text_field( wp_unslash( $_POST['budget_range'] ) ) : '';
$message   = isset( $_POST['project_details'] ) ? sanitize_textarea_field( wp_unslash( $_POST['project_details'] ) ) : '';
```

---

## 3. Output Escaping Protocols

No variable is echoed without explicit contextual escaping:

| Context | Escaping Function | Example |
| :--- | :--- | :--- |
| **HTML Body / Text** | `esc_html__()` / `esc_html()` | `<h3 class="title"><?php echo esc_html( $service_title ); ?></h3>` |
| **HTML Attribute** | `esc_attr__()` / `esc_attr()` | `<input type="text" value="<?php echo esc_attr( $user_name ); ?>" />` |
| **Hyperlinks / URLs** | `esc_url()` | `<a href="<?php echo esc_url( $case_study_url ); ?>">View Project</a>` |
| **Rich HTML Content** | `wp_kses_post()` | `<div class="bio"><?php echo wp_kses_post( $team_bio ); ?></div>` |
| **JavaScript Injected Data**| `wp_json_encode()` | `const themeData = <?php echo wp_json_encode( $app_config ); ?>;` |

---

## 4. CSRF & Nonce Protection

1. **AJAX Form Handlers:** Every form renders a cryptographic nonce via `wp_nonce_field( 'agency_lead_action', 'agency_lead_nonce' )`.
2. **Server Verification:**
   ```php
   if ( ! check_ajax_referer( 'agency_lead_action', 'agency_lead_nonce', false ) ) {
       wp_send_json_error( array( 'message' => esc_html__( 'Security token expired. Please reload the page.', 'digital-agency' ) ), 403 );
       wp_die();
   }
   ```

---

## 5. Anti-Spam Honeypot & Rate Limiting

### 5.1 Invisible Honeypot Trap
A hidden input field is included in all contact/quote forms:
```html
<div style="position: absolute; left: -9999px; top: -9999px;" aria-hidden="true">
  <input type="text" name="agency_hp_field" tabindex="-1" autocomplete="off">
</div>
```
If `$_POST['agency_hp_field']` contains any value on submission, the bot is silently rejected without email dispatch.

### 5.2 IP-Based Submission Rate Limiting
To prevent automated spam flooding, client submissions are rate-limited via WordPress Transients:
```php
$user_ip = sanitize_text_field( $_SERVER['REMOTE_ADDR'] ?? '' );
$transient_key = 'agency_lead_limit_' . md5( $user_ip );

if ( get_transient( $transient_key ) ) {
    wp_send_json_error( array( 'message' => esc_html__( 'Too many requests. Please wait a few minutes.', 'digital-agency' ) ), 429 );
}

// Allow maximum 1 submission every 90 seconds per IP
set_transient( $transient_key, true, 90 );
```

---

## 6. REST API & Endpoint Security

All custom REST endpoints strictly implement `permission_callback`:
```php
register_rest_route( 'digital-agency/v1', '/submit-quote', array(
    'methods'             => 'POST',
    'callback'            => 'agency_rest_handle_quote_submission',
    'permission_callback' => '__return_true', // Public endpoint guarded by internal nonces and honeypots
) );
```
Admin or privileged endpoints enforce `current_user_can( 'manage_options' )`.
