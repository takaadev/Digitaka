<?php

namespace App\Models;

use App\Enums\ProjectInquiryStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectInquiry extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'status' => ProjectInquiryStatus::class,
        ];
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function project(): HasOne
    {
        return $this->hasOne(Project::class);
    }
}
