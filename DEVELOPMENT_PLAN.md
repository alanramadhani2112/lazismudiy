# Development Plan — LAZISMU DIY

Repository: https://github.com/alanramadhani2112/lazismudiy

## Branch Strategy

- `main`: stable code only.
- `develop`: integration branch.
- `feature/*`: feature work.
- `fix/*`: bug fixes.
- `release/*`: launch preparation.

## Commit Format

Use small commits:

```text
<type>: <short summary>
```

Types:

- `setup`: project setup
- `theme`: theme/UI work
- `plugin`: plugin/backend work
- `content`: dummy/content migration work
- `fix`: bug fix
- `docs`: documentation
- `chore`: tooling/config

Examples:

```text
setup: add WordPress custom theme skeleton
theme: add homepage hero section
plugin: register campaign post type
fix: escape campaign title output
```

## Update Tracking

Every development update must include:

1. Code change.
2. `CHANGELOG.md` entry.
3. Git commit.
4. Push to GitHub branch.
5. Merge to `develop` after checked.
6. Merge to `main` only when stable.

## Phase Tracker

### Phase 1 — Project Foundation

Status: Done

- [x] Initialize Git repository
- [x] Add custom theme skeleton
- [x] Add custom plugin skeletons
- [x] Enable local debug mode
- [x] Push initial structure to GitHub
- [x] Create `develop` branch

### Phase 2 — Theme Foundation

Status: Done

- [x] Setup Tailwind build
- [x] Setup Vite build
- [x] Add base layout
- [x] Add header/footer
- [x] Add reusable buttons/cards/forms
- [x] Add responsive navigation

### Phase 3 — Core Data Plugin

Status: Done

- [x] Register `program` CPT
- [x] Register `campaign` CPT
- [x] Register `impact_story` CPT
- [x] Register `report` CPT
- [x] Register `faq` CPT
- [x] Register core taxonomies

### Phase 4 — Public MVP Pages

Status: Done

- [x] Homepage
- [x] Profile page
- [x] Campaign listing
- [x] Campaign detail
- [x] Report page
- [x] News templates
- [x] Contact page

### Phase 5 — Donation Basic Flow

Status: Done

- [x] Donation form
- [x] Donation custom table
- [x] Admin transaction view
- [x] Manual transfer instruction
- [x] Pending/paid status update

### Phase 6 — Zakat Calculator

Status: Done

- [x] Zakat penghasilan calculator
- [x] Zakat maal basic calculator
- [x] Nisab setting
- [x] Continue to payment form

### Phase 7 — Payment Gateway

Status: Pending

- [ ] Choose gateway
- [ ] Sandbox integration
- [ ] Webhook handler
- [ ] Signature validation
- [ ] Status sync

### Phase 8 — Migration & Launch

Status: Pending

- [ ] Audit old content
- [ ] Audit DonasiAja data
- [ ] Audit Elementor content
- [ ] Migrate priority content
- [ ] Redirect mapping
- [ ] QA checklist
- [ ] Production launch
