<?php

namespace App\Filament\Resources\AboutSections;

use App\Filament\Resources\AboutSections\Pages\CreateAboutSections;
use App\Filament\Resources\AboutSections\Pages\EditAboutSections;
use App\Filament\Resources\AboutSections\Pages\ListAboutSections;
use App\Filament\Resources\AboutSections\Pages\ViewAboutSections;
use App\Filament\Resources\AboutSections\Schemas\AboutSectionsForm;
use App\Filament\Resources\AboutSections\Schemas\AboutSectionsInfolist;
use App\Filament\Resources\AboutSections\Tables\AboutSectionsTable;
use App\Models\AboutSections;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AboutSectionsResource extends Resource
{
    protected static ?string $model = AboutSections::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInformationCircle;
    public static function getNavigationLabel(): string
    {
        return __('AboutSections');
    }
    protected static ?int $navigationSort = 10;
    public static function form(Schema $schema): Schema
    {
        return AboutSectionsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AboutSectionsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutSectionsTable::configure($table);
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
            'index' => ListAboutSections::route('/'),
            'create' => CreateAboutSections::route('/create'),
            'view' => ViewAboutSections::route('/{record}'),
            'edit' => EditAboutSections::route('/{record}/edit'),
        ];
    }
}
