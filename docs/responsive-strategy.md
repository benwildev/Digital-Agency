# Responsive Strategy & Breakpoint Matrix

## 1. Breakpoint Architecture

The theme utilizes standard modern responsive breakpoints aligned with mobile-first progressive enhancement and CSS container queries.

```css
/* Core Viewport Breakpoints */
--breakpoint-xs: 480px;   /* Small Mobile Portrait */
--breakpoint-sm: 640px;   /* Large Mobile / Phablet */
--breakpoint-md: 768px;   /* Tablet Portrait */
--breakpoint-lg: 1024px;  /* Tablet Landscape / Small Laptop (Nav collapse point) */
--breakpoint-xl: 1280px;  /* Standard Desktop Container */
--breakpoint-2xl: 1536px; /* Ultra-wide Displays */
```

---

## 2. Component Responsive Transformation Matrix

| Component | Desktop (≥ 1280px) | Laptop / Small Desktop (1024px – 1279px) | Tablet (768px – 1023px) | Mobile (< 768px) |
| :--- | :--- | :--- | :--- | :--- |
| **TopBar** | 2-col flex (Contact left, Social right) | 2-col flex | Compact single row | Hidden or Phone-only pill |
| **Header Nav** | Inline menu + CTA button | Compact inline menu | Mobile hamburger trigger | Mobile hamburger trigger |
| **Mobile Menu** | Hidden | Hidden | Fullscreen blur drawer | Fullscreen blur drawer |
| **Home Hero** | Split 60/40 layout + floating metrics | Stacked or compact split | Stacked vertical flow | Centered stack, fluid fonts |
| **Stats Strip** | 4 columns horizontal | 4 columns horizontal | 2 columns x 2 rows | 2 columns x 2 rows |
| **Services Grid**| 3 columns | 3 columns | 2 columns | 1 column full-width cards |
| **Projects Grid**| Asymmetrical 2-col / 3-col | 2 columns | 2 columns | 1 column stacked cards |
| **Process Steps**| 4 horizontal connected cards | 4 horizontal cards | 2 columns x 2 rows | 1 column vertical timeline |
| **Pricing Tables**| 3 columns (Pro highlighted) | 3 columns | 1 column (Pro first) | 1 column (Pro first) |
| **Team Grid** | 4 columns | 3 columns | 2 columns | 1 column |
| **Blog Grid** | 3 columns | 3 columns | 2 columns | 1 column |
| **Contact Page** | 2-col 50/50 (Info left, Form right)| 2-col 45/55 | Stacked (Info top, Form bottom)| Stacked vertical |
| **Footer** | 4 columns + bottom sub-bar | 4 columns | 2 columns x 2 rows | 1 column stacked |

---

## 3. Touch Targets & Mobile Ergonomics

1. **Minimum Touch Area:** All buttons, links, accordion headers, and interactive elements adhere to the Apple HIG / WCAG standard of **minimum 44px × 44px** hit area.
2. **Thumb-Zone Optimization:** Critical action buttons (Mobile Hamburger, "Book Consultation", Form Submits) are placed within easy thumb reach.
3. **No Horizontal Scroll Jank:** `overflow-x: clip` applied at the main container level, ensuring ticker marquees and animated elements never cause accidental horizontal scrolling.
4. **Form Input Auto-Zoom Prevention:** Form inputs maintain a minimum `16px` font size on mobile viewports to prevent iOS Safari from triggering unwelcome automatic zoom-ins.
