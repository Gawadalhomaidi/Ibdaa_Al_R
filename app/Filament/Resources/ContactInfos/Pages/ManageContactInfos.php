<?php

namespace App\Filament\Resources\ContactInfos\Pages;

use App\Filament\Resources\ContactInfos\ContactInfosResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageContactInfos extends ManageRecords
{
    protected static string $resource = ContactInfosResource::class;
    public function getTitle(): string
    {
        return __('ContactInfos');
    }
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label(__('Add_ContactInfos')),
        ];
    }
}
