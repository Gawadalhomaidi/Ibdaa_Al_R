<?php

namespace App\Filament\Resources\Values\Pages;

use App\Filament\Resources\Values\ValuesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageValues extends ManageRecords
{
    protected static string $resource = ValuesResource::class;
    public function getTitle(): string
    {
        return __('Values');
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label(__('Add_Values')),
        ];
    }
}
