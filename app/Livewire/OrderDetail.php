<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class OrderDetail extends Component
{
    public Order $order;

    public function mount($id)
    {
        $this->order = Order::with(['user', 'orderProducts', 'orderProducts.product'])->findOrFail($id);
    }

    public function render()
    {
        $generalSettings = Cache::get('general_settings');
        $company = Arr::only($generalSettings, ['company_name', 'company_address_line_1', 'company_address_line_2']);

        return view('livewire.order-detail', compact('company'));
    }
}
