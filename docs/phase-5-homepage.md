# Phase 5: Homepage Visual Implementation & Dynamic Content Integration

## 1. Executive Summary

Phase 5 delivers the complete, high-fidelity Homepage (`templates/front-page.html`) for the Digital Marketing Agency WordPress Block Theme. The page integrates the entire visual narrative from the approved reference architecture, composed entirely of modular, accessible, and WordPress-native block patterns dynamically bound to custom post types and global agency settings.

---

## 2. Homepage Section Architecture & Sequence

The homepage comprises 17 structural and narrative sections:

1. **Global Top Bar:** [`parts/topbar.html`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/parts/topbar.html) (Bound to `agency_email`, `agency_phone`, `agency_office_locations`).
2. **Sticky Main Header:** [`parts/header.html`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/parts/header.html) (Site logo, Navigation block, Dynamic CTA).
3. **Hero Section:** [`patterns/home-hero.php`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/patterns/home-hero.php) (`digital-agency/home-hero`): Dual CTAs, rating badge, benchmark growth card.
4. **Service Marquee / Ticker:** [`parts/service-marquee.html`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/parts/service-marquee.html) (Hardware-accelerated CSS ticker looping published services).
5. **Statistics & Metrics Strip:** [`patterns/home-stats.php`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/patterns/home-stats.php) (`digital-agency/home-stats`): 4-column metric counter strip.
6. **Services Showcase:** [`patterns/home-services.php`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/patterns/home-services.php) (`digital-agency/home-services`): 3-column card grid querying the `service` CPT.
7. **Differentiation / Why Us:** [`patterns/home-why-us.php`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/patterns/home-why-us.php) (`digital-agency/home-why-us`): 50/50 split layout with 4 verified advantage points.
8. **4-Step Process & Workflow:** [`patterns/home-process.php`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/patterns/home-process.php) (`digital-agency/home-process`): Numbered cards (`01 Research`, `02 Strategy`, `03 Execution`, `04 Scale`).
9. **Awards & Recognition Strip:** [`patterns/home-awards.php`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/patterns/home-awards.php) (`digital-agency/home-awards`): 4 credential badges (Awwwards, Clutch, Google Premier, Webby).
10. **Featured Case Studies:** [`patterns/home-projects.php`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/patterns/home-projects.php) (`digital-agency/home-projects`): 2-column showcase querying `project` CPT with outcome metrics.
11. **Testimonials & Social Proof:** [`patterns/home-testimonials.php`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/patterns/home-testimonials.php) (`digital-agency/home-testimonials`): 3-column card grid querying `testimonial` CPT with 5-star ratings.
12. **Team Leadership Preview:** [`patterns/home-team.php`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/patterns/home-team.php) (`digital-agency/home-team`): 4-column monochrome portrait cards querying `team_member` CPT.
13. **Latest News & Insights:** [`patterns/home-blog.php`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/patterns/home-blog.php) (`digital-agency/home-blog`): 3-column post grid querying standard WordPress `post` type.
14. **FAQ Accordion:** [`patterns/home-faq.php`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/patterns/home-faq.php) (`digital-agency/home-faq`): 2-column layout with accessible native `<details>` and `<summary>` elements.
15. **Lead Capture & Consultation CTA:** [`patterns/home-cta.php`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/patterns/home-cta.php) (`digital-agency/home-cta`): High-contrast card with structured lead intake form.
16. **Global Newsletter Section:** [`parts/newsletter.html`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/parts/newsletter.html) (Accessible email subscription card).
17. **Global 4-Column Footer:** [`parts/footer.html`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/parts/footer.html) (Directory links, social buttons, dynamic contact data, copyright).

---

## 3. Dynamic Data Mapping Matrix

| Pattern Slug | CPT / Data Source | Query Function | Fields Displayed | Fallback Behavior |
| :--- | :--- | :--- | :--- | :--- |
| `digital-agency/home-hero` | Agency Settings | `digital_agency_get_setting()` | CTA Text, CTA URL | Default `"Start a Project"`, `"#contact"` |
| `digital-agency/home-stats` | Editable Pattern | N/A (Static Markup) | 4 Impact Metrics | Industry-standard growth metrics |
| `digital-agency/home-services` | `service` CPT | `digital_agency_get_services()` | Title, Excerpt, Starting Price, Badge | 6 Pre-configured capability cards |
| `digital-agency/home-why-us` | Editable Pattern | N/A (Static Markup) | 4 Advantage Points, ROI Stat | Structured feature checklist |
| `digital-agency/home-process` | Editable Pattern | N/A (Static Markup) | 4 Numbered Steps | Systematic 4-step framework |
| `digital-agency/home-awards` | Editable Pattern | N/A (Static Markup) | 4 Industry Credentials | Awwwards, Clutch, Google, Webby |
| `digital-agency/home-projects` | `project` CPT | `digital_agency_get_featured_projects()` | Thumbnail, Title, Impact Metric, Year | 4 High-impact case study cards |
| `digital-agency/home-testimonials` | `testimonial` CPT | `digital_agency_get_testimonials()` | Quote, Author, Role, Company, 5-Stars | 3 Enterprise executive reviews |
| `digital-agency/home-team` | `team_member` CPT | `digital_agency_get_team_members()` | Portrait, Name, Position, Socials | 4 Executive leadership profiles |
| `digital-agency/home-blog` | Core `post` | `WP_Query( 'post' )` | Thumbnail, Date, Category, Title, Excerpt | 3 Strategy & engineering articles |
| `digital-agency/home-faq` | Editable Pattern | N/A (Native Details) | 4 Enterprise Q&As | Fully accessible accordion |
| `digital-agency/home-cta` | Settings & Form | `digital_agency_get_setting()` | Direct Phone, Email, Intake Form | Form with accessible inputs |

---

## 4. Responsive & Accessibility Verification

- **Breakpoints Tested:** Mobile (`320px`, `375px`, `414px`, `480px`), Tablet (`768px`, `1024px`), Desktop (`1280px`, `1440px`).
- **Typography Fluidity:** All headings leverage clamp-based fluid scales from `theme.json`.
- **Keyboard Navigation & ARIA:**
  - One logical `<h1>` in the hero section followed by strict `<h2>` and `<h3>` hierarchy.
  - Native `<details>` and `<summary>` elements for the FAQ accordion provide native keyboard expanding/collapsing without custom JS.
  - All form controls feature explicit `<label for>` bindings or `.screen-reader-text` accessibility wrappers.
  - Full support for `prefers-reduced-motion: reduce`.

---

## 5. Performance Metrics

- **Zero External JS Frameworks:** No React, Vue, jQuery, GSAP, or Swiper.
- **Hardware Acceleration:** Transitions and transforms operate on GPU compositing layers.
- **Query Efficiency:** All queries utilize `no_found_rows => true` and explicit `posts_per_page` limits.
