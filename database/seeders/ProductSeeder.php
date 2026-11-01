<?php

namespace Database\Seeders;

use App\Enums\ProductType;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'category' => 'Dashboard Admin',
                'name' => 'SchoolAdmin Pro',
                'description' => 'Sistem informasi administrasi sekolah modern berbasis Laravel. Membantu pengelolaan data siswa, guru, kelas, tahun pelajaran, dan administrasi sekolah dalam satu platform terintegrasi.',
                'price' => 249000,
                'discount_price' => 199000,
                'product_type' => ProductType::SOURCE_CODE,
                'version' => 'v2.5.0',
                'release_date' => '2026-10-01',
                'features' => [
                    'Dashboard Statistik',
                    'Manajemen Data Siswa',
                    'Manajemen Data Guru',
                    'Manajemen Kelas',
                    'Manajemen Tahun Pelajaran',
                    'Laporan Administrasi',
                    'Multi User dan Role',
                    'Responsive Design',
                ],
                'tech_stacks' => [
                    'Laravel 13',
                    'PHP 8.3',
                    'React',
                    'Inertia.js',
                    'Bootstrap 5',
                    'MySQL',
                ],
                'included_files' => [
                    'Source Code Lengkap',
                    'Database SQL',
                    'Dokumentasi Instalasi',
                    'Panduan Penggunaan PDF',
                ],
                'benefits' => [
                    'Gratis Update Minor',
                    'Dokumentasi Instalasi',
                    'Support Instalasi',
                ],
                'license_type' => 'Lisensi Komersial',
                'license_terms' => 'Dapat digunakan untuk satu institusi atau proyek. Dilarang menjual ulang source code sebagai produk digital tanpa izin.',
                'compatibility' => [
                    'PHP 8.3+',
                    'Laravel 13',
                    'MySQL 8+',
                    'Node.js 22+',
                ],
                'demo_url' => 'https://demo.example.com/schooladmin',
                'support_description' => 'Mendapatkan bantuan instalasi, dokumentasi penggunaan, dan dukungan teknis awal.',
                'is_featured' => true,
                'is_active' => true,
            ],

            [
                'category' => 'Aplikasi & Software',
                'name' => 'POS Master',
                'description' => 'Aplikasi Point of Sale untuk membantu pengelolaan transaksi penjualan, stok barang, pelanggan, dan laporan bisnis secara praktis dan efisien.',
                'price' => 350000,
                'discount_price' => null,
                'product_type' => ProductType::APPLICATION,
                'version' => 'v1.2.0',
                'release_date' => '2026-09-15',
                'features' => [
                    'Manajemen Produk',
                    'Transaksi Penjualan',
                    'Manajemen Stok',
                    'Data Pelanggan',
                    'Laporan Penjualan',
                    'Manajemen Kasir',
                ],
                'tech_stacks' => [
                    'Laravel',
                    'Filament',
                    'PHP 8.3',
                    'MySQL',
                    'Tailwind CSS',
                ],
                'included_files' => [
                    'Source Code',
                    'Database',
                    'Dokumentasi',
                ],
                'benefits' => [
                    'Gratis Dokumentasi',
                    'Panduan Instalasi',
                    'Support Teknis',
                ],
                'license_type' => 'Lisensi Personal',
                'license_terms' => 'Lisensi berlaku untuk satu pengguna atau satu bisnis. Tidak diperkenankan mendistribusikan ulang aplikasi.',
                'compatibility' => [
                    'PHP 8.3+',
                    'Laravel',
                    'MySQL 8+',
                ],
                'demo_url' => 'https://demo.example.com/pos',
                'support_description' => 'Dukungan teknis untuk instalasi dan konfigurasi awal aplikasi.',
                'is_featured' => false,
                'is_active' => true,
            ],

            [
                'category' => 'Template Website',
                'name' => 'WebSchool Template',
                'description' => 'Template website sekolah modern, profesional, dan responsif. Cocok untuk sekolah dasar, menengah, madrasah, maupun lembaga pendidikan lainnya.',
                'price' => 99000,
                'discount_price' => 79000,
                'product_type' => ProductType::TEMPLATE,
                'version' => 'v1.0.0',
                'release_date' => '2026-08-20',
                'features' => [
                    'Responsive Layout',
                    'Halaman Profil Sekolah',
                    'Halaman Berita',
                    'Galeri Sekolah',
                    'Informasi Kontak',
                    'SEO Friendly',
                ],
                'tech_stacks' => [
                    'HTML5',
                    'CSS3',
                    'JavaScript',
                    'Bootstrap 5',
                ],
                'included_files' => [
                    'HTML Files',
                    'CSS Files',
                    'JavaScript Files',
                    'Assets dan Images',
                    'Dokumentasi',
                ],
                'benefits' => [
                    'Mudah Dikustomisasi',
                    'Gratis Update Minor',
                    'Dokumentasi Penggunaan',
                ],
                'license_type' => 'Lisensi Personal',
                'license_terms' => 'Boleh dimodifikasi untuk kebutuhan satu website sekolah. Tidak boleh dijual kembali sebagai template.',
                'compatibility' => [
                    'Chrome',
                    'Firefox',
                    'Microsoft Edge',
                    'Mobile Browser',
                ],
                'demo_url' => 'https://demo.example.com/webschool',
                'support_description' => 'Panduan instalasi dan dokumentasi kustomisasi template.',
                'is_featured' => false,
                'is_active' => true,
            ],
        ];

        foreach ($products as $data) {
            $category = ProductCategory::where('name', $data['category'])->first();

            if (! $category) {
                continue;
            }

            unset($data['category']);

            $slug = Str::slug($data['name']);

            Product::updateOrCreate(
                ['slug' => $slug],
                [
                    ...$data,
                    'product_category_id' => $category->id,
                    'slug' => $slug,
                ]
            );
        }
    }
}
