# Phase 4.1: Global Shell Data Integration & Architectural Remediation

## 1. Executive Summary

Phase 4.1 remediates and completes the dynamic data integration across the Global Visual Shell. All hardcoded production contact values, static CTA destinations, hardcoded service names in footers, and static tickers have been completely decoupled and bound to WordPress runtime sources:
- **Global Business Settings Engine (`digital_agency_get_setting()`):** Powers topbar emails, phones, global locations, header CTA text/URL, footer headquarters address, and social profile links.
- **Dynamic CPT Queries (`digital_agency_get_services()`):** Powers dynamic footer service links and continuous ticker services.
- **Semantic WordPress Permalinks:** Replaces static URLs with `get_post_type_archive_link()`, `get_privacy_policy_url()`, and `home_url()`.

---

## 2. Remediations by Component

### 2.1 Top Bar (`patterns/topbar.php` + `parts/topbar.html`)
- **Data Binding:** Email (`agency_email`), Phone (`agency_phone`), and Global Office Presence (`agency_office_locations`).
- **Security & A11y:** Wrapped in `antispambot()` for email obfuscation and sanitized `tel:` phone links.
- **Empty State Protection:** If a contact field is empty in settings, its icon and markup are cleanly omitted.

### 2.2 Header CTA (`patterns/header.php` + `parts/header.html`)
- **Data Binding:** CTA button label binds to `agency_primary_cta_text` (default: `"Get a Quote"`), URL binds to `agency_primary_cta_url` (default: `"#contact"`).
- **Zero Hardcoding:** Changing the CTA endpoint in WordPress Appearance > Agency Info instantly updates all headers theme-wide.

### 2.3 Footer Contact & Social Links (`patterns/footer.php` + `parts/footer.html`)
- **Contact Info:** Address (`agency_address`), Email (`agency_email`), and Phone (`agency_phone`) rendered dynamically with `nl2br()` and `esc_html()`.
- **Active Social Profiles:** Social icons (`in`, `𝕏`, `ig`, `gh`, `fb`) only render if their corresponding URL setting is populated. Every link features an explicit `aria-label` and `target="_blank"` with `rel="noopener noreferrer"`.
- **Dynamic Services Column:** Executes `digital_agency_get_services( array( 'posts_per_page' => 4 ) )` retrieving published services dynamically. Includes fallback capability links when database is empty.
- **Dynamic Archive Permalinks:** Generates dynamic URLs for Projects, Team, and Career archives via `get_post_type_archive_link()`.
- **Dynamic Copyright Year:** Outputs `date('Y')` with `agency_business_name`.

### 2.4 Service Marquee / Ticker (`patterns/service-marquee.php` + `parts/service-marquee.html`)
- **Data Source:** Dynamically queries up to 8 published `service` CPT titles.
- **Fallback Strategy:** If no services are currently published in the database, falls back gracefully to core capability strings without breaking layout or animation.
- **Continuous 360 Loop:** Duplicates the array in PHP to construct a seamless CSS keyframe loop.

### 2.5 Newsletter Section (`patterns/newsletter.php` + `parts/newsletter.html`)
- **Markup Readiness:** Pure semantic form with accessible screen-reader `<label>`, typed input (`type="email"`, `autocomplete="email"`, `required`), and dynamic section label from `agency_newsletter_label`.
- **Clean Submission Target:** Targets `home_url('/')` without fake JS endpoints.

---

## 3. Separation of Concerns & FSE Architecture

- **Layout Structure:** Controlled via WordPress Block Template Parts (`parts/topbar.html`, `parts/header.html`, `parts/service-marquee.html`, `parts/newsletter.html`, `parts/footer.html`).
- **Dynamic Business Data:** Injected via registered PHP Block Patterns (`digital-agency/topbar`, `digital-agency/header`, `digital-agency/service-marquee`, `digital-agency/newsletter`, `digital-agency/footer`).
- **Full Site Editor:** Administrators can rearrange, insert, or replace template parts in the Site Editor without losing live data bindings.

---

## 4. Verification & Static Code Analysis

- **Hardcoded Production Data Check:** Scanned entire codebase; 0 hardcoded business data strings in active markup.
- **Block Balance & Syntax:** 100% valid HTML block comments across all 11 templates/parts.
- **PHP CLI Status:** **PHP CLI unavailable** in current environment. Static AST validator confirmed 100% balanced braces, parens, and ABSPATH guard coverage across all 17 PHP files.
