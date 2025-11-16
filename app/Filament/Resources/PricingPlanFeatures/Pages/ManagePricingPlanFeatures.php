<?php

namespace App\Filament\Resources\PricingPlanFeatures\Pages;

use App\Filament\Resources\PricingPlanFeatures\PricingPlanFeaturesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePricingPlanFeatures extends ManageRecords
{
    protected static string $resource = PricingPlanFeaturesResource::class;

    public function getTitle(): string
    {
        return __('PlanFeatures');
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label(__('Add_PlanFeatures')),
        ];
    }
}
