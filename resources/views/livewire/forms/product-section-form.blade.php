<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:px-8 lg:py-4  bg-white border-b border-gray-200">
                <h1 class="text-2xl font-medium text-gray-900">
                    {{ __('product_section_edit') }} : {{ Str::title($sectionName) }}
                </h1>
            </div>

            {{-- 
                ! Add functionality to add and remove from both list
                ! Get available product from table products
                !    Search box to filter available products
                ! Save button to save the changes
            --}}

            <div class="bg-gray-200 bg-opacity-25">
                <form wire:submit.prevent="save" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 p-6 sm:p-8">
                        <div>
                            <ul class="list bg-base-100 rounded-box shadow-md">
                                <li class="p-4 pb-2 text-lg text-brand-darkest tracking-wide">Selected Products</li>

                                @foreach ($currentProducts as $product)
                                    <li class="list-row">
                                        <div><img class="size-10 rounded-box" src="{{ $product->image_url }}" /></div>
                                        <div class="list-col-grow">
                                            <div>{{ $product->name }}</div>
                                            <div class="text-xs uppercase font-semibold opacity-60">
                                                {{ $product->price_formatted }}</div>
                                        </div>
                                        <button
                                            class="text-red-500 hover:text-white hover:bg-red-500 py-2 px-2 rounded transition-all duration-250 border border-red-500">
                                            @svg('heroicon-s-arrow-right', 'w-5 h-5')
                                        </button>
                                    </li>
                                @endforeach

                                </li>
                            </ul>

                            <button type="submit" class="w-full p-2 bg-blue-500 text-white rounded-lg mt-2"
                                wire:loading.class="opacity-50">
                                Save
                            </button>
                        </div>

                        <div>
                            <ul class="list bg-base-100 rounded-box shadow-md">
                                <li class="p-4 pb-2 text-lg text-brand-darkest tracking-wide justify-items-end">Available Products</li>

                                @foreach ($currentProducts as $product)
                                    <li class="list-row">
                                        <button
                                            class="text-sky-500 hover:text-white hover:bg-sky-500 py-2 px-2 rounded transition-all duration-250 border border-sky-500">
                                            @svg('heroicon-s-arrow-left', 'w-5 h-5')
                                        </button>
                                        <div class="list-col-grow justify-items-end">
                                            <div>{{ $product->name }}</div>
                                            <div class="text-xs uppercase font-semibold opacity-60">
                                                {{ $product->price_formatted }}</div>
                                        </div>
                                        <div><img class="size-10 rounded-box" src="{{ $product->image_url }}" /></div>
                                    </li>
                                @endforeach

                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
