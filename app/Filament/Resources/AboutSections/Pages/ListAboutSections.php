<?php

namespace App\Filament\Resources\AboutSections\Pages;

use App\Filament\Resources\AboutSections\AboutSectionsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAboutSections extends ListRecords
{
    protected static string $resource = AboutSectionsResource::class;
    public function getTitle(): string
    {
        return __('AboutSections');
    }
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label(__('Add_AboutSections')),
        ];
    }
}
