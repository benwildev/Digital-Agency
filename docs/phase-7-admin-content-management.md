# Phase 7: Advanced WordPress Admin UX & Content Management System

## 1. Architecture Overview
Phase 7 elevates the WordPress administrative and content management experience for the Digital Agency theme into an enterprise-ready, accessible, and intuitive authoring environment. Editors and administrators can manage all Custom Post Types, structured repeatable collections, media galleries, relational taxonomies, and global agency coordinates without editing raw JSON, entering serialized data, or touching PHP files.

---

## 2. CPT Admin Enhancements

### 2.1 Service Management (`service`)
- **Metabox:** `agency_service_details` rendered on `service` edit screens with scoped card sections:
  - *Parameters:* Starting Retainer (`_agency_service_starting_price`), Sprint Timeline (`_agency_service_timeline`), Highlight Badge (`_agency_service_highlight_badge`), Video URL (`_agency_service_video_url`), Featured Flag (`_agency_service_featured`).
  - *Media Gallery:* WordPress Media Library modal (`wp.media`) multi-image selector with real-time thumbnail preview grid and single-click image removal.
  - *Structured Repeatable Fields:* Interactive dynamic lists for Deliverables/Included Scope (`_agency_service_included`), Strategic Expertise Points (`_agency_service_expertise`), and Client ROI Benefits (`_agency_service_benefits`).
- **Admin Columns:** Title, Starting Retainer, Timeline, Service Category, Featured, Date.
- **Taxonomy Filtering:** Native dropdown filter for `service_category`.

### 2.2 Case Study / Project Management (`project`)
- **Metabox:** `agency_project_details` with structured sections:
  - *Project Details:* Client Name (`_agency_project_client`), Year (`_agency_project_year`), Region/Market (`_agency_project_country`), Live URL (`_agency_project_url`), Showcase Video URL (`_agency_project_video_url`), Impact Metric (`_agency_project_impact_metric`), Metric Label (`_agency_project_metric_label`), Featured Flag.
  - *Narrative Breakdown:* 4-stage narrative fields for 01 Challenge, 02 Strategy, 03 Solution/Implementation, and 04 Quantifiable Impact.
  - *Case Study Gallery:* WordPress Media Library multi-selection interface.
  - *Linked Testimonial (Relational Data Model):* Native dropdown selector querying published `testimonial` posts (`_agency_project_testimonial_id`).
- **Admin Columns:** Title, Client, Year, Impact Metric, Project Category, Featured, Date.
- **Sortable Columns:** Year (`_agency_project_year`).
- **Taxonomy Filtering:** Native dropdown filter for `project_category`.

### 2.3 Team Member Management (`team_member`)
- **Metabox:** `agency_team_details` with structured sections:
  - *Designation & Contact:* Role/Title (`_agency_team_position`), Direct Email (`_agency_team_email`), Direct Phone (`_agency_team_phone`), Leadership/Featured Flag.
  - *Social Profiles:* LinkedIn, Twitter/X, GitHub URLs.
  - *Skill Competencies:* Repeatable skill rows featuring two-way synchronized range slider and number input strictly validated and clamped between `0%` and `100%`.
- **Admin Columns:** Name, Designation, Department, Leadership, Date.
- **Taxonomy Filtering:** Native dropdown filter for `department`.

### 2.4 Testimonial Management (`testimonial`)
- **Metabox:** `agency_testimonial_details`:
  - *Client Info:* Author Name (`_agency_testimonial_author`), Company Name (`_agency_testimonial_company`), Executive Role (`_agency_testimonial_role`), Featured Flag.
  - *Star Rating:* Accessible visual radio rating selector strictly bounded to `1`–`5` stars (`★★★★★` to `★☆☆☆☆`), eliminating negative values, numbers >5, and non-numeric strings.
  - *Quotation Text:* Native `post_content` editor.
- **Admin Columns:** Author, Company, Star Rating (`★★★★★`), Featured, Date.
- **Sortable Columns:** Star Rating (`_agency_testimonial_rating`).

### 2.5 Pricing Plan Management (`pricing_plan`)
- **Metabox:** `agency_pricing_details`:
  - *Commercial Parameters:* Price Figure (`_agency_plan_price`), Billing Cadence (`_agency_plan_billing_period`), Ribbon Badge (`_agency_plan_badge`), CTA Button Text & URL, Featured Accent Glow Flag.
  - *Repeatable Features:* Dynamic feature item builder with Add/Remove controls.
  - *Canonical Ordering:* Native `menu_order` integration and admin list table sortability.
- **Admin Columns:** Title, Price / Cadence, Badge, Featured (Lime Glow), Menu Order.
- **Sortable Columns:** Menu Order (`menu_order`).

### 2.6 Career Opening Management (`career`)
- **Metabox:** `agency_career_details`:
  - *Parameters:* Employment Arrangement (Full-Time, Part-Time, Contract), Location (`_agency_career_location`), Compensation (`_agency_career_salary_range`), Experience Required (`_agency_career_experience`), Application Email (`_agency_career_apply_email`), Hiring Status (Open, Urgent, Closed), Featured Flag.
  - *Repeatable Collections:* Core Responsibilities, Qualifications & Experience Requirements, Desired Skills & Tech Stack.
- **Admin Columns:** Title, Employment Type, Location, Department, Hiring Status badge, Featured, Date.
- **Taxonomy Filtering:** Native dropdown filter for `department`.

---

## 3. Global Agency Settings (`Appearance → Agency Info`)
Organized using standard WordPress Settings API (`register_setting`, `add_settings_section`, `add_settings_field`, `do_settings_sections`, `submit_button`):
1. **Business & Contact Information:** Agency Name, Phone, Inquiries Email (`is_email` validation), Headquarters Address (multiline).
2. **Global Office Hubs:** Office locations string rendered in the global top bar (`NYC • LONDON • TOKYO • SINGAPORE`).
3. **Social & Corporate Profiles:** LinkedIn, Twitter/X, Instagram, GitHub, Facebook (`esc_url_raw` validation).
4. **Primary Call to Action:** Header CTA Button Text & URL.
5. **Newsletter Subscription:** Lead generation form headline.

---

## 4. Admin Assets & Performance
- **Zero Global Pollution:** Admin styles (`assets/css/admin.css`) and JavaScript (`assets/js/admin.js`) are enqueued conditionally only on `post.php` / `post-new.php` for theme CPTs and `appearance_page_agency-settings`.
- **Zero jQuery Dependency:** Modern, pure Vanilla JavaScript engine handling repeatable fields, media modal integration, and range sliders.

---

## 5. Security & Validation
- **Nonce Verification:** Every post save verifies `digital_agency_meta_nonce`.
- **Capability Checks:** Enforces `current_user_can('edit_post', $post_id)` for post meta and `current_user_can('manage_options')` for global settings.
- **Bypass Protections:** Bypasses autosaves (`DOING_AUTOSAVE`) and revision saves (`wp_is_post_revision`).
- **Input Sanitization & Output Escaping:** 100% of fields sanitized on save (`sanitize_text_field`, `sanitize_email`, `esc_url_raw`, `wp_kses_post`, `absint`) and escaped on render (`esc_html`, `esc_attr`, `esc_url`, `esc_textarea`).
