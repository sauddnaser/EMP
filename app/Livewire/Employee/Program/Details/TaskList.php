<?php

namespace App\Livewire\Employee\Program\Details;

use App\Livewire\Forms\Manager\Task\TaskForm;
use App\Models\EmployeeTrainingRegistration;
use App\Traits\AlertMessageTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskList extends Component
{
    use AlertMessageTrait;

    public TaskForm $form;


    public function mount(EmployeeTrainingRegistration $registration)
    {
        $this->form->setEmployeeTrainingRegistration($registration);
    }

    public function render()
    {
        return view('livewire.employee.program.details.task-list')
            ->layout('layouts.employee.app');
    }
}
