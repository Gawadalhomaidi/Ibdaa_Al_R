<?php

namespace App\Filament\Widgets;

use App\Models\Sections;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Illuminate\Database\Eloquent\Builder;

class LatestSections extends BaseWidget
{
    protected static ?int $sort = 4;
    
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Sections::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name_ar')
                    ->label('Name in Arabic')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('name_en')
                    ->label('Name in English')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('section_type')
                    ->label('Section Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'features' => 'success',
                        'modules' => 'info',
                        'pricing' => 'warning',
                        'about' => 'primary',
                        default => 'gray',
                    })
                    ->sortable(),
                    
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('order')
                    ->label('Order')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created Date')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->emptyStateHeading('No sections yet')
            ->emptyStateDescription('Create your first section to get started')
            ->emptyStateIcon('heroicon-o-rectangle-stack');
    }
}
