<div>
    <!-- Product list -->
    <div class="overflow-x-auto flex gap-3 no-scrollbar">
        @foreach ($products as $product)
            <a href="{{ route('app.product.detail', ['id' => $product->id]) }}"
                class="group card relative w-32 h-40 flex-shrink-0 overflow-hidden cursor-pointer">

                <!-- Image -->
                <figure class="w-full h-full">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                        class="w-full h-full object-cover transition-transform duration-300" />
                </figure>

                <!-- Hidden Card Body (slide up on hover) -->
                <div class="absolute bottom-0 left-0 w-full translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out bg-white/50 backdrop-blur-sm p-2">
                    <p class="text-xs font-medium text-brand-darkest truncate">
                        {{ $product->name }}
                    </p>
                    <div class="badge badge-soft badge-warning badge-sm mt-1">{{ $product->price_formatted }}</div>
                </div>
            </a>
        @endforeach
    </div>
</div>
