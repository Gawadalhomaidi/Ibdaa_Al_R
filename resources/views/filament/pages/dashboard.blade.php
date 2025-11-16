<x-filament::page>
    <div class="space-y-6">
        {{-- Widgets will be automatically mounted because Page::getWidgets returns them --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="col-span-1 space-y-6">
                widget(\App\Filament\Widgets\OverviewStats::class)
            </div>
            <div class="lg:col-span-2 space-y-6">
                widget(\App\Filament\Widgets\ModelsChart::class)
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                widget(\App\Filament\Widgets\ModelFilters::class)
            </div>
            <div class="lg:col-span-1">
                widget(\App\Filament\Widgets\LatestRecords::class)
            </div>
        </div>
    </div>َ
</x-filament::page>
