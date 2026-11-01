/**
 * DIGITAKA — Digital Studio
 * digitaka.js — Unified Vanilla JavaScript (Homepage + Products + Services)
 * Gabungan dari: script.js, products.js, services.js (duplikat dihapus)
 * No frameworks. Satu file untuk semua halaman — setiap modul otomatis
 * hanya aktif jika elemen DOM halaman terkait ditemukan.
 *
 * DAFTAR ISI
 * 1.  Data: Produk Homepage (DIGITAKA_PRODUCTS)
 * 2.  Data: Produk Storefront (PRODUCTS_DATA)
 * 3.  Utilitas Bersama (modal, toast, submit form)
 * 4.  UI Bersama (navbar, mobile nav, scroll reveal, smooth scroll)
 * 5.  Modul Homepage
 * 6.  Modul Halaman Produk (Storefront)
 * 7.  Modul Halaman Layanan (Services)
 * 8.  Inisialisasi (DOMContentLoaded)
 */

'use strict';

/* ═════════════════════════════════════════════════════════════
   1. DATA: PRODUK HOMEPAGE
   ═════════════════════════════════════════════════════════════ */
const DIGITAKA_PRODUCTS = [
  {
    id: 'prod-01',
    title: 'Template Website Bisnis & Agensi',
    category: 'Template Website',
    categorySlug: 'template-web',
    price: 'Rp 189.000',
    priceNote: 'Lisensi Reguler / Sekali Bayar',
    badge: 'Populer',
    desc: 'Template website profil perusahaan dan UMKM dengan desain editorial kontemporer, 8 tata letak seksi siap pakai, dan optimasi performa tinggi.',
    features: [
      'HTML5 semantik & CSS3 kustom',
      'Responsif 100% (Desktop, Tablet, Smartphone)',
      'Dokumentasi setup & panduan penyesuaian teks',
      'Bebas dependensi framework JavaScript rumit'
    ],
    format: 'Source Code HTML/CSS/JS + Dokumentasi PDF',
    previewType: 'website'
  },
  {
    id: 'prod-02',
    title: 'Dashboard Admin Bootstrap 5',
    category: 'Dashboard UI',
    categorySlug: 'dashboard',
    price: 'Rp 249.000',
    priceNote: 'Termasuk Pembaruan Komponen',
    badge: 'Terlaris',
    desc: 'Template dashboard manajemen bisnis dan aplikasi web dengan kartu metrik analitik, tabel data filterable, kalender kegiatan, dan formulir validasi.',
    features: [
      'Komponen Bootstrap 5 termodifikasi',
      'Mode visual berkarakter & kontras tinggi',
      'Chart.js & icon pack siap pakai',
      'Struktur folder rapi untuk integrasi backend'
    ],
    format: 'Template UI Kit + Contoh Data JSON',
    previewType: 'dashboard'
  },
  {
    id: 'prod-03',
    title: 'Template Administrasi Sekolah & Madrasah',
    category: 'Lembaga Pendidikan',
    categorySlug: 'sekolah',
    price: 'Rp 299.000',
    priceNote: 'Lisensi Institusi / Multi-Pengguna',
    badge: 'Spesial Pendidikan',
    desc: 'Paket lengkap antarmuka sistem informasi sekolah: portal berita publik, direktori guru, informasi PPDB daring, dan rekap pengumuman akademik.',
    features: [
      'Struktur navigasi standar sekolah Indonesia',
      'Modul formulir pendaftaran siswa baru',
      'Bagian jadwal pelajaran & kalender akademik',
      'Desain ramah pembaca untuk orang tua & siswa'
    ],
    format: 'Template Web Lengkap + Template Dokumen',
    previewType: 'school'
  },
  {
    id: 'prod-04',
    title: 'Starter Kit Web Application',
    category: 'Source Code',
    categorySlug: 'source-code',
    price: 'Rp 349.000',
    priceNote: 'Untuk Pengembang & Tim IT',
    badge: 'Arsitektur Rapi',
    desc: 'Fondasi antarmuka aplikasi web terstruktur dengan komponen autentikasi, manajemen hak akses, tata letak dinamis, dan sistem notifikasi.',
    features: [
      'Komponen UI modular (cards, dialogs, drawers)',
      'Utility validasi input & formatting angka/rupiah',
      'Desain konsisten berstandar Swiss Grid',
      'Panduan integrasi API RESTful'
    ],
    format: 'Source Code Frontend Lengkap',
    previewType: 'code'
  },
  {
    id: 'prod-05',
    title: 'UI Kit & Component Library',
    category: 'UI Kit',
    categorySlug: 'ui-kit',
    price: 'Rp 149.000',
    priceNote: 'Akses Selamanya',
    badge: 'Produktivitas',
    desc: 'Koleksi 60+ komponen antarmuka web kustom: tombol variatif, input formulir, accordion editorial, tabel interaktif, dan kartu konten.',
    features: [
      'CSS Custom Properties (Variables) lengkap',
      'Tipografi harmonis dengan Typescale modular',
      'Aksesibilitas ramah keyboard & screen reader',
      'Snippet HTML siap salin dan tempel'
    ],
    format: 'CSS Style Guide + Demo HTML Interaktif',
    previewType: 'uikit'
  },
  {
    id: 'prod-06',
    title: 'Panduan Digitalisasi Sekolah & UMKM',
    category: 'Materi Pembelajaran',
    categorySlug: 'ebook',
    price: 'Rp 79.000',
    priceNote: 'Format PDF E-Book Praktis',
    badge: 'E-Book',
    desc: 'Buku panduan strategis langkah demi langkah merencanakan, membangun, dan mengelola kehadiran digital untuk sekolah, yayasan, dan UMKM lokal.',
    features: [
      'Checklist audit kebutuhan website sekolah/bisnis',
      'Tips memilih hosting & domain terjangkau',
      'Struktur konten yang menarik kepercayaan publik',
      'Template dokumen spesifikasi kebutuhan sistem'
    ],
    format: 'E-Book PDF 85 Halaman + Template Lembar Kerja',
    previewType: 'ebook'
  }
];

/* ═════════════════════════════════════════════════════════════
   2. DATA: PRODUK STOREFRONT (HALAMAN PRODUK)
   ═════════════════════════════════════════════════════════════ */
