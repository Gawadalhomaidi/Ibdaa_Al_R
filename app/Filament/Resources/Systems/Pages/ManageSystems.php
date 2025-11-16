<?php

namespace App\Filament\Resources\Systems\Pages;

use App\Filament\Resources\Systems\SystemsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageSystems extends ManageRecords
{
    protected static string $resource = SystemsResource::class;

    public function getTitle(): string
    {
        return __('Systems');
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label(__('Add_Systems')),
        ];
    }
}
