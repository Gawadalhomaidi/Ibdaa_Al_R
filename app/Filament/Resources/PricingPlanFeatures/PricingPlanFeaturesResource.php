<?php

namespace App\Filament\Resources\PricingPlanFeatures;

use App\Filament\Resources\PricingPlanFeatures\Pages\ManagePricingPlanFeatures;
use App\Models\PricingPlanFeatures;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class PricingPlanFeaturesResource extends Resource
{
    protected static ?string $model = PricingPlanFeatures::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCurrencyDollar;
    protected static string|\UnitEnum|null $navigationGroup = 'Plans';
    public static function getNavigationLabel(): string
    {
        return __('PlanFeatures');
    }
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('pricing_plan_id')
                    ->label(__('pricingplans'))
                    ->relationship('pricingplans', 'name_en'),
                TextInput::make('feature_ar')
                    ->label(__('feature_ar'))
                    ->required(),
                TextInput::make('feature_en')
                    ->label(__('feature_en'))
                    ->required(),
                TextInput::make('order')
                    ->label(__('order'))
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_available')
                    ->label(__('is_available'))
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('pricingplans.name_en')
                    ->label(__('pricingplans')),
                TextEntry::make('feature_ar')
                    ->label(__('feature_ar')),
                TextEntry::make('feature_en')
                    ->label(__('feature_en')),
                TextEntry::make('order')
                    ->label(__('order'))
                    ->numeric(),
                IconEntry::make('is_available')
                    ->label(__('is_available'))
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
                TextColumn::make('pricingplans.name_en')
                    ->label(__('pricingplans'))
                    ->sortable(),
                TextColumn::make('feature_ar')
                    ->label(__('feature_ar'))
                    ->searchable(),
                TextColumn::make('feature_en')
                    ->label(__('feature_en'))
                    ->searchable(),
                TextColumn::make('order')
                    ->label(__('order'))
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_available')
                    ->label(__('is_available'))
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
                SelectFilter::make('pricing_plan_id')
                    ->relationship('pricingplans', 'name_en')
                    ->label(__('pricingplans'))
                    ->preload()
                    ->searchable(),

                Filter::make('is_available')
                    ->label(__('is_available'))
                    ->query(fn(Builder $query): Builder => $query->where('is_available', true)),

                Filter::make('is_unavailable')
                    ->label(__('is_unavailable'))
                    ->query(fn(Builder $query): Builder => $query->where('is_available', false)),
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
            'index' => ManagePricingPlanFeatures::route('/'),
        ];
    }
}
