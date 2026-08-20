# WordPress Content Model & Custom Field Architecture

## 1. Custom Post Types (CPT) Specification

All CPTs are registered with full block editor support (`show_in_rest => true`), custom archive endpoints, menu icons, and revision tracking.

```
================================================================================
CUSTOM POST TYPE DEFINITIONS
================================================================================
```

### 1.1 `service` (Agency Services)
- **Singular Label:** Service
- **Plural Label:** Services
- **Slug / Rewrite:** `/services/` (Single: `/services/%postname%/`)
- **Supports:** `title`, `editor`, `thumbnail`, `excerpt`, `revisions`, `custom-fields`
- **Menu Icon:** `dashicons-chart-pie`
- **Has Archive:** `true` (`archive-service.html`)
- **Taxonomies:** `service_category`
- **REST Visibility:** Enabled (`show_in_rest => true`)

### 1.2 `project` (Portfolio & Case Studies)
- **Singular Label:** Project
- **Plural Label:** Projects
- **Slug / Rewrite:** `/projects/` (Single: `/projects/%postname%/`)
- **Supports:** `title`, `editor`, `thumbnail`, `excerpt`, `revisions`, `custom-fields`
- **Menu Icon:** `dashicons-portfolio`
- **Has Archive:** `true` (`archive-project.html`)
- **Taxonomies:** `project_category`
- **REST Visibility:** Enabled (`show_in_rest => true`)

### 1.3 `team_member` (Agency Staff & Leadership)
- **Singular Label:** Team Member
- **Plural Label:** Team Members
- **Slug / Rewrite:** `/team/` (Single: `/team/%postname%/`)
- **Supports:** `title`, `editor`, `thumbnail`, `excerpt`, `revisions`, `custom-fields`
- **Menu Icon:** `dashicons-groups`
- **Has Archive:** `true` (`archive-team.html`)
- **Taxonomies:** `department`
- **REST Visibility:** Enabled (`show_in_rest => true`)

### 1.4 `career` (Job Openings & Vacancies)
- **Singular Label:** Job Opening
- **Plural Label:** Careers
- **Slug / Rewrite:** `/career/` (Single: `/career/%postname%/`)
- **Supports:** `title`, `editor`, `excerpt`, `revisions`, `custom-fields`
- **Menu Icon:** `dashicons-id`
- **Has Archive:** `true` (`archive-career.html`)
- **Taxonomies:** `department`
- **REST Visibility:** Enabled (`show_in_rest => true`)

### 1.5 `testimonial` (Client Reviews & Endorsements)
- **Singular Label:** Testimonial
- **Plural Label:** Testimonials
- **Slug / Rewrite:** `/testimonials/` (Internal archive `false`)
- **Supports:** `title`, `editor`, `thumbnail`, `custom-fields`
- **Menu Icon:** `dashicons-format-quote`
- **Has Archive:** `false` (Embedded via patterns and query loops)
- **REST Visibility:** Enabled (`show_in_rest => true`)

---

## 2. Custom Taxonomies Specification

| Taxonomy Slug | Attached Post Types | Hierarchical | REST API Enabled | Rewrite Slug |
| :--- | :--- | :--- | :--- | :--- |
| `service_category` | `service` | `true` (Category style) | `true` | `/service-category/` |
| `project_category` | `project` | `true` (Category style) | `true` | `/project-category/` |
| `department` | `team_member`, `career` | `true` (Category style) | `true` | `/department/` |

---

## 3. Post Meta & Custom Field Schema (WordPress 6.5+ Block Bindings Ready)

All meta fields are registered natively via `register_post_meta()` with strict sanitization callbacks and REST schema validation, enabling direct binding in Gutenberg blocks without plugin dependencies.

```php
// Example registration pattern in inc/custom-fields.php
register_post_meta( 'project', '_agency_project_client', array(
    'show_in_rest'      => true,
    'single'            => true,
    'type'              => 'string',
    'sanitize_callback' => 'sanitize_text_field',
    'auth_callback'     => function() { return current_user_can( 'edit_posts' ); }
) );
```

