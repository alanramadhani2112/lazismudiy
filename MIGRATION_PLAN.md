# Migration Plan — LAZISMU DIY

Status: Draft
Date: 2026-06-18

## Priority Content

### Must migrate

- Profil lembaga
- Visi dan misi
- Struktur pengelola
- Legalitas/kebijakan lembaga
- Program enam pilar:
  - Pendidikan
  - Kesehatan
  - Ekonomi
  - Kemanusiaan
  - Sosial Dakwah
  - Lingkungan
- Campaign aktif/penting
- Berita prioritas
- Artikel edukasi zakat prioritas
- Laporan keuangan 2018–2024
- Rekening donasi canonical
- Layanan donatur:
  - Jemput Donasi
  - Ambulance
  - Konsultasi Online
  - Zakat Online
- Kontak resmi dan sosial media

### Needs backend validation

- Data DonasiAja campaign/donasi/transaksi
- Elementor page metadata
- File laporan PDF valid
- Rekening donasi final
- Rank Math metadata
- URL lama final

## Migration Order

1. Backup website lama.
2. Export WordPress content.
3. Audit DonasiAja tables/options.
4. Audit Elementor post meta.
5. Validate rekening canonical.
6. Validate laporan PDFs.
7. Import pages/posts/media priority.
8. Create program/campaign/report data.
9. Apply redirect mapping.
10. QA migrated content.

## Blockers

- No backend/wp-admin/database access to old production yet.
- Payment gateway is on hold.
- DonasiAja schema unknown.