const PRODUCTS_DATA = [
  {
    id: 'prod-edusite',
    name: 'EduSite — Template Website Sekolah & Madrasah',
    category: 'template-html',
    categoryName: 'Template HTML',
    license: 'personal',
    licenseName: 'Lisensi Standar (1 Lembaga/Situs)',
    price: 149000,
    priceDisplay: 'Rp 149.000',
    priceNote: 'Sekali Bayar · Tanpa Biaya Berlangganan',
    badge: 'Popular',
    version: 'v2.2 (Terbaru)',
    updatedDate: 'Oktober 2024',
    previewType: 'school',
    shortDesc: 'Template website resmi untuk sekolah, madrasah, dan pesantren dengan halaman profil, pengumuman akademik, galeri, dan formulir PPDB online.',
    fullDesc: 'EduSite dirancang khusus untuk memfasilitasi kebutuhan publikasi institusi pendidikan formal dan non-formal di Indonesia. Dengan tata letak yang ramah bagi orang tua murid dan siswa, website ini memprioritaskan keterbacaan informasi penting seperti jadwal penerimaan siswa baru, direktori guru, serta rekap kegiatan sekolah.',
    features: [
      '8 Halaman siap pakai (Beranda, Profil, Guru, Fasilitas, Berita, Pengumuman, PPDB, Kontak)',
      'Formulir pendaftaran PPDB online berbasis HTML5 dengan validasi input ramah pengguna',
      'Galeri foto kegiatan dan rekap prestasi siswa dengan tata letak grid responsif',
      'Optimasi kecepatan muat instan (Skor PageSpeed 95+ tanpa beban JavaScript berat)',
      'Kode semantik rapi berstandar W3C serta ramah mesin pencari (SEO)'
    ],
    technologies: ['HTML5 Semantik', 'CSS3 Modern', 'Vanilla JavaScript', 'Bootstrap Icons'],
    filesIncluded: ['Kode Sumber Lengkap (.html, .css, .js)', 'Panduan Setup & Kustomisasi (.pdf)', 'Asset Ikon & Gambar Contoh'],
    compatibility: 'Semua peramban modern (Chrome, Safari, Edge, Firefox) dan peramban mobile smartphone.',
    licenseTerms: 'Dapat digunakan untuk 1 website institusi/klien. Bebas memodifikasi konten, tata letak, dan skema warna.'
  },
  {
    id: 'prod-adminkit',
    name: 'AdminKit Pro — Dashboard Admin Bootstrap 5',
    category: 'dashboard-admin',
    categoryName: 'Dashboard Admin',
    license: 'commercial',
    licenseName: 'Lisensi Komersial (Pengembang)',
    price: 249000,
    priceDisplay: 'Rp 249.000',
    priceNote: 'Termasuk Pembaruan Komponen',
    badge: 'Popular',
    version: 'v3.1',
    updatedDate: 'Januari 2025',
    previewType: 'dashboard',
    shortDesc: 'Dashboard manajemen bisnis dan aplikasi web modern dengan kartu analitik, visualisasi chart, tabel data terfilter, dan modul form lengkap.',
    fullDesc: 'AdminKit Pro menghadirkan estetika editorial bersih yang jauh dari kesan kaku dashboard Bootstrap standar. Dibangun dengan grid modular dan variabel CSS kustom untuk memudahkan pengembang mengintegrasikan backend seperti Laravel, Express, Django, atau sistem REST API.',
    features: [
      '20+ Template tampilan halaman (Analitik, Penjualan, Manajemen User, Log Aktivitas, Pengaturan)',
      '40+ Komponen antarmuka kustom (Cards, Modals, Drawers, Datepickers, Toast Alerts)',
      'Tabel data interaktif dengan pencarian klien, sortir kolom, dan penomoran halaman',
      'Integrasi Chart.js dengan palet warna studio DIGITAKA yang harmonis',
      'Struktur folder modular dengan pemisahan rapi antara asset CSS dan skrip JavaScript'
    ],
    technologies: ['Bootstrap 5.3', 'CSS Custom Properties', 'Chart.js', 'Vanilla JS'],
    filesIncluded: ['Template UI Lengkap (.html, .css, .js)', 'Contoh Dataset Dummy (.json)', 'Panduan Integrasi Backend (.pdf)'],
    compatibility: 'Bootstrap 5.3+, Node.js/Vite environment, serta integrasi backend PHP/Python/Node.',
    licenseTerms: 'Dapat digunakan untuk proyek komersial klien tanpa batas jumlah instalasi internal.'
  },
  {
    id: 'prod-bizprofile',
    name: 'BizProfile — Template Website Bisnis & UMKM',
    category: 'template-bootstrap',
    categoryName: 'Template Bootstrap',
    license: 'personal',
    licenseName: 'Lisensi Standar (1 Usaha/Klien)',
    price: 129000,
    priceDisplay: 'Rp 129.000',
    priceNote: 'Sekali Bayar · Akses Selamanya',
    badge: 'New',
    version: 'v1.4',
    updatedDate: 'Februari 2025',
    previewType: 'website',
    shortDesc: 'Template profil usaha untuk UMKM, agensi kreatif, dan konsultan profesional dengan bagian katalog produk dan tombol pemesanan WhatsApp cepat.',
    fullDesc: 'BizProfile memadukan gaya editorial modern dan efektivitas konversi penjualan bagi pelaku usaha lokal. Dilengkapi komponen floating WhatsApp CTA yang memungkinkan pengunjung langsung terhubung ke layanan pelanggan tanpa melewati alur rumit.',
    features: [
      '6 Pilihan variasi hero section sesuai karakter industri usaha',
      'Bagian etalase layanan dan katalog produk dengan label harga jelas',
      'Komponen FAQ interaktif dan slider testimoni pelanggan tanpa jQuery',
      'Tombol WhatsApp pintar dengan template pesan terisi otomatis',
      'Kecepatan muat ringan (< 400KB total ukuran halaman awal)'
    ],
    technologies: ['Bootstrap 5.3', 'HTML5', 'CSS3 Variables', 'Bootstrap Icons'],
    filesIncluded: ['File HTML Lengkap', 'File CSS Kustom Terkompresi & Unminified', 'Dokumentasi Panduan (.pdf)'],
    compatibility: 'Optimal pada layar desktop 1440px, laptop 1366px, tablet 768px, hingga smartphone 360px.',
    licenseTerms: 'Cocok untuk website tunggal pemilik bisnis atau 1 proyek pembuatan web klien.'
  },
  {
    id: 'prod-sppd',
    name: 'SPPD Online — Source Code Sistem Perjalanan Dinas',
    category: 'source-code',
    categoryName: 'Source Code Aplikasi',
    license: 'commercial',
    licenseName: 'Lisensi Komersial (Pengembang)',
    price: 349000,
    priceDisplay: 'Rp 349.000',
    priceNote: 'Source Code Terbuka · Siap Pakai',
    badge: 'New',
    version: 'v2.0',
    updatedDate: 'Desember 2024',
    previewType: 'code',
    shortDesc: 'Aplikasi web manajemen surat tugas dan lembar SPPD instansi dengan kalkulasi otomatis biaya perjalanan dinas dan ekspor format cetak resmi PDF.',
    fullDesc: 'Aplikasi web siap pakai untuk memangkas proses administrasi manual pembuatan surat perintah perjalanan dinas (SPPD). Dilengkapi hak akses berjenjang (Staff, Bendahara, Pimpinan) untuk verifikasi pengeluaran dana dan cetak lembar SPPD standar instansi.',
    features: [
      'Manajemen nomor surat dinas otomatis dan tanggal penugasan terverifikasi',
      'Kalkulasi rincian biaya uang harian, akomodasi, dan transportasi',
      'Format cetak standar SPPD siap print langsung atau ekspor file PDF',
      'Dashboard laporan realisasi anggaran perjalanan dinas per triwulan',
      'Arsitektur MVC sederhana tanpa enkripsi kode (100% open editable code)'
    ],
    technologies: ['PHP 8.1+', 'MySQL / MariaDB', 'Bootstrap 5', 'DomPDF', 'Vanilla JS'],
    filesIncluded: ['Source Code Lengkap (.php)', 'Skrip Database (.sql)', 'Panduan Instalasi di cPanel & Localhost (.pdf)'],
    compatibility: 'PHP 8.0 - 8.3, Apache/Nginx web server, MySQL 5.7+ atau MariaDB 10.3+.',
    licenseTerms: 'Dapat dimodifikasi dan diimplementasikan untuk instansi atau klien tanpa batasan masa berlaku.'
  },
  {
    id: 'prod-schooladmin',
    name: 'SchoolAdmin — Template Antarmuka Administrasi Sekolah',
    category: 'template-administrasi',
    categoryName: 'Template Administrasi',
    license: 'personal',
    licenseName: 'Lisensi Standar (1 Sekolah)',
    price: 219000,
    priceDisplay: 'Rp 219.000',
    priceNote: 'Lisensi Sekolah / Multi-Staf',
    badge: 'Updated',
    version: 'v1.8',
    updatedDate: 'November 2024',
    previewType: 'schooladmin',
    shortDesc: 'Antarmuka komprehensif bagi tenaga tata usaha sekolah untuk mengelola data induk siswa, mutasi, presensi guru, serta jadwal pelajaran.',
    fullDesc: 'SchoolAdmin memberikan solusi visual terpadu bagi staf administrasi sekolah dasar hingga menengah. Didesain dengan alur kerja sekolah di Indonesia, memudahkan staf dalam mengorganisir data buku induk siswa dan rekap presensi kelas.',
    features: [
      'Format tabel data induk siswa (NISN, Nama, Rombel, Status Keaktifan)',
      'Modul rekap absensi harian dan rekap semester siap cetak',
      'Tata kelola jadwal pelajaran per semester dan alokasi ruang kelas',
      'Antarmuka ramah pengguna dengan tombol pintas dan navigasi keyboard',
      'Fitur filter multi-kriteria untuk menemukan data siswa dalam hitungan detik'
    ],
    technologies: ['HTML5 Semantik', 'CSS3 Grid & Flexbox', 'Bootstrap 5', 'Vanilla JS'],
    filesIncluded: ['Template Halaman Administrasi (.html)', 'CSS & JS Terstruktur', 'Template Format Excel Contoh (.xlsx)'],
    compatibility: 'Dioptimalkan untuk komputer kantor TU (Desktop, Laptop, dan Tablet).',
    licenseTerms: 'Berlaku untuk 1 lembaga pendidikan dengan staf tak terbatas dalam jaringan sekolah.'
  },
  {
    id: 'prod-studiokit',
    name: 'StudioKit — UI Kit & Component Library',
    category: 'ui-kit',
    categoryName: 'UI Kit',
    license: 'commercial',
    licenseName: 'Lisensi Komersial (Pengembang)',
    price: 169000,
    priceDisplay: 'Rp 169.000',
    priceNote: 'Akses Selamanya · Pembaruan Gratis',
    badge: 'Popular',
    version: 'v2.5',
    updatedDate: 'Januari 2025',
    previewType: 'uikit',
    shortDesc: 'Koleksi 65+ komponen antarmuka web bergaya editorial kontemporer: tombol, form, modal, drawer, tabel data, badge, dan kartu konten.',
    fullDesc: 'StudioKit adalah fondasi desain web bagi pengembang yang menginginkan antarmuka berkarakter kuat tanpa template yang terasa generik. Dirancang berdasarkan filosofi Swiss Grid dengan proporsi ruang yang terencana dan sistem token CSS yang konsisten.',
    features: [
      '65+ Komponen antarmuka yang siap salin dan tempel ke proyek apa pun',
      'Design token lengkap (Variabel CSS Warna, Spacing, Radius, dan Typescale modular)',
      'Aksesibilitas teruji: WCAG 2.1 compliant dengan focus-visible dan atribut ARIA',
      'Zero dependency eksternal — murni HTML5 dan CSS kustom bertenaga',
      'Dokumentasi interaktif dengan contoh kode langsung dan demo interaksi'
    ],
    technologies: ['CSS3 Custom Properties', 'HTML5 Semantik', 'Vanilla JavaScript Micro-helpers'],
    filesIncluded: ['File Library CSS (.css)', 'Showcase Demo Interaktif (.html)', 'Panduan Design Tokens (.pdf)'],
    compatibility: 'Dapat digunakan pada proyek web statis, backend MVC, maupun framework frontend modern.',
    licenseTerms: 'Bebas digunakan untuk proyek personal, agensi, dan komersial tanpa batas.'
  },
  {
    id: 'prod-panduan',
    name: 'Panduan Praktis Digitalisasi Sekolah & UMKM',
    category: 'ebook-materi',
    categoryName: 'E-book & Materi Digital',
    license: 'personal',
    licenseName: 'Lisensi Pembaca Tunggal',
    price: 69000,
    priceDisplay: 'Rp 69.000',
    priceNote: 'E-Book PDF + Lembar Kerja',
    badge: 'E-Book',
    version: 'Edisi 2025',
    updatedDate: 'Januari 2025',
    previewType: 'ebook',
    shortDesc: 'Buku panduan strategis dan praktis memetakan kebutuhan sistem digital, memilih domain/hosting yang tepat, dan menyusun konten berbobot.',
    fullDesc: 'Buku panduan setebal 94 halaman yang ditulis untuk membantu pimpinan sekolah, pengurus yayasan, dan pemilik UMKM memahami langkah-langkah praktis membangun kehadiran digital tanpa terjerumus pengeluaran yang tidak efisien.',
    features: [
      '94 Halaman materi padat dengan ilustrasi diagram alur yang mudah dicerna',
      'Checklist audit kesiapan digital institusi dan pemetaan prioritas fitur',
      'Panduan memilih nama domain (.sch.id, .id, .com) dan penyedia hosting terpercaya',
      'Template dokumen Kerangka Acuan Kerja (KAK) untuk memesan jasa ke pengembang',
      'Bonus: Spreadsheet kalkulator estimasi anggaran pemeliharaan website tahunan'
    ],
    technologies: ['Dokumen Digital PDF', 'Spreadsheet Excel (.xlsx)'],
    filesIncluded: ['Buku Digital E-Book (.pdf format resolusi tinggi)', 'Lembar Kerja & Checklist (.xlsx)'],
    compatibility: 'Dapat dibaca dengan nyaman pada laptop, tablet, PC, maupun smartphone.',
    licenseTerms: 'Khusus untuk penggunaan mandiri pembaca dan tim internal lembaga Anda.'
  },
  {
    id: 'prod-kaswarga',
    name: 'KasWarga — Source Code Aplikasi Kas RT & Komunitas',
    category: 'source-code',
    categoryName: 'Source Code Aplikasi',
    license: 'commercial',
    licenseName: 'Lisensi Komersial (Pengembang)',
    price: 289000,
    priceDisplay: 'Rp 289.000',
    priceNote: 'Source Code Siap Operasi',
    badge: 'New',
    version: 'v1.2',
    updatedDate: 'Februari 2025',
    previewType: 'code',
    shortDesc: 'Aplikasi web pencatatan keuangan kas paguyuban, kas RT/RW, dan arisan dengan rekap transparansi iuran dan notifikasi pengingat via WhatsApp.',
    fullDesc: 'Solusi digital sederhana namun tangguh untuk pengurus paguyuban warga. Menghilangkan kerumitan pembukuan manual buku tulis dengan sistem pencatatan iuran kas masuk, pengeluaran kas, serta laporan neraca berkala yang dapat diakses warga secara transparan.',
    features: [
      'Pencatatan iuran wajib dan sukarela per kepala keluarga / anggota komunitas',
      'Pencatatan pengeluaran operasional dilengkapi foto bukti kuitansi digital',
      'Halaman portal publik untuk warga memeriksa transparansi saldo kas kas terverifikasi',
      'Fitur tombol kirim pesan pengingat iuran melalui format WhatsApp otomatis',
      'Dukungan database SQLite (tanpa konfigurasi database rumit) atau MySQL'
    ],
    technologies: ['PHP', 'SQLite / MySQL', 'Bootstrap 5', 'Vanilla JavaScript'],
    filesIncluded: ['Source Code Lengkap (.php, .css, .js)', 'File Database Awal', 'Panduan Pemasangan cPanel (.pdf)'],
    compatibility: 'Dapat dijalankan di shared hosting murah cPanel atau server localhost.',
    licenseTerms: 'Bebas digunakan, dikembangkan, dan dipasang untuk komunitas tanpa batasan waktu.'
  },
  {
    id: 'prod-atelier',
    name: 'Atelier Commerce — Template Toko Online Minimalis',
    category: 'template-html',
    categoryName: 'Template HTML',
    license: 'personal',
    licenseName: 'Lisensi Standar (1 Usaha)',
    price: 159000,
    priceDisplay: 'Rp 159.000',
    priceNote: 'Sekali Bayar · Tanpa Komisi Penjualan',
    badge: 'Updated',
    version: 'v2.1',
    updatedDate: 'Januari 2025',
    previewType: 'website',
    shortDesc: 'Template toko online bergaya minimalis hangat untuk brand busana, kriya seni, dan kuliner dengan fitur keranjang belanja dan checkout WhatsApp.',
    fullDesc: 'Atelier Commerce menawarkan estetika etalase produk bernilai seni tinggi dengan alur transaksi yang langsung terhubung ke admin WhatsApp penjual. Cocok bagi pengrajin dan bisnis kreatif yang ingin berjualan mandiri tanpa terpotong komisi platform.',
    features: [
      'Keranjang belanja sisi klien berbasis browser Local Storage (data tersimpan otomatis)',
      'Halaman checkout ringkas dengan format pesan order WhatsApp tersusun rapi',
      'Galeri detail produk dengan dukungan multi-gambar dan zoom preview',
      'Filter produk berdasarkan kategori dan rentang harga tanpa reload halaman',
      'Banner promosi pengumuman gratis ongkir dan kupon diskon'
    ],
    technologies: ['HTML5', 'CSS3 Variables', 'Vanilla JavaScript', 'Bootstrap Icons'],
    filesIncluded: ['Source Code Lengkap (.html, .css, .js)', 'Asset Placeholder Grafis', 'Panduan Ganti Teks & Nomor WA (.pdf)'],
    compatibility: 'Dioptimalkan untuk performa cepat pada jaringan internet seluler smartphone.',
    licenseTerms: 'Dapat digunakan untuk 1 toko online aktif pemilik usaha atau proyek klien.'
  }
];

