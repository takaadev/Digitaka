<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Dashboard Admin',
                'description' => 'Template website resmi untuk sekolah, madrasah, dan pesantren dengan dashboard admin untuk mengelola data dan informasi.',
                'is_active' => true,
            ],
            [
                'name' => 'Source Code Aplikasi',
                'description' => 'Kumpulan source code aplikasi untuk pengembangan, pengelolaan, dan referensi sistem aplikasi.',
                'is_active' => true,
            ],
            [
                'name' => 'Template Website',
                'description' => 'Berbagai template website modern dan responsif untuk kebutuhan personal, bisnis, maupun instansi.',
                'is_active' => true,
            ],
            [
                'name' => 'Aplikasi & Software',
                'description' => 'Produk aplikasi dan software untuk membantu pekerjaan, bisnis, dan meningkatkan produktivitas.',
                'is_active' => true,
            ],
            [
                'name' => 'E-Book & Digital Guide',
                'description' => 'Buku digital dan panduan praktis untuk pembelajaran serta pengembangan keterampilan.',
                'is_active' => true,
            ],
            [
                'name' => 'Plugin & Extensions',
                'description' => 'Berbagai plugin dan ekstensi untuk menambah fitur serta fungsionalitas aplikasi.',
                'is_active' => true,
            ],
            [
                'name' => 'Script & Tools',
                'description' => 'Kumpulan script dan tools untuk otomatisasi serta mempermudah berbagai pekerjaan digital.',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            $category['slug'] = Str::slug($category['name']);

            ProductCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
