<?php

namespace App\Livewire\Admin\Employee\Form;

use App\Livewire\Forms\Admin\Employee\EmployeeForm;
use App\Models\Department;
use App\Models\Manager;
use App\Traits\AlertMessageTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use AlertMessageTrait;
    use WithFileUploads;

    public EmployeeForm $form;

    #[On('show-create-employee-modal')]
    public function resolveParams(Manager $manager = null)
    {
        $this->form->setManager($manager);
    }

    public function render()
    {
        return view('livewire.admin.employee.form.create');
    }

    public function getDepartmentsProperty()
    {
        return Department::all();
    }

    public function getMangersProperty()
    {
        $managers = Manager::query();
        if ($this->form->department_id) {
            $managers =$managers->where('department_id', $this->form->department_id)->get();
        }
        return $managers;
    }

    public function save()
    {
        $this->validate();
        if ($this->form->store()) {
            $this->showSuccessAlertMessage('employee created successfully!');
        } else {
            $this->showErrorAlertMessage('employee created failed!');
        }
        $this->dispatch('employees-refresh');
        $this->discard();
    }

    public function discard()
    {
        $this->dispatch('hide-create-employee-modal');
    }
}
