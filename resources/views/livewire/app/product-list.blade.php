<div>

    <!-- Product list -->
    <div class="grid grid-cols-2 gap-4">
        @foreach ($products as $product)
            <a href="{{ route('app.product.detail', ['id' => $product->id]) }}" class="card shadow-md flex flex-col gap-1 relative h-80 hover:shadow-brand-darker transition duration-200 ease-out">
                <figure>
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover"/>
                </figure>
                <div class="card-body p-2 gap-1 grid content-start">
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