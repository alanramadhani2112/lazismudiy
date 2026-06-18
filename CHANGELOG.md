# Changelog — LAZISMU DIY

All notable development updates are tracked here.

## 0.7.0 — Payment Gateway Hold

Date: 2026-06-18

### Changed

- Marked Phase 7 payment gateway as on hold.

### Notes

- Gateway integration will continue after vendor choice is final.

## 0.6.0 — Zakat Calculator

Date: 2026-06-18

### Added

- Added zakat settings page.
- Added configurable gold price and monthly income nisab.
- Added zakat calculator shortcode: `[lazismu_zakat_calculator]`.
- Added zakat penghasilan calculation.
- Added zakat maal calculation.
- Added zakat page template.
- Added local zakat page.

### Changed

- Donation form now supports amount and type prefill from query params.
- Homepage quick action now links to zakat page.
- Updated development tracker status.
- Rebuilt theme assets.

### Verified

- `npm run build` passed.
- PHP lint passed for phase 6 files.
- Local zakat calculator returned correct estimate.
- Donation form amount prefill worked.

## 0.5.0 — Donation Basic Flow

Date: 2026-06-18

### Added

- Added donation custom tables:
  - `wp_lazismu_donations`
  - `wp_lazismu_donation_logs`
- Added donation form shortcode: `[lazismu_donation_form]`.
- Added manual transfer instruction shortcode: `[lazismu_donation_instruction]`.
- Added donation admin menu.
- Added manual status update for donation records.
- Added donation and instruction page templates.
- Added local donation pages.

### Changed

- Updated homepage donation CTA.
- Updated development tracker status.
- Rebuilt theme assets.

### Verified

- `npm run build` passed.
- PHP lint passed for phase 5 files.
- Local donation form page returned HTTP 200.
- Local donation instruction page returned HTTP 200.

## 0.4.0 — Public MVP Pages

Date: 2026-06-18

### Added

- Added homepage template with hero, campaign, report, and article sections.
- Added campaign archive and detail templates.
- Added report archive and detail templates.
- Added news index and single post templates.
- Added profile page template.
- Added contact page template.
- Added reusable cards for campaign, report, and article content.
- Added basic article content styling.

### Changed

- Updated development tracker status.
- Rebuilt theme assets.

### Verified

- `npm run build` passed.
- PHP lint passed for phase 4 theme files.

## 0.3.0 — Core Data Plugin

Date: 2026-06-18

### Added

- Registered custom post types:
  - `program`
  - `campaign`
  - `impact_story`
  - `report`
  - `faq`
- Registered core taxonomies:
  - `program_category`
  - `donation_type`
  - `beneficiary_type`
  - `location`
  - `asnaf_category`
  - `report_period`
- Added rewrite flush on plugin activation/deactivation.

### Changed

- Updated development tracker status.

### Verified

- PHP lint passed for core plugin files.

## 0.2.0 — Theme Foundation

Date: 2026-06-18

### Added

- Added Tailwind CSS build config.
- Added Vite build config.
- Added PostCSS config.
- Added frontend build scripts.
- Added compiled theme assets.
- Added base Tailwind component classes:
  - `container-site`
  - `btn-primary`
  - `btn-secondary`
  - `card-base`
  - `input-base`
- Added responsive header navigation toggle.
- Added homepage starter hero and quick action layout.

### Changed

- Updated theme enqueue to load built CSS/JS assets.
- Updated footer layout.
- Updated development tracker status.

### Verified

- `npm run build` passed.
- PHP lint passed for changed theme files.

## 0.1.0 — Project Foundation

Date: 2026-06-18

### Added

- Initialized Git repository.
- Added custom theme skeleton: `lazismu-diy`.
- Added theme bootstrap files.
- Added theme setup, enqueue, and menu registration.
- Added base header, footer, and main template.
- Added source asset folders for CSS and JS.
- Added custom plugin skeletons:
  - `lazismu-core`
  - `lazismu-donation`
  - `lazismu-zakat`
  - `lazismu-reporting`
- Added `.gitignore` to track custom code only.

### Changed

- Enabled local WordPress debug mode.

### Verified

- PHP lint passed for theme and plugin skeleton files.

### Pending

- Activate theme and plugins from WordPress Admin.
- Push initial structure to GitHub.
- Create `develop` branch.
