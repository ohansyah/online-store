<!-- Categories -->
<div class="pb-8">
    <div class="flex justify-between items-center w-full mb-2">
        <p class="text-base font-medium text-brand-darkest">Categories</p>
    </div>

    <div class="group overflow-x-auto flex gap-2 no-scrollbar">
        @foreach ( $categories as $category)
            <div class="w-24 h-24 flex-shrink-0 flex flex-col gap-2 p-2 rounded-xl border-2 border-white hover:border-brand-lighter transition duration-200 ease-out cursor-pointer">
                <div class="relative rounded-xl overflow-hidden">
                    <img src="{{ $category['image_url'] }}" alt="{{ $category['name'] }}" class="w-full h-full object-cover" />
                </div>
            </div>
        @endforeach
    </div>
</div>