<?php

namespace App\Livewire\Manager\Program\Details;

use App\Livewire\Manager\Employee\Details\Program;
use App\Traits\WithLazyLoad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Employee extends Component
{
    use WithLazyLoad;

    public $program;
    public $search;

    public function mount($program_id)
    {
        $this->program = Auth::guard('manager')->user()->Department
            ->trainingPrograms()
            ->findOrFail($program_id);
    }

    public function render()
    {
        $employees = ($this->ready_to_load) ? $this->getEmployeeList() : [];
        $view_data = [
            'employees' => $employees,
        ];
        return view('livewire.manager.program.details.employee', $view_data)
            ->layout('layouts.manager.app');
    }

    #[On('employee-program-registration')]
    public function getEmployeeList()
    {
        return $this->program->registrations()
            ->whereHas('Employee', function ($query) {
                return $query->where(DB::raw('CONCAT(first_name, " ", last_name)'), 'like', '%' . $this->search . '%');
            })
            ->paginate();
    }

    public function showManagerAddEmployeeProgramModal()
    {
        $this->dispatch('show-manager-add-employee-modal',
            ['program_id' => $this->program->id]);
    }
}
