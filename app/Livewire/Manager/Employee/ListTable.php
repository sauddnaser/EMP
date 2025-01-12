<?php

namespace App\Livewire\Manager\Employee;

use App\Models\Employee;
use App\Traits\WithLazyLoad;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListTable extends Component
{
    use WithLazyLoad;

    public $search;

    public function render()
    {
        $employees = ($this->ready_to_load) ? $this->getEmployeeList() : [];
        $view_data = [
            'employees' => $employees,
        ];
        return view('livewire.manager.employee.list-table', $view_data);
    }

    public function getEmployeeList()
    {
        return auth('manager')->user()->employees()
            ->when($this->search, function ($query) {
                return $query->where(DB::raw('CONCAT(first_name, " ", last_name)'), 'like', '%' . $this->search . '%');
            })
            ->withCount('registrations')
            ->paginate(10);
    }
}
