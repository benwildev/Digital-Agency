# Phase 3 & 3.1 Implementation Summary: Content Model & CPT Engine

## 1. Executive Summary

Phase 3 and Phase 3.1 establish the complete, robust WordPress Content Engine for the Digital Agency Block Theme. All dynamic content visible across the visual reference designs (Services, Projects/Case Studies, Team Members, Job Openings, Testimonials, Pricing Plans, Global Business Data) is fully structured using native WordPress APIs, custom meta tables, structured JSON serialization for repeatable items, media attachment arrays, and REST/Block Binding endpoints.

---

## 2. Custom Post Types Registered (`inc/post-types.php`)

| CPT Slug | Singular / Plural Label | Archive Route | Menu Icon | Public | Supports |
| :--- | :--- | :--- | :--- | :---: | :--- |
| **`service`** | Service / Services | `/services/` | `dashicons-chart-pie` | Yes | `title`, `editor`, `thumbnail`, `excerpt`, `revisions`, `custom-fields`, `page-attributes` |
| **`project`** | Project / Projects | `/projects/` | `dashicons-portfolio` | Yes | `title`, `editor`, `thumbnail`, `excerpt`, `revisions`, `custom-fields`, `page-attributes` |
| **`team_member`**| Team Member / Team Members | `/team/` | `dashicons-groups` | Yes | `title`, `editor`, `thumbnail`, `excerpt`, `revisions`, `custom-fields`, `page-attributes` |
| **`career`** | Job Opening / Careers | `/career/` | `dashicons-id` | Yes | `title`, `editor`, `excerpt`, `revisions`, `custom-fields`, `page-attributes` |
| **`testimonial`**| Testimonial / Testimonials | *Internal* | `dashicons-format-quote` | No | `title`, `editor`, `thumbnail`, `custom-fields`, `page-attributes` |
| **`pricing_plan`**| Pricing Plan / Pricing Plans | *Internal* | `dashicons-money-alt` | No | `title`, `editor`, `custom-fields`, `page-attributes` |

---

## 3. Custom Taxonomies Registered (`inc/taxonomies.php`)

| Taxonomy Slug | Attached Post Types | Hierarchical | REST API Route | Purpose |
| :--- | :--- | :--- | :--- | :--- |
| **`service_category`** | `service` | `true` | `/wp/v2/service_category` | Categorization for services (SEO, Branding, UI/UX, Development). |
| **`project_category`** | `project` | `true` | `/wp/v2/project_category` | Category filtering for portfolio case studies. |
| **`department`** | `team_member`, `career` | `true` | `/wp/v2/department` | Shared organizational taxonomy linking staff and open vacancies. |

---

## 4. Global Settings Engine (`inc/settings.php`)

Registered via WordPress Options API with sanitize callbacks and accessor function `digital_agency_get_setting( $key, $default )`:
- `agency_business_name`
- `agency_phone`
- `agency_email`
- `agency_address`
- `agency_office_locations`
- `agency_social_linkedin`, `agency_social_twitter`, `agency_social_instagram`, `agency_social_github`, `agency_social_facebook`
- `agency_primary_cta_text`, `agency_primary_cta_url`
- `agency_newsletter_label`

---

## 5. Dynamic Query Helpers (`inc/dynamic-queries.php`)

- `digital_agency_get_services( array $args )`
- `digital_agency_get_projects( array $args )`
- `digital_agency_get_featured_projects( int $limit )`
- `digital_agency_get_team_members( array $args )`
- `digital_agency_get_open_careers( array $args )`
- `digital_agency_get_testimonials( array $args )`
- `digital_agency_get_pricing_plans( array $args )`
- `digital_agency_get_related_projects( int $post_id, int $limit )`
- `digital_agency_get_related_services( int $post_id, int $limit )`
- `digital_agency_get_project_meta( ?int $post_id )`
- `digital_agency_get_service_gallery( int $post_id )`
- `digital_agency_get_project_gallery( int $post_id )`
- `digital_agency_get_team_skills( int $post_id )`
- `digital_agency_get_career_responsibilities( int $post_id )`
- `digital_agency_get_career_requirements( int $post_id )`
- `digital_agency_get_career_skills( int $post_id )`
- `digital_agency_get_service_deliverables( int $post_id )`
- `digital_agency_get_service_expertise( int $post_id )`
- `digital_agency_get_service_benefits( int $post_id )`
- `digital_agency_get_pricing_plan_features( int $post_id )`

---

## 6. Matrix & Detailed Documentation

See [`/docs/content-model-matrix.md`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/docs/content-model-matrix.md) and [`/docs/phase-3.1-content-completeness.md`](file:///c:/Users/Lenovo/Desktop/Dev%20Projects/Template%20Website/Digital%20Agency%20-%20Wordpress%20Theme/docs/phase-3.1-content-completeness.md).
