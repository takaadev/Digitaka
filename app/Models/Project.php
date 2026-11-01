<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'total_price' => 'decimal:2',
            'down_payment' => 'decimal:2',
            'installment_count' => 'integer',
            'start_date' => 'date',
            'deadline' => 'date',
            'completed_at' => 'date',
            'status' => ProjectStatus::class,
        ];
    }

    public function inquiry(): BelongsTo
    {
        return $this->belongsTo(ProjectInquiry::class, 'project_inquiry_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(ProjectPayment::class);
    }

    /**
     * Total pembayaran yang sudah berhasil dibayar.
     */
    protected function totalPaid(): Attribute
    {
        return Attribute::make(
            get: fn() => (float) $this->payments()
                ->where('status', 'paid')
                ->sum('amount')
        );
    }

    /**
     * Sisa tagihan proyek.
     */
    protected function remainingPayment(): Attribute
    {
        return Attribute::make(
            get: fn() => max(
                0,
                (float) $this->total_price - $this->total_paid
            )
        );
    }

    /**
     * Status pelunasan.
     */
    protected function isFullyPaid(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->remaining_payment <= 0
        );
    }
}
