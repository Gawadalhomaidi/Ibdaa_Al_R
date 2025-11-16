<?php

namespace App\Filament\Resources\AboutSections\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class AboutSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sections.name_en')
                    ->label(__('name_en'))
                    ->sortable(),
                TextColumn::make('title_ar')
                    ->label(__('title_ar'))
                    ->searchable(),
                TextColumn::make('title_en')
                    ->label(__('title_en'))
                    ->searchable(),
                TextColumn::make('mission_title_ar')
                    ->label(__('mission_title_ar'))
                    ->searchable(),
                TextColumn::make('mission_title_en')
                    ->label(__('mission_title_en'))
                    ->searchable(),
                TextColumn::make('why_choose_us_title_ar')
                    ->label(__('why_choose_us_title_ar'))
                    ->searchable(),
                TextColumn::make('why_choose_us_title_en')
                    ->label(__('why_choose_us_title_en'))
                    ->searchable(),
                TextColumn::make('uptime_value')
                    ->label(__('uptime_value'))
                    ->searchable(),
                TextColumn::make('uptime_label_ar')
                    ->label(__('uptime_label_ar'))
                    ->searchable(),
                TextColumn::make('uptime_label_en')
                    ->label(__('uptime_label_en'))
                    ->searchable(),
                TextColumn::make('support_value')
                    ->label(__('support_value'))
                    ->searchable(),
                TextColumn::make('support_label_ar')
                    ->label(__('support_label_ar'))
                    ->searchable(),
                TextColumn::make('support_label_en')
                    ->label(__('support_label_en'))
                    ->searchable(),
                TextColumn::make('clients_value')
                    ->label(__('clients_value'))
                    ->searchable(),
                TextColumn::make('clients_label_ar')
                    ->label(__('clients_label_ar'))
                    ->searchable(),
                TextColumn::make('clients_label_en')
                    ->label(__('clients_label_en'))
                    ->searchable(),
                TextColumn::make('experience_value')
                    ->label(__('experience_value'))
                    ->searchable(),
                TextColumn::make('experience_label_ar')
                    ->label(__('experience_label_ar'))
                    ->searchable(),
                TextColumn::make('experience_label_en')
                    ->label(__('experience_label_en'))
                    ->searchable(),
                ImageColumn::make('background_image')
                    ->label(__('background_image')),
                ImageColumn::make('mission_background_image')
                    ->label(__('mission_background_image')),
                ImageColumn::make('stats_background_image')
                    ->label(__('stats_background_image')),
                TextColumn::make('order')
                    ->label(__('order'))
                    ->numeric()
                    ->sortable(),
                IconColumn::make('show_mission')
                    ->label(__('show_mission'))
                    ->boolean(),
                IconColumn::make('show_stats')
                    ->label(__('show_stats'))
                    ->boolean(),
                // CheckboxColumn::make('is_active')
                //     ->boolean()
                //     ->colors([
                //         'success' => fn($state) => $state === true,
                //         'danger' => fn($state) => $state === false,
                //     ]),
                ToggleColumn::make('is_active')
                    ->label(__('is_active')),
                TextColumn::make('created_at')
                    ->label(__('created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('updated_at'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label(__('is_active'))
                    ->boolean(),

                TernaryFilter::make('show_mission')
                    ->label(__('show_mission')),

                TernaryFilter::make('show_stats')
                    ->label(__('show_stats')),

                SelectFilter::make('sections_id')
                    ->label(__('sections'))
                    ->relationship('sections', 'name_en')
                    ->searchable()
                    ->preload(),
                // Filter::make('is_active')->query(fn (Builder $query): Builder => $query->where('is_active', true)),
                Filter::make('created_at')
                    ->schema([
                        DatePicker::make('created_from')
                    ->label(__('created_from')),
                        DatePicker::make('created_until')
                    ->label(__('created_until')),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn($query, $date) => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn($query, $date) => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                    ->label('Created Between'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ],)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
