# Global Component Inventory & Implementation Matrix

## 1. Global Component Catalog

Every reusable UI element is defined with its purpose, layout breakdown, dynamic data source, and implementation method.

---

### Component 1: TopBar
- **Purpose:** Utility bar for contact email, phone, business hours, and social media handles.
- **Where It Appears:** Global (Header top), optional toggle on landing pages.
- **Desktop Structure:** 2-column flex (`space-between`). Left: Email + Phone with icons. Right: Social icon links + Office hours.
- **Mobile Structure:** Collapsed to single centered row (Phone + Email only) or hidden for minimal vertical footprint.
- **Content Source:** WordPress Customizer / Theme Options / Block Settings.
- **Implementation Method:** Template Part (`parts/topbar.html`).

---

### Component 2: Header & Desktop Navigation
- **Purpose:** Primary branding, menu navigation, search toggle, and primary lead CTA button.
- **Where It Appears:** All pages (Global).
- **Desktop Structure:** 3-part layout (`flex justify-between items-center`). Left: Agency Logo SVG. Center: Pill menu navigation with animated active underline/pill. Right: "Get a Quote" CTA button.
- **Mobile Structure:** Logo (left), Hamburger Trigger Icon (right).
- **Content Source:** WordPress Navigation Menus (`core/navigation`), Custom Logo (`core/site-logo`).
- **Implementation Method:** Template Part (`parts/header.html`).

---

### Component 3: Mobile Navigation Drawer
- **Purpose:** Fullscreen or sliding off-canvas mobile menu navigation.
- **Where It Appears:** Viewports `< 1024px`.
- **Desktop Structure:** Hidden (`display: none`).
- **Mobile Structure:** Slide-in drawer with backdrop blur, accordion sub-menus, direct phone/email buttons, and primary CTA.
- **Content Source:** `core/navigation` with overlay menu enabled.
- **Implementation Method:** Core Block configuration inside `parts/header.html` with vanilla JS enhancements.

---

### Component 4: PageHero (Inner Pages)
- **Purpose:** Page title, breadcrumbs, category indicator, and brief editorial introduction.
- **Where It Appears:** Services, Projects, Blog, About, Pricing, Team, Career, Contact.
- **Desktop Structure:** Centered or left-aligned column with eyebrow badge, bold H1, lead paragraph, and breadcrumbs.
- **Mobile Structure:** Vertically stacked, centered alignment, fluid typography scaling.
- **Content Source:** Page Title (`core/post-title`), Excerpt (`core/post-excerpt`), Breadcrumbs helper.
- **Implementation Method:** Template Part (`parts/page-hero.html`) / Block Pattern.

---

### Component 5: ServiceMarquee (Infinite Ticker)
- **Purpose:** Continuous horizontal marquee of key service offerings and brand ethos.
- **Where It Appears:** Homepage, Services Archive, About Page, Bottom CTA transitions.
- **Desktop Structure:** Full-width dark container with duplicated horizontal flex items and CSS keyframe translate (`translateX(0)` to `translateX(-50%)`).
- **Mobile Structure:** Identical flow with reduced font size and smooth hardware acceleration (`will-change: transform`).
- **Content Source:** Block pattern editable text or custom query of Service titles.
- **Implementation Method:** Block Pattern (`patterns/marquee-ticker.php`).

---

### Component 6: ServiceCard
- **Purpose:** Showcases individual service offering with title, excerpt, icon, tags, and link.
- **Where It Appears:** Homepage, Services Archive, Service Detail (Related), Footer preview.
- **Desktop Structure:** Dark surface card (`surface-dark-card`), service index (`01`), icon, title, excerpt, deliverable pill tags, and diagonal arrow link (`↗`).
- **Mobile Structure:** Full-width stacked card with touch-friendly hit areas.
- **Content Source:** `service` Custom Post Type (`title`, `excerpt`, `post_thumbnail`, `permalink`, `taxonomies`).
- **Implementation Method:** Block Pattern with `core/query` loop & `core/post-template`.

---

### Component 7: ProjectCard (Case Study Card)
- **Purpose:** Showcases client project with high-impact monochrome photo, outcome metric badge, tags, and link.
- **Where It Appears:** Homepage, Projects Archive, Project Detail (Related), About.
- **Desktop Structure:** Asymmetric 2-column or 3-column grid. Featured image with hover zoom, floating metric pill (`+240% ROI`), client title, category tag.
- **Mobile Structure:** Single column stacked layout.
- **Content Source:** `project` Custom Post Type (`title`, `post_thumbnail`, `client_name`, `impact_metric`, `permalink`).
- **Implementation Method:** Block Pattern with `core/query` loop.

---

### Component 8: TeamCard
- **Purpose:** Displays team member portrait, name, designation, department, and social links.
- **Where It Appears:** Homepage (preview), Team Archive, About Page.
- **Desktop Structure:** Monochrome portrait with hover overlay showing LinkedIn / Twitter icons, name, and role.
- **Mobile Structure:** 2-column on tablet, 1-column on mobile.
- **Content Source:** `team_member` CPT (`title`, `position`, `department`, `thumbnail`, `social_links`).
- **Implementation Method:** Block Pattern with `core/query` loop.

---

