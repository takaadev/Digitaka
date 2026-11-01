<?php

namespace App\Filament\Admin\Resources\ProjectInquiries\Pages;

use App\Filament\Admin\Resources\ProjectInquiries\ProjectInquiryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProjectInquiry extends ViewRecord
{
    protected static string $resource = ProjectInquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
