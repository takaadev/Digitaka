<?php

namespace App\Filament\Admin\Resources\ServiceCategories;

use App\Filament\Admin\Resources\ServiceCategories\Pages\CreateServiceCategory;
use App\Filament\Admin\Resources\ServiceCategories\Pages\EditServiceCategory;
use App\Filament\Admin\Resources\ServiceCategories\Pages\ListServiceCategories;
use App\Filament\Admin\Resources\ServiceCategories\Schemas\ServiceCategoryForm;
use App\Filament\Admin\Resources\ServiceCategories\Tables\ServiceCategoriesTable;
use App\Models\ServiceCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceCategoryResource extends Resource
{
    protected static ?string $model = ServiceCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquares2x2;
    protected static ?string $recordTitleAttribute = 'Kategori Layanan';
    protected static ?string $modelLabel = 'Kategori Layanan';
    protected static ?string $pluralModelLabel = 'Kategori Layanan';
    protected static ?string $navigationLabel = 'Kategori Layanan';
    protected static string|\UnitEnum|null $navigationGroup = 'Manajemen Layanan';


    public static function form(Schema $schema): Schema
    {
        return ServiceCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceCategoriesTable::configure($table);
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
            'index' => ListServiceCategories::route('/'),
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
