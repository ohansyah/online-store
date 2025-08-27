<div>
    <div class="bg-white px-4 sm:px-6 lg:px-8">

        <!-- Search Products -->
        <div class="grid items-center gap-2 py-8">
            <div class="flex justify-center">
                <div class="w-full">
                    <form action="{{ route('app.product.index') }}" method="GET" class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-brand-lighter">
                            <x-heroicon-s-magnifying-glass class="w-6 h-6" />
                        </span>
                        <input type="text" name="search" placeholder="Search..."
                        class="w-full rounded-full border-2 border-brand-lightest text-base font-medium text-brand-darkest p-3 pl-12 focus:border-brand-lighter focus:ring-1 focus:ring-brand-lighter focus:outline-none transition-transform duration-300 ease-out">
                    </form>
                </div>
            </div>
        </div>

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
                <a href="{{ route('app.product.index', ['section' => 'popular']) }}" class="text-sm font-medium text-brand-darker hover:text-brand-lighter">See all</a>
            </div>
            <livewire:app.product-section />
        </div>

        <!-- Categories -->
        <div class="pb-8">
            <div class="flex justify-between items-center w-full mb-2">
                <p class="text-base font-medium text-brand-darkest">Categories</p>
            </div>
            <livewire:app.category />
        </div>

        <div class="pb-8">
            <div class="flex justify-between items-center w-full mb-2">
                <p class="text-base font-medium text-brand-darkest">Explore More</p>
                <a href="{{ route('app.product.index') }}" class="text-sm font-medium text-brand-darker hover:text-brand-lighter">See all</a>
            </div>
            <livewire:app.product-simple-list />
        </div>
    </div>
</div>
@push('scripts')
    @vite('resources/js/auto-slide.js')
@endpush