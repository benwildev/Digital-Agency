# WordPress Theme Architecture Specification

## 1. Executive Summary & Architectural Paradigm

### 1.1 Theme Paradigm Selection: Modern WordPress Hybrid/Block Theme (FSE Native with Robust PHP Foundation)
For this commercial-grade **Digital Marketing Agency** theme, we specify a **Modern Block Theme (Full Site Editing / FSE)** architecture utilizing the latest WordPress Standards (WP 6.5–6.7+). 

#### Justification for Block Theme Architecture:
1. **Visual Fidelity & Native Block Patterns:** Modern agency layouts (interactive tickers/marquees, split grids, metrics counters, testimonial carousels, editorial case studies) are best composed using block patterns (`patterns/*.php`) combining Core Gutenberg blocks (`core/group`, `core/columns`, `core/query`, `core/heading`, `core/paragraph`, `core/image`, `core/cover`, `core/buttons`) with custom block bindings and targeted lightweight frontend interactivity.
2. **Standardized Design Tokens via `theme.json` (Schema v3):** Centralizes colors, fluid typography (`clamp()`), fluid spacing scales, layout container widths (`1200px` content, `1400px` wide, `100vw` full), border radii, and component shadows without bloated CSS frameworks.
3. **Site Editor Customizability for End Users:** Clients and site administrators can visually modify navigation menus, headers, footers, templates (`single-service.html`, `single-project.html`, `archive-team.html`), template parts (`header.html`, `footer.html`, `service-marquee.html`), and page layouts directly inside the WordPress Site Editor.
4. **Performance & Zero Unnecessary Overhead:** Native block themes load zero legacy jQuery dependencies, render minimal DOM wrapper bloat, leverage WordPress core script modules (`@wordpress/interactivity`), and achieve >95+ Google PageSpeed Insights / Core Web Vitals out-of-the-box.

---

## 2. Directory Structure Blueprint

```text
digital-agency-theme/
├── style.css                      # Theme declaration, core metadata, base fallback resets
├── theme.json                     # Theme JSON v3 (Tokens: colors, typography, spacing, layout, shadows)
├── functions.php                  # Theme initialization bootstrap & module loader
├── screenshot.png                 # Theme preview screenshot (1200x900px)
├── README.md                      # Developer and user documentation
│
├── templates/                     # Block Theme HTML Templates (Site Editor)
│   ├── index.html                 # Fallback template
│   ├── front-page.html            # Agency Homepage template
│   ├── page.html                  # Standard Static Page template
│   ├── single.html                # Single Blog Post template
│   ├── archive.html               # General Blog / Date / Category / Tag archive
│   ├── single-service.html        # Single Service detailed case template
│   ├── archive-service.html       # Services Directory archive template
│   ├── single-project.html        # Single Case Study / Project template
│   ├── archive-project.html       # Projects / Portfolio Directory template
│   ├── single-team.html           # Single Team Member profile template
│   ├── archive-team.html          # Team Directory archive template
│   ├── single-career.html         # Single Job Opening template
│   ├── archive-career.html        # Careers / Job Openings directory template
│   ├── page-about.html            # About Agency specialized page template
│   ├── page-pricing.html          # Pricing & Packages specialized page template
│   ├── page-contact.html          # Contact & Consultation specialized page template
│   ├── search.html                # Search Results template
│   └── 404.html                   # 404 Not Found template
│
├── parts/                         # Reusable Template Parts (Site Editor)
│   ├── header.html                # Main Navigation Header (Transparent & Sticky)
│   ├── header-minimal.html        # Minimal Header for Landing/Specialized pages
│   ├── topbar.html                # Contact info & social links top banner
│   ├── footer.html                # 4-Column Agency Footer with Newsletter & Badges
│   ├── service-marquee.html       # Continuous animated typography marquee
│   ├── page-hero.html             # Standard inner page hero header
│   └── post-meta.html             # Author, date, category meta bar
│
├── patterns/                      # Reusable PHP Block Patterns (Editable & Dynamic)
│   ├── hero-home.php              # Homepage Hero with Split Headline, CTA & Stats
│   ├── marquee-ticker.php         # Infinite horizontal ticker banner
│   ├── stats-metrics.php          # 4-Column metric counters
│   ├── services-grid.php          # Interactive agency service showcase cards
│   ├── services-preview.php       # Homepage 3-column service preview
│   ├── why-choose-us.php          # Value proposition with feature lists & graphic
│   ├── process-steps.php          # 4-Step agency execution methodology
│   ├── awards-recognition.php     # Honors, industry badges & client credentials
│   ├── projects-grid.php          # Filterable project portfolio cards
│   ├── projects-featured.php      # Large editorial case study highlights
│   ├── testimonials-slider.php    # Client reviews, quotes, ratings & avatars
│   ├── team-grid.php              # Leadership & staff cards with social links
│   ├── pricing-tables.php         # 3-Tier agency pricing with billing toggle
│   ├── faq-accordion.php          # Interactive collapsible Q&A list
│   ├── quote-form-cta.php         # Interactive lead capture consultation banner
│   ├── newsletter-box.php         # Email subscription component
│   ├── career-openings.php        # Job vacancy cards with badge filters
│   ├── contact-section.php        # Split layout contact info, map & inquiry form
│   └── related-projects.php       # Dynamic related project query block
│
├── assets/                        # Compiled Production Assets
│   ├── css/
│   │   ├── main.css               # Micro-enhancements, animations & critical resets
│   │   ├── editor.css             # Gutenberg editor match styles
│   │   └── print.css              # Print stylesheet
│   ├── js/
│   │   ├── theme.js               # Navigation, sticky header, smooth interactions
│   │   ├── ticker.js              # Lightweight marquee ticker controller
│   │   └── interactive-forms.js   # AJAX form validation & submission handler
│   ├── images/                    # Theme default assets, vectors, badges
│   │   ├── pattern-dots.svg       # Subtle background decorative vectors
│   │   ├── placeholder-team.webp  # Grayscale optimized placeholder
│   │   └── placeholder-work.webp  # Grayscale optimized project placeholder
│   └── fonts/                     # Self-hosted WOFF2 webfonts (Privacy & Perf)
│       ├── syne-bold.woff2
│       ├── syne-variable.woff2
│       ├── inter-regular.woff2
│       └── inter-medium.woff2
│
├── inc/                           # Backend Theme Engine & PHP Modules
│   ├── setup.php                  # Theme support, i18n, menus, image sizes
│   ├── assets.php                 # Enqueue scripts, styles, font preloading
│   ├── post-types.php             # CPT definitions (service, project, team, career)
│   ├── taxonomies.php             # Custom Taxonomies (service_cat, project_cat, department)
│   ├── custom-fields.php          # Post Meta registration & REST field exposure
│   ├── block-bindings.php         # WordPress 6.5+ Core Block Bindings for CPT meta
│   ├── block-patterns.php         # Pattern categories & programmatic registration
│   ├── dynamic-queries.php        # Custom query loops and pre_get_posts filters
│   ├── security.php               # Nonce verification, sanitization, REST hardening
│   ├── form-handlers.php          # AJAX consultation/quote lead submission
│   ├── template-functions.php     # Helper functions, breadcrumbs, reading time
│   └── admin/                     # Theme settings & onboarding dashboard
│       └── theme-options.php      # Customizer/Site Options bridge for agency meta
│
└── docs/                          # Comprehensive Architectural & Reverse-Engineering Specs
    ├── theme-architecture.md      # This document
    ├── visual-analysis.md         # Screenshot reverse engineering & visual metrics
    ├── design-system.md           # Tokens: colors, typography, spacing, shadows
    ├── component-inventory.md     # Full component breakdowns & responsiveness
    ├── template-map.md            # Template hierarchy & template part mapping
    ├── content-model.md           # CPTs, fields, taxonomies & relationship schemas
    ├── data-flow.md               # Dynamic data lifecycle from WP Admin to DOM
    ├── responsive-strategy.md     # Breakpoints, fluid layouts & adaptive UX
    ├── accessibility-strategy.md  # WCAG 2.1 AA standards, focus states, aria roles
    ├── performance-strategy.md    # 95+ Core Web Vitals, asset budgets, caching
    ├── security-strategy.md       # Sanitization, escaping, nonces, rate limiting
    └── implementation-plan.md     # Step-by-step Phase 2 roadmap & checklist
```

