<?php

namespace App\Filament\Admin\Resources\Products\Schemas;

use App\Enums\ProductType;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    // STEP 1: INFORMASI PRODUK
                    Step::make('Informasi Produk')
                        ->description('Identitas dan gambar produk')
                        ->icon('heroicon-o-cube')
                        ->columns(2)
                        ->schema([
                            FileUpload::make('featured_image')
                                ->label('Gambar Utama')
                                ->helperText('Upload gambar utama produk. Gunakan format JPG, PNG, atau WebP.')
                                ->image()
                                ->disk('public')
                                ->directory('products/featured')
                                ->imageEditor()
                                ->maxSize(5120)
                                ->required()
                                ->columnSpanFull(),
                            Grid::make(12)
                                ->schema([
                                    Select::make('product_category_id')
                                        ->label('Kategori Produk')
                                        ->relationship('category', 'name')
                                        ->placeholder('Pilih kategori')
                                        ->searchable()
                                        ->preload()
                                        ->native(false)
                                        ->columnSpan(3),

                                    Select::make('product_type')
                                        ->label('Jenis Produk')
                                        ->options(ProductType::options())
                                        ->default(ProductType::OTHER->value)
                                        ->placeholder('Pilih jenis produk')
                                        ->native(false)
                                        ->required()
                                        ->columnSpan(3),

                                    TextInput::make('name')
                                        ->label('Nama Produk')
                                        ->placeholder('Contoh: AdminKit Pro')
                                        ->required()
                                        ->maxLength(255)
                                        ->columnSpan(6),
                                ])
                                ->columnSpanFull(),

                            Textarea::make('description')
                                ->label('Deskripsi Produk')
                                ->placeholder('Jelaskan produk, fungsi, dan manfaatnya...')
                                ->helperText('Tuliskan deskripsi yang jelas agar calon pembeli memahami produk.')
                                ->rows(4)
                                ->columnSpanFull(),

                            FileUpload::make('images')
                                ->label('Galeri Produk')
                                ->helperText('Tambahkan gambar pendukung atau screenshot produk. Maksimal 8 gambar.')
                                ->image()
                                ->multiple()
                                ->maxFiles(5)
                                ->maxSize(5120)
                                ->disk('public')
                                ->directory('products/gallery')
                                ->reorderable()
                                ->appendFiles()
                                ->imageEditor()
                                ->panelLayout('grid')
                                ->columnSpanFull(),
                        ]),

                    // STEP 2: HARGA PRODUK
                    Step::make('Harga Produk')
                        ->description('Atur harga jual dan diskon')
                        ->icon('heroicon-o-banknotes')
                        ->columns(2)
                        ->schema([
                            TextInput::make('price')
                                ->label('Harga Normal')
                                ->placeholder('Contoh: 249000')
                                ->numeric()
                                ->minValue(0)
                                ->prefix('Rp')
                                ->default(0)
                                ->helperText('Masukkan harga normal produk.')
                                ->required(),

                            TextInput::make('discount_price')
                                ->label('Harga Diskon')
                                ->placeholder('Kosongkan jika tidak ada diskon')
                                ->numeric()
                                ->minValue(0)
                                ->prefix('Rp')
                                ->helperText('Isi jika produk sedang mendapatkan potongan harga.')
                                ->nullable(),
                        ]),

                    // STEP 3: SPESIFIKASI PRODUK
                    Step::make('Spesifikasi')
                        ->description('Versi, fitur, dan teknologi')
                        ->icon('heroicon-o-clipboard-document-list')
                        ->columns(2)
                        ->schema([
                            TextInput::make('version')
                                ->label('Versi Produk')
                                ->placeholder('Contoh: v3.1')
                                ->maxLength(50),

                            DatePicker::make('release_date')
                                ->label('Tanggal Rilis / Pembaruan')
                                ->placeholder('Pilih tanggal')
                                ->native(false)
                                ->displayFormat('d M Y'),

                            TagsInput::make('features')
                                ->label('Fitur & Keunggulan')
                                ->placeholder('Ketik fitur lalu tekan Enter')
                                ->helperText('Contoh: Responsive Design, Multi User, Dark Mode')
                                ->columnSpanFull(),

                            TagsInput::make('tech_stacks')
                                ->label('Teknologi yang Digunakan')
                                ->placeholder('Ketik teknologi lalu tekan Enter')
                                ->helperText('Contoh: Laravel, React, Bootstrap, MySQL')
                                ->columnSpanFull(),

                            TagsInput::make('included_files')
                                ->label('File yang Didapatkan')
                                ->placeholder('Ketik nama file lalu tekan Enter')
                                ->helperText('Contoh: Source Code, Dokumentasi PDF, Database SQL')
                                ->columnSpanFull(),

                            TagsInput::make('benefits')
                                ->label('Keunggulan Tambahan')
                                ->placeholder('Tambahkan keunggulan lalu tekan Enter')
                                ->helperText('Contoh: Gratis Update, Dokumentasi, Support Awal')
                                ->columnSpanFull(),
                        ]),

                    // STEP 4: LISENSI DAN KOMPATIBILITAS
                    Step::make('Lisensi')
                        ->description('Ketentuan penggunaan produk')
                        ->icon('heroicon-o-shield-check')
                        ->columns(2)
                        ->schema([
                            TextInput::make('license_type')
                                ->label('Jenis Lisensi')
                                ->placeholder('Contoh: Lisensi Komersial')
                                ->maxLength(255)
                                ->columnSpanFull(),

                            Textarea::make('license_terms')
                                ->label('Ketentuan Lisensi')
                                ->placeholder('Jelaskan aturan penggunaan produk...')
                                ->helperText('Contoh: Boleh digunakan untuk satu proyek komersial.')
                                ->rows(5)
                                ->columnSpanFull(),

                            TagsInput::make('compatibility')
                                ->label('Kompatibilitas')
                                ->placeholder('Ketik kompatibilitas lalu tekan Enter')
                                ->helperText('Contoh: PHP 8.3, Laravel 12, MySQL 8, Bootstrap 5')
                                ->columnSpanFull(),
                        ]),

                    // STEP 5: DEMO DAN DUKUNGAN
                    Step::make('Demo & Dukungan')
                        ->description('Link demo dan informasi bantuan')
                        ->icon('heroicon-o-computer-desktop')
                        ->columns(1)
                        ->schema([
                            TextInput::make('demo_url')
                                ->label('URL Demo Produk')
                                ->placeholder('https://demo.example.com')
                                ->helperText('Masukkan link demo jika produk memiliki preview online.')
                                ->url()
                                ->maxLength(500),

                            Textarea::make('support_description')
                                ->label('Informasi Dukungan')
                                ->placeholder('Jelaskan dukungan yang akan diperoleh pembeli...')
                                ->helperText('Contoh: Bantuan instalasi, panduan penggunaan, dan support teknis.')
                                ->rows(5),
                        ]),

                    // STEP 6: PENGATURAN
                    Step::make('Pengaturan')
                        ->description('Status dan publikasi produk')
                        ->icon('heroicon-o-cog-6-tooth')
                        ->columns(2)
                        ->schema([
                            Toggle::make('is_featured')
                                ->label('Produk Unggulan')
                                ->helperText('Tampilkan produk sebagai rekomendasi atau produk unggulan.')
                                ->default(false)
                                ->inline(false)
                                ->required(),

                            Toggle::make('is_active')
                                ->label('Status Aktif')
                                ->helperText('Produk aktif dapat ditampilkan kepada pengunjung.')
                                ->default(true)
                                ->inline(false)
                                ->required(),
                        ]),
                ])
                    ->columnSpanFull()
                    ->persistStepInQueryString()
                    ->nextAction(
                        fn($action) => $action->label('Selanjutnya')
                    )
                    ->previousAction(
                        fn($action) => $action->label('Kembali')
                    ),
            ]);
    }
}
