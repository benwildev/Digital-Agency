# Comprehensive Content Model Matrix

| Entity | Field Name | Storage Key / Meta Key | Data Type | Required | Repeatable | REST API | Frontend Usage |
| :--- | :--- | :--- | :--- | :---: | :---: | :---: | :--- |
| **Service** | Title | `post_title` | string | Yes | No | Yes | Service Card / Hero Heading |
| **Service** | Excerpt / Short Pitch | `post_excerpt` | string | No | No | Yes | Grid card description |
| **Service** | Full Description | `post_content` | HTML / Blocks | Yes | No | Yes | Single service detailed content |
| **Service** | Featured Image | `_thumbnail_id` | attachment ID | Yes | No | Yes | Card cover & single hero banner |
| **Service** | Category | `service_category` | taxonomy terms | No | Yes | Yes | Filter badges & archive pages |
| **Service** | Icon Selector | `_agency_service_icon` | string | No | No | Yes | Card header icon |
| **Service** | Starting Price | `_agency_service_starting_price` | string | No | No | Yes | Card price badge (e.g. `$2,500/mo`) |
| **Service** | Timeline | `_agency_service_timeline` | string | No | No | Yes | Timeline turnaround badge |
| **Service** | Highlight Badge | `_agency_service_highlight_badge` | string | No | No | Yes | Ribbon (e.g. `MOST POPULAR`) |
| **Service** | Video URL | `_agency_service_video_url` | url string | No | No | Yes | Single service video preview |
| **Service** | Gallery | `_agency_service_gallery` | JSON attachment IDs | No | Yes | Yes | Single service image gallery |
| **Service** | Included Services | `_agency_service_included` | JSON array of objects | No | Yes | Yes | Service Scope / Deliverables list |
| **Service** | Key Expertise | `_agency_service_expertise` | JSON array of objects | No | Yes | Yes | Expertise feature list |
| **Service** | Client Benefits | `_agency_service_benefits` | JSON array of objects | No | Yes | Yes | Benefits accordion / bullet cards |
| **Service** | Featured Flag | `_agency_service_featured` | integer (0/1) | No | No | Yes | Homepage featured services query |
| **Project** | Title | `post_title` | string | Yes | No | Yes | Case study title |
| **Project** | Summary / Excerpt | `post_excerpt` | string | No | No | Yes | Case study card summary |
| **Project** | Narrative / Story | `post_content` | HTML / Blocks | Yes | No | Yes | Single case study full story |
| **Project** | Cover Image | `_thumbnail_id` | attachment ID | Yes | No | Yes | Case study card & hero header |
| **Project** | Category | `project_category` | taxonomy terms | Yes | Yes | Yes | Portfolio filter tabs & category tags |
| **Project** | Client Name | `_agency_project_client` | string | Yes | No | Yes | Metadata sidebar / Card tag |
| **Project** | Completion Year | `_agency_project_year` | string | No | No | Yes | Metadata sidebar |
| **Project** | Location / Country | `_agency_project_country` | string | No | No | Yes | Metadata sidebar |
| **Project** | Live URL | `_agency_project_url` | url string | No | No | Yes | External visit project link |
| **Project** | Impact Metric Badge | `_agency_project_impact_metric` | string | No | No | Yes | High-visibility badge (`+320% ROI`) |
| **Project** | Metric Label | `_agency_project_metric_label` | string | No | No | Yes | Metric subtitle (`Organic Growth`) |
| **Project** | Challenge Narrative | `_agency_project_challenge` | HTML string | No | No | Yes | Challenge split block |
| **Project** | Solution Narrative | `_agency_project_solution` | HTML string | No | No | Yes | Solution split block |
| **Project** | Video URL | `_agency_project_video_url` | url string | No | No | Yes | Video showcase lightbox |
| **Project** | Gallery | `_agency_project_gallery` | JSON attachment IDs | No | Yes | Yes | High-res showcase gallery grid |
| **Project** | Linked Testimonial | `_agency_project_testimonial_id` | integer (Post ID) | No | No | Yes | Embedded client endorsement quote |
| **Project** | Featured Flag | `_agency_project_featured` | integer (0/1) | No | No | Yes | Homepage featured case studies |
| **Team** | Name | `post_title` | string | Yes | No | Yes | Team member name |
| **Team** | Bio / Background | `post_content` | HTML / Blocks | No | No | Yes | Member detail modal / page |
| **Team** | Portrait Photo | `_thumbnail_id` | attachment ID | Yes | No | Yes | B&W hover portrait card |
| **Team** | Department | `department` | taxonomy terms | No | Yes | Yes | Team department filter |
| **Team** | Designation / Role | `_agency_team_position` | string | Yes | No | Yes | Card subtitle (e.g. `Art Director`) |
| **Team** | Skill Competencies | `_agency_team_skills` | JSON array `[{name, percentage}]` | No | Yes | Yes | Visual animated skill progress bars |
| **Team** | Email | `_agency_team_email` | email string | No | No | Yes | Direct contact link |
| **Team** | Phone | `_agency_team_phone` | string | No | No | Yes | Direct dial link |
| **Team** | LinkedIn | `_agency_team_linkedin` | url string | No | No | Yes | Social icon link |
| **Team** | X / Twitter | `_agency_team_twitter` | url string | No | No | Yes | Social icon link |
| **Team** | GitHub | `_agency_team_github` | url string | No | No | Yes | Social icon link |
| **Team** | Leadership Flag | `_agency_team_featured` | integer (0/1) | No | No | Yes | Homepage executive preview |
| **Career** | Job Title | `post_title` | string | Yes | No | Yes | Job listing card & heading |
| **Career** | Department | `department` | taxonomy terms | Yes | Yes | Yes | Career filter tabs |
| **Career** | Job Description | `post_content` | HTML / Blocks | Yes | No | Yes | Career detail narrative |
| **Career** | Employment Type | `_agency_career_job_type` | string | Yes | No | Yes | Badge (Full-Time, Contract) |
| **Career** | Location | `_agency_career_location` | string | Yes | No | Yes | Badge (Remote, NYC) |
| **Career** | Salary Range | `_agency_career_salary_range` | string | No | No | Yes | Compensation callout |
| **Career** | Experience Level | `_agency_career_experience` | string | No | No | Yes | Experience requirement |
| **Career** | Application Email | `_agency_career_apply_email` | email string | Yes | No | Yes | Apply CTA button mailto / form |
| **Career** | Listing Status | `_agency_career_status` | string | Yes | No | Yes | Badge (`Open`, `Urgent`, `Closed`) |
| **Career** | Responsibilities | `_agency_career_responsibilities` | JSON array of strings | No | Yes | Yes | Bullet list of core duties |
| **Career** | Requirements | `_agency_career_requirements` | JSON array of strings | No | Yes | Yes | Bullet list of qualifications |
| **Career** | Desired Skills | `_agency_career_skills` | JSON array of strings | No | Yes | Yes | Tech stack pills |
| **Career** | Featured Flag | `_agency_career_featured` | integer (0/1) | No | No | Yes | Priority hiring banner |
| **Testimonial**| Client Name | `post_title` | string | Yes | No | Yes | Reviewer name |
| **Testimonial**| Endorsement Quote | `post_content` | string | Yes | No | Yes | Large quotation text |
| **Testimonial**| Client Avatar / Photo| `_thumbnail_id` | attachment ID | No | No | Yes | Reviewer avatar |
| **Testimonial**| Company / Brand | `_agency_testimonial_company` | string | Yes | No | Yes | Client brand identifier |
| **Testimonial**| Client Role | `_agency_testimonial_role` | string | No | No | Yes | Client designation (e.g. `CMO`) |
| **Testimonial**| Star Rating Score | `_agency_testimonial_rating` | integer (1–5) | Yes | No | Yes | 5-star visual rating display |
| **Testimonial**| Featured Flag | `_agency_testimonial_featured` | integer (0/1) | No | No | Yes | Homepage client reviews slider |
| **Pricing Plan**| Plan Name | `post_title` | string | Yes | No | Yes | Plan heading (e.g. `Enterprise`) |
| **Pricing Plan**| Plan Description | `post_content` | string | No | No | Yes | Plan summary pitch |
| **Pricing Plan**| Price Figure | `_agency_plan_price` | string | Yes | No | Yes | Currency & figure (`$2,999`) |
| **Pricing Plan**| Billing Interval | `_agency_plan_billing_period` | string | Yes | No | Yes | Billing period (`/month`, `/year`) |
| **Pricing Plan**| Ribbon / Badge | `_agency_plan_badge` | string | No | No | Yes | Highlight ribbon (`MOST POPULAR`) |
| **Pricing Plan**| Features List | `_agency_plan_features` | JSON array of strings | Yes | Yes | Yes | Feature checklist with checkmark icons |
| **Pricing Plan**| Action Button Text | `_agency_plan_button_text` | string | Yes | No | Yes | CTA button label (`Choose Plan`) |
| **Pricing Plan**| Action Button URL | `_agency_plan_button_url` | string | Yes | No | Yes | CTA destination link (`#contact`) |
| **Pricing Plan**| Featured Flag | `_agency_plan_featured` | integer (0/1) | No | No | Yes | Glow border highlight |
| **Global Info** | Business Name | `agency_business_name` | string | Yes | No | Yes | Header logo, footer copyright |
| **Global Info** | Phone | `agency_phone` | string | Yes | No | Yes | Top bar, footer, contact bar |
| **Global Info** | Email | `agency_email` | email string | Yes | No | Yes | Top bar, footer, inquiry CTA |
| **Global Info** | Office Locations | `agency_office_locations` | string | No | No | Yes | Top bar global presence ticker |
| **Global Info** | HQ Address | `agency_address` | string | Yes | No | Yes | Footer column 1 & Contact section |
| **Global Info** | Social Links | `agency_social_*` | url strings | No | Yes | Yes | Header drawer, footer social bar |
| **Global Info** | Header CTA Text | `agency_primary_cta_text` | string | Yes | No | Yes | Sticky navigation CTA button |
| **Global Info** | Header CTA URL | `agency_primary_cta_url` | string | Yes | No | Yes | Sticky navigation CTA button URL |