/* ═════════════════════════════════════════════════════════════
   3. UTILITAS BERSAMA
   ═════════════════════════════════════════════════════════════ */

/* ── 3a. Modal helpers ─────────────────────────────────────── */
const registeredModals = [];

function openModal(modal) {
  if (!modal) return;
  modal.classList.add('is-active');
  modal.setAttribute('aria-hidden', 'false');
  document.body.style.overflow = 'hidden';
}

function closeModal(modal) {
  if (!modal) return;
  modal.classList.remove('is-active');
  modal.setAttribute('aria-hidden', 'true');
  document.body.style.overflow = '';
}

/**
 * Daftarkan modal: tombol close, klik backdrop, dan tombol Escape
 * (satu listener Escape global untuk semua modal).
 */
function registerModal(modal, closeBtn) {
  if (!modal) return;

  if (closeBtn) {
    closeBtn.addEventListener('click', () => closeModal(modal));
  }

  modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal(modal);
  });

  if (!registeredModals.includes(modal)) {
    registeredModals.push(modal);
  }
}

function initGlobalEscapeKey() {
  document.addEventListener('keydown', (e) => {
    if (e.key !== 'Escape') return;
    registeredModals.forEach((modal) => {
      if (modal.classList.contains('is-active')) closeModal(modal);
    });
  });
}

