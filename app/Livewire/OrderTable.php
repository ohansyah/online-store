<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class OrderTable extends DataTableComponent
{
    protected $model = Order::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function builder(): Builder
    {
        return Order::query()->with('user')->select('orders.id');
    }

    public function columns(): array
    {
        return [
            Column::make("Invoice", "invoice_number")
                ->sortable()
                ->searchable()
                ->format(function ($value, $column, $row) {
                    return '<a href="' . route('order.show', $column->id) . '" class="hover:text-indigo-500 transition-all duration-250 ease-in-out" wire:navigate>' . $value . '</a>';
                })
                ->html(),
            Column::make("Total", "total")
                ->sortable()
                ->format(function ($value) {
                    return formatCurrency($value, 0, ',', '.');
                }),
            Column::make("Cashier", "user.name")
                ->sortable()
                ->searchable(),

        ];
    }
}
