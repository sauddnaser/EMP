<?php

namespace App\Livewire\Admin\Department\Form;

use App\Livewire\Forms\Admin\Department\DepartmentForm;
use App\Models\Department;
use App\Traits\AlertMessageTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    use AlertMessageTrait;

    public DepartmentForm $form;
    #[On('show-create-department-modal')]
    public function resolveParams()
    {
        $this->reset([
            'form.name',
            'form.description',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.department.form.create');
    }

    public function save()
    {
        $this->validate();
        $department = Department::create(
            $this->form->all()
        );
        if ($department) {
            $this->showSuccessAlertMessage("department created successfully");
        } else {
            $this->showErrorAlertMessage("department creation failed");
        }
        $this->dispatch('department-refresh');
        $this->discard();
    }

    public function discard()
    {
        $this->dispatch('hide-create-department-modal');
    }
}
