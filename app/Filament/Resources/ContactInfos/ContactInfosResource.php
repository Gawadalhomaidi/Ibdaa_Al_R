<?php

namespace App\Filament\Resources\ContactInfos;

use App\Filament\Resources\ContactInfos\Pages\ManageContactInfos;
use App\Models\ContactInfos;
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

class ContactInfosResource extends Resource
{
    protected static ?string $model = ContactInfos::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;
    public static function getNavigationLabel(): string
    {
        return __('ContactInfos');
    }
    
    protected static ?int $navigationSort = 11;
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('section_id')
                    ->label(__('sections'))
                    ->relationship('sections','name_en'),
                TextInput::make('phone')
                    ->label(__('phone'))
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label(__('email'))
                    ->email()
                    ->required(),
                TextInput::make('address_ar')
                    ->label(__('address_ar'))
                    ->required(),
                TextInput::make('address_en')
                    ->label(__('address_en'))
                    ->required(),
                FileUpload::make('background_image')
                    ->label(__('background_image'))
                    ->image(),
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
                TextEntry::make('phone')
                    ->label(__('phone')),
                TextEntry::make('email')
                    ->label(__('email')),
                TextEntry::make('address_ar')
                    ->label(__('address_ar')),
                TextEntry::make('address_en')
                    ->label(__('address_en')),
                ImageEntry::make('background_image')
                    ->label(__('background_image'))
                    ->placeholder('-'),
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
                    ->label(__('sections'))
                    ->sortable(),
                TextColumn::make('phone')
                    ->label(__('phone'))
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('email'))
                    ->searchable(),
                TextColumn::make('address_ar')
                    ->label(__('address_ar'))
                    ->searchable(),
                TextColumn::make('address_en')
                    ->label(__('address_en'))
                    ->searchable(),
                ImageColumn::make('background_image')
                    ->label(__('background_image')),
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
                    ->label(__('Section'))
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
            'index' => ManageContactInfos::route('/'),
        ];
    }
}