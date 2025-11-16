<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Partners;
use App\Models\ContactInfos;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStatsOverview extends BaseWidget
{
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        $totalUsers = User::count();
        $activeUsers = User::where('status', 'active')->count();
        $totalPartners = Partners::count();
        $activePartners = Partners::where('is_active', true)->count();

        return [
            Stat::make('Users', $totalUsers)
                ->description($activeUsers . ' active user')
                ->descriptionIcon('heroicon-m-users')
                ->color('success')
                ->chart($this->getUsersGrowthChart()),

            Stat::make('Partners', $totalPartners)
                ->description($activePartners . ' active partner')
                ->descriptionIcon('heroicon-m-hand-thumb-up')
                ->color('info')
                ->chart($this->getPartnersGrowthChart()),

            Stat::make('Contact Infos', ContactInfos::where('is_active', true)->count())
                ->description(ContactInfos::count() . ' total contact info')
                ->descriptionIcon('heroicon-m-phone')
                ->color('warning'),

            Stat::make('Average Partner Rating', $this->getAveragePartnerRating())
                ->description('Out of 5 stars')
                ->descriptionIcon('heroicon-m-star')
                ->color('danger'),
        ];
    }

    private function getUsersGrowthChart(): array
    {
        return [
            User::where('status', 'active')->count(),
            User::where('status', 'inactive')->count(),
            User::where('status', 'suspended')->count(),
            intval(User::count() / 4),
        ];
    }

    private function getPartnersGrowthChart(): array
    {
        $partners = Partners::all();
        $highRated = $partners->where('rating', '>=', 4)->count();
        $mediumRated = $partners->whereBetween('rating', [3, 3.9])->count();
        $lowRated = $partners->where('rating', '<', 3)->count();

        return [
            $highRated,
            $mediumRated,
            $lowRated,
            $partners->count(),
        ];
    }

    private function getAveragePartnerRating(): string
    {
        $averageRating = Partners::avg('rating');
        return number_format($averageRating ?: 0, 1);
    }
}
