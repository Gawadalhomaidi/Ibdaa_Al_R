<?php

namespace App\Filament\Resources\Features;

use App\Filament\Resources\Features\Pages\CreateFeatures;
use App\Filament\Resources\Features\Pages\EditFeatures;
use App\Filament\Resources\Features\Pages\ListFeatures;
use App\Filament\Resources\Features\Pages\ViewFeatures;
use App\Filament\Resources\Features\Schemas\FeaturesForm;
use App\Filament\Resources\Features\Schemas\FeaturesInfolist;
use App\Filament\Resources\Features\Tables\FeaturesTable;
use App\Models\Features;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FeaturesResource extends Resource
{
    protected static ?string $model = Features::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;
    public static function getNavigationLabel(): string
    {
        return __('Features');
    }
    protected static ?int $navigationSort = 8;
    public static function form(Schema $schema): Schema
    {
        return FeaturesForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FeaturesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeaturesTable::configure($table);
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
            'index' => ListFeatures::route('/'),
            'create' => CreateFeatures::route('/create'),
            'view' => ViewFeatures::route('/{record}'),
            'edit' => EditFeatures::route('/{record}/edit'),
        ];
    }
}