### 3.1 `service` Meta Fields
| Field Meta Key | Data Type | UI Input Method | Purpose / Frontend Display |
| :--- | :--- | :--- | :--- |
| `_agency_service_icon` | `string` | SVG / Dashicon Selector | Icon displayed on service cards |
| `_agency_service_deliverables`| `string` (JSON) | Repeatable Text List | Bullet list of included deliverables on single page |
| `_agency_service_starting_price`| `string` | Text input (e.g. `$2,500/mo`) | Pricing indicator pill |
| `_agency_service_timeline` | `string` | Text input (e.g. `2-4 Weeks`) | Estimated project turnaround |
| `_agency_service_highlight_badge`| `string` | Text input (e.g. `POPULAR`) | Card badge flag |

### 3.2 `project` Meta Fields
| Field Meta Key | Data Type | UI Input Method | Purpose / Frontend Display |
| :--- | :--- | :--- | :--- |
| `_agency_project_client` | `string` | Text input | Client company name |
| `_agency_project_year` | `string` | Text input (e.g. `2024`) | Project completion year |
| `_agency_project_country` | `string` | Text input (e.g. `USA`) | Client location |
| `_agency_project_url` | `string` | URL input | Live website link |
| `_agency_project_impact_metric` | `string` | Text input (e.g. `+320% ROI`) | High-visibility metric badge |
| `_agency_project_metric_label` | `string` | Text input (e.g. `Organic Traffic Growth`) | Metric subtitle |
| `_agency_project_challenge` | `string` | Rich text textarea | Problem statement |
| `_agency_project_solution` | `string` | Rich text textarea | Strategic execution details |
| `_agency_project_testimonial_quote`| `string` | Textarea | Direct client quote |
| `_agency_project_testimonial_author`| `string` | Text input | Quote author name & title |

### 3.3 `team_member` Meta Fields
| Field Meta Key | Data Type | UI Input Method | Purpose / Frontend Display |
| :--- | :--- | :--- | :--- |
| `_agency_team_position` | `string` | Text input (e.g. `Lead UX Architect`) | Job title under name |
| `_agency_team_email` | `string` | Email input | Direct contact link |
| `_agency_team_phone` | `string` | Text input | Phone link |
| `_agency_team_linkedin` | `string` | URL input | Social icon link |
| `_agency_team_twitter` | `string` | URL input | Social icon link |
| `_agency_team_github` | `string` | URL input | Social icon link |
| `_agency_team_skills` | `string` (JSON) | Repeatable skill + percentage | Skill progress bars |

### 3.4 `career` Meta Fields
| Field Meta Key | Data Type | UI Input Method | Purpose / Frontend Display |
| :--- | :--- | :--- | :--- |
| `_agency_career_job_type` | `string` | Select (`Full-Time`, `Part-Time`, `Contract`) | Job badge |
| `_agency_career_location` | `string` | Text input (e.g. `Remote / New York`) | Location badge |
| `_agency_career_salary_range` | `string` | Text input (e.g. `$95k - $120k`) | Compensation estimate |
| `_agency_career_experience` | `string` | Text input (e.g. `3-5 Years`) | Experience requirement badge |
| `_agency_career_apply_email` | `string` | Email input | Destination for applications |
| `_agency_career_status` | `string` | Select (`Open`, `Urgent`, `Closed`) | Status flag |

### 3.5 `testimonial` Meta Fields
| Field Meta Key | Data Type | UI Input Method | Purpose / Frontend Display |
| :--- | :--- | :--- | :--- |
| `_agency_testimonial_author` | `string` | Text input | Client person name |
| `_agency_testimonial_company`| `string` | Text input | Client company name |
| `_agency_testimonial_role` | `string` | Text input | Client designation |
| `_agency_testimonial_rating` | `integer`| Number (1 to 5) | Star rating display |
| `_agency_testimonial_avatar_id`| `integer`| Media attachment ID | Client portrait |
