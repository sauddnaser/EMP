<?php

namespace App\Livewire\Admin\Department;

use App\Models\Department;
use App\Traits\AlertMessageTrait;
use App\Traits\WithLazyLoad;
use Livewire\Attributes\On;
use Livewire\Component;

class ListTable extends Component
{
    use AlertMessageTrait;
    use WithLazyLoad;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $departments = ($this->ready_to_load) ? $this->getDepartmentList() : [];
        $view_data = [
            'departments' => $departments,
        ];
        return view('livewire.admin.department.list-table', $view_data);
    }

    #[On('department-refresh')]
    public function getDepartmentList()
    {
        return Department::orderByDesc('created_at')->paginate();
    }

    public function showUpdateDepartmentModal($department_id)
    {
        $this->dispatch('show-update-department-modal', $department_id);
    }

    public function deleteDepartment(Department $department)
    {
        if ($department->delete()) {
            $this->showSuccessAlertMessage('department deleted successfully!');
        } else {
            $this->showErrorAlertMessage('department not deleted!');
        }
        $this->dispatch('department-refresh');
    }


}
