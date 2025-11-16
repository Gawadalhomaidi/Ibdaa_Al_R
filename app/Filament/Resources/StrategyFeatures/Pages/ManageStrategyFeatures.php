<?php

namespace App\Filament\Resources\StrategyFeatures\Pages;

use App\Filament\Resources\StrategyFeatures\StrategyFeaturesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageStrategyFeatures extends ManageRecords
{
    protected static string $resource = StrategyFeaturesResource::class;

    public function getTitle(): string
    {
        return __('StrategyFeatures');
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label(__('Add_StrategyFeatures')),
        ];
    }
}
