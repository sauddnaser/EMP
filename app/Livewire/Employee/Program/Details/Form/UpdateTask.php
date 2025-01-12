<?php

namespace App\Livewire\Employee\Program\Details\Form;

use App\Enums\TaskStatusEnum;
use App\Livewire\Forms\Manager\Task\TaskForm;
use App\Models\Task;
use App\Traits\AlertMessageTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateTask extends Component
{
    use AlertMessageTrait;

    public TaskForm $form;

    #[On('show-employee-edit-status-task-modal')]
    public function resolveParams(Task $task)
    {
        $this->form->setTask($task);
    }

    public function render()
    {
        return view('livewire.employee.program.details.form.update-task');
    }

    public function getStatusProperty()
    {
        return TaskStatusEnum::options();
    }

    public function save()
    {
        $this->validate();
        if ($this->form->update()) {
            $this->showSuccessAlertMessage('Task updated successfully!');
        } else {
            $this->showErrorAlertMessage('Failed to update task!');
        }
        $this->dispatch('edit-status-task', $this->form->task);
        $this->discard();
    }

    public function discard()
    {
        $this->dispatch('hide-employee-edit-status-task-modal');
    }
}
