<?php

namespace App\Livewire;

use App\Models\Page;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class PageTable extends DataTableComponent
{
    protected $model = Page::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return Page::query()->select('id', 'title', 'content');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Title", "title")
                ->sortable()
                ->searchable(),
            Column::make('Action')
                ->label(
                    fn($row, Column $column) => view('components.button-group')->with([
                        'routeEdit' => route('page.edit', $row),
                    ])
                )->html(),
        ];
    }
}