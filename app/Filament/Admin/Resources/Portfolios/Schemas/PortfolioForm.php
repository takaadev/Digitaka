<?php

namespace App\Filament\Admin\Resources\Portfolios\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Portofolio')
                    ->description('Masukkan informasi utama proyek yang telah diselesaikan.')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->label('Gambar Utama')
                            ->helperText('Unggah gambar utama portofolio. Format JPG, PNG, atau WebP. Maksimal 5 MB.')
                            ->image()
                            ->disk('public')
                            ->directory('portfolios')
                            ->imageEditor()
                            ->maxSize(5120)
                            ->required()
                            ->columnSpanFull(),

                        Grid::make(2)
                            ->schema([
                                Select::make('service_id')
                                    ->label('Layanan Terkait')
                                    ->relationship('service', 'title')
                                    ->placeholder('Pilih layanan')
                                    ->searchable()
                                    ->preload()
                                    ->native(false),

                                TextInput::make('title')
                                    ->label('Judul Proyek')
                                    ->placeholder('Contoh: Website Profil Sekolah')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('client_name')
                                    ->label('Nama Klien')
                                    ->placeholder('Masukkan nama klien')
                                    ->maxLength(255),

                                TextInput::make('project_url')
                                    ->label('Tautan Proyek')
                                    ->placeholder('https://example.com')
                                    ->url()
                                    ->maxLength(500),
                            ]),
                        TagsInput::make('tags')
                            ->label('Tag')
                            ->placeholder('Masukkan tag, lalu tekan Enter')
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Deskripsi Proyek')
                            ->placeholder('Jelaskan proyek, tujuan, dan hasil pengerjaannya...')
                            ->rows(6)
                            ->columnSpanFull(),
                    ]),

                Section::make('Galeri Proyek')
                    ->description('Tambahkan gambar pendukung atau dokumentasi hasil pengerjaan proyek.')
                    ->schema([
                        FileUpload::make('images')
                            ->label('Gambar Galeri')
                            ->helperText('Unggah maksimal 5 gambar. Format JPG, PNG, atau WebP. Maksimal 5 MB per gambar.')
                            ->image()
                            ->multiple()
                            ->maxFiles(5)
                            ->maxSize(5120)
                            ->disk('public')
                            ->directory('portfolios/gallery')
                            ->reorderable()
                            ->appendFiles()
                            ->imageEditor()
                            ->panelLayout('grid')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
