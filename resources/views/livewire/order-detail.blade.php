<div class="py-0 sm:py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg gap-6 p-6">

            <div class="flex flex-col sm:flex-row space-y-4 justify-between items-center pb-4 mb-4">
                <div class="text-center sm:text-left">
                    <p class="text-gray-800 font-semibold text-md sm:text-xl">{{ $order->invoice_number }}</p>
                    <p class="text-gray-600 text-sm">{{ $order->created_at}}</p>
                    <p class="text-gray-600 text-sm">Cashier : {{ $order->user->name }}</p>
                </div>
                <div class="text-center sm:text-right">
                    <p class="text-gray-800 font-semibold">{{ $company['company_name'] }}</p>
                    <p class="text-gray-600 text-sm">{{ $company['company_address_line_1'] }}</p>
                    <p class="text-gray-600 text-sm">{{ $company['company_address_line_2'] }}</p>
                </div>
            </div>
            <div class="mb-4">
                <div class="overflow-x-auto"> <!-- Enable horizontal scrolling -->
                    <table class="min-w-full table-auto divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr class="bg-gray-100 text-gray-800 font-semibold whitespace-nowrap">
                                <th class="text-left p-2">Name</th>
                                <th class="text-right p-2">SKU</th>
                                <th class="text-center p-2">Qty</th>
                                <th class="text-right p-2">Price</th>
                                <th class="text-right p-2">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($order->orderProducts as $item)
                            <tr class="text-gray-600 whitespace-nowrap">
                                <td class="text-left p-2">{{ $item->product->name }}</td>
                                <td class="text-right p-2">{{ $item->product->sku }}</td>
                                <td class="text-center p-2">{{ $item->quantity }}</td>
                                <td class="text-right p-2">{{ $item->total_formatted }}</td>
                                <td class="text-right p-2">{{ $item->price_formatted }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="flex justify-between items-center border-t pt-4">
                <div class="text-right font-semibold text-gray-800">
                    Total
                </div>
                <div class="text-right font-semibold text-gray-800">{{ $order->total_formatted }}</div>
            </div>

        </div>

        <div class="md:flex md:items-center space-y-4 md:space-y-0 md:space-x-2 mt-6">
            <a href="{{ route('order.print', $order->id) }}" target="_blank"
                class="w-full h-10 flex items-center justify-center text-sm text-indigo-500 hover:bg-indigo-500 hover:text-white py-2 px-4 rounded transition-all duration-250 border border-indigo-500">
                <div class="px-1">
                    <x-heroicon-o-printer class="w-5 h-5" />
                </div>
                <span class="max-[320px]:hidden">Print</span>
            </a>
            <a href="{{ route('order.pdf', $order->id) }}"
                class="w-full h-10 flex items-center justify-center text-sm text-indigo-500 hover:bg-indigo-500 hover:text-white py-2 px-4 rounded transition-all duration-250 border border-indigo-500">
                <div class="px-1">
                    <x-heroicon-o-arrow-down-tray class="w-5 h-5" />
                </div>
                <span class="max-[320px]:hidden">Save PDF</span>
            </a>
            <a href="{{ route('order.image', $order->id) }}"
                class="w-full h-10 flex items-center justify-center text-sm text-indigo-500 hover:bg-indigo-500 hover:text-white py-2 px-4 rounded transition-all duration-250 border border-indigo-500">
                <div class="px-1">
                    <x-heroicon-o-photo class="w-5 h-5" />
                </div>
                <span class="max-[320px]:hidden">Save Image</span>
            </a>
        </div>
    </div>
</div>