/* ── 3b. Toast (satu fungsi untuk semua halaman) ───────────── */
let toastTimer = null;

function showToast(message, type = 'success', duration = 5000) {
  let toast = document.querySelector('.toast-digitaka');
  if (!toast) {
    toast = document.createElement('div');
    toast.className = 'toast-digitaka';
    toast.setAttribute('role', 'status');
    toast.setAttribute('aria-live', 'polite');
    document.body.appendChild(toast);
  }

  const icon = type === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill';
  toast.innerHTML = `<i class="bi ${icon}"></i> <span>${message}</span>`;
  toast.classList.add('is-visible');

  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => {
    toast.classList.remove('is-visible');
  }, duration);
}

/* ── 3c. Simulasi submit form (loading state + callback) ───── */
function simulateSubmit(form, loadingText, delay, onDone) {
  const submitBtn = form.querySelector('button[type="submit"]');
  const originalHtml = submitBtn.innerHTML;

  submitBtn.disabled = true;
  submitBtn.innerHTML = `<i class="bi bi-arrow-repeat" style="animation: spin 1s infinite linear;"></i> ${loadingText}`;

  setTimeout(() => {
    submitBtn.disabled = false;
    submitBtn.innerHTML = originalHtml;
    onDone();
  }, delay);
}

/* ═════════════════════════════════════════════════════════════
   4. UI BERSAMA (SEMUA HALAMAN)
   ═════════════════════════════════════════════════════════════ */

/* ── 4a. Navbar: transparan → solid saat scroll ────────────── */
function initNavbarScroll() {
  const header = document.querySelector('.site-header');
  if (!header) return;

  const onScroll = () => {
    header.classList.toggle('scrolled', window.scrollY > 40);
  };

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
}

/* ── 4b. Mobile navigation drawer ──────────────────────────── */
function initMobileNav() {
  const toggleBtn = document.querySelector('.mobile-toggle');
  const drawer = document.getElementById('mobileNavDrawer');
  const mobileLinks = document.querySelectorAll('.mobile-link');
  const drawerCta = document.querySelector('.mobile-drawer-cta');

  if (!toggleBtn || !drawer) return;

  const openDrawer = () => {
    toggleBtn.setAttribute('aria-expanded', 'true');
    drawer.classList.add('is-open');
    document.body.style.overflow = 'hidden';
  };

  const closeDrawer = () => {
    toggleBtn.setAttribute('aria-expanded', 'false');
    drawer.classList.remove('is-open');
    document.body.style.overflow = '';
  };

  toggleBtn.addEventListener('click', () => {
    const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';
    if (isExpanded) closeDrawer(); else openDrawer();
  });

  mobileLinks.forEach(link => link.addEventListener('click', closeDrawer));
  if (drawerCta) drawerCta.addEventListener('click', closeDrawer);

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
      closeDrawer();
      toggleBtn.focus();
    }
  });
}

/* ── 4c. Scroll reveal (IntersectionObserver + reduced-motion) ─ */
function initScrollReveal() {
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const elements = document.querySelectorAll('.reveal-init');

  if (!elements.length) return;

  if (prefersReduced || !('IntersectionObserver' in window)) {
    elements.forEach(el => el.classList.add('is-revealed'));
    return;
  }

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-revealed');
        obs.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.12,
    rootMargin: '0px 0px -40px 0px'
  });

  elements.forEach(el => observer.observe(el));
}

/* ── 4d. Smooth scroll dengan offset navbar fixed ──────────── */
function initSmoothScrollOffsets() {
  const jumpLinks = document.querySelectorAll('a[href^="#"]');
  const header = document.querySelector('.site-header');

  jumpLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      const targetId = link.getAttribute('href');
      if (!targetId || targetId === '#') return;

      const targetEl = document.querySelector(targetId);
      if (!targetEl) return;

      e.preventDefault();
      const headerOffset = header ? header.offsetHeight + 15 : 85;
      const offsetPosition = targetEl.getBoundingClientRect().top + window.pageYOffset - headerOffset;

      window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
    });
  });
}

/* ═════════════════════════════════════════════════════════════
   5. MODUL HOMEPAGE
   ═════════════════════════════════════════════════════════════ */

/* ── 5a. Katalog produk + filter tab ───────────────────────── */
function initProductsCatalog() {
  const container = document.getElementById('productsContainer');
  const filterTabs = document.querySelectorAll('.filter-tab');

  if (!container) return;

  function renderProducts(filter = 'all') {
    container.innerHTML = '';

    const filtered = filter === 'all'
      ? DIGITAKA_PRODUCTS
      : DIGITAKA_PRODUCTS.filter(item => item.categorySlug === filter);

    if (filtered.length === 0) {
      container.innerHTML = `
        <div style="grid-column: 1 / -1; text-align: center; padding: 3rem 1rem; color: var(--color-muted);">
          <i class="bi bi-inbox" style="font-size: 2.5rem; display: block; margin-bottom: 0.75rem;"></i>
          <p>Belum ada produk untuk kategori ini.</p>
        </div>
      `;
      return;
    }

    filtered.forEach(product => {
      const card = document.createElement('article');
      card.className = 'product-card reveal-init is-revealed';
      card.setAttribute('data-category', product.categorySlug);

      card.innerHTML = `
        <div class="product-preview-stage">
          <span class="product-stage-badge">${product.badge}</span>
          ${getProductPreviewHtml(product.previewType)}
        </div>
        <div class="product-details">
          <div class="product-meta-row">
            <span class="product-category">${product.category}</span>
          </div>
          <h3 class="product-title">${product.title}</h3>
          <p class="product-desc">${product.desc}</p>
          <div class="product-footer">
            <div class="product-price-tag">
              <span class="product-price-label">Mulai Dari</span>
              <span class="product-price-val">${product.price}</span>
            </div>
            <button type="button" class="btn-digitaka btn-forest btn-sm-digitaka btn-view-product" data-product-id="${product.id}">
              Lihat Detail
            </button>
          </div>
        </div>
      `;

      container.appendChild(card);
    });

    attachHomeProductDetailTriggers();
  }

  filterTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      filterTabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
      renderProducts(tab.getAttribute('data-filter'));
    });
  });

  renderProducts('all');
}

