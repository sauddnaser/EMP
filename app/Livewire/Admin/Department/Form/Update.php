<?php

namespace App\Livewire\Admin\Department\Form;

use App\Livewire\Forms\Admin\Department\DepartmentForm;
use App\Models\Department;
use App\Traits\AlertMessageTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Update extends Component
{
    use AlertMessageTrait;

    public DepartmentForm $form;

    #[On('show-update-department-modal')]
    public function resolveParams(Department $department)
    {
        $this->form->setDepartment($department);
    }

    public function render()
    {
        return view('livewire.admin.department.form.update');
    }

    public function save()
    {
        if ($this->form->update()) {
            $this->showSuccessAlertMessage('department updated successfully!');
        } else {
            $this->showErrorAlertMessage('department update failed!');
        }
        $this->discard();
        $this->dispatch('department-refresh');
    }

    public function discard()
    {
        $this->dispatch('hide-update-department-modal');
    }
}
