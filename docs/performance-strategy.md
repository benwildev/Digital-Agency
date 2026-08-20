# Performance Engineering & Core Web Vitals Strategy

## 1. Performance Goals & Budget

| Metric | Target | Optimization Technique |
| :--- | :--- | :--- |
| **LCP (Largest Contentful Paint)** | `< 1.2s` | Preloaded hero image, `fetchpriority="high"`, zero render-blocking JS |
| **INP (Interaction to Next Paint)**| `< 50ms` | Vanilla JS event delegation, zero heavy third-party tracking in critical path |
| **CLS (Cumulative Layout Shift)** | `< 0.02` | Explicit `width` and `height` on all image/SVG elements; reserve aspect ratios |
| **Total CSS Payload** | `< 45 KB` | Native `theme.json` + minimal modular CSS (Gzipped < 12 KB) |
| **Total JS Payload** | `< 25 KB` | Vanilla ES6+ modules (Gzipped < 8 KB); zero jQuery dependency |
| **Google PageSpeed Score** | `95–100` | Full compliance across Mobile and Desktop |

---

## 2. Image Optimization & Delivery

### 2.1 Registered Responsive Image Sizes (`inc/setup.php`)
```php
add_image_size( 'agency-hero', 1920, 1080, true );       // Full width hero backgrounds
add_image_size( 'agency-project-large', 1200, 750, true ); // Asymmetric project showcase
add_image_size( 'agency-card-thumbnail', 600, 400, true ); // Standard 3-column card
add_image_size( 'agency-team-portrait', 500, 650, true );  // High-res team portraits
add_image_size( 'agency-avatar', 120, 120, true );         // Testimonial avatars
```

### 2.2 Hero Image Priority vs. Below-The-Fold Lazy Loading
- **Hero Image (Above-the-fold):**
  - Rendered with `fetchpriority="high"`, `loading="eager"`, and `decoding="async"`.
  - Added `<link rel="preload" as="image">` in document `<head>` via `inc/assets.php`.
- **All other images (Below-the-fold):**
  - Rendered with native `loading="lazy"` and `decoding="async"`.

---

## 3. Font Loading & Privacy Strategy

1. **Zero External Google Font Requests:** All fonts (`Syne` and `Inter`) are self-hosted inside `assets/fonts/` as compressed `.woff2` files. This eliminates DNS lookups, TLS handshakes, and GDPR compliance risks.
2. **Preloading Critical Font Files:**
   ```html
   <link rel="preload" href="/assets/fonts/syne-bold.woff2" as="font" type="font/woff2" crossorigin>
   <link rel="preload" href="/assets/fonts/inter-regular.woff2" as="font" type="font/woff2" crossorigin>
   ```
3. **`font-display: swap`:** Configured in `theme.json` to prevent Flash of Invisible Text (FOIT).

---

## 4. Asset Enqueueing & Script Loading

1. **Script Deferral:** All frontend JavaScript files are enqueued with the `defer` strategy (WordPress 6.3+ `wp_enqueue_script` args):
   ```php
   wp_enqueue_script(
       'agency-theme-js',
       get_template_directory_uri() . '/assets/js/theme.js',
       array(),
       wp_get_theme()->get( 'Version' ),
       array( 'strategy' => 'defer', 'in_footer' => true )
   );
   ```
2. **Conditional Loading:** Specialized scripts (e.g. `interactive-forms.js`) are only enqueued on pages containing contact/quote forms (`is_page( 'contact' )` or has block pattern).
3. **Zero jQuery:** Theme frontend features zero jQuery dependencies.

---

## 5. Caching & Database Optimization

1. **`no_found_rows` Optimization:** All non-paginated query loops (e.g., Homepage services, team preview, featured projects) pass `'no_found_rows' => true` to skip `SQL_CALC_FOUND_ROWS`.
2. **Transient Caching for Complex Queries:** Reusable queries (such as agency stats, global awards, and testimonial lists) are cached via the Transients API for 12 hours and invalidated automatically on `save_post`.
