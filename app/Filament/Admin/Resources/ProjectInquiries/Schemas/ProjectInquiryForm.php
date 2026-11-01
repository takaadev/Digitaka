<?php

namespace App\Filament\Admin\Resources\ProjectInquiries\Schemas;

use App\Enums\ProjectInquiryStatus;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProjectInquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('service_id')
                    ->relationship('service', 'title'),
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('company_name'),
                TextInput::make('project_title'),
                Textarea::make('project_description')
                    ->columnSpanFull(),
                TextInput::make('budget_min')
                    ->numeric(),
                TextInput::make('budget_max')
                    ->numeric(),
                DatePicker::make('target_date'),
                Select::make('status')
                    ->options(ProjectInquiryStatus::class)
                    ->default('new')
                    ->required(),
                Textarea::make('admin_notes')
                    ->columnSpanFull(),
            ]);
    }
}
