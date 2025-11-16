<?php

namespace App\Filament\Resources\Permissions\Pages;

use App\Filament\Resources\Permissions\PermissionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePermissions extends ManageRecords
{
    protected static string $resource = PermissionResource::class;

    public function getTitle(): string
    {
        return __('Permissions');
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label(__('Add_Permissions')),
        ];
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Create Permissions';
    }
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Permissions updated';
    }
}
