<?php

namespace App\Filament\Admin\Resources\ProjectInquiries\Schemas;

use App\Models\ProjectInquiry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProjectInquiryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('service.title')
                    ->label('Service')
                    ->placeholder('-'),
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('phone')
                    ->placeholder('-'),
                TextEntry::make('company_name')
                    ->placeholder('-'),
                TextEntry::make('project_title')
                    ->placeholder('-'),
                TextEntry::make('project_description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('budget_min')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('budget_max')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('target_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('admin_notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (ProjectInquiry $record): bool => $record->trashed()),
            ]);
    }
}