/* Preview mockup (homepage) */
function getProductPreviewHtml(type) {
  switch (type) {
    case 'dashboard':
      return `
        <div class="micro-mockup" style="background-color: var(--color-dark-surface); color: var(--color-offwhite);">
          <div style="display:flex; justify-content:space-between; align-items:center;">
            <div style="width: 25px; height: 4px; background-color: var(--color-ivory); border-radius: 2px;"></div>
            <div style="width: 8px; height: 8px; border-radius: 50%; background-color: #6CE5B1;"></div>
          </div>
          <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 4px; margin-top: 4px;">
            <div style="background: rgba(255,255,255,0.08); padding: 4px; border-radius: 3px; font-size: 8px; font-weight:700;">METRIK A</div>
            <div style="background: rgba(255,255,255,0.08); padding: 4px; border-radius: 3px; font-size: 8px; font-weight:700;">METRIK B</div>
          </div>
          <div style="height: 14px; background: rgba(71,117,104,0.3); border-radius: 2px; margin-top: 4px;"></div>
        </div>
      `;
    case 'school':
      return `
        <div class="micro-mockup" style="border-top: 3px solid var(--color-forest);">
          <div style="display: flex; gap: 4px; align-items: center;">
            <i class="bi bi-mortarboard-fill" style="color: var(--color-forest); font-size: 11px;"></i>
            <div style="height: 5px; width: 60px; background-color: var(--color-forest); border-radius: 2px;"></div>
          </div>
          <div class="micro-mockup-lines">
            <span></span>
            <span></span>
          </div>
          <div style="font-size: 7px; font-weight: 700; color: var(--color-secondary); text-transform: uppercase;">Portal Informasi Siswa</div>
        </div>
      `;
    case 'code':
      return `
        <div class="micro-mockup" style="background-color: #152420; font-family: var(--font-mono);">
          <div style="display:flex; gap: 3px; margin-bottom: 3px;">
            <span style="width:5px; height:5px; border-radius:50%; background:#ff5f56; display:inline-block;"></span>
            <span style="width:5px; height:5px; border-radius:50%; background:#ffbd2e; display:inline-block;"></span>
            <span style="width:5px; height:5px; border-radius:50%; background:#27c93f; display:inline-block;"></span>
          </div>
          <div style="font-size: 7px; color: #6CE5B1;">&lt;App /&gt; ready</div>
          <div style="font-size: 6px; color: rgba(255,255,255,0.5);">auth.service.ts</div>
        </div>
      `;
    case 'uikit':
      return `
        <div class="micro-mockup" style="display: flex; flex-direction: column; gap: 6px;">
          <div style="display: flex; gap: 4px;">
            <div style="background: var(--color-forest); height: 10px; width: 35px; border-radius: 2px;"></div>
            <div style="border: 1px solid var(--color-forest); height: 10px; width: 35px; border-radius: 2px;"></div>
          </div>
          <div style="background: var(--color-offwhite); border: 1px solid rgba(0,0,0,0.1); height: 12px; border-radius: 2px;"></div>
        </div>
      `;
    case 'ebook':
      return `
        <div class="micro-mockup" style="background: var(--color-ivory); border-left: 5px solid var(--color-forest);">
          <div style="font-size: 8px; font-weight: 800; color: var(--color-forest); line-height: 1.1;">PANDUAN PRAKTIS</div>
          <div style="font-size: 6px; color: var(--color-muted); margin-top: 3px;">DIGITALISASI SEBAGAI SOLUSI</div>
          <i class="bi bi-book-half" style="font-size: 14px; color: var(--color-secondary); margin-top: 6px;"></i>
        </div>
      `;
    default: // website
      return `
        <div class="micro-mockup">
          <div class="micro-mockup-header"></div>
          <div class="micro-mockup-lines">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <div class="micro-mockup-btn"></div>
        </div>
      `;
  }
}

/* ── 5b. Modal detail produk (homepage) ────────────────────── */
function initHomeProductDetailModal() {
  const modal = document.getElementById('productDetailModal');
  const closeBtn = document.getElementById('closeProductModal');
  const modalBody = document.getElementById('productModalBody');

  if (!modal || !closeBtn || !modalBody) return;
  registerModal(modal, closeBtn);
}

function attachHomeProductDetailTriggers() {
  const buttons = document.querySelectorAll('.btn-view-product');
  const modal = document.getElementById('productDetailModal');
  const modalBody = document.getElementById('productModalBody');

  if (!buttons.length || !modal || !modalBody) return;

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      const product = DIGITAKA_PRODUCTS.find(p => p.id === btn.getAttribute('data-product-id'));
      if (!product) return;

      const featureListHtml = product.features
        .map(f => `<li style="display:flex; align-items:flex-start; gap:0.5rem; margin-bottom:0.5rem; font-size:0.875rem;"><i class="bi bi-check2-circle" style="color:var(--color-secondary); font-size:1.1rem; flex-shrink:0;"></i> <span>${f}</span></li>`)
        .join('');

      modalBody.innerHTML = `
        <div style="margin-bottom: 1.25rem;">
          <span class="badge-editorial badge-secondary" style="margin-bottom:0.65rem;">${product.category}</span>
          <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--color-forest-dark); letter-spacing: -0.02em; line-height: 1.2; margin-bottom: 0.5rem;">
            ${product.title}
          </h3>
          <p style="font-size: 0.925rem; color: var(--color-muted); line-height: 1.65;">
            ${product.desc}
          </p>
        </div>

        <div style="background-color: var(--color-ivory-light); border: 1px solid rgba(32,40,36,0.08); border-radius: var(--radius-sm); padding: 1.15rem; margin-bottom: 1.5rem;">
          <div style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700; color: var(--color-secondary); letter-spacing: 0.05em; margin-bottom: 0.25rem;">
            Investasi Produk
          </div>
          <div style="font-size: 1.75rem; font-weight: 800; color: var(--color-forest); letter-spacing: -0.03em;">
            ${product.price}
          </div>
          <div style="font-size: 0.78rem; color: var(--color-muted);">
            ${product.priceNote} · Format: ${product.format}
          </div>
        </div>

        <div style="margin-bottom: 1.75rem;">
          <h4 style="font-size: 0.875rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: var(--color-dark); margin-bottom: 0.75rem;">
            Apa Saja yang Anda Dapatkan:
          </h4>
          <ul style="padding: 0; margin: 0;">
            ${featureListHtml}
          </ul>
        </div>

        <div style="display: flex; gap: 0.85rem; flex-wrap: wrap;">
          <button type="button" class="btn-digitaka btn-forest btn-inquire-product" style="flex: 1;">
            Pesan / Dapatkan Produk Ini
          </button>
          <button type="button" class="btn-digitaka btn-outline-forest btn-close-product">
            Tutup
          </button>
        </div>
      `;

      openModal(modal);

      const inquireBtn = modalBody.querySelector('.btn-inquire-product');
      if (inquireBtn) {
        inquireBtn.addEventListener('click', () => {
          closeModal(modal);
          openHomeDiscussionModal(`Pertanyaan / Pembelian: ${product.title}`);
        });
      }

      const closeInlineBtn = modalBody.querySelector('.btn-close-product');
      if (closeInlineBtn) {
        closeInlineBtn.addEventListener('click', () => closeModal(modal));
      }
    });
  });
}

/* ── 5c. Modal diskusi proyek (homepage) ───────────────────── */
function initHomeDiscussionModal() {
  const modal = document.getElementById('discussionModal');
  const closeBtn = document.getElementById('closeDiscussionModal');
  const triggers = document.querySelectorAll('.trigger-discussion');

  if (!modal || !closeBtn) return;
  registerModal(modal, closeBtn);

  triggers.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      openHomeDiscussionModal(btn.getAttribute('data-service') || '');
    });
  });
}

function openHomeDiscussionModal(prefillText = '') {
  const modal = document.getElementById('discussionModal');
  const serviceInput = document.getElementById('discussionServiceSelect');
  const noteInput = document.getElementById('discussionMessage');

  if (!modal) return;

  if (serviceInput && prefillText) {
    const text = prefillText.toLowerCase();

    if (text.includes('website')) {
      serviceInput.value = 'website';
    } else if (text.includes('aplikasi') || text.includes('application')) {
      serviceInput.value = 'webapp';
    } else if (text.includes('custom')) {
      serviceInput.value = 'custom';
    } else {
      serviceInput.value = 'produk';
      if (noteInput && !noteInput.value) {
        noteInput.value = `Halo DIGITAKA, saya tertarik untuk memesan atau mengetahui lebih lanjut mengenai ${prefillText}.`;
      }
    }
  }

  openModal(modal);

  const firstInput = modal.querySelector('input');
  if (firstInput) setTimeout(() => firstInput.focus(), 150);
}

/* ── 5d. Form diskusi (homepage) ───────────────────────────── */
function initHomeContactForm() {
  const form = document.getElementById('discussionForm');
  if (!form) return;

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const nameInput = document.getElementById('discussionName');
    const contactInput = document.getElementById('discussionContact');

    if (!nameInput.value.trim() || !contactInput.value.trim()) {
      showToast('Harap isi Nama dan Kontak Anda untuk memulai diskusi.', 'error', 4500);
      return;
    }

    simulateSubmit(form, 'Memproses...', 900, () => {
      closeModal(document.getElementById('discussionModal'));
      form.reset();
      showToast('Terima kasih! Pesan diskusi Anda telah kami terima. Tim DIGITAKA akan segera menghubungi Anda.', 'success', 4500);
    });
  });
}

