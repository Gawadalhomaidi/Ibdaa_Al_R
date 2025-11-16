<?php

namespace App\Filament\Resources\PricingPlans\Pages;

use App\Filament\Resources\PricingPlans\PricingPlansResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePricingPlans extends ManageRecords
{
    protected static string $resource = PricingPlansResource::class;

    public function getTitle(): string
    {
        return __('PricingPlans');
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label(__('Add_PricingPlans')),
        ];
    }
}
