# Homepage Visual Map & Section Architecture

## 1. Overview & Section Sequence

The homepage (`templates/front-page.html`) composes the full visual narrative for the Digital Marketing Agency WordPress Block Theme. The section sequence strictly follows the approved visual analysis blueprint:

1. **Global Top Bar** (`parts/topbar.html`)
2. **Sticky Main Header** (`parts/header.html`)
3. **Hero Section** (`patterns/home-hero.php`)
4. **Service Marquee / Ticker** (`parts/service-marquee.html`)
5. **Statistics & Metrics Strip** (`patterns/home-stats.php`)
6. **Services Showcase (3-Column Grid)** (`patterns/home-services.php`)
7. **Differentiation / Why Choose Us** (`patterns/home-why-us.php`)
8. **4-Step Process & Workflow** (`patterns/home-process.php`)
9. **Awards & Recognition Strip** (`patterns/home-awards.php`)
10. **Featured Case Studies Preview** (`patterns/home-projects.php`)
11. **Testimonials & Social Proof** (`patterns/home-testimonials.php`)
12. **Team Leadership Preview** (`patterns/home-team.php`)
13. **Latest Insights & Articles** (`patterns/home-blog.php`)
14. **FAQ Accordion** (`patterns/home-faq.php`)
15. **Lead Capture / Consultation CTA** (`patterns/home-cta.php`)
16. **Global Newsletter Card** (`parts/newsletter.html`)
17. **Global 4-Column Footer** (`parts/footer.html`)

---

## 2. Detailed Section Specifications

| Section | Container Width | Background | Primary Typography | Card/Grid Structure | Dynamic Data Source |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **Hero** | Wide (`1400px`) | `surface-dark-base` (`#0A130F`) | Syne Display Large + Inter | 2-Column Split (Headline/CTAs + Visual Card) | Page / Pattern / Settings |
| **Marquee Ticker** | Full (`100%`) | `surface-dark-elevated` (`#172C23`) | Syne Bold Uppercase (`18px`) | Continuous flex row | `service` CPT titles |
| **Stats Strip** | Wide (`1400px`) | `surface-dark-card` (`#11221B`) | Syne Display (`48px`) + Inter | 4-Column Metric Counter Grid | Pattern editable fields |
| **Services Grid** | Content (`1200px`) | `surface-dark-base` (`#0A130F`) | Syne Heading 2 (`40px`) | 3-Column Dark Card Grid (`#11221B`) | `service` CPT query |
| **Why Choose Us** | Content (`1200px`) | `surface-dark-card` (`#11221B`) | Syne Heading 2 + Inter | 50/50 Split (Benefits + B&W Media) | Pattern + Settings |
| **Process Steps** | Content (`1200px`) | `surface-dark-base` (`#0A130F`) | Syne Heading 2 + Inter | 4-Column Numbered Horizontal Cards | Pattern editable fields |
| **Awards Strip** | Wide (`1400px`) | `surface-dark-elevated` (`#172C23`)| Inter Bold Uppercase | 4-Column Credential Badges | Pattern editable fields |
| **Projects Showcase**| Wide (`1400px`) | `surface-dark-base` (`#0A130F`) | Syne Heading 2 + Inter | 2-Column Asymmetrical Project Grid | `project` CPT query |
| **Testimonials** | Content (`1200px`) | `surface-dark-card` (`#11221B`) | Syne Quote Display + Inter | 3-Column Review Cards with 5-Stars | `testimonial` CPT query |
| **Team Leadership**| Content (`1200px`) | `surface-dark-base` (`#0A130F`) | Syne Heading 2 + Inter | 4-Column Monochrome Portrait Cards | `team_member` CPT query |
| **Latest Insights** | Content (`1200px`) | `surface-dark-base` (`#0A130F`) | Syne Heading 2 + Inter | 3-Column Blog Cards with Reading Time | Core `post` query |
| **FAQ Accordion** | Content (`1200px`) | `surface-dark-card` (`#11221B`) | Syne Heading 2 + Inter | 2-Column (Heading + Accessible `<details>`) | Pattern editable fields |
| **Lead Form CTA** | Wide (`1400px`) | `surface-dark-elevated` + Lime Glow | Syne Display Large + Inter | 2-Column (Pitch + Consultation Form) | Settings / Lead Form |
| **Newsletter** | Content (`1200px`) | `surface-dark-card` (`#11221B`) | Syne Heading 2 + Inter | 2-Column (Copy + Email Form) | Settings / Part |
| **Footer** | Wide (`1400px`) | `surface-dark-card` (`#11221B`) | Syne Heading 4 + Inter | 4-Column Directory + Bottom Bar | Settings / Services / Part |
