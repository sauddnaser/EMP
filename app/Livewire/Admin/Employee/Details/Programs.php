<?php

namespace App\Livewire\Admin\Employee\Details;

use App\Enums\StatusEnum;
use App\Livewire\Forms\Admin\Employee\EmployeeForm;
use App\Models\Employee;
use Livewire\Component;

class Programs extends Component
{
    public EmployeeForm $form;
    public $status;

    public function mount(Employee $employee)
    {
        $this->form->setEmployee($employee);
    }

    public function render()
    {
        return view('livewire.admin.employee.details.programs')->layout('layouts.admin.app');
    }

    public function getProgramsProperty()
    {
        return $this->form->employee->registrations()
            ->with([
                'TrainingProgram'
            ])
            ->when($this->status, function ($query) {
                return $query->where('employee_training_registrations.status', $this->status);
            })
            ->paginate();
    }

    public function getStatusProperty()
    {
        return StatusEnum::options();
    }
}
