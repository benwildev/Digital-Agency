# WordPress Template Map & Hierarchy Specification

## 1. Block Theme Template Architecture

WordPress Block Themes resolve URLs via the standard [WordPress Template Hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/), loading `.html` templates located in `/templates/` and composing them using Template Parts (`/parts/`) and Block Patterns (`/patterns/`).

---

## 2. Template Hierarchy & Resolution Table

| URL Route | Primary Template | Fallback Hierarchy | Dynamic Content Injected |
| :--- | :--- | :--- | :--- |
| `/` (Homepage) | `templates/front-page.html` | `home.html` → `index.html` | Hero pattern, Services Query, Projects Query, Testimonials, Lead Form |
| `/services/` | `templates/archive-service.html`| `archive.html` → `index.html`| Query loop of `service` CPT posts with taxonomy filters |
| `/services/{slug}/` | `templates/single-service.html` | `single.html` → `index.html` | Single `service` post content, custom fields, deliverables, related projects |
| `/projects/` | `templates/archive-project.html`| `archive.html` → `index.html`| Query loop of `project` CPT case studies with taxonomy filter pills |
| `/projects/{slug}/` | `templates/single-project.html` | `single.html` → `index.html` | Single `project` post, metrics, challenges, solutions, client testimonial |
| `/blog/` | `templates/archive.html` | `index.html` | Core WordPress posts query loop, featured post, newsletter box |
| `/blog/{slug}/` | `templates/single.html` | `singular.html` → `index.html`| Single blog post, author box, comments, related post query loop |
| `/about/` | `templates/page-about.html` | `page.html` → `index.html` | Agency story, timeline, values grid, leadership preview, credentials |
| `/pricing/` | `templates/page-pricing.html` | `page.html` → `index.html` | 3-Tier pricing table, comparison matrix, billing switch, pricing FAQ |
| `/team/` | `templates/archive-team.html` | `archive.html` → `index.html`| Query loop of `team_member` CPT profiles grouped by department |
| `/team/{slug}/` | `templates/single-team.html` | `single.html` → `index.html` | Single team member bio, competencies, direct contact, assigned projects |
| `/career/` | `templates/archive-career.html` | `archive.html` → `index.html`| Query loop of `career` CPT vacancies with department/location badges |
| `/career/{slug}/` | `templates/single-career.html` | `single.html` → `index.html` | Single job vacancy details, requirements, application modal |
| `/contact/` | `templates/page-contact.html` | `page.html` → `index.html` | Office locations, contact form, map preview, consultation FAQ |
| `/category/{slug}/` | `templates/archive.html` | `index.html` | Filtered posts archive with category title and description |
| `/?s={query}` | `templates/search.html` | `index.html` | Global site search results loop with highlight markers |
| Any non-existent URL | `templates/404.html` | `index.html` | 404 Error screen with search form and popular service links |

---

## 3. Template Anatomy Breakdown

### 3.1 Homepage (`templates/front-page.html`)
```html
<!-- wp:template-part {"slug":"topbar","area":"header"} /-->
<!-- wp:template-part {"slug":"header","area":"header"} /-->

<main class="wp-block-group agency-main-content">
  <!-- wp:pattern {"slug":"digital-agency/hero-home"} /-->
  <!-- wp:pattern {"slug":"digital-agency/marquee-ticker"} /-->
  <!-- wp:pattern {"slug":"digital-agency/stats-metrics"} /-->
  <!-- wp:pattern {"slug":"digital-agency/services-preview"} /-->
  <!-- wp:pattern {"slug":"digital-agency/why-choose-us"} /-->
  <!-- wp:pattern {"slug":"digital-agency/process-steps"} /-->
  <!-- wp:pattern {"slug":"digital-agency/awards-recognition"} /-->
  <!-- wp:pattern {"slug":"digital-agency/projects-featured"} /-->
  <!-- wp:pattern {"slug":"digital-agency/testimonials-slider"} /-->
  <!-- wp:pattern {"slug":"digital-agency/team-grid"} /-->
  <!-- wp:pattern {"slug":"digital-agency/faq-accordion"} /-->
  <!-- wp:pattern {"slug":"digital-agency/quote-form-cta"} /-->
</main>

<!-- wp:template-part {"slug":"footer","area":"footer"} /-->
```

### 3.2 Single Case Study (`templates/single-project.html`)
```html
<!-- wp:template-part {"slug":"header","area":"header"} /-->

<main class="wp-block-group agency-main-content">
  <!-- wp:template-part {"slug":"page-hero","area":"header"} /-->
  
  <!-- wp:group {"layout":{"type":"constrained"}} -->
  <div class="wp-block-group">
    <!-- wp:post-featured-image {"aspectRatio":"16/9"} /-->
    
    <!-- Custom Project Meta Strip (Client, Timeline, Outcome) -->
    <!-- wp:pattern {"slug":"digital-agency/project-metadata"} /-->
    
    <!-- Editorial Case Study Content -->
    <!-- wp:post-content /-->
    
    <!-- Impact & Metrics Callout -->
    <!-- wp:pattern {"slug":"digital-agency/project-impact-metrics"} /-->
    
    <!-- Client Testimonial Endorsement -->
    <!-- wp:pattern {"slug":"digital-agency/testimonials-slider"} /-->
    
    <!-- Related Projects Query Loop -->
    <!-- wp:pattern {"slug":"digital-agency/related-projects"} /-->
    
    <!-- Next / Prev Project Navigation -->
    <!-- wp:post-navigation-link {"type":"previous"} /-->
    <!-- wp:post-navigation-link {"type":"next"} /-->
  </div>
  <!-- /wp:group -->
</main>

<!-- wp:template-part {"slug":"footer","area":"footer"} /-->
```

---

## 4. Reusable Template Parts Specification

1. **`parts/topbar.html`:** Lightweight contact and social banner with conditional display controls.
2. **`parts/header.html`:** Main sticky header with Site Logo, Nav Menu, Search modal trigger, and Consultation Button.
3. **`parts/footer.html`:** 4-column agency footer, newsletter capture, social links, and copyright bar.
4. **`parts/service-marquee.html`:** Standalone marquee strip for embedding across templates.
5. **`parts/page-hero.html`:** Dynamic inner page header supporting title, breadcrumbs, and excerpt bindings.
6. **`parts/post-meta.html`:** Standardized author, date, and category badge strip for blog articles.
