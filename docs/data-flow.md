# Dynamic Data Flow & Query Architecture

## 1. End-to-End Data Pipeline

The data architecture bridges WordPress database entities (Posts, Taxonomies, Post Meta) with the frontend DOM through native Gutenberg Block Bindings, Core Query Loops, and REST endpoints.

```
┌────────────────────────────────────────────────────────┐
│               WordPress Admin Dashboard                 │
│ (CPT Editors, Meta Boxes, Site Editor, Block Inspector)│
└──────────────────────────┬─────────────────────────────┘
                           │ 1. Native Save / REST API
                           ▼
┌────────────────────────────────────────────────────────┐
│                   WordPress Database                    │
│    (wp_posts, wp_postmeta, wp_terms, wp_term_taxonomy)  │
└──────────────────────────┬─────────────────────────────┘
                           │ 2. Optimized WP_Query / Block Bindings
                           ▼
┌────────────────────────────────────────────────────────┐
│                 Theme Engine & Logic                   │
│   (inc/dynamic-queries.php, inc/block-bindings.php)    │
└──────────────────────────┬─────────────────────────────┘
                           │ 3. Pattern / Template Injection
                           ▼
┌────────────────────────────────────────────────────────┐
│              Gutenberg Block Patterns                  │
│    (patterns/*.php + templates/*.html + parts/*.html)  │
└──────────────────────────┬─────────────────────────────┘
                           │ 4. SSR Rendered HTML + Micro-Interactivity
                           ▼
┌────────────────────────────────────────────────────────┐
│                  Client Browser (DOM)                  │
│     (Ultra-Fast First Contentful Paint < 0.8s)         │
└────────────────────────────────────────────────────────┘
```

---

## 2. Dynamic Query Strategy (Performance-Tuned)

All queries are engineered with `no_found_rows => true` when pagination is not required, minimizing MySQL `COUNT(*)` overhead.

### 2.1 Homepage Services Preview
```php
$services_query = new WP_Query( array(
    'post_type'              => 'service',
    'posts_per_page'         => 6,
    'post_status'            => 'publish',
    'orderby'                => 'menu_order',
    'order'                  => 'ASC',
    'no_found_rows'          => true,
    'update_post_meta_cache' => true,
    'update_post_term_cache' => true,
) );
```

### 2.2 Featured Case Studies Query (Homepage & Portfolio)
```php
$featured_projects_query = new WP_Query( array(
    'post_type'              => 'project',
    'posts_per_page'         => 4,
    'post_status'            => 'publish',
    'meta_query'             => array(
        'relation' => 'OR',
        array(
            'key'     => '_agency_project_featured',
            'value'   => '1',
            'compare' => '=',
        ),
    ),
    'orderby'                => 'date',
    'order'                  => 'DESC',
    'no_found_rows'          => true,
) );
```

### 2.3 Related Case Studies (Single Project / Single Service)
```php
function agency_get_related_projects( $post_id, $limit = 2 ) {
    $terms = wp_get_post_terms( $post_id, 'project_category', array( 'fields' => 'ids' ) );
    
    return new WP_Query( array(
        'post_type'              => 'project',
        'posts_per_page'         => $limit,
        'post__not_in'           => array( $post_id ),
        'tax_query'              => ! empty( $terms ) ? array(
            array(
                'taxonomy' => 'project_category',
                'field'    => 'term_id',
                'terms'    => $terms,
            ),
        ) : array(),
        'orderby'                => 'rand',
        'no_found_rows'          => true,
    ) );
}
```

### 2.4 Testimonial Feed Query
```php
$testimonials_query = new WP_Query( array(
    'post_type'      => 'testimonial',
    'posts_per_page' => 8,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'no_found_rows'  => true,
) );
```

---

## 3. Dynamic Lead Form Data Flow (AJAX Engine)

```
[User fills Quote Form] 
       ↓
[JS Client Form Validation + Honeypot Check]
       ↓
[Fetch POST payload + 'agency_lead_nonce' to wp-admin/admin-ajax.php or REST route]
       ↓
[inc/form-handlers.php: Nonce check + sanitize inputs + rate limit check]
       ↓
[Send HTML Email Notification to Admin via wp_mail() + Record lead in DB/Post Meta]
       ↓
[Return JSON: { success: true, message: "Thank you! We will reply within 24 hours." }]
       ↓
[UI displays animated success checkmark & resets fields]
```
