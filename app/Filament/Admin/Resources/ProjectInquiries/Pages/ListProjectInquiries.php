<?php

namespace App\Filament\Admin\Resources\ProjectInquiries\Pages;

use App\Filament\Admin\Resources\ProjectInquiries\ProjectInquiryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProjectInquiries extends ListRecords
{
    protected static string $resource = ProjectInquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
