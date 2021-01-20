<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\User;
use App\Models\Cattle;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class UsersTable.
 */
class CattleTable extends TableComponent
{
    use HtmlComponents;

    /**
     * @var string
     */
    public $sortField = 'age';

    /**
     * @var string
     */
    public $status;

    /**
     * @var array
     */
    protected $options = [
        'bootstrap.container' => false,
        'bootstrap.classes.table' => 'table table-striped',
    ];

    /**
     * @param  string  $status
     */
    public function mount($status = 'active'): void
    {
        $this->status = $status;
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        $query = Cattle::query();

        $query = $query->with(['pasture']);

        return $query;

        
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('Age'), 'age')
                ->searchable()
                ->sortable(),
                Column::make(__('Gender'), 'gender')
                ->searchable()
                ->sortable(),
                Column::make(__('Weight'), 'weight')
                ->searchable()
                ->sortable(),
                Column::make(__('Health'), 'health')
                ->searchable()
                ->sortable(),
                Column::make(__('Color'), 'color')
                ->searchable()
                ->sortable(),
                Column::make(__('Price'), 'price')
                ->searchable()
                ->sortable(),
                Column::make(__('Pasture'), 'pasture.name')
                ->searchable()
                ->sortable(),
            
            Column::make(__('Actions'))
                ->format(function (Cattle $model) {
                    return view('backend.cattle.includes.actions', ['cattle' => $model]);
                }),
        ];
    }
}
