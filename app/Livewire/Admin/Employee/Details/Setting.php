<?php

namespace App\Livewire\Admin\Employee\Details;

use App\Livewire\Forms\Admin\Employee\EmployeeForm;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Manager;
use App\Traits\AlertMessageTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class Setting extends Component
{
    use AlertMessageTrait;
    use WithFileUploads;

    public EmployeeForm $form;

    public function mount(Employee $employee)
    {
        $this->form->setEmployee($employee);
    }

    public function render()
    {
        return view('livewire.admin.employee.details.setting')->layout('layouts.admin.app');
    }

    public function getDepartmentsProperty()
    {
        return Department::all();
    }

    public function getManagersProperty()
    {
        $managers = [];
        if ($this->form->department_id) {
            $managers = Manager::where('department_id', $this->form->department_id)->get();
        }
        return $managers;
    }

    public function save()
    {
        $this->validate();
        if ($this->form->update()) {
            $this->showSuccessAlertMessage('Employee details has been updated.');
        } else {
            $this->showErrorAlertMessage('Employee details not updated.');
        }
        $this->dispatch('employee-details-updated');
    }
}
