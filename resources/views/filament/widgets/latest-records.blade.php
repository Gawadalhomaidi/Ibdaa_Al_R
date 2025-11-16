<div class="p-4 bg-white/80 dark:bg-gray-800 rounded-lg shadow-sm">
    <h3 class="text-sm font-semibold text-gray-500 mb-3">Latest Records (sample)</h3>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($data['latest'] as $modelName => $rows)
            <div class="border rounded p-3">
                <div class="text-xs text-gray-400 uppercase mb-2">{{ str_replace('_',' ', ucfirst($modelName)) }}</div>
                <div class="space-y-2 text-sm">
                    @forelse($rows as $r)
                        <div class="flex justify-between">
                            <div class="truncate">
                                {{ \Illuminate\Support\Str::limit($r->title_en ?? $r->name_en ?? $r->email ?? '—', 60) }}
                            </div>
                            <div class="text-xs text-gray-400">{{ optional($r->created_at)->diffForHumans() }}</div>
                        </div>
                    @empty
                        <div class="text-xs text-gray-400">No records</div>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>
</div>
