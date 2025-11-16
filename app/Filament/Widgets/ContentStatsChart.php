<?php

namespace App\Filament\Widgets;

use App\Models\Sections;
use App\Models\Features;
use App\Models\Modules;
use App\Models\Technologies;
use App\Models\PricingPlans;
use App\Models\Partners;
use Filament\Widgets\ChartWidget;

class ContentStatsChart extends ChartWidget
{
    protected ?string $heading = 'Content Statistics';
    
    protected static ?int $sort = 3;
    
    protected ?string $pollingInterval = '60s';

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getData(): array
    {
        $categories = ['Sections', 'Features', 'Modules', 'Technologies', 'Plans', 'Partners'];
        
        $activeData = [
            Sections::where('is_active', true)->count(),
            Features::where('is_active', true)->count(),
            Modules::where('is_active', true)->count(),
            Technologies::where('is_active', true)->count(),
            PricingPlans::where('is_active', true)->count(),
            Partners::where('is_active', true)->count(),
        ];
        
        $inactiveData = [
            Sections::where('is_active', false)->count(),
            Features::where('is_active', false)->count(),
            Modules::where('is_active', false)->count(),
            Technologies::where('is_active', false)->count(),
            PricingPlans::where('is_active', false)->count(),
            Partners::where('is_active', false)->count(),
        ];

        return [
            'datasets' => [
                [
                    'label' => 'Active',
                    'data' => $activeData,
                    'backgroundColor' => '#10B981',
                    'borderColor' => '#059669',
                ],
                [
                    'label' => 'Inactive',
                    'data' => $inactiveData,
                    'backgroundColor' => '#EF4444',
                    'borderColor' => '#DC2626',
                ],
            ],
            'labels' => $categories,
        ];
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                    'rtl' => true,
                ],
            ],
            'scales' => [
                'x' => [
                    'stacked' => false,
                ],
                'y' => [
                    'stacked' => false,
                    'beginAtZero' => true,
                ],
            ],
        ];
    }
}
