<?php

namespace App\Enums;

enum ProductType: string
{
    case SOURCE_CODE = 'source_code';
    case TEMPLATE = 'template';
    case APPLICATION = 'application';
    case EBOOK = 'ebook';
    case OTHER = 'other';

    public function label(): string
    {
        return match ($this) {
            self::SOURCE_CODE => 'Source Code',
            self::TEMPLATE => 'Template',
            self::APPLICATION => 'Aplikasi',
            self::EBOOK => 'E-Book',
            self::OTHER => 'Lainnya',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn(self $type) => [
                $type->value => $type->label(),
            ])
            ->all();
    }
}
