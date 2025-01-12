<?php

namespace App\Livewire\Admin\Manager\Form;

use App\Livewire\Forms\Admin\Manager\ManagerForm;
use App\Models\Department;
use App\Traits\AlertMessageTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use AlertMessageTrait;
    use WithFileUploads;

    public ManagerForm $form;
    public $departments = [];

    #[On('show-create-manager-modal')]
    public function resolveParams()
    {
        $this->restParams();
        $this->departments = Department::all();
    }

    public function render()

    {
        return view('livewire.admin.manager.form.create');
    }

    public function save()
    {
        if ($this->form->store()) {
            $this->showSuccessAlertMessage('manager created successfully!');
        } else {
            $this->showErrorAlertMessage('failed to create manager!');
        }
        $this->dispatch('manager-refresh');
        $this->discard();
    }

    public function discard()
    {
        $this->dispatch('hide-create-manager-modal');
    }

    public function restParams()
    {
        $this->reset([
            'form.first_name',
            'form.last_name',
            'form.email',
            'form.phone',
            'form.department_id',
            'form.password',
        ]);
    }
}
