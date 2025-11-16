<?php

namespace App\Filament\Resources\Modules\Pages;

use App\Filament\Resources\Modules\ModulesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageModules extends ManageRecords
{
    protected static string $resource = ModulesResource::class;

    public function getTitle(): string
    {
        return __('Modules');
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label(__('Add_Modules')),
        ];
    }
}
