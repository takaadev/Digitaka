<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use SoftDeletes, HasSlug;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'images' => 'array',
        ];
    }

    protected function slugSource(): string
    {
        return 'title';
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
