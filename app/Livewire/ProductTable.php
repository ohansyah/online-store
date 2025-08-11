<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class ProductTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return Product::query()
            ->with('category')
            ->select('products.image', 'products.id');
    }

    public function columns(): array
    {
        return [
            Column::make("SKU", "sku")
                ->sortable()
                ->searchable(),
            Column::make("Barcode", "barcode")
                ->sortable()
                ->searchable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Price", "price")
                ->sortable(),
            Column::make("Stock", "stock")
                ->sortable(),
            Column::make("Category", "category.name")
                ->sortable(),
            BooleanColumn::make("Is Active", "is_active")
                ->sortable()
                ->setView('components.boolean'),
            ImageColumn::make("Image", "image")
                ->location(
                    fn($row) => $row->image_url
                )
                ->attributes(fn($row) => [
                    'class' => 'object-cover rounded-lg shadow-md w-12 h-12',
                ]),
            Column::make('Action')
                ->label(
                    fn($row, Column $column) => view('components.button-group')->with([
                        'routeEdit' => route('product.edit', $row),
                        'routeDelete' => route('product.delete', $row),
                    ])
                )->html(),

        ];
    }
}
