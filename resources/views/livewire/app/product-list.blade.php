<div>

    <!-- Product list -->
    <div class="grid grid-cols-2 gap-4 pr-1">
        @foreach ($products as $product)
            <div class="flex flex-col gap-2">

                <div class="relative h-64 rounded-xl overflow-hidden">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover" />
                </div>

                <p class="text-sm font-medium text-brand-darkest">
                    {{ $product->name }}
                </p>

                <div class="flex items-center gap-2">
                    <span class="text-sm font-medium text-brand-darker">{{ $product->price_formatted }}</span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        @if ($hasMorePages)
            <div class="text-center">
                <div wire:loading wire:target="loadMore">
                    @svg('css-spinner', 'w-8 h-8 object-cover rounded-full mr-2 animate-spin text-indigo-500')
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