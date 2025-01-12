<?php

namespace App\Livewire\Manager\Employee\Details;

use App\Enums\StatusEnum;
use App\Enums\TaskStatusEnum;
use App\Livewire\Forms\Manager\Task\TaskForm;
use App\Models\EmployeeTrainingRegistration;
use App\Models\Task;
use App\Traits\AlertMessageTrait;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TaskList extends Component
{
    use AlertMessageTrait;

    public TaskForm $form;
    public $editable = false;


    public function mount(EmployeeTrainingRegistration $registration)
    {
        $this->form->setEmployeeTrainingRegistration($registration);
    }

    #[On('program-updated')]
    public function render()
    {
        return view('livewire.manager.employee.details.task-list')
            ->layout('layouts.manager.app');
    }

    public function getStatusProperty()
    {
        return TaskStatusEnum::cases();
    }

    public function save()
    {
        $this->validate();
        if ($this->editable) {
            if ($this->form->update()) {
                $this->showSuccessAlertMessage('Task updated successfully!');
            } else {
                $this->showErrorAlertMessage('Failed to update the task.');
            }
            $this->dispatch('task-updated');
        } else {
            if ($this->form->create()) {
                $this->showSuccessAlertMessage('Task created successfully!');
            } else {
                $this->showErrorAlertMessage('Failed to create the task.');
            }
        }
    }


    #[On('edit-task')]
    public function editTask(Task $task)
    {
        $this->form->setTask($task);
        $this->editable = true;
    }

    public function assignProgramCompleted()
    {
        if ($this->form->assignProgramCompleted()) {
            $this->showSuccessAlertMessage('Program completed!');
            $this->dispatch('program-updated');
        } else {
            $this->showErrorAlertMessage('Failed to update the program completed.');
        }
    }

    public function assignProgramCanceled()
    {
        if ($this->form->assignProgramCanceled()) {
            $this->showSuccessAlertMessage('Program canceled!');
            $this->dispatch('program-updated');
        } else {
            $this->showErrorAlertMessage('Failed to update the program canceled.');
        }
    }
}
