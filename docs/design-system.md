# Design System & Token Architecture

## 1. Color System (Tokens & Roles)

The color palette is engineered for high contrast, dark-mode authority, and vibrant neon accents. All colors map to CSS custom properties `--wp--preset--color--*` via `theme.json`.

```
================================================================================
PALETTE TOKENS (CSS VARIABLES & THEME.JSON MAPPINGS)
================================================================================
```

### 1.1 Brand & Accent Tokens
| Token Slug | Hex Value | HSL Value | Semantic Role |
| :--- | :--- | :--- | :--- |
| `primary-accent` | `#C8F560` | `hsl(78, 88%, 67%)` | Primary high-energy Lime Accent (CTAs, badge highlights, active indicators) |
| `primary-accent-hover`| `#B4E846`| `hsl(79, 79%, 59%)` | Darker Lime hover state for buttons and links |
| `secondary-accent` | `#A3E635` | `hsl(83, 78%, 55%)` | Secondary green accent for chart fills, subheadings, metrics |
| `accent-subtle` | `rgba(200, 245, 96, 0.12)` | `hsla(78, 88%, 67%, 0.12)` | Tinted pill backgrounds, active state glow, badge containers |

### 1.2 Surface & Background Tokens
| Token Slug | Hex Value | HSL Value | Semantic Role |
| :--- | :--- | :--- | :--- |
| `surface-dark-base` | `#0A130F` | `hsl(154, 33%, 6%)` | Main dark background for headers, footers, and dark sections |
| `surface-dark-card` | `#11221B` | `hsl(155, 33%, 10%)` | Card surface color on dark backgrounds |
| `surface-dark-elevated`| `#172C23`| `hsl(156, 31%, 13%)`| Hover states for cards, dropdown menus, modal dialogs |
| `surface-light-base`| `#F4F7F4` | `hsl(120, 11%, 96%)`| Light section background for split-tone contrast |
| `surface-light-card`| `#FFFFFF` | `hsl(0, 0%, 100%)` | Clean white card backgrounds on light surfaces |
| `surface-white` | `#FFFFFF` | `hsl(0, 0%, 100%)` | Absolute pure white |

### 1.3 Text & Foreground Tokens
| Token Slug | Hex Value | HSL Value | Semantic Role |
| :--- | :--- | :--- | :--- |
| `text-light-primary`| `#FFFFFF` | `hsl(0, 0%, 100%)` | Primary headings and text on dark backgrounds |
| `text-light-secondary`| `#CBD5E1`| `hsl(214, 32%, 84%)`| Body copy, subheadings, and descriptions on dark backgrounds |
| `text-light-muted` | `#94A3B8` | `hsl(215, 16%, 65%)`| Metadata, dates, reading times, footer secondary links |
| `text-dark-primary` | `#0A130F` | `hsl(154, 33%, 6%)` | Primary headings on light backgrounds |
| `text-dark-secondary` | `#334155`| `hsl(215, 25%, 27%)`| Body copy on light backgrounds |
| `text-dark-muted` | `#64748B` | `hsl(215, 16%, 47%)`| Metadata and secondary labels on light backgrounds |

### 1.4 Border & Stroke Tokens
| Token Slug | Hex Value | HSL Value | Semantic Role |
| :--- | :--- | :--- | :--- |
| `border-dark-subtle`| `rgba(255, 255, 255, 0.08)` | `hsla(0, 0%, 100%, 0.08)` | Hairline dividers, subtle card borders on dark background |
| `border-dark-strong`| `#273B32` | `hsl(153, 20%, 19%)`| Active card borders, form input borders on dark background |
| `border-light-subtle`| `#E2E8F0`| `hsl(214, 32%, 91%)`| Card borders and table borders on light background |
| `border-accent` | `#C8F560` | `hsl(78, 88%, 67%)` | Highlighted cards (e.g. Featured Pricing Tier) |

---

## 2. Typography System

### 2.1 Font Family Stacks
- **Display & Headings:** `'Syne', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif`
  - *Characteristics:* High geometric character, distinctive wide glyphs, punchy modern agency authority.
  - *Fallbacks:* System sans-serif.
- **Body & Interface:** `'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif`
  - *Characteristics:* Exceptional readability at small sizes, clean neutral numerals, high legibility.
  - *Fallbacks:* System sans-serif.

### 2.2 Fluid Type Scale (`clamp()`)
All type sizes are calculated using standard fluid typography formulas between a `375px` mobile viewport and a `1440px` desktop viewport.

