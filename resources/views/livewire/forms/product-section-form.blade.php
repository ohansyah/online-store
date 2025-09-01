<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:px-8 lg:py-4  bg-white border-b border-gray-200">
                <h1 class="text-2xl font-medium text-gray-900">
                    {{ __('product_section_edit') }} : {{ Str::title($sectionName) }}
                </h1>
            </div>

            {{-- 
                ! Get available product from table products
                !    Search box to filter available products
                ! Save button to save the changes
            --}}

            <div class="bg-gray-200 bg-opacity-25" x-data="{
                selectedProductIds: {{ json_encode($currentProducts->pluck('id')) }},
                selectedProducts: {{ $currentProducts }}
            }" x-init="console.log(selectedProductIds);
            console.log(selectedProducts);">

                <form wire:submit.prevent="save" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 p-6 sm:p-8">
                        <div>
                            <ul class="list bg-base-100 rounded-box shadow-md">
                                <li class="p-4 pb-2 text-lg text-brand-darkest tracking-wide">Selected Products</li>
                                <template x-for="product in selectedProducts" :key="product.id">
                                    <li class="list-row" x-show="selectedProductIds.includes(product.id)"
                                        x-transition:leave="transition ease-in duration-500"
                                        x-transition:leave-start="opacity-100 transform translate-x-0"
                                        x-transition:leave-end="opacity-0 transform translate-x-4">

                                        <div>
                                            <img class="size-10 rounded-box" :src="product.image_url" />
                                        </div>
                                        <div class="list-col-grow justify-items-end">
                                            <div x-text="product.name"></div>
                                            <div class="text-xs uppercase font-semibold opacity-60"
                                                x-text="product.price_formatted"></div>
                                        </div>
                                        <button
                                            @click.prevent="
                                                        selectedProductIds = selectedProductIds.filter(id => id !== product.id);

                                                        setTimeout(() => {
                                                            selectedProducts = selectedProducts.filter(p => p.id !== product.id);
                                                        }, 500); // Match the duration of the leave transition

                                                        console.log('Removed', product.id, selectedProductIds);
                                                    "
                                            class="text-red-500 hover:text-white hover:bg-red-500 py-2 px-2 rounded transition-all duration-250 border border-red-500">
                                            @svg('heroicon-s-arrow-right', 'w-5 h-5')
                                        </button>
                                    </li>
                                </template>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <ul class="list bg-base-100 rounded-box shadow-md">
                                <li class="p-4 pb-2 text-lg text-brand-darkest tracking-wide justify-items-end">
                                    Available Products</li>
                                @foreach ($availableProducts as $product)
                                    <li class="list-row" x-show="!selectedProductIds.includes({{ $product->id }})"
                                        x-transition:leave="transition ease-in duration-500"
                                        x-transition:leave-start="opacity-100 transform translate-x-0"
                                        x-transition:leave-end="opacity-0 transform -translate-x-4">

                                        <button
                                            @click.prevent="
                                                    selectedProductIds.push({{ $product->id }});
                                                    selectedProducts.push({
                                                        id: {{ $product->id }},
                                                        name: '{{ $product->name }}',
                                                        price_formatted: '{{ $product->price_formatted }}',
                                                        image_url: '{{ $product->image_url }}'
                                                    });
                                                    console.log('Added {{ $product->id }}:', selectedProductIds, selectedProducts);
                                                "
                                            class="text-indigo-500 hover:text-white hover:bg-indigo-500 py-2 px-2 rounded transition-all duration-250 border border-indigo-500">
                                            @svg('heroicon-s-arrow-left', 'w-5 h-5')
                                        </button>

                                        <div class="list-col-grow justify-items-end">
                                            <div>{{ $product->name }}</div>
                                            <div class="text-xs uppercase font-semibold opacity-60">
                                                {{ $product->price_formatted }}</div>
                                        </div>
                                        <div><img class="size-10 rounded-box" src="{{ $product->image_url }}" />
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="px-8 pb-8">
                        <button type="submit" class="w-full p-2 bg-blue-500 text-white rounded-lg"
                            wire:loading.class="opacity-50">
                            Save
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
