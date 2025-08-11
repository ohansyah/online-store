<div class="sm:flex items-center space-x-4 mb-4 overflow-x-auto no-scrollbar">

    {{-- Search --}}
    <div class="mb-4 mx-4 sm:mx-0 sm:mb-0 sm:flex-grow sm:w-1/3 min-w-64">
        <div class="relative">
            <input wire:model.live='searchQuery' type="search" id="search" placeholder="Search..."
                class="border-gray-300 rounded-md shadow-sm text-gray-800 pl-10 w-full">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                @svg('heroicon-s-magnifying-glass', 'w-5 h-5')
            </div>
        </div>
    </div>

    <!-- Categories -->
    <div class="flex space-x-2 overflow-x-auto no-scrollbar">
        @foreach ($categories as $category)
        <button wire:click="toggleCategory({{ $category['id'] }})" wire:loading.attr="disabled"
            wire:target="toggleCategory({{ $category['id'] }})"
            @class([ 'flex-shrink-0 flex items-center rounded-lg p-2 transition duration-200 ease-in-out cursor-pointer border bg-white'
            , 'border-indigo-500'=> in_array($category['id'], $selectedCategories),
            'hover:border-indigo-500 focus:outline-none' => !in_array($category['id'], $selectedCategories),
            ])>

            <!-- Loading Animation -->
            <div wire:loading wire:target="toggleCategory({{ $category['id'] }})">
                @svg('css-spinner', 'w-5 h-5 object-cover rounded-full mr-2 animate-spin text-indigo-500')
            </div>
            <div wire:loading.remove wire:target="toggleCategory({{ $category['id'] }})">
                <img src="{{ $category['image_url'] }}" alt="{{ $category['name'] }}"
                    class="w-5 h-5 object-cover rounded-full mr-2">
            </div>
            <span>{{ $category['name'] }}</span>
        </button>
        @endforeach
    </div>

</div>
