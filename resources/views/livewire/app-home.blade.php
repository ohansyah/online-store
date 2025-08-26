<div>
    <div class="bg-white px-4 sm:px-6 lg:px-8">

        <!-- Search Products -->
        <header class="grid items-center gap-2 py-8">
            <div class="flex justify-center">
                <div class="w-full">
                    <form action="#" method="GET" class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#9E7A48]">
                            <x-heroicon-s-magnifying-glass class="w-6 h-6" />
                        </span>
                        <input type="text" name="search" placeholder="Search..."
                            class="w-full rounded-full border border-[#E7E1CA] bg-white py-3 pl-12 pr-4 text-sm text-[#29201E] shadow-sm focus:border-[#CEA972] focus:ring-2 focus:ring-[#CEA972] focus:outline-none" />
                    </form>
                </div>
            </div>
        </header>

        <!-- Banner Carousel -->
        <div class="pb-8">
            <p class="text-base font-medium text-brand-darkest mb-2">
                Hot deals
            </p>

            <div class="relative">
                <div class="carousel w-full rounded-xl overflow-hidden" id="hot-deals-carousel">
                    @for ($i = 1; $i <= 5; $i++)
                        <div id="slide{{ $i }}" class="carousel-item relative w-full">
                            <!-- Background Image -->
                            <img src="{{ asset('storage/banners/banner-1.png') }}" class="w-full object-cover"
                                alt="Banner {{ $i }}">

                            <!-- Text Overlay -->
                            <div class="absolute left-4 top-1/2 -translate-y-1/2">
                                <p class="text-xl font-medium text-brand-darkest">
                                    Up to 50% off <br> on your {{ $i }}st order
                                </p>
                            </div>
                        </div>
                    @endfor
                </div>

                <!-- Bullets -->
                <div id="carousel-bullets" class="flex w-full justify-center gap-1 py-1">
                    @for ($i = 1; $i <= 5; $i++)
                        <a data-slide="{{ $i }}"
                            class="w-6 h-2 rounded-full transition 
                                {{ $i === 1 ? 'bg-brand-darker' : 'bg-brand-lightest hover:bg-brand-lighter' }}">
                        </a>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Popular -->
        <div class="pb-8">
            <div class="flex justify-between items-center w-full mb-2">
                <p class="text-base font-medium text-brand-darkest">Popular</p>
                <p class="text-xs text-brand-darker cursor-pointer">See all</p>
            </div>
            <livewire:app.product-section />
        </div>

        <livewire:app.category />

        <div class="pb-8">
            <div class="flex justify-between items-center w-full mb-2">
                <p class="text-base font-medium text-brand-darkest">Explore More</p>
            </div>
            <livewire:app.product-list />
        </div>
    </div>
</div>
