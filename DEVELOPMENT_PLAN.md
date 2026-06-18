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

Status: In Progress

- [x] Initialize Git repository
- [x] Add custom theme skeleton
- [x] Add custom plugin skeletons
- [x] Enable local debug mode
- [ ] Push initial structure to GitHub
- [ ] Create `develop` branch

### Phase 2 — Theme Foundation

Status: Pending

- [ ] Setup Tailwind build
- [ ] Setup Vite build
- [ ] Add base layout
- [ ] Add header/footer
- [ ] Add reusable buttons/cards/forms
- [ ] Add responsive navigation

### Phase 3 — Core Data Plugin

Status: Pending

- [ ] Register `program` CPT
- [ ] Register `campaign` CPT
- [ ] Register `impact_story` CPT
- [ ] Register `report` CPT
- [ ] Register `faq` CPT
- [ ] Register core taxonomies

### Phase 4 — Public MVP Pages

Status: Pending

- [ ] Homepage
- [ ] Profile page
- [ ] Campaign listing
- [ ] Campaign detail
- [ ] Report page
- [ ] News templates
- [ ] Contact page

### Phase 5 — Donation Basic Flow

Status: Pending

- [ ] Donation form
- [ ] Donation custom table
- [ ] Admin transaction view
- [ ] Manual transfer instruction
- [ ] Pending/paid status update

### Phase 6 — Zakat Calculator

Status: Pending

- [ ] Zakat penghasilan calculator
- [ ] Zakat maal basic calculator
- [ ] Nisab setting
- [ ] Continue to payment form

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
