<?php

namespace App\Livewire\Admin\Program\Form;

use App\Livewire\Forms\Admin\Program\ProgramForm;
use App\Models\Department;
use App\Models\TrainingProgram;
use App\Traits\AlertMessageTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Update extends Component
{
    use AlertMessageTrait;

    public ProgramForm $form;

    #[On('show-update-program-modal')]
    public function resolve($params)
    {
        if (isset($params['program_id'])) {
            $program = TrainingProgram::findOrFail($params['program_id']);
            $this->form->setProgram($program);
        } else {
            abort(404);
        }
    }

    public function render()
    {
        return view('livewire.admin.program.form.update');
    }

    public function getDepartmentsProperty()
    {
        return Department::all();
    }

    public function save()
    {
        $this->validate();
        if ($this->form->update()) {
            $this->showSuccessAlertMessage('training program successfully updated!');
        } else {
            $this->showErrorAlertMessage('Failed to update training program!');
        }
        $this->dispatch('program-refresh');
        $this->discard();
    }

    public function discard()
    {
        $this->dispatch('hide-update-program-modal');
    }
}
