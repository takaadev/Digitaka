<?php

namespace App\Filament\Admin\Resources\ServiceCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->placeholder('Masukkan nama')
                    ->columnSpanFull()
                    ->required(),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->placeholder('Masukkan deskripsi')
                    ->rows(4)
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->onColor('success')
                    ->offColor('danger')
                    ->required(),
            ]);
    }
}
