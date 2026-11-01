<?php

namespace App\Filament\Admin\Resources\ServiceCategories\Pages;

use App\Filament\Admin\Resources\ServiceCategories\ServiceCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\Width;

class ListServiceCategories extends ListRecords
{
    protected static string $resource = ServiceCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Tambah')->icon('heroicon-o-plus')->modalWidth(Width::Medium),
        ];
    }
}