/* ── 5e. Scroll spy navbar ─────────────────────────────────── */
function initScrollSpy() {
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.desktop-nav .nav-item-link');

  if (!sections.length || !navLinks.length) return;

  const onScroll = () => {
    const scrollPos = window.scrollY + 120;

    sections.forEach(sec => {
      const top = sec.offsetTop;
      const height = sec.offsetHeight;
      const id = sec.getAttribute('id');

      if (scrollPos >= top && scrollPos < top + height) {
        navLinks.forEach(link => {
          link.classList.remove('active');
          if (link.getAttribute('href') === `#${id}`) {
            link.classList.add('active');
          }
        });
      }
    });
  };

  window.addEventListener('scroll', onScroll, { passive: true });
}

/* ═════════════════════════════════════════════════════════════
   6. MODUL HALAMAN PRODUK (STOREFRONT)
   ═════════════════════════════════════════════════════════════ */
const storefrontState = {
  searchQuery: '',
  categoryFilter: 'all',
  licenseFilter: 'all',
  sortOption: 'newest'
};

/* ── 6a. Filter, search & sort engine ──────────────────────── */
function filterAndSortProducts(data, state) {
  const result = data.filter(item => {
    if (state.searchQuery.trim() !== '') {
      const q = state.searchQuery.toLowerCase().trim();
      const matchName = item.name.toLowerCase().includes(q);
      const matchDesc = item.shortDesc.toLowerCase().includes(q);
      const matchTech = item.technologies.some(t => t.toLowerCase().includes(q));
      if (!matchName && !matchDesc && !matchTech) return false;
    }

    if (state.categoryFilter !== 'all' && item.category !== state.categoryFilter) return false;
    if (state.licenseFilter !== 'all' && item.license !== state.licenseFilter) return false;

    return true;
  });

  result.sort((a, b) => {
    switch (state.sortOption) {
      case 'price-asc':  return a.price - b.price;
      case 'price-desc': return b.price - a.price;
      case 'name-asc':   return a.name.localeCompare(b.name, 'id');
      case 'newest':
      default:           return 0; // pertahankan urutan array
    }
  });

  return result;
}

function applyFiltersAndRender() {
  const filtered = filterAndSortProducts(PRODUCTS_DATA, storefrontState);
  renderProductGrid(filtered);
  updateResultsCount(filtered.length, PRODUCTS_DATA.length);
  updateActiveResetButtonState();
}

/* ── 6b. Render grid & kartu produk ────────────────────────── */
function renderProductGrid(products) {
  const gridContainer = document.getElementById('productsGrid');
  const emptyStateContainer = document.getElementById('productsEmptyState');

  if (!gridContainer || !emptyStateContainer) return;

  if (products.length === 0) {
    gridContainer.innerHTML = '';
    gridContainer.style.display = 'none';
    emptyStateContainer.style.display = 'block';
    return;
  }

  emptyStateContainer.style.display = 'none';
  gridContainer.style.display = 'grid';
  gridContainer.innerHTML = '';

  products.forEach(product => {
    const card = document.createElement('article');
    card.className = 'store-product-card';
    card.setAttribute('data-id', product.id);

    let badgeHtml = '';
    if (product.badge) {
      const key = product.badge.toLowerCase();
      const badgeClass = key === 'new' ? 'badge-tag-new'
                       : key === 'popular' ? 'badge-tag-popular'
                       : 'badge-tag-default';
      badgeHtml = `<span class="store-card-badge ${badgeClass}">${product.badge}</span>`;
    }

    card.innerHTML = `
      <div class="store-card-preview-area">
        ${badgeHtml}
        ${generateProductMicroPreview(product.previewType)}
      </div>
      <div class="store-card-body">
        <div class="store-card-meta">
          <span class="store-card-cat">${product.categoryName}</span>
          <span class="store-card-version">${product.version}</span>
        </div>
        <h3 class="store-card-title">${product.name}</h3>
        <p class="store-card-desc">${product.shortDesc}</p>
        <div class="store-card-footer">
          <div class="store-price-block">
            <span class="store-price-label">Harga</span>
            <span class="store-price-amount">${product.priceDisplay}</span>
          </div>
          <button type="button" class="btn-store btn-store-forest btn-open-detail" data-product-id="${product.id}" aria-label="Lihat detail ${product.name}">
            Detail Produk
          </button>
        </div>
      </div>
    `;

    gridContainer.appendChild(card);
  });

  attachStoreDetailTriggers();
}

/* Preview mockup (storefront) */
function generateProductMicroPreview(type) {
  switch (type) {
    case 'dashboard':
      return `
        <div class="micro-scene micro-scene-dark">
          <div class="micro-scene-bar">
            <div class="micro-dots"><span></span><span></span><span></span></div>
            <span style="font-size:8px; font-family:var(--font-mono); color:#6CE5B1;">dashboard.digitaka.id</span>
          </div>
          <div style="display:grid; grid-template-columns: 1fr 1fr; gap:6px; margin-top:8px;">
            <div style="background:rgba(255,255,255,0.06); padding:6px; border-radius:4px; font-size:9px; font-weight:700; color:var(--color-ivory);">
              <span style="display:block; font-size:7px; color:rgba(255,255,255,0.5);">PERFORMA</span>
              99.8% Uptime
            </div>
            <div style="background:rgba(255,255,255,0.06); padding:6px; border-radius:4px; font-size:9px; font-weight:700; color:#6CE5B1;">
              <span style="display:block; font-size:7px; color:rgba(255,255,255,0.5);">METRIK USER</span>
              +1,420 Aktif
            </div>
          </div>
          <div style="height:22px; background:rgba(71,117,104,0.3); border-radius:3px; margin-top:6px; display:flex; align-items:center; padding:0 6px;">
            <div style="width:40%; height:4px; background:rgba(255,255,255,0.25); border-radius:2px;"></div>
          </div>
        </div>
      `;
    case 'school':
      return `
        <div class="micro-scene micro-scene-light" style="border-top:3px solid var(--color-forest);">
          <div style="display:flex; justify-content:space-between; align-items:center;">
            <div style="display:flex; align-items:center; gap:5px;">
              <i class="bi bi-mortarboard-fill" style="color:var(--color-forest); font-size:12px;"></i>
              <span style="font-size:9px; font-weight:700; color:var(--color-forest);">PORTAL SEKOLAH</span>
            </div>
            <span style="font-size:7px; font-weight:600; padding:1px 5px; border-radius:10px; background:rgba(71,117,104,0.15); color:var(--color-secondary);">PPDB ON</span>
          </div>
          <div style="height:12px; background:var(--color-ivory); border-radius:3px; margin-top:8px;"></div>
          <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:4px; margin-top:6px;">
            <div style="background:var(--color-offwhite); border:1px solid rgba(0,0,0,0.08); height:24px; border-radius:3px; padding:2px 4px; font-size:7px; color:var(--color-muted);">Berita</div>
            <div style="background:var(--color-offwhite); border:1px solid rgba(0,0,0,0.08); height:24px; border-radius:3px; padding:2px 4px; font-size:7px; color:var(--color-muted);">Jadwal</div>
            <div style="background:var(--color-offwhite); border:1px solid rgba(0,0,0,0.08); height:24px; border-radius:3px; padding:2px 4px; font-size:7px; color:var(--color-muted);">Guru</div>
          </div>
        </div>
      `;
    case 'code':
      return `
        <div class="micro-scene micro-scene-code">
          <div style="display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid rgba(255,255,255,0.1); padding-bottom:4px;">
            <div class="micro-dots"><span></span><span></span><span></span></div>
            <span style="font-size:8px; color:rgba(255,255,255,0.5);">app.module.php</span>
          </div>
          <div style="font-size:8px; color:#6CE5B1; margin-top:6px;">&lt;?php namespace Digitaka;</div>
          <div style="font-size:7px; color:var(--color-ivory); margin-top:2px;">class TaskController extends Base {</div>
          <div style="font-size:7px; color:rgba(255,255,255,0.5); padding-left:8px;">public function exportPDF() { ... }</div>
          <div style="font-size:7px; color:var(--color-ivory);">}</div>
        </div>
      `;
    case 'schooladmin':
      return `
        <div class="micro-scene micro-scene-light">
          <div style="font-size:8px; font-weight:800; color:var(--color-forest); display:flex; justify-content:space-between;">
            <span>BUKU INDUK SISWA</span>
            <span style="color:var(--color-secondary);">TAPEL 2024/2025</span>
          </div>
          <div style="margin-top:6px; display:flex; flex-direction:column; gap:3px;">
            <div style="background:var(--color-offwhite); padding:3px 6px; border-radius:2px; font-size:7px; display:flex; justify-content:space-between;">
              <span>NISN 00812984 · Ahmad Fauzi</span>
              <strong style="color:var(--color-forest);">Kelas IX-A</strong>
            </div>
            <div style="background:var(--color-offwhite); padding:3px 6px; border-radius:2px; font-size:7px; display:flex; justify-content:space-between;">
              <span>NISN 00812985 · Siti Nurhaliza</span>
              <strong style="color:var(--color-forest);">Kelas IX-A</strong>
            </div>
            <div style="background:var(--color-offwhite); padding:3px 6px; border-radius:2px; font-size:7px; display:flex; justify-content:space-between;">
              <span>NISN 00812986 · Bayu Anggara</span>
              <strong style="color:var(--color-forest);">Kelas IX-B</strong>
            </div>
          </div>
        </div>
      `;
    case 'uikit':
      return `
        <div class="micro-scene micro-scene-light" style="display:flex; flex-direction:column; gap:6px;">
          <div style="display:flex; gap:6px;">
            <div style="background:var(--color-forest); color:#fff; font-size:8px; font-weight:700; padding:4px 8px; border-radius:3px;">.btn-forest</div>
            <div style="border:1px solid var(--color-forest); color:var(--color-forest); font-size:8px; font-weight:700; padding:4px 8px; border-radius:3px;">.btn-outline</div>
          </div>
          <div style="background:var(--color-ivory); height:16px; border-radius:3px; display:flex; align-items:center; padding:0 6px;">
            <span style="font-size:7px; font-weight:700; color:var(--color-dark);">#E8E2D5 · WARM IVORY ACCENT</span>
          </div>
          <div style="display:flex; gap:4px;">
            <span style="background:rgba(71,117,104,0.15); color:var(--color-secondary); font-size:7px; font-weight:600; padding:2px 5px; border-radius:10px;">Badge A</span>
            <span style="background:rgba(24,61,53,0.1); color:var(--color-forest); font-size:7px; font-weight:600; padding:2px 5px; border-radius:10px;">Badge B</span>
          </div>
        </div>
      `;
    case 'ebook':
      return `
        <div class="micro-scene micro-scene-light" style="background:var(--color-ivory); border-left:6px solid var(--color-forest);">
          <div style="font-size:9px; font-weight:800; color:var(--color-forest); line-height:1.15;">
            PANDUAN STRATEGIS DIGITALISASI
          </div>
          <div style="font-size:7px; color:var(--color-muted); margin-top:3px;">
            SEKOLAH & UMKM EDISI 2025
          </div>
          <div style="display:flex; align-items:center; justify-content:space-between; margin-top:10px;">
            <i class="bi bi-file-earmark-pdf-fill" style="color:var(--color-forest); font-size:18px;"></i>
            <span style="font-size:8px; font-weight:700; color:var(--color-secondary);">94 HALAMAN</span>
          </div>
        </div>
      `;
    default: // website
      return `
        <div class="micro-scene micro-scene-light">
          <div class="micro-scene-bar">
            <div class="micro-dots"><span></span><span></span><span></span></div>
            <span style="font-size:7px; font-family:var(--font-mono); color:var(--color-muted);">domain-bisnis.id</span>
          </div>
          <div style="height:20px; background:var(--color-ivory); border-radius:3px; margin-top:6px; display:flex; align-items:center; padding:0 6px;">
            <div style="width:50%; height:4px; background:var(--color-forest); border-radius:2px;"></div>
          </div>
          <div style="display:grid; grid-template-columns:1fr 1fr; gap:5px; margin-top:6px;">
            <div style="background:var(--color-offwhite); height:20px; border-radius:3px; border:1px solid rgba(0,0,0,0.06);"></div>
            <div style="background:var(--color-offwhite); height:20px; border-radius:3px; border:1px solid rgba(0,0,0,0.06);"></div>
          </div>
        </div>
      `;
  }
}

