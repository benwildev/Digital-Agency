# Phase 2+ Implementation Roadmap & Risk Matrix

## 1. Architectural Risk Analysis & Mitigation

| Risk Area | Architectural Threat | Proactive Mitigation Strategy |
| :--- | :--- | :--- |
| **Plugin Bloat / Lock-in** | Reliance on heavy page builders (ACF Pro, Elementor) causes slow performance & upgrade breakage. | Use WordPress Native Block Theme (FSE), `theme.json` v3, Core Query Loops, and Native Post Meta with Block Bindings. |
| **Marquee Jank / CPU Spikes**| Infinite JavaScript interval loops cause scroll lag on lower-end mobile devices. | Implement pure CSS `@keyframes` transform with `will-change: transform` and automatic pause on `prefers-reduced-motion`. |
| **Monochrome Filter Performance**| CSS filters across dozens of high-res images can spike GPU/compositor memory. | Use hardware-accelerated CSS filters combined with optimized responsive `add_image_size()` WebP crops. |
| **Missing Content / Broken Layouts**| CPT posts without featured images or custom metadata breaking grid alignment. | Implement robust PHP fallback utilities (`has_post_thumbnail()`, default placeholders, conditional attribute wrappers). |
| **Spam Submission Abuse** | Open public quote/contact forms flooded by automated bots. | Double-layer defense: Cryptographic Nonces + Invisible Honeypot Trap + Transient-based IP Rate Limiting. |
| **SEO Canonical / Heading Collisions**| Multiple `<h1>` tags or missing schema markup harming search rankings. | Strictly enforce single `<h1>` per template, semantic HTML landmarks, and OpenGraph/Schema friendly metadata. |

---

## 2. Step-by-Step Implementation Sequence (Phase 2 Roadmap)

```
================================================================================
PHASE 2 IMPLEMENTATION SEQUENCE
================================================================================
```

### Stage 1: Core Foundation & Design System
- [ ] **Step 1: Theme Identity & Root Files**
  - Create `style.css` (metadata header), `functions.php` (modular autoloader), `screenshot.png`.
- [ ] **Step 2: Design Token Engine (`theme.json` v3)**
  - Configure colors, custom palettes, fluid type scales (`clamp()`), spacing, layout containers, shadows.
- [ ] **Step 3: Self-Hosted Font Engine**
  - Add WOFF2 files for `Syne` and `Inter` into `assets/fonts/` and register preload hooks in `inc/assets.php`.

### Stage 2: Backend Architecture & Content Model
- [ ] **Step 4: Custom Post Types (`inc/post-types.php`)**
  - Register `service`, `project`, `team_member`, `career`, `testimonial`.
- [ ] **Step 5: Custom Taxonomies (`inc/taxonomies.php`)**
  - Register `service_category`, `project_category`, `department`.
- [ ] **Step 6: Post Meta & Block Bindings (`inc/custom-fields.php`, `inc/block-bindings.php`)**
  - Register meta fields with REST schema and Block Binding sources.
- [ ] **Step 7: Query Engine (`inc/dynamic-queries.php`)**
  - Implement query filters, related post algorithms, and transient caching.

### Stage 3: Global Shell & Template Parts
- [ ] **Step 8: Top Utility Bar (`parts/topbar.html`)**
  - Build contact info, office hours, and social link bar.
- [ ] **Step 9: Main Header & Navigation (`parts/header.html`)**
  - Build sticky transparent header, site logo, navigation menu, and consultation CTA.
- [ ] **Step 10: Global Agency Footer (`parts/footer.html`)**
  - Build 4-column footer with newsletter subscription, legal links, and copyright bar.
- [ ] **Step 11: Service Marquee Ticker (`parts/service-marquee.html`, `patterns/marquee-ticker.php`)**
  - Build infinite horizontal scrolling typography strip.

### Stage 4: Reusable Gutenberg Block Patterns
- [ ] **Step 12: Hero Patterns (`patterns/hero-home.php`, `parts/page-hero.html`)**
- [ ] **Step 13: Service Components (`patterns/services-preview.php`, `patterns/services-grid.php`)**
- [ ] **Step 14: Case Study & Portfolio Components (`patterns/projects-featured.php`, `patterns/projects-grid.php`)**
- [ ] **Step 15: Social Proof & Metrics (`patterns/stats-metrics.php`, `patterns/testimonials-slider.php`, `patterns/awards-recognition.php`)**
- [ ] **Step 16: Value Proposition & Process (`patterns/why-choose-us.php`, `patterns/process-steps.php`)**
- [ ] **Step 17: Interactive Lead Generation (`patterns/quote-form-cta.php`, `patterns/faq-accordion.php`)**
- [ ] **Step 18: Pricing & Career Components (`patterns/pricing-tables.php`, `patterns/career-openings.php`)**

### Stage 5: Full Site Templates & Page Assembly
- [ ] **Step 19: Homepage Template (`templates/front-page.html`)**
- [ ] **Step 20: Services Archive & Single Service (`templates/archive-service.html`, `templates/single-service.html`)**
- [ ] **Step 21: Projects Archive & Single Project (`templates/archive-project.html`, `templates/single-project.html`)**
- [ ] **Step 22: Blog Archive, Single Post, Author & Search (`templates/archive.html`, `templates/single.html`, `templates/search.html`)**
- [ ] **Step 23: Specialized Pages (`templates/page-about.html`, `templates/page-pricing.html`, `templates/page-contact.html`, `templates/404.html`)**

### Stage 6: Frontend Interactivity, Forms & Micro-Animations
- [ ] **Step 24: Core JS & Form Engine (`assets/js/theme.js`, `inc/form-handlers.js`)**
  - Implement mobile menu toggle, sticky header glass effect, AJAX lead form handler with Nonce & Honeypot.

### Stage 7: Quality Assurance, Security, Accessibility & Optimization
- [ ] **Step 25: WCAG 2.1 AA Accessibility Audit**
  - Keyboard navigation, focus visible rings, contrast verification, ARIA attributes.
- [ ] **Step 26: Performance & Core Web Vitals Audit**
  - Image WebP sizing, script deferral, CSS footprint, Google PageSpeed score > 95.
- [ ] **Step 27: Security & Localization Audit**
  - Nonce validation, input sanitization, output escaping, POT translation readiness.
