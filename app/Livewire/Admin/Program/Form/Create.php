<?php

namespace App\Livewire\Admin\Program\Form;

use App\Livewire\Forms\Admin\Program\ProgramForm;
use App\Models\Department;
use App\Traits\AlertMessageTrait;
use Livewire\Component;

class Create extends Component
{
    use AlertMessageTrait;

    public ProgramForm $form;

    public function render()
    {
        return view('livewire.admin.program.form.create');
    }

    public function getDepartmentsProperty()
    {
        return Department::all();
    }

    public function save()
    {
        $this->validate();
        if ($this->form->store()) {
            $this->showSuccessAlertMessage('training program created successfully!');
        } else {
            $this->showErrorAlertMessage('training program creation failed!');
        }
        $this->dispatch('program-refresh');
        $this->discard();
    }

    public function discard()
    {
        $this->dispatch('hide-create-program-modal');
    }
}