/* ── 6c. Kontrol filter ────────────────────────────────────── */
function initStorefrontFilters() {
  const searchInput = document.getElementById('storeSearchInput');
  const searchClearBtn = document.getElementById('storeSearchClear');
  const categorySelect = document.getElementById('storeCategoryFilter');
  const licenseSelect = document.getElementById('storeLicenseFilter');
  const sortSelect = document.getElementById('storeSortOption');
  const resetBtn = document.getElementById('storeResetFilterBtn');
  const emptyResetBtn = document.getElementById('emptyStateResetBtn');

  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      storefrontState.searchQuery = e.target.value;
      if (searchClearBtn) {
        searchClearBtn.style.display = e.target.value.trim() !== '' ? 'block' : 'none';
      }
      applyFiltersAndRender();
    });

    searchInput.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        searchInput.value = '';
        storefrontState.searchQuery = '';
        if (searchClearBtn) searchClearBtn.style.display = 'none';
        applyFiltersAndRender();
      }
    });
  }

  if (searchClearBtn && searchInput) {
    searchClearBtn.addEventListener('click', () => {
      searchInput.value = '';
      storefrontState.searchQuery = '';
      searchClearBtn.style.display = 'none';
      searchInput.focus();
      applyFiltersAndRender();
    });
  }

  if (categorySelect) {
    categorySelect.addEventListener('change', (e) => {
      storefrontState.categoryFilter = e.target.value;
      applyFiltersAndRender();
    });
  }

  if (licenseSelect) {
    licenseSelect.addEventListener('change', (e) => {
      storefrontState.licenseFilter = e.target.value;
      applyFiltersAndRender();
    });
  }

  if (sortSelect) {
    sortSelect.addEventListener('change', (e) => {
      storefrontState.sortOption = e.target.value;
      applyFiltersAndRender();
    });
  }

  const executeReset = () => {
    storefrontState.searchQuery = '';
    storefrontState.categoryFilter = 'all';
    storefrontState.licenseFilter = 'all';
    storefrontState.sortOption = 'newest';

    if (searchInput) searchInput.value = '';
    if (searchClearBtn) searchClearBtn.style.display = 'none';
    if (categorySelect) categorySelect.value = 'all';
    if (licenseSelect) licenseSelect.value = 'all';
    if (sortSelect) sortSelect.value = 'newest';

    applyFiltersAndRender();
  };

  if (resetBtn) resetBtn.addEventListener('click', executeReset);
  if (emptyResetBtn) emptyResetBtn.addEventListener('click', executeReset);
}

function updateResultsCount(currentCount, totalCount) {
  const countEl = document.getElementById('storeResultsCount');
  if (!countEl) return;

  countEl.innerHTML = currentCount === totalCount
    ? `Menampilkan semua <strong>${totalCount} produk</strong> digital`
    : `Menampilkan <strong>${currentCount}</strong> dari ${totalCount} produk`;

  const totalBadgeEl = document.getElementById('totalProductsBadge');
  if (totalBadgeEl) {
    totalBadgeEl.textContent = `${totalCount} Produk Siap Pakai`;
  }
}

function updateActiveResetButtonState() {
  const resetBtn = document.getElementById('storeResetFilterBtn');
  if (!resetBtn) return;

  const isFiltered = storefrontState.searchQuery.trim() !== '' ||
                     storefrontState.categoryFilter !== 'all' ||
                     storefrontState.licenseFilter !== 'all' ||
                     storefrontState.sortOption !== 'newest';

  resetBtn.classList.toggle('is-active', isFiltered);
}

/* ── 6d. Modal detail produk (storefront) ──────────────────── */
function initStoreDetailModal() {
  const modal = document.getElementById('productDetailModal');
  const closeBtn = document.getElementById('closeDetailModal');

  if (!modal || !closeBtn) return;
  registerModal(modal, closeBtn);
}

