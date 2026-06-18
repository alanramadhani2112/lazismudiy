# Changelog — LAZISMU DIY

All notable development updates are tracked here.

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
