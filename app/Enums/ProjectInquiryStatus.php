<?php

namespace App\Enums;

enum ProjectInquiryStatus: string
{
    case APPLYING = 'applying';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';

    public function label(): string
    {
        return match ($this) {
            self::APPLYING => 'Menunggu',
            self::APPROVED => 'Disetujui',
            self::REJECTED => 'Ditolak',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn(self $status) => [
                $status->value => $status->label(),
            ])
            ->toArray();
    }
}
