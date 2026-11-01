<?php

namespace App\Filament\Admin\Resources\ProjectInquiries\Pages;

use App\Filament\Admin\Resources\ProjectInquiries\ProjectInquiryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProjectInquiry extends EditRecord
{
    protected static string $resource = ProjectInquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
