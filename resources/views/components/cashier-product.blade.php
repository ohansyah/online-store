<div class="container mb-8">
    <div class="grid grid-cols-2 px-4 sm:px-0 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-2">
        @foreach ($products as $product)
        <div class="grid place-content-stretch">
            <button
                class="border p-4 rounded-lg bg-white focus:outline-none cursor-pointer transition duration-200 ease-out shadow-md overflow-hidden hover:border-indigo-500"
                :class="{ 'ring-2 ring-indigo-500': cartItems.find(item => item.id === {{ $product['id'] }}) }"
                @click="addToCart({{ $product['id'] }}, '{{ $product['name'] }}', '{{ $product->price }}', '{{ $product->price_formatted }}', '{{ $product->image_url }}')"
                >

                <div class="">
                    <div class="w-36 h-32 flex justify-center items-center mx-auto">
                        <img src="{{ $product->image_url }}" alt="{{ $product['name'] }}" class="object-cover max-w-full max-h-full">
                    </div>

                    <div class="mt-2 text-center font-semibold text-sm">
                        <h3 class="">{{ $product['name'] }}</h3>
                        <p class="text-indigo-500">{{ $product->price_formatted }}</p>
                    </div>
                </div>
            </button>
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        @if ($hasMorePages)
        <div class="text-center">
            <!-- Loading Animation -->
            <div wire:loading wire:target="loadMore">
                @svg('css-spinner', 'w-8 h-8 object-cover rounded-full mr-2 animate-spin text-indigo-500')
            </div>
        </div>
        @endif
    </div>
</div>
