<?php

namespace App\Enums;

enum PortofolioType: string
{
    case WEBSITE = 'website';
    case WEB_APPLICATION = 'web_application';
    case MOBILE_APPLICATION = 'mobile_application';
    case UI_UX_DESIGN = 'ui_ux_design';
    case GRAPHIC_DESIGN = 'graphic_design';
    case OTHER = 'other';

    public function label(): string
    {
        return match ($this) {
            self::WEBSITE => 'Situs Web',
            self::WEB_APPLICATION => 'Aplikasi Web',
            self::MOBILE_APPLICATION => 'Aplikasi Seluler',
            self::UI_UX_DESIGN => 'Desain UI/UX',
            self::GRAPHIC_DESIGN => 'Desain Grafis',
            self::OTHER => 'Lainnya',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn(self $type) => [
                $type->value => $type->label(),
            ])
            ->toArray();
    }
}
