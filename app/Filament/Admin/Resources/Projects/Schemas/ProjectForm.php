<?php

namespace App\Filament\Admin\Resources\Projects\Schemas;

use App\Enums\ProjectStatus;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('project_inquiry_id')
                    ->numeric(),
                TextInput::make('project_code')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('client_name')
                    ->required(),
                TextInput::make('client_email')
                    ->email(),
                TextInput::make('client_phone')
                    ->tel(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('agreed_price')
                    ->numeric()
                    ->prefix('$'),
                DatePicker::make('start_date'),
                DatePicker::make('deadline'),
                DatePicker::make('completed_at'),
                Select::make('status')
                    ->options(ProjectStatus::class)
                    ->default('pending')
                    ->required(),
                Textarea::make('admin_notes')
                    ->columnSpanFull(),
            ]);
    }
}
