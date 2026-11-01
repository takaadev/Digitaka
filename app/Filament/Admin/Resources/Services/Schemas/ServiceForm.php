<?php

namespace App\Filament\Admin\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Wizard::make([
                Step::make('Layanan')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->label('Gambar Utama')
                            ->helperText('Upload gambar utama produk. Gunakan format JPG, PNG, atau WebP.')
                            ->image()
                            ->disk('public')
                            ->directory('services')
                            ->imageEditor()
                            ->maxSize(5120)
                            ->required()
                            ->columnSpanFull(),
                        Grid::make(2)->schema([
                            Select::make('service_category_id')
                                ->label('Kategori Layanan')
                                ->relationship('category', 'name')
                                ->searchable()
                                ->preload()
                                ->nullable(),

                            TextInput::make('title')
                                ->label('Nama Layanan')
                                ->required()
                                ->maxLength(255),

                            Textarea::make('description')
                                ->label('Deskripsi Layanan')
                                ->rows(8),

                            Textarea::make('scenario')
                                ->label('Skenario Penggunaan')
                                ->rows(8),
                        ]),
                    ]),

                Step::make('Fitur Layanan')
                    ->icon('heroicon-o-squares-plus')
                    ->schema([
                        TagsInput::make('features')
                            ->label('Daftar Fitur')
                            ->placeholder('Masukkan fitur, lalu tekan Enter')
                            ->columnSpanFull(),
                    ]),

                Step::make('Alur Pengembangan')
                    ->icon('heroicon-o-clipboard-document-list')
                    ->schema([
                        Repeater::make('use_cases')
                            ->label('Tahapan Pengerjaan')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Nama Tahap')
                                    ->required(),

                                TextInput::make('notes')
                                    ->label('Keterangan')
                                    ->required(),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->addActionLabel('Tambah')
                            ->reorderable()
                            ->columnSpanFull(),
                    ]),
            ])
                ->columnSpanFull()
                ->skippable()
                ->persistStepInQueryString(),

            Grid::make(2)->schema([
                Toggle::make('is_featured')
                    ->label('Layanan Unggulan')
                    ->default(false)
                    ->required(),

                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->default(true)
                    ->required(),
            ]),
        ]);
    }
}
