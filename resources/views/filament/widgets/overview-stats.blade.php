<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="space-y-4">
        <div class="p-4 bg-white/80 dark:bg-gray-800 rounded-lg shadow-sm">
            <h3 class="text-sm font-semibold text-gray-500">Total Records</h3>
            <div class="mt-2 text-3xl font-bold">{{ number_format($data['total_records']) }}</div>
            <p class="text-xs text-gray-400 mt-1">Across {{ $data['total_models'] }} models</p>
        </div>

        <div class="p-4 bg-white/80 dark:bg-gray-800 rounded-lg shadow-sm">
            <h3 class="text-sm font-semibold text-gray-500">Active Ratio</h3>
            <div class="mt-2 text-2xl font-bold">{{ $data['active_ratio'] }}%</div>
            <p class="text-xs text-gray-400 mt-1">Approx. active entries</p>
        </div>
    </div>

    <div class="md:col-span-2 grid grid-cols-2 gap-4">
        @foreach($data['counts'] as $key => $count)
            <div class="p-3 bg-white/80 dark:bg-gray-800 rounded-lg border">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-xs text-gray-500 uppercase">{{ str_replace('_',' ', $key) }}</div>
                        <div class="mt-2 text-xl font-semibold">{{ $count }}</div>
                    </div>
                    <div class="text-4xl opacity-40">
                        <!-- simple icon -->
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M3 7v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7M8 7V5a4 4 0 0 1 8 0v2" />
                        </svg>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
