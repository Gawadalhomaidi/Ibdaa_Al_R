<?php

namespace App\Filament\Resources\StrategyFeatures;

use App\Filament\Resources\StrategyFeatures\Pages\ManageStrategyFeatures;
use App\Models\StrategyFeatures;
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

class StrategyFeaturesResource extends Resource
{
    protected static ?string $model = StrategyFeatures::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedLightBulb;
    protected static string|\UnitEnum|null $navigationGroup = 'Strategy';
    protected static ?string $navigationLabel = 'Strategy Features';
    public static function getNavigationLabel(): string
    {
        return __('StrategyFeatures');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('strategy_item_id')
                    ->label(__('strategy_item'))
                    ->relationship('strategyitems', 'title_en'),
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
                Toggle::make('is_active')
                    ->label(__('is_active'))
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('strategyitems.title_en')
                    ->label(__('strategy_item')),
                TextEntry::make('feature_ar')
                    ->label(__('feature_ar')),
                TextEntry::make('feature_en')
                    ->label(__('feature_en')),
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
                TextColumn::make('strategyitems.title_en')
                    ->label(__('strategy_item'))
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
                SelectFilter::make('strategy_item_id')
                    ->relationship('strategyitems', 'title_en')
                    ->label(__('strategy_item'))
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
            'index' => ManageStrategyFeatures::route('/'),
        ];
    }
}
