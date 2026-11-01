<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="DIGITAKA — Digital Studio yang membangun website, aplikasi web, sistem informasi, dan produk digital siap pakai untuk sekolah, UMKM, dan bisnis yang ingin bertumbuh." />
    <title>{{ config('app.name', 'DIGITAKA — Digital Studio') }}</title>
    <!-- Google Fonts: Plus Jakarta Sans (400, 500, 600, 700, 800) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <!-- ======================================================================
       1. HEADER & NAVBAR (Minimalist, Distinctive, Characterful)
       ====================================================================== -->
    <header class="site-header" role="banner">
        <div class="container-digitaka nav-container">

            <!-- Left: Logo & Studio Tagline -->
            <a href="#beranda" class="brand-link" aria-label="DIGITAKA — Beranda Digital Studio">
                <span class="brand-text">DIGITAKA</span>
                <span class="brand-tag">DIGITAL STUDIO</span>
            </a>

            <!-- Right: Desktop Navigation -->
            <nav class="desktop-nav" aria-label="Navigasi Utama">
                <a href="#beranda" class="nav-item-link active">Beranda</a>
                <a href="#layanan" class="nav-item-link">Layanan</a>
                <a href="#produk-digital" class="nav-item-link">Produk Digital</a>
                <a href="#portofolio" class="nav-item-link">Portofolio</a>
                <a href="#tentang" class="nav-item-link">Tentang Kami</a>
            </nav>

            <!-- Right: Action CTA Button -->
            <div class="d-none d-lg-flex align-items-center gap-3">
                <button type="button" class="btn-digitaka nav-cta-btn trigger-discussion"
                    data-service="Konsultasi Umum">
                    Diskusikan Proyek
                </button>
            </div>

            <!-- Mobile Hamburger Button -->
            <button type="button" class="mobile-toggle" aria-label="Buka menu navigasi" aria-expanded="false"
                aria-controls="mobileNavDrawer">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>
    </header>

    <!-- Mobile Navigation Drawer / Overlay -->
    <div class="mobile-drawer" id="mobileNavDrawer" role="dialog" aria-modal="true" aria-label="Navigasi Mobile">
        <nav class="mobile-nav-links">
            <a href="#beranda" class="mobile-link">
                <span>Beranda</span>
                <i class="bi bi-arrow-right"></i>
            </a>
            <a href="#layanan" class="mobile-link">
                <span>Layanan</span>
                <i class="bi bi-arrow-right"></i>
            </a>
            <a href="#produk-digital" class="mobile-link">
                <span>Produk Digital</span>
                <i class="bi bi-arrow-right"></i>
            </a>
            <a href="#portofolio" class="mobile-link">
                <span>Portofolio</span>
                <i class="bi bi-arrow-right"></i>
            </a>
            <a href="#tentang" class="mobile-link">
                <span>Tentang Kami</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </nav>
        <div class="mobile-drawer-footer">
            <button type="button" class="btn-digitaka btn-ivory mobile-drawer-cta trigger-discussion"
                style="width: 100%; justify-content: center;">
                Diskusikan Proyek
            </button>
            <div style="font-size: 0.78rem; color: rgba(232, 226, 213, 0.6); text-align: center;">
                DIGITAKA Digital Studio · Indonesia
            </div>
        </div>
    </div>

    <main id="main-content">
        {{ $slot }}
    </main>

    <footer class="site-footer" role="contentinfo">
        <div class="container-digitaka">

            <div class="footer-top-grid">

                <!-- Column 1: Brand Manifesto -->
                <div class="footer-brand-col">
                    <div class="footer-brand-title">DIGITAKA</div>
                    <p class="footer-brand-desc">
                        Digital Studio yang merancang website, aplikasi web kustom, sistem informasi terintegrasi, dan
                        produk digital siap pakai untuk kemajuan ekosistem bisnis dan pendidikan di Indonesia.
                    </p>
                    <div class="footer-social-strip" aria-label="Media Sosial DIGITAKA">
                        <a href="#" class="footer-social-btn" aria-label="Instagram DIGITAKA"><i
                                class="bi bi-instagram"></i></a>
                        <a href="#" class="footer-social-btn" aria-label="LinkedIn DIGITAKA"><i
                                class="bi bi-linkedin"></i></a>
                        <a href="#" class="footer-social-btn" aria-label="GitHub DIGITAKA"><i
                                class="bi bi-github"></i></a>
                        <a href="https://wa.me/6281234567890" class="footer-social-btn"
                            aria-label="WhatsApp DIGITAKA"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Column 2: Navigation Links -->
                <div>
                    <div class="footer-heading">Navigasi Utama</div>
                    <ul class="footer-link-list">
                        <li><a href="#beranda" class="footer-nav-link">Beranda</a></li>
                        <li><a href="#layanan" class="footer-nav-link">Layanan Kami</a></li>
                        <li><a href="#produk-digital" class="footer-nav-link">Katalog Produk</a></li>
                        <li><a href="#portofolio" class="footer-nav-link">Portofolio Pilihan</a></li>
                        <li><a href="#tentang" class="footer-nav-link">Tentang Studio</a></li>
                    </ul>
                </div>

                <!-- Column 3: Services & Products Links -->
                <div>
                    <div class="footer-heading">Layanan & Produk</div>
                    <ul class="footer-link-list">
                        <li><a href="#layanan" class="footer-nav-link">Website Development</a></li>
                        <li><a href="#layanan" class="footer-nav-link">Web Application</a></li>
                        <li><a href="#layanan" class="footer-nav-link">Custom Digital Solutions</a></li>
                        <li><a href="#produk-digital" class="footer-nav-link">Template Website Bisnis</a></li>
                        <li><a href="#produk-digital" class="footer-nav-link">Dashboard Admin Bootstrap</a></li>
                        <li><a href="#produk-digital" class="footer-nav-link">Sistem Administrasi Sekolah</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact Information (Easily editable) -->
                <div>
                    <div class="footer-heading">Informasi Kontak</div>

                    <div class="footer-contact-item">
                        <i class="bi bi-envelope"></i>
                        <div>
                            <div style="font-size:0.75rem; color:rgba(250,249,245,0.45);">Email Studio</div>
                            <a href="mailto:halo@digitaka.id"
                                style="color:var(--color-white); font-weight:500;">halo@digitaka.id</a>
                        </div>
                    </div>

                    <div class="footer-contact-item">
                        <i class="bi bi-whatsapp"></i>
                        <div>
                            <div style="font-size:0.75rem; color:rgba(250,249,245,0.45);">WhatsApp Bisnis</div>
                            <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer"
                                style="color:var(--color-white); font-weight:500;">+62 812-3456-7890</a>
                        </div>
                    </div>

                    <div class="footer-contact-item">
                        <i class="bi bi-geo-alt"></i>
                        <div>
                            <div style="font-size:0.75rem; color:rgba(250,249,245,0.45);">Lokasi Studio</div>
                            <span style="color:rgba(250,249,245,0.85);">Indonesia (Layanan Online Nasional)</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Footer Bottom Copyright & Legal -->
            <div class="footer-bottom-strip">
                <div>
                    &copy; 2025 DIGITAKA — Digital Studio. Seluruh hak cipta dilindungi.
                </div>
                <div style="display:flex; gap:1.5rem;">
                    <a href="#" style="color:inherit;">Kebijakan Privasi</a>
                    <a href="#" style="color:inherit;">Syarat & Ketentuan</a>
                </div>
            </div>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>