---

## 3. Core Principles & Coding Standards

1. **WordPress VIP & Core Standards:** Strict compliance with [WordPress Coding Standards (WPCS)](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/) for PHP 8.1+ / 8.2+ compatibility.
2. **Zero PHP Warning / Strict Mode:** All functions use type declarations, nullable checks, and defensiveness against missing metadata or unassigned terms.
3. **No Monolithic Plugins Required:** The theme delivers out-of-the-box structural functionality natively. It does not require Elementor, WPBakery, ACF Pro, or bloated third-party page builders to look and function exactly as designed.
4. **Decoupled Content Architecture:** Custom post types and custom taxonomies are engineered cleanly with fallback registration in `inc/post-types.php`, ensuring that if a companion functionality plugin is used in production, content data remains safe and portable.
5. **Security First:** 100% of user inputs sanitized (`sanitize_text_field`, `sanitize_email`, `wp_kses_post`), 100% of outputs escaped (`esc_html`, `esc_attr`, `esc_url`, `wp_kses_post`), with rigorous `check_ajax_referer` / `wp_verify_nonce` enforcement.

---

## 4. Technology Stack & Tooling

| Layer | Technology | Rationale |
| :--- | :--- | :--- |
| **Platform** | WordPress 6.5–6.7+ | Full support for Block Theme Architecture, `theme.json` v3, Block Bindings API |
| **Language (Backend)** | PHP 8.1 / 8.2 / 8.3 | High performance, typed properties, match expressions, modern syntax |
| **Templating** | Gutenberg FSE HTML & PHP Patterns | Standardized, future-proof, client-editable via Site Editor |
| **Styling** | `theme.json` + Modular CSS | Zero CSS framework overhead; fluid `clamp()` variables; custom utility layers |
| **Interactivity** | Modern ES6+ JavaScript Modules | Vanilla JS with standard browser APIs (`IntersectionObserver`, `fetch`, CSS animations) |
| **Typography** | Local WOFF2 Webfonts | Self-hosted Syne & Inter; zero external Google Fonts privacy/GDPR/latency overhead |
| **Form Handling** | Native `wp_ajax` / REST API | Asynchronous AJAX lead capture with Honeypot + Nonce validation |
