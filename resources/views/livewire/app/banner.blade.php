<div class="bg-white p-6 min-h-screen">
    <div class="grid gap-6">        
        <!-- banner list -->
        @foreach ($banners as $banner)
            <a href="{{ route('app.banner.detail', ['id' => $banner->id]) }}" wire:navigate
                class="group card relative w-full h-full flex-shrink-0 flex-col gap-1 overflow-hidden cursor-pointer">

                <!-- Image -->
                <figure class="w-full h-full">
                    <img src="{{ $banner->image_url }}" alt="{{ $banner->name }}"
                        class="w-full h-full object-cover transition-transform duration-300" />
                </figure>

                <!-- Hidden Card Body (slide up on hover) -->
                <div
                    class="absolute bottom-0 left-0 w-full translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out bg-white/50 backdrop-blur-sm p-2 pt-4">
                    <div class="card-body">
                        <h2 class="card-title">
                            {{ $banner->name }}
                        </h2>
                        <div class="card-actions">
                            <div class="badge badge-outline badge-lg badge-warning">Ends at: {{ $banner->ended_at }}</div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>