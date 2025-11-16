<?php

namespace App\Filament\Widgets;

use App\Models\Sections;
use App\Models\Features;
use App\Models\Modules;
use App\Models\Technologies;
use App\Models\PricingPlans;
use App\Models\Partners;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SectionsStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    
    protected ?string $pollingInterval = '30s';

    protected function getStats(): array
    {
        $totalSections = Sections::count();
        $activeSections = Sections::where('is_active', true)->count();
        $totalFeatures = Features::count();
        $activeFeatures = Features::where('is_active', true)->count();

        return [
            Stat::make('Total Sections', $totalSections)
                ->description($activeSections . ' active section')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('success')
                ->chart($this->getSectionsGrowthChart()),

            Stat::make('Features', $totalFeatures)
                ->description($activeFeatures . ' active feature')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color('info')
                ->chart($this->getFeaturesGrowthChart()),

            Stat::make('Modules', Modules::where('is_active', true)->count())
                ->description(Modules::count() . ' total modules')
                ->descriptionIcon('heroicon-m-cube')
                ->color('warning'),

            Stat::make('Pricing Plans', PricingPlans::where('is_active', true)->count())
                ->description(PricingPlans::count() . ' available plan')
                ->descriptionIcon('heroicon-m-credit-card')
                ->color('danger')
                ->chart($this->getPricingPlansChart()),
        ];
    }

    private function getSectionsGrowthChart(): array
    {
        return [
            Sections::where('is_active', true)->count(),
            Sections::where('is_active', false)->count(),
            Features::count() > 0 ? intval(Features::count() / 10) : 0,
            Modules::count() > 0 ? intval(Modules::count() / 5) : 0,
        ];
    }

    private function getFeaturesGrowthChart(): array
    {
        return [
            Features::where('is_active', true)->count(),
            Features::where('is_active', false)->count(),
            Technologies::where('is_active', true)->count(),
            Modules::where('is_active', true)->count(),
        ];
    }

    private function getPricingPlansChart(): array
    {
        $popularPlans = PricingPlans::where('is_popular', true)->count();
        $regularPlans = PricingPlans::where('is_popular', false)->count();
        
        return [
            $popularPlans,
            $regularPlans,
            $popularPlans > 0 ? $popularPlans * 2 : 1,
            $regularPlans > 0 ? $regularPlans * 1.5 : 1,
        ];
    }
}
