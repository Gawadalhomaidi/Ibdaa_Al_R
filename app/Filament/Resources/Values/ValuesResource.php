<?php

namespace App\Filament\Resources\Values;

use App\Filament\Resources\Values\Pages\ManageValues;
use App\Models\Values;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ValuesResource extends Resource
{
    protected static ?string $model = Values::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHeart;
    // protected static ?string $navigationLabel = __('Values');

    public static function getNavigationLabel(): string
    {
        return __('Values');
    }

    protected static ?int $navigationSort = 4;
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('section_id')
                    ->label(__('Inactive'))
                    ->relationship('sections', 'name_en'),
                TextInput::make('title_ar')
                    ->label(__('Inactive'))
                    ->required(),
                TextInput::make('title_en')
                    ->label(__('Inactive'))
                    ->required(),
                Textarea::make('description_ar')
                    ->label(__('Inactive'))
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description_en')
                    ->label(__('Inactive'))
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('icon')
                    ->label(__('Inactive'))
                    ->required(),
                TextInput::make('color')
                    ->label(__('Inactive'))
                    ->default(null),
                FileUpload::make('background_image')
                    ->label(__('Inactive'))
                    ->image(),
                TextInput::make('order')
                    ->label(__('Inactive'))
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label(__('Inactive'))
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('sections.name_en')
                    ->label(__('section')),
                TextEntry::make('title_ar')
                    ->label(__('title_ar')),
                TextEntry::make('title_en')
                    ->label(__('title_en')),
                TextEntry::make('description_ar')
                    ->label(__('description_ar'))
                    ->columnSpanFull(),
                TextEntry::make('description_en')
                    ->label(__('description_en'))
                    ->columnSpanFull(),
                TextEntry::make('icon')
                    ->label(__('icon')),
                TextEntry::make('color')
                    ->label(__('color'))
                    ->placeholder('-'),
                ImageEntry::make('background_image')
                    ->label(__('background_image'))
                    ->placeholder('-'),
                TextEntry::make('order')
                    ->label(__('order'))
                    ->numeric(),
                IconEntry::make('is_active')
                    ->label(__('is_active'))
                    ->boolean(),
                TextEntry::make('created_at')
                    ->label(__('created_at'))
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label(__('updated_at'))
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sections.name_en')
                    ->label(__('section'))
                    ->sortable(),
                TextColumn::make('title_ar')
                    ->label(__('title_ar'))
                    ->searchable(),
                TextColumn::make('title_en')
                    ->label(__('title_en'))
                    ->searchable(),
                TextColumn::make('icon')
                    ->label(__('icon'))
                    ->searchable(),
                TextColumn::make('color')
                    ->label(__('color'))
                    ->searchable(),
                ImageColumn::make('background_image')
                    ->label(__('background_image')),
                TextColumn::make('order')
                    ->label(__('order'))
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label(__('is_active'))
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label(__('created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('section_id')
                    ->relationship('sections', 'name_en')
                    ->label(__('section'))
                    ->preload()
                    ->searchable(),

                Filter::make('is_active')
                    ->label(__('Active'))
                    ->query(fn(Builder $query): Builder => $query->where('is_active', true)),

                Filter::make('is_inactive')
                    ->label(__('Inactive'))
                    ->query(fn(Builder $query): Builder => $query->where('is_active', false)),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageValues::route('/'),
        ];
    }
}
