<div x-data="{ search: @entangle('keyword').defer }">
    <div class="relative w-full max-w-xs">
        <input 
            type="text"
            x-model="search"
            wire:model.defer="keyword"
            placeholder="Tìm kiếm..."
            class="w-full pl-3 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm"
        >
        <button
            type="button"
            @click="$wire.$emitUp('searchUpdated', search)"
            style="background: none; border: none; padding: 0; cursor: pointer; position: absolute; right: 8px; top: 50%; transform: translateY(-50%);"
        >
            <i class="fas fa-search"></i>
        </button>
    </div>
</div>