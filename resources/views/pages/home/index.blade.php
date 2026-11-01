<x-layouts::app-layout>
    {{-- ==========================================================
    9. HERO SECTION
    ========================================================== --}}
    <section class="hero-section" aria-label="Pengenalan Studio DIGITAKA">

        <div class="hero-bg-lines" aria-hidden="true"></div>
        <div class="hero-ambient-glow" aria-hidden="true"></div>

        <div class="container-digitaka hero-container">
            <div class="hero-grid">

                {{-- Left Column --}}
                <div class="hero-content reveal-init">

                    <h1 class="hero-title mb-0">
                        <span class="d-none d-md-block">DIGITAKA</span> <span class="accent-text">Digital Studio</span>
                    </h1>

                    <p class="hero-desc">
                        Solusi digital modern untuk membantu bisnis dan institusi
                    </p>

                    <div class="hero-actions">
                        <a href="#layanan" class="btn-digitaka btn-ivory">
                            Jelajahi Layanan
                            <i class="bi bi-arrow-down-right" aria-hidden="true"></i>
                        </a>

                        <a href="#produk-digital" class="btn-digitaka btn-outline-light">
                            Produk Digital
                            <i class="bi bi-grid-3x3-gap" aria-hidden="true"></i>
                        </a>
                    </div>

                    {{-- Product Card --}}
                    <div class="preview-floating-card">

                        <div class="floating-product-info">
                            <div class="floating-product-icon">
                                <i class="bi bi-box-seam" aria-hidden="true"></i>
                            </div>

                            <div class="floating-product-text">
                                <div class="floating-product-title">
                                    Produk Digital
                                </div>

                                <div class="floating-product-tag">
                                    Template & Source Code
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Column --}}
                <div class="hero-visual-wrapper reveal-init delay-2">

                    <div class="preview-window-main">

                        {{-- Browser Topbar --}}
                        <div class="preview-window-topbar">

                            <div class="window-dots" aria-hidden="true">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <div class="window-address-bar" title="DIGITAKA Sistem Terpadu">
                                <i class="bi bi-lock-fill" aria-hidden="true"></i>
                                <span>digitaka.app/sistem-terpadu</span>
                            </div>

                        </div>

                        {{-- Preview Slider --}}
                        <div class="preview-window-body">
                            <div class="preview-slider" id="previewSlider">

                                <div class="preview-slider-track">

                                    <div class="preview-slide">
                                        <img src="{{ asset('assets/img/software-aplikasi-point-of-sales-olsera.webp') }}"
                                            alt="Preview aplikasi Point of Sales">
                                    </div>

                                    <div class="preview-slide">
                                        <img src="{{ asset('assets/img/images.jpeg') }}"
                                            alt="Preview aplikasi administrasi">
                                    </div>

                                </div>

                                {{-- Navigation --}}
                                <button type="button" class="preview-slide-control prev" aria-label="Slide sebelumnya">
                                    <i class="bi bi-chevron-left"></i>
                                </button>

                                <button type="button" class="preview-slide-control next" aria-label="Slide berikutnya">
                                    <i class="bi bi-chevron-right"></i>
                                </button>

                                {{-- Indicators --}}
                                <div class="preview-slide-indicators">
                                    <button type="button" class="active" aria-label="Tampilkan slide 1"></button>

                                    <button type="button" aria-label="Tampilkan slide 2"></button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ==========================================================
    10. INTRODUCTION & SERVICES SECTION
    ========================================================== --}}
    <section class="intro-services-section" id="intro">
        <div class="container-digitaka devider">
            {{-- INTRO APPLICATION --}}
            <div class="intro-grid ">
                <div class="intro-editorial-head reveal-init">
                    <h2 class="intro-quote">
                        Satu Platform,
                        <em>Beragam Solusi Digital.</em>
                    </h2>
                </div>

                <div class="intro-detail-col reveal-init delay-1">
                    <p class="intro-lead-text">
                        DIGITAKA menyediakan solusi digital, mulai dari pengembangan website, aplikasi web, hingga
                        sistem informasi untuk
                        kebutuhan bisnis dan institusi.
                    </p>
                </div>
            </div>

            {{-- SERVICE CATEGORIES --}}
            <div class="services-overview">
                <h4 class="text-muted pb-1 mb-0 d-none d-md-block">Layanan</h4>
                {{-- Tampilkan pada layar md ++ --}}
                <div class="services-index-grid">
                    @foreach ($serviceCategories as $index => $item)
                    <article class="service-index-item reveal-init">
                        <span class="service-index-number">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <h3 class="service-index-title">
                            {{ $item->name }}
                        </h3>

                        <ul class="service-index-sublist">
                            @forelse ($item->services as $service)
                            <li class="service-index-subitem">
                                {{ $service->title }}
                            </li>
                            @empty
                            <li class="service-index-empty">
                                Belum ada layanan tersedia.
                            </li>
                            @endforelse
                        </ul>

                        <a href="#{{ $item->slug }}" class="service-index-jump">
                            Selengkapnya
                            <i class="bi bi-arrow-right" aria-hidden="true"></i>
                        </a>
                    </article>
                    @endforeach
                </div>

                {{-- Menu Navigasi Mobile --}}
                <nav class="services-mobile-nav d-md-none" aria-label="Navigasi kategori layanan">
                    <div class="services-mobile-heading">
                        <span>LAYANAN</span>
                    </div>

                    <div class="services-mobile-menu">
                        @foreach ($serviceCategories as $index => $item)
                        <a href="#{{ $item->slug }}" class="services-mobile-link">
                            <span class="services-mobile-number">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            <span class="services-mobile-name">
                                {{ $item->name }}
                            </span>

                            <span class="services-mobile-arrow">
                                <i class="bi bi-arrow-up-right"></i>
                            </span>
                        </a>
                        @endforeach
                    </div>
                </nav>
                <div class="reveal-init text-center d-none d-md-block" style="margin-top: 3rem;">
                    <a href="products.html" class="btn-digitaka btn-outline-forest">
                        Jelajahi Etalase Lengkap & Filter Lanjutan
                        <i class="bi bi-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <section class="products-section section-pad" id="produk-digital" aria-labelledby="productsTitle">
        <div class="container-digitaka devider">
            <h4 class="text-muted py-1">Produk Digital</h4>

            <!-- Section Header -->
            {{-- <div class="section-header-editorial reveal-init">
                <div class="section-title-wrap">
                    <span class="section-tag">Produk Siap Pakai</span>
                    <h2 id="productsTitle" class="section-title">Tools That Make Work Easier.</h2>
                </div>
                <p class="section-subtitle">
                    Etalase template website, dashboard Bootstrap, source code aplikasi, dan panduan digital yang
                    dibangun dengan standar profesional.
                </p>
            </div> --}}

            <!-- Filter Tab Buttons -->
            {{-- <div class="products-filter-strip reveal-init" role="tablist" aria-label="Filter Kategori Produk">
                <button type="button" class="filter-tab active" data-filter="all" role="tab" aria-selected="true">
                    Semua Produk
                </button>
                <button type="button" class="filter-tab" data-filter="template-web" role="tab" aria-selected="false">
                    Template Website
                </button>
                <button type="button" class="filter-tab" data-filter="dashboard" role="tab" aria-selected="false">
                    Dashboard Admin
                </button>
                <button type="button" class="filter-tab" data-filter="sekolah" role="tab" aria-selected="false">
                    Administrasi Sekolah
                </button>
                <button type="button" class="filter-tab" data-filter="source-code" role="tab" aria-selected="false">
                    Source Code
                </button>
                <button type="button" class="filter-tab" data-filter="ui-kit" role="tab" aria-selected="false">
                    UI Kit
                </button>
            </div> --}}

            <!-- Dynamic Product Catalog Container (Rendered by script.js) -->
            <div class="products-catalog-grid" id="productsContainer" role="region" aria-live="polite">
                <!-- Dynamically populated by DIGITAKA_PRODUCTS in script.js -->
            </div>

            <!-- Link to Dedicated Products Page -->
            <div class="reveal-init text-center" style="margin-top: 3rem;">
                <a href="products.html" class="btn-digitaka btn-outline-forest">
                    Jelajahi Etalase Lengkap & Filter Lanjutan
                    <i class="bi bi-arrow-right" aria-hidden="true"></i>
                </a>
            </div>

        </div>
    </section>



    <section class="services-section section-pad" id="layanan" aria-labelledby="servicesTitle">
        <div class="container-digitaka">

            <!-- Section Header -->
            <div class="section-header-editorial reveal-init">
                <div class="section-title-wrap">
                    <span class="section-tag">Layanan Studio</span>
                    <h2 id="servicesTitle" class="section-title">Apa yang Bisa Kami Bangun?</h2>
                </div>
                <p class="section-subtitle">
                    Tiga pilar layanan pengembangan digital untuk mentransformasi cara Anda berkomunikasi, melayani
                    pengguna, dan mengelola operasional.
                </p>
            </div>

            <!-- Editorial Services List -->
            <div class="services-editorial-list" role="list">

                <!-- Service A: Website Development -->
                <article class="service-row-item trigger-discussion reveal-init" data-service="Website Development"
                    role="listitem" tabindex="0" aria-label="Layanan Website Development">
                    <span class="service-index" aria-hidden="true">01 /</span>

                    <div class="service-title-col">
                        <span class="service-category-tag">Desain & Identitas</span>
                        <h3 class="service-name">Website Development</h3>
                    </div>

                    <div class="service-desc-col">
                        <p class="service-desc-text">
                            Website profil sekolah, website bisnis perusahaan, landing page konversi tinggi, dan
                            katalog
                            toko online. Dibangun dengan tipografi kuat, kecepatan muat instan, dan struktur ramah
                            mesin
                            pencari.
                        </p>
                        <div class="service-deliverables" aria-label="Cakupan pengerjaan">
                            <span class="service-pill">Website Sekolah</span>
                            <span class="service-pill">Website Bisnis & UMKM</span>
                            <span class="service-pill">Landing Page</span>
                            <span class="service-pill">Toko Online</span>
                        </div>
                    </div>

                    <div class="service-action-col">
                        <div class="service-circle-btn" aria-hidden="true">
                            <i class="bi bi-arrow-up-right"></i>
                        </div>
                    </div>
                </article>

                <!-- Service B: Web Application -->
                <article class="service-row-item trigger-discussion reveal-init delay-1" data-service="Web Application"
                    role="listitem" tabindex="0" aria-label="Layanan Web Application">
                    <span class="service-index" aria-hidden="true">02 /</span>

                    <div class="service-title-col">
                        <span class="service-category-tag">Sistem & Otomasi</span>
                        <h3 class="service-name">Web Application</h3>
                    </div>

                    <div class="service-desc-col">
                        <p class="service-desc-text">
                            Pengembangan sistem informasi terpadu, aplikasi administrasi internal, dashboard
                            analitik
                            data, dan sistem manajemen alur kerja bisnis untuk memangkas proses manual dan
                            meminimalisir
                            kesalahan kerja.
                        </p>
                        <div class="service-deliverables" aria-label="Cakupan pengerjaan">
                            <span class="service-pill">Sistem Informasi</span>
                            <span class="service-pill">Aplikasi Administrasi</span>
                            <span class="service-pill">Dashboard Manajemen</span>
                            <span class="service-pill">Aplikasi Bisnis Custom</span>
                        </div>
                    </div>

                    <div class="service-action-col">
                        <div class="service-circle-btn" aria-hidden="true">
                            <i class="bi bi-arrow-up-right"></i>
                        </div>
                    </div>
                </article>

                <!-- Service C: Custom Digital Solutions -->
                <article class="service-row-item trigger-discussion reveal-init delay-2"
                    data-service="Custom Digital Solutions" role="listitem" tabindex="0"
                    aria-label="Layanan Custom Digital Solutions">
                    <span class="service-index" aria-hidden="true">03 /</span>

                    <div class="service-title-col">
                        <span class="service-category-tag">Kebutuhan Spesifik</span>
                        <h3 class="service-name">Custom Digital Solutions</h3>
                    </div>

                    <div class="service-desc-col">
                        <p class="service-desc-text">
                            Solusi digital khusus yang dirancang berdasarkan kebutuhan unik pelanggan — mulai dari
                            modernisasi sistem lama, integrasi API antarmuka, konsultasi arsitektur digital, hingga
                            pemeliharaan jangka panjang.
                        </p>
                        <div class="service-deliverables" aria-label="Cakupan pengerjaan">
                            <span class="service-pill">Solusi Kebutuhan Khusus</span>
                            <span class="service-pill">Integrasi API & Layanan</span>
                            <span class="service-pill">Konsultasi Arsitektur</span>
                            <span class="service-pill">Pemeliharaan & Optimasi</span>
                        </div>
                    </div>

                    <div class="service-action-col">
                        <div class="service-circle-btn" aria-hidden="true">
                            <i class="bi bi-arrow-up-right"></i>
                        </div>
                    </div>
                </article>

            </div>

            <!-- Link to Dedicated Services Page -->
            <div class="reveal-init text-center" style="margin-top: 3.5rem;">
                <a href="services.html" class="btn-digitaka btn-outline-forest">
                    Lihat Rincian Detail Solusi & Alur Kerja Layanan
                    <i class="bi bi-arrow-right" aria-hidden="true"></i>
                </a>
            </div>

        </div>
    </section>

    <section class="products-section section-pad" id="produk-digital" aria-labelledby="productsTitle">
        <div class="container-digitaka">

            <!-- Section Header -->
            <div class="section-header-editorial reveal-init">
                <div class="section-title-wrap">
                    <span class="section-tag">Produk Siap Pakai</span>
                    <h2 id="productsTitle" class="section-title">Tools That Make Work Easier.</h2>
                </div>
                <p class="section-subtitle">
                    Etalase template website, dashboard Bootstrap, source code aplikasi, dan panduan digital yang
                    dibangun dengan standar profesional.
                </p>
            </div>

            <!-- Filter Tab Buttons -->
            <div class="products-filter-strip reveal-init" role="tablist" aria-label="Filter Kategori Produk">
                <button type="button" class="filter-tab active" data-filter="all" role="tab" aria-selected="true">
                    Semua Produk
                </button>
                <button type="button" class="filter-tab" data-filter="template-web" role="tab" aria-selected="false">
                    Template Website
                </button>
                <button type="button" class="filter-tab" data-filter="dashboard" role="tab" aria-selected="false">
                    Dashboard Admin
                </button>
                <button type="button" class="filter-tab" data-filter="sekolah" role="tab" aria-selected="false">
                    Administrasi Sekolah
                </button>
                <button type="button" class="filter-tab" data-filter="source-code" role="tab" aria-selected="false">
                    Source Code
                </button>
                <button type="button" class="filter-tab" data-filter="ui-kit" role="tab" aria-selected="false">
                    UI Kit
                </button>
            </div>

            <!-- Dynamic Product Catalog Container (Rendered by script.js) -->
            <div class="products-catalog-grid" id="productsContainer" role="region" aria-live="polite">
                <!-- Dynamically populated by DIGITAKA_PRODUCTS in script.js -->
            </div>

            <!-- Link to Dedicated Products Page -->
            <div class="reveal-init text-center" style="margin-top: 3rem;">
                <a href="products.html" class="btn-digitaka btn-outline-forest">
                    Jelajahi Etalase Lengkap & Filter Lanjutan
                    <i class="bi bi-arrow-right" aria-hidden="true"></i>
                </a>
            </div>

        </div>
    </section>

    <section class="works-section section-pad" id="portofolio" aria-labelledby="worksTitle">
        <div class="container-digitaka">

            <!-- Section Header -->
            <div class="section-header-editorial reveal-init">
                <div class="section-title-wrap">
                    <span class="section-tag">Portofolio Pilihan</span>
                    <h2 id="worksTitle" class="section-title">Built with Purpose.</h2>
                </div>
                <p class="section-subtitle">
                    Kumpulan contoh proyek yang menggambarkan bagaimana kami mengubah permasalahan operasional
                    menjadi
                    solusi digital yang nyata dan terukur.
                </p>
            </div>

            <!-- Asymmetric Editorial Works Grid -->
            <div class="portfolio-editorial-grid">

                <!-- Project 1: Education (Wide 7 Cols) -->
                <article class="portfolio-item portfolio-span-7 reveal-init">
                    <div class="portfolio-preview-box">
                        <div class="mockup-school-portal" aria-hidden="true">
                            <div class="school-banner">
                                <span>SDN HARAPAN BANGSA · PORTAL RESMI</span>
                                <span>PPDB ONLINE AKTIF</span>
                            </div>
                            <div class="school-grid-cards">
                                <div class="school-mini-card">
                                    <span style="display:block; color:var(--color-forest); font-weight:700;">Warta
                                        Sekolah</span>
                                    <span>Pengumuman Ujian Semester</span>
                                </div>
                                <div class="school-mini-card">
                                    <span style="display:block; color:var(--color-forest); font-weight:700;">Direktori
                                        Guru</span>
                                    <span>Profil 32 Tenaga Pendidik</span>
                                </div>
                                <div class="school-mini-card">
                                    <span style="display:block; color:var(--color-forest); font-weight:700;">Prestasi
                                        Siswa</span>
                                    <span>Olimpiade Sains Kota</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-info">
                        <span class="portfolio-category-tag">Education</span>
                        <h3 class="portfolio-title">Portal Akademik & Profil SDN Harapan Bangsa</h3>
                        <p class="portfolio-summary">
                            Membangun website resmi terpadu yang memadukan publikasi berita sekolah, informasi
                            kegiatan
                            siswa, pengumuman jadwal akademik, dan panduan pendaftaran siswa baru dalam tata letak
                            yang
                            mudah dibaca oleh orang tua murid.
                        </p>
                        <div class="portfolio-tech-pills">
                            <span class="portfolio-pill">Responsive Web</span>
                            <span class="portfolio-pill">Informasi PPDB</span>
                            <span class="portfolio-pill">Aksesibilitas Cepat</span>
                        </div>
                    </div>
                </article>

                <!-- Project 2: Web Application (5 Cols) -->
                <article class="portfolio-item portfolio-span-5 reveal-init delay-1">
                    <div class="portfolio-preview-box" style="background-color: var(--color-forest-dark);">
                        <div class="mockup-finance-dash" aria-hidden="true">
                            <div class="finance-head">
                                <span>KOPERASI MITRA MANDIRI</span>
                                <span style="color:#6CE5B1;">VERIFIKASI AKTIF</span>
                            </div>
                            <div class="finance-metrics-strip">
                                <div class="finance-metric-box">
                                    <div class="finance-metric-num">Rp 148.5M</div>
                                    <div class="finance-metric-lbl">Total Perputaran Kas</div>
                                </div>
                                <div class="finance-metric-box">
                                    <div class="finance-metric-num">420+</div>
                                    <div class="finance-metric-lbl">Anggota Aktif</div>
                                </div>
                            </div>
                            <div
                                style="font-size: 8px; color:rgba(255,255,255,0.7); background:rgba(255,255,255,0.05); padding:4px 6px; border-radius:3px; margin-top:2px;">
                                Pencatatan Buku Kas & Laporan Neraca Bulanan Otomatis
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-info">
                        <span class="portfolio-category-tag">Web Application</span>
                        <h3 class="portfolio-title">Sistem Kas & Simpan Pinjam Koperasi</h3>
                        <p class="portfolio-summary">
                            Aplikasi web otomasi pencatatan pembukuan kas anggota, rekap setoran iuran rutin, dan
                            pembuatan laporan neraca keuangan otomatis yang memangkas waktu tutup buku bulanan.
                        </p>
                        <div class="portfolio-tech-pills">
                            <span class="portfolio-pill">Sistem Informasi</span>
                            <span class="portfolio-pill">Dashboard Keuangan</span>
                            <span class="portfolio-pill">Export Laporan PDF</span>
                        </div>
                    </div>
                </article>

                <!-- Project 3: Business (6 Cols) -->
                <article class="portfolio-item portfolio-span-6 reveal-init">
                    <div class="portfolio-preview-box">
                        <div class="mockup-atelier-shop" aria-hidden="true">
                            <div class="atelier-nav">
                                <span>NUSANTARA CRAFT ATELIER</span>
                                <span>KATALOG PRODUK</span>
                            </div>
                            <div class="atelier-showcase">
                                <div class="atelier-item-preview">
                                    <span>Koleksi Tenun Etnik</span>
                                </div>
                                <div class="atelier-item-preview">
                                    <span>Kerajinan Kayu Ukir</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-info">
                        <span class="portfolio-category-tag">Business</span>
                        <h3 class="portfolio-title">Website Katalog Nusantara Craft Atelier</h3>
                        <p class="portfolio-summary">
                            Etalase digital dengan fotografi produk bergaya editorial, deskripsi bahan bernilai
                            seni,
                            serta integrasi tombol pertanyaan instan WhatsApp bagi calon pembeli ritel dan pesanan
                            korporat.
                        </p>
                        <div class="portfolio-tech-pills">
                            <span class="portfolio-pill">Katalog Produk UMKM</span>
                            <span class="portfolio-pill">Integrasi WhatsApp</span>
                            <span class="portfolio-pill">Optimasi Gambar</span>
                        </div>
                    </div>
                </article>

                <!-- Project 4: Web Application & Education (6 Cols) -->
                <article class="portfolio-item portfolio-span-6 reveal-init delay-1">
                    <div class="portfolio-preview-box">
                        <div class="mockup-attendance-app" aria-hidden="true">
                            <div
                                style="display:flex; justify-content:space-between; font-size:10px; font-weight:700; color:var(--color-forest);">
                                <span>SMP CENDEKIA · REKAP PRESENSI</span>
                                <span>HARI INI</span>
                            </div>
                            <div class="attendance-row">
                                <span>Kelas VII-A (32 Siswa)</span>
                                <span class="attendance-badge">Hadir 100%</span>
                            </div>
                            <div class="attendance-row">
                                <span>Kelas VIII-B (30 Siswa)</span>
                                <span class="attendance-badge">Hadir 96.6%</span>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-info">
                        <span class="portfolio-category-tag">Web Application</span>
                        <h3 class="portfolio-title">Aplikasi Presensi & Evaluasi Guru SMP Cendekia</h3>
                        <p class="portfolio-summary">
                            Sistem internal berbasis web untuk pencatatan kehadiran tenaga pendidik, pemantauan
                            agenda
                            harian belajar mengajar, serta pengisian evaluasi capaian kurikulum siswa per semester.
                        </p>
                        <div class="portfolio-tech-pills">
                            <span class="portfolio-pill">Aplikasi Presensi</span>
                            <span class="portfolio-pill">Manajemen Guru</span>
                            <span class="portfolio-pill">Rekap Data Harian</span>
                        </div>
                    </div>
                </article>

            </div>

        </div>
    </section>

    <section class="process-section section-pad" aria-labelledby="processTitle">
        <div class="container-digitaka">

            <!-- Section Header -->
            <div class="section-header-editorial reveal-init">
                <div class="section-title-wrap">
                    <span class="section-tag">Alur Kerja Studio</span>
                    <h2 id="processTitle" class="section-title">Dari Ide Menjadi Solusi.</h2>
                </div>
                <p class="section-subtitle">
                    Pendekatan terstruktur dengan tahapan yang transparan untuk memastikan setiap proyek selesai
                    tepat
                    waktu, tepat fungsi, dan bebas dari kebingungan.
                </p>
            </div>

            <!-- 4 Sequential Stages Grid -->
            <div class="process-sequence-grid">

                <!-- Stage 01: Discover -->
                <div class="process-card reveal-init">
                    <div class="process-step-num" aria-hidden="true">01</div>
                    <h3 class="process-step-name">Discover.</h3>
                    <p class="process-step-desc">
                        Memahami kebutuhan dan permasalahan pelanggan melalui diskusi mendalam, mengidentifikasi
                        target
                        pengguna, dan menentukan ruang lingkup proyek yang realistis.
                    </p>
                    <div class="process-step-deliverable">
                        <i class="bi bi-file-earmark-check"></i>
                        <span>Output: Dokumen Kebutuhan Sistem</span>
                    </div>
                </div>

                <!-- Stage 02: Design -->
                <div class="process-card reveal-init delay-1">
                    <div class="process-step-num" aria-hidden="true">02</div>
                    <h3 class="process-step-name">Design.</h3>
                    <p class="process-step-desc">
                        Merancang struktur informasi, alur pengalaman pengguna (UX), serta gaya visual (UI)
                        editorial
                        yang memikat, harmonis, dan mudah dipahami.
                    </p>
                    <div class="process-step-deliverable">
                        <i class="bi bi-palette"></i>
                        <span>Output: Sitemap & Prototipe Antarmuka</span>
                    </div>
                </div>

                <!-- Stage 03: Develop -->
                <div class="process-card reveal-init delay-2">
                    <div class="process-step-num" aria-hidden="true">03</div>
                    <h3 class="process-step-name">Develop.</h3>
                    <p class="process-step-desc">
                        Mengembangkan website atau aplikasi menggunakan kode bersih, semantik, responsif, dan
                        melakukan
                        pengujian menyeluruh pada berbagai jenis layar.
                    </p>
                    <div class="process-step-deliverable">
                        <i class="bi bi-code-square"></i>
                        <span>Output: Kode Siap Operasi & Teruji</span>
                    </div>
                </div>

                <!-- Stage 04: Deliver -->
                <div class="process-card reveal-init delay-3">
                    <div class="process-step-num" aria-hidden="true">04</div>
                    <h3 class="process-step-name">Deliver.</h3>
                    <p class="process-step-desc">
                        Menyerahkan solusi digital, mendampingi proses peluncuran, memberikan panduan penggunaan
                        sistem,
                        serta dukungan pemeliharaan sesuai kesepakatan.
                    </p>
                    <div class="process-step-deliverable">
                        <i class="bi bi-box2-heart"></i>
                        <span>Output: Panduan & Garansi Dukungan</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="cta-section section-pad" aria-labelledby="ctaTitle">
        <div class="cta-bg-watermark" aria-hidden="true">DIGITAKA</div>

        <div class="container-digitaka">
            <div class="cta-inner-grid">

                <div class="reveal-init">
                    <span class="badge-editorial badge-ivory-dark" style="margin-bottom:1.25rem;">Konsultasi Bebas
                        Tekanan</span>
                    <h2 id="ctaTitle" class="cta-title">
                        Ada ide yang ingin diwujudkan?
                    </h2>
                    <p class="cta-desc">
                        Mulai dengan menceritakan kebutuhan Anda. Kami bantu menemukan solusi digital yang tepat,
                        terukur, dan sesuai dengan kapasitas Anda.
                    </p>
                </div>

                <div class="cta-actions-column reveal-init delay-1">
                    <button type="button" class="btn-digitaka btn-ivory trigger-discussion"
                        data-service="Konsultasi Awal">
                        Diskusikan Proyek
                        <i class="bi bi-arrow-right" aria-hidden="true"></i>
                    </button>
                    <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer"
                        class="cta-direct-link">
                        <i class="bi bi-whatsapp"></i>
                        <span>Hubungi Langsung via WhatsApp (+62 812-3456-7890)</span>
                    </a>
                </div>

            </div>
        </div>
    </section>

</x-layouts::app-layout>