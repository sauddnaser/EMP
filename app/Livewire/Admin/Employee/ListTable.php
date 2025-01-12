<?php

namespace App\Livewire\Admin\Employee;

use App\Models\Department;
use App\Models\Employee;
use App\Traits\WithLazyLoad;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class ListTable extends Component
{
    use WithLazyLoad;

    public $search;
    public $department_id;

    public function render()
    {
        $employees = ($this->ready_to_load) ? $this->getEmployeeList() : [];
        $view_data = [
            'employees' => $employees,
        ];
        return view('livewire.admin.employee.list-table', $view_data);
    }

    public function getDepartmentsProperty()
    {
        return Department::all();
    }

    #[On('employees-refresh')]
    public function getEmployeeList()
    {
        return Employee::withCount('registrations')->when($this->department_id, function ($query) {
            return $query->where('department_id', $this->department_id);
        })->when($this->search, function ($query) {
            return $query->where(DB::raw('CONCAT(first_name, " ", last_name)'), 'like', '%' . $this->search . '%');
        })->paginate(10);
    }
}
