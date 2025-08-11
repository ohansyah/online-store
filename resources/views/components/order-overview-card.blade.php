<div class="flex flex-wrap gap-2 mb-4">

    <div class="flex-auto bg-white overflow-hidden shadow-md rounded-lg text-left p-6">
        <p class="text-gray-600 text-sm">Sales Today</p>
        <span class="text-4xl text-gray-800">{{ $card['sumOrderTotalToday'] }}</span>
    </div>

    <div class="flex flex-auto flex-row gap-2 ">
        <div class="flex-auto bg-white overflow-hidden shadow-md rounded-lg text-left p-6">
            <p class="text-gray-600 text-sm">Order Today</p>
            <span class="text-4xl text-gray-800">{{ $card['countOrderToday'] }}</span>
        </div>

        <div class="flex-auto bg-white overflow-hidden shadow-md rounded-lg text-left p-6">
            <p class="text-gray-600 text-sm">Product Sold</p>
            <span class="text-4xl text-gray-800">{{ $card['countOrderProductToday'] }}</span>
        </div>
    </div>

</div>