<?php

namespace App\Livewire\Admin\Program;

use App\Models\Department;
use App\Models\TrainingProgram;
use App\Traits\AlertMessageTrait;
use App\Traits\WithLazyLoad;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ListTable extends Component
{
    use AlertMessageTrait;
    use WithLazyLoad;
    use WithPagination;

    public $search;
    public $department_id;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $programs = ($this->ready_to_load) ? $this->getProgramList() : [];
        $view_data = [
            'programs' => $programs,
        ];
        return view('livewire.admin.program.list-table', $view_data);
    }

    #[On('program-refresh')]
    public function getProgramList()
    {
        return TrainingProgram::when($this->department_id, function ($query) {
            return $query->whereDepartmentId($this->department_id);
        })
            ->when($this->search, function ($query) {
                return $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate();
    }

    public function getDepartmentsProperty()
    {
        return Department::all();
    }

    public function deleteProgram(TrainingProgram $program)
    {
        if ($program->delete()) {
            $this->showSuccessAlertMessage('program has been deleted.');
        } else {
            $this->showErrorAlertMessage('program has not been deleted.');
        }
    }

    public function showUpdateProgramModal($program_id)
    {
        $this->dispatch('show-update-program-modal', ['program_id' => $program_id]);
    }
}
