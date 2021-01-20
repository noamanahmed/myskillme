<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\User;
use App\Models\Pasture;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class UsersTable.
 */
class PasturesTable extends TableComponent
{
    use HtmlComponents;

    /**
     * @var string
     */
    public $sortField = 'name';

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
        $query = Pasture::query();

        return $query;

        
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            
            Column::make(__('Name'), 'name')
                ->searchable()
                ->sortable(),
                Column::make(__('Temperature'), 'temperature')
                ->searchable()
                ->sortable(),
                Column::make(__('Grass Condition'), 'grass_condition')
                ->searchable()
                ->sortable(),
            
            Column::make(__('Actions'))
                ->format(function (Pasture $model) {
                    return view('backend.pasture.includes.actions', ['pasture' => $model]);
                }),
        ];
    }
}