### Component 9: TestimonialCard / Slider
- **Purpose:** Client review quote, rating stars, client photo, name, and company title.
- **Where It Appears:** Homepage, Service Detail, Project Detail, About Page.
- **Desktop Structure:** Large quote typography, 5-star rating icon group, client headshot, author meta.
- **Mobile Structure:** Single column card with swipe support.
- **Content Source:** `testimonial` CPT or Block Pattern.
- **Implementation Method:** Block Pattern (`patterns/testimonials-slider.php`).

---

### Component 10: Stats & Metrics Strip
- **Purpose:** Demonstrates agency credibility via key performance metrics.
- **Where It Appears:** Homepage, About Page, Project Details.
- **Desktop Structure:** 4-column horizontal grid with large numeric display (`10+`, `350+`, `99%`, `24`), animated counter, and label.
- **Mobile Structure:** 2-column grid on mobile/tablet.
- **Content Source:** Editable Block Pattern attributes.
- **Implementation Method:** Block Pattern (`patterns/stats-metrics.php`).

---

### Component 11: PricingCard (3-Tier Matrix)
- **Purpose:** Displays service package tiers (Starter, Pro, Enterprise) with features and billing toggle.
- **Where It Appears:** Pricing Page, Homepage (optional embed).
- **Desktop Structure:** 3 equal columns. Pro Tier highlighted with Lime accent border and "Most Popular" ribbon.
- **Mobile Structure:** 1 column stacked cards with Pro Tier sorted first.
- **Content Source:** Block Pattern with customizable pricing items and feature checklists.
- **Implementation Method:** Block Pattern (`patterns/pricing-tables.php`).

---

### Component 12: FAQ Accordion
- **Purpose:** Collapsible question and answer list addressing common objections.
- **Where It Appears:** Homepage, Services, Service Detail, Pricing, Contact.
- **Desktop Structure:** 2-column split (Left: Headline & CTA; Right: Accordion items with animated `+`/`-` toggle).
- **Mobile Structure:** Stacked single column with touch-optimized accordion items.
- **Content Source:** Native `core/details` block or interactive pattern.
- **Implementation Method:** Block Pattern (`patterns/faq-accordion.php`).

---

### Component 13: Consultation / Quote Form
- **Purpose:** Lead generation form capturing client requirements, budget, timeline, and contact details.
- **Where It Appears:** Homepage, Contact Page, Single Service sidebar, Global CTA banner.
- **Desktop Structure:** 2-column form grid (Name, Email, Company, Service Select, Budget Range, Message) with Honeypot security & submit button.
- **Mobile Structure:** Single column stacked form fields.
- **Content Source:** Native WordPress AJAX Form Handler (`inc/form-handlers.php`).
- **Implementation Method:** Block Pattern (`patterns/quote-form-cta.php`).

---

### Component 14: Global Footer
- **Purpose:** Site directory, newsletter signup, agency credentials, legal links, copyright.
- **Where It Appears:** Global across all templates.
- **Desktop Structure:** 4 columns (Col 1: Brand bio & socials; Col 2: Services links; Col 3: Company links; Col 4: Newsletter subscription & badges) + bottom copyright bar.
- **Mobile Structure:** Accordion-friendly or stacked 1-column layout.
- **Content Source:** Reusable Template Part (`parts/footer.html`).
- **Implementation Method:** Template Part.

---

## 2. Comprehensive Page / Component Usage Matrix

| Component | Home | Services | Service Detail | Projects | Project Detail | Blog | Blog Detail | About | Pricing | Team | Team Detail | Career | Contact |
| :--- | :---: | :---: | :---: | :---: | :---: | :---: | :---: | :---: | :---: | :---: | :---: | :---: | :---: |
| **TopBar** | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ |
| **Header** | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ |
| **PageHero** | — | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ |
| **ServiceMarquee** | ✓ | ✓ | — | ✓ | — | — | — | ✓ | — | — | — | — | — |
| **Stats / Metrics** | ✓ | — | ✓ | — | ✓ | — | — | ✓ | — | — | — | — | — |
| **ServiceCard (Grid)**| ✓ | ✓ | ✓ | — | — | — | — | — | — | — | — | — | — |
| **ProjectCard (Grid)**| ✓ | — | ✓ | ✓ | ✓ | — | — | — | — | — | — | — | — |
| **TeamCard (Grid)** | ✓ | — | — | — | — | — | — | ✓ | — | ✓ | — | — | — |
| **TestimonialCard** | ✓ | ✓ | ✓ | — | ✓ | — | — | ✓ | — | — | — | — | — |
| **Process Steps** | ✓ | ✓ | ✓ | — | — | — | — | — | — | — | — | — | — |
| **Awards Strip** | ✓ | — | — | — | — | — | — | ✓ | — | — | — | — | — |
| **Pricing Tables** | — | — | — | — | — | — | — | — | ✓ | — | — | — | — |
| **FAQ Accordion** | ✓ | ✓ | ✓ | — | — | — | — | — | ✓ | — | — | — | ✓ |
| **Quote Form CTA** | ✓ | ✓ | ✓ | ✓ | ✓ | — | — | ✓ | ✓ | — | — | — | ✓ |
| **Career Openings** | — | — | — | — | — | — | — | — | — | — | — | ✓ | — |
| **Newsletter Box** | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ |
| **Global Footer** | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ |
