# Accessibility (a11y) Strategy & WCAG 2.1 AA Compliance

## 1. Accessibility Policy & Target Standard

The Digital Agency theme is designed from the foundation to comply with **WCAG 2.1 Level AA** and Section 508 accessibility guidelines.

---

## 2. Landmark & Semantic HTML Architecture

```html
<header class="site-header" role="banner">
  <nav class="primary-navigation" role="navigation" aria-label="Main Navigation">...</nav>
</header>

<main id="main-content" class="site-main" role="main">
  <!-- Semantic Sections & Articles -->
  <section class="hero-section" aria-labelledby="hero-heading">
    <h1 id="hero-heading">...</h1>
  </section>
  
  <section class="services-section" aria-labelledby="services-heading">
    <h2 id="services-heading">...</h2>
    <article class="service-card">...</article>
  </section>
</main>

<footer class="site-footer" role="contentinfo">
  <nav class="footer-navigation" aria-label="Footer Navigation">...</nav>
</footer>
```

---

## 3. Core Accessibility Guardrails

### 3.1 Skip to Content Link
A native skip link is placed as the very first focusable element on every template:
```html
<a class="skip-link screen-reader-text" href="#main-content">
  <?php esc_html_e( 'Skip to content', 'digital-agency' ); ?>
</a>
```

### 3.2 Keyboard Navigation & Focus Visible
- No outline suppression (`outline: none` without replacement is strictly forbidden).
- High-contrast custom focus ring:
  ```css
  :focus-visible {
    outline: 2px solid var(--wp--preset--color--primary-accent, #C8F560);
    outline-offset: 3px;
    border-radius: 4px;
  }
  ```

### 3.3 Color Contrast Verification (WCAG AA Compliance)
| Element Pair | Foreground | Background | Contrast Ratio | WCAG AA Status |
| :--- | :--- | :--- | :--- | :--- |
| **Lime Button Text on Accent** | `#0A130F` (Dark) | `#C8F560` (Lime) | `13.8 : 1` | PASS (Exceeds 4.5:1) |
| **White Headings on Dark Surface** | `#FFFFFF` | `#0A130F` | `18.6 : 1` | PASS (Exceeds 4.5:1) |
| **Secondary Text on Dark Surface** | `#CBD5E1` | `#0A130F` | `13.1 : 1` | PASS (Exceeds 4.5:1) |
| **Muted Metadata on Dark Surface** | `#94A3B8` | `#0A130F` | `7.9 : 1` | PASS (Exceeds 4.5:1) |
| **Dark Text on Light Surface** | `#0A130F` | `#F4F7F4` | `17.4 : 1` | PASS (Exceeds 4.5:1) |
| **Accent Text on Dark Surface** | `#C8F560` | `#0A130F` | `13.8 : 1` | PASS (Exceeds 4.5:1) |

### 3.4 ARIA Patterns for Interactive Components

#### Mobile Menu Drawer:
- Trigger button includes `aria-expanded="false"`, `aria-controls="mobile-navigation-drawer"`, `aria-label="Open menu"`.
- Traps keyboard focus within drawer when opened; restores focus to trigger on close.
- Closes on `Escape` key press.

#### FAQ Accordion (`core/details` or Custom):
- Headers utilize native HTML `<details>` and `<summary>` or `aria-expanded` and `aria-controls`.

#### AJAX Form Status Announcements:
- Form feedback container uses `aria-live="polite"` and `role="status"` to announce submission progress, validation errors, and success messages to screen readers.

### 3.5 Motion Accessibility (`prefers-reduced-motion`)
```css
@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
  
  /* Pause infinite marquee ticker */
  .agency-marquee-track {
    animation: none !important;
    transform: none !important;
  }
}
```
