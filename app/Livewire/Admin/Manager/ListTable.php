<?php

namespace App\Livewire\Admin\Manager;

use App\Models\Department;
use App\Models\Manager;
use App\Traits\AlertMessageTrait;
use App\Traits\WithLazyLoad;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ListTable extends Component
{
    use AlertMessageTrait;
    use WithPagination;
    use WithLazyLoad;

    public $search;
    public $department_id;

    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $managers = ($this->ready_to_load) ? $this->getManagerList() : [];
        $view_data = [
            'managers' => $managers,
        ];
        return view('livewire.admin.manager.list-table', $view_data);
    }

    #[On('manager-refresh')]
    public function getManagerList()
    {
        return Manager::withCount('employees')
            ->when($this->department_id, function ($query, $department_id) {
                $query->where('department_id', $department_id);
            })
            ->when($this->search, function ($query, $search) {
                $query->where(DB::raw('CONCAT(first_name, " ", last_name)'), 'like', '%' . $search . '%');
            })
            ->orderByDesc('created_at')
            ->paginate(10);
    }

    public function getDepartmentListProperty()
    {
        return Department::all();
    }

    public function showUpdateManagerModal($manager_id)
    {
        $this->dispatch('show-update-manager-modal', $manager_id);
    }

    public function deleteManager(Manager $manager)
    {
        if ($manager->delete()) {
            $this->showSuccessAlertMessage('department deleted successfully!');
        } else {
            $this->showErrorAlertMessage('department not deleted!');
        }
        $this->dispatch('manager-refresh');
    }

}
