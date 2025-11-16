<?php

namespace App\Filament\Resources\Features\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
class FeaturesTable
{
    public static function configure(Table $table): Table
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
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
