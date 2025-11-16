<?php

namespace App\Filament\Resources\MediaServices\Pages;

use App\Filament\Resources\MediaServices\MediaServicesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageMediaServices extends ManageRecords
{
    protected static string $resource = MediaServicesResource::class;

    public function getTitle(): string
    {
        return __('MediaServices');
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label(__('Add_MediaServices')),
        ];
    }
}
