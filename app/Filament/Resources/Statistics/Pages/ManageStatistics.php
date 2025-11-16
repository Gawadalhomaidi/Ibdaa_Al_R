<?php

namespace App\Filament\Resources\Statistics\Pages;

use App\Filament\Resources\Statistics\StatisticsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageStatistics extends ManageRecords
{
    protected static string $resource = StatisticsResource::class;

    public function getTitle(): string
    {
        return __('Statistics');
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label(__('Add_Statistics')),
        ];
    }
}
