<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'DIGITAKA',
            'email' => 'admin@digitaka.id',
        ]);


        $categories = [
            [
                'name' => 'Pengembangan Website',
                'description' => 'Layanan pembuatan website profesional untuk sekolah, perusahaan, UMKM, bisnis lokal, dan kebutuhan lainnya.',
            ],
            [
                'name' => 'Aplikasi Web',
                'description' => 'Pengembangan aplikasi berbasis web untuk sistem informasi, administrasi, manajemen, dan operasional bisnis.',
            ],
            [
                'name' => 'Pemeliharaan Website',
                'description' => 'Layanan pemeliharaan, perbaikan, pembaruan, dan optimasi website agar tetap aman dan berjalan optimal.',
            ],
            [
                'name' => 'Konsultasi Digital',
                'description' => 'Layanan konsultasi dan pendampingan dalam merencanakan serta mengembangkan solusi digital sesuai kebutuhan.',
            ],
        ];

        foreach ($categories as $category) {
            ServiceCategory::updateOrCreate(
                ['slug' => Str::slug($category['name'])],
                [
                    'name' => $category['name'],
                    'slug' => Str::slug($category['name']),
                    'description' => $category['description'],
                    'is_active' => true,
                ]
            );
        }

        // Layanan
        // Layanan
        $services = [
            [
                'category' => 'pengembangan-website',
                'title' => 'Website Company Profile',
                'description' => 'Layanan pembuatan website company profile profesional untuk memperkenalkan identitas, profil, layanan, dan keunggulan perusahaan secara digital.',
                'scenario' => 'Perusahaan atau bisnis belum memiliki website resmi sehingga calon pelanggan kesulitan mendapatkan informasi mengenai profil, produk, dan layanan yang ditawarkan.',
                'features' => [
                    'Desain responsif multi-perangkat',
                    'Halaman profil perusahaan',
                    'Halaman layanan dan produk',
                    'Galeri dokumentasi',
                    'Formulir kontak',
                    'Integrasi WhatsApp',
                    'Optimasi SEO',
                ],
                'use_cases' => [
                    ['title' => 'Analisis Kebutuhan', 'notes' => 'Mengidentifikasi kebutuhan, tujuan, dan target pengunjung website.'],
                    ['title' => 'Perancangan UI/UX', 'notes' => 'Membuat desain tampilan website sesuai identitas perusahaan.'],
                    ['title' => 'Pengembangan Website', 'notes' => 'Membangun halaman dan fitur website sesuai rancangan.'],
                    ['title' => 'Pengujian', 'notes' => 'Memastikan seluruh fitur berjalan dengan baik di berbagai perangkat.'],
                    ['title' => 'Publikasi', 'notes' => 'Melakukan deployment website ke hosting dan domain.'],
                ],
                'is_featured' => true,
            ],
            [
                'category' => 'pengembangan-website',
                'title' => 'Website Sekolah',
                'description' => 'Layanan pengembangan website sekolah sebagai pusat informasi digital untuk menyampaikan profil, kegiatan, berita, pengumuman, dan informasi akademik.',
                'scenario' => 'Sekolah masih menyampaikan informasi melalui media sosial atau papan pengumuman sehingga informasi belum terpusat dan sulit diakses oleh masyarakat.',
                'features' => [
                    'Profil sekolah',
                    'Informasi guru dan tenaga kependidikan',
                    'Berita dan artikel sekolah',
                    'Pengumuman sekolah',
                    'Galeri kegiatan',
                    'Informasi fasilitas',
                    'Halaman PPDB',
                    'Integrasi WhatsApp',
                ],
                'use_cases' => [
                    ['title' => 'Analisis Kebutuhan', 'notes' => 'Mengidentifikasi kebutuhan informasi dan struktur halaman sekolah.'],
                    ['title' => 'Desain Website', 'notes' => 'Menyusun tampilan website sesuai identitas sekolah.'],
                    ['title' => 'Pengembangan', 'notes' => 'Membangun website dan sistem pengelolaan konten.'],
                    ['title' => 'Input Konten', 'notes' => 'Memasukkan informasi profil, berita, dan dokumentasi sekolah.'],
                    ['title' => 'Publikasi', 'notes' => 'Mengunggah website agar dapat diakses secara online.'],
                ],
                'is_featured' => true,
            ],
            [
                'category' => 'aplikasi-web',
                'title' => 'Sistem Informasi Manajemen',
                'description' => 'Layanan pembuatan aplikasi web untuk membantu organisasi dan perusahaan mengelola data, administrasi, serta aktivitas operasional secara terintegrasi.',
                'scenario' => 'Pengelolaan data masih dilakukan secara manual menggunakan dokumen atau spreadsheet sehingga berisiko terjadi kesalahan, duplikasi, dan kesulitan dalam pencarian data.',
                'features' => [
                    'Dashboard informasi',
                    'Manajemen pengguna',
                    'Hak akses berdasarkan peran',
                    'Manajemen data terpusat',
                    'Pencarian dan filter data',
                    'Laporan dan rekapitulasi',
                    'Ekspor data',
                ],
                'use_cases' => [
                    ['title' => 'Analisis Sistem', 'notes' => 'Menganalisis proses bisnis dan kebutuhan pengelolaan data.'],
                    ['title' => 'Perancangan Database', 'notes' => 'Menyusun struktur database dan relasi antar data.'],
                    ['title' => 'Pengembangan Aplikasi', 'notes' => 'Membangun dashboard, modul, dan fitur manajemen.'],
                    ['title' => 'Pengujian Sistem', 'notes' => 'Menguji fungsionalitas dan hak akses pengguna.'],
                    ['title' => 'Implementasi', 'notes' => 'Melakukan deployment dan memberikan panduan penggunaan.'],
                ],
                'is_featured' => true,
            ],
            [
                'category' => 'aplikasi-web',
                'title' => 'Aplikasi Point of Sale (POS)',
                'description' => 'Layanan pengembangan aplikasi kasir berbasis web untuk membantu bisnis mengelola transaksi penjualan, produk, stok barang, dan laporan secara efisien.',
                'scenario' => 'Proses transaksi dan pencatatan stok masih dilakukan secara manual sehingga pemilik usaha kesulitan memantau penjualan dan mengetahui kondisi persediaan barang.',
                'features' => [
                    'Manajemen produk',
                    'Manajemen kategori produk',
                    'Transaksi penjualan',
                    'Manajemen stok barang',
                    'Riwayat transaksi',
                    'Laporan penjualan',
                    'Manajemen kasir',
                    'Cetak struk transaksi',
                ],
                'use_cases' => [
                    ['title' => 'Analisis Operasional', 'notes' => 'Mengidentifikasi alur transaksi dan kebutuhan bisnis.'],
                    ['title' => 'Perancangan Sistem', 'notes' => 'Menyusun database produk, stok, pengguna, dan transaksi.'],
                    ['title' => 'Pengembangan POS', 'notes' => 'Membangun modul kasir dan pengelolaan inventaris.'],
                    ['title' => 'Pengujian Transaksi', 'notes' => 'Memastikan transaksi dan perhitungan stok berjalan akurat.'],
                    ['title' => 'Implementasi', 'notes' => 'Menerapkan aplikasi pada operasional bisnis.'],
                ],
                'is_featured' => true,
            ],
            [
                'category' => 'pemeliharaan-website',
                'title' => 'Maintenance dan Optimasi Website',
                'description' => 'Layanan pemeliharaan website secara berkala untuk menjaga keamanan, stabilitas, performa, dan kompatibilitas website agar tetap optimal.',
                'scenario' => 'Website mengalami penurunan performa, error, masalah keamanan, atau membutuhkan pembaruan sistem dan konten secara berkala.',
                'features' => [
                    'Pembaruan sistem dan plugin',
                    'Backup database dan file',
                    'Pemeriksaan keamanan',
                    'Perbaikan bug dan error',
                    'Optimasi kecepatan website',
                    'Monitoring website',
                    'Pemeriksaan database',
                ],
                'use_cases' => [
                    ['title' => 'Audit Website', 'notes' => 'Memeriksa kondisi sistem, keamanan, dan performa website.'],
                    ['title' => 'Backup Data', 'notes' => 'Membuat cadangan database dan seluruh file website.'],
                    ['title' => 'Perbaikan Sistem', 'notes' => 'Memperbaiki error dan memperbarui komponen website.'],
                    ['title' => 'Optimasi', 'notes' => 'Meningkatkan performa dan keamanan website.'],
                    ['title' => 'Monitoring', 'notes' => 'Memantau kondisi website secara berkala.'],
                ],
                'is_featured' => false,
            ],
            [
                'category' => 'konsultasi-digital',
                'title' => 'Konsultasi dan Perencanaan Sistem Digital',
                'description' => 'Layanan konsultasi teknologi untuk membantu bisnis dan organisasi menentukan solusi digital, merancang sistem, serta menyusun strategi pengembangan aplikasi.',
                'scenario' => 'Organisasi memiliki kebutuhan digitalisasi tetapi belum mengetahui teknologi, fitur, alur sistem, dan estimasi pengembangan yang tepat.',
                'features' => [
                    'Analisis kebutuhan bisnis',
                    'Identifikasi masalah operasional',
                    'Rekomendasi teknologi',
                    'Perancangan alur sistem',
                    'Perancangan database',
                    'Perencanaan fitur aplikasi',
                    'Estimasi pengembangan',
                ],
                'use_cases' => [
                    ['title' => 'Diskusi Kebutuhan', 'notes' => 'Menggali kebutuhan dan permasalahan yang dihadapi.'],
                    ['title' => 'Analisis Solusi', 'notes' => 'Menentukan pendekatan teknologi yang sesuai.'],
                    ['title' => 'Perancangan Sistem', 'notes' => 'Menyusun alur kerja, fitur, dan struktur database.'],
                    ['title' => 'Penyusunan Rencana', 'notes' => 'Menentukan tahapan, prioritas, dan estimasi pengembangan.'],
                    ['title' => 'Presentasi Rekomendasi', 'notes' => 'Menyampaikan hasil analisis dan rekomendasi solusi digital.'],
                ],
                'is_featured' => false,
            ],
        ];

        foreach ($services as $service) {
            $category = ServiceCategory::where('slug', $service['category'])->firstOrFail();

            Service::updateOrCreate(
                ['slug' => Str::slug($service['title'])],
                [
                    'service_category_id' => $category->id,
                    'title' => $service['title'],
                    'slug' => Str::slug($service['title']),
                    'thumbnail' => null,
                    'description' => $service['description'],
                    'scenario' => $service['scenario'],
                    'features' => $service['features'],
                    'use_cases' => $service['use_cases'],
                    'is_featured' => $service['is_featured'],
                    'is_active' => true,
                ]
            );
        }

        $this->call([
            ProductCategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
