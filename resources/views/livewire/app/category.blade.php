<div class="pb-8">
    <div class="overflow-x-auto flex gap-2 no-scrollbar">
        @foreach ($categories as $category)
            <a href="#" class="group card relative w-24 h-24 flex-shrink-0 overflow-hidden cursor-pointer">

                <!-- Image -->
                <figure class="w-full h-full">
                    <img src="{{ $category->image_url }}" alt="{{ $category->name }}"
                        class="w-full h-full object-cover transition-transform duration-300" />
                </figure>

                <!-- Hidden Card Body (slide up on hover) -->
                <div
                    class="absolute bottom-0 left-0 w-full h-full translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out bg-white/50 backdrop-blur-sm flex items-center justify-center">
                    <h2 class="card-title text-brand-darker text-center">
                        {{ $category->name }}
                    </h2>
                </div>
            </a>
        @endforeach
    </div>
</div>
