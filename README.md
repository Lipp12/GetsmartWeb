# 🌐 GetSmart Indonesia - WordPress wp-content

Repository aset dan konfigurasi tema/plugin untuk platform website **PT Get Smart Production Indonesia** (`getsmartindonesia.com`).

---

## 📁 Struktur Direktori

- `themes/`: Tema WordPress yang digunakan pada website (termasuk tema aktif `popularfx` dan template khusus `template-getsmart-production.php`).
- `plugins/`: Plugin WordPress untuk fungsionalitas website (Pagelayer, Elementor, Komunitas Tracker, Security, SEO, dll).
- `mu-plugins/`: Must-use plugins WordPress.
- `fonts/`: Aset tipografi custom.

---

## 🎨 Halaman Kustom: Get Smart Production

Template khusus halaman profil & linimasa Get Smart Production tersedia pada:
`themes/popularfx/template-getsmart-production.php`

### Cara Mengaktifkan di WordPress Admin:
1. Masuk ke **WP Admin** &rarr; **Laman (Pages)** &rarr; **Tambah Baru**.
2. Beri Judul: `Get Smart Production`.
3. Pada panel kanan (**Atribut Laman / Template**), pilih: **Get Smart Production**.
4. Klik **Terbitkan (Publish)**.
5. URL halaman akan aktif di: `https://getsmartindonesia.com/getsmart-production/`.

---

## 🔒 Kebijakan Keamanan

File sensitif seperti kredensial (`.env`, `wp-config.php`), backup arsip (`/backuply/`, `*.zip`), file dump database (`*.sql`), cache sistem, dan folder media (`/uploads/`) **secara otomatis diabaikan** oleh `.gitignore` untuk mencegah kebocoran data.

---

Hak Cipta &copy; 2024 &ndash; 2026 **PT Get Smart Production Indonesia**. Seluruh hak cipta dilindungi undang-undang.
