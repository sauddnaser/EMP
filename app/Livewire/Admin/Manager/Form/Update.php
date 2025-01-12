<?php

namespace App\Livewire\Admin\Manager\Form;

use App\Livewire\Forms\Admin\Manager\ManagerForm;
use App\Models\Department;
use App\Models\Manager;
use App\Traits\AlertMessageTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use AlertMessageTrait;
    use WithFileUploads;

    public ManagerForm $form;


    #[On('show-update-manager-modal')]
    public function getManagerProperty(Manager $manager)
    {
        $this->form->setManager($manager);
    }

    public function render()
    {
        return view('livewire.admin.manager.form.update');
    }

    public function getDepartmentsProperty()
    {
        return Department::all();
    }

    public function save()
    {
        $this->validate();
        if ($this->form->update()) {
            $this->showSuccessAlertMessage('manager updated successfully');
        } else {
            $this->showErrorAlertMessage('manager not updated');
        }
        $this->dispatch('manager-refresh');
        $this->discard();

    }

    public function discard()
    {
        $this->dispatch('hide-update-manager-modal');
    }
}
