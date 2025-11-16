<?php

namespace App\Filament\Resources\PricingPlans;

use App\Filament\Resources\PricingPlans\Pages\ManagePricingPlans;
use App\Models\PricingPlans;
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

class PricingPlansResource extends Resource
{
    protected static ?string $model = PricingPlans::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCurrencyDollar;
    protected static string|\UnitEnum|null $navigationGroup = 'Plans';
    protected static ?string $navigationLabel = 'Pricing Plans';
    public static function getNavigationLabel(): string
    {
        return __('PricingPlans');
    }
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('section_id')
                    ->label(__('section'))
                    ->relationship('sections', 'name_en'),
                TextInput::make('name_ar')
                    ->label(__('name_ar'))
                    ->required(),
                TextInput::make('name_en')
                    ->label(__('name_en'))
                    ->required(),
                Textarea::make('description_ar')
                    ->label(__('description_ar'))
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description_en')
                    ->label(__('description_en'))
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->label(__('price'))
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('currency')
                    ->label(__('currency'))
                    ->required()
                    ->default('YAR'),
                TextInput::make('period_ar')
                    ->label(__('period_ar'))
                    ->required()
                    ->default('شهري'),
                TextInput::make('period_en')
                    ->label(__('period_en'))
                    ->required()
                    ->default('Monthly'),
                Toggle::make('is_popular')
                    ->label(__('is_popular'))
                    ->required(),
                FileUpload::make('background_image')
                    ->label(__('background_image'))
                    ->image(),
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
                    ->label(__('name_en')),
                TextEntry::make('name_ar')
                    ->label(__('name_ar')),
                TextEntry::make('name_en')
                    ->label(__('name_en')),
                TextEntry::make('description_ar')
                    ->label(__('description_ar'))
                    ->columnSpanFull(),
                TextEntry::make('description_en')
                    ->label(__('description_en'))
                    ->columnSpanFull(),
                TextEntry::make('price')
                    ->label(__('price'))
                    ->money(),
                TextEntry::make('currency')
                    ->label(__('currency')),
                TextEntry::make('period_ar')
                    ->label(__('period_ar')),
                TextEntry::make('period_en')
                    ->label(__('period_en')),
                IconEntry::make('is_popular')
                    ->label(__('is_popular'))
                    ->boolean(),
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
                TextColumn::make('name_ar')
                    ->label(__('name_ar'))
                    ->searchable(),
                TextColumn::make('name_en')
                    ->label(__('name_en'))
                    ->searchable(),
                TextColumn::make('price')
                    ->label(__('price'))
                    ->money()
                    ->sortable(),
                TextColumn::make('currency')
                    ->label(__('currency'))
                    ->searchable(),
                TextColumn::make('period_ar')
                    ->label(__('period_ar'))
                    ->searchable(),
                TextColumn::make('period_en')
                    ->label(__('period_en'))
                    ->searchable(),
                IconColumn::make('is_popular')
                    ->label(__('is_popular'))
                    ->boolean(),
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

                Filter::make('is_popular')
                    ->label(__('popularplans'))
                    ->query(fn(Builder $query): Builder => $query->where('is_popular', true)),

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
            'index' => ManagePricingPlans::route('/'),
        ];
    }
}
