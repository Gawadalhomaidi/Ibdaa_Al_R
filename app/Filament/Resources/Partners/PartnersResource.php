<?php

namespace App\Filament\Resources\Partners;

use App\Filament\Resources\Partners\Pages\ManagePartners;
use App\Models\Partners;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
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

class PartnersResource extends Resource
{
    protected static ?string $model = Partners::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;
    public static function getNavigationLabel(): string
    {
        return __('Partners');
    }
    protected static ?int $navigationSort = 3;
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('section_id')
                    ->relationship('sections','name_en')
                    ->label(__('Section')),
                TextInput::make('name_ar')
                    ->label(__('name_ar'))
                    ->required(),
                TextInput::make('name_en')
                    ->label(__('name_en'))
                    ->required(),
                TextInput::make('logo')
                    ->label(__('logo'))
                    ->default(null),
                TextInput::make('icon')
                    ->label(__('icon'))
                    ->default(null),
                TextInput::make('sector_ar')
                    ->label(__('sector_ar'))
                    ->default(null),
                TextInput::make('sector_en')
                    ->label(__('sector_en'))
                    ->default(null),
                TextInput::make('color')
                    ->label(__('color'))
                    ->default(null),
                FileUpload::make('background_image')
                    ->label(__('background_image'))
                    ->image(),
                TextInput::make('years')
                    ->label(__('years'))
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('rating')
                    ->label(__('rating'))
                    ->default(null),
                TextInput::make('order')
                    ->label(__('order'))
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label(__('is_active'))
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('sections.name_en')
                    ->label(__('Section')),
                TextEntry::make('name_ar')
                    ->label(__('name_ar')),
                TextEntry::make('name_en')
                    ->label(__('name_en')),
                TextEntry::make('logo')
                    ->label(__('logo'))
                    ->placeholder('-'),
                TextEntry::make('icon')
                    ->label(__('icon'))
                    ->placeholder('-'),
                TextEntry::make('sector_ar')
                    ->label(__('sector_ar'))
                    ->placeholder('-'),
                TextEntry::make('sector_en')
                    ->label(__('sector_en'))
                    ->placeholder('-'),
                TextEntry::make('color')
                    ->label(__('color'))
                    ->placeholder('-'),
                ImageEntry::make('background_image')
                    ->label(__('background_image'))
                    ->placeholder('-'),
                TextEntry::make('years')
                    ->label(__('years'))
                    ->numeric(),
                TextEntry::make('rating')
                    ->label(__('rating'))
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
                TextColumn::make('name_ar')
                    ->label(__('name_ar'))
                    ->searchable(),
                TextColumn::make('name_en')
                    ->label(__('name_en'))
                    ->searchable(),
                TextColumn::make('logo')
                    ->label(__('logo'))
                    ->searchable(),
                TextColumn::make('icon')
                    ->label(__('icon'))
                    ->searchable(),
                TextColumn::make('sector_ar')
                    ->label(__('sector_ar'))
                    ->searchable(),
                TextColumn::make('sector_en')
                    ->label(__('sector_en'))
                    ->searchable(),
                TextColumn::make('color')
                    ->label(__('color'))
                    ->searchable(),
                ImageColumn::make('background_image')
                    ->label(__('background_image')),
                TextColumn::make('years')
                    ->label(__('years'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('rating')
                    ->label(__('rating'))
                    ->searchable(),
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
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),
                    
                Filter::make('is_inactive')
                    ->label(__('Inactive'))
                    ->query(fn (Builder $query): Builder => $query->where('is_active', false)),
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
            'index' => ManagePartners::route('/'),
        ];
    }
}