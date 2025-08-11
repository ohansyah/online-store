<div class="flex flex-wrap mb-2">
    <div class="flex-auto bg-white overflow-hidden shadow-md rounded-lg text-left p-6">
        <p class="text-gray-600 text-sm">Visualize Order Overview Chart</p>
        {!! $chart->container() !!}
    </div>
</div>

<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}