<div>

    <!-- Product list -->
    <div class="grid grid-cols-2 gap-3">
        @foreach ($products as $product)
            <a href="{{ route('app.product.detail', ['id' => $product->id]) }}" class="group card relative w-full h-full flex-shrink-0 flex-col gap-1 overflow-hidden cursor-pointer">
                
                <!-- Image -->
                <figure class="w-full h-full">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-300" />
                </figure>

                <!-- Hidden Card Body (slide up on hover) -->
                <div class="absolute bottom-0 left-0 w-full translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out bg-white/50 backdrop-blur-sm p-2 pt-4">
                    <p class="text-sm font-medium text-brand-darkest">
                        {{ $product->name }}
                    </p>
                    <div class="badge badge-soft badge-warning">{{ $product->price_formatted }}</div>
                </div>
            </a> 
        @endforeach
    </div>

    <div class="mt-4">
        @if ($hasMorePages)
            <div class="text-center">
                <div wire:loading wire:target="loadMore">
                    @svg('css-spinner', 'w-8 h-8 object-cover rounded-full mr-2 animate-spin text-brand-lighter')
                </div>
            </div>
        @endif
    </div>

</div>
<script>
    document.addEventListener('scroll', function() {
        if ((window.innerHeight + window.scrollY ) >= (document.body.offsetHeight)) {
            @this.call('loadMore');
        }
    });
</script>