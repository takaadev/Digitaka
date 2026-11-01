<?php

namespace App\Models;

use App\Enums\ProductType;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, HasSlug;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            // Harga
            'price' => 'decimal:2',
            'discount_price' => 'decimal:2',

            // Enum
            'product_type' => ProductType::class,

            // Tanggal
            'release_date' => 'date',

            // JSON
            'features' => 'array',
            'tech_stacks' => 'array',
            'included_files' => 'array',
            'benefits' => 'array',
            'images' => 'array',
            'compatibility' => 'array',

            // Boolean
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    protected function slugSource(): string
    {
        return 'name';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}
