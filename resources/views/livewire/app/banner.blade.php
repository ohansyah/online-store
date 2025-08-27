<div>
    <div class="relative">
        <div class="carousel w-full rounded-xl overflow-hidden" id="hot-deals-carousel">
            @foreach ($banners as $index => $banner)
                <div id="slide{{ $index }}" class="carousel-item relative w-full">
                    <!-- Background Image -->
                    <img src="{{ asset('storage/default/banners/banner-1.webp') }}" class="w-full object-cover"
                        alt="{{ $banner->name }}">

                    <!-- Text Overlay -->
                    <div class="absolute left-4 top-1/2 -translate-y-1/2">
                        <p class="text-xl font-medium text-brand-darkest">
                            {{ $banner->name }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Bullets -->
        <div id="carousel-bullets" class="flex w-full justify-center gap-1 py-1">
            @for ($i = 1; $i <= $banners->count(); $i++)
                <a data-slide="{{ $i }}"
                    class="w-6 h-2 rounded-full transition 
                        {{ $i === 1 ? 'bg-brand-darker' : 'bg-brand-lightest hover:bg-brand-lighter' }}">
                </a>
            @endfor
        </div>
    </div>
</div>
