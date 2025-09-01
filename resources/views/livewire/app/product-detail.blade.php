<div>
    <div>
        <div class="card bg-base-100 w-full aspect-[3/4] overflow-hidden shadow-md">
            <figure>
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">
                    {{ $product->name }}
                    <div class="badge badge-soft badge-lg badge-warning">{{ $product->price_formatted }}</div>
                </h2>
                <p>{{$product->description}}</p>
                <div class="card-actions justify-end">
                    <div class="badge badge-outline badge-lg badge-warning">{{ $product->category->name }}</div>
                </div>
            </div>
        </div>

        <div class="my-8">
            <div class="flex justify-between items-center w-full mb-2">
                <p class="text-base font-medium text-brand-darkest">Discount</p>
                <a href="{{ route('app.product.index', ['section' => 'discount']) }}" wire:navigate class="text-sm font-medium text-brand-darker hover:text-brand-lighter">See all</a>
            </div>
            <livewire:app.product-section section="discount"/>
        </div>

        {{-- fix overlap --}}
        <div class="pb-8"></div>
    </div>
</div>