| Scale Token | Font Size (Mobile → Desktop) | CSS `clamp()` Value | Line Height | Letter Spacing | Font Weight |
| :--- | :--- | :--- | :--- | :--- | :--- |
| `display-hero` | `42px` → `84px` | `clamp(2.625rem, 1.8rem + 4.2vw, 5.25rem)` | `1.05` | `-0.035em` | `700` (Bold) |
| `heading-1` (H1) | `36px` → `64px` | `clamp(2.25rem, 1.6rem + 3.2vw, 4.00rem)` | `1.10` | `-0.03em` | `700` (Bold) |
| `heading-2` (H2) | `28px` → `48px` | `clamp(1.75rem, 1.3rem + 2.2vw, 3.00rem)` | `1.15` | `-0.025em` | `700` (Bold) |
| `heading-3` (H3) | `22px` → `32px` | `clamp(1.375rem, 1.15rem + 1.1vw, 2.00rem)` | `1.25` | `-0.02em` | `600` (SemiBold) |
| `heading-4` (H4) | `18px` → `24px` | `clamp(1.125rem, 1.0rem + 0.6vw, 1.50rem)` | `1.35` | `-0.01em` | `600` (SemiBold) |
| `body-large` | `18px` → `20px` | `clamp(1.125rem, 1.05rem + 0.3vw, 1.25rem)`| `1.60` | `0` | `400` / `500` |
| `body-regular` | `15px` → `16px` | `clamp(0.9375rem, 0.9rem + 0.2vw, 1.00rem)`| `1.65` | `0` | `400` (Regular) |
| `body-small` | `13px` → `14px` | `clamp(0.8125rem, 0.78rem + 0.15vw, 0.875rem)` | `1.50` | `0.01em` | `400` / `500` |
| `caption-eyebrow`| `11px` → `12px` | `clamp(0.6875rem, 0.65rem + 0.1vw, 0.75rem)` | `1.40` | `0.12em` (Uppercase) | `700` (Bold) |

---

## 3. Spacing Scale (Tokens & Rhythm)

Standard 8-point geometric progression with fluid scaling for large section paddings.

| Spacing Token | CSS Value | Use Case |
| :--- | :--- | :--- |
| `space-1` (4px) | `0.25rem` | Micro badges, inline tags padding, icon-text gap |
| `space-2` (8px) | `0.50rem` | Button gap, list item vertical spacing, tag padding |
| `space-3` (12px) | `0.75rem` | Small card gap, badge padding, breadcrumb gap |
| `space-4` (16px) | `1.00rem` | Mobile grid gap, standard form input padding |
| `space-5` (20px) | `1.25rem` | Mobile card padding, navigation item padding |
| `space-6` (24px) | `1.50rem` | Tablet grid gap, standard card padding |
| `space-8` (32px) | `2.00rem` | Desktop grid gap, large card padding |
| `space-10` (40px) | `2.50rem` | Inner section spacing, modal container padding |
| `space-12` (48px) | `3.00rem` | Mobile section padding, hero bottom spacing |
| `space-16` (64px) | `4.00rem` | Tablet section padding, sub-block separation |
| `space-20` (80px) | `5.00rem` | Standard inner page section padding |
| `space-24` (96px) | `6.00rem` | Desktop major section padding |
| `space-32` (128px)| `8.00rem` | Homepage hero top/bottom padding, major CTA gaps |

---

## 4. Border Radius & Shape System

| Radius Token | Value | Applied Elements |
| :--- | :--- | :--- |
| `radius-none` | `0px` | Ticker bars, full-width edge-to-edge banners |
| `radius-sm` | `6px` | Small badges, form inputs, tooltips |
| `radius-md` | `12px` | Standard cards, pricing tier containers, code blocks |
| `radius-lg` | `20px` | Large feature cards, portfolio showcase containers, testimonial boxes |
| `radius-xl` | `32px` | Hero image containers, modal windows, floating panels |
| `radius-pill` | `9999px` | Buttons, navigation links, category filter pills, status badges |
| `radius-full` | `50%` | Avatars, social icon circular buttons, scroll-to-top button |

---

## 5. Elevation & Shadow System

```css
/* Subtle Dark Elevation */
--agency-shadow-dark-sm: 0 2px 8px rgba(0, 0, 0, 0.4);
--agency-shadow-dark-md: 0 8px 24px rgba(0, 0, 0, 0.5), 0 0 1px rgba(255, 255, 255, 0.1);
--agency-shadow-dark-lg: 0 16px 48px rgba(0, 0, 0, 0.65), 0 0 1px rgba(255, 255, 255, 0.15);

/* Accent Glow Elevation */
--agency-shadow-accent-glow: 0 0 32px rgba(200, 245, 96, 0.25), 0 4px 16px rgba(0, 0, 0, 0.3);
--agency-shadow-accent-subtle: 0 0 16px rgba(200, 245, 96, 0.12);

/* Light Surface Elevation */
--agency-shadow-light-sm: 0 1px 3px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0, 0, 0, 0.06);
--agency-shadow-light-md: 0 4px 16px -2px rgba(0, 0, 0, 0.08), 0 2px 6px -1px rgba(0, 0, 0, 0.04);
--agency-shadow-light-lg: 0 12px 32px -4px rgba(0, 0, 0, 0.10), 0 4px 12px -2px rgba(0, 0, 0, 0.05);
```

---

## 6. Motion & Transition System

All animations follow strict easing curves for an organic, premium agency feel.

```css
/* Easing Tokens */
--agency-ease-out: cubic-bezier(0.16, 1, 0.3, 1);     /* Smooth deceleration */
--agency-ease-in-out: cubic-bezier(0.65, 0, 0.35, 1); /* Symmetrical acceleration */
--agency-ease-bounce: cubic-bezier(0.34, 1.56, 0.64, 1); /* Subtle overshoot */

/* Duration Tokens */
--agency-duration-fast: 150ms;   /* Button hover, color switch */
--agency-duration-normal: 300ms; /* Card hover, dropdown reveal, tab switch */
--agency-duration-slow: 500ms;   /* Modal open, mobile menu drawer, image zoom */
--agency-duration-crawl: 25s;    /* Continuous ticker marquee scroll */
```
