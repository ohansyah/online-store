<div>

    <div class="bg-white p-6 grid gap-6">

        {{-- Search --}}
        <div class="grid items-center">
            <div class="flex justify-center">
                <div class="w-full relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-brand-lighter">
                        <x-heroicon-s-magnifying-glass class="w-6 h-6" />
                    </span>
                    <input wire:model.live='searchQuery' type="search" id="search" placeholder="Search..."
                        class="w-full rounded-full border-2 border-brand-lightest text-base font-medium text-brand-darkest p-3 pl-12 focus:border-brand-lighter focus:ring-1 focus:ring-brand-lighter focus:outline-none transition-transform duration-300 ease-out">
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="flex space-x-2 overflow-x-auto no-scrollbar">
            @foreach ($categories as $category)
                <button wire:click="toggleCategory({{ $category->id }})" wire:loading.attr="disabled"
                    wire:target="toggleCategory({{ $category->id }})" @class([
                        'flex-shrink-0 flex items-center rounded-xl p-2 transition duration-200 ease-in-out cursor-pointer border-2 bg-white',
                        'border-brand-lighter' => in_array($category->id, $selectedCategories),
                        'border-brand-lightest hover:border-brand-lighter focus:outline-none' => !in_array($category->id, $selectedCategories),
                    ])>

                    <!-- Loading Animation -->
                    <div wire:loading wire:target="toggleCategory({{ $category->id }})">
                        @svg('css-spinner', 'w-8 h-8 object-cover rounded-full mr-2 animate-spin text-brand-lighter')
                    </div>
                    <div wire:loading.remove wire:target="toggleCategory({{ $category->id }})">
                        <img src="{{ $category->image_url }}" alt="{{ $category->name }}"
                            class="w-8 h-8 object-cover mr-2">
                    </div>
                    <span>{{ $category->name }}</span>
                </button>
            @endforeach
        </div>

        <!-- Product list -->
        <div class="grid grid-cols-2 gap-3">
            @foreach ($products as $product)
                <a href="{{ route('app.product.detail', ['id' => $product->id]) }}" wire:navigate
                    class="group card relative w-full h-full flex-shrink-0 flex-col gap-1 overflow-hidden cursor-pointer">

                    <!-- Image -->
                    <figure class="w-full h-full">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                            class="w-full h-full object-cover transition-transform duration-300" />
                    </figure>

                    <!-- Hidden Card Body (slide up on hover) -->
                    <div
                        class="absolute bottom-0 left-0 w-full translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out bg-white/50 backdrop-blur-sm p-2 pt-4">
                        <p class="text-sm font-medium text-brand-darkest">
                            {{ $product->name }}
                        </p>
                        <div class="badge badge-soft badge-warning">{{ $product->price_formatted }}</div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-4">
            @if ($hasMorePages)
                <div class="text-center">
                    <div wire:loading wire:target="loadMore">
                        @svg('css-spinner', 'w-8 h-8 object-cover rounded-full mr-2 animate-spin text-brand-lighter')
                    </div>
                </div>
            @endif
        </div>

    </div>

</div>
<script>
    document.addEventListener('scroll', function() {
        if ((window.innerHeight + window.scrollY) >= (document.body.offsetHeight)) {
            @this.call('loadMore');
        }
    });
</script>
