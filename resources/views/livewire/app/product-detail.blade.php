<div class="bg-white p-6">
    <div class="card bg-base-100 w-full h-auto shadow-md">
        <figure class="aspect-[3/4] w-full overflow-hidden">
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
</div>