<?php

namespace App\Livewire;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class BannerTable extends DataTableComponent
{
    protected $model = Banner::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return Banner::query()->select('id', 'name', 'is_active', 'started_at', 'ended_at', 'image');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Started At", "started_at")
                ->sortable(),
            Column::make("Ended At", "ended_at")
                ->sortable(),
            BooleanColumn::make("Is Active", "is_active")
                ->sortable()
                ->setView('components.boolean'),
            ImageColumn::make("Image", "image")
                ->location(
                    fn($row) => $row->image_url
                )
                ->attributes(fn($row) => [
                    'class' => 'object-cover rounded-xl overflow-hidden w-12 h-12',
                ]),
            Column::make('Action')
                ->label(
                    fn($row, Column $column) => view('components.button-group')->with([
                        'routeEdit' => route('banner.edit', $row),
                        'routeDelete' => route('banner.delete', $row),
                    ])
                )->html(),

        ];
    }
}
