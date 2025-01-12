<?php

namespace App\Livewire\Employee\Program\Details;

use App\Livewire\Forms\Manager\Task\ReplyForm;
use App\Models\Task;
use App\Traits\AlertMessageTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskItem extends Component
{
    use AlertMessageTrait;

    public ReplyForm $form;
    public Task $task;

    #[On('edit-status-task')]
    public function mount(Task $task)
    {
        $this->form->setTask($task);
    }

    public function render()
    {
        return view('livewire.employee.program.details.task-item');
    }

    public function reply()
    {
        $this->validate();
        if ($this->form->create()) {
            $this->showSuccessAlertMessage('reply successfully');
        } else {
            $this->showErrorAlertMessage('reply failed');
        }
    }

    public function EmployeeEditTaskModal()
    {
        $this->dispatch('show-employee-edit-status-task-modal', $this->form->task->id);
    }
}
