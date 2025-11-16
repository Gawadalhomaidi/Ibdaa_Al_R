<?php

namespace App\Providers;

use BezhanSalleh\LanguageSwitch\Enums\Placement;
use BezhanSalleh\LanguageSwitch\LanguageSwitch;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['ar','en']) 
                ->labels([
                    'ar' => 'العربية',
                    'en' => 'English',
                ])
                ->flagsOnly()           
                ->circular()             
                ->visible(outsidePanels: true)
                ->outsidePanelRoutes(['home', 'profile']) 
                ->outsidePanelPlacement(Placement::BottomRight);
        });
        
    }
}
