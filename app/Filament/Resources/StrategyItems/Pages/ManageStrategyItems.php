<?php

namespace App\Filament\Resources\StrategyItems\Pages;

use App\Filament\Resources\StrategyItems\StrategyItemsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageStrategyItems extends ManageRecords
{
    protected static string $resource = StrategyItemsResource::class;

    public function getTitle(): string
    {
        return __('StrategyItems');
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label(__('Add_StrategyItems')),
        ];
    }
}
