<div class="p-4 bg-white/80 dark:bg-gray-800 rounded-lg shadow-sm">
    <div class="flex gap-3 mb-3">
        <select wire:model="selectedModel" class="rounded border px-3 py-2">
            @foreach($models as $key => $m)
                <option value="{{ $key }}">{{ str_replace('_',' ', ucfirst($key)) }}</option>
            @endforeach
        </select>

        <input wire:model.debounce.300ms="search" type="text" placeholder="Search..." class="rounded border px-3 py-2 flex-1" />
    </div>

    <div class="divide-y">
        @forelse($items as $item)
            <div class="py-2 flex justify-between items-center">
                <div>
                    @if(isset($item->title_en))
                        <div class="font-semibold">{{ \Illuminate\Support\Str::limit($item->title_en ?? $item->name_en ?? $item->email ?? 'Record', 60) }}</div>
                    @else
                        <div class="font-semibold">{{ \Illuminate\Support\Str::limit($item->name_en ?? $item->email ?? 'Record', 60) }}</div>
                    @endif
                    <div class="text-xs text-gray-400">{{ optional($item->created_at)->diffForHumans() }}</div>
                </div>
                <div class="text-sm text-gray-500">
                    @if(property_exists($item,'is_active'))
                        @if($item->is_active)
                            <span class="inline-block px-2 py-1 rounded bg-green-100 text-green-700">Active</span>
                        @else
                            <span class="inline-block px-2 py-1 rounded bg-red-100 text-red-700">Inactive</span>
                        @endif
                    @endif
                </div>
            </div>
        @empty
            <div class="py-2 text-sm text-gray-500">No records found.</div>
        @endforelse
    </div>
</div>
