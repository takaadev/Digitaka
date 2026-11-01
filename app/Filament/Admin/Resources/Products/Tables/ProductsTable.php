<?php

namespace App\Filament\Admin\Resources\Products\Tables;

use App\Enums\ProductType;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\Width;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-'),

                TextColumn::make('product_type')
                    ->label('Tipe Produk')
                    ->formatStateUsing(fn($state) => $state instanceof ProductType
                        ? $state->label()
                        : $state)
                    ->badge()
                    ->color('info'),

                TextColumn::make('price')
                    ->label('Harga')
                     ->money('IDR', locale: 'id_ID', decimalPlaces: 0)
                    ->sortable(),

                TextColumn::make('discount_price')
                    ->label('Diskon')
                     ->money('IDR', locale: 'id_ID', decimalPlaces: 0)
                    ->sortable()
                    ->placeholder('-'),

                TextColumn::make('version')
                    ->label('Versi')
                    ->searchable()
                    ->placeholder('-'),

                TextColumn::make('release_date')
                    ->label('Tanggal Rilis')
                    ->date('d M Y')
                    ->sortable()
                    ->placeholder('-'),

                IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean(),

                IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),

            ])
            ->filters([
                SelectFilter::make('product_category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('product_type')
                    ->label('Tipe Produk')
                    ->options(ProductType::options()),

                TrashedFilter::make(),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make()
                        ->label('Detail')->modalWidth(Width::Full),

                    EditAction::make()
                        ->label('Ubah')->modalWidth(Width::Full),

                    DeleteAction::make()
                        ->label('Hapus')
                        ->requiresConfirmation(),
                ]),

            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
