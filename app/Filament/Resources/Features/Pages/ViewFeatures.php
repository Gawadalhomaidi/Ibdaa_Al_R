<?php

namespace App\Filament\Resources\Features\Pages;

use App\Filament\Resources\Features\FeaturesResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFeatures extends ViewRecord
{
    protected static string $resource = FeaturesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
