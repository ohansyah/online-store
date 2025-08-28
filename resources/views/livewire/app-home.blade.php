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
            <livewire:app.banner />
        </div>

        <!-- Popular -->
        <div class="pb-8">
            <div class="flex justify-between items-center w-full mb-2">
                <p class="text-base font-medium text-brand-darkest">Popular</p>
                <a href="{{ route('app.product.index', ['section' => 'popular']) }}" wire:navigate class="text-sm font-medium text-brand-darker hover:text-brand-lighter">See all</a>
            </div>
            <livewire:app.product-section section="popular"/>
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
                <a href="{{ route('app.product.index') }}" wire:navigate class="text-sm font-medium text-brand-darker hover:text-brand-lighter">See all</a>
            </div>
            <livewire:app.product-simple-list />
        </div>
    </div>
</div>
@push('scripts')
    @vite('resources/js/auto-slide.js')
@endpush