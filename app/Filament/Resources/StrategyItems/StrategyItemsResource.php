<?php

namespace App\Filament\Resources\StrategyItems;

use App\Filament\Resources\StrategyItems\Pages\ManageStrategyItems;
use App\Models\StrategyItems;
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

class StrategyItemsResource extends Resource
{
    protected static ?string $model = StrategyItems::class;

    // Navigation configuration
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;
    protected static string|\UnitEnum|null $navigationGroup = 'Strategy';

    protected static ?string $navigationLabel = 'Strategy Items';
    public static function getNavigationLabel(): string
    {
        return __('StrategyItems');
    }
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('section_id')
                    ->label(__('section'))
                    ->relationship('sections', 'name_en'),
                TextInput::make('title_ar')
                    ->label(__('title_ar'))
                    ->required(),
                TextInput::make('title_en')
                    ->label(__('title_en'))
                    ->required(),
                Textarea::make('description_ar')
                    ->label(__('description_ar'))
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description_en')
                    ->label(__('description_en'))
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('icon')
                    ->label(__('icon'))
                    ->required(),
                TextInput::make('type')
                    ->label(__('type'))
                    ->required(),
                TextInput::make('position')
                    ->label(__('position'))
                    ->required(),
                TextInput::make('level')
                    ->label(__('level'))
                    ->required(),
                TextInput::make('color')
                    ->label(__('color'))
                    ->default(null),
                TextInput::make('progress')
                    ->label(__('progress'))
                    ->required()
                    ->numeric()
                    ->default(0),
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
                    ->label(__('sections')),
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
                TextEntry::make('type')
                    ->label(__('type')),
                TextEntry::make('position')
                    ->label(__('position')),
                TextEntry::make('level')
                    ->label(__('level')),
                TextEntry::make('color')
                    ->label(__('color'))
                    ->placeholder('-'),
                TextEntry::make('progress')
                    ->label(__('progress'))
                    ->numeric(),
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
                    ->label(__('strategy_item'))
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
                TextColumn::make('type')
                    ->label(__('type'))
                    ->searchable(),
                TextColumn::make('position')
                    ->label(__('position'))
                    ->searchable(),
                TextColumn::make('level')
                    ->label(__('level'))
                    ->searchable(),
                TextColumn::make('color')
                    ->label(__('color'))
                    ->searchable(),
                TextColumn::make('progress')
                    ->label(__('progress'))
                    ->numeric()
                    ->sortable(),
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
                    ->label('Section')
                    ->preload()
                    ->searchable(),
                    
                SelectFilter::make('type')
                    ->options([
                        'strategy' => 'Strategy',
                        'tactic' => 'Tactic',
                        'goal' => 'Goal',
                        'objective' => 'Objective',
                        'milestone' => 'Milestone',
                    ])
                    ->label('Type')
                    ->searchable(),
                    
                SelectFilter::make('position')
                    ->options([
                        'left' => 'Left',
                        'right' => 'Right',
                        'center' => 'Center',
                        'top' => 'Top',
                        'bottom' => 'Bottom',
                    ])
                    ->label('Position')
                    ->searchable(),
                    
                SelectFilter::make('level')
                    ->options([
                        'high' => 'High',
                        'medium' => 'Medium',
                        'low' => 'Low',
                        'critical' => 'Critical',
                    ])
                    ->label('Level')
                    ->searchable(),
                    
                Filter::make('is_active')
                    ->label('Active')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),
                    
                Filter::make('is_inactive')
                    ->label('Inactive')
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
            'index' => ManageStrategyItems::route('/'),
        ];
    }
}