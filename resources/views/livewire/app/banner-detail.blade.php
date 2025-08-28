<div>
    <div class="bg-white p-6 min-h-screen">
        <div class="card bg-base-100 w-full overflow-hidden shadow-md">
            <figure>
                <img src="{{ $banner->image_url }}" alt="{{ $banner->name }}" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">
                    {{ $banner->name }}
                </h2>
                <p>{{$banner->description}}</p>
                <div class="card-actions justify-end">
                    <div class="badge badge-outline badge-lg badge-warning">Ends at: {{ $banner->ended_at }}</div>
                </div>
            </div>
        </div>
    </div>
</div>