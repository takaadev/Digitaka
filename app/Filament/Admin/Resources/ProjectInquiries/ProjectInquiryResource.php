<?php

namespace App\Filament\Admin\Resources\ProjectInquiries;

use App\Filament\Admin\Resources\ProjectInquiries\Pages\CreateProjectInquiry;
use App\Filament\Admin\Resources\ProjectInquiries\Pages\EditProjectInquiry;
use App\Filament\Admin\Resources\ProjectInquiries\Pages\ListProjectInquiries;
use App\Filament\Admin\Resources\ProjectInquiries\Pages\ViewProjectInquiry;
use App\Filament\Admin\Resources\ProjectInquiries\Schemas\ProjectInquiryForm;
use App\Filament\Admin\Resources\ProjectInquiries\Schemas\ProjectInquiryInfolist;
use App\Filament\Admin\Resources\ProjectInquiries\Tables\ProjectInquiriesTable;
use App\Models\ProjectInquiry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectInquiryResource extends Resource
{
    protected static ?string $model = ProjectInquiry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $modelLabel = 'Permintaan Proyek';
    protected static ?string $pluralModelLabel = 'Permintaan Proyek';
    protected static ?string $navigationLabel = 'Permintaan';
    protected static string|\UnitEnum|null $navigationGroup = 'Manajemen Proyek';

    public static function getNavigationBadge(): ?string
    {
        $count = ProjectInquiry::where('status', 'applying')->count();

        return $count;
    }

    public static function form(Schema $schema): Schema
    {
        return ProjectInquiryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProjectInquiryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProjectInquiriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProjectInquiries::route('/'),
            'create' => CreateProjectInquiry::route('/create'),
            'view' => ViewProjectInquiry::route('/{record}'),
            'edit' => EditProjectInquiry::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