function attachStoreDetailTriggers() {
  const buttons = document.querySelectorAll('.btn-open-detail');
  const modal = document.getElementById('productDetailModal');
  const modalBody = document.getElementById('detailModalBody');

  if (!buttons.length || !modal || !modalBody) return;

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      const product = PRODUCTS_DATA.find(p => p.id === btn.getAttribute('data-product-id'));
      if (!product) return;

      const featureListHtml = product.features.map(f => `
        <li class="detail-feature-item">
          <i class="bi bi-check2-circle"></i>
          <span>${f}</span>
        </li>
      `).join('');

      const techPillsHtml = product.technologies.map(t => `
        <span class="detail-tech-pill">${t}</span>
      `).join('');

      const filesListHtml = product.filesIncluded.map(file => `
        <span class="detail-file-pill"><i class="bi bi-file-earmark-code"></i> ${file}</span>
      `).join('');

      modalBody.innerHTML = `
        <div class="detail-modal-layout">

          <!-- Left: Header & Overview -->
          <div class="detail-modal-main">
            <div class="detail-meta-header">
              <span class="badge-store-category">${product.categoryName}</span>
              <span class="detail-version-tag">${product.version} · Pembaruan: ${product.updatedDate}</span>
            </div>

            <h2 class="detail-modal-title">${product.name}</h2>

            <p class="detail-modal-desc">${product.fullDesc}</p>

            <div class="detail-section-block">
              <h3 class="detail-section-title">Fitur & Keunggulan</h3>
              <ul class="detail-features-list">
                ${featureListHtml}
              </ul>
            </div>

            <div class="detail-section-block">
              <h3 class="detail-section-title">Teknologi yang Digunakan</h3>
              <div class="detail-pills-row">
                ${techPillsHtml}
              </div>
            </div>

            <div class="detail-section-block">
              <h3 class="detail-section-title">File yang Anda Terima</h3>
              <div class="detail-pills-row">
                ${filesListHtml}
              </div>
            </div>

            <div class="detail-section-block">
              <h3 class="detail-section-title">Ketentuan Lisensi & Kompatibilitas</h3>
              <div class="detail-license-box">
                <div class="detail-license-item">
                  <strong>Jenis Lisensi:</strong> ${product.licenseName}
                </div>
                <div class="detail-license-item">
                  <strong>Ketentuan:</strong> ${product.licenseTerms}
                </div>
                <div class="detail-license-item">
                  <strong>Kompatibilitas:</strong> ${product.compatibility}
                </div>
              </div>
            </div>
          </div>

          <!-- Right: Pricing Card & Action Button -->
          <aside class="detail-modal-aside">
            <div class="detail-pricing-card">
              <span class="detail-price-label">Biaya Investasi</span>
              <div class="detail-price-amount">${product.priceDisplay}</div>
              <p class="detail-price-note">${product.priceNote}</p>

              <hr class="detail-divider" />

              <div class="detail-guarantee-list">
                <div class="guarantee-item">
                  <i class="bi bi-shield-check"></i>
                  <span>Kode Bersih & Terverifikasi</span>
                </div>
                <div class="guarantee-item">
                  <i class="bi bi-book"></i>
                  <span>Dokumentasi Setup Lengkap</span>
                </div>
                <div class="guarantee-item">
                  <i class="bi bi-headset"></i>
                  <span>Dukungan Teknis Awal</span>
                </div>
              </div>

              <button type="button" class="btn-store btn-store-forest btn-buy-product w-100">
                Beli Produk Ini
                <i class="bi bi-arrow-right"></i>
              </button>

              <div class="detail-demo-disclaimer">
                <i class="bi bi-info-circle"></i>
                <span>Pemberitahuan Demo: Ini adalah frontend prototipe DIGITAKA. Klik tombol untuk memulai simulasi pemesanan via konsultasi WhatsApp atau form tim studio.</span>
              </div>
            </div>
          </aside>

        </div>
      `;

      openModal(modal);

      const buyBtn = modalBody.querySelector('.btn-buy-product');
      if (buyBtn) {
        buyBtn.addEventListener('click', () => {
          closeModal(modal);
          openInquiryModal({
            id: product.id,
            name: product.name,
            price: product.priceDisplay,
            license: product.licenseName
          });
        });
      }
    });
  });
}

/* ── 6e. Modal inquiry / checkout demo ─────────────────────── */
function initInquiryModal() {
  const modal = document.getElementById('inquiryModal');
  const closeBtn = document.getElementById('closeInquiryModal');
  const form = document.getElementById('inquiryForm');

  if (!modal || !closeBtn || !form) return;
  registerModal(modal, closeBtn);

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const nameInput = document.getElementById('inquiryCustomerName');
    const contactInput = document.getElementById('inquiryCustomerContact');
    const prodNameInput = document.getElementById('inquiryProductName');

    if (!nameInput.value.trim() || !contactInput.value.trim()) {
      showToast('Harap isi Nama dan Kontak Anda untuk melanjutkan pemesanan.', 'error');
      return;
    }

    // Simpan nilai SEBELUM form.reset() agar tidak kosong di pesan toast
    const customerName = nameInput.value.trim();
    const productName = prodNameInput ? prodNameInput.value : '';

    simulateSubmit(form, 'Memproses Pemesanan...', 1000, () => {
      closeModal(modal);
      form.reset();
      showToast(`Terima kasih, ${customerName}! Rincian pemesanan "${productName}" telah kami catat. Tim DIGITAKA akan segera menghubungi Anda.`, 'success');
    });
  });
}

function openInquiryModal(productData) {
  const modal = document.getElementById('inquiryModal');
  const nameField = document.getElementById('inquiryProductName');
  const priceField = document.getElementById('inquiryProductPrice');
  const licenseField = document.getElementById('inquiryProductLicense');

  if (!modal) return;

  if (nameField) nameField.value = productData.name || '';
  if (priceField) priceField.value = productData.price || '';
  if (licenseField) licenseField.value = productData.license || '';

  openModal(modal);

  const firstInput = document.getElementById('inquiryCustomerName');
  if (firstInput) setTimeout(() => firstInput.focus(), 150);
}

/* ═════════════════════════════════════════════════════════════
   7. MODUL HALAMAN LAYANAN (SERVICES)
   ═════════════════════════════════════════════════════════════ */

/* ── 7a. Modal diskusi layanan (prefill sesuai konteks) ────── */
function initServicesDiscussionModal() {
  const modal = document.getElementById('servicesDiscussionModal');
  const closeBtn = document.getElementById('closeServicesModal');
  const triggers = document.querySelectorAll('.trigger-services-modal');
  const serviceSelect = document.getElementById('svcModalServiceSelect');
  const notesField = document.getElementById('svcModalNotes');

  if (!modal || !closeBtn) return;
  registerModal(modal, closeBtn);

  triggers.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const serviceType = btn.getAttribute('data-service') || 'general';
      const serviceContext = btn.getAttribute('data-context') || '';

      if (serviceSelect) serviceSelect.value = serviceType;

      if (notesField && serviceContext && !notesField.value) {
        notesField.value = `Halo DIGITAKA, saya ingin mendiskusikan kebutuhan seputar ${serviceContext}.`;
      }

      openModal(modal);

      const firstInput = document.getElementById('svcModalName');
      if (firstInput) setTimeout(() => firstInput.focus(), 150);
    });
  });
}

/* ── 7b. Form diskusi layanan ──────────────────────────────── */
function initServicesForm() {
  const form = document.getElementById('servicesDiscussionForm');
  if (!form) return;

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const nameInput = document.getElementById('svcModalName');
    const contactInput = document.getElementById('svcModalContact');
    const serviceSelect = document.getElementById('svcModalServiceSelect');

    if (!nameInput.value.trim() || !contactInput.value.trim()) {
      showToast('Harap isi Nama dan Kontak Anda untuk memulai diskusi.', 'error');
      return;
    }

    // Simpan nilai SEBELUM form.reset() agar tidak kosong di pesan toast
    const customerName = nameInput.value.trim();
    const serviceLabel = serviceSelect.options[serviceSelect.selectedIndex].text;

    simulateSubmit(form, 'Memproses...', 1000, () => {
      closeModal(document.getElementById('servicesDiscussionModal'));
      form.reset();
      showToast(`Terima kasih, ${customerName}! Rencana proyek Anda (${serviceLabel}) telah kami terima. Tim DIGITAKA akan segera menghubungi Anda.`, 'success');
    });
  });
}

/* ═════════════════════════════════════════════════════════════
   8. INISIALISASI
   Semua modul aman dipanggil di semua halaman: masing-masing
   otomatis berhenti (return) jika elemen DOM-nya tidak ada.
   ═════════════════════════════════════════════════════════════ */
document.addEventListener('DOMContentLoaded', () => {
  /* Bersama */
  initNavbarScroll();
  initMobileNav();
  initScrollReveal();
  initSmoothScrollOffsets();
  initGlobalEscapeKey();

  /* Homepage */
  initProductsCatalog();
  initHomeDiscussionModal();
  initHomeProductDetailModal();
  initHomeContactForm();
  initScrollSpy();

  /* Halaman Produk */
  initStorefrontFilters();
  initStoreDetailModal();
  initInquiryModal();
  applyFiltersAndRender(); // aman: berhenti jika #productsGrid tidak ada

  /* Halaman Layanan */
  initServicesDiscussionModal();
  initServicesForm();
});