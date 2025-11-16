<?php

namespace App\Filament\Resources\Sections;

use App\Filament\Resources\Sections\Pages\ManageSections;
use App\Models\Sections;
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
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class SectionsResource extends Resource
{
    protected static ?string $model = Sections::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedViewColumns;
    protected static ?int $navigationSort = 1;
        public static function getNavigationLabel(): string
    {
        return __('Sections');
    }
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_ar')
                    ->label(__('name_ar'))
                    ->default(null),
                TextInput::make('name_en')
                    ->label(__('name_en'))
                    ->default(null),
                TextInput::make('title_ar')
                    ->label(__('title_ar'))
                    ->default(null),
                TextInput::make('title_en')
                    ->label(__('title_en'))
                    ->default(null),
                TextInput::make('subtitle_ar')
                    ->label(__('subtitle_ar'))
                    ->default(null),
                TextInput::make('subtitle_en')
                    ->label(__('subtitle_en'))
                    ->default(null),
                Textarea::make('description_ar')
                    ->label(__('description_ar'))
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('description_en')
                    ->label(__('description_en'))
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('background_image')
                    ->label(__('background_image'))
                    ->image(),
                TextInput::make('section_type')
                    ->label(__('section_type'))
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
                TextEntry::make('name_ar')
                    ->label(__('name_ar'))
                    ->placeholder('-'),
                TextEntry::make('name_en')
                    ->label(__('name_en'))
                    ->placeholder('-'),
                TextEntry::make('title_ar')
                    ->label(__('title_ar'))
                    ->placeholder('-'),
                TextEntry::make('title_en')
                    ->label(__('title_en'))
                    ->placeholder('-'),
                TextEntry::make('subtitle_ar')
                    ->label(__('subtitle_ar'))
                    ->placeholder('-'),
                TextEntry::make('subtitle_en')
                    ->label(__('subtitle_en'))
                    ->placeholder('-'),
                TextEntry::make('description_ar')
                    ->label(__('description_ar'))
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('description_en')
                    ->label(__('description_en'))
                    ->placeholder('-')
                    ->columnSpanFull(),
                ImageEntry::make('background_image')
                    ->label(__('background_image'))
                    ->placeholder('-'),
                TextEntry::make('section_type')
                    ->label(__('section_type')),
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
                TextColumn::make('name_ar')
                    ->label(__('name_ar'))
                    ->searchable(),
                TextColumn::make('name_en')
                    ->label(__('name_en'))
                    ->searchable(),
                TextColumn::make('title_ar')
                    ->label(__('title_ar'))
                    ->searchable(),
                TextColumn::make('title_en')
                    ->label(__('title_en'))
                    ->searchable(),
                TextColumn::make('subtitle_ar')
                    ->label(__('subtitle_ar'))
                    ->searchable(),
                TextColumn::make('subtitle_en')
                    ->label(__('subtitle_en'))
                    ->searchable(),
                ImageColumn::make('background_image')
                    ->label(__('background_image')),
                TextColumn::make('section_type')
                    ->label(__('section_type'))
                    ->searchable(),
                TextColumn::make('order')
                    ->label(__('order'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('id')
                    ->label(__('section_use'))
                    ->counts('features')
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
                SelectFilter::make('section_type')
                    ->options([
                        'hero' => 'Hero',
                        'about' => 'About',
                        'services' => 'Services',
                        'features' => 'Features',
                        'contact' => 'Contact',
                        'pricing' => 'Pricing',
                        'testimonials' => 'Testimonials',
                        'partners' => 'Partners',
                        'faq' => 'FAQ',
                        'team' => 'Team',
                        'portfolio' => 'Portfolio',
                        'blog' => 'Blog',
                    ])
                    ->label('section_type')
                    ->label(__('section_type'))
                    ->searchable(),
                    
                Filter::make('is_active')
                    ->label(__('active'))
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),
                    
                Filter::make('is_inactive')
                    ->label(__('Inactive'))
                    ->query(fn (Builder $query): Builder => $query->where('is_active', false)),
                    
                Filter::make('has_features')
                    ->label(__('has_features'))
                    ->query(fn (Builder $query): Builder => $query->has('features')),
                    
                Filter::make('no_features')
                    ->label(__('no_features'))
                    ->query(fn (Builder $query): Builder => $query->doesntHave('features')),
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
            'index' => ManageSections::route('/'),
        ];
    }
}