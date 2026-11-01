<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Kategori
            $table->foreignId('product_category_id')
                ->nullable()
                ->constrained('product_categories')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            // Informasi utama
            $table->string('featured_image')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            // Harga
            $table->decimal('price', 15, 2)->default(0);
            $table->decimal('discount_price', 15, 2)->nullable();

            // Jenis produk
            $table->string('product_type')->default('other');

            // Spesifikasi produk
            $table->string('version', 50)->nullable();
            $table->date('release_date')->nullable();

            $table->json('features')->nullable();
            $table->json('tech_stacks')->nullable();
            $table->json('included_files')->nullable();
            $table->json('benefits')->nullable();
            $table->json('images')->nullable();

            // Lisensi
            $table->string('license_type')->nullable();
            $table->text('license_terms')->nullable();

            // Kompatibilitas
            $table->json('compatibility')->nullable();

            // Demo dan dukungan
            $table->string('demo_url', 500)->nullable();
            $table->text('support_description')->nullable();

            // Pengaturan
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
