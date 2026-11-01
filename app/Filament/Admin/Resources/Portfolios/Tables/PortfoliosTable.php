<?php

namespace App\Filament\Admin\Resources\Portfolios\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\Width;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PortfoliosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul Proyek')
                    ->searchable(),
                TextColumn::make('service.title')
                    ->label('Layanan')
                    ->searchable()
                    ->placeholder('-'),
                TextColumn::make('client_name')
                    ->label('Nama Klien')
                    ->searchable()
                    ->placeholder('-'),

                TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d M Y, H:i'),
            ])
            ->filters([
                SelectFilter::make('service')
                    ->label('Layanan')
                    ->relationship('service', 'title')
                    ->searchable()
                    ->preload(),
                TrashedFilter::make()->label('Status Penghapusan'),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make()->label('Detail')->modalWidth(Width::Full),
                    EditAction::make()->label('Ubah')->modalWidth(Width::Full),
                    DeleteAction::make()
                        ->label('Hapus')
                        ->requiresConfirmation(),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Hapus'),

                    ForceDeleteBulkAction::make()
                        ->label('Hapus Permanen'),

                    RestoreBulkAction::make()
                        ->label('Pulihkan'),
                ]),
            ]);
    }
}
