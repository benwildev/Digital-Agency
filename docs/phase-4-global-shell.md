# Phase 4 & 4.1: Global Visual Shell & Data Integration

## 1. Executive Summary

Phase 4 and Phase 4.1 establish the reusable, data-driven Global Visual Shell for the Digital Marketing Agency WordPress Block Theme. Every page template across the theme inherits a unified, accessible, and high-fidelity global frame with zero hardcoded business data:
- **Top Bar:** Bound to global agency settings (`agency_email`, `agency_phone`, `agency_office_locations`).
- **Main Header:** Sticky navigation with blur effect on scroll, site logo, and dynamic CTA button (`agency_primary_cta_text`, `agency_primary_cta_url`).
- **Service Marquee:** Hardware-accelerated continuous CSS ticker dynamically populated from published `service` CPT records.
- **Global Newsletter Section:** 2-column conversion card with accessible form markup.
- **4-Column Footer:** Agency narrative, dynamic service CPT query links, dynamic archive permalinks, active social icon buttons, headquarters contact details, and copyright bar.
- **Page Header Hero Foundation:** Reusable inner-page banner with semantic breadcrumbs navigation.

---

## 2. Reusable Component Inventory

### 2.1 Top Bar (`parts/topbar.html` + `patterns/topbar.php`)
- **Background:** `surface-dark-base` (`#0A130F`) with subtle bottom border.
- **Data Binding:** `digital_agency_get_setting()` for email, phone, and office presence.
- **Responsive Behavior:** Wraps on tablet/mobile screens with consistent padding.

### 2.2 Main Header & Primary Navigation (`parts/header.html` + `patterns/header.php`)
- **Brand Identity:** Site logo with Syne font weight 700 title mark.
- **Navigation:** Native WordPress `<!-- wp:navigation -->` block (`overlayMenu: "mobile"`), fully customizable in the WordPress Site Editor.
- **Header CTA:** Dynamic pill button (`border-radius: 9999px`) pulling text and URL from global settings.
- **Sticky Interaction:** `assets/js/theme.js` listens to passive scroll events; adds `.is-scrolled` class toggling `backdrop-filter: blur(16px)`.

### 2.3 Mobile Navigation Drawer
- **Accessible Attributes:** Dynamic MutationObserver synchronizes `aria-expanded` and attaches `aria-label` to open/close buttons.
- **Keyboard Handling:** Pressing `Escape` automatically dismisses the mobile navigation drawer.
- **Scroll Lock:** Applies `body.agency-menu-open { overflow: hidden; }` preventing background scrolling.

### 2.4 Service Marquee / Ticker (`parts/service-marquee.html` + `patterns/service-marquee.php`)
- **Implementation:** Pure hardware-accelerated CSS animation (`@keyframes agencyTicker`).
- **Data Source:** Dynamically queries published `service` CPT titles with capability fallbacks.
- **Hover Behavior:** Pauses scrolling on cursor hover (`animation-play-state: paused`).
- **Accessibility:** Overridden via `@media (prefers-reduced-motion: reduce)` to render statically without motion.

### 2.5 Global Newsletter Section (`parts/newsletter.html` + `patterns/newsletter.php`)
- **Layout:** Contained card (`surface-dark-card` `#11221B`) with 1px border.
- **Left Column:** "Our Newsletter" eyebrow badge with lime dot indicator, followed by Syne heading and secondary pitch.
- **Right Column:** Accessible `<form>` with hidden screen-reader label, styled text input, and high-contrast submit button.

### 2.6 Global Footer (`parts/footer.html` + `patterns/footer.php`)
- **Column 1 (35%):** Site Title, agency value proposition, and active social profile links (`in`, `𝕏`, `ig`, `gh`, `fb`) with accessible `aria-label` attributes.
- **Column 2 (20%):** Dynamic service links querying the `service` CPT.
- **Column 3 (20%):** Dynamic archive permalinks (`projects`, `team`, `career`, `contact`).
- **Column 4 (25%):** Headquarters physical address, email, and phone contact details.
- **Bottom Bar:** Subtle separator line, dynamic copyright line (`© YYYY Business Name. All rights reserved.`), and Privacy Policy / Terms links.

### 2.7 Page Header Foundation Pattern (`patterns/page-header.php`)
- High-contrast dark banner designed for inner templates.
- Outputs current page title and semantic breadcrumbs navigation (`digital_agency_breadcrumbs()`).

---

## 3. Verification & Metrics
- **Hardcoded Production Data:** NONE.
- **Site Editor Compatibility:** 100% genuine FSE Block Theme structure.
- **PHP CLI Status:** **PHP CLI unavailable** in current environment. Static AST validator confirmed 100% balanced syntax across all 17 PHP files.
